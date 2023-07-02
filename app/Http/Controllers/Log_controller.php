<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Log_controller extends Controller
{
    public function store(Request $request)
    {
        $email = $request->query('email');
        $password = $request->query('password');

        $user = User::where('email', $email)->get();
        if($user->count()<1){
            return response()->json(['status'=>'Gagal', 'message'=>'unauthenticated user']);
        }else{
            if(Hash::check($password, $user[0]->password) && $user->role == 'admin'){
                $data = [
                    'pemakaian_air'=>$request->query('pemakaian_air'),
                    'status'=>$request->query('status'),
                    'user_id'=>$request->query('user_id'),
                ];
                
                Log::create($data);
                return response()->json(['status'=>'Ok', 'data'=>$data]);
            }else{
                return response()->json(['status'=>'Gagal', 'message'=>'unauthenticated user']);
            }
        }
    }

    public function view_log()
    {
        $data['logs'] = Log::orderby('id', 'desc')->get();
        return view('admin.log.index', $data);
    }

    public function grafik_data()
    {
        $data['grafik_data'] = [
            'labels'=> [
                date('d-m-Y', strtotime('now')),
                date('d-m-Y', strtotime('-1 days')),
                date('d-m-Y', strtotime('-2 days')),
                date('d-m-Y', strtotime('-3 days')),
                date('d-m-Y', strtotime('-4 days')),
                date('d-m-Y', strtotime('-5 days')),
                date('d-m-Y', strtotime('-6 days')),
            ],
            'series'=>[
                Log::where('created_at', 'like', date('Y-m-d', strtotime('now')).'%')->get()->sum('pemakaian_air'),
                Log::where('created_at', 'like', date('Y-m-d', strtotime('-1 days')).'%')->get()->sum('pemakaian_air'),
                Log::where('created_at', 'like', date('Y-m-d', strtotime('-2 days')).'%')->get()->sum('pemakaian_air'),
                Log::where('created_at', 'like', date('Y-m-d', strtotime('-3 days')).'%')->get()->sum('pemakaian_air'),
                Log::where('created_at', 'like', date('Y-m-d', strtotime('-4 days')).'%')->get()->sum('pemakaian_air'),
                Log::where('created_at', 'like', date('Y-m-d', strtotime('-5 days')).'%')->get()->sum('pemakaian_air'),
                Log::where('created_at', 'like', date('Y-m-d', strtotime('-6 days')).'%')->get()->sum('pemakaian_air'),
            ]
        ];
        return response(json_encode($data));
    }

}
