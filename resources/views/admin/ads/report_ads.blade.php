@include("admin.include.header");
@include("admin.include.sidebar");
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Report Ads List </h5>
                        
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
                                        <th>Reason For Report</th>
                                        <th>View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $row=DB::table('ad_reports')->orderBy('id','desc')->get();
                                    @endphp
                                    @foreach ($row as $details)
                                        @php
                                        $ad_details=DB::table('ads')->where('id',$details->ad_id)->first();
                                        $adsString=$ad_details->image;
                                        $adsArray=explode(',',$adsString);
                                        $main_image=$adsArray[0];
                                            $city_result=DB::table('cities')->where('id',$ad_details->city)->first();
                                            $package_result=DB::table('packages')->where('id',$ad_details->package)->first();
                                        @endphp
                                        <tr>
                                            <td>{{$loop->iteration }}</td>
                                            <td><img src="{{ URL::asset('public/ads_image/'.$main_image) }}" alt="" style="height: 60px;width: 70px;"></td>
                                            <td>{{$ad_details->title}}</td>
                                            <td>{{$city_result->city}}</td>
                                            <td>{{$package_result->title}}</td>
                                            <td>{{$ad_details->start_date}}</td>
                                            <td>{{$ad_details->end_date}}</td>
                                            <td>{{$ad_details->active_status}}</td>
                                            <td>{{$details->reason}}</td>
                                            <td><a href="{{url('/admin/edit-ads/'.$ad_details->id)}}"><i data-feather="eye"></i></a></td>
                                            
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