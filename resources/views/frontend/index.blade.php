<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Jibika - Free classifieds in India, Buy and Sell for free anywhere in India with Jibika Online Classified Advertising</title>
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
    $highlight_ad_count=DB::table('ads')->where('package',4)->count();
    $urgent_ad_count=DB::table('ads')->where('package',3)->count();
    $feature_ad_count=DB::table('ads')->where('package',2)->count();

    $highlight_ad_value=DB::table('packages')->where('id',4)->first();
    $urgent_ad_value=DB::table('packages')->where('id',3)->first();
    $feature_ad_value=DB::table('packages')->where('id',2)->first();
@endphp
<!-- Slider -->
<section class="slider">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      @php
      $banner_row2=DB::table('banners')
                      ->where('active_status','YES')
                      ->where('start_date', '<=', $today_date)
                      ->where('end_date', '>=', $today_date)
                      ->get();
      @endphp
      @foreach ($banner_row2 as $banner_details2)
      @php
          $number=$loop->iteration-1;
      @endphp
      <li data-target="#carouselExampleIndicators" data-slide-to="{{$number}}" class="{{$number==0?'active':''}}"></li>
      @endforeach
      {{-- <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> --}}
    </ol>
    <div class="carousel-inner">
      @php
      $banner_row=DB::table('banners')
                      ->where('active_status','YES')
                      ->where('start_date', '<=', $today_date)
                      ->where('end_date', '>=', $today_date)
                      ->get();
      @endphp
      @foreach ($banner_row as $banner_details)
      <div class="carousel-item {{$loop->iteration==1?'active':'' }}">
           <a href="{{$banner_details->url_link}}" target="_blank"><img src="{{ URL::asset('public/banner_image/'.$banner_details->image) }}" alt="Jibika Banner" class="slide-image"></a>
        <div class="slide-text">
          <div class="container">
            <div class="row">
              <div class="col-md-12">
                <!--<h1>India's Largest Classified Site</h1>-->
                <!--<p>Search from over 15,00,000 classifieds & Post unlimited classifieds free!</p>-->
                <div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
      

      

    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
</section>
<!-- End Slider --> 

<!-- Categories -->
<section class="categories">
  <div class="container"> 
    <!-- Row  -->
    <div class="row justify-content-center">
      <div class="col-md-7 text-center m-b-10">
        <h2 class="title">All Categories</h2>
        <h6 class="subtitle">Explore the greates places in the city.</h6>
      </div>
    </div>
    <!-- Row  -->
    <div class="row">
      <div class="col-md-12">
          <div class="owl-carousel owl-theme" id="slider_category">
                
                    
                      @php
                        $category=DB::table('categories')->get();
                        @endphp
                        @foreach ($category as $category_details)
                        <div class="item text-center">
                          <div><a href="{{ url('/category/'.$category_details->keyword) }}"><img src="{{ URL::asset('public/category_image/'.$category_details->image) }}" alt="Jibika Category" style="height: 50px;width:50px;margin:0 auto;"/>
                            <p> {{$category_details->category}} </p>
                            </a> 
                          </div>
                         </div>
                        @endforeach
                
         </div>
 
      </div>
    </div>
  </div>
</section>
<!-- End Categories --> 




<!-- Highlight -->
<section class="featured_ads bg-light">
  <div class="container"> 
    <!-- Row  -->
    <div class="row justify-content-center">
      <div class="col-md-7 text-center">
        <h2 class="title">Highlight Ads</h2>
        <h6 class="subtitle">Explore the greates places in the city.</h6>
      </div>
    </div>
    <!-- Row  -->
    <div class="row justify-content-center">
      @php
      $highlight_row=DB::table('ads')
                          ->where('package',4)
                          ->where('active_status','YES')
                          ->where('start_date', '<=', $today_date)
                          ->where('end_date', '>=', $today_date)
                          ->orderBy('id','desc')
                          ->limit(12)
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
          <a href="{{ url('/ad-details/'.$highlight_result->keyword) }}"><img class="img-fluid rounded-top" src="{{ URL::asset('public/ads_image/'.$main_image) }}" alt="Highlight Ads"/></a>
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
              <div class="heading"> <a href="{{ url('/ad-details/'.$highlight_result->keyword) }}">{{ substr($highlight_result->title,0,40) }}{{$title_count>40?'...':''}}</a> </div>
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
                <li><p>{{$newDate}}</p> </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      @endforeach
      
        <div class="col-12 text-center">
             <a href="{{ url('/premium-ads/'.$highlight_ad_value->keyword) }}" class="viewall_btn"><button class="view-btn hvr-pulse-grow" type="submit" value="button">View all</button></a>
        </div>

    
     
    </div>
  </div>
