<?php 
    use App\Helpers\Helper;
?>
@extends('website/includes/master')

@section('style')
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
@endsection

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
                <div class="">Activity Details</div>
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
            <h1 class="text-30 fw-600">{{ $activity_details->activity_title }}</h1>

            <div class="row x-gap-20 y-gap-20 items-center pt-10">
              <div class="col-auto">
                <div class="d-flex items-center">
                  <div class="d-flex x-gap-5 items-center">

                        @if($activity_details->stars_rating == 5)
                            <i class="icon-star text-10 text-yellow-1"></i>

                            <i class="icon-star text-10 text-yellow-1"></i>

                            <i class="icon-star text-10 text-yellow-1"></i>

                            <i class="icon-star text-10 text-yellow-1"></i>

                            <i class="icon-star text-10 text-yellow-1"></i>
                        @endif

                        @if($activity_details->stars_rating == 4)
                            <i class="icon-star text-10 text-yellow-1"></i>

                            <i class="icon-star text-10 text-yellow-1"></i>

                            <i class="icon-star text-10 text-yellow-1"></i>

                            <i class="icon-star text-10 text-yellow-1"></i>

                        @endif

                        @if($activity_details->stars_rating == 3)
                            <i class="icon-star text-10 text-yellow-1"></i>

                            <i class="icon-star text-10 text-yellow-1"></i>

                            <i class="icon-star text-10 text-yellow-1"></i>

                        @endif


                        @if($activity_details->stars_rating == 2)
                            <i class="icon-star text-10 text-yellow-1"></i>

                            <i class="icon-star text-10 text-yellow-1"></i>

                        @endif

                        @if($activity_details->stars_rating == 1)
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
                      <div class="text-15 text-light-1">{{ $activity_details->activity_palce_address }} </div>
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
                  <img src="{{ asset('public/images/Activities/'.$activity_details->feacture_img.'') }}" alt="image" class="rounded-4 col-12 h-full object-cover">
                </div>

                <div class="swiper-slide">
                  <img src="{{ asset('public/images/Activities/'.$activity_details->baaner_img.'') }}" alt="image" class="rounded-4 col-12 h-full object-cover">
                </div>

                <?php
                  $gallery_images = json_decode($activity_details->gallery);
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
                <!-- <a href="{{ asset('public/images/Packages/'.$activity_details->feacture_img.'') }}" class="button -blue-1 px-24 py-15 bg-white text-dark-1 js-gallery" data-gallery="gallery2">
                  See All Photos
                </a> -->
                <a href="{{ asset('public/images/Activities/'.$activity_details->feacture_img.'') }}" class="js-gallery" data-gallery="gallery2"></a>
                <a href="{{ asset('public/images/Activities/'.$activity_details->baaner_img.'') }}" class="js-gallery" data-gallery="gallery2"></a>
              </div>
            </div>

            <h3 class="text-22 fw-500 mt-30">
              Activity snapshot
            </h3>

            <div class="row y-gap-30 justify-between pt-20">

              <div class="col-md-auto col-6">
                <div class="d-flex">
                  <i class="icon-clock text-22 text-blue-1 mr-10"></i>
                  <div class="text-15 lh-15">
                    Duration:<br> {{ $activity_details->activity_duration }} Hours
                  </div>
                </div>
              </div>

              <div class="col-md-auto col-6">
                <div class="d-flex">
                  <i class="icon-customer text-22 text-blue-1 mr-10"></i>
                  <div class="text-15 lh-15">
                    Group size:<br> {{ $activity_details->group_size }}
                  </div>
                </div>
              </div>

              <div class="col-md-auto col-6">
                <div class="d-flex">
                  <i class="icon-route text-22 text-blue-1 mr-10"></i>
                  <div class="text-15 lh-15">
                    Start Date: {{ date('d-m-Y',strtotime($activity_details->start_date)) }}<br>
                    End Date: {{ date('d-m-Y',strtotime($activity_details->end_date)) }}
                  </div>
                </div>
              </div>

              <div class="col-md-auto col-6">
                <div class="d-flex">
                  <i class="icon-access-denied text-22 text-blue-1 mr-10"></i>
                  <div class="text-15 lh-15">
                  Language: <br>{{ $activity_details->language }}
                  </div>
                </div>
              </div>

            </div>

            <div class="border-top-light mt-40 mb-40"></div>

            <div class="row x-gap-40 y-gap-40">
              <div class="col-12">
                <h3 class="text-22 fw-500">Overview</h3>

                <p class="text-dark-1 text-15 mt-20">
                {!! $activity_details->description !!}
                </p>

              </div>

              <div class="col-md-6">
                <h5 class="text-16 fw-500">Available languages</h5>
                <div class="text-15 mt-10">{{ $activity_details->language }}</div>
              </div>

              <div class="col-md-6">
                <h5 class="text-16 fw-500">Cancellation policy</h5>
                <div class="text-15 mt-10">
                    {{ $activity_details->cancelation_policy }}
                </div>
              </div>

              <div class="col-12">
                <h5 class="text-16 fw-500">Facilities</h5>
                {!! $activity_details->facilities !!}
              </div>
            </div>

            <div class="mt-40 border-top-light">
              <div class="row x-gap-40 y-gap-40 pt-40">
                <div class="col-12">
                  

                  <div class="row x-gap-40 y-gap-40 pt-20">
                    <div class="col-md-6">
                        <h3 class="text-22 fw-500">What's Included</h3>
                      {!! $activity_details->included !!}
                    </div>

                    <div class="col-md-6">
                        <h3 class="text-22 fw-500">What's Excluded</h3>
                      {!! $activity_details->excluded !!}
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
                    Adult Price <span class="text-20 fw-500 text-dark-1 ml-5">US ${{ $activity_details->adult_sale_price }}</span><br>
                    Child Price <span class="text-20 fw-500 text-dark-1 ml-5">US ${{ $activity_details->child_sale_price }}</span>
                  </div>

                  <form action="{{ URL::to('add_to_cart') }}" method="post">
                    @csrf
                    <div class="row y-gap-20 pt-30">
                        <div class="col-12">

                        <div class="form-input ">
                        <input type="text" id="datepicker" name="activity_select_date" required>
                            <!-- <input type="date" id="datepicker" > -->
                            <label class="lh-1 text-16 text-light-1" style="top: 15px;">Select Date</label>
                        </div>

                        </div>

                        <h4 class="text-15 fw-500 ls-2 lh-16">Number of travelers</h4>
                                <div class="col-md-12">
                                    <div class="form-input ">
                                        <input type="hidden" value="{{ $activity_details->id }}" name="activtiy_id" required>
                                        <input type="hidden" value="activity" name="booking_type" required>
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
        <h3 class="text-22 fw-500 mb-20">Availability Days</h3>

        <div class="row y-gap-30">
          <div class="col-lg-12">
            <?php 
                $availibilty_days = json_decode($activity_details->availibilty_days);
                foreach($availibilty_days as $day_res){
                    echo "<h5>$day_res</h5>";
                }
            ?>
          </div>

          <div class="col-lg-6">
            <img src="{{ asset('public/images/Packages/'.$activity_details->map_image.'') }}" alt="image" class="rounded-4 mt-15">
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

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script>
  $( function() {
    var minDateStr = "{{ $activity_details->start_date }}";
    var minDateParts = minDateStr.split("-");
    var minDate = new Date(
      parseInt(minDateParts[0]),  // Year
      parseInt(minDateParts[1]) - 1,  // Month (zero-based)
      parseInt(minDateParts[2])  // Day
    );

    var maxDateStr = "{{ $activity_details->end_date }}";
    var maxDateParts = maxDateStr.split("-");
    var maxDate = new Date(
      parseInt(maxDateParts[0]),  // Year
      parseInt(maxDateParts[1]) - 1,  // Month (zero-based)
      parseInt(maxDateParts[2])  // Day
    );

    var allowedDays = <?php echo $activity_details->availibilty_days ?>

    $( "#datepicker" ).datepicker({
        minDate: minDate,  // Minimum allowed date (January 1, 2023)
        maxDate: maxDate, // Maximum allowed date (December 31, 2023)
        beforeShowDay: function(date) {
          var day = date.getDay();
          var dayName = $.datepicker.formatDate('DD', date); // Get the day name

          // Check if the day name is in the allowedDays array
          var isAllowed = allowedDays.includes(dayName);

          return [isAllowed, ""];
        }
      });
  } );
  </script>
@endsection