<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Wishlist | Jibika - Free classifieds in India, Buy and Sell for free anywhere in India with Jibika Online Classified Advertising</title>
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
@endphp
<!-- breadcrumb -->
<div class="iner_breadcrumb bg-light p-t-20 p-b-20" style="padding-top: 130px;">
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">My Favourites </li>
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

      <div class="col-md-9">
        <div class="dashboard_main">
          <div class="dashboard_heding">
            <h3> My Favourites </h3>
          </div>
          <div class="row mt-3" style="overflow: scroll;">
            <div id="recent-transactions" class="col-12">
              <!--<h4 class="card-title">Recent Approved Ads</h4>-->
          @if(session()->has('success'))
              <div class="alert alert-secondary alert-dismissible alert-solid alert-label-icon fade show" role="alert">
                  <i class="ri-check-double-line label-icon"></i><strong>Success</strong> - {{ session()->get('success') }}
              </div>
          @endif
              <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
              <div class="heading-elements"> </div>
              <div class="table">
                <table class="table table-xl mb-0 table-responsive">
                  <thead>
                    <tr>
                      {{-- <th class="border-top text-capitalize ml-44"> <input class="form-check-input" value="" type="checkbox">
                        photos </th> --}}
                      <th class="border-top text-capitalize">Sl</th>
                      <th class="border-top text-capitalize">Photo</th>
                      <th class="border-top text-capitalize">Title </th>
                      <th class="border-top text-capitalize">Category </th>
                      <th class="border-top text-capitalize">Ad Status </th>
                      <th class="border-top text-capitalize">Price </th>
                      <th class="border-top text-capitalize">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $wishlist_row=DB::table('wishlists')->where('user_id',Auth::guard('user')->user()->id)->get();
                    @endphp
                    @foreach ($wishlist_row as $wishlist_result)
                    @php
                        $ad_details=DB::table('ads')
                                    ->where('id',$wishlist_result->ad_id)
                                    ->where('active_status','YES')
                                    ->where('start_date', '<=', $today_date)
                                    ->where('end_date', '>=', $today_date)
                                    ->first();
                                    
                        $ad_image=explode(',',$ad_details->image);
                        $main_image=$ad_image[0];
                        $city_result=DB::table('cities')->where('id',$ad_details->city)->first();
                        $package_result=DB::table('packages')->where('id',$ad_details->package)->first();
                    @endphp
                    <tr>
                      <td class="text-truncate">{{$loop->iteration }}</td>
                      <td class="text-truncate">
                        <div class="form-check">
                          {{-- <input class="form-check-input" value="" type="checkbox"> --}}
                        <div class="recent_img"> <img src="{{ URL::asset('public/ads_image/'.$main_image) }}" alt="Jibika Ads" style="height: 65px;"> </div>
                        </div>
                      </td>
                      <td class="text-truncate">
                          <a href="{{ url('/ad-details/'.$ad_details->keyword) }}"><p>{{$ad_details->title}}<br>
                          Ad ID: {{$ad_details->order_id}}</p></a>
                    </td>
                      <td class="text-truncate"><a href="#">Electronics </a></td>
                      <td><button type="button" class="btn btn-sm {{$ad_details->active_status=='NO'?'sold_btn':'active_btn'}}">{{$ad_details->active_status=='NO'?'Inactive':'Active'}}</button></td>
                      <td class="text-truncate"><strong>₹ {{$ad_details->price}}</strong></td>
                      <td class="text-truncate">
                        {{-- <button type="submit" value="butten"><i class="fa fa-eye"></i></button> --}}
                        {{-- <span><button type="submit" value="butten"> <i class="fa fa-pencil"></i> </button></span> --}}
                        <span><button type="button" class="deletebtn" data-id="{{ $wishlist_result->id }}" value="butten"> <i class="fa fa-trash"></i> </button></span>
                      </td>
                    </tr>
                    @endforeach

                    
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        {{-- <div class="single-sidebar m-t-30 m-b-50"> <img class="add_img img-fluid" src="images/discount-img.png" alt="Classified Plus"> </div> --}}
      </div>
    </div>
  </div>
</section>
<!-- End Footer -->

@include('frontend.include.footer')
<script>
  $(document).ready(function(){
    $(".deletebtn").on('click',function(){
      var wish_id=$(this).attr("data-id");
      swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover this Ad!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {

               $.ajax({
                    url:"{{ url('ads/delete_wishlist') }}",
                    type:'post',
                    data:'wish_id='+wish_id+'&_token={{ csrf_token() }}',
                    success:function(data){
                      // alert(data);
                      if(data=="success")
                      {
                        swal({
                            title: "Success!",
                            text: "Ad deleted successfully.",
                            icon: "success",
                            button: "Ok",
                          });
                            setTimeout(function () {
                              location.reload(true);
                            }, 2000);
                      }
                    }
                  });
        }
         else 
         {
          swal("Your Ad is safe!");
        }
      });
    })
  })
</script>