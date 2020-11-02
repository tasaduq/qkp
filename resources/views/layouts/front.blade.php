<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/slick-theme.css">
        <link rel="stylesheet" href="/css/slick.css">
        <link rel="stylesheet" href="/css/qkp-icons.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/style.css">
        <title>Qurbani</title>

        
    </head>
    
   <body>
      <!-- top header
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
                  <a href="#"><img src="../images/urdu.png" alt=""></a>
                  <a class="ml-3" href="#">English</a>
               </div>
            </div>
         </div>
      </div> -->


    <!-- Login Modal -->
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle">
        <div class="modal-dialog modal-dialog-centered modal-login" role="document">
        <div class="modal-content">
            <div class="modal_head text-center">
                <h4 class="modal-title">Login</h4>
                <span>With your username or email</span>
            </div>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

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
                    <div class="col-sm-4 px-1"><button class="btn google" type="submit"><i
                                class="fab fa-google"></i>Google</button></div>
                    <div class="col-sm-4 px-1"><button class="btn facebook" type="submit"><i
                                class="fab fa-facebook-f"></i>Facebook</button></div>
                    <div class="col-sm-4 px-1"><button class="btn twitter" type="submit"><i
                                class="fab fa-twitter"></i>Twitter</button></div>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
    <!--Login Modal End -->



<!-- Register Model -->
<div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle">
    <div class="modal-dialog modal-dialog-centered modal-login" role="document">
       <div class="modal-content">
          <div class="modal_head text-center">
             <h4 class="modal-title">Sign Up</h4>
             <span>fill out quick signup form</span>
          </div>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
   
          <div class="modal-body">
             <form action="/examples/actions/confirmation.php" method="post">
                <div class="form-group">
                   <i class="fa fa-user"></i>
                   <input type="text" class="form-control" placeholder="Username" required="required">
                </div>
                <div class="form-group">
                   <i class="fa msg fa-envelope"></i>
                   <input type="email" class="form-control" placeholder="Email" required="required">
                </div>
                <div class="form-group">
                   <i class="fa fa-lock"></i>
                   <input type="password" class="form-control" placeholder="Password" required="required">
                </div>
                <div class="text-center">
                   <div class="modal-text">Your passwork must be at least 8 Characters long and must contain letters, numbers and special charecters. cant not contain whitespace.</span>
                </div>
                </div>
                <div class="form-group">
                   <input type="submit" class="default-btn btn-block btn-lg" value="Sign Up">
                </div>
   
                <div class="form-group row text-center">
                   <div class="col-sm-12"> <a href="#" >Already register? Login</a></div>
                </div>
                <p><span class="or">Or</span></p>
                <div class="row social">
                   <div class="col-sm-4 px-1"><button class="btn google" type="submit"><i
                            class="fab fa-google"></i>Google</button></div>
                   <div class="col-sm-4 px-1"><button class="btn facebook" type="submit"><i
                            class="fab fa-facebook-f"></i>Facebook</button></div>
                   <div class="col-sm-4 px-1"><button class="btn twitter" type="submit"><i
                            class="fab fa-twitter"></i>Twitter</button></div>
                </div>
             </form>
          </div>
       </div>
    </div>
   </div>
   <!-- Register Model end -->
      
      <!-- Main Header -->
      
   <header>
      <div class="header" id="topheader">
         <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
               <a class="navbar-brand" href="/"><img src="/images/logo.png" alt=""></a>
               <div class="SearchToggle ml-auto">

                  @if (Request::is('/'))
                     <button class="navbar-toggler" type="button">
                        <a href="#" type="button" class="toggleSearch"><i class="fas fa-search"></i></a>
                     </button>
                  @endif
               </div>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                  aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="toggler-icon"><i class="fas fa-bars"></i></span>
               </button>
               
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mx-auto">
                     <li class="nav-item">
                        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="/about-us">About</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="/shariah-compliant">Shariah Compliance</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="/mandi">Mandi</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="/contact-us">Contact Us</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="our-farms">Our Farms</a>
                     </li>
                  </ul>
                  <form class="form-inline my-2 my-lg-0">
                     <button class="btn btn-outline-success my-2 px-4 my-sm-0 mr-3 login" type="button"
                        data-toggle="modal" data-target="#login-modal">Login</button>
                     <button class="btn btn-outline-success my-2 px-3 my-sm-0 register" type="button" 
                        data-toggle="modal" data-target="#register-modal">Register</button>
                  </form>
               </div>
            </div>
         </nav>
   </header>
      
      <!-- Banner section -->
      @yield('content')

      {{-- <script src="/js/jquery-3.5.1.min.js"></script>
      <script src="/js/popper.min.js"></script>
      <script src="/js/bootstrap.min.js"></script>
      <script src="/js/slick.js"></script> --}}

    </body>
</html>
