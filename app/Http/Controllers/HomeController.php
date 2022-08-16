<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Mail;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{

    public function send_mail(Request $request){
        
        //send mail
            $to_name = "Anh Quan";
            $to_email = "quanle19032011@gmail.com";//send to this email
        
            $from_name = $request->send_name;
            $from_email = $request->send_email;
            $from_subject = $request->send_subject;
            $from_message = $request->send_message;

            $data = array("body"=>$from_message); //body of mail.blade.php
            
            Mail::send('pages.send_mail', $data, function($message) use ($from_name, $from_email,$to_email,$from_subject){

                $message->to($to_email)->subject($from_subject);//send this mail with subject
                $message->from($from_email,$from_name);//send from this mail
            });
            return Redirect('/contact')->with('message','');
        //--send mail

    }

    public function contact(Request $request){

        //seo
        $meta_desc = "Chuyên bán những phụ kiện máy tính, điện thoại, máy chơi game";
        $meta_keywords = "phụ kiện máy tính, điện thoại, máy chơi game";
        $meta_title = "Eshopper | Chuyên bán phụ kiện máy tính, điện thoại, máy chơi game";
        $url_canonical = $request->url();
        //end seo

        $all_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->limit(6)->get();
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

        return view('pages.contact.show_contact')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);

    }

    public function index(Request $request){

        //seo
        $meta_desc = "Chuyên bán những phụ kiện máy tính, điện thoại, máy chơi game";
        $meta_keywords = "phụ kiện máy tính, điện thoại, máy chơi game";
        $meta_title = "Eshopper | Chuyên bán phụ kiện máy tính, điện thoại, máy chơi game";
        $url_canonical = $request->url();
        //end seo


        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

        // $all_product = DB::table('tbl_product')
        // ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        // ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        // ->orderby('tbl_product.product_id','desc')->get();

        $all_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->limit(6)->get();
        return view('pages.home')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
        // return view('pages.home')->with(compact('cate_product','brand_product','all_product'));
    }
    public function search(Request $request){

        //seo
        $meta_desc = "Chuyên bán những phụ kiện máy tính, điện thoại, máy chơi game";
        $meta_keywords = "phụ kiện máy tính, điện thoại, máy chơi game";
        $meta_title = "Eshopper | Chuyên bán phụ kiện máy tính, điện thoại, máy chơi game";
        $url_canonical = $request->url();
        //end seo

        $keywords = $request->keywords_submit;
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();

        // $all_product = DB::table('tbl_product')
        // ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        // ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        // ->orderby('tbl_product.product_id','desc')->get();

        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->get(); 
        $all_product = DB::table('tbl_product')->where('product_status','0')->orderby('product_id','desc')->limit(6)->get();
        return view('pages.sanpham.search')->with('category',$cate_product)->with('brand',$brand_product)->with('all_product',$all_product)->with('search_product',$search_product)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);;

    }

}

