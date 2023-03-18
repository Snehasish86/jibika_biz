<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use DB;

class HomeController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Kolkata');
    }
    public function index()
    {
        return view('frontend.index');
    }
    public function about_us()
    {
        return view('frontend.about');
    }
    public function support()
    {
        return view('frontend.support');
    }
    public function terms_conditions()
    {
        return view('frontend.terms_conditions');
    }
    public function app_terms_conditions()
    {
        return view('frontend.app_terms_conditions');
    }
    public function faq()
    {
        return view('frontend.faq');
    }
    public function privacy_policy()
    {
        return view('frontend.privacy_policy');
    }
    public function app_privacy_policy()
    {
        return view('frontend.app_privacy_policy');
    }
    public function category($keyword)
    {
        return view('frontend.category',compact('keyword'));
    }
    public function ads_category($category,$subcategory)
    {
        return view('frontend.ads_category',compact('category','subcategory'));
    }
    public function categories()
    {
        return view('frontend.categories');
    }
    public function ads($keyword)
    {
        return view('frontend.ads',compact('keyword'));
    }
    public function search_city($keyword)
    {
        return view('frontend.search_city',compact('keyword'));
    }
    
    
    
    public function ad_details($keyword)
    {
        return view('frontend.ad_details',compact('keyword'));
    }
    
    public function ad_report($keyword)
    {
        return view('frontend.ad_report',compact('keyword'));
    }
    
    
    public function submit_report(Request $request)
    {
        $ad_keyword=$request->ad_keyword;
        $value=array(
            'ad_id'=>$request->ad_id,
            'user_id'=>$request->user_id,
            'reason'=>$request->reason,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        );
        $status=DB::table('ad_reports')->insert($value);
        return redirect('/ad-details/'.$ad_keyword)->with('success', 'Submitted Successfully');
    }
    
     public function submit_adreport(Request $request)
    {
        $ad_keyword=$request->ad_keyword;
        if($request->user_id=='')
        {
            return redirect('/');
        }
        $value=array(
            'ad_id'=>$request->ad_id,
            'user_id'=>$request->user_id,
            'reason'=>$request->reason,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        );
        $status=DB::table('ad_reports')->insert($value);
        return redirect('/ad-report/'.$ad_keyword)->with('success', 'Submitted Successfully');
    }
    
    
  
    public function search_result(Request $request)
    {
        return view('frontend.search_result');
    }
    public function payment_success(){
        return view('frontend.success');
    }
    public function payment_error(){
        return view('frontend.error');
    }

}
