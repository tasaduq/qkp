
@extends('layouts.front')

@section('content')

<div class="terms-section bg_white">
<section class="py-5">
   <div class="container">
      <h1 class="mb-5">Frequently Asked Questions</h1>
      <div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Collapsible Group Item #1
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Collapsible Group Item #2
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Collapsible Group Item #3
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
      </div>
    </div>
  </div>
</div>
   </div>
</section>



   <!-- footer -->
   <section class="footer-section">
   <div class="container">
      <div class="row justify-content-around text-center align-items-center">
         <div class="col-sm-2 text-left">
            <div class="footerlogo">
                  <img src="/images/footerlogo.svg" alt="">
            </div>
         </div>
         <div class="col-sm-6 copyright">
            <span>© Copyrights 2020 QurbaniKistoonPay. All Rights Reserved</span>
            <span><a href="#"><strong>Privacy Policy</strong></a> - <a href="#"><strong>Terms & Conditions</strong></a></span>
         </div>
         <div class="col-sm-3 social-icon">
            <div class="text-right">
               <a href="#">
                  <i class="icon-qkp-facebook"></i>
               </a>
               <a href="#">
                  <i class="icon-qkp-twitter"></i>
               </a>
               <a href="#">
                  <i class="icon-qkp-youtube-play"></i>
               </a>
               <a href="#">
                  <i class="icon-qkp-instagram"></i>
               </a>
               <a href="#">
                  <i class="icon-qkp-snapchat"></i>
               </a>
            </div>
         </div>
      </div>
   </div>
</section>
</div>
   <!-- footer end -->



   <script src="/js/jquery-3.5.1.min.js"></script>
   <script src="/js/popper.min.js"></script>
   <script src="/js/bootstrap.min.js"></script>
   <script src="/js/slick.js"></script>

   @endsection
   