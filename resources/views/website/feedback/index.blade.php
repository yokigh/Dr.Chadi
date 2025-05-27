@extends('website.layout.app')
@section('title', __('messages.feedback'))
@section('content')
 <div class="breadcrumb__area theme-bg-1 p-relative z-index-11 pt-95 pb-95">
         <div class="breadcrumb__thumb" data-background="assets/imgs/bg/breadcrumb-bg.jpg"></div>
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-xxl-12">
                  <div class="breadcrumb__wrapper text-center">
                     <h2 class="breadcrumb__title">Contact</h2>
                     <div class="breadcrumb__menu">
                        <nav>
                           <ul>
                              <li><span><a href="index.html">Home</a></span></li>
                              <li><span>Contact</span></li>
                           </ul>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Breadcrumb area start  -->

      <!-- Contact area start -->
      <div class="contact-area section-space">
         <div class="container">
            <div class="row g-5">
               <div class="col-xxl-4 col-xl-4 col-lg-6">
                  <div class="contact-info-item text-center">
                     <div class="contact-info-icon">
                        <span><i class="fa-light fa-location-dot"></i></span>
                     </div>
                     <div class="contact-info-content">
                        <h4>Our Location</h4>
                        <p><a href="#">House #5, Street Number #98, brasilia- 70000-000, Brazil.</a></p>
                     </div>
                  </div>
               </div>
               <div class="col-xxl-4 col-xl-4 col-lg-6">
                  <div class="contact-info-item text-center">
                     <div class="contact-info-icon">
                        <span><i class="fa-light fa-envelope"></i></span>
                     </div>
                     <div class="contact-info-content">
                        <h4>Our Email Address</h4>
                        <span><a href="mailto:contact@Meditek
                                 .com">contact@Meditek
                                 .com</a></span>
                        <span><a href="mailto:support@Meditek
                                 .com">support@Meditek
                                 .com</a></span>
                     </div>
                  </div>
               </div>
               <div class="col-xxl-4 col-xl-4 col-lg-6">
                  <div class="contact-info-item text-center">
                     <div class="contact-info-icon">
                        <span><i class="fa-thin fa-phone"></i></span>
                     </div>
                     <div class="contact-info-content">
                        <h4>Contact Phone Number</h4>
                        <span><a href="mailto:+380961381876">+380961381876</a></span>
                        <span><a href="mailto:+380961381877">+380961381877</a></span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="contact-wrapper pt-80">
               <div class="row gy-50">
                  <div class="col-xxl-6 col-xl-6">
                      <img  src="{{ asset('website/assets/imgs/6114131579.jpg') }}" alt="ivon not found">
                  </div>
                  <div class="col-xxl-6 col-xl-6">
                     <div class="contact-from">
                        <form action="#">
                           <div class="row">
                              <div class="col-lg-6">
                                 <div class="contact__from-input">
                                    <input type="text" placeholder="Full Name*">
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="contact__from-input">
                                    <input type="text" placeholder="Email Address*">
                                 </div>
                              </div>
                            
                              <div class="col-lg-6">
                                 <div class="contact__select mb-20">
                                    <select>
                                       <option value="0">Pediatric Clinic</option>
                                       <option value="2">Meditek
                                 sis Clinic</option>
                                       <option value="3">Cardiac Clinic</option>
                                       <option value="1">Medical Pharmacy</option>
                                       <option value="1">Rehabilitation Therapy</option>
                                       <option value="1">Laryngological Clinic</option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="contact__select mb-20">
                                    <select>
                                       <option value="0">Choose Doctor</option>
                                       <option value="2">Dr. Jalen Kothenbeutel</option>
                                       <option value="3">Dr. Jade Dayal</option>
                                       <option value="1">Dr. Zander Nishida</option>
                                       <option value="1">Dr. Mattie Tellers</option>
                                       <option value="1">Dr. Jade Dayal </option>
                                    </select>
                                 </div>
                              </div>
                              <div class="col-lg-12">
                                 <div class="contact__from-input">
                                    <textarea name="Message" placeholder="Your Feedback"></textarea>
                                 </div>
                              </div>
                              <div class="col-12">
                                 <div class="appointment__btn">
                                    <button class="fill-btn" type="submit">
                                       <span class="fill-btn-inner">
                                          <span class="fill-btn-normal">send now<i
                                                class="fa-regular fa-angle-right"></i></span>
                                          <span class="fill-btn-hover">send now<i
                                                class="fa-regular fa-angle-right"></i></span>
                                       </span>
                                    </button>
                                 </div>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Contact area end -->

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

      <!-- Newsletter area start -->
      <section class="newsletter-area p-relative">
         <div class="newsletter-overlay theme-bg-3 "></div>
         <div class="container">
        
         </div>
      </section>
      <!-- Newsletter area end -->
@endsection