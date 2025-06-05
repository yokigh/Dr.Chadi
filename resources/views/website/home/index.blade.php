@extends('website.layout.app')
@section('title', __('messages.title'))
@section('content')
    <!-- Body main wrapper start -->
    <section class="hero-section">
        <div class="array-button">
            <button class="array-prev"><i class="far fa-chevron-left"></i></button>
            <button class="array-next"><i class="far fa-chevron-right"></i></button>
        </div>

        <div class="swiper hero-slider">
            <div class="swiper-wrapper">
                @foreach ($sliders as $slider)
                    <div class="swiper-slide">
                        <div class="hero-1">
                            <div class="hero-bg bg-cover" style="background-image: url('{{ $slider->image }}');"></div>
                            <div class="container">
                                <div class="row g-4">
                                    <div class="col-lg-9">
                                        <div class="hero-content">
                                            <h6>{{ $slider->{'name_' . app()->getLocale()} }}</h6>
                                            <h1>{!! $slider->{'desc_' . app()->getLocale()} !!}</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Body main wrapper end -->

    <!-- Features area start -->
    <section class="features-area theme-bg-1 section-space-medium">
        <div class="container">
            <div class="row g-5 wow fadeInUp" data-wow-delay=".4s">
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="features-item">
                        <div class="features-icon">
                            <span><img src="assets/imgs/features/01.svg" alt=""></span>
                        </div>
                        <div class="features-content">
                            <h4>More experience</h4>
                            <p>edical services required on the spot e.g. for medical </p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="features-item">
                        <div class="features-icon">
                            <span><img src="assets/imgs/features/02.svg" alt=""></span>
                        </div>
                        <div class="features-content">
                            <h4>Daily Innovation</h4>
                            <p>edical services required on the spot e.g. for medical </p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                    <div class="features-item">
                        <div class="features-icon">
                            <span><img src="assets/imgs/features/03.svg" alt=""></span>
                        </div>
                        <div class="features-content">
                            <h4>You come first</h4>
                            <p>edical services required on the spot e.g. for medical </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Features area end -->

    <!-- About area start -->
    <section class="about-area p-relative section-space fix">
        <div class="round-box-2">
            <span class="banner-round-1"></span>
            <span class="banner-round-2"></span>
            <span class="banner-round-3"></span>
        </div>
        <div class="container">
            <div class="row g-60 align-items-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="about-thumb-wrapper p-relative z-index-11">
                        <div class="about-thumb w-img">
                            <img src="{{ asset($abouts->image) }}" alt="about image">
                        </div>
                        <div class="about-dot">
                            <img src="assets/imgs/about/dot.svg" alt="">
                        </div>
                        <div class="about-rectangle"></div>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="about-content-box wow fadeInUp" data-wow-delay=".5s">
                        <div class="section-title-wrapper mb-30">
                            <div class="section-subtitle">
                                <span>{{ __('pages.about_us') }}</span>
                            </div>
                            <h2 class="section-title">{{ $abouts->{'name_' . app()->getLocale()} }}</h2>
                        </div>
                        <p>{!! $abouts->{'desc_' . app()->getLocale()} !!}</p>
                        <div class="row gy-3">
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="about-info-item">
                                    <div class="about-info-content">
                                        <div class="about-info-icon">
                                            <span><img src="assets/imgs/about/info-01.svg" alt=""></span>
                                        </div>
                                        <h4>More experience</h4>
                                        <p>Medical services required on the spot, e.g., for emergencies.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="about-info-item">
                                    <div class="about-info-content">
                                        <div class="about-info-icon">
                                            <span><img src="assets/imgs/about/info-02.svg" alt=""></span>
                                        </div>
                                        <h4>Innovation Impact</h4>
                                        <p>Advanced tools and continuous innovation in health solutions.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About area end -->

    <!-- Products area start -->
    <section class="service-area theme-bg-2 section-space">
        <div class="container">
            <div class="row section-title-spacing justify-content-center">
                <div class="col-xxl-5 col-xl-5 col-lg-6">
                    <div class="section-title-wrapper text-center">
                        <div class="section-subtitle">
                            <span>{{ __('pages.ourproducts') }}</span>
                        </div>
                        <h2 class="section-title">Best Medical products</h2>
                    </div>
                </div>
            </div>

            <div class="row gy-5">
                @foreach ($products as $product)
                    <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6">
                        <div class="service-item wow fadeInUp" data-wow-delay=".{{ $loop->index + 3 }}s">
                            <div class="service-thumb w-img">
                                <a href="#"><img src="{{ asset($product->image) }}"
                                        alt="{{ $product->{'name_' . app()->getLocale()} }}"></a>
                            </div>
                            <div class="service-content">
                                <h4>
                                    <a href="#">{{ $product->{'name_' . app()->getLocale()} }}</a>
                                </h4>
                                <p>{{ Str::limit(strip_tags($product->{'desc_' . app()->getLocale()}), 80) }}</p>
                                <p class="text-primary fw-bold">${{ number_format($product->price, 2) }}</p>
                                <div class="service-link">
                                    <a href="#"><i class="fa-regular fa-angle-right"></i></a>
                                </div>
                                <div class="service-icon">
                                    <span><img src="assets/imgs/service/service-icon-{{ $loop->iteration }}.svg"
                                            alt=""></span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="btn-wrapper text-center">
                <a href="{{ route('product.page', ['lang' => app()->getLocale()]) }}" class="fill-btn">
                    <span class="fill-btn-inner">
                        <span class="fill-btn-normal">{{ __('pages.view_more') }} <i
                                class="fa-regular fa-angle-right"></i></span>
                        <span class="fill-btn-hover">{{ __('pages.view_more') }} <i
                                class="fa-regular fa-angle-right"></i></span>
                    </span>
                </a>
            </div>
        </div>
    </section>

    <!-- Products area end -->

    <!-- Appointment area start -->
    <section class="appointment-area theme-bg-1 p-relative z-index-11 fix">
        <div class="container">
            <div class="row g-0">
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="appointment-thumb-box">
                        <div class="appointment-thumb w-img">
                            <img src="assets/imgs/appointment/appointment.jpg" alt="">
                        </div>
                        <div class="appointment-video-shape">
                            <a class="popup-video round-cercle popup-video"
                                href="https://www.youtube.com/watch?v=Fft5igeEIEM">
                                <span class="icon-box"><i class="fa-solid fa-play"></i></span>
                                <img class="image-text rotate-circle" src="assets/imgs/shapes/text-circle.png"
                                    alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Appointment area end -->

    <!-- Why choose area start -->
    <section class="why-choose-area section-space">
        <div class="container">
            <div class="row gy-5">
                <div class="col-xxl-4 col-xl-4 col-lg-4">
                    <div class="why-content bd-sticky">
                        <div class="section-title-wrapper section-title-spacing">
                            <div class="section-subtitle">
                                <span>why Us</span>
                            </div>
                            <h2 class="section-title mb-30">Why choose Meditek
                                ?</h2>
                            <p>Lorem ipsum dolor sit amet consectetur adipisng elit Ut et massa mi. Aliquam in hendrerit
                                urna.
                                Pellentesque sit amet sapiengilla</p>
                            <div class="button-wrapper mt-45">
                                <a href="#" class="fill-btn">
                                    <span class="fill-btn-inner">
                                        <span class="fill-btn-normal">appointment<i
                                                class="fa-regular fa-angle-right"></i></span>
                                        <span class="fill-btn-hover">appointment<i
                                                class="fa-regular fa-angle-right"></i></span>
                                    </span>
                                </a>
                                <div class="link-text">
                                    <span><img src="assets/imgs/svg/phone-call.svg" alt=""></span>
                                    <a href="tel:+380961381876">+380961381876</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-8 col-xl-8 col-lg-8">
                    <div class="row g-3">
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                            <div class="why-choose-item active">
                                <div class="why-choose-icon">
                                    <span><img src="assets/imgs/why/icon-01.png" alt=""></span>
                                </div>
                                <div class="why-choose-content">
                                    <h4><a href="about.html">More experience</a></h4>
                                    <p>edical services required on the spot e.g. for medical treatment, emergency doctor,
                                        etc.
                                    </p>
                                </div>
                                <div class="why-choose-serial">
                                    <span>01</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                            <div class="why-choose-item">
                                <div class="why-choose-icon">
                                    <span><img src="assets/imgs/why/icon-02.png" alt=""></span>
                                </div>
                                <div class="why-choose-content">
                                    <h4><a href="about.html">Innovation with impact</a></h4>
                                    <p>edical services required on the spot e.g. for medical treatment, emergency doctor,
                                        etc.
                                    </p>
                                </div>
                                <div class="why-choose-serial">
                                    <span>02</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                            <div class="why-choose-item">
                                <div class="why-choose-icon">
                                    <span><img src="assets/imgs/why/icon-03.png" alt=""></span>
                                </div>
                                <div class="why-choose-content">
                                    <h4><a href="about.html">The right answers</a></h4>
                                    <p>edical services required on the spot e.g. for medical treatment, emergency doctor,
                                        etc.
                                    </p>
                                </div>
                                <div class="why-choose-serial">
                                    <span>03</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6">
                            <div class="why-choose-item">
                                <div class="why-choose-icon">
                                    <span><img src="assets/imgs/why/icon-04.png" alt=""></span>
                                </div>
                                <div class="why-choose-content">
                                    <h4><a href="about.html">You come first</a></h4>
                                    <p>edical services required on the spot e.g. for medical treatment, emergency doctor,
                                        etc.
                                    </p>
                                </div>
                                <div class="why-choose-serial">
                                    <span>04</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Why choose area end -->

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

    <!-- section divider -->
    <div class="section-divider">
        <div class="container">
            <hr>
        </div>
    </div>

    <!-- Appointment area start -->
    <div class="appointment-form-area theme-bg-1 p-relative">
        <div class="container">
            <div class="row">
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="appointment-thumb-2 w-img">
                        <img src="assets/imgs/appointment/appointment-02.jpg" alt="">
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6">
                    <div class="appointment-input-wrapper section-space">
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
                                    <div class="contact__from-input">
                                        <input type="tel" placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="contact__from-input">
                                        <input type="date">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="contact__select mb-20">
                                        <select>
                                            <option value="0">Pediatric Clinic</option>
                                            <option value="2">Diagnosis Clinic</option>
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
                                        <textarea name="Message" placeholder="Your Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="appointment__btn">
                                        <button class="fill-btn secondary" type="submit">
                                            <span class="fill-btn-inner">
                                                <span class="fill-btn-normal">Now Appointment<i
                                                        class="fa-regular fa-angle-right"></i></span>
                                                <span class="fill-btn-hover">Now Appointment<i
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
    <!-- Appointment area end -->
@endsection
