<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/favicon.svg">
    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('website/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/assets/css/meanmenu.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('website/assets/css/swiper.min.css')}}">
    <link rel="stylesheet" href="{{asset('website/assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('website/assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('website/assets/css/fontawesome-pro.css')}}">
    <link rel="stylesheet" href="{{asset('website/assets/css/spacing.css')}}">
    <link rel="stylesheet" href="{{asset('website/assets/css/main.css')}}">
    <link rel="stylesheet" href="{{ asset('website/assets/css/custom.css')}}">
</head>

<body>

    <!--[if lte IE 9]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
      <![endif]-->

    <!-- preloader start -->
    <div id="preloader">
        
        <div class="bd-loader-inner">
             
            <img style="width: 300px; , " src="{{ asset('website/assets/imgs/logo/logo.png') }}" alt="logo not found">
             
            <div class="bd-loader">
                <span class="bd-loader-item"></span>
                <span class="bd-loader-item"></span>
                <span class="bd-loader-item"></span>
                <span class="bd-loader-item"></span>
                <span class="bd-loader-item"></span>
                <span class="bd-loader-item"></span>
                <span class="bd-loader-item"></span>
                <span class="bd-loader-item"></span>
               
            </div>
        </div>
    </div>
    <!-- preloader start -->

    <!-- Back to top start -->
    <div class="backtotop-wrap cursor-pointer">
        <svg class="backtotop-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- Back to top end -->

    <!-- search area start -->
    <div class="df-search-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="df-search-form">
                        <div class="df-search-close text-center mb-20">
                            <button class="df-search-close-btn df-search-close-btn"></button>
                        </div>
                        <form action="#">
                            <div class="df-search-input mb-10">
                                <input type="text" placeholder="Search for product...">
                                <button type="submit"><i class="flaticon-search-1"></i></button>
                            </div>
                            <div class="df-search-category">
                                <span>Search by : </span>
                                <a href="#">Healthline, </a>
                                <a href="#">COVID-19, </a>
                                <a href="#">Surgery, </a>
                                <a href="#">Surgeon, </a>
                                <a href="#">Medical research</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="body-overlay"></div>
    <!-- search area end -->

    <!-- Offcanvas area start -->
    <div class="fix">
        <div class="offcanvas__info">
            <div class="offcanvas__wrapper">
                <div class="offcanvas__content">
                    <div class="offcanvas__top mb-40 d-flex justify-content-between align-items-center">
                        <div class="offcanvas__logo">
                            <a href="dashboard.html">
                                <img src="{{ asset('website/assets/imgs/logo/logo.png') }}" alt="logo not found">
                            </a>
                        </div>
                        <div class="offcanvas__close">
                            <button>
                                <i class="fal fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="offcanvas__search mb-25">
                        <form action="#">
                            <input type="text" placeholder="What are you searching for?">
                            <button type="submit"><i class="far fa-search"></i></button>
                        </form>
                    </div>
                    <div class="mobile-menu fix mb-40"></div>
                    <div class="offcanvas__contact mt-30 mb-20">
                        <h4>Contact Info</h4>
                        <ul>
                            <li class="d-flex align-items-center">
                                <div class="offcanvas__contact-icon mr-15">
                                    <i class="fal fa-map-marker-alt"></i>
                                </div>
                                <div class="offcanvas__contact-text">
                                    <a target="_blank"
                                        href="https://www.google.com/maps/place/Dhaka/@23.7806207,90.3492859,12z/data=!3m1!4b1!4m5!3m4!1s0x3755b8b087026b81:0x8fa563bbdd5904c2!8m2!3d23.8104753!4d90.4119873">12/A,
                                        Mirnada City Tower, NYC</a>
                                </div>
                            </li>
                            <li class="d-flex align-items-center">
                                <div class="offcanvas__contact-icon mr-15">
                                    <i class="far fa-phone"></i>
                                </div>
                                <div class="offcanvas__contact-text">
                                    <a href="tel:+088889797697">+088889797697</a>
                                </div>
                            </li>
                            <li class="d-flex align-items-center">
                                <div class="offcanvas__contact-icon mr-15">
                                    <i class="fal fa-envelope"></i>
                                </div>
                                <div class="offcanvas__contact-text">
                                    <a href="tel:+012-345-6789"><span
                                            class="mailto:support@mail.com">support@mail.com</span></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="offcanvas__social">
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="offcanvas__overlay"></div>
    <div class="offcanvas__overlay-white"></div>
    <!-- Offcanvas area start -->

   <!-- Header area start -->
   <header>
      <div id="header-sticky" class="header-area header-2 header-transparent">
         <div class="container-fluid">
            <div class="mega-menu-wrapper">
               <div class="header-main">
                  <div class="header-left">
                     <div class="header-logo">
                        <a href="index.html">
                           <img src="{{ asset('website/assets/imgs/logo/logo.png') }}" alt="logo not found">

                        </a>
                     </div>
                     <div class="mean__menu-wrapper d-none d-lg-block">
                        <div class="main-menu">
                           <nav id="mobile-menu">
                              <ul>
                                            <li class="menu-thumb">
                                                <a href="{{ route('home.page', ['lang' => app()->getLocale()]) }}">
                                                    Home
                                                </a>
                                                
                                            </li>
                                            <li>
                                                <a href="{{ route('about.page', ['lang' => app()->getLocale()]) }}">About</a>
                                            </li>
                                          
                                            <li class="has-dropdown">
                                                <a href="{{ route('product.page', ['lang' => app()->getLocale()]) }}">
                                                    product
                                                </a>
                                                <ul class="submenu">
                                                    <li><a href="appointment.html">Appointment</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown">
                                                <a href="{{ route('blog.page', ['lang' => app()->getLocale()]) }}">Blog</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('Certificate.page', ['lang' => app()->getLocale()]) }}">Certificate</a>
                                            </li> 
                                            <li>
                                                <a href="{{ route('contact.page', ['lang' => app()->getLocale()]) }}">Contact</a>
                                            </li>
                                        </ul>
                           </nav>
                           <!-- for wp -->

                        </div>
                     </div>
                  </div>
                  <div class="header-right d-flex justify-content-end">
                     <div class="header__hamburger d-xl-none">
                        <div class="sidebar__toggle">
                           <a class="bar-icon" href="javascript:void(0)">
                              <span></span>
                              <span>
                                 <small></small>
                              </span>
                              <span></span>
                           </a>
                        </div>
                     </div>
                  </div>
                  <div class="lang">
                    @php
                    use Illuminate\Support\Str;

    $languages = ['en', 'ar'];
    $currentLang = app()->getLocale();
    $currentUrl = url()->full();

    function switchLangUrl($newLang, $currentLang, $currentUrl) {
        if (preg_match('/\/(en|ar)(\/|$)/', $currentUrl)) {
            return Str::replaceFirst("/$currentLang", "/$newLang", $currentUrl);
        } else {
            return url($newLang);
        }
    }
