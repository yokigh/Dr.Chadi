@extends('website.layout.app')
@section('title', __('messages.Certificate'))
@section('content')
    <div class="breadcrumb__area theme-bg-1 p-relative z-index-11 pt-95 pb-95">
        <div class="breadcrumb__thumb" data-background="assets/imgs/bg/breadcrumb-bg.jpg"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-12">
                    <div class="breadcrumb__wrapper text-center">
                        <h2 class="breadcrumb__title">Certificate</h2>
                        <div class="breadcrumb__menu">
                            <nav>
                                <ul>
                                    <li><span><a href="index.html">Home</a></span></li>
                                    <li><span>Certificate</span></li>
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
    <div class="cir area">
        <div class="container">
            @foreach ($certificates as $certificate)
                <div class="card">
                    <div class="card-body">
                        <img src="{{ asset($certificate->image) }}" alt="{{ $certificate->{'name_' . app()->getLocale()} }}"
                            class="img1" style="max-height:400px;">
                    </div>
                    <div class="card-footer">
                        <span>{{ $certificate->created_at->format('d/m/Y') }}</span>
                        <h3>{{ $certificate->{'name_' . app()->getLocale()} }}</h3>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
