<div class="col-lg-3 col-md-4 col-sm-8">
    <div class="dashboard_menu">
      <div class="dashbord_img">
        <div class="dashboard_back"> <img class="img-fluid w-100" src="{{ URL::asset('public/assets/images/yellow-polygon.jpg') }} " alt="Classified Plus"> </div>
        <div class="rounded_img"> <img class="img-fluid" src="{{ URL::asset('public/assets/images/User_ring.png') }}" alt="Classified Plus"> </div>
        <div class="aditya">{{Auth::guard('user')->user()->name}}</div>
      </div>
     
      <ul class="list-unstyled  m-t-15">
        <li class="active"><span><i class="fa fa-sliders"></i></span><a href="{{ url('/dashboard') }}"> Dashboard </a></li>
        <li class=""><span><i class="fa fa-cog"></i></span><a href="{{ url('/user-profile') }}"> Profile Settings </a></li>
        <li class=""><span><i class="fa fa-cog"></i></span><a href="{{ url('/change-password') }}"> Change Password </a></li>
        <li class=""><span><i class="fa fa-database"></i></span><a href="{{ url('/my-ads') }}"> My Ads </a></li>
        <li class=""><span><i class="fa fa-database"></i></span><a href="{{ url('/ads/create') }}"> New Ads </a></li>
        <li><span><i class="fa fa-heart"></i></span><a href="{{url('/wishlist')}}"> My Favourites </a></li>
        <li><span><i class="fa fa-envelope"></i></span><a href="{{url('/offers')}}"> Offers </a></li>
        <li><span><i class="fa fa-envelope"></i></span><a href="{{url('/support')}}"> Help & Support </a></li>
        <li><span><i class="fa fa-sign-in"></i></span><a href="{{ url('/signout') }}"> Logout </a></li>
        
        {{-- <li><span><i class="fa fa-database"></i></span><a href="javascript:void(0)"> Ads List</a></li>
        <li><span><i class="fa fa-envelope"></i></span><a href="javascript:void(0)"> Offers/Messages </a></li>
        <li><span><i class="fa fa-shopping-cart"></i></span><a href="javascript:void(0)"> Payments </a></li>
        <li><span><i class="fa fa-star"></i></span><a href="javascript:void(0)"> Privacy Settings </a></li> --}}
        
        
        
      </ul>
    </div>
  </div>