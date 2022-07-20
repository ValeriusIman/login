<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed
     */
    public function index()
    {
        $user = UserModel::getAll();
        $data = [
            'session' => session('user'),
            'user' => $user,
        ];
        return view('User.user', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return mixed
     */
    public function create()
    {
        $data = [
            'session' => session('user'),
        ];
        return view('User.add_user', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $data['image'] = null;
        if ($request->file('photo')) {
            $file = $request->file('photo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $data['image'] = $filename;
        }
        $user = new UserModel();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->role = $request->get('akses');
        $user->no_ktp = $request->get('no_ktp');
        $user->phone_number = $request->get('phone');
        $user->date_birth = $request->get('tgl_lahir');
        $user->gender = $request->get('gender');
        $user->photo = $data['image'];
        $user->save();

        return redirect(url('/user'));

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return mixed
     */
    public function show($id)
    {
        $user = UserModel::find($id);
        $data = [
            'session' => session('user'),
            'user' => $user
        ];
        return view('User.view_user', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return mixed
     */
    public function edit($id)
    {
        $user = UserModel::find($id);
        $data = [
            'session' => session('user'),
            'user' => $user
        ];
        return view('User.edit_user', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return mixed
     */
    public function update(Request $request, $id)
    {
        $user = UserModel::find($id);
        $data['image'] = null;
        if ($request->file('photo')) {
            if (!empty($user->photo)) {
                unlink(public_path('images') . '\\' . $user->photo);
            }

            $file = $request->file('photo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $data['image'] = $filename;
        }
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->role = $request->get('akses');
        $user->no_ktp = $request->get('no_ktp');
        $user->phone_number = $request->get('phone');
        $user->date_birth = $request->get('tgl_lahir');
        $user->gender = $request->get('gender');
        $user->photo = $data['image'];
        $user->update();

        return redirect(url('/user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return mixed
     */
    public function destroy($id)
    {
        $user = UserModel::find($id);
        $user->delete();
        return redirect(url('/user'));
    }

    public function cekEmail(Request $request)
    {
        $id = $request->get('id');
        if ($request->has('id') === false) {
            $id = 0;
        }
        $email = $request->get('email');

        $data = UserModel::where('email', '=', $email)
            ->whereNull('deleted_at')->pluck('id_user')->toArray();

        $index = array_search($id, $data);
        if (!empty($data)) {
            if ($data[$index] == $id) {
                return response()->json(true);
            } else {
                return response()->json(false);
            }
        } else {
            return response()->json(true);
        }
    }

    public function dataJson()
    {
        $user = UserModel::getAll();
//        dd(json_encode($user));
        $data = [
            'session' => session('user'),
            'user' => json_encode($user),
        ];
        return view('json', $data);
    }
}
