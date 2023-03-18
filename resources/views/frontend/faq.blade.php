<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>FAQ | Jibika - Free classifieds in India, Buy and Sell for free anywhere in India with Jibika Online Classified Advertising</title>
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
    <h1 class="title">FAQ</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">FAQ</li>
      </ol>
    </nav>
  </div>
  <!-- Column --> 
</div>
</div>
  </div>
</section>
<!-- End banner --> 

<section id="asked_questions" class="blog-with-sidebar-area asked_questions">
    <div class="container">
    <div class="row justify-content-center m-b-30">
        <div class="col-md-9 text-center">
          <h2 class="title">Frequently asked questions</h2>
          
          
        </div>
      </div>
      <div class="row justify-content-center"> 
        <div class="col-md-10 col-sm-12 col-xs-12">
    <div class="panel-group" id="accordion">

      @php
      $faq_row=DB::table('faqs')->get();
      @endphp
      @foreach ($faq_row as $faq_result)
        <div class="panel panel-default">
          <div class="panel-heading">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$loop->iteration }}" class="panel-title expand d-flex">
              <div class="right-arrow pull-right">+</div>
              <p>{{$faq_result->question}}</p>
            </a>
          </div>
          <div id="collapse{{$loop->iteration }}" class="panel-collapse collapse">
            <div class="panel-body">{{$faq_result->answer}}</div>
          </div>
        </div>
      @endforeach   
      
      
    </div> 
        </div>
      </div>
    </div>
  </section>

<!-- App_Store -->
<section class="app_store app_store2">
  <div class="container"> 
    <!-- Row  -->
    <div class="row justify-content-center">
      <div class="col-md-4 text-center jibika-mob my-auto">
        <img style="width:100%;" src="{{ URL::asset('public/assets/images/phone-app.png')}}">
      </div>
      <div class="col-md-5 text-center my-auto">
        <h2 class="title">TRY THE JIBIKA APP</h2>
        <div class="clearfix"></div>
        <h6 class="subtitle">Buy, sell and find just about anything using the app on your mobile.</h6>
      </div>
      <div class="col-md-3 text-center my-auto">
        <h2 class="title2">GET YOUR APP TODAY</h2>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-6 col-6">
                <img src="{{ URL::asset('public/assets/images/google_play.png')}}" style="height: 40px;">
            </div>
            <div class="col-md-6 col-6">
                <img src="{{ URL::asset('public/assets/images/appstore_2x.png')}}" style="height: 40px;">
            </div>
        </div>
        </div>
    </div>
  
  </div>
</section>
<!-- End App_Store -->

    @include('frontend.include.footer')