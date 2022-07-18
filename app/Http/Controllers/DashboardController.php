<?php

namespace App\Http\Controllers;

use App\Model\Peminjaman;
use App\Model\Ruangan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * function for dashboard page
     *
     * @return mixed
     */
    public function index()
    {
        $data = [
            'session' => session('user'),
        ];
//        dd($data);
        return view('dashboard', $data);
    }

}
