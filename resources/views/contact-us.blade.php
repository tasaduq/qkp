@extends('layouts.front')

@section('content')


 <!-- contact-us section -->

 <section class="contact-us-section">
    <div class="container">
       <div class="row">
          <div class="col-sm-6 order-sm-6 order-2">
             <div class="map">
                <iframe
                   src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3618.055398809335!2d67.08915712849011!3d24.930182609072844!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33f4eb7183b97%3A0x35709df45c0003aa!2sLuckyOne%20Mall!5e0!3m2!1sen!2s!4v1602927965218!5m2!1sen!2s"
                   width="100%" height="583" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                   tabindex="0"></iframe>
             </div>
          </div>
          <div class="col-sm-6 order-1 order-sm-6 order-1">
             <div class="contact-us-form">
                <h2>Get in Touch</h2>
                <form>
                   <div class="form-group">
                      <label for="name">Your Name:</label>
                      <input type="text" class="form-control" id="name">
                   </div>
                   <div class="form-row justify-content-between">
                      <div class="form-group col-md-6 pr-3">
                         <label for="email">Email:</label>
                         <input type="text" class="form-control" id="email">
                      </div>
                      <div class="form-group col-md-6">
                         <label for="phone">Phone:</label>
                         <input type="text" class="form-control" id="phone">
                      </div>
                   </div>
                   <div class="form-group">
                      <label for="subject">Subject:</label>
                      <input type="text" class="form-control" id="subject">
                   </div>
                   <div class="form-group">
                      <label for="message">Your Message:</label>
                      <textarea class="form-control" id="message" rows="3"></textarea>
                   </div>
                   <button class="btn default-btn float-right mb-4" type="submit">Send Message</button>
                </form>
             </div>
          </div>
       </div>
    </div>
 </section>

 <!-- contact-us section end -->


 <!-- Office Contact Details -->
 <section class="office-contact">
    <div class="container">
       <div class="row justify-content-between">
          <h2>Office Contact Details</h2>
          <div class="col-lg-4 col-md-6 mb-3">
             <div class="office-details d-flex">
                <div class="icon"><i class="icon-qkp-phone-c"></i></div>
                <div class="text align-self-center">
                   <p class="m-0 pb-1">Call Us At</p>
                   <span>UAN 021-111-QKP</span>
                </div>
             </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-3">
             <div class="office-details d-flex">
                <div class="icon"><i class="icon-qkp-message-c"></i></div>
                <div class="text align-self-center">
                   <p class="m-0 pb-1">Email Us At</p>
                   <span>info@kurbanikistoonpay.com</span>
                </div>
             </div>
          </div>
          <div class="col-lg-3 col-md-12 d-flex">
             <div class="office-details align-self-center">
                <div class="text">
                   <p class="m-0 pb-3">Follow us on</p>
                   <div class="social-links">
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
       </div>
    </div>
 </section>
 <!-- Office Contact Details End -->




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
 <!-- footer end -->
 <script src="/js/jquery-3.5.1.min.js"></script>
 <script src="/js/popper.min.js"></script>
 <script src="/js/bootstrap.min.js"></script>
 <script src="/js/slick.js"></script>

 
 @endsection
   