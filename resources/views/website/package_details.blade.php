<?php 
    use App\Helpers\Helper;
?>
@extends('website/includes/master')

@section('content')
<section class="py-10 d-flex items-center bg-light-2">
      <div class="container">
        <div class="row y-gap-10 items-center justify-between">
          <div class="col-auto">
            <div class="row x-gap-10 y-gap-5 items-center text-14 text-light-1">
              <div class="col-auto">
                <div class="">Home</div>
              </div>
              <div class="col-auto">
                <div class="">></div>
              </div>
              <div class="col-auto">
                <div class="">Package Details</div>
              </div>
              <div class="col-auto">
                <div class="">></div>
              </div>
              <div class="col-auto">
                <div class="text-dark-1">Great Northern Hotel, a Tribute Portfolio Hotel, London</div>
              </div>
            </div>
          </div>

          <div class="col-auto">
            <a href="#" class="text-14 text-blue-1 underline">All Hotel in London</a>
          </div>
        </div>
      </div>
    </section>

    <section class="pt-40">
      <div class="container">
        <div class="row y-gap-15 justify-between items-end">
          <div class="col-auto">
            <h1 class="text-30 fw-600">{{ $package_details->package_title }}</h1>

            <div class="row x-gap-20 y-gap-20 items-center pt-10">
              <div class="col-auto">
                <div class="d-flex items-center">
                  <div class="d-flex x-gap-5 items-center">

                        @if($package_details->stars_rating == 5)
                            <i class="icon-star text-10 text-yellow-1"></i>

                            <i class="icon-star text-10 text-yellow-1"></i>

                            <i class="icon-star text-10 text-yellow-1"></i>

                            <i class="icon-star text-10 text-yellow-1"></i>

                            <i class="icon-star text-10 text-yellow-1"></i>
                        @endif

                        @if($package_details->stars_rating == 4)
                            <i class="icon-star text-10 text-yellow-1"></i>

                            <i class="icon-star text-10 text-yellow-1"></i>

                            <i class="icon-star text-10 text-yellow-1"></i>

                            <i class="icon-star text-10 text-yellow-1"></i>

                        @endif

                        @if($package_details->stars_rating == 3)
                            <i class="icon-star text-10 text-yellow-1"></i>

                            <i class="icon-star text-10 text-yellow-1"></i>

                            <i class="icon-star text-10 text-yellow-1"></i>

                        @endif


                        @if($package_details->stars_rating == 2)
                            <i class="icon-star text-10 text-yellow-1"></i>

                            <i class="icon-star text-10 text-yellow-1"></i>

                        @endif

                        @if($package_details->stars_rating == 1)
                            <i class="icon-star text-10 text-yellow-1"></i>
                        @endif

                  </div>

                  <div class="text-14 text-light-1 ml-10">3,014 reviews</div>
                </div>
              </div>

              <div class="col-auto">
                <div class="row x-gap-10 items-center">
                  <div class="col-auto">
                    <div class="d-flex x-gap-5 items-center">
                      <i class="icon-placeholder text-16 text-light-1"></i>
                      <div class="text-15 text-light-1">{{ $package_details->packageDestination->dest_name }},{{ Helper::getCountryName($package_details->country) }} </div>
                    </div>
                  </div>

                  
                </div>
              </div>
            </div>
          </div>

          <div class="col-auto">
            <div class="row x-gap-10 y-gap-10">
              <div class="col-auto">
                <button class="button px-15 py-10 -blue-1">
                  <i class="icon-share mr-10"></i>
                  Share
                </button>
              </div>

              <div class="col-auto">
                <button class="button px-15 py-10 -blue-1 bg-light-2">
                  <i class="icon-heart mr-10"></i>
                  Save
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="pt-40 js-pin-container">
      <div class="container">
        <div class="row y-gap-30">
          <div class="col-lg-8">
            <div class="relative d-flex justify-center overflow-hidden js-section-slider" data-slider-cols="base-1" data-nav-prev="js-img-prev" data-nav-next="js-img-next">
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                  <img src="{{ asset('public/images/Packages/'.$package_details->feacture_img.'') }}" alt="image" class="rounded-4 col-12 h-full object-cover">
                </div>

                <div class="swiper-slide">
                  <img src="{{ asset('public/images/Packages/'.$package_details->baaner_img.'') }}" alt="image" class="rounded-4 col-12 h-full object-cover">
                </div>

                <?php
                  $gallery_images = json_decode($package_details->gallery);
                  if(isset($gallery_images)){
                    foreach($gallery_images as $gallery_res){
                      ?>
                        <div class="swiper-slide">
                          <img src="{{ asset('public/images/Packages/'.$gallery_res.'') }}" alt="image" class="rounded-4 col-12 h-full object-cover">
                        </div>
                      <?php
                    }
                  }
                ?>
 
               
              </div>

              <div class="absolute h-full col-11">

                <button class="section-slider-nav -prev flex-center button -blue-1 bg-white shadow-1 size-40 rounded-full sm:d-none js-img-prev">
                  <i class="icon icon-chevron-left text-12"></i>
                </button>

                <button class="section-slider-nav -next flex-center button -blue-1 bg-white shadow-1 size-40 rounded-full sm:d-none js-img-next">
                  <i class="icon icon-chevron-right text-12"></i>
                </button>

              </div>

              <div class="absolute h-full col-12 z-2 px-20 py-20 d-flex justify-end items-end">
                <!-- <a href="{{ asset('public/images/Packages/'.$package_details->feacture_img.'') }}" class="button -blue-1 px-24 py-15 bg-white text-dark-1 js-gallery" data-gallery="gallery2">
                  See All Photos
                </a> -->
                <a href="{{ asset('public/images/Packages/'.$package_details->feacture_img.'') }}" class="js-gallery" data-gallery="gallery2"></a>
                <a href="{{ asset('public/images/Packages/'.$package_details->baaner_img.'') }}" class="js-gallery" data-gallery="gallery2"></a>
              </div>
            </div>

            <h3 class="text-22 fw-500 mt-30">
              Tour snapshot
            </h3>

            <div class="row y-gap-30 justify-between pt-20">

              <div class="col-md-auto col-6">
                <div class="d-flex">
                  <i class="icon-clock text-22 text-blue-1 mr-10"></i>
                  <div class="text-15 lh-15">
                    Duration:<br> {{ $package_details->duration }} Days
                  </div>
                </div>
              </div>

              <div class="col-md-auto col-6">
                <div class="d-flex">
                  <i class="icon-customer text-22 text-blue-1 mr-10"></i>
                  <div class="text-15 lh-15">
                    Group size:<br> {{ $package_details->group_size }}
                  </div>
                </div>
              </div>

              <div class="col-md-auto col-6">
                <div class="d-flex">
                  <i class="icon-route text-22 text-blue-1 mr-10"></i>
                  <div class="text-15 lh-15">
                    Start Date: {{ date('d-m-Y',strtotime($package_details->start_date)) }}<br>
                    End Date: {{ date('d-m-Y',strtotime($package_details->end_date)) }}
                  </div>
                </div>
              </div>

              <div class="col-md-auto col-6">
                <div class="d-flex">
                  <i class="icon-access-denied text-22 text-blue-1 mr-10"></i>
                  <div class="text-15 lh-15">
                  Language: <br>{{ $package_details->language }}
                  </div>
                </div>
              </div>

            </div>

            <div class="border-top-light mt-40 mb-40"></div>

            <div class="row x-gap-40 y-gap-40">
              <div class="col-12">
                <h3 class="text-22 fw-500">Overview</h3>

                <p class="text-dark-1 text-15 mt-20">
                {!! $package_details->description !!}
                </p>

              </div>

              <div class="col-md-6">
                <h5 class="text-16 fw-500">Available languages</h5>
                <div class="text-15 mt-10">{{ $package_details->language }}</div>
              </div>

              <div class="col-md-6">
                <h5 class="text-16 fw-500">Cancellation policy</h5>
                <div class="text-15 mt-10">
                    {{ $package_details->cancelation_policy }}
                </div>
              </div>

              <div class="col-12">
                <h5 class="text-16 fw-500">Facilities</h5>
                {!! $package_details->facilities !!}
              </div>
            </div>

            <div class="mt-40 border-top-light">
              <div class="row x-gap-40 y-gap-40 pt-40">
                <div class="col-12">
                  

                  <div class="row x-gap-40 y-gap-40 pt-20">
                    <div class="col-md-6">
                        <h3 class="text-22 fw-500">What's Included</h3>
                      {!! $package_details->included !!}
                    </div>

                    <div class="col-md-6">
                        <h3 class="text-22 fw-500">What's Excluded</h3>
                      {!! $package_details->excluded !!}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="d-flex justify-end js-pin-content">
              <div class="w-360 lg:w-full d-flex flex-column items-center">
                <div class="px-30 py-30 rounded-4 border-light bg-white shadow-4">
                  <div class="text-14 text-light-1">
                    Adult Price <span class="text-20 fw-500 text-dark-1 ml-5">US ${{ $package_details->adult_sale_price }}</span><br>
                    Child Price <span class="text-20 fw-500 text-dark-1 ml-5">US ${{ $package_details->child_sale_price }}</span>
                  </div>

                  <form action="{{ URL::to('add_to_cart') }}" method="post">
                    @csrf
                    <div class="row y-gap-20 pt-30">
                        <div class="col-12">

                        <div class="searchMenu-date px-20 py-10 border-light rounded-4 -right js-form-dd js-calendar">

                            <div data-x-dd-click="searchMenu-date">
                            <h4 class="text-15 fw-500 ls-2 lh-16">Date</h4>

                            <div class="text-15 text-light-1 ls-2 lh-16">
                                <span class="js-first-date">{{ date('d-m-Y',strtotime($package_details->start_date)) }}</span>
                                -
                                <span class="js-last-date">{{ date('d-m-Y',strtotime($package_details->end_date)) }}</span>
                            </div>
                            </div>


                        </div>

                        </div>

                        <h4 class="text-15 fw-500 ls-2 lh-16">Number of travelers</h4>
                                <div class="col-md-12">
                                    <div class="form-input ">
                                        <input type="hidden" value="{{ $package_details->id }}" name="package_id" required>
                                        <input type="hidden" value="package" name="booking_type" required>
                                        <input type="number" name="adults" required>
                                        <label class="lh-1 text-16 text-light-1">Adults</label>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-input ">
                                        <input type="number" name="childs" required>
                                        <label class="lh-1 text-16 text-light-1">Childs</label>
                                    </div>
                                </div>

                        <div class="col-12">
                        <button type="submit" class="button -dark-1 py-15 px-35 h-60 col-12 rounded-4 bg-blue-1 text-white">
                            Book Now
                        </button>
                        </div>
                    </div>
                  </form>
                  <div class="d-flex items-center pt-20">
                    <div class="size-40 flex-center bg-light-2 rounded-full">
                      <i class="icon-heart text-16 text-green-2"></i>
                    </div>
                    <div class="text-14 lh-16 ml-10">94% of travelers recommend this experience</div>
                  </div>
                </div>

                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    

    <div class="container mt-40 mb-40">
      <div class="border-top-light"></div>
    </div>

    <section>
      <div class="container">
        <h3 class="text-22 fw-500 mb-20">Itinerary</h3>

        <div class="row y-gap-30">
          <div class="col-lg-6">
            <div class="relative">
              <div class="border-test"></div>

              <div class="accordion -map row y-gap-20 js-accordion">
              
                <?php 
                    $iternery_Data = json_decode($package_details->itinerary_data)
                ?>

                @isset($iternery_Data)
                    @foreach($iternery_Data as $iternery_res)
                            <div class="col-12">
                            <div class="accordion__item @if($loop->iteration == 1) js-accordion-item-active @endif">
                                <div class="d-flex">
                                <div class="accordion__icon size-40 flex-center bg-blue-2 text-blue-1 rounded-full">
                                    <div class="text-14 fw-500">{{ $loop->iteration }}</div>
                                </div>

                                <div class="ml-20">
                                    <div class="text-16 lh-15 fw-500">{{ $iternery_res->title }}</div>

                                    <div class="accordion__content">
                                    <div class="pt-15 pb-15">
                                        <img src="{{ asset('public/images/Packages/Itinerary/'.$iternery_res->img.'') }}" alt="image" class="rounded-4 mt-15">
                                        <div class="text-14 lh-17 mt-15">{!! $iternery_res->description !!}</div>
                                    </div>
                                    </div>

                                    <div class="accordion__button">
                                    <button data-open-change-title="See less" class="d-block lh-15 text-14 text-blue-1 underline fw-500 mt-5">
                                        See details & photo
                                    </button>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                   
                    @endforeach
                @endisset

              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <img src="{{ asset('public/images/Packages/'.$package_details->map_image.'') }}" alt="image" class="rounded-4 mt-15">
          </div>
        </div>
      </div>
    </section>



    <div class="container mt-40 mb-40">
      <div class="border-top-light"></div>
    </div>

    <section>
      <div class="container">
        <div class="row y-gap-40 justify-between">
          <div class="col-xl-3">
            <h3 class="text-22 fw-500">Guest reviews</h3>

            <div class="d-flex items-center mt-20">
              <div class="flex-center bg-blue-1 rounded-4 size-70 text-22 fw-600 text-white">4.8</div>
              <div class="ml-20">
                <div class="text-16 text-dark-1 fw-500 lh-14">Exceptional</div>
                <div class="text-15 text-light-1 lh-14 mt-4">{{ count($last_reviews ?? 0) }} reviews</div>
              </div>
            </div>

            
          </div>

          <div class="col-xl-8">
            <div class="row y-gap-40">


            @isset($last_reviews)
                @foreach($last_reviews as $review_res)
              <div class="col-12">
                <div class="row x-gap-20 y-gap-20 items-center">
                  <div class="col-auto">
                    <img src="{{ asset('public/images/Reviews/'.$review_res->picture.'') }}" style="width: 75px;border-radius: 50%;height: 75px;" alt="image">
                  </div>
                  <div class="col-auto">
                    <div class="fw-500 lh-15">{{ $review_res->name }}</div>
                    <div class="text-14 text-light-1 lh-15">{{ date('d-m-Y',strtotime($review_res->created_at)) }}</div>
                  </div>
                </div>

                <h5 class="fw-500 text-blue-1 mt-20">{{ $review_res->ratings }} Rating</h5>
                <p class="text-15 text-dark-1 mt-10">{{ $review_res->review }} </p>




                <div class="d-flex x-gap-30 items-center pt-20">
                  <button class="d-flex items-center text-blue-1">
                    <i class="icon-like text-16 mr-10"></i>
                    Helpful
                  </button>

                  <button class="d-flex items-center text-light-1">
                    <i class="icon-dislike text-16 mr-10"></i>
                    Not helpful
                  </button>
                </div>
              </div>
                @endforeach
            @endisset

            
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="container mt-40 mb-40">
      <div class="border-top-light"></div>
    </div>
@endsection