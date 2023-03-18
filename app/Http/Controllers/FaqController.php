<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;
use File;
use DB;

class FaqController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Kolkata');
    }
    public function index()
    {
        return view('admin.faq.view');
    }

    
    public function create()
    {
        return view('admin.faq.create');
    }

    
    public function store(Request $request)
    {
        $faq=New Faq;
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        if($faq->save())
        {
            return redirect('/admin/faq/create')->with('success', 'Inserted Successfully');
        }
        else
        {
            return redirect('/admin/faq/create')->with('error', 'Something Went Wrong');
        }
    }

 
    public function show(Faq $faq)
    {
        //
    }

    
    public function edit(Faq $faq)
    {
        return view('admin.faq.update',compact('faq'));
    }

    
    public function update(Request $request, Faq $faq)
    {
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        if($faq->save())
        {
            return redirect('/admin/faq/'.$faq->id.'/edit')->with('success', 'Updated Successfully');
        }
        else
        {
            return redirect('/admin/faq/'.$faq->id.'/edit')->with('error', 'Something Went Wrong');
        }
    }

    
    public function destroy(Faq $faq)
    {
        if ($faq->delete()) {
            return redirect('/admin/faq/')->with('success', 'Deleted Successfully');
        }
    }
}
