<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;
use File;
use DB;

class PackageController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Kolkata');
    }
    public function index()
    {
        return view('admin.package.view');
    }

    
    public function create()
    {
        return view('admin.package.create');
    }

   
    public function store(Request $request)
    {
        $titleArray=explode(' ',strtolower($request->title));
	    $titleKeyword=implode('-',$titleArray);


        $package=New Package;
        $package->title = $request->title;
        $package->price = $request->price;
        $package->days = $request->days;
        $package->details = $request->details;
        $package->keyword = $titleKeyword;
        if($package->save())
        {
            return redirect('/admin/package/create')->with('success', 'Inserted Successfully');
        }
        else
        {
            return redirect('/admin/package/create')->with('error', 'Something Went Wrong');
        }
    }

    
    public function show(Package $package)
    {
        //
    }

    
    public function edit(Package $package)
    {
        return view('admin.package.update',compact('package'));
    }

    
    public function update(Request $request, Package $package)
    {
        $titleArray=explode(' ',strtolower($request->title));
	    $titleKeyword=implode('-',$titleArray);


        $package->title = $request->title;
        $package->price = $request->price;
        $package->days = $request->days;
        $package->details = $request->details;
        $package->keyword = $titleKeyword;
        if($package->save())
        {
            return redirect('/admin/package/'.$package->id.'/edit')->with('success', 'Updated Successfully');
        }
        else
        {
            return redirect('/admin/package/'.$package->id.'/edit')->with('error', 'Something Went Wrong');
        }
    }

   
    public function destroy(Package $package)
    {
        if ($package->delete()) {
            return redirect('/admin/package/')->with('success', 'Deleted Successfully');
        }
    }
}
