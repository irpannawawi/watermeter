<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\Tagihan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Users_controller extends Controller
{
    public function index(){
        $data = [
            'users'=> User::get(),
        ];
        return view('admin.users.index', $data);
    }

    public function store(Request $request)
    {
        $userdata = [
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'role'=>$request->input('role'),
            'password'=>Hash::make($request->input('password')),
        ];

        if(User::insert($userdata)){
            return redirect()->route('users')->with('success', 'Berhasil menambah user');
        }
    }

    public function edit($id){
        $data = [
            'user'=> User::find($id),
        ];
        return view('admin.users.edit', $data);
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $user = User::find($id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->role = $request->input('role');
            if($request->input('password')!= ''){
                $user->password = Hash::make($request->input('password'));
            }

        if($user->save()){
            return redirect()->route('users')->with('success', 'Berhasil merubah user');
        }
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        
        Log::where('user_id', $id)->delete();
        Tagihan::where('user_id', $id)->delete();
        User::where('id', $id)->delete();
        return redirect()->back();
    }
}
