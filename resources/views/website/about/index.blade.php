@extends('website.layout.app')
@section('title',__('messages.about'))
@section('content')
      <!-- Breadcrumb area start  -->
      <div class="breadcrumb__area theme-bg-1 p-relative z-index-11 pt-95 pb-95">
         <div class="breadcrumb__thumb" data-background="{{asset('website/assets/imgs/bg/breadcrumb-bg.jpg')}}"></div>
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-xxl-12">
                  <div class="breadcrumb__wrapper text-center">
                     <h2 class="breadcrumb__title">About us</h2>
                     <div class="breadcrumb__menu">
                        <nav>
                           <ul>
                              <li><span><a href="index.html">Home</a></span></li>
                              <li><span>About Us</span></li>
                           </ul>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Breadcrumb area start  -->

      <!-- About area start -->
      <section class="about-area section-space">
         <div class="container">
            <div class="row gy-50 align-items-center">
               <div class="col-xxl-6 col-xl-6 col-lg-6">
                  <div class="about-thumb-wrapper-6 p-relative z-index-11 wow fadeInLeft animated"
                     data-wow-delay="0.3s">
                     <div class="about-thumb w-img">
                        <img src="assets/imgs/about/about-thumb-11.jpg" alt="">
                     </div>
                     <div class="about-dot">
                        <img src="assets/imgs/about/dot.svg" alt="">
                     </div>
                     <div class="about-experience-2">
                        <p>25+ years of Experience</p>
                     </div>
                  </div>
               </div>
               <div class="col-xxl-6 col-xl-6 col-lg-6">
                  <div class="about-content-6 wow fadeInRight animated" data-wow-delay="0.3s">
                     <div class="section-title-wrapper-2 mb-15">
                        <span class="section-subtitle-2 mb-15">DIAGNOSTIC CENTER</span>
                        <h2 class="section-title">Best Healthcare
                           for you</h2>
                     </div>
                     <p>Lorem ipsum dolor sit amet consectetur adipisng elit Ut et massa mi. Aliquam in hendr
                        Pellentesque sit amet sapiengilla, mattis ligula consectetur, ultrices mauris. Maecenas.</p>
                     <div class="features__list mb-40">
                        <ul>
                           <li>Reduced symptoms of anxiety</li>
                           <li>Improved stress management</li>
                           <li>Better emotional regulation</li>
                        </ul>
                     </div>
                     <div class="about-author-wrapper">
                        <div class="about-author">
                           <div class="about-author-thumb">
                              <img src="assets/imgs/user/user-06.jpg" alt="">
                           </div>
                           <div class="about-author-content">
                              <h4>William K. Diaz</h4>
                              <span>Founder</span>
                           </div>
                        </div>
                        <div class="about-author-signature">
                           <img src="assets/imgs/about/signature.png" alt="">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- About area end -->

      <!-- Service area start -->
      <section class="service-area theme-bg-2 section-space">
         <div class="container">
            <div class="row section-title-spacing justify-content-center">
               <div class="col-xxl-5 col-xl-5 col-lg-6">
                  <div class="section-title-wrapper-2 text-center">
                     <span class="section-subtitle-2 mb-15">Our Service</span>
                     <h2 class="section-title">Best Medical Services</h2>
                  </div>
               </div>
            </div>
            <div class="row gy-5">
               <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                  <div class="service-item wow fadeIn" data-wow-delay="0.3S">
                     <div class="service-thumb w-img">
                        <a href="service-details.html"><img src="assets/imgs/service/service-01.jpg" alt=""></a>
                     </div>
                     <div class="service-content">
                        <h4><a href="service-details.html">immediate care</a></h4>
                        <p>edical services required on the spot e.g. for medical</p>
                        <div class="service-link"><a href="service-details.html"><i
                                 class="fa-regular fa-angle-right"></i></a>
                        </div>
                        <div class="service-icon">
                           <span><img src="assets/imgs/service/service-icon-1.svg" alt=""></span>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                  <div class="service-item wow fadeIn" data-wow-delay="0.5S">
                     <div class="service-thumb w-img">
                        <a href="service-details.html"><img src="assets/imgs/service/service-02.jpg" alt=""></a>
                     </div>
                     <div class="service-content">
                        <h4><a href="service-details.html">diagnostic center</a></h4>
                        <p>edical services required on the spot e.g. for medical</p>
                        <div class="service-link"><a href="service-details.html"><i
                                 class="fa-regular fa-angle-right"></i></a>
                        </div>
                        <div class="service-icon">
                           <span><img src="assets/imgs/service/service-icon-2.svg" alt=""></span>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                  <div class="service-item wow fadeIn" data-wow-delay="0.7S">
                     <div class="service-thumb w-img">
                        <a href="service-details.html"><img src="assets/imgs/service/service-03.jpg" alt=""></a>
                     </div>
                     <div class="service-content">
                        <h4><a href="service-details.html">pediatric services</a></h4>
                        <p>edical services required on the spot e.g. for medical</p>
                        <div class="service-link"><a href="service-details.html"><i
                                 class="fa-regular fa-angle-right"></i></a>
                        </div>
                        <div class="service-icon">
                           <span><img src="assets/imgs/service/service-icon-3.svg" alt=""></span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="btn-wrapper text-center">
               <a href="service-details.html" class="fill-btn">
                  <span class="fill-btn-inner">
                     <span class="fill-btn-normal">View More<i class="fa-regular fa-angle-right"></i></span>
                     <span class="fill-btn-hover">View More<i class="fa-regular fa-angle-right"></i></span>
                  </span>
               </a>
            </div>
         </div>
      </section>
      <!-- Service area end -->

      <!-- Review area start -->
      <section class="review-area-3 section-space-top">
         <div class="container">
            <div class="review-main">
               <div class="review-inner">
                  <span class="round-1"></span>
                  <span class="round-2"></span>
                  <div class="review-singel">
                     <div class="swiper review-active">
                        <div class="swiper-wrapper">
                           <div class="swiper-slide">
                              <div class="review-item-2">
                                 <div class="review-quote mb-40">
                                    <img src="assets/imgs/icons/quote-blue.png" alt="">
                                 </div>
                                 <div class="review-content-2">
                                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Ut et massa mi. Aliquam in
                                       hendrerit urna. Pellentesque sit amet sapien fringilla, mattis ligula
                                       consectetur, ultrices mauris. Maecenas.</p>
                                 </div>
                                 <div class="review-meta">
                                    <!-- If we need navigation buttons -->
                                    <div class="review-navigation">
                                       <button class="review-button-prev"><i
                                             class="fa-regular fa-arrow-left"></i></button>
                                       <button class="review-button-next"><i
                                             class="fa-regular fa-arrow-right"></i></button>
                                    </div>
                                    <div class="review-item-content">
                                       <h4 class="avatar-name"><a href="#">Alexsia Jorgina</a></h4>
                                       <span>Director</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="swiper-slide">
                              <div class="review-item-2">
                                 <div class="review-quote mb-40">
                                    <img src="assets/imgs/icons/quote-blue.png" alt="">
                                 </div>
                                 <div class="review-content-2">
                                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Ut et massa mi. Aliquam in
                                       hendrerit urna. Pellentesque sit amet sapien fringilla, mattis ligula
                                       consectetur, ultrices mauris. Maecenas.</p>
                                 </div>
                                 <div class="review-meta">
                                    <!-- If we need navigation buttons -->
                                    <div class="review-navigation">
                                       <button class="review-button-prev"><i
                                             class="fa-regular fa-arrow-left"></i></button>
                                       <button class="review-button-next"><i
                                             class="fa-regular fa-arrow-right"></i></button>
                                    </div>
                                    <div class="review-item-content">
                                       <h4 class="avatar-name"><a href="#">Alexsia Jorgina</a></h4>
                                       <span>Director</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="swiper-slide">
                              <div class="review-item-2">
                                 <div class="review-quote mb-40">
                                    <img src="assets/imgs/icons/quote-blue.png" alt="">
                                 </div>
                                 <div class="review-content-2">
                                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Ut et massa mi. Aliquam in
                                       hendrerit urna. Pellentesque sit amet sapien fringilla, mattis ligula
                                       consectetur, ultrices mauris. Maecenas.</p>
                                 </div>
                                 <div class="review-meta">
                                    <!-- If we need navigation buttons -->
                                    <div class="review-navigation">
                                       <button class="review-button-prev"><i
                                             class="fa-regular fa-arrow-left"></i></button>
                                       <button class="review-button-next"><i
                                             class="fa-regular fa-arrow-right"></i></button>
                                    </div>
                                    <div class="review-item-content">
                                       <h4 class="avatar-name"><a href="#">Alexsia Jorgina</a></h4>
                                       <span>Director</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="review-thumb-wrapper">
                     <div class="review-thumb w-img">
                        <img src="assets/imgs/testimonial/review-thumb.png" alt="">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Review area end -->

      <!-- Working area start -->
      <section class="work-area section-space fix">
         <div class="container">
            <div class="row justify-content-center section__title-space">
               <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-8">
                  <div class="section-title-wrapper-2 text-center section-title-space">
                     <span class="section-subtitle-2 mb-15">work process</span>
                     <h2 class="section-title mb-20">How we work</h2>
                     <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisng elit Ut et massa mi. Aliquam in
                        hendr Pellentes.</p>
                  </div>
               </div>
            </div>
            <div class="row wow fadeInUp" data-wow-delay=".3s">
               <div class="col-xxl-12">
                  <div class="work-main p-relative">
                     <div class="work-line">
                        <img src="assets/imgs/work/work-line.png" alt="">
                     </div>
                     <div class="row g-5">
                        <div class="col-xxl-4 col-xl-4 col-lg-4">
                           <div class="working-item text-center">
                              <div class="working-icon">
                                 <span><img src="assets/imgs/work/work-icon-1.png" alt=""></span>
                              </div>
                              <div class="working-contentt">
                                 <h4>Make appointment</h4>
                                 <p>edical services required on the spot e.g. for medical</p>
                              </div>
                           </div>
                        </div>
                        <div class="col-xxl-4 col-xl-4 col-lg-4">
                           <div class="working-item text-center">
                              <div class="working-icon">
                                 <span><img src="assets/imgs/work/work-icon-2.png" alt=""></span>
                              </div>
                              <div class="working-contentt">
                                 <h4>Chose Doctor</h4>
                                 <p>edical services required on the spot e.g. for medical</p>
                              </div>
                           </div>
                        </div>
                        <div class="col-xxl-4 col-xl-4 col-lg-4">
                           <div class="working-item text-center">
                              <div class="working-icon">
                                 <span><img src="assets/imgs/work/work-icon-3.png" alt=""></span>
                              </div>
                              <div class="working-contentt">
                                 <h4>Get Solution</h4>
                                 <p>edical services required on the spot e.g. for medical</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Working area end -->

      <!-- Brand area start -->
      <div class="brand-area section-space-bottom">
         <div class="container">
            <div class="brand-grid">
               <div class="brand-item">
                  <div class="brand-thumb">
                     <img src="assets/imgs/brand/brand-01.png" alt="">
                  </div>
               </div>
               <div class="brand-item">
                  <div class="brand-thumb">
                     <img src="assets/imgs/brand/brand-02.png" alt="">
                  </div>
               </div>
               <div class="brand-item">
                  <div class="brand-thumb">
                     <img src="assets/imgs/brand/brand-03.png" alt="">
                  </div>
               </div>
               <div class="brand-item">
                  <div class="brand-thumb">
                     <img src="assets/imgs/brand/brand-04.png" alt="">
                  </div>
               </div>
               <div class="brand-item">
                  <div class="brand-thumb">
                     <img src="assets/imgs/brand/brand-05.png" alt="">
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Brand area end -->

   
      @include('website.partiels.newslatter')

@endsection
