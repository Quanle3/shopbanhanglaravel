<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use App\Models\Login;
use App\Models\Social;
use Socialite;
use Illuminate\Support\Facades\Redirect;
session_start();


class AdminController extends Controller
{
    

    public function login_facebook(){
        return Socialite::driver('facebook')->redirect();
    }

     public function callback_facebook(){
        $provider = Socialite::driver('facebook')->user();
        $account = Social::where('provider','facebook')->where('provider_user_id',$provider->getId())->first();
        if($account){
            //login in vao trang quan tri  
            $account_name = Login::where('admin_id',$account->user)->first();
            Session::put('admin_name',$account_name->admin_name);
            Session::put('login_normal',true);
            Session::put('admin_id',$account_name->admin_id);

            return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
        }else{

            $new_account = new Social([
                'provider_user_id' => $provider->getId(),
                'provider' => 'facebook'
                // 'user' =>
            ]);

            $orang = Login::where('admin_email',$provider->getEmail())->first();

            if(!$orang){
                $orang = Login::create([
                    'admin_name' => $provider->getName(),
                    'admin_email' => $provider->getEmail(),
                    'admin_password' => '',
                    'admin_phone' => '',

                ]);
            }
            $new_account->login()->associate($orang);
            $new_account->save();

            $account_name = Login::where('admin_id',$new_account->user)->first();
            Session::put('admin_name',$new_account->admin_name);
            Session::put('login_normal',true);
            Session::put('admin_id',$new_account->admin_id);
            
            return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
        } 
    }


    public function login_google(){
        return Socialite::driver('google')->redirect();
   }
public function callback_google(){
        $users = Socialite::driver('google')->stateless()->user(); 

        $authUser = $this->findOrCreateUser($users,'google');
        if($authUser){
            $account_name = Login::where('admin_id',$authUser->user)->first();
            Session::put('admin_name',$account_name->admin_name);
            Session::put('admin_id',$account_name->admin_id);
        }elseif($new_account){
            $account_name = Login::where('admin_id',$authUser->user)->first();
            Session::put('admin_name',$account_name->admin_name);
            Session::put('admin_id',$account_name->admin_id);
        }
        return redirect('/dashboard')->with('message', 'Đăng nhập Admin thành công');
      
       
    }
    public function findOrCreateUser($users,$provider){
        $authUser = Social::where('provider_user_id', $users->id)->first();
        if($authUser){

            return $authUser;
        }else{

            $new_account = new Social([
                'provider_user_id' => $users->id,
                'provider' => strtoupper($provider)
            ]);

            $orang = Login::where('admin_email',$users->email)->first();

            if(!$orang){
                $orang = Login::create([
                    'admin_name' => $users->name,
                    'admin_email' => $users->email,
                    'admin_password' => '',
                    'admin_phone' => '',
                    'admin_status' => 1
                ]);
            }
            $new_account->login()->associate($orang);
            $new_account->save();
            return $new_account;

        

        }
      
        


    }


    public function AuthLogin(){

        if(Session::get('login_normal')){

            $admin_id = Session::get('admin_id');
            if($admin_id){
                return Redirect::to('dashboard');
            }
            else{
                return Redirect::to('admin')->send();
            }
        }
    }

    public function index(){
        return view('admin_login');
    }

    public function show_dashboard(){
        $this->AuthLogin();
        return view('admin.dashboard');
    }

    public function dashboard(Request $request){

        $data = $request->all();
        $admin_email = $data['admin_email'];
        $admin_password = md5($data['admin_password']);
        $login = Login::where('admin_email', $admin_email)->where('admin_password', $admin_password)->first();
        if($login==Null){
            Session::put('message', 'Mật khẩu hoặc tài khoản bị sai. Xin vui lòng nhập lại.');
            return Redirect::to('/admin');
        }
        $login_count = $login->count();
        if($login_count) {
            Session::put('admin_name',$login->admin_name);
            Session::put('admin_id',$login->admin_id);
            return Redirect::to('/dashboard');
        }elseif($login_count==Null){
            Session::put('message', 'Mật khẩu hoặc tài khoản bị sai. Xin vui lòng nhập lại.');
            return Redirect::to('/admin');
        }



        // $admin_email = $request->admin_email;
        // $admin_password = md5($request->admin_password);

        // $result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        // if($result){
        //     Session::put('admin_name',$result->admin_name);
        //     Session::put('admin_id',$result->admin_id);
        //     return Redirect::to('/dashboard');
        // }else{
        //     Session::put('message', 'Mật khẩu hoặc tài khoản bị sai. Xin vui lòng nhập lại.');
        //     return Redirect::to('/admin');
        // }
    }

    public function logout(){
        $this->AuthLogin();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/admin');
    }
}
