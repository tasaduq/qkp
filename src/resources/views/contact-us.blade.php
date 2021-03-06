@extends('layouts.front')

@section('content')


 <!-- contact-us section -->

 <section class="contact-us-section">
    <div class="container">
       <div class="row">
          <div class="col-md-5 order-md-5 order-2">
             <div class="map">
                {{-- <iframe
                   src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3618.055398809335!2d67.08915712849011!3d24.930182609072844!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33f4eb7183b97%3A0x35709df45c0003aa!2sLuckyOne%20Mall!5e0!3m2!1sen!2s!4v1602927965218!5m2!1sen!2s"
                   width="100%" height="583" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                   tabindex="0"></iframe> --}}

                   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3614.4345404283836!2d67.25081701544707!3d25.05325694367221!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb34ef2784b989d%3A0xb37bd15db87a4827!2sGadap%20Rd%2C%20Gadap%20Town%2C%20Karachi%2C%20Karachi%20City%2C%20Sindh%2C%20Pakistan!5e0!3m2!1sen!2s!4v1615501406045!5m2!1sen!2s" width="100%" height="583" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
             </div>
          </div>
          <div class="col-md-7 order-1 order-md-7 order-1">
             <div class="contact-us-form">
                <h2>Get in Touch</h2>
               
                <form action="" id="add-contact-form">

                @csrf
                   <div class="form-group">
                      <label for="name">Your Name:</label>
                      <input type="text" name="name" class="form-control" id="name">
                   </div>
                   <div class="form-row justify-content-between">
                      <div class="form-group col-md-6 pr-3">
                         <label for="email">Email:</label>
                         <input type="email" name="email" class="form-control" id="email">
                      </div>
                      <div class="form-group col-md-6">
                         <label for="phone">Phone:</label>
                         <input type="text" name="phone" class="form-control" id="phone">
                      </div>
                   </div>
                   <div class="form-group">
                      <label for="subject">Subject:</label>
                      <input type="text" name="subject" class="form-control" id="subject">
                   </div>
                   <div class="form-group">
                      <label for="message">Your Message:</label>
                      <textarea class="form-control" name="message" id="message" rows="3"></textarea>
                   </div>
                   <div class="form-group">
                    <span id="contact-success-message" style="display:none;">
                     <div class="alert alert-success" role="alert">
                         Thankyou for contacting us, our representative will get in touch with you soon.
                     </div> 
                 </span> <span id="contact-error-message" style="display:none;">
                    <div class="alert alert-success" role="alert">
                        Something went wrong
                    </div> 
                </span>
                  </div>
                   <button type="button" class="btn default-btn float-right mb-4"  id="add-contact-btn">Send Message</button> 
                   
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
          <div class="col-lg-6 col-md-6 mb-3">
             <div class="office-details d-flex">
                <div class="icon"><i class="icon-qkp-phone-c"></i></div>
                <div class="text align-self-center">
                   <p class="m-0 pb-1">Call Us At</p>
                   <span>
                      +92 309 2586558
                   </span>
                </div>
             </div>
          </div>
          <div class="col-lg-6 col-md-6 mb-3">
             <div class="office-details d-flex">
                <div class="icon"><i class="icon-qkp-message-c"></i></div>
                <div class="text align-self-center">
                   <p class="m-0 pb-1">Email Us At</p>
                   <span>support@qurbanikistonpay.com</span>
                </div>
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- Office Contact Details End -->


 @include('footer')
 
 {{-- <script src="/js/jquery-3.5.1.min.js"></script>
 <script src="/js/popper.min.js"></script>
 <script src="/js/bootstrap.min.js"></script>
 <script src="/js/slick.js"></script> --}}

 
 @endsection
   