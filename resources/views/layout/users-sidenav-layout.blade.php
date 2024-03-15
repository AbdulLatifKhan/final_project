<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>

    <link rel="icon" type="image/x-icon" href="{{asset('/favicon.ico')}}" />
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" />
    <link href="{{asset('css/animate.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/fontawesome.css')}}" rel="stylesheet" />
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('css/toastify.min.css')}}" rel="stylesheet" />


    <link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css')}}" rel="stylesheet" />

    <link href="{{asset('css/jquery.dataTables.min.css')}}" rel="stylesheet" />
    <script src="{{asset('js/jquery-3.7.0.min.js')}}"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>


    <script src="{{asset('js/toastify-js.js')}}"></script>
    <script src="{{asset('js/axios.min.js')}}"></script>
    <script src="{{asset('js/config.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.js')}}"></script>




</head>

<body>

<div id="loader" class="LoadingOverlay d-none">
    <div class="Line-Progress">
        <div class="indeterminate"></div>
    </div>
</div>



 <nav class="navbar navbar-expand-lg fixed-top px-0 shadow-sm bg-white topNab">
  <div class="container-fluid">
    <a class="navbar-brand h4" href="{{url("/home")}}" style="cursor: pointer;">
      Job Pulse
    </a>
    

    <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
        <li class="nav-item top-nav-item">
          <a href="{{url("/")}}" class="nav-link {{ request()->is('/') ? 'active':'' }}">Home</a>
        </li>
        <li class="nav-item top-nav-item">
          <a href="{{url("/about")}}" class="nav-link {{ request()->is('about') ? 'active':'' }}">About</a>
        </li>
        <li class="nav-item top-nav-item">
          <a href="{{url("/jobs")}}" class="nav-link {{ request()->is('jobs') ? 'active':'' }}">Jobs</a>
        </li>
        <li class="nav-item top-nav-item">
          <a href="{{url("/blog")}}" class="nav-link {{ request()->is('blog') ? 'active':'' }}">Blogs</a>
        </li>
        <li class="nav-item top-nav-item">
          <a href="{{url("/contact")}}" class="nav-link {{ request()->is('contact') ? 'active':'' }}">Contact</a>
        </li>
      </ul>
    </div>

    <div class="">
      <a class="btn btn-dark me-3 mt-2" href="#">Login</a>
      <a class="btn btn-dark me-3 mt-2" href="#">Register</a>
    </div>
  </div>
</nav>


<div class="content-below-navbar">
    @yield('content')
</div>

<footer class="footer_dark">
  <div class="footer_top">
      <div class="container">
          <div class="row">
              <div class="col-lg-3 col-md-6 col-sm-12">
                  <div class="widget">
                      <div class="footer_logo">
                          <a href="{{url("/home")}}" class="h4">Job Pulse</a>
                      </div>
                      <p>If you are going to use of Lorem Ipsum need to be sure there isn't hidden of text</p>
                  </div>
                  <div class="widget">
                    <div class="row">
                        <ul class="social_icons social_white">
                            <li class="col"><a href="https://www.facebook.com"><i class="fab fa-facebook"></i></a></li>
                            <li class="col"><a href="https://www.twitter.com"><i class="fab fa-twitter"></i></a></li>
                            <li class="col"><a href="https://www.linkedin.com"><i class="fab fa-linkedin"></i></a></li>
                            <li class="col"><a href="https://www.instagram.com"><i class="fab fa-instagram"></i></a></li>
                            <li class="col"><a href="https://www.pinterest.com"><i class="fab fa-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>
                
              </div>
              <div class="col-lg-2 col-md-3 col-sm-6">
                  <div class="widget">
                      <h6 class="widget_title">Useful Links</h6>
                      <ul class="widget_links">
                          <li><a href="/policy?type=about">About Us</a></li>
                          <li><a href="/policy?type=how to buy">How to Buy</a></li>
                          <li><a href="/policy?type=contact">Contact</a></li>
                          <li><a href="/policy?type=complain">Complain</a></li>
                      </ul>
                  </div>
              </div>
              <div class="col-lg-2 col-md-3 col-sm-6">
                  <div class="widget">
                      <h6 class="widget_title">Legals</h6>
                      <ul class="widget_links">
                          <li><a href="/policy?type=refund">Refund Policy</a></li>
                          <li><a href="/policy?type=terms">Terms & Condition</a></li>
                      </ul>
                  </div>
              </div>
              <div class="col-lg-2 col-md-6 col-sm-6">
                  <div class="widget">
                      <h6 class="widget_title">My Account</h6>
                      <ul class="widget_links">
                          <li><a href="#">Profile</a></li>
                          <li><a href="#">Wish List</a></li>
                          <li><a href="#">Cart List</a></li>
                          <li><a href="#">Order History</a></li>
                      </ul>
                  </div>
              </div>
              <div class="col-lg-3 col-md-4 col-sm-6">
                  <div class="widget">
                      <h6 class="widget_title">Contact Info</h6>
                      <ul class="contact_info contact_info_light">
                          <li>
                              <i class="ti-location-pin"></i>
                              <p>123 Street, Old Trafford, New South London , UK</p>
                          </li>
                          <li>
                              <i class="ti-email"></i>
                              <a href="mailto:info@sitename.com">info@apple.com</a>
                          </li>
                          <li>
                              <i class="ti-mobile"></i>
                              <p>+ 457 789 789 65</p>
                          </li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <div class="bottom_footer border-top-tran">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <p class="mb-md-0 text-center">© 2020 All Rights Reserved by Job Pulse</p>
              </div>
          </div>
      </div>
  </div>
</footer>






</body>
</html>
