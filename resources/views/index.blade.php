
<?php 
  use App\Helpers\Helper;
?>
@extends('website/includes/master')



@section('content')

<section data-anim-wrap class="masthead -type-7">
      <div class="masthead-slider js-masthead-slider-7">
        <div class="swiper-wrapper">

          <div class="swiper-slide">
            <div class="row justify-center text-center">
              <div class="col-auto">
                <div class="masthead__content">
                  <div class="masthead__bg">
                    <img src="{{ asset('public/frontend/img/masthead/7/slider1.jpg') }}" alt="image">
                  </div>

                  <div data-anim-child="slide-up delay-1" class="text-white">
                    Discover amzaing places at exclusive deals
                  </div>

                  <h1 data-anim-child="slide-up delay-2" class="text-60 lg:text-40 md:text-30 text-white">
                    Unique Houses Are Waiting<br class="lg:d-none"> For You
                  </h1>
                </div>
              </div>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="row justify-center text-center">
              <div class="col-auto">
                <div class="masthead__content">
                  <div class="masthead__bg">
                    <img src="{{ asset('public/frontend/img/masthead/7/slider2.jpg') }}" alt="image">
                  </div>

                  <div data-anim-child="slide-up delay-1" class="text-white">
                    Discover amzaing places at exclusive deals
                  </div>

                  <h1 data-anim-child="slide-up delay-2" class="text-60 lg:text-40 md:text-30 text-white">
                    Unique Houses Are Waiting<br class="lg:d-none"> For You
                  </h1>
                </div>
              </div>
            </div>
          </div>

          <div class="swiper-slide">
            <div class="row justify-center text-center">
              <div class="col-auto">
                <div class="masthead__content">
                  <div class="masthead__bg">
                    <img src="{{ asset('public/frontend/img/masthead/7/slider3.jpg') }}" alt="image">
                  </div>

                  <div data-anim-child="slide-up delay-1" class="text-white">
                    Discover amzaing places at exclusive deals
                  </div>

                  <h1 data-anim-child="slide-up delay-2" class="text-60 lg:text-40 md:text-30 text-white">
                    Unique Houses Are Waiting<br class="lg:d-none"> For You
                  </h1>
                </div>
              </div>
            </div>
          </div>

        </div>

        <div class="masthead-slider__nav -prev js-prev">
          <button class="button -outline-white text-white size-50 rounded-full">
            <i class="icon-arrow-left"></i>
          </button>
        </div>

        <div class="masthead-slider__nav -next js-next">
          <button class="button -outline-white text-white size-50 rounded-full">
            <i class="icon-arrow-right"></i>
          </button>
        </div>
      </div>

      
    </section>

    <section class="layout-pt-xl layout-pb-md">
      <div class="container">
        <div class="row y-gap-20 justify-center text-center">
          <div class="col-auto">
            <div class="sectionTitle -md">
              <h2 class="sectionTitle__title">Explore by Types of Stays</h2>
              <p class=" sectionTitle__text mt-5 sm:mt-0">These popular destinations have a lot to offer</p>
            </div>
          </div>
        </div>

        <div class="row y-gap-30 pt-40">

          <div class="w-1/5 lg:w-1/3 sm:w-1/2">

            <a href="#" class="citiesCard -type-2 ">
              <div class="citiesCard__image rounded-4 ratio ratio-23:18">
                <img class="img-ratio rounded-4 js-lazy" data-src="{{ asset('public/frontend/img/stays/1/1.png') }}" src="#" alt="image">
              </div>

              <div class="citiesCard__content mt-10">
                <h4 class="text-18 lh-13 fw-500 text-dark-1">Apartments</h4>
                <div class="text-14 text-light-1">4,090 properties</div>
              </div>
            </a>

          </div>

          <div class="w-1/5 lg:w-1/3 sm:w-1/2">

            <a href="#" class="citiesCard -type-2 ">
              <div class="citiesCard__image rounded-4 ratio ratio-23:18">
                <img class="img-ratio rounded-4 js-lazy" data-src="{{ asset('public/frontend/img/stays/1/2.png') }}" src="#" alt="image">
              </div>

              <div class="citiesCard__content mt-10">
                <h4 class="text-18 lh-13 fw-500 text-dark-1">Resorts</h4>
                <div class="text-14 text-light-1">4,090 properties</div>
              </div>
            </a>

          </div>

          <div class="w-1/5 lg:w-1/3 sm:w-1/2">

            <a href="#" class="citiesCard -type-2 ">
              <div class="citiesCard__image rounded-4 ratio ratio-23:18">
                <img class="img-ratio rounded-4 js-lazy" data-src="{{ asset('public/frontend/img/stays/1/3.png') }}" src="#" alt="image">
              </div>

              <div class="citiesCard__content mt-10">
                <h4 class="text-18 lh-13 fw-500 text-dark-1">Villas</h4>
                <div class="text-14 text-light-1">4,090 properties</div>
              </div>
            </a>

          </div>

          <div class="w-1/5 lg:w-1/3 sm:w-1/2">

            <a href="#" class="citiesCard -type-2 ">
              <div class="citiesCard__image rounded-4 ratio ratio-23:18">
                <img class="img-ratio rounded-4 js-lazy" data-src="{{ asset('public/frontend/img/stays/1/4.png') }}" src="#" alt="image">
              </div>

              <div class="citiesCard__content mt-10">
                <h4 class="text-18 lh-13 fw-500 text-dark-1">Cabins</h4>
                <div class="text-14 text-light-1">4,090 properties</div>
              </div>
            </a>

          </div>

          <div class="w-1/5 lg:w-1/3 sm:w-1/2">

            <a href="#" class="citiesCard -type-2 ">
              <div class="citiesCard__image rounded-4 ratio ratio-23:18">
                <img class="img-ratio rounded-4 js-lazy" data-src="{{ asset('public/frontend/img/stays/1/5.png') }}" src="#" alt="image">
              </div>

              <div class="citiesCard__content mt-10">
                <h4 class="text-18 lh-13 fw-500 text-dark-1">Tiny houses</h4>
                <div class="text-14 text-light-1">4,090 properties</div>
              </div>
            </a>

          </div>

        </div>
      </div>
    </section>

    <section class="layout-pt-md layout-pb-md">
      <div data-anim-wrap class="container">
        <div data-anim-child="slide-up delay-1" class="row justify-center text-center">
          <div class="col-auto">
            <div class="sectionTitle -md">
              <h2 class="sectionTitle__title">Homes Guests Love</h2>
              <p class=" sectionTitle__text mt-5 sm:mt-0">Interdum et malesuada fames ac ante ipsum</p>
            </div>
          </div>
        </div>

        <div class="row y-gap-30 pt-40 sm:pt-20">

          <div data-anim-child="slide-up delay-2" class="col-xl-3 col-lg-3 col-sm-6">

            <a href="rental-single.html" class="rentalCard -type-1 rounded-4 ">
              <div class="rentalCard__image">

                <div class="cardImage ratio ratio-1:1">
                  <div class="cardImage__content">

                    <img class="rounded-4 col-12" src="{{ asset('public/frontend/img/rentals/1.png') }}" alt="image">


                  </div>

                  <div class="cardImage__wishlist">
                    <button class="button -blue-1 bg-white size-30 rounded-full shadow-2">
                      <i class="icon-heart text-12"></i>
                    </button>
                  </div>


                </div>

              </div>

              <div class="rentalCard__content mt-10">
                <div class="text-14 text-light-1 lh-14 mb-5">Westminster Borough, London</div>

                <h4 class="rentalCard__title text-dark-1 text-18 lh-16 fw-500">
                  <span>Luxury New Apartment With Private Garden</span>
                </h4>

                <p class="text-light-1 lh-14 text-14 mt-5"></p>

                <div class="d-flex items-center mt-5">
                  <div class="text-14 text-light-1">2 guests</div>
                  <div class="size-3 bg-light-1 rounded-full ml-10 mr-10"></div>
                  <div class="text-14 text-light-1">1 bedroom</div>
                  <div class="size-3 bg-light-1 rounded-full ml-10 mr-10"></div>
                  <div class="text-14 text-light-1">1 bed</div>
                </div>

                <div class="d-flex items-center mt-20">
                  <div class="flex-center bg-blue-1 rounded-4 size-30 text-12 fw-600 text-white">4.8</div>
                  <div class="text-14 text-dark-1 fw-500 ml-10">Exceptional</div>
                  <div class="text-14 text-light-1 ml-10">3,014 reviews</div>
                </div>

                <div class="mt-5">
                  <div class="text-light-1">
                    <span class="fw-500 text-dark-1">US$72</span> / per night
                  </div>
                </div>
              </div>
            </a>

          </div>

          <div data-anim-child="slide-up delay-3" class="col-xl-3 col-lg-3 col-sm-6">

            <a href="rental-single.html" class="rentalCard -type-1 rounded-4 ">
              <div class="rentalCard__image">

                <div class="cardImage ratio ratio-1:1">
                  <div class="cardImage__content">


                    <div class="cardImage-slider rounded-4 overflow-hidden js-cardImage-slider">
                      <div class="swiper-wrapper">

                        <div class="swiper-slide">
                          <img class="col-12" src="{{ asset('public/frontend/img/rentals/2.png') }}" alt="image">
                        </div>

                        <div class="swiper-slide">
                          <img class="col-12" src="{{ asset('public/frontend/img/rentals/3.png') }}" alt="image">
                        </div>

                        <div class="swiper-slide">
                          <img class="col-12" src="{{ asset('public/frontend/img/rentals/1.png') }}" alt="image">
                        </div>

                      </div>

                      <div class="cardImage-slider__pagination js-pagination"></div>

                      <div class="cardImage-slider__nav -prev">
                        <button class="button -blue-1 bg-white size-30 rounded-full shadow-2 js-prev">
                          <i class="icon-chevron-left text-10"></i>
                        </button>
                      </div>

                      <div class="cardImage-slider__nav -next">
                        <button class="button -blue-1 bg-white size-30 rounded-full shadow-2 js-next">
                          <i class="icon-chevron-right text-10"></i>
                        </button>
                      </div>
                    </div>

                  </div>

                  <div class="cardImage__wishlist">
                    <button class="button -blue-1 bg-white size-30 rounded-full shadow-2">
                      <i class="icon-heart text-12"></i>
                    </button>
                  </div>


                </div>

              </div>

              <div class="rentalCard__content mt-10">
                <div class="text-14 text-light-1 lh-14 mb-5">Ciutat Vella, Barcelona</div>

                <h4 class="rentalCard__title text-dark-1 text-18 lh-16 fw-500">
                  <span>Premium One Bedroom Luxury Living in the Heart of Mayfair</span>
                </h4>

                <p class="text-light-1 lh-14 text-14 mt-5"></p>

                <div class="d-flex items-center mt-5">
                  <div class="text-14 text-light-1">2 guests</div>
                  <div class="size-3 bg-light-1 rounded-full ml-10 mr-10"></div>
                  <div class="text-14 text-light-1">1 bedroom</div>
                  <div class="size-3 bg-light-1 rounded-full ml-10 mr-10"></div>
                  <div class="text-14 text-light-1">1 bed</div>
                </div>

                <div class="d-flex items-center mt-20">
                  <div class="flex-center bg-blue-1 rounded-4 size-30 text-12 fw-600 text-white">4.8</div>
                  <div class="text-14 text-dark-1 fw-500 ml-10">Exceptional</div>
                  <div class="text-14 text-light-1 ml-10">3,014 reviews</div>
                </div>

                <div class="mt-5">
                  <div class="text-light-1">
                    <span class="fw-500 text-dark-1">US$72</span> / per night
                  </div>
                </div>
              </div>
            </a>

          </div>

          <div data-anim-child="slide-up delay-4" class="col-xl-3 col-lg-3 col-sm-6">

            <a href="rental-single.html" class="rentalCard -type-1 rounded-4 ">
              <div class="rentalCard__image">

                <div class="cardImage ratio ratio-1:1">
                  <div class="cardImage__content">

                    <img class="rounded-4 col-12" src="{{ asset('public/frontend/img/rentals/3.png') }}" alt="image">


                  </div>

                  <div class="cardImage__wishlist">
                    <button class="button -blue-1 bg-white size-30 rounded-full shadow-2">
                      <i class="icon-heart text-12"></i>
                    </button>
                  </div>


                  <div class="cardImage__leftBadge">
                    <div class="py-5 px-15 rounded-right-4 text-12 lh-16 fw-500 uppercase bg-blue-1 text-white">
                      Best Seller
                    </div>
                  </div>

                </div>

              </div>

              <div class="rentalCard__content mt-10">
                <div class="text-14 text-light-1 lh-14 mb-5">Manhattan, New York</div>

                <h4 class="rentalCard__title text-dark-1 text-18 lh-16 fw-500">
                  <span>Style, Charm & Comfort in Camberwell</span>
                </h4>

                <p class="text-light-1 lh-14 text-14 mt-5"></p>

                <div class="d-flex items-center mt-5">
                  <div class="text-14 text-light-1">2 guests</div>
                  <div class="size-3 bg-light-1 rounded-full ml-10 mr-10"></div>
                  <div class="text-14 text-light-1">1 bedroom</div>
                  <div class="size-3 bg-light-1 rounded-full ml-10 mr-10"></div>
                  <div class="text-14 text-light-1">1 bed</div>
                </div>

                <div class="d-flex items-center mt-20">
                  <div class="flex-center bg-blue-1 rounded-4 size-30 text-12 fw-600 text-white">4.8</div>
                  <div class="text-14 text-dark-1 fw-500 ml-10">Exceptional</div>
                  <div class="text-14 text-light-1 ml-10">3,014 reviews</div>
                </div>

                <div class="mt-5">
                  <div class="text-light-1">
                    <span class="fw-500 text-dark-1">US$72</span> / per night
                  </div>
                </div>
              </div>
            </a>

          </div>

          <div data-anim-child="slide-up delay-5" class="col-xl-3 col-lg-3 col-sm-6">

            <a href="rental-single.html" class="rentalCard -type-1 rounded-4 ">
              <div class="rentalCard__image">

                <div class="cardImage ratio ratio-1:1">
                  <div class="cardImage__content">

                    <img class="rounded-4 col-12" src="{{ asset('public/frontend/img/rentals/4.png') }}" alt="image">


                  </div>

                  <div class="cardImage__wishlist">
                    <button class="button -blue-1 bg-white size-30 rounded-full shadow-2">
                      <i class="icon-heart text-12"></i>
                    </button>
                  </div>


                  <div class="cardImage__leftBadge">
                    <div class="py-5 px-15 rounded-right-4 text-12 lh-16 fw-500 uppercase bg-yellow-1 text-dark-1">
                      Top Rated
                    </div>
                  </div>

                </div>

              </div>

              <div class="rentalCard__content mt-10">
                <div class="text-14 text-light-1 lh-14 mb-5">Vaticano Prati, Rome</div>

                <h4 class="rentalCard__title text-dark-1 text-18 lh-16 fw-500">
                  <span>Marylebone - Oxford Street 1 bed apt with WiFi</span>
                </h4>

                <p class="text-light-1 lh-14 text-14 mt-5"></p>

                <div class="d-flex items-center mt-5">
                  <div class="text-14 text-light-1">2 guests</div>
                  <div class="size-3 bg-light-1 rounded-full ml-10 mr-10"></div>
                  <div class="text-14 text-light-1">1 bedroom</div>
                  <div class="size-3 bg-light-1 rounded-full ml-10 mr-10"></div>
                  <div class="text-14 text-light-1">1 bed</div>
                </div>

                <div class="d-flex items-center mt-20">
                  <div class="flex-center bg-blue-1 rounded-4 size-30 text-12 fw-600 text-white">4.8</div>
                  <div class="text-14 text-dark-1 fw-500 ml-10">Exceptional</div>
                  <div class="text-14 text-light-1 ml-10">3,014 reviews</div>
                </div>

                <div class="mt-5">
                  <div class="text-light-1">
                    <span class="fw-500 text-dark-1">US$72</span> / per night
                  </div>
                </div>
              </div>
            </a>

          </div>

        </div>
      </div>
    </section>

    <section class="layout-pt-md layout-pb-lg">
      <div data-anim-wrap class="container">
        <div data-anim-child="slide-up delay-1" class="row justify-center text-center">
          <div class="col-auto">
            <div class="sectionTitle -md">
              <h2 class="sectionTitle__title">Top Destinations</h2>
              <p class=" sectionTitle__text mt-5 sm:mt-0">These popular destinations have a lot to offer</p>
            </div>
          </div>
        </div>

        <div class="row y-gap-40 justify-between pt-40 sm:pt-20">

          <div data-anim-child="slide-up delay-1" class="col-xl-6 col-md-4 col-sm-6">

            <a href="#" class="citiesCard -type-3 d-block rounded-4 ">
              <div class="citiesCard__image ">
                <img class="img-ratio js-lazy" src="#" data-src="{{ asset('public/frontend/img/destinations/4/1.png') }}" alt="image">
              </div>

              <div class="citiesCard__content px-30 py-30">
                <h4 class="text-26 fw-600 text-white">Paris</h4>
                <div class="text-15 text-white">1,714 properties</div>
              </div>
            </a>

          </div>

          <div data-anim-child="slide-up delay-2" class="col-xl-6 col-md-4 col-sm-6">

            <a href="#" class="citiesCard -type-3 d-block rounded-4 ">
              <div class="citiesCard__image ">
                <img class="img-ratio js-lazy" src="#" data-src="{{ asset('public/frontend/img/destinations/4/2.png') }}" alt="image">
              </div>

              <div class="citiesCard__content px-30 py-30">
                <h4 class="text-26 fw-600 text-white">London</h4>
                <div class="text-15 text-white">1,714 properties</div>
              </div>
            </a>

          </div>

          <div data-anim-child="slide-up delay-3" class="col-xl-3 col-md-4 col-sm-6">

            <a href="#" class="citiesCard -type-3 d-block rounded-4 ">
              <div class="citiesCard__image ">
                <img class="img-ratio js-lazy" src="#" data-src="{{ asset('public/frontend/img/destinations/4/3.png') }}" alt="image">
              </div>

              <div class="citiesCard__content px-30 py-30">
                <h4 class="text-26 fw-600 text-white">Los Angeles</h4>
                <div class="text-15 text-white">1,714 properties</div>
              </div>
            </a>

          </div>

          <div data-anim-child="slide-up delay-4" class="col-xl-3 col-md-4 col-sm-6">

            <a href="#" class="citiesCard -type-3 d-block rounded-4 ">
              <div class="citiesCard__image ">
                <img class="img-ratio js-lazy" src="#" data-src="{{ asset('public/frontend/img/destinations/4/4.png') }}" alt="image">
              </div>

              <div class="citiesCard__content px-30 py-30">
                <h4 class="text-26 fw-600 text-white">Amsterdam</h4>
                <div class="text-15 text-white">1,714 properties</div>
              </div>
            </a>

          </div>

          <div data-anim-child="slide-up delay-5" class="col-xl-3 col-md-4 col-sm-6">

            <a href="#" class="citiesCard -type-3 d-block rounded-4 ">
              <div class="citiesCard__image ">
                <img class="img-ratio js-lazy" src="#" data-src="{{ asset('public/frontend/img/destinations/4/5.png') }}" alt="image">
              </div>

              <div class="citiesCard__content px-30 py-30">
                <h4 class="text-26 fw-600 text-white">Istanbul</h4>
                <div class="text-15 text-white">1,714 properties</div>
              </div>
            </a>

          </div>

          <div data-anim-child="slide-up delay-6" class="col-xl-3 col-md-4 col-sm-6">

            <a href="#" class="citiesCard -type-3 d-block rounded-4 ">
              <div class="citiesCard__image ">
                <img class="img-ratio js-lazy" src="#" data-src="{{ asset('public/frontend/img/destinations/4/6.png') }}" alt="image">
              </div>

              <div class="citiesCard__content px-30 py-30">
                <h4 class="text-26 fw-600 text-white">Reykjavik</h4>
                <div class="text-15 text-white">1,714 properties</div>
              </div>
            </a>

          </div>

        </div>
      </div>
    </section>

    <section class="section-bg rounded-4 overflow-hidden">
      <div class="section-bg__item -left-100 -right-100 bg-blue-2"></div>

      <div class="section-bg__item col-4 -right-100 lg:d-none">
        <img src="{{ asset('public/frontend/img/backgrounds/10.png') }}" alt="image">
      </div>

      <div class="container">
        <div class="row">
          <div class="col-xl-6 col-lg-8">
            <div class="pt-120 pb-120 lg:pt-80 lg:pb-80">
              <h2 class="text-30 fw-600">Testimonials</h2>
              <p class="mt-5">Interdum et malesuada fames ac ante ipsum</p>

              <div class="overflow-hidden pt-60 lg:pt-40 js-section-slider" data-slider-cols="base-1">
                <div class="swiper-wrapper">

                  <div class="swiper-slide">
                    <div class="testimonials -type-2">
                      <img src="{{ asset('public/frontend/img/misc/quote.svg') }}" alt="quote" class="mb-35">
                      <div class="text-22 md:text-18 fw-600 text-dark-1">"Our family was traveling via bullet train between cities in Japan with our luggage - the location for this hotel made that so easy. Agoda price was fantastic."</div>

                      <div class="d-flex items-center mt-35">
                        <img src="{{ asset('public/frontend/img/avatars/testimonials/1.png') }}" alt="image" class="size-70">
                        <div class="ml-20">
                          <h5 class="text-15 lh-11 fw-500">Ali Tufan</h5>
                          <div class="text-14 lh-11 mt-5">Product Manager, Apple Inc</div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="swiper-slide">
                    <div class="testimonials -type-2">
                      <img src="{{ asset('public/frontend/img/misc/quote.svg') }}" alt="quote" class="mb-35">
                      <div class="text-22 md:text-18 fw-600 text-dark-1">"Our family was traveling via bullet train between cities in Japan with our luggage - the location for this hotel made that so easy. Agoda price was fantastic."</div>

                      <div class="d-flex items-center mt-35">
                        <img src="{{ asset('public/frontend/img/avatars/testimonials/1.png') }}" alt="image" class="size-70">
                        <div class="ml-20">
                          <h5 class="text-15 lh-11 fw-500">Ali Tufan</h5>
                          <div class="text-14 lh-11 mt-5">Product Manager, Apple Inc</div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="swiper-slide">
                    <div class="testimonials -type-2">
                      <img src="{{ asset('public/frontend/img/misc/quote.svg') }}" alt="quote" class="mb-35">
                      <div class="text-22 md:text-18 fw-600 text-dark-1">"Our family was traveling via bullet train between cities in Japan with our luggage - the location for this hotel made that so easy. Agoda price was fantastic."</div>

                      <div class="d-flex items-center mt-35">
                        <img src="{{ asset('public/frontend/img/avatars/testimonials/1.png') }}" alt="image" class="size-70">
                        <div class="ml-20">
                          <h5 class="text-15 lh-11 fw-500">Ali Tufan</h5>
                          <div class="text-14 lh-11 mt-5">Product Manager, Apple Inc</div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="swiper-slide">
                    <div class="testimonials -type-2">
                      <img src="{{ asset('public/frontend/img/misc/quote.svg') }}" alt="quote" class="mb-35">
                      <div class="text-22 md:text-18 fw-600 text-dark-1">"Our family was traveling via bullet train between cities in Japan with our luggage - the location for this hotel made that so easy. Agoda price was fantastic."</div>

                      <div class="d-flex items-center mt-35">
                        <img src="{{ asset('public/frontend/img/avatars/testimonials/1.png') }}" alt="image" class="size-70">
                        <div class="ml-20">
                          <h5 class="text-15 lh-11 fw-500">Ali Tufan</h5>
                          <div class="text-14 lh-11 mt-5">Product Manager, Apple Inc</div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="swiper-slide">
                    <div class="testimonials -type-2">
                      <img src="{{ asset('public/frontend/img/misc/quote.svg') }}" alt="quote" class="mb-35">
                      <div class="text-22 md:text-18 fw-600 text-dark-1">"Our family was traveling via bullet train between cities in Japan with our luggage - the location for this hotel made that so easy. Agoda price was fantastic."</div>

                      <div class="d-flex items-center mt-35">
                        <img src="{{ asset('public/frontend/img/avatars/testimonials/1.png') }}" alt="image" class="size-70">
                        <div class="ml-20">
                          <h5 class="text-15 lh-11 fw-500">Ali Tufan</h5>
                          <div class="text-14 lh-11 mt-5">Product Manager, Apple Inc</div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section-bg pt-40 pb-40">
      <div class="section-bg__item -left-100 -right-100 border-bottom-light"></div>

      <div class="container">
        <div class="row y-gap-30 justify-center text-center">

          <div class="col-xl-3 col-6">
            <div class="text-40 lg:text-30 lh-13 text-blue-1 fw-600">4,958</div>
            <div class="text-14 lh-14 text-light-1 mt-5">Destinations</div>
          </div>

          <div class="col-xl-3 col-6">
            <div class="text-40 lg:text-30 lh-13 text-blue-1 fw-600">2,869</div>
            <div class="text-14 lh-14 text-light-1 mt-5">Total Properties</div>
          </div>

          <div class="col-xl-3 col-6">
            <div class="text-40 lg:text-30 lh-13 text-blue-1 fw-600">2M</div>
            <div class="text-14 lh-14 text-light-1 mt-5">Happy customers</div>
          </div>

          <div class="col-xl-3 col-6">
            <div class="text-40 lg:text-30 lh-13 text-blue-1 fw-600">574,974</div>
            <div class="text-14 lh-14 text-light-1 mt-5">Our Volunteers</div>
          </div>

        </div>
      </div>
    </section>

    <section class="layout-pt-lg layout-pb-md">
      <div data-anim-wrap class="container">
        <div data-anim-child="slide-up delay-1" class="row justify-center text-center">
          <div class="col-auto">
            <div class="sectionTitle -md">
              <h2 class="sectionTitle__title">Get inspiration for your next trip</h2>
              <p class=" sectionTitle__text mt-5 sm:mt-0">Interdum et malesuada fames</p>
            </div>
          </div>
        </div>

        <div class="blog-grid-1 pt-40">

          <div data-anim-child="slide-up delay-2">

            <a href="" class="blogCard -type-3 ">
              <div class="blogCard__image rounded-4">
                <img class="rounded-4 js-lazy" src="#" data-src="{{ asset('public/frontend/img/blog/2/1.png') }}" alt="image">
              </div>

              <div class="blogCard__content px-50 pb-30 lg:px-20 pb-20">
                <h4 class="text-26 lg:text-18 fw-600 lh-16 text-white">10 European ski destinations you should visit this winter</h4>
                <div class="text-15 lh-14 text-white mt-10">April 06, 2022</div>
              </div>
            </a>

          </div>

          <div data-anim-child="slide-up delay-3">

            <a href="" class="blogCard -type-3 ">
              <div class="blogCard__image rounded-4">
                <img class="rounded-4 js-lazy" src="#" data-src="{{ asset('public/frontend/img/blog/2/2.png') }}" alt="image">
              </div>

              <div class="blogCard__content px-20 pb-20">
                <h4 class="text-18 fw-500 lh-16 text-white">Where can I go? 5 amazing countries that are open right now</h4>
                <div class="text-15 lh-14 text-white mt-10">April 06, 2022</div>
              </div>
            </a>

          </div>

          <div data-anim-child="slide-up delay-4">

            <a href="" class="blogCard -type-3 ">
              <div class="blogCard__image rounded-4">
                <img class="rounded-4 js-lazy" src="#" data-src="{{ asset('public/frontend/img/blog/2/3.png') }}" alt="image">
              </div>

              <div class="blogCard__content px-20 pb-20">
                <h4 class="text-18 fw-500 lh-16 text-white">Booking travel during Corona: good advice in an uncertain time</h4>
                <div class="text-15 lh-14 text-white mt-10">April 06, 2022</div>
              </div>
            </a>

          </div>

        </div>
      </div>
    </section>

    <section class="layout-pt-md layout-pb-md">
      <div class="container">
        <div class="row justify-center text-center">
          <div class="col-auto">
            <div class="sectionTitle -md">
              <h2 class="sectionTitle__title">Why Choose Us</h2>
              <p class=" sectionTitle__text mt-5 sm:mt-0">These popular destinations have a lot to offer</p>
            </div>
          </div>
        </div>

        <div class="row y-gap-40 justify-between pt-50">

          <div class="col-lg-3 col-sm-6">

            <div class="featureIcon -type-1 ">
              <div class="d-flex justify-center">
                <img src="#" data-src="{{ asset('public/frontend/img/featureIcons/1/1.svg') }}" alt="image" class="js-lazy">
              </div>

              <div class="text-center mt-30">
                <h4 class="text-18 fw-500">Best Price Guarantee</h4>
                <p class="text-15 mt-10">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              </div>
            </div>

          </div>

          <div class="col-lg-3 col-sm-6">

            <div class="featureIcon -type-1 ">
              <div class="d-flex justify-center">
                <img src="#" data-src="{{ asset('public/frontend/img/featureIcons/1/2.svg') }}" alt="image" class="js-lazy">
              </div>

              <div class="text-center mt-30">
                <h4 class="text-18 fw-500">Easy & Quick Booking</h4>
                <p class="text-15 mt-10">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              </div>
            </div>

          </div>

          <div class="col-lg-3 col-sm-6">

            <div class="featureIcon -type-1 ">
              <div class="d-flex justify-center">
                <img src="#" data-src="{{ asset('public/frontend/img/featureIcons/1/3.svg') }}" alt="image" class="js-lazy">
              </div>

              <div class="text-center mt-30">
                <h4 class="text-18 fw-500">Customer Care 24/7</h4>
                <p class="text-15 mt-10">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
              </div>
            </div>

          </div>

        </div>
      </div>
    </section>


    <section data-anim="slide-up delay-1" class="layout-pt-md layout-pb-md">
      <div class="container">
        <div class="row ml-0 mr-0 items-center justify-between">
          <div class="col-xl-5 px-0">
            <img class="col-12 h-400" src="{{ asset('public/frontend/img/newsletter/1.png') }}" alt="image">
          </div>

          <div class="col px-0">
            <div class="d-flex justify-center flex-column h-400 px-80 py-40 md:px-30 bg-green-1">
              <div class="icon-newsletter text-60 sm:text-40 text-dark-1"></div>
              <h2 class="text-30 sm:text-24 lh-15 mt-20">Your Travel Journey Starts Here</h2>
              <p class="text-dark-1 mt-5">Sign up and we'll send the best deals to you</p>

              <div class="single-field -w-410 d-flex x-gap-10 flex-wrap y-gap-20 pt-30">
                <div class="col-auto">
                  <input class="col-12 bg-white h-60" type="text" placeholder="Your Email">
                </div>

                <div class="col-auto">
                  <button class="button -md h-60 -blue-1 bg-yellow-1 text-dark-1">Subscribe</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    

  @endsection

  