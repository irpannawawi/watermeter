<?php

namespace App\Http\Controllers;

use App\Models\Water;
use Illuminate\Http\Request;

class Dashboard_controller extends Controller
{
    //
    public function index(){
        $data = [
            'penggunaan'=> Water::latest()->get(),
            'penggunaan_lalu'=> Water::latest()->get(),
        ];
        return view('dashboard', $data);
    }
}
