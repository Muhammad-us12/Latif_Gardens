<?php 
    use App\Helpers\Helper;
?>
@extends('website/includes/master')

@section('style')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
@endsection

@section('content')


<section class="pt-40">
      <div class="container">
        <div class="row x-gap-40 y-gap-30 items-center">
          <div class="col-auto">
            <div class="d-flex items-center">
              <div class="size-40 rounded-full flex-center bg-blue-1">
                <i class="icon-check text-16 text-white"></i>
              </div>
              <div class="text-18 fw-500 ml-10">Your selection</div>
            </div>
          </div>

          <div class="col">
            <div class="w-full h-1 bg-border"></div>
          </div>

          <div class="col-auto">
            <div class="d-flex items-center">
              <div class="size-40 rounded-full flex-center bg-blue-1-05 text-blue-1 fw-500">2</div>
              <div class="text-18 fw-500 ml-10">Your details</div>
            </div>
          </div>

          <div class="col">
            <div class="w-full h-1 bg-border"></div>
          </div>

          <div class="col-auto">
            <div class="d-flex items-center">
              <div class="size-40 rounded-full flex-center bg-blue-1-05 text-blue-1 fw-500">3</div>
              <div class="text-18 fw-500 ml-10">Final step</div>
            </div>
          </div>
        </div>
      </div>
    </section>

    @php 
        $cart_data = Session::get('cart_data');
    @endphp

    <section class="pt-40 layout-pb-md">
      <div class="container">
        <div class="row">
          <div class="col-xl-7 col-lg-8">
            <form action="{{ URL::to('confirm_booking') }}" method="post">
                @csrf
            <div class="py-15 px-20 rounded-4 text-15 bg-blue-1-05">
              Sign in to book with your saved details or
              <a href="#" class="text-blue-1 fw-500">register</a>
              to manage your bookings on the go!
            </div>

            <h2 class="text-22 fw-500 mt-40 md:mt-24">Let us know who you are (Enter Lead Passenger Info)</h2>

            <div class="row x-gap-20 y-gap-20 pt-20">
              <div class="col-12">

                <div class="form-input ">
                  <input type="text" name="lead_name" required>
                  <label class="lh-1 text-16 text-light-1">Full Name</label>
                </div>

              </div>
              <div class="col-md-6">

                <div class="form-input ">
                  <input type="text" name="lead_email" required>
                  <label class="lh-1 text-16 text-light-1">Email</label>
                </div>

              </div>
              <div class="col-md-6">

                <div class="form-input ">
                  <input type="text" name="lead_phone" required>
                  <label class="lh-1 text-16 text-light-1">Phone Number</label>
                </div>

              </div>
              <div class="col-12">

                <div class="form-input ">
                  <input type="text" name="lead_address" required>
                  <label class="lh-1 text-16 text-light-1">Address</label>
                </div>

              </div>
              
              <div class="col-md-6">
                    <label class="lh-1 text-16 text-light-1">Country</label>
                  <select name="lead_country" class="form-control" id="">
                        @isset($countriesList)
                            @foreach($countriesList as $country_res)
                                <option value="{{ $country_res->name }}">{{ $country_res->name }}</option>
                            @endforeach    
                        @endisset
                  </select>

              </div>
              <div class="col-md-6">

                <div class="form-input ">
                  <input type="text" name="lead_zip" required>
                  <label class="lh-1 text-16 text-light-1">ZIP code/Postal code</label>
                </div>

              </div>

              <div class="col-6">

              <label class="lh-1 text-16 text-light-1">Gender</label>


              </div>

                <div class="col-3">
                    <div class="form-radio d-flex items-center ">
                      <div class="radio">
                        <input type="radio" id="male" value="male" checked name="lead_gender">
                        <div class="radio__mark">
                          <div class="radio__icon"></div>
                        </div>
                      </div>
                      <label for="male" class="text-14 lh-1 ml-10">Male</label>
                    </div>
                  </div>

                  <div class="col-3">
                    <div class="form-radio d-flex items-center ">
                      <div class="radio">
                        <input type="radio" id="female" value="female" name="lead_gender">
                        <div class="radio__mark">
                          <div class="radio__icon"></div>
                        </div>
                      </div>
                      <label for="female" class="text-14 lh-1 ml-10">Female</label>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <hr>
                    <!-- Button trigger modal -->
