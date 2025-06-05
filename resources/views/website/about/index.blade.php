@extends('website.layout.app')
@section('title', __('messages.about'))
@section('content')
    <!-- Breadcrumb area start  -->
    <div class="breadcrumb__area theme-bg-1 p-relative z-index-11 pt-95 pb-95">
        <div class="breadcrumb__thumb" data-background="{{ asset('website/assets/imgs/bg/breadcrumb-bg.jpg') }}"></div>
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
            @foreach ($abouts as $about)
                <div class="row gy-50 align-items-center">
                    <div class="col-xxl-6 col-xl-6 col-lg-6">
                        <div class="about-thumb-wrapper-6 p-relative z-index-11 wow fadeInLeft animated"
                            data-wow-delay="0.3s">
                            <div class="about-thumb w-img">
                                <img src="{{ asset($about->image) }}" alt="{{ $about->{'name_' . app()->getLocale()} }}">
                            </div>
                            <div class="about-dot">
                                <img src="{{ asset('assets/imgs/about/dot.svg') }}" alt="">
                            </div>
                            <div class="about-experience-2">
                                <p>25+ {{ __('pages.years_experience') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6">
                        <div class="about-content-6 wow fadeInRight animated" data-wow-delay="0.3s">
                            <div class="section-title-wrapper-2 mb-15">
                                <span class="section-subtitle-2 mb-15">{{ $about->{'name_' . app()->getLocale()} }}</span>
                                <h2 class="section-title">{{ __('pages.best_healthcare') }}</h2>
                            </div>
                            <p>{!! $about->{'desc_' . app()->getLocale()} !!}</p>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- About area end -->

    @include('website.partiels.newslatter')

@endsection
