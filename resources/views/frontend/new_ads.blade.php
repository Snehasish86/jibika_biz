<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>New Ads | Jibika - Free classifieds in India, Buy and Sell for free anywhere in India with Jibika Online Classified Advertising</title>
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

<!-- breadcrumb -->
<div class="iner_breadcrumb bg-light p-t-20 p-b-20" style="padding-top: 130px;">
  <div class="container">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dashbord</li>
      </ol>
    </nav>
  </div>
</div>
<!-- End breadcrumb -->

<!-- Dashboard_sec -->
<section class="dashboard_sec">
  <div class="container">
    <div class="row justify-content-center">

        @include('frontend.sidesection')

        <div class="col-lg-9 col-md-8">
          
            <div class="row mt-md-0 mt-4">
              <div class="col-md-12">
                <div class="profile_detail">
                  <form method="POST" action="{{ url('/ads') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="dashboard_heding">
                      <h4> Post Your Ad </h4>
                    </div>
              @if(session()->has('success'))
                    <div class="alert alert-secondary alert-dismissible alert-solid alert-label-icon fade show" role="alert" style="background-color: #f8ba08;font-weight: 600;">
                        <i class="ri-check-double-line label-icon"></i><strong>Success</strong> - {{ session()->get('success') }}
                    </div>
                @endif
            
                @if(session()->has('error'))
                    <div class="alert alert-warning alert-dismissible alert-solid alert-label-icon fade show" role="alert" style="background: red;color: #fff;font-weight: 600;">
                        <i class="ri-alert-line label-icon"></i><strong>Error</strong> - {{ session()->get('error') }}
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
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Ad Title*</label>
                          <input type="text" class="form-control" placeholder="Title" name="title" value="{{ old('title') }}" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Important Feature*</label>
                          <input type="text" class="form-control" placeholder="Feature (eg. 3600km, 40km/L)" name="feature" value="{{ old('feature') }}" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group selectdiv selectdiv2">
                          <label>Category*</label>
                          <select class="form-control" id="category" name="cat_id" required>
                            <option value="">Select a Category</option>
                            @php
                            $category=DB::table('categories')->get();
                            @endphp
                            @foreach ($category as $details)
                                <option value="{{$details->id}}">{{$details->category}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group selectdiv selectdiv2">
                          <label>Sub Category*</label>
                          <select class="form-control" id="subcategory" name="subcat_id" required>
                            <option value="">Select Subcategory</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Price*</label>
                          <input type="number" step="any"  class="form-control" name="price" value="{{ old('price') }}" placeholder="Add your price" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group selectdiv selectdiv2">
                          <label>Choose City</label>
                          <select class="form-control" name="city" required>
                            <option value="">Select City</option>
                            @php
                        $row=DB::table('cities')->get();
                        @endphp
                        @foreach ($row as $details)
                           <option value="{{$details->id}}" {{old('city')==$details->id?'selected':''}} >{{$details->city}}</option>                      
                        @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                   
                    
                    
                    <h3>Seller Information</h3>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Name*</label>
                          <input type="text"  class="form-control" name="seller_name" value="{{Auth::guard('user')->user()->name}}" placeholder="Name" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Email</label>
                          <input type="email"  class="form-control" name="seller_email" value="{{ Auth::guard('user')->user()->email }}" placeholder="Email" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Phone No*</label>
                          <input type="tel"  class="form-control" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" onkeypress="if(this.value.length==10) return false;" name="seller_phone" value="{{ Auth::guard('user')->user()->phone }}" placeholder="Phone No" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Whatsapp No (Optional)</label>
                          <input type="tel"  class="form-control" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" onkeypress="if(this.value.length==10) return false;" name="seller_whatsapp" value="{{ old('seller_whatsapp') }}" placeholder="Whatsapp No">
                        </div>
                      </div>
                    </div>
                      
                      
                      
                    <div class="img_browse">
                      <label>Photos for your Ad*</label>
                      <div class="form-group">
                        <div class="tg-fileuploadlabel">
                          <label>Please add images of your ad</label>
                           <div class="drop-zone">
                            <p class="drop-zone__prompt">Drop file here or click to upload</p>
                            <!--<input type="file" class="form-control drop-zone__input" name="filename[]" id="photo" accept=".png, .jpg, .jpeg" onchange="readFile(this);" multiple>-->
                            <input type="file" name="filename[]" multiple class="drop-zone__input" required>
                          </div>
                          <span>Maximum upload file size: 2 MB (JPG/JPEG/PNG/GIF/SVG)</span> </div>
                      </div>
                    </div>
                    
                     <div class="form-group">
                           <div id="status"></div>
                            <div id="photos" class="row"></div>
                     </div>


                         
                         
                    <div class="ad_description">
                      
                      <div class="form-group">
                        <label>Ad Description*</label>
                        <textarea name="description" id="editor" required>Write your ad description..</textarea>
                      </div>
                    </div>
                    <div class="price_premium">
                      <div class="price_parts mt-4">
                        <label>Packages*</label>
                        <div class="form-group">
                          <div class="price_box free_premium">
              <div class="free-ad">

                <div class="main">
                  <div class="accordion">

                      <div class="expansion-panel" id="freeAd">
                          <div class="expansion-panel-header">
                              <div class="expansion-panel-header-content media">
                                <div class="media-img text-center">
                                <img class="img-fluid" src="{{ URL::asset('public/assets/images/Classified_Free.svg') }}" alt="Classified Plus">
                                </div>  
                                <div class="media-body my-auto">
                                <span class="title">Free Ad</span>
                                  <p>Your ad will go live after check by reviewer.</p>
                                </div>
                              </div>
                              <h2 class="free-text">Free</h2>
                          </div>
                      </div>

                      <div class="expansion-panel" id="premiumAd">
                          <div class="expansion-panel-header">
                              <div class="expansion-panel-header-content media">
                                <div class="media-img text-center">
                                <img class="img-fluid" src="{{ URL::asset('public/assets/images/Classified_Premium.svg') }}" alt="Classified Plus">
                                </div>  
                                <div class="media-body my-auto">
                                <span class="title">Premium Ad</span>
                                  <p>You can optionally select some upgrades to get the best results.</p>
                              </div>
                              </div>
                              <h2 class="premium-text">Recommended</h2>
                          </div>

                
                          <div class="expansion-panel-body">
                              <div class="expansion-panel-body-content">
                                <table class="table table-xl mb-0">
                                  <tbody>
                                    @php
                                        $first_package=DB::table('packages')->where('id',2)->first();
                                        $second_package=DB::table('packages')->where('id',3)->first();
                                        $third_package=DB::table('packages')->where('id',4)->first();
                                    @endphp
                                    <tr>
                                      <td class="border-top-0 pr-0"><div class="form-check">
                                          <input class="form-check-input radiobtn" type="radio" id="radio1" name="package" value="2">
                                        </div></td>
                                      <td class="text-white border-top-0 text-left"><span class="premium"><i class="fa fa-star"></i> <span class="vhb">{{ $first_package->title }}<span></span></td>
                                      <td class="border-top-0 Price">Price : ₹{{ $first_package->price }}</td>
                                      <td class="border-top-0 Price">{{ $first_package->days }} Days</td>
                                    </tr>
                                    <tr>
                                      <td class="border-top-0"><div class="form-check">
                                          <input class="form-check-input radiobtn" type="radio" id="radio2" name="package" value="3">
                                        </div></td>
                                      <td class="border-top-0 text-left"><span class="sponsored_btn">{{ $second_package->title }}</span></td>
                                      <td class="border-top-0 Price">Price :  ₹{{ $second_package->price }}</td>
                                      <td class="border-top-0 Price">{{ $second_package->days }} Days</td>
                                    </tr>
                                    <tr>
                                      <td class="border-top-0"><div class="form-check">
                                          <input class="form-check-input radiobtn" type="radio" id="radio3" name="package" value="4">
                                        </div></td>
                                      <td class="border-top-0 text-left"><span class="featured_btn"><i class="fa fa-star-o"></i> {{ $third_package->title }}</span></td>
                                      <td class="border-top-0 Price">Price : ₹{{ $third_package->price }}</td>
                                      <td class="border-top-0 Price">{{ $third_package->days }} Days</td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>

                          </div>
                      </div>
                    </div>
              </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1" style="margin-top: -11px;" required>
                                <label class="form-check-label" for="exampleCheck1">You must choose a package to proceed further.</label>
                              </div>
                        </div>
                      </div>
                    </div>
                    
                    
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success my-2">Post Your Ad</button>
                    </div>
                  </form>
                </div>
              </div>
             
            </div>
          </div>
    </div>
  </div>
</section>
<!-- End Footer -->

@include('frontend.include.footer')
<script src="https://unpkg.com/@ckeditor/ckeditor5-build-classic@12.2.0/build/ckeditor.js"></script>

<script>
  $(document).ready(function(){

      $("#freeAd").on('click',function(){
        $(".radiobtn").prop('checked', false);
      })

//       $(document).ready(function() {
//     $('#submit').click(function() {
//         $("input[type=radio][name=language]").prop('checked', false);
//     })
// });


        $("#category").on('change',function(){
            var category=$(this).val();
            $("#subcategory").html("<option value=''>Select Subcategory</option>");
                $.ajax({
                    url:"{{ url('ads/get_subcategory') }}",
                    type:'post',
                    data:'category='+category+'&_token={{ csrf_token() }}',
                    success:function(data){
                      // alert(data);
                          $("#subcategory").append(data);
                    }
                  });
        })

        ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .then( editor => {
          console.log( 'successful' );
        })
        .catch( error => {
          console.error( 'faile' );
        });
  })
</script>

<script>
document.querySelectorAll(".drop-zone__input").forEach((inputElement) => {
  const dropZoneElement = inputElement.closest(".drop-zone");

  dropZoneElement.addEventListener("click", (e) => {
    inputElement.click();
  });

  inputElement.addEventListener("change", (e) => {
    if (inputElement.files.length) {
      updateThumbnail(dropZoneElement, inputElement.files[0]);
    }
  });

  dropZoneElement.addEventListener("dragover", (e) => {
    e.preventDefault();
    dropZoneElement.classList.add("drop-zone--over");
  });

  ["dragleave", "dragend"].forEach((type) => {
    dropZoneElement.addEventListener(type, (e) => {
      dropZoneElement.classList.remove("drop-zone--over");
    });
  });

  dropZoneElement.addEventListener("drop", (e) => {
    e.preventDefault();

    if (e.dataTransfer.files.length) {
      inputElement.files = e.dataTransfer.files;
      updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
    }

    dropZoneElement.classList.remove("drop-zone--over");
  });
});

/**
 * Updates the thumbnail on a drop zone element.
 *
 * @param {HTMLElement} dropZoneElement
 * @param {File} file
 */
function updateThumbnail(dropZoneElement, file) {
  let thumbnailElement = dropZoneElement.querySelector(".drop-zone__thumb");

  // First time - remove the prompt
  if (dropZoneElement.querySelector(".drop-zone__prompt")) {
    dropZoneElement.querySelector(".drop-zone__prompt").remove();
  }

  // First time - there is no thumbnail element, so lets create it
  if (!thumbnailElement) {
    thumbnailElement = document.createElement("div");
    thumbnailElement.classList.add("drop-zone__thumb");
    dropZoneElement.appendChild(thumbnailElement);
  }

  thumbnailElement.dataset.label = file.name;

  // Show thumbnail for image files
  if (file.type.startsWith("image/")) {
    const reader = new FileReader();

    reader.readAsDataURL(file);
    reader.onload = () => {
      thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
    };
  } else {
    thumbnailElement.style.backgroundImage = null;
  }
}

</script>

<script>
  class Accordion {
      constructor({
          element,
          active = null,
          multi = false
      }) {
          this.el = element;
          this.activePanel = active;
          this.multi = multi;

          this.init();
      }

      cacheDOM() {
          this.panels = this.el.querySelectorAll(".expansion-panel");
          this.headers = this.el.querySelectorAll(".expansion-panel-header");
          this.bodies = this.el.querySelectorAll(".expansion-panel-body");
      }

      init() {
          this.cacheDOM();
          this.setSize();
          this.initialExpand();
          this.attachEvents();
      }

      // Remove "active" class from all expansion panels.
      collapseAll() {
          for (const h of this.headers) {
              h.closest(".expansion-panel").classList.remove("active");
          }
      }

      // Add "active" class to the parent expansion panel.
      expand(idx) {
          this.panels[idx].classList.add("active");
      }

      // Toggle "active" class to the parent expansion panel.
      toggle(idx) {
          this.panels[idx].classList.toggle("active");
      }

      // Get the height of each panel body and store it in attribute
      // for the CSS transition.
      setSize() {
          this.bodies.forEach((b, idx) => {
              const bound = b
                  .querySelector(".expansion-panel-body-content")
                  .getBoundingClientRect();
              b.setAttribute("style", `--ht:${bound.height}px`);
          });
      }

      initialExpand() {
          if (this.activePanel > 0 && this.activePanel < this.panels.length) {
              // Add the "active" class to the correct panel
              this.panels[this.activePanel - 1].classList.add("active");
              // Fix the current active panel index "zero based index"
              this.activePanel = this.activePanel - 1;
          }
      }

      attachEvents() {
          this.headers.forEach((h, idx) => {
              h.addEventListener("click", (e) => {
                  if (!this.multi) {
                      // Check if there is an active panel and close it before opening another one.
                      // If there is no active panel, close all the panels.
                      if (this.activePanel === idx) {
                          this.collapseAll();
                          this.activePanel = null;
                      } else {
                          this.collapseAll();
                          this.expand(idx);
                          this.activePanel = idx;
                      }
                  } else {
                      this.toggle(idx);
                  }
              });
          });

          // Recalculate the panel body height and store it on resizing the window.
          addEventListener("resize", this.setSize.bind(this));
      }
  }

  // element: The expansion panels parent.
  // active: The active panel index.
  // multi: Open more than one panel at once.
  const myAccordion = new Accordion({
      element: document.querySelector(".accordion"),
      active: 1,
      multi: false
  });

</script>
<script>
	function readFile(input) {
  	$("#status").html('Processing...');
    counter = input.files.length;
		for(x = 0; x<counter; x++){
			if (input.files && input.files[x]) {

				var reader = new FileReader();

				reader.onload = function (e) {
        	$("#photos").append('<div class="col-md-3 col-sm-3 col-xs-3"><img src="'+e.target.result+'" class="img-thumbnail"></div>');
				};

				reader.readAsDataURL(input.files[x]);
			}
    }
    if(counter == x){$("#status").html('');}
  }
</script>
