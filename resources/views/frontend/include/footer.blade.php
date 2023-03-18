<!--Footer Account Section-->
<section class="sticky-footer-section py-2 d-sm-none d-block">
    <div class="container">
        <div class="row  justify-content-center">
            <div class="col px-1">
                <div class="sticky-box text-center">
                    <a href="{{url('/')}}">
                    <img src="{{ URL::asset('public/assets/images/Home.png')}}">
                    <h6>HOME</h6>
                    </a>
                </div>
            </div>
            <div class="col px-1">
                <div class="sticky-box text-center">
                    <!--<a href="https://api.whatsapp.com/send/?phone=%2B918250824021&text=Hello&type=phone_number&app_absent=0">-->
                    <a href="https://wa.me/916289941748/?text=Hello" target="_blank">
                    <!--<a href="whatsapp://send/?phone=%2B918250824021&text=Hello&type=phone_number&app_absent=0">-->
                    <!--<a href="https://api.whatsapp.com/send?phone=+919038071716&amp;text=Hi,Jibika">-->
                    <img src="{{ URL::asset('public/assets/images/Chats.png')}}">
                    <h6>SUPPORT</h6>
                    </a>
                </div>
            </div>
            <div class="col px-1">
                <div class="sticky-box spl-sticky text-center">
                    <!--<img src="https://jibika.biz/public/category_image/20220726104051.png">-->
                    <div class="sell-box">
                         @if (Auth::guard('user')->check())
  <div class="top_awro top_awro_small pull-right d-sm-none d-block"><a href="{{ url('/ads/create') }}" class="d-block"><img class="mt-2" src="https://jibika.biz/public/assets/images/logo_bottom.png"> </a> </div>
  @else
  <div class="top_awro top_awro_small pull-right d-sm-none d-block" data-toggle="modal" data-target="#login"><img class="mt-2" src="https://jibika.biz/public/assets/images/logo_bottom.png"> </div>
  @endif
                    </div>
                    <h6>SELL</h6>
                </div>
            </div>
            <div class="col px-1">
                <div class="sticky-box text-center">
                    @if (Auth::guard('user')->check())
                    <a href="{{ url('/my-ads') }}">
                    <img src="{{ URL::asset('public/assets/images/MyAds.png')}}">
                    <h6>MY ADS</h6>
                    </a>
                    @else
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#login">
                    <img src="{{ URL::asset('public/assets/images/MyAds.png')}}">
                    <h6>MY ADS</h6>
                    </a>
                    @endif
                </div>
            </div>
            <div class="col px-1">
                <div class="sticky-box text-center">
                    @if (Auth::guard('user')->check())
                    <a href="{{ url('/user-profile') }}">
                    <img src="{{ URL::asset('public/assets/images/Account.png')}}">
                    <h6>ACCOUNT</h6>
                    </a>
                    @else
                    <a href="javascript:void(0)" data-toggle="modal" data-target="#login">
                    <img src="{{ URL::asset('public/assets/images/Account.png')}}">
                    <h6>ACCOUNT</h6>
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Footer -->
<footer class="footer_all">
    <div class="footer p-t-40">
      <div class="container spacer b-t">
 
      
      
        <div class="row">
          <div class="col-lg-3 col-md-3 m-b-30">
            <div class="footer-logo"> <img class="img-fluid mb-3" src="{{ URL::asset('public/assets/images/logo-light.png')}}" alt="footer-logo" style="height: 60px;width:auto;"> </div>
            <p>We have over 15 years of experience.Our suppoer available to help you 24 hours a day, seven days week</p>
          </div>
          <div class="col-lg-3 col-md-3 m-b-30 d-md-block d-none">
            <h3 class="mb-3">Quick Links </h3>
            <ul class="p-0">
            <li><a href="{{ url('/about-us') }}">About Us</a></li>
            <li><a href="{{ url('/privacy-policy') }}">Privacy Policy</a></li>
            <li><a href="{{ url('/terms-condition') }}">Terms & Conditions</a></li>
            <li><a href="{{ url('/support') }}">Help & Support</a></li>
            <li><a href="{{ url('faq') }}">FAQ</a></li>
            </ul>
          </div>
          
           <!--App Vertion-->
          <div class="col-lg-3 col-md-3 m-b-30 d-md-none d-block">
            <h3 class="mb-3">Quick Links </h3>
            <ul class="p-0">
            <li><a href="{{ url('/about-us') }}">About Us</a></li>
            <li><a href="{{ url('/app-privacy-policy') }}">Privacy Policy</a></li>
            <li><a href="{{ url('/app-terms-condition') }}">Terms & Conditions</a></li>
            <li><a href="{{ url('/support') }}">Help & Support</a></li>
            <li><a href="{{ url('faq') }}">FAQ</a></li>
            </ul>
          </div>
          <!--App Vertion-->
          
          <div class="col-lg-3 col-md-3 m-b-30">
            <h3 class="mb-3">Popular Locations</h3>
            <ul class="p-0">
                @php
              $city_row2=DB::table('cities')->limit(5)->get();
              @endphp
              @foreach ($city_row2 as $city_result2)
                <li><a href="{{url('/search-city/'.$city_result2->keyword)}}">{{$city_result2->city}}</a></li>
              @endforeach
            
  
            </ul>
          </div>
          <div class="col-lg-3 col-md-3 m-b-30">
            <!--<h3 class="mb-3">How to sell fast</h3>-->
            <!--<p>We have over 15 years of experience </p>-->
            <!--<p>Our suppoer available to help you 24 hours a day, seven days week</p>-->
  <h3 class="mb-3 mt-3">Follow US</h3>
  <ul class="list-unstyled d-flex p-0 soical-icon">
                            <li class="mr-2"><a href="https://www.facebook.com/Jibika.biz" target="_blank"><i class="fa fa-facebook-f"></i> </a></li>
                            <li class="mr-2"><a href="https://twitter.com/JibikaOpc" target="_blank"><i class="fa fa-twitter"></i> </a></li>
                            <li class="mr-2"><a href="https://www.instagram.com/jibika.biz/" target="_blank"><i class="fa fa-instagram"></i> </a></li>
                            <li class="active"><a href="https://www.linkedin.com/company/jibika-biz/" target="_blank"><i class="fa fa-linkedin"></i> </a></li>
                          </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="bottom-bar">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <p class="mt-3 mb-3 copyright">Copyright &copy; {{ date('Y') }}. All rights reserved </p>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- End Footer -->
  
  @if (Auth::guard('user')->check())
  <div class="top_awro pull-right d-sm-block d-none"><a href="{{ url('/ads/create') }}" class="d-block"><i class="fa fa-plus" aria-hidden="true"></i></a> </div>
  @else
  <div class="top_awro pull-right d-sm-block d-none" data-toggle="modal" data-target="#login"><i class="fa fa-plus" aria-hidden="true"></i> </div>
  @endif
  
  <!-- Optional JavaScript --> 
  <!-- jQuery first, then Popper.js, then Bootstrap JS --> 
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
                crossorigin="anonymous"></script> 
  {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
  <script src="{{ URL::asset('public/assets/js/owlcarousel/owl.carousel.min.js')}}"></script> 
  <script src="{{ URL::asset('public/assets/js/custom.js')}}"></script> 
  
  <script>
      $(document).ready(function(){
          $("#togglePassword1").on('click',function(){
              $("#myInput").removeAttr("type","password");
              $("#myInput").attr("type","text");
              $("#togglePassword1").hide();
              $("#togglePassword2").show();
          })
          $("#togglePassword2").on('click',function(){
              $("#myInput").removeAttr("type","text");
              $("#myInput").attr("type","password");
              $("#togglePassword2").hide();
              $("#togglePassword1").show();
          })
          
         $(".wishlistbtn").on('click',function(){
             var ad_id=$(this).attr("data-id");
            //  alert(ad_id);
             $.ajax({
                    url:"{{ url('/add_wishlist') }}",
                    type:'post',
                    data:'ad_id='+ad_id+'&_token={{ csrf_token() }}',
                    success:function(data){
                       if(data=="success")
                       {
                           swal("Added to wishlist!");
                       }
                       else
                       {
                           swal("Already added in wishlist!");
                       }
                    }
                  });
         })
      })
  </script>
  
  </body>
  </html>