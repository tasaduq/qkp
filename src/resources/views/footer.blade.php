<!-- footer -->
<section class="footer-section">
    <div class="container">
       <div class="row justify-content-around text-center align-items-center">
          <div class="col-md-2 text-left">
             <div class="footerlogo">
                   <img src="/images/footerlogo.svg" alt="">
             </div>
          </div>
          <div class="col-md-6 copyright">
             {{-- <span>© Copyrights 2020 Qurbanikistonpay (PVT).LTD. All Rights Reserved</span> --}}
             <span>© Copyrights 2020 Farms Wide Open (PVT).LTD. All Rights Reserved</span>
             <span><a href="privacy-policy"><strong>Privacy Policy</strong></a> - <a href="terms-conditions"><strong>Terms & Conditions</strong></a> - <a href="faqs"><strong>FAQs</strong></a> - <a href="Refund-and-cancellation-policy"><strong>Refund & Cancellation Policy</strong></a></span>
          </div>
          <div class="col-md-3 social-icon">
             <div class="text-right">
               <a href="https://www.facebook.com/Qurbani-Kiston-Pay-101300265362375" target="_blank">
                  <i class="icon-qkp-facebook"></i>
               </a>
               <a href="https://twitter.com/qurbaniKP" target="_blank">
                  <i class="icon-qkp-twitter"></i>
               </a>
                {{-- <a href="#" target="_blank">
                   <i class="icon-qkp-youtube-play"></i>
                </a> --}}
                <a href="https://www.instagram.com/qurbanikistonpay/" target="_blank">
                  <i class="icon-qkp-instagram"></i>
               </a>
                {{-- <a href="#" target="_blank">
                   <i class="icon-qkp-snapchat"></i>
                </a> --}}
             </div>
          </div>
       </div>
    </div>
 </section>
 <!-- footer end -->

 <!-- Load Facebook SDK for JavaScript -->
 <div id="fb-root"></div>
 <script>
   window.fbAsyncInit = function() {
     FB.init({
       xfbml            : true,
       version          : 'v10.0'
     });
   };

   (function(d, s, id) {
   var js, fjs = d.getElementsByTagName(s)[0];
   if (d.getElementById(id)) return;
   js = d.createElement(s); js.id = id;
   js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
   fjs.parentNode.insertBefore(js, fjs);
 }(document, 'script', 'facebook-jssdk'));</script>

 <!-- Your Chat Plugin code -->
 <div class="fb-customerchat"
   attribution="setup_tool"
   page_id="101300265362375"
theme_color="#34043f"
logged_in_greeting="Assalm O Alaikum our valued customer! How can we help you?"
logged_out_greeting="Assalm O Alaikum our valued customer! How can we help you?">
 </div>