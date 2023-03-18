<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Success | Jibika - Free classifieds in India, Buy and Sell for free anywhere in India with Jibika Online Classified Advertising</title>
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
    .dashboard-anchor:hover{
        color: #fff;
        text-decoration: none;
    }
</style>

<!-- Highlight -->
<section class="featured_ads" style="margin-top:82px;">
    <div class="container"> 
      <!-- Row  -->
      <div class="row justify-content-center pt-5">
      <div class="col-md-5">
        <img src="{{ URL::asset('public/assets/images/thankyou.png')}}" alt="" style="width:100%;">
        </div>
        <div class="col-md-8 text-center">
          <h2 class="title" style="margin:25px 0 10px;">Payment is successful</h2>
          <h6 class="subtitle">Your Ad will be visible after approval of admin. <strong> Please keep patience.</strong></h6>
        </div>
      </div>
      <!-- Row  -->
      <div class="row justify-content-center">
       
        <a class="dashboard-anchor" href="{{ url('/dashboard') }}"><button class="view-btn hvr-pulse-grow" style="margin: 10px auto 40px;width: auto !important;padding: 3px 16px;">Go To Dashboard</button></a>
      </div>
    </div>
  </section>
  <!-- End Highlight --> 
@include('frontend.include.footer')