@extends('website.layout.app')
@section('title',__('messages.certificate'))
@section('content')
<!-- Breadcrumb area start  -->
      <div class="breadcrumb__area theme-bg-1 p-relative z-index-11 pt-95 pb-95">
         <div class="breadcrumb__thumb" data-background="assets/imgs/bg/breadcrumb-bg.jpg"></div>
         <div class="container">
            <div class="row justify-content-center">
               <div class="col-xxl-12">
                  <div class="breadcrumb__wrapper text-center">
                     <h2 class="breadcrumb__title">Show name</h2>
                     <div class="breadcrumb__menu">
                        <nav>
                           <ul>
                              <li><span><a href="index.html">Home</a></span></li>
                              <li><span>Show name</span></li>
                           </ul>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Breadcrumb area start  -->

      <!-- Doctor area start -->
      <section class="doctor-area section-space">
         <div class="container">
            <div class="row gy-50 align-items-center">
               <div class="col-xxl-6 col-xl-6 col-lg-6">
                  <div class="doctor-author-thumb-wrapper wow fadeInLeft p-relative" data-wow-delay="0.3s">
                     <div class="doctor-author-thumb w-img">
                       <img class="gid" src="{{ asset('website/assets/imgs/test/certificate09.png') }}" alt="">

                     </div>
                  </div>
               </div>
               <div class="col-xxl-6 col-xl-6 col-lg-6">
                  <div class="doctor-author-content wow fadeInRight" data-wow-delay="0.3s">
                     <div class="section-title-wrapper-2 mb-30">
                        <span class="section-subtitle-2 mb-20">About Me</span>
                        <h2 class="section-title">Hello! I am Keith Griffin a Medicine Specialist</h2>
                     </div>
                     <p>Lorem ipsum dolor sit amet consectetur adipiscing elit Ut et massa mi. Aliquam in hendrerit
                        urna. Pellentesque sit amet sapien fringilla, mattis ligula consectetur, ultrices mauris.
                        Maecenas vitae mattis tellus..</p>
                     <div class="doctor-author mt-30 mb-40">
                        <div class="doctor-author-info">
                           <div class="icon">
                              <svg width="24" height="28" viewBox="0 0 24 28" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                 <path
                                    d="M22.5 11.6667C22.5 19.8333 12 26.8333 12 26.8333C12 26.8333 1.5 19.8333 1.5 11.6667C1.5 8.88188 2.60625 6.21117 4.57538 4.24203C6.54451 2.2729 9.21523 1.16666 12 1.16666C14.7848 1.16666 17.4555 2.2729 19.4246 4.24203C21.3938 6.21117 22.5 8.88188 22.5 11.6667Z"
                                    stroke="#03AFE5" stroke-width="2.2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                 <path
                                    d="M12 15.1667C13.933 15.1667 15.5 13.5997 15.5 11.6667C15.5 9.73366 13.933 8.16666 12 8.16666C10.067 8.16666 8.5 9.73366 8.5 11.6667C8.5 13.5997 10.067 15.1667 12 15.1667Z"
                                    stroke="#03AFE5" stroke-width="2.2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                              </svg>
                           </div>
                           <div class="content">
                              <h5>Location</h5>
                              <span>la 505, Newyork</span>
                           </div>
                        </div>
                        <div class="doctor-author-info">
                           <div class="icon">
                              <svg width="28" height="28" viewBox="0 0 28 28" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                 <path
                                    d="M23.3327 4.41668H4.66602C3.73776 4.41668 2.84752 4.78543 2.19114 5.4418C1.53476 6.09818 1.16602 6.98842 1.16602 7.91668V20.1667C1.16602 21.0949 1.53476 21.9852 2.19114 22.6416C2.84752 23.2979 3.73776 23.6667 4.66602 23.6667H23.3327C24.2609 23.6667 25.1512 23.2979 25.8076 22.6416C26.4639 21.9852 26.8327 21.0949 26.8327 20.1667V7.91668C26.8327 6.98842 26.4639 6.09818 25.8076 5.4418C25.1512 4.78543 24.2609 4.41668 23.3327 4.41668ZM24.4993 20.1667C24.4993 20.4761 24.3764 20.7728 24.1576 20.9916C23.9388 21.2104 23.6421 21.3333 23.3327 21.3333H4.66602C4.3566 21.3333 4.05985 21.2104 3.84106 20.9916C3.62227 20.7728 3.49935 20.4761 3.49935 20.1667V7.91668C3.49935 7.60726 3.62227 7.31051 3.84106 7.09172C4.05985 6.87293 4.3566 6.75001 4.66602 6.75001H23.3327C23.6421 6.75001 23.9388 6.87293 24.1576 7.09172C24.3764 7.31051 24.4993 7.60726 24.4993 7.91668V20.1667ZM8.16602 1.50001C8.16602 1.19059 8.28893 0.893845 8.50772 0.675052C8.72652 0.45626 9.02326 0.333344 9.33268 0.333344H18.666C18.9754 0.333344 19.2722 0.45626 19.491 0.675052C19.7098 0.893845 19.8327 1.19059 19.8327 1.50001C19.8327 1.80943 19.7098 2.10618 19.491 2.32497C19.2722 2.54376 18.9754 2.66668 18.666 2.66668H9.33268C9.02326 2.66668 8.72652 2.54376 8.50772 2.32497C8.28893 2.10618 8.16602 1.80943 8.16602 1.50001ZM15.166 12.875H17.4993V15.2083H15.166V17.5417H12.8327V15.2083H10.4993V12.875H12.8327V10.5417H15.166V12.875Z"
                                    fill="#03AFE5" />
                              </svg>
                           </div>
                           <div class="content">
                              <h5>Experience</h5>
                              <span>3-5 years</span>
                           </div>
                        </div>
                     </div>
                     <a href="appointment.html" class="fill-btn">
                        <span class="fill-btn-inner">
                           <span class="fill-btn-normal">Make appointment<i
                                 class="fa-regular fa-angle-right"></i></span>
                           <span class="fill-btn-hover">Make appointment<i class="fa-regular fa-angle-right"></i></span>
                        </span>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Doctor area end -->
      <section class="doctor-area section-space" id="slider_content">

