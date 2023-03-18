<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;
use Auth;
use File;
use DB;
use Session;

class PaymentController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Kolkata');
    }
    public function payment()
    {
        return view('frontend.payment');
    }
    public function add_payment(Request $request)
    {
        
        // $amount=1;
        $amount=Session::get('amount');
        $api = new Api('rzp_live_lQPzRtsF7N3ao3', 'dZKygTHG6ZPsqn3lX5GPBki4');
        // $api = new Api('rzp_test_EI5nlBj6XE7Xrz', 'UeFOGjipjET4dBDcukbKvewx');
        
        $order  = $api->order->create(array('receipt' => '123', 'amount' => $amount * 100 , 'currency' => 'INR')); // Creates order
        $orderId = $order['id']; 
        // dd($order);

        Session::put('order_id', $orderId);

        return redirect('/payment');
    }

    public function pay(Request $request){
        $data = $request->all();
        // dd($data);
        // $user = DB::table('payments')->where('payment_id', $data['razorpay_order_id'])->first();
        // $user = Payment::where('payment_id', $data['razorpay_order_id'])->first();
        // $user->payment_done = 1;
        // $user->razorpay_id = $data['razorpay_payment_id'];

        // $api = new Api('rzp_test_EI5nlBj6XE7Xrz', 'UeFOGjipjET4dBDcukbKvewx');
        $api = new Api('rzp_live_lQPzRtsF7N3ao3', 'dZKygTHG6ZPsqn3lX5GPBki4');
        

        try{
        $attributes = array(
             'razorpay_signature' => $data['razorpay_signature'],
             'razorpay_payment_id' => $data['razorpay_payment_id'],
             'razorpay_order_id' => $data['razorpay_order_id']
        );
        $order = $api->utility->verifyPaymentSignature($attributes);
        $success = true;
        
    }catch(SignatureVerificationError $e){

        $success = false;
    }

        
    if($success==true){
        
        $temp_ad_id=$request->session()->get('temp_ad_id');
        
        $payment_id=$data['razorpay_order_id'];

        $value=array(
            'payment_id'=>$payment_id
             );
        $update=DB::table('temporary_ad')->where('id',$temp_ad_id)->update($value);

        $ad_details=DB::table('temporary_ad')->where('id',$temp_ad_id)->first();
        
        if($ad_details->seller_whatsapp=='')
        {
            $seller_whatsapp="";
        }
        else
        {
            $seller_whatsapp=$ad_details->seller_whatsapp;
        }
        
        $OrderResult=array(
            'user_id' => Auth::guard('user')->user()->id,
            'cat_id' => $ad_details->cat_id,
            'subcat_id' => $ad_details->subcat_id,
            'title' => $ad_details->title,
            'feature' => $ad_details->feature,
            'keyword' => $ad_details->keyword,
            'price' => $ad_details->price,
            'city' => $ad_details->city,
            'seller_name' => $ad_details->seller_name,
            'seller_email' => $ad_details->seller_email,
            'seller_phone' => $ad_details->seller_phone,
            'seller_whatsapp' => $seller_whatsapp,
            'image' => $ad_details->image,
            'description' => $ad_details->description,
            'package' => $ad_details->package,
            'amount' => $ad_details->price,
            'start_date' => $ad_details->start_date,
            'end_date' => $ad_details->end_date,
            'payment_id' => $ad_details->payment_id,
            'order_id' => $ad_details->order_id,
            'active_status' => $ad_details->active_status,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
        );
        $order_add=DB::table('ads')->insert($OrderResult);
        
        session()->forget('temp_ad_id');
        session()->forget('amount');
        session()->forget('order_id');

        return redirect('/payment-success');
    }else{

        return redirect('/payment-error');
    }

    }

    
}
