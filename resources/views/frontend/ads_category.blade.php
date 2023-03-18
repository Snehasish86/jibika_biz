<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Ads Category | Jibika - Free classifieds in India, Buy and Sell for free anywhere in India with Jibika Online Classified Advertising</title>
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
$today_date=date('Y-m-d');
$category_keyword=$category;
$subcategory_keyword=$subcategory;

$category_details=DB::table('categories')->where('keyword',$category_keyword)->first();
$subcategory_details=DB::table('subcategories')->where('keyword',$subcategory_keyword)->first();
@endphp
<!-- banner -->
<section class="banner">
  <div class="banner-innerpage Category_banner">
<div class="container"> 
<!-- Row  -->
<div class="row justify-content-center"> 
<!-- Column -->
<div class="text-center">
  <h1 class="title">{{ $category_details->category }}</h1>
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ $subcategory_details->subcategory }}</li>
    </ol>
  </nav>
</div>
<!-- Column --> 
</div>
</div>
</div>
</section>
<!-- End banner --> 

<!-- Categories -->
<section class="top_listings pb-4">
  <div class="container"> 
  <!-- Row  -->
  <div class="row justify-content-center">
    <div class="col-md-7 text-center">
      <h2 class="title">{{ $subcategory_details->subcategory }} Listing</h2>
    </div>
  </div>
  <!-- Row  -->
  {{-- <div class="row">
  <form class="top_listings_search">
                  <div class="form-group">
                    <input class="form-control text-truncate" placeholder="Keywords" type="email">
                  </div>
                  <div class="form-group selectdiv">
                    <select class="form-control text-truncate">
                      <option>All categories</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                    </select>
                  </div>
                  <div class="form-group selectdiv">
                    <select class="form-control text-truncate">
                      <option>Posted By</option>
                      <option>Vehicles</option>
                      <option>Electronics</option>
                      <option>Mobiles</option>
                      <option>Furniture</option>
                      <option>Fashion</option>
                      <option>Real Estate</option>
                      <option>Animals</option>
                      <option>Education</option>
                      <option>Baby products</option>
                      <option>Services</option>
                      <option>Furniture</option>
                    </select>
                  </div>
                  
                  <div class="form-group selectdiv">
                    <select class="form-control text-truncate">
                      <option>Price Range</option>
                      <option>Vehicles</option>
                      <option>Electronics</option>
                      <option>Mobiles</option>
                      <option>Furniture</option>
                      <option>Fashion</option>
                      <option>Real Estate</option>
                      <option>Animals</option>
                      <option>Education</option>
                      <option>Baby products</option>
                      <option>Services</option>
                      <option>Furniture</option>
                    </select>
                  </div>
                </form>
  </div> --}}
  
  <div class="row">
      @php
      $highlight_row=DB::table('ads')
                      ->where('cat_id',$category_details->id)
                      ->where('subcat_id',$subcategory_details->id)
                      ->where('active_status','YES')
                      ->where('start_date', '<=', $today_date)
                      ->where('end_date', '>=', $today_date)
                      ->get();
      @endphp
      @foreach ($highlight_row as $highlight_result)
      @php
          $ad_image=explode(',',$highlight_result->image);
          $main_image=$ad_image[0];
          $city_result=DB::table('cities')->where('id',$highlight_result->city)->first();
          $package_result=DB::table('packages')->where('id',$highlight_result->package)->first();
          
           $originalDate = $highlight_result->created_at;
          $newDate = date("F j", strtotime($originalDate));
          
          $title_count=strlen($highlight_result->title);
          $feature_count=strlen($highlight_result->feature);
      @endphp
      <div class="col-xl-3 col-lg-3 col-6">
        <div class="featured-parts rounded m-t-30">
          <div class="featured-img">
              <a href="{{ url('/ad-details/'.$highlight_result->keyword) }}"> <img class="img-fluid rounded-top" src="{{ URL::asset('public/ads_image/'.$main_image) }}" alt="Highlight Ads"/></a>
            <div class="featured-new"> {{ $package_result->title }} </div>
             @if (Auth::guard('user')->check())
            <a href="javascript:void(0)" class="heart-icon wishlistbtn" data-id="{{$highlight_result->id}}"><i class="fa fa-heart-o"></i> </a>
            <a href="{{ url('/ad-report/'.$highlight_result->keyword) }}" class="flag-icon" data-id="{{$highlight_result->id}}"><i class="fa fa-flag"></i> </a>
             @else
             <a href="javascript:void(0)" class="heart-icon" data-toggle="modal" data-target="#login"><i class="fa fa-heart-o"></i> </a>
             @endif
          </div>
          <div class="featured-text">
            <div class="text-top d-flex justify-content-between">
              <div class="heading"> <a href="{{ url('/ad-details/'.$highlight_result->keyword) }}">{{substr($highlight_result->title,0,40)}}{{$title_count>40?'...':''}}</a> </div>
              <!--<div class="book-mark"><a href="javascript:void(0)"><i class="fa fa-bookmark"></i></a></div>-->
            </div>
            <div class="text-stars m-t-5">
              <p>{{substr($highlight_result->feature,0,25)}}{{$feature_count>25?'...':''}}</p>
              <p>₹ {{$highlight_result->price}}</p>
            <!--<i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>-->
              </div>
            <div class="featured-bottum m-t-30">
              <ul class="d-flex justify-content-between list-unstyled m-b-20">
                <li><a href="javascript:void(0)"><i class="fa fa-map-marker"></i> {{ $city_result->city }} </a></li>
                <li><p>{{$newDate}}</p></li>
                {{-- <li><a href="#"><i class="fa fa-heart-o"></i> Save</a> </li> --}}
              </ul>
            </div>
          </div>
        </div>
      </div>
      @endforeach
      
  
  
    
      {{-- <button class="view-btn hvr-pulse-grow" type="submit" value="button">View all</button> --}}
    </div>
  </div>
  </section>
  <!-- End Categories --> 
  
  <section class="py-4">
    <div class="container">
         {!! $subcategory_details->seo_content !!}
    </div>
   
</section>

@include('frontend.include.footer')