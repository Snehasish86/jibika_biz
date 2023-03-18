<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; 
use Illuminate\Support\Facades\Hash;
use Auth;
use Mail;
 
use App\Mail\RegisterMail;

class UserController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Kolkata');
    }
    public function index()
    {
        return view('frontend.login');
    }
    public function register()
    {
        return view('frontend.register');
    }
    
    public function editProfile()
    {
        return view('frontend.edit_profile');
    }
    public function forgot_password()
    {
        return view('frontend.forgot_password');
    }
    
    
    public function checkemail_sendotp(Request $request)
    {
        if(session()->get('otp_verification')=='success')
        {
            $UserEmailId=session()->get('user_emailid');
            $validated = $request->validate([
            'password' => 'required|min:8|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!@$#%]).*$/|',
                ]);
                $check=DB::table('users')->where('email',$UserEmailId)->count();
                if($check>0)
                {
                    $password=Hash::make($request->password);
                    $update=DB::table('users')->where('email',$UserEmailId)->update(['password' => $password]);
                    if($update==true)
                    {
                         $request->session()->forget('password_otp');
                        $request->session()->forget('user_emailid');
                        $request->session()->forget('otp_verification');
                        return redirect('/forgot-password')->with('success', 'Password Updated Successfully');
                    }
                    else
                    {
                        return redirect('/forgot-password')->withInput()->with('error', 'Something Went Wrong');
                    }
                }
                else
                {
                    return redirect('/forgot-password')->withInput()->with('error', 'Invalid Registered Email Id !');
                }
        }
        else
        {
        if($request->otp=='')
        {
            $check=DB::table('users')->where('email',$request->email)->count();
            $user_email=$request->email;
            if($check>0)
            {
                $otp=rand(111111,999999);
                $to = $user_email;
            $subject = "Forgot Password Verify";
           
            $message = "
            <html>
            <head>
            <title>Forgot Password Verify</title>
            </head>
            <body>
            <table>
            <tr>
            <th>OTP</th>
            </tr>
            <tr>
            <td>".$otp."</td>
            </tr>
            </table>
            <p>By Jibika</p>
            </body>
            </html>
            ";
           
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
           
            // More headers
            $headers .= 'From: <info@jibika.biz>';
            
            $request->session()->put('password_otp', $otp);
            $request->session()->put('user_emailid', $user_email);
           
            mail($to,$subject,$message,$headers);
            
                return redirect('/forgot-password')->withInput()->with('success', 'OTP send successfully');
                
            }
            else
            {
                return redirect('/forgot-password')->withInput()->with('error', 'Invalid Registered Email Id !');
            }
        }
        else
        {
            $original_otp=session()->get('password_otp');
            $user_otp=$request->otp;
            $user_mailid=session()->get('user_emailid');
            if($original_otp==$user_otp)
            {
                $request->session()->put('otp_verification', 'success');
                 return redirect('/forgot-password');
            }
            else
            {
                return redirect('/forgot-password')->withInput()->with('error', 'Invalid OTP!');
            }
        }
        
        }
        
    }
    
    public function clear_all(Request $request)
    {
        $request->session()->forget('password_otp');
        $request->session()->forget('user_emailid');
        $request->session()->forget('otp_verification');
        return redirect('/forgot-password');
    }
    
    public function resend_otp(Request $request)
    {
        $otp=rand(111111,999999);
            $to = $request->session()->get('user_emailid');
            $subject = "Forgot Password Verify";
           
            $message = "
            <html>
            <head>
            <title>Forgot Password Verify</title>
            </head>
            <body>
            <table>
            <tr>
            <th>OTP</th>
            </tr>
            <tr>
            <td>".$otp."</td>
            </tr>
            </table>
            <p>By Jibika</p>
            </body>
            </html>
            ";
           
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
           
            // More headers
            $headers .= 'From: <info@jibika.biz>';
            
            $request->session()->put('password_otp', $otp);
           
            mail($to,$subject,$message,$headers);
            
            return redirect('/forgot-password')->withInput()->with('success', 'OTP send successfully');
    }
    
    public function updatePassword(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'password' => 'required|min:8|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!@$#%]).*$/|',
        ]);
        $check=DB::table('users')->where('email',$request->email)->count();
        if($check>0)
        {
            $password=Hash::make($request->password);
            $update=DB::table('users')->where('email',$request->email)->update(['password' => $password]);
            if($update==true)
            {
                return redirect('/forgot-password')->with('success', 'Password Updated Successfully');
            }
            else
            {
                return redirect('/forgot-password')->withInput()->with('error', 'Something Went Wrong');
            }
        }
        else
        {
            return redirect('/forgot-password')->withInput()->with('error', 'Invalid Registered Email Id !');
        }
        
        
    }
    public function newRegister(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|max:50',
            'phone' => 'required|digits:10|numeric',
            'password' => 'required|min:8|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!@$#%]).*$/|',
        ]);

        $user=New User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->city=$request->city;
        $user->active_status='YES';
        if($user->save())
        {
            if(Auth::guard('user')->attempt(['email'=>$request->email,'password'=>$request->password,'active_status'=>'YES'])){
                return redirect('/dashboard');
            }
            // return redirect('/register')->with('success', 'Registered Successfully');
        }
        else
        {
            return redirect('/register')->withInput()->with('error', 'Something Went Wrong');
        }
          
    }
    public function userLogin(Request $request)
    {
        if(Auth::guard('user')->attempt(['email'=>$request->email,'password'=>$request->password,'active_status'=>'YES'])){
            return redirect('/dashboard');
        }
        else{
            return redirect('/')->withInput()->with('loguin_error', 'Invalid Credentials');
        }
    }
   
    public function update_profile(Request $request)
    {
        // dd($request->all());
        $result=array(
            'name'=>$request->name,
            'phone'=>$request->phone,
            'city'=>$request->city
        );
        // dd($result);
        $status = DB::table('users')->where('id', Auth::guard('user')->user()->id)->update($result);

        if($status==true){
            return redirect('/user-profile')->with('success', 'Updated Successfully');
        }
        else{
            return redirect('/user-profile')->withInput()->with('error', 'Something Went Wrong');
        }
        
        // $validatedData = $request->validate([
            // 'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            // 'phone' => 'required|digits:10|numeric',
            // 'pincode' => 'required|digits:6|numeric'
    
        //    ]);
        
                    // if($request->hasFile('image'))
                    // {
                    //         $imageName = time().'.'.request()->image->getClientOriginalExtension();
                    //         request()->image->move(public_path('user_image'), $imageName);
                        
                    //         $previous_path=public_path().'/user_image/'.$request->previous_image;
                    //         if($request->previous_image!='')
                    //         {
                    //             if(File::exists($previous_path)){
                    //                 unlink($previous_path);
                    //             }
                    //         } 
                    // }
                    // else
                    // {
                    //         $imageName=$request->previous_image;
                    // }
        
    }

    public function update_password(Request $request)
    {
        //   dd($request->all());
        $password=$request->password;
        
        // if(Auth::guard('user')->attempt(['unique_id'=>Auth::guard('user')->user()->unique_id,'password'=>$request->old_password]))
        // {
            
                $validated = $request->validate([
                    'password' => 'required|min:8|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!@$#%]).*$/|',
                ]);
                $result=array(
                    'password'=>Hash::make($request->password)
                );
                $status = DB::table('users')
                    ->where('id', Auth::guard('user')->user()->id)
                    ->update($result);

                if($status==true){
                    return redirect('/change-password')->with('success', 'Password Updated Successfully');
                }
                else{
                    return redirect('/change-password')->with('error', 'Something Went Wrong!');
                }
            
        // }
        // else
        // {
        //     return redirect('/change-password')->withInput()->with('error', 'Old Password is wrong!');
        // }
        
    }
    
    
    public function order()
    {
        return view('frontend.order');
    }
    public function dashboard()
    {
        return view('frontend.dashboard');
    }
    public function wishlist()
    {
        return view('frontend.wishlist');
    }
    public function userProfile()
    {
     return view('frontend.user_profile');
    }
    
    public function change_password()
    {
        return view('frontend.change_password');
    }
    
    public function signout()
    {
        Auth::guard('user')->logout();
        return redirect('/');
    }
}
