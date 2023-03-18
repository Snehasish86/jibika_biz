<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Payment | Jibika - Free classifieds in India, Buy and Sell for free anywhere in India with Jibika Online Classified Advertising</title>
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
<style>
    .payment-inner
    {
        padding: 25px 20px;
    background: #fff;
    border-radius: 4px;
    box-shadow: 0 4px 15px rgb(12 35 34 / 20%);
    }
    .payment-inner h4{
        font-size: 28px;
    font-weight: 600;
    color: #222;
    }
    .payment-inner .razorpay-payment-button{
        background: linear-gradient(120deg, #ffd428 35%, #1db405 100%);
    box-shadow: 1px 1px 5px 1px #28282826;
    border: none;
    color: #fff;
    padding: 10px 15px;
    font-size: 17px;
    font-weight: 600;
    border-radius: 4px;
    transition: 0.3s;
    cursor: pointer;
    }
    .payment-inner .razorpay-payment-button:hover{
        background: linear-gradient(120deg, #1db405 35%, #ffd428 100%);
        transition: 0.3s;
    }
</style>

<section class="payment-section" style="margin-top: 82px;padding-top: 100px;padding-bottom: 100px;background: #f9f9f9;">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="payment-inner">
                <div class="row justify-content-center">
                    <div class="col-6 my-auto">
                        <h4>Payable Amount : ₹{{ Session::get('amount') }}</h4>
                    </div>
                    <div class="col-6 my-auto text-right">
                        <form action="{{ url('/pay') }}" method="POST" class="text-right">
                            <script
                            src="https://checkout.razorpay.com/v1/checkout.js"
                            data-key="rzp_live_lQPzRtsF7N3ao3"
                            {{-- data-key="rzp_test_EI5nlBj6XE7Xrz" --}}
                            data-amount="{{ Session::get('amount') }}" 
                            data-currency="INR"
                            data-order_id="{{Session::get('order_id')}}"
                            data-buttontext="Proceed to Pay"
                            data-name="Jibika"
                            data-description="Payment For Ads"
                        
                            data-theme.color="#F37254"
                        ></script>
                        <input type="hidden" custom="Hidden Element" name="hidden">
                        </form>
                    </div>
                </div>
                </div>
            </div>
           
        </div>
    </div>
</section>


@include('frontend.include.footer')