<!--<!doctype html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--<meta charset="utf-8">-->
<!--<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">-->
<!--<title>Jibika - Free classifieds in India, Buy and Sell for free anywhere in India with Jibika Online Classified Advertising</title>-->
<!--<meta name="description" content="Jibika has 1000+ ads available in India of goods for sale from cars, furniture, electronics to jobs and services listings. Buy or sell something today!" />-->
<!--<link rel="canonical" href="https://www.jibika.biz/" />-->
<!--<link rel="alternate" hreflang="x-default" href="https://www.jibika.biz/" />-->
<!--<link rel="alternate" hreflang="en-in" href="https://www.jibika.biz/" />-->
<!--<meta name="keywords" content="buy and sell, free ad post, free classified site">-->
<!--<meta property="og:locale" content="en_US" />-->
<!--<meta property="og:type" content="website" />-->
<!--<meta property="og:title" content="Jibika - Free classifieds in India, Buy and Sell for free anywhere in India with Jibika Online Classified Advertising" />-->
<!--<meta property="og:description" content="Jibika has 1000+ ads available in India of goods for sale from cars, furniture, electronics to jobs and services listings. Buy or sell something today!" />-->
<!--<meta property="og:url" content="https://www.jibika.biz/" />-->
<!--<meta property="og:site_name" content="Jibika.Biz" />-->
<!--<link rel="shortcut icon" href="{{ URL::asset('public/dashboard_assets/images/favicon.ico')}}">-->


    <!-- Global site tag (gtag.js) - Google Analytics -->





<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="{{ URL::asset('public/assets/css/font-awesome.min.css')}}" />
<link rel="stylesheet" href="{{ URL::asset('public/assets/css/style.css') }}">
<link rel="stylesheet" href="{{ URL::asset('public/assets/css/owlcarousel/owl.carousel.min.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('public/assets/css/owlcarousel/owl.theme.default.min.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('public/assets/css/custom.css') }}">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
<style>
    .bg-light {
    background-color: #ebeeef!important;
    }
    @media (max-width: 991px) {
    .navbar-collapse {
        position: fixed;
        top: 70px;
        left: 0;
        padding-left: 15px;
        padding-right: 15px;
        padding-bottom: 15px;
        width: 220px;
        height: 100%;
    }

    .navbar-collapse.collapsing {
        left: -75%;
        transition: height 0s ease;
    }

    .navbar-collapse.show {
        left: 0;
        transition: left 300ms ease-in-out;
    }

    .navbar-toggler.collapsed ~ .navbar-collapse {
        transition: left 500ms ease-in-out;
    }
}

.password_class{
    position: absolute;
    top: 8px;
    right: 30px;
}
</style>
</head>
<body>
@if(session()->has('loguin_error'))
    <script>swal("Oops!", "Invalid Creadential!", "error");</script>   