</section>
<!-- End Highlight --> 


<!-- how_it_work -->
<section class="how_it_work p-b-50">
  <div class="container">
  <div class="row justify-content-center">
    <div class="col-md-9 text-center">
      <h2 class="title">How it Work</h2>
    </div>
    <h6 class="subtitle col-md-10 text-center">Seller posts an Ad for a Second Hand product. Buyer can makes an offer against the ad. They can also choose to buy right there & then. Seller can then choose to accept or counter the offer. Choose from A wide range of Electronics, Car, bikes, Mobile, household items, and many more categories. Jibika will help you to get the product at the best quality with Best Prices.</h6>
  </div>
  
  <div class="row m-t-40">
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
  <div class="work-parts text-center">
  <div class="work-img m-auto">
  <i class="fa fa-user"></i>
  
  </div>
  <div class="work-part text-center">
  <h3 class="text-capitalize"> join us </h3>
  <p>Complete your registration within 5 minutes with minimum documents</p>
  </div>
  
  </div>
  </div>
  
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
  <div class="work-parts text-center">
  <div class="work-img m-auto">
  <i class="fa fa-pencil"></i>
  </div>
  <div class="work-part text-center">
  <h3 class="text-capitalize"> create ad </h3>
  <p> Creating an Ad is so easy and Fast. Upload your own products from anytime & Anywhere.</p>
  </div>
  
  </div>
  </div>
  
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
  <div class="work-parts text-center">
  <div class="work-img m-auto">
  <i class="fa fa-bullhorn"></i>
  </div>
  <div class="work-part text-center">
  <h3 class="text-capitalize"> Get Offers </h3>
  <p>Connect with us & get exciting offers Curated for YOU.</p>
  </div>
  
  </div>
  </div>
  
  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
  <div class="work-parts text-center">
  <div class="work-img m-auto">
  <i class="fa fa-inr"></i>
  </div>
  <div class="work-part text-center">
  <h3 class="text-capitalize"> sell it </h3>
  <p>Selling so easy that you have never experience before</p>
  </div>
  
  </div>
  </div>
  
  </div>
  </div>
  </section>
  <!-- End how_it_work -->





  <!-- Urgent -->
<section class="trending_ads bg-light">
  <div class="container"> 
    <!-- Row  -->
    <div class="row justify-content-center">
      <div class="col-md-7 text-center">
        <h2 class="title">Urgent Ads</h2>
        <h6 class="subtitle">Explore the greatest ads in the city.</h6>
      </div>
    </div>
    <!-- Row  -->
    <div class="row justify-content-center">
      @php
      $urgent_row=DB::table('ads')
                      ->where('package',3)
                      ->where('active_status','YES')
                      ->where('start_date', '<=', $today_date)
                      ->where('end_date', '>=', $today_date)
                      ->orderBy('id','desc')
                      ->limit(12)
                      ->get();
      @endphp
      @foreach ($urgent_row as $urgent_result)
      @php
          $ad_image=explode(',',$urgent_result->image);
          $main_image=$ad_image[0];
          $city_result=DB::table('cities')->where('id',$urgent_result->city)->first();
          $package_result=DB::table('packages')->where('id',$urgent_result->package)->first();
          
          $originalDate = $urgent_result->created_at;
          $newDate = date("F j", strtotime($originalDate));
          
           $title_count=strlen($urgent_result->title);
          $feature_count=strlen($urgent_result->feature);
      @endphp
      <div class="col-xl-3 col-lg-3 col-6">
        <div class="featured-parts rounded m-t-30">
          <div class="featured-img"> 
          <a href="{{ url('/ad-details/'.$urgent_result->keyword) }}"><img class="img-fluid rounded-top" src="{{ URL::asset('public/ads_image/'.$main_image) }}" alt="Highlight Ads"/></a>
            <div class="featured-new"> {{ $package_result->title }} </div>
            @if (Auth::guard('user')->check())
            <a href="javascript:void(0)" class="heart-icon wishlistbtn" data-id="{{$urgent_result->id}}"><i class="fa fa-heart-o"></i> </a>
            <a href="{{ url('/ad-report/'.$urgent_result->keyword) }}" class="flag-icon" data-id="{{$urgent_result->id}}"><i class="fa fa-flag"></i> </a>
             @else
             <a href="javascript:void(0)" class="heart-icon" data-toggle="modal" data-target="#login"><i class="fa fa-heart-o"></i> </a>
             @endif
          </div>
          <div class="featured-text">
            <div class="text-top d-flex justify-content-between">
              <div class="heading"> <a href="{{ url('/ad-details/'.$urgent_result->keyword) }}">{{ substr($urgent_result->title,0,40) }}{{$title_count>40?'...':''}}</a> </div>
              <!--<div class="book-mark"><a href="javascript:void(0)"><i class="fa fa-bookmark"></i></a></div>-->
            </div>
            <div class="text-stars m-t-5">
              <p>{{substr($urgent_result->feature,0,25)}}{{$feature_count>25?'...':''}}</p>
              <p>₹ {{$urgent_result->price}}</p>
              <!--<i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> -->
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
      
        <div class="col-12">
             <a href="{{ url('/premium-ads/'.$urgent_ad_value->keyword) }}" class="viewall_btn"><button class="view-btn hvr-pulse-grow" type="submit" value="button">View all</button></a>
        </div>

    </div>
  </div>
