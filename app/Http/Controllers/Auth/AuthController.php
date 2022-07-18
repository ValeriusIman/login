<?php

namespace App\Http\Controllers\Auth;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\UserModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    /**
     * function for the login page
     * @return mixed
     */
    public function index()
    {
        $helper = new Helper();
        if ($helper->isLogin() === true) {
            return redirect('/dashboard');
        }
        return view('auth.login');
    }


    /**
     * function for the login process
     * @param Request $request
     * @return mixed
     */
    public function doLogin(Request $request)
    {
        $user = new UserModel();
        $username = $request->get('username');
        $password = $request->get('password');
        $admin = $user->getLoginDataByName($username);
        if (!empty($admin)){
            $username = $admin[0]->email;
        }
        try {

            $data = $user->getLoginData($username, $password);
            if (empty($data) === true) {
                return redirect(route('/login'))->with(['error' => 'Username atau Password Salah.']);
            }
            unset($data['password']);
            session()->put('user', $data);
            return redirect('/dashboard');

        } catch (Exception $e) {
            return redirect(route('/login'));
        }
    }

    /**
     * function to delete session
     * @return mixed
     */
    public function logout()
    {
        session()->flush();
        session()->regenerate();

        return redirect(route('/login'));
    }

}
