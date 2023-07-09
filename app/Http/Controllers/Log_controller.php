<?php

namespace App\Http\Controllers;

use App\Models\Log;
use App\Models\State;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Log_controller extends Controller
{

    public function cek_data_lama($uid, $pemakaian, $status)
    {
        $last_data = Log::where('user_id', $uid)->latest();
    }
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $email = $request->query('email');
        $password = $request->query('password');
        $uid = $request->query('user_id');
        $pemakaian = $request->query('pemakaian_air');
        $status = $request->query('status');
        
        // cek user auth
        $user = User::where('email', $email)->get();
        if(!Auth::attempt(['email'=>$request->query('email'), 'password'=>$request->query('password')])){
            return response()->json(['status'=>'Gagal', 'message'=>'unauthenticated user']);
            die;
        }


        // ambil data lama
        $last_data = Log::where('user_id', $uid)->latest();
        
        // cek jika data lama kosong
        if(Log::where('user')){
            if($pemakaian>0) Log::insert(['pemakaian_air'=>$pemakaian, 'status'=>$status, 'user_id'=>$uid]);
        }
        
        // +================================================================
        if($user->count()<1){
            return response()->json(['status'=>'Gagal', 'message'=>'unauthenticated user']);
        }else{
            if(Hash::check($password, $user[0]->password) && $user[0]->role == 'admin'){
                $last_data = Log::where('user_id', $request->user_id)->latest();

                if($this->cek_data_lama($uid, $pemakaian, $status)){

                }
                // assign tanggal data sblmnya dan tgl baru
                $ld = null;
                if($last_data->count()>0){
                    $ld = $last_data->get()[0];
                    $upd = Log::where('user_id', $request->user_id)->latest()->get();
                    $upd[0]->created_at = date('Y-m-d H:i:s', strtotime('now'));
                    $upd[0]->save();
                    
                }
                $date_now = date('Y-m-d H:i:s', strtotime('now'));
                if($ld == null)
                {
                    $date_last = new DateTime();
                    $date_last->modify('-30 seconds');
                }else{

                    $date_last = new DateTime($ld->created_at);
                    $date_last->modify('+30 seconds');
                }

                // cek jika State blm ada
                if(State::where('user_id',$uid)->get()->count()<1){
                    State::create(['user_id'=>$uid, 'state'=>0])->save();
                    
                }
                

                // cek State jika data sebelumnya beda maka rubah state
                $state = False;
                if($last_data->get()[0]->pemakaian_air != $pemakaian || $date_now < $date_last->format('Y-m-d H:i:s')){
                    $state = State::where('user_id',$uid)->get()[0];
                    if($state->state == True){
                        $state->state = False;
                    }else{
                        $state->state = True;
                    }
                    $state->save();
                }else{
                    return response()->json(['status'=>'not modified, last data same as current data']); 
                    die;
                }
        
                // if State != on don't do anything
                if($state->state == False || $state->state == null ){
                    return response()->json(['status'=>'not modified, state off']); 
                    die;
                }
                // cek jika sinyal pulse pemakaian air  ==  0 jangan input
                if($pemakaian == 0){
                    return response()->json(['status'=>'not modified, pulse zero']); 
                    die;
                }
                
                
                
                // dd(['ld'=>$ld->created_at, 'dl'=>$date_last->format('Y-m-d H:i:s'), 'dn'=>$date_now]);
                if($date_now < $date_last->format('Y-m-d H:i:s')){
                
                    return response()->json(['status'=>'not modified, to many data']);
                }else{

                    $data = [
                        'pemakaian_air'=>$request->query('pemakaian_air'),
                        'status'=>$request->query('status'),
                        'user_id'=>$request->query('user_id'),
                    ];
                    
                    Log::create($data);
                    return response()->json(['status'=>'Ok', 'data'=>$data]);
                }
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
