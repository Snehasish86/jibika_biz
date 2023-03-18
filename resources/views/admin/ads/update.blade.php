@include("admin.include.header");
@include("admin.include.sidebar");
@php
    $user_result=DB::table('users')->where('id',$ad_result->user_id)->first();
    $usercity_result=DB::table('cities')->where('id',$user_result->city)->first();

    $category_result=DB::table('categories')->where('id',$ad_result->cat_id)->first();
    $subcategory_result=DB::table('subcategories')->where('id',$ad_result->subcat_id)->first();
    $city_result=DB::table('cities')->where('id',$ad_result->city)->first();
    $package_result=DB::table('packages')->where('id',$ad_result->package)->first();
    $adsString=$ad_result->image;
    $adsArray=explode(',',$adsString);
@endphp
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Update Ads</h4>
    @if(session()->has('success'))
        <div class="alert alert-secondary alert-dismissible alert-solid alert-label-icon fade show" role="alert">
            <i class="ri-check-double-line label-icon"></i><strong>Success</strong> - {{ session()->get('success') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session()->has('error'))
        <div class="alert alert-warning alert-dismissible alert-solid alert-label-icon fade show" role="alert">
            <i class="ri-alert-line label-icon"></i><strong>Error</strong> - {{ session()->get('error') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>     
    @endif

    @if ($errors->any())
    <div class="alert alert-danger p-1 mt-2">
        <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
        </ul>
    </div>
    @endif
                        </div><!-- end card header -->
                        <div class="card-body">
                            <div class="live-preview">
                                <form action="{{url('/admin/update_ads')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                <div class="row gy-4">
                                   <p style="background: chartreuse;padding: 2px 10px;">Ads Details : {{  $package_result->title }} AD</p>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Category</label>
                                            <input type="text" class="form-control" value="{{$category_result->category}}" disabled>
                                            <input type="hidden" class="form-control" name="ad_id" value="{{$ad_result->id}}">
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Subcategory</label>
                                            <input type="text" class="form-control" value="{{$subcategory_result->subcategory}}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Title</label>
                                            <input type="text" class="form-control" value="{{$ad_result->title}}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Feature</label>
                                            <input type="text" class="form-control" value="{{$ad_result->feature}}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Price</label>
                                            <input type="text" class="form-control" value="{{$ad_result->price}}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="placeholderInput" class="form-label">City</label>
                                            <input type="text" class="form-control" value="{{$city_result->city}}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-12">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Description</label>
                                            <input type="text" class="form-control" value="{{strip_tags($ad_result->description)}}" disabled>
                                        </div>
                                    </div>
                                    <p style="background: chartreuse;padding: 2px 10px;">Ad's Images</p>
                                    @foreach($adsArray as $adsResult)
                                    <div class="col-xxl-3 col-md-3">
                                        <div>
                                            <img src="{{ URL::asset('public/ads_image/'.$adsResult) }}" alt="" style="height: 200px;width: 180px;">
                                        </div>
                                    </div>
                                    
                                    @endforeach
                                    <p style="background: chartreuse;padding: 2px 10px;">Seller Details</p>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Name</label>
                                            <input type="text" class="form-control" value="{{$ad_result->seller_name}}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Email</label>
                                            <input type="text" class="form-control" value="{{$ad_result->seller_email}}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Phone No</label>
                                            <input type="text" class="form-control" value="{{$ad_result->seller_phone}}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Whatsapp No</label>
                                            <input type="text" class="form-control" value="{{$ad_result->seller_whatsapp}}" disabled>
                                        </div>
                                    </div>
                                    <p style="background: chartreuse;padding: 2px 10px;">User Details</p>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Name</label>
                                            <input type="text" class="form-control" value="{{$user_result->name}}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Email</label>
                                            <input type="text" class="form-control" value="{{$user_result->email}}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Phone No</label>
                                            <input type="text" class="form-control" value="{{$user_result->phone}}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="placeholderInput" class="form-label">City</label>
                                            <input type="text" class="form-control" value="{{$usercity_result->city}}" disabled>
                                        </div>
                                    </div>

                                    
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <label for="placeholderInput" class="form-label">Active Status</label>
                                            <select class="form-control" name="active_status" required>
                                                <option value="YES" {{$ad_result->active_status=='YES'?'selected':''}} >YES</option>
                                                <option value="NO" {{$ad_result->active_status=='NO'?'selected':''}} >NO</option>
                                            </select>
                                        </div>
                                    </div>
                                    

                                    
                                    <div class="col-xxl-3 col-md-12 pt-4">
                                        <div class="form-floating">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                            </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->

</div>
<!-- container-fluid -->
</div>
<!-- End Page-content -->
@include("admin.include.footer");