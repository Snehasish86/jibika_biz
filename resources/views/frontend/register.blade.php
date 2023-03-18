<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Register | Jibika - Free classifieds in India, Buy and Sell for free anywhere in India with Jibika Online Classified Advertising</title>
<meta name="description" content="Jibika has 1000+ ads available in India of goods for sale from cars, furniture, electronics to jobs and services listings. Buy or sell something today!" />
<link rel="canonical" href="https://www.jibika.biz/" />
<link rel="alternate" hreflang="x-default" href="https://www.jibika.biz/" />
<link rel="alternate" hreflang="en-in" href="https://www.jibika.biz/" />
<meta name="keywords" content="buy and sell, free ad post, free classified site">
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Jibika - Free classifieds in India, Buy and Sell for free anywhere in India with Jibika Online Classified Advertising" />
<meta property="og:description" content="Jibika has 1000+ ads available in India of goods for sale from cars, furniture, electronics to jobs and services listings. Buy or sell something today!" />
<meta property="og:url" content="https://www.jibika.biz/" />
<meta property="og:site_name" content="Jibika.Biz" />
<link rel="shortcut icon" href="{{ URL::asset('public/dashboard_assets/images/favicon.ico')}}">

@include('frontend.include.header')
<style>
    .register-form
    {
        padding: 20px 15px;
        border-radius: 4px;
        box-shadow: 1px 1px 5px 1px #7f7f7fb3;
    }
    .register-form .form-group.btn-wrapper{
        margin-bottom: 0px;
    }
    .register-form h4{
        font-size: 28px;
        font-weight: 500;
        color: #4a4a4a;
        display: inline-block;
        border-bottom: 3px solid #00a651;
        padding-bottom: 6px;
    }
</style>
<!-- banner -->
<section class="banner">
    <div class="banner-innerpage Category_banner">
<div class="container"> 
<!-- Row  -->
<div class="row justify-content-center"> 
  <!-- Column -->
  <div class="text-center">
    <h1 class="title">Signup</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Signup</li>
      </ol>
    </nav>
  </div>
  <!-- Column --> 
</div>
</div>
  </div>
</section>
<!-- End banner --> 



<section class="py-5 text-center">
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form class="register-form" action="{{ url('/newRegister') }}" method="POST">
                @csrf
              <div class="row">
                <div class="col-12 mb-4">
                <h4>Signup Your Account</h4>
                </div>
                @if ($errors->any())
    <div class="alert alert-danger" style="width: 100%;margin: 0px 15px 20px 15px !important;background: gray;color: #fff;">
        <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
            @endif
    @if(session()->has('success'))
        <div class="alert alert-secondary alert-dismissible alert-solid alert-label-icon fade show" role="alert">
            <i class="ri-check-double-line label-icon"></i><strong>Success</strong> - {{ session()->get('success') }}
        </div>
    @endif

    @if(session()->has('error'))
        <div class="alert alert-warning alert-dismissible alert-solid alert-label-icon fade show" role="alert">
            <i class="ri-alert-line label-icon"></i><strong>Error</strong> - {{ session()->get('error') }}
        </div>     
    @endif
                <div class="col-sm-12">
                  <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="name" placeholder="Name" required>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group has-feedback">
                    <input type="Email" class="form-control" name="email" placeholder="Email" required>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group has-feedback">
                    <input type="tel"  pattern="[0-9]{3}[0-9]{3}[0-9]{4}" onkeypress="if(this.value.length==10) return false;"  class="form-control" name="phone" placeholder="Mobile Number" required>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group has-feedback">
                    <select name="city" class="form-control" required>
                      <option value="">Select Your City</option>
                      @php
                      $row=DB::table('cities')->get();
                      @endphp
                      @foreach ($row as $details)
                         <option value="{{$details->id}}">{{$details->city}}</option>                      
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group has-feedback">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Create Password" required>
                    
                  </div>
                </div>
                
                <div class="col-sm-12">
                  <div class="form-group has-feedback">
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>
                    <span id="err_password"></span>
                  </div>
                </div>
                
              </div>
              <div class="form-group btn-wrapper">
                <button type="submit" class="buttons login_btn" id="registerbtn" name="Register" value="Register" disabled>
                  Continue 
                </button>
                <span class="mt-2 d-block" style="color:green;">*Your Password must be a combination of Alphanumeric & Special Characters (a-z, 0-9, A-Z , @,#,$,%,&,*) of 8-32 Characters</span>
              </div>
            </form>
        </div>
    </div>
</div>
</section>

@include('frontend.include.footer')

<script>
    $(document).ready(function(){
      $("#confirm_password").on('keyup',function(){
        // alert();
        var confirm_password=$("#confirm_password").val()
        var password=$("#password").val()
        if(confirm_password==password)
        {
          $("#err_password").html("Password Matched.").css("color","green");
          $("#registerbtn").removeAttr("disabled");
        }
        else
        {
          $("#err_password").html("Password did not match.").css("color","red");
          $("#registerbtn").attr("disabled",true);
        }
      })
    })
  </script>