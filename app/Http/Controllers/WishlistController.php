<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Auth;
use File;
use DB;
use Session;

class WishlistController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Kolkata');
    }
    public function index()
    {
        //
    }

    public function add_wishlist(Request $request)
    {
        $ad_id=$request->ad_id;
        $user_id=Auth::guard('user')->user()->id;
        
        $value=array(
            'user_id'=>$user_id,
            'ad_id'=>$ad_id,
            'created_at'=>date('Y-m-d H:i:s'),
            'updated_at'=>date('Y-m-d H:i:s')
            );
            
        $check=DB::table('wishlists')->where('user_id',$user_id)->where('ad_id',$ad_id)->count();
        if($check>0)
        {
            echo "fail";
        }
        else
        {
            $status=DB::table('wishlists')->insert($value);
            echo "success";
        }
    }
    
    public function delete_wishlist(Request $request)
    {
        $wish_id=$request->wish_id;
      
        $delete_row=DB::table('wishlists')->where('id',$wish_id)->delete();
        echo "success";
        
    }
    
    
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wishlist $wishlist)
    {
        //
    }
}
