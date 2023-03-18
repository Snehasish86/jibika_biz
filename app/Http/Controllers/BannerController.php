<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use File;
use DB;

class BannerController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Kolkata');
    }
    public function index()
    {
        return view('admin.banner.view');
    }

    
    public function create()
    {
        return view('admin.banner.create');
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:500',
        ]);
        $imageName = date('Ymdhis').'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('banner_image'), $imageName);

        $banner=New Banner;
        $banner->image = $imageName;
        $banner->url_link = $request->url_link;
        $banner->start_date = $request->start_date;
        $banner->end_date = $request->end_date;
        $banner->active_status = $request->active_status;
        if($banner->save())
        {
            return redirect('/admin/banner/create')->with('success', 'Inserted Successfully');
        }
        else
        {
            return redirect('/admin/banner/create')->with('error', 'Something Went Wrong');
        }
    }

    
    public function show(Banner $banner)
    {
        //
    }

    
    public function edit(Banner $banner)
    {
        return view('admin.banner.update',compact('banner'));
    }

    
    public function update(Request $request, Banner $banner)
    {
        if($request->hasFile('image'))
           {
                $validated = $request->validate([
                    'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:300',
                ]);
                $imageName = date('Ymdhis').'.'.request()->image->getClientOriginalExtension();
                request()->image->move(public_path('banner_image'), $imageName);
               
                $previous_path=public_path().'/banner_image/'.$request->previous_image;
                if($request->previous_image!='')
                {
                    if(File::exists($previous_path)){
                        unlink($previous_path);
                    }
                } 
           }
           else
           {
                $imageName=$request->previous_image;
           }

        $banner->image = $imageName;
        $banner->url_link = $request->url_link;
        $banner->start_date = $request->start_date;
        $banner->end_date = $request->end_date;
        $banner->active_status = $request->active_status;
        if($banner->save())
        {
            return redirect('/admin/banner/'.$banner->id.'/edit')->with('success', 'Updated Successfully');
        }
        else
        {
            return redirect('/admin/banner/'.$banner->id.'/edit')->with('error', 'Something Went Wrong');
        }
    }

   
    public function destroy(Banner $banner)
    {
        $previous_path=public_path().'/banner_image/'.$banner->image;
        if($banner->image!='')
        {
            if(File::exists($previous_path)){
                unlink($previous_path);
            }
        } 
        if ($banner->delete()) {
            return redirect('/admin/banner/')->with('success', 'Deleted Successfully');
        }
    }
}
