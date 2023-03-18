<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use File;
use DB;

class CategoryController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Kolkata');
    }
    public function index()
    {
        return view('admin.category.view');
    }

    public function create()
    {
        return view('admin.category.create');
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:300',
        ]);
        $imageName = date('Ymdhis').'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('category_image'), $imageName);

        $categoryArray=explode(' ',strtolower($request->category));
	    $categoryKeyword=implode('-',$categoryArray);

        $category=New Category;
        $category->category = $request->category;
        $category->keyword = $categoryKeyword;
        $category->image = $imageName;
        if($category->save())
        {
            return redirect('/admin/category/create')->with('success', 'Inserted Successfully');
        }
        else
        {
            return redirect('/admin/category/create')->with('error', 'Something Went Wrong');
        }
    }

    
    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('admin.category.update',compact('category'));
    }

    
    public function update(Request $request, Category $category)
    {
        if($request->hasFile('image'))
           {
                $validated = $request->validate([
                    'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:300',
                ]);
                $imageName = date('Ymdhis').'.'.request()->image->getClientOriginalExtension();
                request()->image->move(public_path('category_image'), $imageName);
               
                $previous_path=public_path().'/category_image/'.$request->previous_image;
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

        $categoryArray=explode(' ',strtolower($request->category));
	    $categoryKeyword=implode('-',$categoryArray);

        $category->category = $request->category;
        $category->keyword = $categoryKeyword;
        $category->image = $imageName;
    if($category->save())
    {
        return redirect('/admin/category/'.$category->id.'/edit')->with('success', 'Updated Successfully');
    }
    else
    {
        return redirect('/admin/category/'.$category->id.'/edit')->with('error', 'Something Went Wrong');
    }
    }

    public function destroy(Category $category)
    {
        $previous_path=public_path().'/category_image/'.$category->image;
        if($category->image!='')
        {
            if(File::exists($previous_path)){
                unlink($previous_path);
            }
        } 
        if ($category->delete()) {
            return redirect('/admin/category/')->with('success', 'Deleted Successfully');
        }
    }
}
