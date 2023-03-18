@include("admin.include.header");
@include("admin.include.sidebar");
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Ads List </h5>
                        
                        </div>
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
                        <div class="card-body">
                            <table id="buttons-datatables" class="display table table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sl No</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>City</th>
                                        <th>Package</th>
                                        <th>Posted Date</th>
                                        <th>Expairy Date</th>
                                        <th>Active Status</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $row=DB::table('ads')->orderBy('id','desc')->get();
                                    @endphp
                                    @foreach ($row as $details)
                                        @php
                                        $adsString=$details->image;
                                        $adsArray=explode(',',$adsString);
                                        $main_image=$adsArray[0];
                                            $city_result=DB::table('cities')->where('id',$details->city)->first();
                                            $package_result=DB::table('packages')->where('id',$details->package)->first();
                                        @endphp
                                        <tr>
                                            <td>{{$loop->iteration }}</td>
                                            <td><img src="{{ URL::asset('public/ads_image/'.$main_image) }}" alt="" style="height: 60px;width: 70px;"></td>
                                            <td>{{$details->title}}</td>
                                            <td>{{$city_result->city}}</td>
                                            <td>{{$package_result->title}}</td>
                                            <td>{{$details->start_date}}</td>
                                            <td>{{$details->end_date}}</td>
                                            <td>{{$details->active_status}}</td>
                                            <td><a href="{{url('/admin/edit-ads/'.$details->id)}}"><i data-feather="edit"></i></a></td>
                                            <td><i data-feather="archive" onclick="delete_row({{$details->id}})"></i></td>
                                            <form action="{{url('/admin/deleteAds')}}" method="post" id="delete_submit{{$details->id}}" style="display:none;">
                                                        {{csrf_field()}}
                                                        <input type="hidden" class="form-control" name="ad_id" value="{{$details->id}}" required>
                                                        {{-- <input type="hidden" class="form-control" name="previous_image" value="{{$details->image}}" required> --}}
                                                    </form>
                                        </tr>
                                        
                                    @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>

</div>
<!-- container-fluid -->
</div>
<!-- End Page-content -->
@include("admin.include.footer");

<script>
    function delete_row(id)
    {
       //  alert(id);exit();
        swal({
                 title: "Are you sure?",
                 text: "Once deleted, you will not be able to recover this imaginary file!",
                 icon: "warning",
                 buttons: true,
                 dangerMode: true,
               })
               .then((willDelete) => {
                 if (willDelete) 
                 {
                   document.getElementById("delete_submit"+id).submit();
                 } else 
                 {
                   // swal("Your imaginary file is safe!");
                 }
               });
    } 
   
   </script>