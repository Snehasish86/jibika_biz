<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Change Password | Jibika - Free classifieds in India, Buy and Sell for free anywhere in India with Jibika Online Classified Advertising</title>
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

<!-- breadcrumb -->
<div class="iner_breadcrumb bg-light p-t-20 p-b-20" style="padding-top: 130px;">
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Change Password</li>
      </ol>
    </nav>
  </div>
</div>
<!-- End breadcrumb -->

<!-- Dashboard_sec -->
<section class="dashboard_sec">
  <div class="container">
    <div class="row justify-content-center">

        @include('frontend.sidesection')

        <div class="col-md-9">
          
            <div class="row mt-md-0 mt-4">
              <div class="col-md-12">
                <div class="profile_detail">
                  <form method="POST" action="{{ url('/update_password') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="dashboard_heding">
                      <h4> Change Password </h4>
                    </div>
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
            
                @if ($errors->any())
                <div class="alert alert-danger p-1 mt-2">
                    <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                    </ul>
                </div>
                @endif
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Create New Password*</label>
                          <input type="password" class="form-control" placeholder="Create New Password" id="password" name="password" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Confirm Password*</label>
                          <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password"  required>
                          <span id="pass_err"></span>
                        </div>
                      </div>
                    </div>
                
                      
                   
                    
                    <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success my-2">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
             
            </div>
          </div>
    </div>
  </div>
</section>
<!-- End Footer -->

@include('frontend.include.footer')
<script>
    $(document).ready(function(){
        $("#confirm_password").on('keyup',function(){
            var confirm_password=$("#confirm_password").val();
            var password=$("#password").val();
            if(confirm_password==password)
            {
                $("#pass_err").html('Password Matched').css('color','green');
            }
            else
            {
                $("#pass_err").html('Password Does Not Matched').css('color','red');
            }
        })
        
        
    })
</script>

