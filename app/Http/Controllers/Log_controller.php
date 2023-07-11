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
        if(Log::where('user_id', $uid)->get()->count() == 0){
            if($pemakaian>0){
                Log::insert(['pemakaian_air'=>$pemakaian, 'status'=>$status, 'user_id'=>$uid]);
            }else{
                return response()->json(['status'=>'not modified', 'message'=>'pemakaian air 0']); 
                die;
            }

        }
        // assign tanggal data sblmnya dan tgl baru
        $ld = null;
        if($last_data->count()>0){
            $ld = $last_data->get()[0];
            // $upd = Log::where('user_id', $request->user_id)->latest()->get();
            // $upd[0]->created_at = date('Y-m-d H:i:s', strtotime('now'));
            // $upd[0]->save();
            // return response()->json(['status'=>'Updated', 'message'=>'data lama kosong insert baru', 'data'=>$upd[0]]);
            
        }

        $date_now = new DateTime();

        if($ld == null)
        {
            $last_data_time = new DateTime();
            $last_data_time->modify('-75 seconds');
        }else{
            
            $last_data_time = new DateTime($ld->created_at);
            $last_data_time->modify('+75 seconds');
        }
        
        // jika data baru datang < 75  second dari data terakhir di input 
        // maka jangan input ulang hanya update
        if($date_now < $last_data_time){
            // jika data kurang dari 75 dtk yang lalu update hanya jika data air lebih besar
            if($last_data->get()[0]->pemakaian_air < $pemakaian){
                $toupdatedata = Log::where('user_id', $request->user_id)->latest()->get()[0];
                $updt = Log::find($toupdatedata->id);
                $updt->pemakaian_air = $pemakaian;
                $updt->status = $status;
                $updt->created_at = date('Y-m-d H:i:s');
                $updt->save();
                return response()->json(['status'=>'Updated', 'message'=>'nilai air berubah', 'data'=>$toupdatedata]);
                
            }else{
                $toupdatedata = Log::where('user_id', $request->user_id)->latest()->get()[0];
                $updt = Log::find($toupdatedata->id);
                $updt->created_at = date('Y-m-d H:i:s');
                $updt->save();
                return response()->json(['status'=>'Not modified', 'message'=>'Data less or same as previous']);
                die;
            }
            
        }elseif($pemakaian > 0){
            // input data baru
            $data = [
                'pemakaian_air'=>$request->query('pemakaian_air'),
                'status'=>$request->query('status'),
                'user_id'=>$request->query('user_id'),
            ];
            
            Log::create($data);
            return response()->json(['status'=>'Ok', 'data'=>$data]);
        }else{
            // $toupdatedata = Log::where('user_id', $request->user_id)->latest()->get()[0];
            // $updt = Log::find($toupdatedata->id);
            // $updt->created_at = date('Y-m-d H:i:s');
            // $updt->save();
            return response()->json(['status'=>'Not modified', 'message'=>'Data less than 1']);
                die;
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