<!-- Button trigger modal -->

                  </div>


             
            </div>

            @if($cart_data['booking_adults'] > 1)
            <h2 class="text-22 fw-500 mt-40 md:mt-24">Other Adults Information</h2>
            <?php 
                for($adult =2; $adult <= $cart_data['booking_adults']; $adult++){    
            ?>
            <h5>Adult {{ $adult }}</h5>
            <div class="row">
                <div class="col-md-6">
                    <label for="">Title</label>
                    <select name="title[]" class="form-control" id="">
                        <option value="Mr">Mr</option>
                        <option value="Mrs">Mrs</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <div class="form-input ">
                    <input type="text" name="other_adults_name[]" required>
                    <label class="lh-1 text-16 text-light-1">Full Name</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <hr>
                </div>
            </div>
            <?php 
                }
            ?>
            @endif

            @if($cart_data['booking_childs'] > 0)
            <h2 class="text-22 fw-500 mt-40 md:mt-24">Childs Information</h2>
            <?php 
                for($child =1; $child <= $cart_data['booking_childs']; $child++){    
            ?>
            <h5>child {{ $child }}</h5>
            <div class="row">
                <div class="col-md-6">
                    <label for="">Title</label>
                    <select name="title_childs[]" class="form-control" id="">
                        <option value="Mr">Mr</option>
                        <option value="Mrs">Mrs</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <div class="form-input ">
                    <input type="text" name="other_childs_name[]" required>
                    <label class="lh-1 text-16 text-light-1">Full Name</label>
                    </div>
                </div>
                <div class="col-md-12">
                    <hr>
                </div>
            </div>
            <?php 
                }
            ?>
            @endif

            <div class="row">
                <div class="col-12 mt-20">
                <div class="row y-gap-20 items-center justify-between">
                  <div class="col-auto">
                    <div class="text-14 text-light-1">
                      By proceeding with this booking, I agree to GoTrip Terms of Use and Privacy Policy.
                    </div>
                  </div>

                  <div class="col-auto">

                    <a href="#exampleModal" data-bs-toggle="modal" data-bs-target="" class="button h-60 px-24 -dark-1 bg-blue-1 text-white">
                      Next: Final details <div class="icon-arrow-top-right ml-15"></div>
                    </a>

                  </div>
                </div>
              </div>
            </div>
            


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Payments Instruction</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>
          @isset($package_details)
            {{ $package_details->Payment_instructions }}
          @endisset

          @isset($activity_data)
            {{ $activity_data->Payment_instructions }}
          @endisset
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="button h-60 px-24 -dark-1 bg-blue-1 text-white">Confirm Booking <div class="icon-arrow-top-right ml-15"></div></button>
      </div>
    </div>
  </div>
