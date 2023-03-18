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
        <img src="{{ URL::asset('public/assets/images/oops.jpg')}}" alt="" style="width:100%;">
        </div>
        <div class="col-md-8 text-center">
          <h2 class="title" style="margin:25px 0 10px;">Payment is not successful.</h2>
          <h6 class="subtitle"> <strong> Please Try Again Later.</strong></h6>
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