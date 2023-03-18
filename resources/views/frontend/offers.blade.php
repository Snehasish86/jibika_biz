<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Offers | Jibika - Free classifieds in India, Buy and Sell for free anywhere in India with Jibika Online Classified Advertising</title>
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
@php
    $total_ad_count=DB::table('ads')->where('user_id',Auth::guard('user')->user()->id)->count();
    $free_ad_count=DB::table('ads')->where('package',1)->count();
    $premium_ad_count=$total_ad_count-$free_ad_count;
@endphp

<style>
    .second-title
    {
        color: green;
        font-weight: 600;
    }
    .first-title
    {
        font-weight: 600;
    }
</style>
<!-- breadcrumb -->
<div class="iner_breadcrumb bg-light p-t-20 p-b-20" style="padding-top: 130px;">
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Offers</li>
      </ol>
    </nav>
  </div>
</div>
<!-- End breadcrumb -->

<!-- Dashboard_sec -->
<section class="dashboard_sec">
  <div class="container">
    <div class="row">

@include('frontend.sidesection')
 @php
    $first_package=DB::table('packages')->where('id',2)->first();
    $second_package=DB::table('packages')->where('id',3)->first();
    $third_package=DB::table('packages')->where('id',4)->first();
@endphp

      <div class="col-md-9">
        <div class="dashboard_main">
          <div class="dashboard_heding">
            <h3>Offers </h3>
          </div>
          <div class="row">
            <div class="col-xl-6 col-lg-6 col-12 mb-2">
              <div class="card-content bg-white">
                <div class="card-body d-flex"> <img src="{{ URL::asset('public/assets/images/dash_box_1.png') }} " alt="Classified Plus">
                  <div class="card_body_text">
                    <h4 class="first-title">{{$first_package->title}} ADS</h4>
                    <p class="second-title">Rs {{$first_package->price}}/- for {{$first_package->days}} days</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-12 mb-2">
              <div class="card-content bg-white">
                <div class="card-body d-flex"> <img src="{{ URL::asset('public/assets/images/dash_box_2.png') }} " alt="Classified Plus">
                  <div class="card_body_text">
                    <h4 class="first-title">{{$second_package->title}} ADS</h4>
                    <p class="second-title">Rs {{$second_package->price}}/- for {{$second_package->days}} days</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-12">
              <div class="card-content bg-white m-0">
                <div class="card-body d-flex"> <img src="{{ URL::asset('public/assets/images/dash_box_3.png') }} " alt="Classified Plus">
                  <div class="card_body_text">
                    <h4 class="first-title">{{$third_package->title}} ADS</h4>
                    <p class="second-title">Rs {{$third_package->price}}/- for {{$third_package->days}} days</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
         
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Footer -->

@include('frontend.include.footer')
