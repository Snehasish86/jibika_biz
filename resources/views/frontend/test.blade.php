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
          
        <ul class="list-unstyled text-center p-t-30">

          @php
            $category=DB::table('categories')->get();
            @endphp
            @foreach ($category as $category_details)
              <li><a href="{{ url('/category/'.$category_details->keyword) }}"><img src="{{ URL::asset('public/category_image/'.$category_details->image) }}" alt="Jibika Category" style="height: 50px;width:50px;"/>
                <p> {{$category_details->category}} </p>
                </a> 
              </li>
            @endforeach
          
          
        </ul>
      </div>
    </div>
  </div>
</section>
<!-- End Categories --> 