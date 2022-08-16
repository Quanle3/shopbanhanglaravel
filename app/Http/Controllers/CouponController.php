<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Session;
use App\Models\Coupon;
use Illuminate\Support\Facades\Redirect;
session_start();

class CouponController extends Controller
{

    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }
        else{
            return Redirect::to('admin')->send();
        }
    }

    public function check_coupon(Request $request){


        $data = $request->all();
        print_r($data);


    }

    public function list_coupon(){
        $this->AuthLogin();
        return view('admin.coupon.list_coupon');
    }

    public function add_coupon(){
        $this->AuthLogin();
        return view('admin.coupon.add_coupon');
    }

    public function insert_coupon(Request $request){

        $this->AuthLogin();
        $data = $request->all();
        $coupon = new Coupon;

        $coupon->coupon_name = $data['coupon_name'];
        $coupon->coupon_number = $data['coupon_number'];
        $coupon->coupon_code = $data['coupon_code'];
        $coupon->coupon_time = $data['coupon_time'];
        $coupon->coupon_condition = $data['coupon_condition'];
        $coupon->save();

        Session::put('message','Thêm mã giảm giá thành công');
        return Redirect::to('add-coupon');
    }
}
