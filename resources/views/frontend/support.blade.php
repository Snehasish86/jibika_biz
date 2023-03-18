<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Support | Jibika - Free classifieds in India, Buy and Sell for free anywhere in India with Jibika Online Classified Advertising</title>
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

<!-- banner -->
<section class="banner">
    <div class="banner-innerpage Category_banner">
<div class="container"> 
<!-- Row  -->
<div class="row justify-content-center"> 
  <!-- Column -->
  <div class="text-center">
    <h1 class="title">Help & Support</h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Help & Support</li>
      </ol>
    </nav>
  </div>
  <!-- Column --> 
</div>
</div>
  </div>
</section>
<!-- End banner --> 

<section id="Contact_form">
    <div class="container">
      
      <div class="contacts_bottom">
        <div class="row">
          <div class="col-lg-9 col-md-9 feature_box single-blog-post">
            <div class="row justify-content-center">
              <div class="col-lg-12 text-left">
                <h2 class="title contact-title">Contact Form</h2>
              </div>
    @if(session()->has('success'))
        <div class="alert alert-secondary alert-dismissible alert-solid alert-label-icon fade show" role="alert">
            <i class="ri-check-double-line label-icon"></i><strong>Success</strong> - {{ session()->get('success') }}
        </div>
    @endif

    @if(session()->has('error'))
        <div class="alert alert-warning alert-dismissible alert-solid alert-label-icon fade show" role="alert">
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
            </div>
            <div class="row">
              <div class="col-lg-12">
               <div class="row">
                <div class="col-md-12">
                  <form method="post" class="m-t-40 contact-form" action="{{ url('/contact_submit') }}">
                    @csrf
                    <div class="row">
                      <div class="form-group col-md-4 col-sm-12 col-xs-12 mb-0">
                        <input class="form-control" name="name" placeholder="Full Name" type="text" required>
                      </div>
                      <div class="form-group col-md-4 col-sm-12 col-xs-12">
                        <input class="form-control" name="email" placeholder="Email" type="email" required>
                      </div>
                      <div class="form-group col-md-4  col-sm-12 col-xs-12">
                        <input class="form-control" name="phone" placeholder="Phone No" type="tel" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" onkeypress="if(this.value.length==10) return false;" required>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-12 col-sm-12 col-xs-12 mb-0">
                        <div class="input-group">
                          <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-md-12 col-sm-12 col-xs-12 mb-0">
                        <button class="btn btn-primary btn-skin" name="submit" type="submit"> SUBMIT NOW</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 feature_box">
            <div class="row justify-content-center">
              <div class="col-lg-12 text-left">
                <h2 class="title contact-title">Get In Touch</h2>
                
              </div>
            </div>
            <div class="row m-t-30">
              <div class="col-lg-12">
                <div class="row">
                  <div class="col-md-12  col-sm-12">
                  <p class=" subtitle">Whether it is queries, issues or feedback, send us a note, we’re all here!</p>
                    <div class="card">
                      <div class="card-body d-flex">
                        <div class="icon-space align-self-top"> <i class="fa fa-map-marker" aria-hidden="true"></i> </div>
                        <div class="align-self-center">
                          <h5>Address : </h5>
                          <p class="m-t-10">First Floor, 119, Regent Place, Kolkata, West Bengal – 700040</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12  col-sm-12">
                    <div class="card">
                      <div class="card-body d-flex">
                        <div class="icon-space align-self-top"> <i class="fa fa-envelope-o" aria-hidden="true"></i> </div>
                        <div class="align-self-center">
                          <h5>Have any questions? </h5>
                          <p class="m-t-10">info@jibika.biz</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12  col-sm-12">
                    <div class="card">
                      <div class="card-body d-flex">
                        <div class="icon-space align-self-top"> <i class="fa fa-phone" aria-hidden="true"></i> </div>
                        <div class="align-self-center">
                          <h5>Call us </h5>
                          <p class="m-t-10">(+91) 62899 41748</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12  col-sm-12">
                    <div class="card">
                      <div class="card-body d-flex">
                        <div class="icon-space align-self-top"> <i class="fa fa-fax" aria-hidden="true"></i> </div>
                        <div class="align-self-center">
                          <h5>Have any questions? </h5>
                          <p class="m-t-10">info@jibika.biz</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
    <div class="container-fluid px-0">
      <div class="contacts_mape" style="margin-bottom: -6px;">
        <div class="row">
          <div class="col-md-12">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3686.4941377363316!2d88.35198761443246!3d22.485636291824957!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a0270e59063e675%3A0xa7808ebe79b38347!2sRegent%20Place%20Welfare%20Society!5e0!3m2!1sen!2sin!4v1659772261700!5m2!1sen!2sin" allowfullscreen="" width="1170" height="350"></iframe>
          
          </div>
        </div>
      </div>
    </div>
  </section>

@include('frontend.include.footer')