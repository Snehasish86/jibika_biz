<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Category | Jibika - Free classifieds in India, Buy and Sell for free anywhere in India with Jibika Online Classified Advertising</title>
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

<!-- banner -->
<section class="banner">
    <div class="banner-innerpage Category_banner">
<div class="container"> 
<!-- Row  -->
<div class="row justify-content-center"> 
  <!-- Column -->
  <div class="text-center">
    <h1 class="title">Categories</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Categories</li>
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
<section class="categories">
  <div class="container"> 
    <!-- Row  -->
    <div class="row justify-content-center">
      <div class="col-md-7 text-center m-b-10">
        {{-- <h2 class="title">Categories</h2> --}}
        {{-- <h6 class="subtitle">Explore the greates places in the city.</h6> --}}
      </div>
    </div>
    <!-- Row  -->
    <div class="row">
      <div class="col-md-12">
        <ul class="list-unstyled text-center p-t-30">

          @php
            $category=DB::table('categories')->get();
            @endphp
            @foreach ($category as $category_details)
              <li><a href="{{ url('/category/'.$category_details->keyword) }}"><img src="{{ URL::asset('public/category_image/'.$category_details->image) }}" alt="Jibika Category" style="height: 50px;width:50px;"/>
                <p> {{$category_details->category}} </p>
                </a> 
              </li>
            @endforeach
          
          
        </ul>
      </div>
    </div>
  </div>
</section>
<!-- End Categories --> 

@include('frontend.include.footer')