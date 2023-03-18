<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use Auth;
use File;
use DB;
use Session;

class AdController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Kolkata');
    }
    public function index()
    {
        // return view('frontend.ads');
        return redirect('/');
    }
    
    public function my_ads()
    {
        return view('frontend.my_ads');
    }
    
    public function offers()
    {
        return view('frontend.offers');
    }
    

    public function get_subcategory(Request $request)
    {
        $category=$request->category;
        
        $row=DB::table('subcategories')->where('cat_id',$category)->get();
        foreach ($row as $details)
        {
            echo "<option value='".$details->id."'>".$details->subcategory."</option> ";
             
        }                  
       
    }
    
    public function create()
    {
        return view('frontend.new_ads');
    }

    public function edit(Ad $ad)
    {
        $check=DB::table('ads')
                    ->where('user_id',Auth::guard('user')->user()->id)
                    ->where('id',$ad->id)
                    ->count();
        if($check>0)
        {
            return view('frontend.update_ads',compact('ad'));
        }
        else
        {
            return redirect('/my-ads');
        }
        
    }
    public function store(Request $request)
    {
        // dd($request->all());
            $this->validate($request, [
            'filename' => 'required',
            'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'seller_phone' => 'required|digits:10|numeric',
            'title' => 'required|max:255',
            'feature' => 'required|max:255',
            'seller_name' => 'required|max:50'
            ]);
            
             if($request->seller_whatsapp!='')
	            {
	                 $this->validate($request, [
                        'seller_whatsapp' => 'digits:10|numeric'
                    ]);
	            }
            
            if($request->hasfile('filename'))
            {
                foreach($request->file('filename') as $image)
                {
                    $name=date('ymdhis').rand(1111,9999).'.'.$image->getClientOriginalExtension();
                    // $name=date('ymdhis').$image->getClientOriginalName();
                    $image->move(public_path().'/ads_image/', $name,60);  
                    $data[] = $name;  
                }
            }

            $all_images=implode(',',$data);

            if($request->package=='')
            {
                $package=1;
                $first_package=DB::table('packages')->where('id',$package)->first();
                $order_id="AD".date('ymdhis');
                $duration=$first_package->days;
                $start_date=date('Y-m-d');
                $end_date=date ("Y-m-d", strtotime ($start_date ."+".$duration." days"));

                $AdsArray=explode(' ',strtolower($request->title));
	            $AdsKeyword=implode('-',$AdsArray);
	            
	            if($request->seller_whatsapp=='')
	            {
	                $seller_whatsapp="";
	            }
	            else
	            {
	                $seller_whatsapp=$request->seller_whatsapp;
	            }

                $ad=New Ad;
                $ad->user_id = Auth::guard('user')->user()->id;
                $ad->cat_id = $request->cat_id;
                $ad->subcat_id = $request->subcat_id;
                $ad->title = $request->title;
                $ad->feature = $request->feature;
                $ad->keyword = $AdsKeyword;
                $ad->price = $request->price;
                $ad->city = $request->city;
                $ad->seller_name = $request->seller_name;
                $ad->seller_email = $request->seller_email;
                $ad->seller_phone = $request->seller_phone;
                $ad->seller_whatsapp = $seller_whatsapp;
                $ad->image = $all_images;
                $ad->description = $request->description;
                $ad->package = $package;
                $ad->amount = $first_package->price;
                $ad->start_date = $start_date;
                $ad->end_date = $end_date;
                $ad->order_id = $order_id;
                $ad->active_status = 'NO';
                
                if($ad->save())
                {
                    return redirect('/ads/create')->with('success', 'Ad Posted Successfully. Your Ad will be visible after admin approval.');
                }
                else
                {
                    return redirect('/ads/create')->with('error', 'Something Went Wrong');
                }
            }
            else
            {
                $package=$request->package;
                $first_package=DB::table('packages')->where('id',$package)->first();
                $order_id="AD".date('ymdhis');
                $duration=$first_package->days;
                $start_date=date('Y-m-d');
                $end_date=date ("Y-m-d", strtotime ($start_date ."+".$duration." days"));

                $AdsArray=explode(' ',strtolower($request->title));
	            $AdsKeyword=implode('-',$AdsArray);
	            
	            if($request->seller_whatsapp=='')
	            {
	                $seller_whatsapp="";
	            }
	            else
	            {
	                $seller_whatsapp=$request->seller_whatsapp;
	            }

                $all_ads= array(
                    'user_id' => Auth::guard('user')->user()->id,
                    'cat_id' => $request->cat_id,
                    'subcat_id' => $request->subcat_id,
                    'title' => $request->title,
                    'feature' => $request->feature,
                    'keyword' => $AdsKeyword,
                    'price' => $request->price,
                    'city' => $request->city,
                    'seller_name' => $request->seller_name,
                    'seller_email' => $request->seller_email,
                    'seller_phone' => $request->seller_phone,
                    'seller_whatsapp' => $seller_whatsapp,
                    'image' => $all_images,
                    'description' => $request->description,
                    'package' => $package,
                    'amount' => $first_package->price,
                    'start_date' => $start_date,
                    'end_date' => $end_date,
                    'order_id' => $order_id,
                    'active_status' => 'NO'
                );
                $lastInsertID=DB::table('temporary_ad')->insertGetId($all_ads);
                $request->session()->put('temp_ad_id', $lastInsertID);
                
                // echo $request->session()->get('temp_ad_id');
                Session::put('amount' , $first_package->price);
                // echo $request->session()->get('amount');
                // exit();
                return redirect('/add_payment');
                
            }

            // $form->filename=json_encode($data);
            // echo "Success";
    }

    public function delete_ad(Request $request)
    {
        $ad_id=$request->ad_id;
        

        $ads_row=DB::table('ads')->where('id',$ad_id)->first();
        $adsString=$ads_row->image;
        $adsArray=explode(',',$adsString);
        // print_r($adsArray);
        // exit();
        foreach($adsArray as $adsResult)
        {
            $previous_path=public_path().'/ads_image/'.$adsResult;
            if($adsResult!='')
            {
                if(File::exists($previous_path)){
                    unlink($previous_path);
                }
            }
        }
         
        $delete_row=DB::table('ads')->where('id',$ad_id)->delete();
        echo "success";
        
    }
    
    public function delete_ad_image(Request $request)
    {
        $ad_id=$request->ad_id;
        $image_id=$request->image_id;
        

        $ads_row=DB::table('ads')->where('id',$ad_id)->first();
        $adsString=$ads_row->image;
        $adsArray=explode(',',$adsString);
        // print_r($adsArray);
        // exit();
        foreach($adsArray as $key=> $adsResult)
        {
            if($key==$image_id)
            {
                $previous_path=public_path().'/ads_image/'.$adsResult;
                if($adsResult!='')
                {
                    if(File::exists($previous_path)){
                        unlink($previous_path);
                    }
                }
                
            }
            
        }
        
        unset($adsArray[$image_id]);
        
        $new_images=implode(',',$adsArray);
        
        $value=array(
            'image'=>$new_images
            );
         
        $update_row=DB::table('ads')->where('id',$ad_id)->update($value);
        echo "success";
        
    }
    
    public function update(Request $request, Ad $ad)
    {
        $this->validate($request, [
            'seller_phone' => 'required|digits:10|numeric',
            'title' => 'required|max:255',
            'feature' => 'required|max:255',
            'seller_name' => 'required|max:50'
            ]);
            
         if($request->seller_whatsapp!='')
            {
                 $this->validate($request, [
                    'seller_whatsapp' => 'digits:10|numeric'
                ]);
            }
	            
           $image_qry=$ad->image;
            
            if($request->hasfile('filename'))
            {
                $this->validate($request, [
                    'filename' => 'required',
                    'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
                ]);
                foreach($request->file('filename') as $image)
                {
                    $name=date('ymdhis').rand(1111,9999).'.'.$image->getClientOriginalExtension();
                    // $name=date('ymdhis').$image->getClientOriginalName();
                    $image->move(public_path().'/ads_image/', $name,60);  
                    $data[] = $name;  
                }
                $all_images=implode(',',$data);
                
                $new_images=$image_qry.','.$all_images;
            }
            else
            {
                $new_images=$image_qry;
            }

            
               $AdsArray=explode(' ',strtolower($request->title));
	            $AdsKeyword=implode('-',$AdsArray);
	            
	            if($request->seller_whatsapp=='')
	            {
	                $seller_whatsapp="";
	            }
	            else
	            {
	                $seller_whatsapp=$request->seller_whatsapp;
	            }

               
                $ad->cat_id = $request->cat_id;
                $ad->subcat_id = $request->subcat_id;
                $ad->title = $request->title;
                $ad->feature = $request->feature;
                $ad->keyword = $AdsKeyword;
                $ad->price = $request->price;
                $ad->city = $request->city;
                $ad->seller_name = $request->seller_name;
                $ad->seller_email = $request->seller_email;
                $ad->seller_phone = $request->seller_phone;
                $ad->seller_whatsapp = $seller_whatsapp;
                $ad->image = $new_images;
                $ad->description = $request->description;
                $ad->active_status = 'NO';
                
                if($ad->save())
                {
                    return redirect('/ads/'.$ad->id.'/edit')->with('success', 'Ad Updated Successfully. Your Ad will be visible after admin approval.');
                }
                else
                {
                    return redirect('/ads/'.$ad->id.'/edit')->with('error', 'Something Went Wrong');
                }
    }

    public function update_ads(Request $request)
    {
        $result=array(
            'active_status'=>$request->active_status
        );
        $status=DB::table('ads')->where('id',$request->ad_id)->update($result);
        return redirect('/admin/edit-ads/'.$request->ad_id)->with('success', 'Updated Successfully');
    }


    public function deleteAds(Request $request)
    {
        $ad_id=$request->ad_id;
        
        $ads_row=DB::table('ads')->where('id',$ad_id)->first();
        $adsString=$ads_row->image;
        $adsArray=explode(',',$adsString);
        // print_r($adsArray);
        // exit();
        foreach($adsArray as $adsResult)
        {
            $previous_path=public_path().'/ads_image/'.$adsResult;
            if($adsResult!='')
            {
                if(File::exists($previous_path)){
                    unlink($previous_path);
                }
            }
        }
         
        $delete_row=DB::table('ads')->where('id',$ad_id)->delete();
        return redirect('/admin/ads')->with('success', 'Deleted Successfully');
    }
    
    public function deleteAds2(Request $request)
    {
        $ad_id=$request->ad_id;
        
        $ads_row=DB::table('ads')->where('id',$ad_id)->first();
        $adsString=$ads_row->image;
        $adsArray=explode(',',$adsString);
        // print_r($adsArray);
        // exit();
        foreach($adsArray as $adsResult)
        {
            $previous_path=public_path().'/ads_image/'.$adsResult;
            if($adsResult!='')
            {
                if(File::exists($previous_path)){
                    unlink($previous_path);
                }
            }
        }
         
        $delete_row=DB::table('ads')->where('id',$ad_id)->delete();
        return redirect('/admin/dashboard')->with('success', 'Deleted Successfully');
    }


    //admin section ad
    public function ads()
    {
        return view('admin.ads.view');
    }
    public function report_ads()
    {
        return view('admin.ads.report_ads');
    }
    
    

    public function edit_ads($id)
    {
        $ad_result=DB::table('ads')->where('id',$id)->first();
        return view('admin.ads.update',compact('ad_result'));
    }
}