<div class="slider-wrapper">
  <button class="nav-button left" id="prevBtn">&#8592;</button>

  <div class="stories-viewport">
    <div class="stories-container" id="slider">
      <div class="story-card"><img src="{{ asset('website/assets/imgs/test/certificate09.png') }}" alt="1"></div>
      <div class="story-card"><img src="https://via.placeholder.com/100x150?text=2" alt="2"></div>
      <div class="story-card"><img src="https://via.placeholder.com/100x150?text=3" alt="3"></div>
      <div class="story-card"><img src="https://via.placeholder.com/100x150?text=4" alt="4"></div>
      <div class="story-card"><img src="https://via.placeholder.com/100x150?text=5" alt="5"></div>
      <div class="story-card"><img src="https://via.placeholder.com/100x150?text=6" alt="6"></div>
      <div class="story-card"><img src="https://via.placeholder.com/100x150?text=7" alt="7"></div>
    </div>
  </div>

  <button class="nav-button right" id="nextBtn">&#8594;</button>
</div>
<div class="image_count">
        <img src="{{ asset('website/assets/imgs/test/certificate09.png') }}" alt="Preview" id="preview" class="preview-image">
</div>
      </section>
      <script>
        document.addEventListener("DOMContentLoaded", function () {
  const slider = document.getElementById("slider");
  const nextBtn = document.getElementById("nextBtn");
  const prevBtn = document.getElementById("prevBtn");
  const preview = document.getElementById("preview");
  const cards = slider.querySelectorAll(".story-card img");

  let currentPosition = 0;
  const cardWidth = 110; // 100px + 10px margin
  const visibleCards = Math.floor(600 / cardWidth); 
  const totalCards = cards.length;

  function updatePreview() {
    preview.src = cards[currentPosition].src.replace("100x150", "300x400");
  }

  function updateSlider() {
    const offset = currentPosition * cardWidth;
    slider.style.transform = `translateX(-${offset}px)`;
    updatePreview();
  }

  nextBtn.addEventListener("click", () => {
    if (currentPosition < totalCards - visibleCards) {
      currentPosition++;
      updateSlider();
    }
  });

  prevBtn.addEventListener("click", () => {
    if (currentPosition > 0) {
      currentPosition--;
      updateSlider();
    }
  });

  cards.forEach((card, index) => {
    card.addEventListener("click", () => {
      currentPosition = index;

      if (currentPosition > totalCards - visibleCards) {
        currentPosition = totalCards - visibleCards;
      }
      if (currentPosition < 0) currentPosition = 0;

      updateSlider();
    });
  });

  updatePreview();
});
</script>
@endsection