@endif
<div class="topbar"> 
  <!-- Header  -->
  <div class="header">
    <div class="container po-relative">
      <nav class="navbar navbar-expand-lg hover-dropdown header-nav-bar">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#h5-info" aria-expanded="false" aria-label="Toggle navigation">
              <i class="fa fa-bars d-md-block d-none"></i>
              <img class="d-md-none d-block" src="{{ URL::asset('public/assets/images/menu.png')}}" style="transform: rotate(90deg);width:auto;height:30px;">
        </button>
           <a href="{{ url('/') }}" class="navbar-brand d-md-block d-none"><img src="{{ URL::asset('public/assets/images/logo-light.png')}}" alt="Classified Plus"></a>
           <a href="{{ url('/') }}" class="navbar-brand d-md-none d-block"><img src="{{ URL::asset('public/assets/images/small_logo.png')}}" alt="Classified Plus"></a>
           <div class="d-lg-none d-inline-block">
               <form class="book-now-home" method="get" action="{{ url('/search-result') }}">
                    <div class="form-group selectdiv">
                      <select class="form-control border-left-0 text-truncate" name="city" required>
                        <option value="">City</option>
                          @php
                          $city_row=DB::table('cities')->get();
                          @endphp
                          @foreach ($city_row as $city_result)
                            <option value="{{$city_result->keyword}}">{{$city_result->city}}</option>                      
                          @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control text-truncate" placeholder="Find Cars, Mobiles and more..." name="search_result" required>
                    </div>
                    <button type="submit" class="btn btn-primary booknow btn-skin"><i class="fa fa-search" aria-hidden="true"></i></button>
                  </form>
           </div>
        <div class="collapse navbar-collapse" id="h5-info">
          <ul class="navbar-nav ml-auto">
              <li class="nav-item my-auto d-lg-block d-none">
              <form class="book-now-home" method="get" action="{{ url('/search-result') }}">
                    <div class="form-group selectdiv">
            @if (Auth::guard('user')->check())
          
                     <select class="form-control border-left-0 text-truncate" name="city" required>
                        <option value="">City</option>
                          @php
                          $city_row=DB::table('cities')->get();
                          @endphp
                          @foreach ($city_row as $city_result)
                            <option value="{{$city_result->keyword}}" {{Auth::guard('user')->user()->city==$city_result->id?'selected':''}}>{{$city_result->city}}</option>                      
                          @endforeach
                      </select>
            @else
                    <select class="form-control border-left-0 text-truncate" name="city" required>
                        <option value="">City</option>
                          @php
                          $city_row=DB::table('cities')->get();
                          @endphp
                          @foreach ($city_row as $city_result)
                            <option value="{{$city_result->keyword}}" >{{$city_result->city}}</option>                      
                          @endforeach
                      </select>
            @endif
                  
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control text-truncate" placeholder="Find Cars, Mobiles and more..." name="search_result" required>
                    </div>
                    <button type="submit" class="btn btn-primary booknow btn-skin"><i class="fa fa-search" aria-hidden="true"></i></button>
                  </form>
                  </li>
              
            <!--<li class="nav-item"> <a class="nav-link" href="{{ url('/') }}"><i class="fa fa-home" aria-hidden="true"></i> Home </a></li>-->
              
            <li class="nav-item"> <a class="nav-link"  href="{{ url('/categories') }}">All Categories</a></li>
            
            @if (Auth::guard('user')->check())
            <li class="nav-item"> <a class="nav-link"  href="{{ url('/signout') }}" ><i class="fa fa-power-off m-r-5" aria-hidden="true"></i> Logout</a></li>
            @else
            <li class="nav-item"> <a class="nav-link"  href="javascript:void(0)" data-toggle="modal" data-target="#login"><i class="fa fa-user m-r-5"></i> Login/Register</a></li>
            @endif
            
            <li class="nav-item d-none extra-menu"> <a class="nav-link" href="{{ url('/user-profile') }}"><i class="fa fa-user-o m-r-5"></i> Account</a></li>
            <li class="nav-item d-none extra-menu"> <a class="nav-link" href="{{ url('/support') }}"><i class="fa fa-info m-r-5"></i> Help & Support</a></li>
            <li class="nav-item d-none extra-menu"> <a class="nav-link" href="{{ url('faq') }}"><i class="fa fa-question m-r-5"></i> FAQ</a></li>
            <li class="nav-item d-none extra-menu"> <a class="nav-link" href="{{ url('/privacy-policy') }}"><i class="fa fa-shield m-r-5"></i> Privacy Policy</a></li>
            <li class="nav-item d-none extra-menu"> <a class="nav-link" href="{{ url('/terms-condition') }}"><i class="fa fa-file-text-o m-r-5"></i> Terms & Conditions</a></li>

            <!--<li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>-->
            <!--  <ul class="b-none dropdown-menu font-14 animated fadeInUp">-->
            <!--  <li><a class="dropdown-item" href="05-About_Us-Page.html">About Us</a></li>-->
            <!--    <li><a class="dropdown-item" href="06-Blog-Page.html">Blog </a></li>-->
            <!--    <li><a class="dropdown-item" href="07-Blog_Detail-Page.html">Blog Detail</a></li>-->
            <!--    <li><a class="dropdown-item" href="#" data-toggle="modal" data-target="#login">Register/Sign In</a></li>-->
            <!--    <li><a class="dropdown-item" href="26-Faq-Page.html">Faq</a></li>-->
            <!--    <li><a class="dropdown-item" href="27-Faq_Right-Category-Page.html">Faq Right Category</a></li>-->
            <!--    <li><a class="dropdown-item" href="29-404-Page.html">404</a></li>-->
            <!--    <li><a class="dropdown-item" href="30-404_With_Banner-Page.html">404 With Banner</a></li>-->
            <!--  </ul>-->
            <!--</li>-->
            
            
          </ul>
          <div class="header_r d-flex">
            @if (Auth::guard('user')->check())
            <ul class="ml-lg-auto post_ad">
              <li class="nav-item search"><a class="nav-link" href="{{ url('/ads/create') }}"><i class="fa fa-plus" aria-hidden="true"></i> SELL</a></li>
              
            </ul>
            @else
            <ul class="ml-lg-auto post_ad">
              <li class="nav-item search"><a class="nav-link" href="javascript:void(0)" data-toggle="modal" data-target="#login"><i class="fa fa-plus" aria-hidden="true"></i> SELL</a></li>
              
            </ul>
            <!--<div class="loin"> <a class="nav-link" href="javascript:void(0)" data-toggle="modal" data-target="#login"><i class="fa fa-user m-r-5"></i>Register/Sign In</a>  </div>-->
            @endif
            
            
          </div>
        </div>
      </nav>
    </div>
  </div>
   
  
    <!-- Modal -->
  <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Register to Jibika</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true"><img src="{{ URL::asset('public/assets/images/close.png')}}" alt="Classified Plus"></span> </button>
        </div>
       
        <div class="modal-body">
        {{-- <div class="list-unstyled list-inline social-login">
        <a href="#" class="facebook"> <img src="images/fb.png" alt="Classified Plus">Continue wiith Facbook</a>
        <a href="#" class="google"> <img src="images/google_p.png" alt="Classified Plus"> <span>Continue with Google</span></a>
        </div>
          <div class="or-divider">
            <h6>or</h6>
          </div> --}}
          <form action="{{ url('/newRegister') }}" method="POST">
            @csrf
          <div class="row">
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
                <input type="number" class="form-control" name="phone" placeholder="Mobile Number" required>
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
                <input type="password" class="form-control" name="password" placeholder="Create Password" required>
              </div>
            </div>
            
            <div class="col-sm-12">
              <div class="form-group has-feedback">
                <input type="password" class="form-control"  name="confirm_password" placeholder="Confirm Password" required>
              </div>
            </div>
            
          </div>
          <div class="form-group">
            <button type="submit" class="buttons login_btn"  name="Register" value="Register" disabled>
              Continue 
            </button>
          </div>
        </form>

          <div class="form-info">
			<p class="text-center p-b-10">By Register I agree to receive emails.</p>
		</div>
          
        </div>
        {{-- <div class="register text-center">Already a member? <a href="#">Login</a></div> --}}
      </div>
    </div>
  </div>
  <!-- End Header  --> 
