<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Kolkata');
    }
    public function index()
    {
        return view('admin.city.view');
    }

    
    public function create()
    {
        return view('admin.city.create');
    }

    
    public function store(Request $request)
    {
        $cityArray=explode(' ',strtolower($request->city));
	    $cityKeyword=implode('-',$cityArray);
        
        $city=New City;
        $city->city = $request->city;
        $city->keyword = $cityKeyword;
        $city->seo_content=$request->seo_content;
        if($city->save())
        {
            return redirect('/admin/city/create')->with('success', 'Inserted Successfully');
        }
        else
        {
            return redirect('/admin/city/create')->with('error', 'Something Went Wrong');
        }
    }

    
    public function show(City $city)
    {
        //
    }

    
    public function edit(City $city)
    {
        return view('admin.city.update',compact('city'));
    }

    
    public function update(Request $request, City $city)
    {
        $cityArray=explode(' ',strtolower($request->city));
	    $cityKeyword=implode('-',$cityArray);
	    
	    
        $city->city = $request->city;
        $city->keyword = $cityKeyword;
        $city->seo_content=$request->seo_content;
        if($city->save())
        {
            return redirect('/admin/city/'.$city->id.'/edit')->with('success', 'Updated Successfully');
        }
        else
        {
            return redirect('/admin/city/'.$city->id.'/edit')->with('error', 'Something Went Wrong');
        }
    }

   
    public function destroy(City $city)
    {
        if ($city->delete()) {
            return redirect('/admin/city/')->with('success', 'Deleted Successfully');
        }
    }
}
