@include("admin.include.header");
@include("admin.include.sidebar");
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Users List </h5>
                        
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>City</th>
                                        <th>Total Ads</th>
                                        <th>Active Status</th>
                                        <th>Join Date</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $row=DB::table('users')->orderBy('id','desc')->get();
                                    @endphp
                                    @foreach ($row as $details)
                                        @php
                                            $city_result=DB::table('cities')->where('id',$details->city)->first();
                                            $ads_count=DB::table('ads')->where('user_id',$details->id)->count();
                                        @endphp
                                        <tr>
                                            <td>{{$loop->iteration }}</td>
                                            {{-- <td><img src="{{ URL::asset('public/category_image/'.$details->image) }}" alt="" style="height: 60px;width: 70px;"></td> --}}
                                            <td>{{$details->name}}</td>
                                            <td>{{$details->email}}</td>
                                            <td>{{$details->phone}}</td>
                                            <td>{{$city_result->city}}</td>
                                            <td>{{$ads_count}}</td>
                                            <td>{{$details->active_status}}</td>
                                            <td>{{$details->created_at}}</td>
                                            <td><a href="{{url('/admin/edit-users/'.$details->id)}}"><i data-feather="edit"></i></a></td>
                                            <td><i data-feather="archive" onclick="delete_row({{$details->id}})"></i></td>
                                            <form action="{{url('/admin/delete_user')}}" method="post" id="delete_submit{{$details->id}}" style="display:none;">
                                                        {{csrf_field()}}
                                                        <input type="hidden" class="form-control" name="user_id" value="{{$details->id}}" required>
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