</div>

 <!-- Modal -->
 <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Login to Jibika</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true"><img src="{{ URL::asset('public/assets/images/close.png')}}"  alt="Classified Plus"></span> </button>
      </div>
      <div class="modal-body">
      {{-- <div class="list-unstyled list-inline social-login">
      <a href="#" class="facebook"> <img src="images/fb.png" alt="Classified Plus">Continue wiith Facbook</a>
      <a href="#" class="google"> <img src="images/google_p.png" alt="Classified Plus"> <span>Continue with Google</span></a>
      </div>
        <div class="or-divider">
          <h6>or</h6>
        </div> --}}
        <form action="{{ url('/userLogin') }}" method="POST">
          @csrf
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group has-feedback">
              <input type="email" class="form-control" name="email" placeholder="Email ID" required>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group has-feedback">
              <input type="password" class="form-control" name="password" placeholder="Password" id="myInput" required>
              <i class="bi bi-eye-slash password_class" id="togglePassword1"></i>
              <i class="bi bi-eye password_class" id="togglePassword2" style="display:none;"></i>
            </div>
          </div>
        </div>
        <div class="form-group">
          <button type="submit" class="buttons login_btn" name="login" value="Login">
            Continue 
          </button>
          </div>
        </form>

        <div class="form-info">
    {{-- <div class="md-checkbox">
      <input type="checkbox" name="rememberme" id="rememberme" value="forever">
      <label for="rememberme" class="">Remember me</label>
    </div> --}}
    <div class="forgot-password">
      <a href="{{ url('/forgot-password') }}">Forgot password?</a>
    </div>
  </div>
        
      </div>
      {{-- <div class="register text-center">Not a member yet? <a href="#" data-toggle="modal" data-target="#register">Register</a></div> --}}
      <div class="register text-center">Not a member yet? <a href="{{ url('/register') }}">Register</a></div>
    </div>
  </div>
</div>

<script>
function myFunction() {
  var x = document.getElementById("myInput");
  var icon=document.getElementById("togglePassword");
  if (x.type === "password") {
    x.type = "text";
    icon.class="bi-eye";
  } else {
    x.type = "password";
     icon.class="bi-eye-slash";
  }
}
</script>