@endphp

<div class="lang">
    @foreach ($languages as $lang)
        @if ($lang !== $currentLang)
            <a href="{{ switchLangUrl($lang, $currentLang, $currentUrl) }}" class="lang_select">
                {{ $lang }}
            </a>
        @else
            <span style="font-weight: bold">{{ $lang }}</span>
        @endif

        @if (!$loop->last)
            |
        @endif
    @endforeach
</div>
                     </div>
               </div>
            </div>
         </div>
      </div>
   </header>
    <!-- Header area end -->
    <main>
        @yield('content')
    </main>
    <!-- Footer area start -->
    <footer>
        <div class="footer-area footer-bg section-space-medium">
            <div class="container">
                <div class="row gy-50 justify-content-between">
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="footer-widget footer-col-1">
                            <div class="footer-logo mb-35">
                                <a href="index.html"><img src="assets/imgs/logo/logo-white.svg"
                                        alt="image bnot found"></a>
                            </div>
                            <p>It helps designers plan out where the content will sit, the content to be written and
                                approved.
                            </p>
                        </div>
                        <div class="footer__opening d-flex align-items-start">
                            <div class="footer-opening-icon mr-15">
                                <span>
                                    <svg width="36" height="33" viewBox="0 0 36 33" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M33.3525 8.27969L28.1441 29.1907C27.7732 30.7516 26.3823 31.8335 24.7749 31.8335H4.4667C2.13296 31.8335 0.463822 29.546 1.1593 27.305L7.66595 6.40966C8.11415 4.95687 9.45877 3.95215 10.9734 3.95215H29.9833C31.4516 3.95215 32.6725 4.84856 33.1826 6.08498C33.4762 6.74955 33.538 7.50692 33.3525 8.27969Z"
                                            stroke="#EB753B" stroke-width="2" stroke-miterlimit="10" />
                                        <path
                                            d="M24.1895 31.8329H31.5771C33.5708 31.8329 35.1318 30.1482 34.9927 28.1545L33.4626 7.10449"
                                            stroke="#EB753B" stroke-width="2" stroke-miterlimit="10"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M14.4199 7.69318L16.0273 1.0166" stroke="#EB753B" stroke-width="2"
                                            stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M24.7734 7.70752L26.2262 1" stroke="#EB753B" stroke-width="2"
                                            stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M11.3594 16.3779H23.7236" stroke="#EB753B" stroke-width="2"
                                            stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M9.81445 22.5596H22.1787" stroke="#EB753B" stroke-width="2"
                                            stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </div>
                            <div class="footer-opening-content">
                                <h4>Opening Hours</h4>
                                <p>Mon – Sat 8:00 – 17:30 Sunday – CLOSED</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-2 col-xl-2 col-lg-2 col-md-6 col-sm-6">
                        <div class="footer-widget footer-col-2">
                            <div class="footer-widget-title">
                                <h4>Quick Link</h4>
                            </div>
                            <div class="footer-link">
                                <ul>
                                    <li><a href="{{ route('home.page', ['lang' => app()->getLocale()]) }}">Home</a></li>
                                    <li><a href="{{ route('about.page', ['lang' => app()->getLocale()]) }}">About</a></li>
                                    <li><a href="{{ route('product.page', ['lang' => app()->getLocale()]) }}">Product</a></li>
                                    <li><a href="{{ route('blog.page', ['lang' => app()->getLocale()]) }}">Blog</a></li>
                                    <li><a href="{{ route('Certificate.page', ['lang' => app()->getLocale()]) }}">Certificate</a></li>
                                    <li><a href="{{ route('contact.page', ['lang' => app()->getLocale()]) }}">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-widget footer-col-3">
                            <div class="footer-widget-title">
                                <h4>Support Desk</h4>
                            </div>
                            <div class="footer-link">
                                <ul>
                                    <li><a href="#">Cookies</a></li>
                                    <li><a href="#">Careers</a></li>
                                    <li><a href="#">How its work</a></li>
                                    <li><a href="#">Feedback</a></li>
                                    <li><a href="#">Quick links</a></li>
                                    <li><a href="#">Privacy policy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-6">
                        <div class="footer-widget footer-col-4">
                            <div class="footer-widget-title">
                                <h4>Social</h4>
                            </div>
                            <div class="footer-info mb-35">
                                <div class="footer-info-item d-flex align-items-start">
                                    <div class="footer-info-icon mr-20">
                                        <span> <i class="fa-solid fa-location-dot"></i></span>
                                    </div>
                                    <div class="footer-info-text">
                                        <a target="_blank"
                                            href="https://www.google.com/maps/place/Orville+St,+La+Presa,+CA+91977,+USA/@32.7092048,-117.0082772,17z/data=!3m1!4b1!4m5!3m4!1s0x80d9508a9aec8cd1:0x72d1ac1c9527b705!8m2!3d32.7092003!4d-117.0060885">711-2880
                                            Nulla St.</a>
                                    </div>
                                </div>
                                <div class="footer-info-item d-flex align-items-start">
                                    <div class="footer-info-icon mr-20">
                                        <span><i class="fa-solid fa-envelope"></i></span>
                                    </div>
                                    <div class="footer-info-text">
                                        <a href="mailto:example@gmail.com">example@gmail.com</a>
                                    </div>
                                </div>
                                <div class="footer-info-item d-flex align-items-start">
                                    <div class="footer-info-icon mr-20">
                                        <span><i class="fa-solid fa-phone"></i></span>
                                    </div>
                                    <div class="footer-info-text">
                                        <a href="tel:012-345-6789">+964 742 44 763</a>
                                    </div>
                                </div>
                            </div>
                            <div class="theme-social">
                                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="fotter-bottom theme-bg-1 pt-25 pb-25">
            <div class="footer-copyright-text text-center">
                <p class="mb-0">© All Copyright 2024 by #9<a href="#">Meditek
                    </a></p>
            </div>
        </div>
    </footer>
    <!-- Footer area end -->

    <!-- JS here -->
    <script src="{{asset('website/assets/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('website/assets/js/waypoints.min.js')}}"></script>
    <script src="{{asset('website/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('website/assets/js/meanmenu.min.js')}}"></script>
    <script src="{{asset('website/assets/js/swiper.min.js')}}"></script>
    <script src="{{asset('website/assets/js/slick.min.js')}}"></script>
    <script src="{{asset('website/assets/js/magnific-popup.min.js')}}"></script>
    <script src="{{asset('website/assets/js/counterup.js')}}"></script>
    <script src="{{asset('website/assets/js/wow.js')}}"></script>
    <script src="{{asset('website/assets/js/ajax-form.js')}}"></script>
    <script src="{{asset('website/assets/js/beforeafter.jquery-1.0.0.min.js')}}"></script>
    <script src="{{asset('website/assets/js/main.js')}}"></script>
    @yield('scripts')
</body>

</html>