</section>
<!-- End Urgent --> 


<!-- Trusted -->
<section class="trusted p-b-10">
  <div class="container">
    <div class="row">
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
        <div class="trusted_parts text-center">
          <h3> {{ $feature_ad_count }}+ </h3>
          <p class="p-t-20">Featured Ads</p>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
        <div class="trusted_parts text-center mr-auto">
          <h3> {{ $urgent_ad_count }}+ </h3>
          <p class="p-t-20">Urgent Ads</p>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
        <div class="trusted_parts text-center mr-auto">
          <h3>{{ $highlight_ad_count }}+ </h3>
          <p class="p-t-20">Highlight Ads</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End Trusted --> 

<!-- Featured -->
<section class="featured_ads bg-light">
  <div class="container"> 
    <!-- Row  -->
    <div class="row justify-content-center">
      <div class="col-md-7 text-center">
        <h2 class="title">Featured Ads</h2>
        <h6 class="subtitle">Explore the greates places in the city.</h6>
      </div>
    </div>
    <!-- Row  -->
    <div class="row justify-content-center">
      @php
      $featured_row=DB::table('ads')
                        ->where('package',2)
                        ->where('active_status','YES')
                        ->where('start_date', '<=', $today_date)
                        ->where('end_date', '>=', $today_date)
                        ->orderBy('id','desc')
                        ->limit(12)
                        ->get();
      @endphp
      @foreach ($featured_row as $featured_result)
      @php
          $ad_image=explode(',',$featured_result->image);
          $main_image=$ad_image[0];
          $city_result=DB::table('cities')->where('id',$featured_result->city)->first();
          $package_result=DB::table('packages')->where('id',$featured_result->package)->first();
          
           $originalDate = $featured_result->created_at;
          $newDate = date("F j", strtotime($originalDate));
          
          $title_count=strlen($featured_result->title);
          $feature_count=strlen($featured_result->feature);
      @endphp
      <div class="col-xl-3 col-lg-3 col-6">
        <div class="featured-parts rounded m-t-30">
          <div class="featured-img">
              <a href="{{ url('/ad-details/'.$featured_result->keyword) }}"> <img class="img-fluid rounded-top" src="{{ URL::asset('public/ads_image/'.$main_image) }}" alt="Highlight Ads"/></a>
            <div class="featured-new"> {{ $package_result->title }}</div>
             @if (Auth::guard('user')->check())
            <a href="javascript:void(0)" class="heart-icon wishlistbtn" data-id="{{$featured_result->id}}"><i class="fa fa-heart-o"></i> </a>
            <a href="{{ url('/ad-report/'.$featured_result->keyword) }}" class="flag-icon" data-id="{{$featured_result->id}}"><i class="fa fa-flag"></i> </a>
             @else
             <a href="javascript:void(0)" class="heart-icon" data-toggle="modal" data-target="#login"><i class="fa fa-heart-o"></i> </a>
             @endif
          </div>
          <div class="featured-text">
            <div class="text-top d-flex justify-content-between">
              <div class="heading"> <a href="{{ url('/ad-details/'.$featured_result->keyword) }}">{{substr($featured_result->title,0,40)}}{{$title_count>40?'...':''}}</a> </div>
              <!--<div class="book-mark"><a href="javascript:void(0)"><i class="fa fa-bookmark"></i></a></div>-->
            </div>
            <div class="text-stars m-t-5">
              <p>{{substr($featured_result->feature,0,25)}}{{$feature_count>25?'...':''}}</p>
              <p>₹ {{$featured_result->price}}</p>
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
      <div class="col-12">
          <a href="{{ url('/premium-ads/'.$feature_ad_value->keyword) }}" class="viewall_btn"><button class="view-btn hvr-pulse-grow" type="submit" value="button">View all</button></a>
      </div>
      
    </div>
  </div>
