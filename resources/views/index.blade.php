<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <link rel="stylesheet" href="css/slick-theme.css">
      <link rel="stylesheet" href="css/slick.css">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
         integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
      <link rel="stylesheet" href="css/style.css">
      <title>Qurbani</title>
   </head>
   <body>

      <!-- Modal -->
         <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle">
            <div class="modal-dialog modal-dialog-centered modal-login" role="document">
               <div class="modal-content">
                           <div class="modal_head text-center">
                                    <h4 class="modal-title">Login</h4>
                                    <span>With your username or email</span>
                              </div>
                        <!-- <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> -->
                  
                  <div class="modal-body">
                        <form action="/examples/actions/confirmation.php" method="post">
                           <div class="form-group">
                              <i class="fa fa-user"></i>
                              <input type="text" class="form-control" placeholder="Username or email" required="required">
                           </div>
                           <div class="form-group">
                              <i class="fa fa-lock"></i>
                              <input type="password" class="form-control" placeholder="Password" required="required">					
                           </div>
                           <div class="form-group">
                              <input id="ckb1" type="checkbox" name="remember-me">
                              <label class="form-check-label" for="exampleCheck1">Keep me Signed in</label> 
                           </div>
                           <div class="form-group">
                              <input type="submit" class="default-btn btn-block btn-lg" value="Login">
                           </div>

                           <div class="form-group row">
                              <div class="col-sm-6"> <a href="#">Not a member? Sign up</a></div>
                              <div class="col-sm-6"><a href="#">I can't remember my password</a></div>
                              
                              
                           </div>
                           <p><span class="or">Or</span></p>
                           <div class="row social">
                              <div class="col-sm-4 px-1"><button class="btn google" type="submit"><i class="fab fa-google"></i>Google</button></div>
                              <div class="col-sm-4 px-1"><button class="btn facebook" type="submit"><i class="fab fa-facebook-f"></i>Facebook</button></div>
                              <div class="col-sm-4 px-1"><button class="btn twitter" type="submit"><i class="fab fa-twitter"></i>Twitter</button></div>
                           </div>
                        </form>
                  </div>
               </div>
            </div>
         </div>
      
      <!-- Modal End -->

      <!-- top header -->

      <div class="head-top">
         <div class="container">
            <div class="row">
               <div class="col-sm-12 col-md-auto">
                  <div class="contact"><a href="#"><i class="fa fa-phone pr-2"></i>UAN 021-111-QKP</a></div>
               </div>
               <div class="col-sm-12 col-md-auto">
                  <div class="email"><a href="#"><i class="fas fa-envelope pr-2"></i>info@qurbanikistonpay.com</a></div>
               </div>
               <div class="col-sm-12 col-md-auto ml-auto">
                  <a href="#"><img src="images/urdu.png" alt=""></a>
                  <a class="ml-3" href="#">English</a>
               </div>
            </div>
         </div>
      </div>
      

      <!-- Main Header -->

      <header>
         <div class="header" id="topheader">
            <nav class="navbar navbar-expand-lg navbar-light">
               <div class="container">
                  <a class="navbar-brand" href="#"><img src="images/logo.png" alt=""></a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                     aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="toggler-icon"><i class="fas fa-bars"></i></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     <ul class="navbar-nav mx-auto">
                        <li class="nav-item active">
                           <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="/about-us">About</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#">Sharih Compliance</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#">Mandi</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#">Contact Us</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#">Our Farms</a>
                        </li>
                     </ul>
                     <form class="form-inline my-2 my-lg-0">
                        <button class="btn btn-outline-success my-2 px-4 my-sm-0 mr-3 login" type="submit">Login</button>
                        <button class="btn btn-outline-success my-2 px-3 my-sm-0 register" type="submit">Register</button>
                     </form>
                  </div>
               </div>
            </nav>
      </header>
      <!-- Banner section -->

      <section class="section-banner">
        <div class="banner-slider">
          <div class="slide-img"></div>
          <div class="slide-img"></div>
          <div class="slide-img"></div>
          <div class="slide-img"></div>
        </div>
      <div class="container text-center center">
      <div class="content">
      <div class="row">
      <div class="col-md-12">
      <h2 class="text-white">Search</h2>
      <p>Search the Finest Animal for Qurbani on Installment</p>
      <div class="button-group row">
      <div class="col-sm-3">
      <button type="button" class="btn rounded-pill btn-outline-primary active"><span>
         <img src="images/bull.png">
         <img src="images/bull.png">
      </span>Bull</button>
      </div>
      <div class="col-sm-3">
      <button type="button" class="btn rounded-pill btn-outline-primary"><span>
         <img src="images/camel.png">
         <img src="images/camel-w.png">
      </span>Bull</button>
      </div>
      <div class="col-sm-3">
      <button type="button" class="btn rounded-pill btn-outline-primary"><span>
         <img src="images/goat.png">
         <img src="images/goat-w.png">
      </span>Bull</button>
      </div>
      <div class="col-sm-3">
      <button type="button" class="btn rounded-pill btn-outline-primary"><span>
         <img src="images/sheep.png">
         <img src="images/sheep-w.png">
      </span>Bull</button>
      </div>
      </div>
      <div class="row">
      <div class="col-sm-12">
      <div class="range-slider">
      <div class="slidecontainer my-2">
        <input type="range" min="1" max="100" 
         value="50" class="slider" id="myRange">
      </div>

      </div>
      </div>
      </div>
      <div class="row d-flex filter">
      <div class="col-sm-6">
         <div class="select-container">
            <span>Weight</span>
            <select class="form-control " data-toggle="dropdown">
               <option value="1">200Kg</option>
               <option value="2">300Kg</option>
               <option value="3">400Kg</option>
            </select>
         </div>
      </div>
      <div class="col-sm-5">
         <div class="select-container">
            <span>Color</span>
            <select class="form-control " data-toggle="dropdown">
               <option value="1">White</option>
               <option value="2">Black</option>
               <option value="3">Brown</option>
            </select>
         </div>
      </div>
      <div class="col-sm-1">
      <a href="#" type="submit" class="search"><img src="images/search.png" alt=""></a>
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
      </section>
      <!--Animals slider section -->

      <section class="section-slider">
         <div class="container text-center slick">
         <h2>Featured Animals</h2>
         <div class="animals-slider">
            <div class="item">
               <a href="product/test"><img class="img-fluid" src="images/Layer 8.png" alt=""></a>
               <div class="title">
                  <span class="name">Kharani Animal</span>
                  <span class="prize">3,500/- Per Month</span>
               </div>
            </div>
            <div class="item">
               <a href="product/test"><img class="img-fluid" src="images/Layer 8.png" alt=""></a>
               <div class="title">
                  <span class="name">Kharani Animal</span>
                  <span class="prize">3,500/- Per Month</span>
               </div>
            </div>
            <div class="item">
               <a href="product/test"><img class="img-fluid" src="images/Layer 8.png" alt=""></a>
               <div class="title">
                  <span class="name">Kharani Animal</span>
                  <span class="prize">3,500/- Per Month</span>
               </div>
            </div>
            <div class="item">
               <a href="product/test"><img class="img-fluid" src="images/Layer 8.png" alt=""></a>
               <div class="title">
                  <span class="name">Kharani Animal</span>
                  <span class="prize">3,500/- Per Month</span>
               </div>
            </div>
            <div class="item">
               <a href="product/test"><img class="img-fluid" src="images/Layer 8.png" alt=""></a>
               <div class="title">
                  <span class="name">Kharani Animal</span>
                  <span class="prize">3,500/- Per Month</span>
               </div>
            </div>
         </div>
         <div class="arrow_prev">
            <span><img class="img-fluid" src="images/left caret.png" alt=""></span>
         </div>
         <div class="arrow_next">
            <span><img class="img-fluid" src="images/right caret.png" alt=""></span>
         </div>
      </section>
      <!--Animals slider section end -->

      <!--Clients slider section -->

      <section class="client-slider-section">
         <div class="container text-center">
         <h2>What our Premium users say about us</h2>
         <div class="client-slider">
            <div class="row d-flex text-center client-content">
               <div class="col-sm-3">
                  <div class="client-image">
                     <img src="images/client.png" alt="img">
                  </div>
                  <h6>Abdul Khaliq</h6>
               </div>
               <div class="col-sm-9 text-left">
                  <div class="desc">
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus  adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus  adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. commodo viverra maecenas accumsan lacus vel facilisis. </p>
                  </div>
               </div>
            </div>
            <div class="row d-flex text-center client-content">
               <div class="col-sm-3">
                  <div class="client-image">
                     <img src="images/client.png" alt="img">
                  </div>
                  <h6>Abdul Khaliq</h6>
               </div>
               <div class="col-sm-9 text-left">
                  <div class="desc">
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus  adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus  adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. commodo viverra maecenas accumsan lacus vel facilisis. </p>
                  </div>
               </div>
            </div>
            <div class="row d-flex text-center client-content">
               <div class="col-sm-3">
                  <div class="client-image">
                     <img src="images/client.png" alt="img">
                  </div>
                  <h6>Abdul Khaliq</h6>
               </div>
               <div class="col-sm-9 text-left">
                  <div class="desc">
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus  adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus  adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. commodo viverra maecenas accumsan lacus vel facilisis. </p>
                  </div>
               </div>
            </div>
         </div>
      </section>

      <!--Clients slider section end -->   

      <!--Supplier section -->

      <section class="supplier-section">
         <div class="container">
            <div class="row">
               <div class="col-sm-2">
                  <i class="fas fa-users text-white fa-7x"></i>
               </div>
               <div class="col-sm-8 text-white">
                  <h2 class="text-white">Want to become a Supplier?</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</p>
               </div>
               <div class="col-sm-2 d-flex align-items-center button">
                  <button class="btn btn-outline-success my-2 px-4 my-sm-0 mr-3 login" type="submit">Get Started</button>
               </div>
            </div>
         </div>
      </section>
      <!--Supplier section end -->
      


      <!-- footer -->
      <section class="footer-section">
         <div class="container">
            <div class="row justify-content-around text-center">
               <div class="col-sm-2 text-left">
                  <img src="images/footerlogo.png" alt="">
               </div>
               <div class="col-sm-6 copyright">
                  <span>© Copyrights 2020 QurbaniKistoonPay. All Rights Reserved</span>
                  <span>Careers  -  Privacy Policy  -  Terms & Conditions</span>
               </div>
               <div class="col-sm-3 social-icon">
                  <div class="text-right">
                     <a href="#">
                     <img src="images/facebook.png">
                     </a>
                     <a href="#">
                     <img src="images/twitter.png">
                     </a>
                     <a href="#">
                     <img src="images/youtube.png">
                     </a>
                     <a href="#">
                     <img src="images/insta.png">
                     </a>
                     <a href="#">
                     <img src="images/snap.png">
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- footer end -->
      <script src="js/jquery-3.5.1.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/slick.js"></script>
      <script>

        $(document).ready(function(){
        setTimeout(()=>{$("#modal").modal('show')},6000);
    });

        $('.banner-slider').slick({
         infinite: true,
         slidesToShow: 1,
         autoplay: true,
         slidesToScroll: 1,
         dots: false,
         arrows: false,
         });


         $('.animals-slider').slick({
         infinite: true,
         autoplay: true,
         arrows: true,
         slidesToShow: 4,
         slidesToScroll: 1,
         responsive: [
        {
            breakpoint: 1200,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 1
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }

        ],
         prevArrow:'.arrow_prev',
         nextArrow:'.arrow_next',
         });
         
         
         $('.client-slider').slick({
         infinite: true,
         slidesToShow: 1,
         autoplay: true,
         slidesToScroll: 1,
         dots: true,
         arrows: false,
         });
         
         $('.button.btn.rounded-pill.btn-outline-primary').on('click', function(){
    $('.button.btn.rounded-pill.btn-outline-primary').toggleClass('active');
});

        

      </script>
      </script>
   </body>
</html>