<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Water;
use Illuminate\Http\Request;

class Dashboard_controller extends Controller
{
    //
    public function index(){
        $data = [
            'jumlah_pengguna'=> User::get()->count(),
        ];
        return view('dashboard_admin', $data);
    }
}