</div>

            </form>
          </div>

          <div class="col-xl-5 col-lg-4">
            <div class="ml-80 lg:ml-40 md:ml-0">
            <div class="px-30 py-30 border-light rounded-4 mt-30">
                <div class="text-20 fw-500 mb-20">Your price summary</div>

                <div class="row y-gap-5 justify-between">
                  <div class="col-auto">
                    <div class="text-15">Adults x {{ $cart_data['booking_adults'] }}</div>
                  </div>
                  <div class="col-auto">
                    <div class="text-15">US$ {{ number_format($cart_data['adult_sale']) }}</div>
                  </div>
                </div>

                <div class="row y-gap-5 justify-between pt-5">
                  <div class="col-auto">
                    <div class="text-15">Childs x {{ $cart_data['booking_childs'] }}</div>
                  </div>
                  <div class="col-auto">
                    <div class="text-15">US$ {{ number_format($cart_data['child_sale']) }}</div>
                  </div>
                </div>

                

                <div class="px-20 py-20 bg-blue-2 rounded-4 mt-20">
                  <div class="row y-gap-5 justify-between">
                    <div class="col-auto">
                      <div class="text-18 lh-13 fw-500">Price</div>
                    </div>
                    <div class="col-auto">
                      <div class="text-18 lh-13 fw-500">US$ {{ number_format($cart_data['grand_total']) }}</div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="px-30 py-30 border-light rounded-4 mt-30">
                <div class="text-20 fw-500 mb-20">Your payment schedule</div>

                <div class="row y-gap-5 justify-between">
                  <div class="col-auto">
                    <div class="text-15">Before you Start you'll pay</div>
                  </div>
                  <div class="col-auto">
                    <div class="text-15">US$ {{ number_format($cart_data['grand_total']) }}</div>
                  </div>
                </div>
              </div>

              <div class="px-30 mt-20 py-30 border-light rounded-4">
                <div class="text-20 fw-500 mb-30">Your booking details</div>

                <div class="row x-gap-15 y-gap-20">
                  <div class="col-auto">
                    
                    @isset($package_details)
                      <img src="{{ asset('public/images/Packages/'.$package_details->feacture_img.'') }}" alt="image" class="size-140 rounded-4 object-cover">
                    @endisset

                    @isset($activity_data)
                      <img src="{{ asset('public/images/Activities/'.$activity_data->feacture_img.'') }}" alt="image" class="size-140 rounded-4 object-cover">
                    @endisset
                  </div>

                  <div class="col">
                    @isset($package_details)
                    <div class="d-flex x-gap-5 pb-10">

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
                    @endisset

                    @isset($activity_data)
                    <div class="d-flex x-gap-5 pb-10">

                       @if($activity_data->stars_rating == 5)
                            <i class="icon-star text-10 text-yellow-1"></i>

                            <i class="icon-star text-10 text-yellow-1"></i>

                            <i class="icon-star text-10 text-yellow-1"></i>

                            <i class="icon-star text-10 text-yellow-1"></i>

                            <i class="icon-star text-10 text-yellow-1"></i>
                        @endif

                        @if($activity_data->stars_rating == 4)
                            <i class="icon-star text-10 text-yellow-1"></i>

                            <i class="icon-star text-10 text-yellow-1"></i>

                            <i class="icon-star text-10 text-yellow-1"></i>

                            <i class="icon-star text-10 text-yellow-1"></i>

                        @endif

                        @if($activity_data->stars_rating == 3)
                            <i class="icon-star text-10 text-yellow-1"></i>

                            <i class="icon-star text-10 text-yellow-1"></i>

                            <i class="icon-star text-10 text-yellow-1"></i>

                        @endif


                        @if($activity_data->stars_rating == 2)
                            <i class="icon-star text-10 text-yellow-1"></i>

                            <i class="icon-star text-10 text-yellow-1"></i>

                        @endif

                        @if($activity_data->stars_rating == 1)
                            <i class="icon-star text-10 text-yellow-1"></i>
                        @endif

                    </div>
                    @endisset

                    <div class="lh-17 fw-500">
                    @isset($package_details)
                       {{ $package_details->package_title }}
                    @endisset

                    @isset($activity_data)
                       {{ $activity_data->activity_title }}
                    @endisset
                    </div>
                    <div class="text-14 lh-15 mt-5">
                        <div class="d-flex x-gap-5 items-center">
                        <i class="icon-placeholder text-16 text-light-1"></i>
                        <div class="text-15 text-light-1">
                        @isset($package_details)
                          {{ $package_details->packageDestination->dest_name }},{{ Helper::getCountryName($package_details->country) }} </div>
                        @endisset

                        @isset($activity_data)
                          {{ $activity_data->activity_palce_address }}
                        @endisset
                        </div>
                    </div>

                    <div class="row x-gap-10 y-gap-10 items-center pt-10">
                      <div class="col-auto">
                        <div class="d-flex items-center">
                          <div class="size-30 flex-center bg-blue-1 rounded-4">
                            <div class="text-12 fw-600 text-white">
                            @isset($package_details)
                              {{ $package_details->stars_rating }}
                            @endisset

                            @isset($activity_data)
                              {{ $activity_data->stars_rating }}
                            @endisset
                              
                            </div>
                          </div>

                          <div class="text-14 fw-500 ml-10">Exceptional</div>
                        </div>
                      </div>

                     
                    </div>
                  </div>
                </div>

                <div class="border-top-light mt-30 mb-20"></div>

                <div class="row y-gap-20 justify-between">
                  @isset($package_details)
                     
                  <div class="col-auto">
                    <div class="text-15">Start Date</div>
                    <div class="fw-500">{{ date('d-m-Y',strtotime($cart_data['start_date'])) }}</div>
                  </div>

                  <div class="col-auto md:d-none">
                    <div class="h-full w-1 bg-border"></div>
                  </div>

                  <div class="col-auto text-right md:text-left">
                    <div class="text-15">End Date</div>
                    <div class="fw-500">{{ date('d-m-Y',strtotime($cart_data['end_date'])) }}</div>
                  </div>
                    
                  @endisset
                  @isset($activity_data)
                    <div class="col-auto text-right md:text-left">
                      <div class="text-15">Your Select Date Date</div>
                      <div class="fw-500">{{ date('d-m-Y',strtotime($cart_data['customer_select_date'])) }}</div>
                    </div>
                  @endisset
                </div>

                <div class="border-top-light mt-30 mb-20"></div>

                <div class="">
                  <div class="text-15">Total length of stay:</div>
                  <div class="fw-500">
                  @isset($package_details)
                     {{ $package_details->duration }}
                  @endisset

                  @isset($activity_data)
                    {{ $activity_data->activity_duration }} Hours
                  @endisset

                    
                  </div>
                </div>

                <div class="border-top-light mt-30 mb-20"></div>

              </div>

             

            </div>
          </div>
        </div>

        
      </div>
    </section>

    <section class="layout-pt-md layout-pb-lg">
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
                <img src="#" data-src="img/featureIcons/1/1.svg" alt="image" class="js-lazy">
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
                <img src="#" data-src="img/featureIcons/1/2.svg" alt="image" class="js-lazy">
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
                <img src="#" data-src="img/featureIcons/1/3.svg" alt="image" class="js-lazy">
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

    <section class="layout-pt-md layout-pb-md bg-dark-2">
      <div class="container">
        <div class="row y-gap-30 justify-between items-center">
          <div class="col-auto">
            <div class="row y-gap-20  flex-wrap items-center">
              <div class="col-auto">
                <div class="icon-newsletter text-60 sm:text-40 text-white"></div>
              </div>

              <div class="col-auto">
                <h4 class="text-26 text-white fw-600">Your Travel Journey Starts Here</h4>
                <div class="text-white">Sign up and we'll send the best deals to you</div>
              </div>
            </div>
          </div>

          <div class="col-auto">
            <div class="single-field -w-410 d-flex x-gap-10 y-gap-20">
              <div>
                <input class="bg-white h-60" type="text" placeholder="Your Email">
              </div>

              <div>
                <button class="button -md h-60 bg-blue-1 text-white">Subscribe</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
@endsection