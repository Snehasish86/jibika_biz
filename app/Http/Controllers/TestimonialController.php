<?php

namespace App\Http\Controllers;

use App\Models\testimonial;
use Illuminate\Http\Request;
use File;
use DB;

class TestimonialController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Kolkata');
    }
    public function index()
    {
        return view('admin.testimonial.view');
    }

    public function create()
    {
        return view('admin.testimonial.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:300'
        ]);
        $imageName = date('Ymdhis').'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('testimonial_image'), $imageName);

        $testimonial=New Testimonial;
        $testimonial->name = $request->name;
        $testimonial->image = $imageName;
        $testimonial->description = $request->description;
       
        if($testimonial->save())
        {
            return redirect('/admin/testimonial/create')->with('success', 'Inserted Successfully');
        }
        else
        {
            return redirect('/admin/testimonial/create')->with('error', 'Something Went Wrong');
        }
    }

    
    public function show(testimonial $testimonial)
    {
        //
    }

    public function edit(testimonial $testimonial)
    {
        return view('admin.testimonial.update',compact('testimonial'));
    }

    public function update(Request $request, testimonial $testimonial)
    {
        if($request->hasFile('image'))
           {
                $validated = $request->validate([
                    'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:300'
                ]);
                $imageName = date('Ymdhis').'.'.request()->image->getClientOriginalExtension();
                request()->image->move(public_path('testimonial_image'), $imageName);
               
                $previous_path=public_path().'/testimonial_image/'.$request->previous_image;
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

           $testimonial->name = $request->name;
           $testimonial->image = $imageName;
           $testimonial->description = $request->description;
        if($testimonial->save())
        {
            return redirect('/admin/testimonial/'.$testimonial->id.'/edit')->with('success', 'Updated Successfully');
        }
        else
        {
            return redirect('/admin/testimonial/'.$testimonial->id.'/edit')->with('error', 'Something Went Wrong');
        }
    }

    
    public function destroy(testimonial $testimonial)
    {
        $previous_path=public_path().'/testimonial_image/'.$testimonial->image;
        if($testimonial->image!='')
        {
            if(File::exists($previous_path)){
                unlink($previous_path);
            }
        } 
        if ($testimonial->delete()) {
            return redirect('/admin/testimonial/')->with('success', 'Deleted Successfully');
        }
    }
}