</section>
<!-- End Featured --> 


<!-- We_Bes -->
<section class="we_bes p-b-45">
  <div class="container"> 
    <!-- Row  -->
    <div class="row justify-content-center">
      <div class="col-md-7 text-center">
        <h2 class="title">Why We Are Best</h2>
        <h6 class="subtitle">Explore the greates places in the city.</h6>
      </div>
    </div>
    <!-- Row  -->
    <div class="row justify-content-center">
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
        <div class="d-flex m-t-40">
          <div class="counter_icon mr-3"><i class="fa fa-eye"></i> </div>
          <div class="counter_number">
            <h3> Eye on Quality </h3>
            <p>Get the best Quality at the best Prices guaranteed </p>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
        <div class="d-flex m-t-40">
          <div class="counter_icon mr-3"><i class="fa fa-lock"></i> </div>
          <div class="counter_number">
            <h3> Protection Guaranteed </h3>
            <p>We guarantee your safety with genuine products and sellers. Your safety is our Priorty. </p>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
        <div class="d-flex m-t-40">
          <div class="counter_icon mr-3"><i class="fa fa-comments"></i></div>
          <div class="counter_number">
            <h3> 24/7 Support </h3>
            <p> A dedicated team will be always available to solve issues 24/7 , if you have any. </p>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
        <div class="d-flex m-t-40">
          <div class="counter_icon mr-3"><i class="fa fa-laptop"></i></div>
          <div class="counter_number">
            <h3> Prompt Complaint Response </h3>
            <p> A dedicated team will be always available to solve your complaint 24/7 , if you have any. </p>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
        <div class="d-flex m-t-40">
          <div class="counter_icon mr-3"><i class="fa fa-check-square-o"></i></div>
          <div class="counter_number">
            <h3> Verified Ads </h3>
            <p> Our Ads are Checked thoroughly to ensure your buying process 100% secured</p>
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
        <div class="d-flex m-t-40">
          <div class="counter_icon mr-3"><i class="fa fa-leaf"></i></div>
          <div class="counter_number">
            <h3> Secure Payment Gateway </h3>
            <p> Our Fast and Hassle free payment process makes this process more Easy.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End We_Bes --> 

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

<!-- Testimonial -->
<section class="testimonial p-b-40">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-5 text-center">
        <h2 class="title">Testimonials</h2>
        <h6 class="subtitle">What Our Clients Says</h6>
      </div>
    </div>
    <div class="col-xs-12 m-t-40">
      <ul class="thumbnails owl-carousel owl-theme owl-loaded owl-drag list-unstyled" id="slider_one">
        @php
        $testimonial_row=DB::table('testimonials')->get();
        @endphp
        @foreach ($testimonial_row as $testimonial_details)
        <li>
          <div class="testimonials-parts"> <img src="{{ URL::asset('public/testimonial_image/'.$testimonial_details->image) }}" alt="Testimonial Image"/>
            <div class="testimonials-text">
              <h3 class="p-b-10 m-b-10"> {{$testimonial_details->name}} </h3>
              <p> {{$testimonial_details->description}} </p>
              {{-- <div class="soical-icon ">
                <ul class="list-unstyled d-flex m-t-20">
                  <li class="border mr-1"><a href="#"><i class="fa fa-facebook-f"></i> </a></li>
                  <li class="border mr-1"><a href="#"><i class="fa fa-twitter"></i> </a></li>
                  <li class="border mr-1"><a href="#"><i class="fa fa-google-plus"></i> </a></li>
                  <li class="active border"><a href="#"><i class="fa fa-linkedin"></i> </a></li>
                </ul>
              </div> --}}
            </div>
          </div>
        </li>
            
        @endforeach


        
      </ul>
      <!-- /#myCarousel --> 
      
    </div>
  </div>
</section>
<!-- End Testimonial --> 






@include('frontend.include.footer')

