<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Ad Details | Jibika - Free classifieds in India, Buy and Sell for free anywhere in India with Jibika Online Classified Advertising</title>
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
$ad_keyword=$keyword;
$ad_details=DB::table('ads')
                ->where('keyword',$ad_keyword)
                ->where('active_status','YES')
                ->where('start_date', '<=', $today_date)
                ->where('end_date', '>=', $today_date)
                ->first();
$imageArray=explode(',',$ad_details->image);

$city_row=DB::table('cities')->where('id',$ad_details->city)->first();
@endphp


<link rel="stylesheet" href="{{ URL::asset('public/assets/css/details_style.css') }}">
 <!--    owl-carousel-css-->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
 integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
 crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet"
 href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
 integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
 crossorigin="anonymous" referrerpolicy="no-referrer" />

<!--font-awesome-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css"
integrity="sha512-XJ3ntWHl40opEiE+6dGhfK9NAKOCELrpjiBRQKtu6uJf9Pli8XY+Hikp7rlFzY4ElLSFtzjx9GGgHql7PLSeog=="
crossorigin="anonymous" referrerpolicy="no-referrer" />


    <section class="details-wrap py-md-5 py-4 bg-light" style="margin-top:78px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9 col-md-8 pr-lg-3 pr-md-0">
                    <div class="outer mb-md-4 mb-3">
                        <div class="details-heading-box mb-3">
                            <h5>{{ $ad_details->title }}</h5>
                            <h6>{{ $ad_details->feature }}</h6>
                            <p>Posted on {{ $ad_details->created_at }}</p>
                            <p>Location :  {{ $city_row->city }}</p>
                            <h4>Rs {{ $ad_details->price }}</h4>
                        </div>
                        <div id="big" class="owl-carousel owl-theme">
                            @foreach ($imageArray as $imageResult)
                            <div class="item">
                                <img class="details-img" src="{{ URL::asset('public/ads_image/'.$imageResult) }}" alt="">
                            </div>
                            @endforeach
                        </div>
                        <div id="thumbs" class="owl-carousel owl-theme">
                            @foreach ($imageArray as $imageResult)
                            <div class="item">
                                <img class="details-img" src="{{ URL::asset('public/ads_image/'.$imageResult) }}" alt="">
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 pl-lg-0">
                    <div class="couter details-right-top">
                        <div id="msg-btn-div" class="listing-category details-sidebar text-center">
                            <h5>Contact the Advertiser</h5>
                            <!-- <p>Don't forget to mention Vivastreet when you get in touch!</p> -->
                            @if (Auth::guard('user')->check())
                            <a href="tel:{{ $ad_details->seller_phone }}" id="actual-no" class="listing-category-heading-btn btn-no-1 my-3">(+91)
                                {{ $ad_details->seller_phone }}</a>
                            <a href="javascript:void(0)" id="show-no" class="listing-category-heading-btn btn-no-1 my-3">See phone
                                number</a>
                            <a href="https://api.whatsapp.com/send?phone=+91{{ $ad_details->seller_whatsapp }}&amp;text=Hello, Sir I am {{Auth::guard('user')->user()->name}}" id="open-form-disable" class="listing-category-heading-btn-wp btn-no-2 my-3" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i> Send a
                                Message</a>
                                <hr>
                            <a href="javascript:void(0)" id="show-reporting-div" class="listing-category-heading-btn2 btn-no-3">Report this Ad</a>
                            <div>
                                @if(session()->has('success'))
                                <div class="alert alert-secondary alert-dismissible alert-solid alert-label-icon fade show" role="alert">
                                    <i class="ri-check-double-line label-icon"></i><strong>Success</strong> - {{ session()->get('success') }}
                                </div>
                            @endif
                        </div>
                            @else
                            <a href="javascript:void(0)"  class="listing-category-heading-btn btn-no-1 my-3 " data-toggle="modal" data-target="#login">See phone number</a>
                            <a href="javascript:void(0)"  class="listing-category-heading-btn-wp btn-no-2 my-3 " data-toggle="modal" data-target="#login"><i class="fa fa-whatsapp" aria-hidden="true"></i> Send a Message</a>
                            <hr>
                            <a href="javascript:void(0)" class="listing-category-heading-btn2 btn-no-3 " data-toggle="modal" data-target="#login">Report this Ad</a>
                            @endif


                            <!-- <a href="#" id="open-form-btn" class="listing-category-heading-btn btn-no-2 my-3">Send a
                                Message</a> -->
                            
                        </div>

                        {{-- <div id="msg-form" class="msg-form-modal">
                            <div class="rehomes-search-form-area">
                                <div class="rehomes-search-form">
                                    <form>
                                        <div class="row justify-content-center">
                                            <div class="col-12">
                                                <span class="form-heading">Send a message</span>
                                                <a href="#"><i id="close-form" class="fa fa-times float-right"
                                                        aria-hidden="true"></i></a>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group form-new">
                                                    <input type="text" id="name" class="form-control" required="">
                                                    <label class="form-control-placeholder" for="name">Email
                                                        Address</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group form-new">
                                                    <input type="text" id="name" class="form-control" required="">
                                                    <label class="form-control-placeholder" for="name">Phone
                                                        Number</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group form-new">
                                                    <textarea class="form-control form-new-msg"
                                                        id="exampleFormControlTextarea1" rows="4" placeholder="Message"
                                                        style="resize: none;"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group form-new">
                                                    <input type="file" class="form-control-file"
                                                        id="exampleFormControlFile1">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="row recaptcha-grid">
                                                    <div class="col-sm-8 col-8 my-auto">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="exampleCheck1">
                                                            <label class="form-check-label" for="exampleCheck1">I'm not
                                                                not
                                                                a robot</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4 col-4 px-0 text-center">
                                                        <img class="recaptcha-img"
                                                            src="images/1200px-RecaptchaLogo.svg.png">
                                                        <a class="recaptcha-texts" href="#">Privacy</a>
                                                        <a class="recaptcha-texts" href="#">Terms</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="row justify-content-center text-center mt-2">
                                                    <div class="col-sm-12 col-10 px-0">
                                                        <button type="submit"
                                                            class="btn btn-primary listing-category-heading-btn w-100">Send
                                                            message</button>
                                                    </div>
                                                    <div class="col-sm-12 col-10 pt-sm-0 mt-2">
                                                        <span class="register-form-anchor">By sending this message, you
                                                            agree to Vivastreet's terms and conditions.</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> --}}
                        <div id="reporting-div" class="anything-wrong listing-category details-sidebar">
                            <span class="text-left">Anything Wrong ?</span>
                            <a href="#"><i id="close-flagged-form" class="fa fa-times float-right"
                                    aria-hidden="true"></i></a>
                                    <form method="POST" action="{{ url('/submit_report') }}">
                                        @csrf
                                        <div class="form-group">
                                            <input type="hidden" name="ad_id" value="{{ $ad_details->id }}">
                                            @if (Auth::guard('user')->check())
                                            <input type="hidden" name="user_id" value="{{Auth::guard('user')->user()->id}}">
                                            @endif
                                            <input type="hidden" name="ad_keyword" value="{{ $ad_details->keyword }}">
                                            <textarea class="form-control" id="exampleFormControlTextarea1" name="reason" rows="4" placeholder="Reason For Report: " style="resize: none;" required></textarea>
                                          <small id="emailHelp" class="form-text text-muted">We'll never share your details with anyone else.</small>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                      </form>
                        </div>
                    </div>
                    <div class="similar-ads-section mt-md-4 mt-3 mb-md-0 mb-3">
                        <div class="text-center mb-3">
                            <h5>Similar Ads</h5>
                        </div>
                        @php
                        $similarad_row=DB::table('ads')
                                        ->where('cat_id',$ad_details->cat_id)
                                        ->where('subcat_id',$ad_details->subcat_id)
                                        ->where('active_status','YES')
                                        ->where('start_date', '<=', $today_date)
                                        ->where('end_date', '>=', $today_date)
                                        ->limit(3)
                                        ->get();
                        @endphp
                        @foreach ($similarad_row as $similarad_result)
                        @php
                            $ad_image=explode(',',$similarad_result->image);
                            $main_image=$ad_image[0];
                            $city_result=DB::table('cities')->where('id',$similarad_result->city)->first();
                            $package_result=DB::table('packages')->where('id',$similarad_result->package)->first();
                        @endphp
                        <div class="case-small">
                            <div class="media">
                                <div class="small-img">
                                    <img class="align-self-start mr-2" src="{{ URL::asset('public/ads_image/'.$main_image) }}" alt="case-img">
                                </div>
                                <div class="media-body details-small-text">
                                    <a href="{{ url('/ad-details/'.$similarad_result->keyword) }}">{{ substr($similarad_result->title,0,20) }}...</a>
                                    <p><small>{{ $city_result->city }}</small></p>
                                    <p>Rs {{ $similarad_result->price }}</p>
                                </div>
                            </div>
                        </div>
                        <hr>
                        @endforeach
                        

                    </div>
                </div>
                <div class="col-12">
                    <div class="outer mb-md-4 mb-3">
                        <div class="details-description-wrap">
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <div class="row">
                                        <div style="margin-left: 15px;">{{ strip_tags($ad_details->description) }}</div>
                                        <div class="col-md-12 details-text-bottom py-1">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <p><b>Ad ID</b> {{ $ad_details->order_id }}</p>
                                                </div>
                                                @if (Auth::guard('user')->check())
                                                <div class="col-md-4">
                                                    <p><b>Member since</b> {{Auth::guard('user')->user()->created_at}}</p>
                                                </div>
                                                @endif
                                                <div class="col-md-4">
                                                    <!--<p><b>Visitors</b> 003</p>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <div class="listing-related-wrap">
                        <h5 class="pb-2">Didn't find what you were looking for?</h5>
                        <a href="{{ url('/') }}" class="details-back-anchor"><i class="fa fa-angle-double-left" aria-hidden="true">
                            </i>
                            Back to Home</a>
                    </div>
                </div>
                {{-- <div class="col-md-12">
                    <div class="listing-related-wrap">
                        <h5 class="tags-details">Tags:</h5>
                        <ul>
                            <li><a href="#">Shirt</a></li>
                            <li><a href="#">Fashion and Beauty Tamilnadu</a></li>
                            <li><a href="#">Fashion and Beauty Coimbatore</a></li>
                            <li><a href="#">Clothes and Accessories Tamilnadu</a></li>
                            <li><a href="#">Clothes and Accessories Coimbatore</a></li>
                        </ul>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>











    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!--    bootstrap-script-->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <!--    owl-carousel-script-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function () {
            var bigimage = $("#big");
            var thumbs = $("#thumbs");
            //var totalslides = 10;
            var syncedSecondary = true;

            bigimage
                .owlCarousel({
                    items: 1,
                    slideSpeed: 2000,
                    nav: true,
                    autoplay: true,
                    dots: false,
                    loop: true,
                    responsiveRefreshRate: 200,
                    navText: [
                        '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                        '<i class="fa fa-angle-right" aria-hidden="true"></i>'
                    ]
                })
                .on("changed.owl.carousel", syncPosition);

            thumbs
                .on("initialized.owl.carousel", function () {
                    thumbs
                        .find(".owl-item")
                        .eq(0)
                        .addClass("current");
                })
                .owlCarousel({
                    items: 5,
                    dots: true,
                    nav: false,
                    navText: [
                        '<i class="fa fa-arrow-left" aria-hidden="true"></i>',
                        '<i class="fa fa-arrow-right" aria-hidden="true"></i>'
                    ],
                    smartSpeed: 200,
                    slideSpeed: 500,
                    slideBy: 4,
                    responsiveRefreshRate: 100
                })
                .on("changed.owl.carousel", syncPosition2);

            function syncPosition(el) {
                //if loop is set to false, then you have to uncomment the next line
                //var current = el.item.index;

                //to disable loop, comment this block
                var count = el.item.count - 1;
                var current = Math.round(el.item.index - el.item.count / 2 - 0.5);

                if (current < 0) {
                    current = count;
                }
                if (current > count) {
                    current = 0;
                }
                //to this
                thumbs
                    .find(".owl-item")
                    .removeClass("current")
                    .eq(current)
                    .addClass("current");
                var onscreen = thumbs.find(".owl-item.active").length - 1;
                var start = thumbs
                    .find(".owl-item.active")
                    .first()
                    .index();
                var end = thumbs
                    .find(".owl-item.active")
                    .last()
                    .index();

                if (current > end) {
                    thumbs.data("owl.carousel").to(current, 100, true);
                }
                if (current < start) {
                    thumbs.data("owl.carousel").to(current - onscreen, 100, true);
                }
            }

            function syncPosition2(el) {
                if (syncedSecondary) {
                    var number = el.item.index;
                    bigimage.data("owl.carousel").to(number, 100, true);
                }
            }

            thumbs.on("click", ".owl-item", function (e) {
                e.preventDefault();
                var number = $(this).index();
                bigimage.data("owl.carousel").to(number, 300, true);
            });
        });

    </script>





    <script type="text/javascript">
        $(document).ready(function () {

            $("#open-form-btn").on('click', function () {
                $("#msg-btn-div").hide();
                $("#msg-form").show();
            });
            $("#close-form").on('click', function () {
                $("#msg-btn-div").show();
                $("#msg-form").hide();
            });
        });

    </script>

    <script type="text/javascript">
        $(document).ready(function () {

            $("#show-reporting-div").on('click', function () {
                $("#msg-btn-div").hide();
                $("#reporting-div").show();
            });
            $("#close-flagged-form").on('click', function () {
                $("#msg-btn-div").show();
                $("#reporting-div").hide();
            });
        });

    </script>

    <script type="text/javascript">
        document.getElementById("show-no").onclick = function () {

            document.getElementById("show-no").style.display = "none";
            document.getElementById("actual-no").style.display = "block";

        }

    </script>

@include('frontend.include.footer')

<script>
    $(document).ready(function(){
        $(".login_error").on('click',function(){
            alert("Please login to access");
        })
    })
</script>