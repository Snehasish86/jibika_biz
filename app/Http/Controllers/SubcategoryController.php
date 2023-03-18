<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use Illuminate\Http\Request;
use File;
use DB;


class SubcategoryController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Kolkata');
    }
    public function index()
    {
        return view('admin.subcategory.view');
    }

    
    public function create()
    {
        return view('admin.subcategory.create');
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:300',
        ]);
        $imageName = date('Ymdhis').'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('subcategory_image'), $imageName);

        $subcategoryArray=explode(' ',strtolower($request->subcategory));
	    $subcategoryKeyword=implode('-',$subcategoryArray);

        $subcategory=New Subcategory;
        $subcategory->cat_id = $request->cat_id;
        $subcategory->subcategory = $request->subcategory;
        $subcategory->keyword = $subcategoryKeyword;
        $subcategory->image = $imageName;
        $subcategory->seo_content = $request->seo_content;
        
        if($subcategory->save())
        {
            return redirect('/admin/subcategory/create')->with('success', 'Inserted Successfully');
        }
        else
        {
            return redirect('/admin/subcategory/create')->with('error', 'Something Went Wrong');
        }
    }

    
    public function show(Subcategory $subcategory)
    {
        //
    }

    
    public function edit(Subcategory $subcategory)
    {
        return view('admin.subcategory.update',compact('subcategory'));
    }

    
    public function update(Request $request, Subcategory $subcategory)
    {
        if($request->hasFile('image'))
           {
                $validated = $request->validate([
                    'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:300',
                ]);
                $imageName = date('Ymdhis').'.'.request()->image->getClientOriginalExtension();
                request()->image->move(public_path('subcategory_image'), $imageName);
               
                $previous_path=public_path().'/subcategory_image/'.$request->previous_image;
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
        $subcategoryArray=explode(' ',strtolower($request->subcategory));
	    $subcategoryKeyword=implode('-',$subcategoryArray);

        $subcategory->cat_id = $request->cat_id;
        $subcategory->subcategory = $request->subcategory;
        $subcategory->keyword = $subcategoryKeyword;
        $subcategory->image = $imageName;
        $subcategory->seo_content = $request->seo_content;
        if($subcategory->save())
        {
            return redirect('/admin/subcategory/'.$subcategory->id.'/edit')->with('success', 'Updated Successfully');
        }
        else
        {
            return redirect('/admin/subcategory/'.$subcategory->id.'/edit')->with('error', 'Something Went Wrong');
        }
    }

    
    public function destroy(Subcategory $subcategory)
    {
        $previous_path=public_path().'/subcategory_image/'.$subcategory->image;
        if($subcategory->image!='')
        {
            if(File::exists($previous_path)){
                unlink($previous_path);
            }
        } 
        if ($subcategory->delete()) {
            return redirect('/admin/subcategory/')->with('success', 'Deleted Successfully');
        }
    }
}
