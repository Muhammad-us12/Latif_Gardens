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

   
    <section class="pt-40 layout-pb-md">
      <div class="container">
        <div class="row">
          <div class="col-xl-7 col-lg-7">
            <h1>LOI Pakistan / Visa Support</h1>
          </div>
          <div class="col-xl-5 col-lg-5">
              <div class="tabs -pills-3 pt-30 js-tabs">
              <div class="tabs__controls row x-gap-10 y-gap-10 js-tabs-controls">

                <div class="col-auto">
                  <button class="tabs__button text-14 fw-500 px-20 py-10 rounded-4 bg-light-2 js-tabs-button is-tab-el-active" data-tab-target=".-tab-item-1">LOI REQUEST FORM</button>
                </div>

                <div class="col-auto">
                  <button class="tabs__button text-14 fw-500 px-20 py-10 rounded-4 bg-light-2 js-tabs-button " data-tab-target=".-tab-item-2">Visa FORM</button>
                </div>
              </div>

              <div class="tabs__content pt-15 js-tabs-content">

                <div class="tabs__pane -tab-item-1 is-tab-el-active">
                  <form action="{{ URL::to('visa_support_submit') }}" enctype="multipart/form-data"  method="post">
                        @csrf
                    <div class="py-15 px-20 rounded-4 text-15 bg-blue-1-05">
                      Sign in to book with your saved details or
                      <a href="#" class="text-blue-1 fw-500">register</a>
                      to manage your bookings on the go!
                    </div>
        
                    <h2 class="text-22 fw-500 mt-40 md:mt-24">LOI REQUEST FORM</h2>
                    <div class="row">
                        @if(session('success'))
                            <div class="col-12">
                            <div class="d-flex items-center justify-between bg-success-1 pl-30 pr-20 py-30 rounded-8">
                                <div class="text-error-2 lh-1 fw-500">{{ session('success') }}</div>
                                <div class="text-error-2 text-14 icon-close"></div>
                            </div>
                            </div>
                            @endif
                            @if(session('error'))
                            <div class="col-12">
                            <div class="d-flex items-center justify-between bg-error-1 pl-30 pr-20 py-30 rounded-8">
                                <div class="text-error-2 lh-1 fw-500">{{ session('error') }}</div>
                                <div class="text-error-2 text-14 icon-close"></div>
                            </div>
                            </div>
                            @endif
                        </div>
                    <div class="row x-gap-20 y-gap-20 pt-20">
                      <div class="col-8">
        
                        <div class="form-input ">
                          <input type="number" name="group_size" required>
                          <label class="lh-1 text-16 text-light-1">Number of Persons</label>
                        </div>
        
                      </div>
        
                      <div class="col-md-4">
                        <div class="form-input" style="border: 1px solid #d5caca;border-radius: 4px;padding: 0.3rem;">
                                <label class="lh-1 text-16 text-light-1" style="margin-top: -0.5rem;">Nationality</label>
                            <select name="lead_country" class="" id="" style="margin-top: 2rem;">
                                    @isset($countriesList)
                                        @foreach($countriesList as $country_res)
                                            <option value="{{ $country_res->name }}">{{ $country_res->name }}</option>
                                        @endforeach    
                                    @endisset
                            </select>
                        </div>
                      </div>
                      <div class="col-12">
        
                        <div class="form-input ">
                            <input type="text" name="lead_name" required>
                            <label class="lh-1 text-16 text-light-1">Full Name</label>
                        </div>
        
                      </div>
        
                    <div class="col-6">
        
                        <div class="form-input ">
                            <input type="date" name="start_date" required>
                            <label class="lh-1 text-16 text-light-1" style="margin-top: -0.5rem;">Arrival Date</label>
                        </div>
        
                    </div>
        
                    <div class="col-6">
        
                        <div class="form-input ">
                            <input type="date" name="end_date" required>
                            <label class="lh-1 text-16 text-light-1" style="margin-top: -0.5rem;">Departure Date</label>
                        </div>
        
                    </div>
                    
                    <div class="col-md-12">
        
                        <div class="form-input ">
                        <input type="text" name="lead_email" required>
                        <label class="lh-1 text-16 text-light-1">Email</label>
                        </div>
        
                    </div>
        
                    <div class="col-md-12">
        
                        <div class="form-input ">
                          <input type="text" name="lead_phone" required>
                          <label class="lh-1 text-16 text-light-1">WhatsApp Number</label>
                        </div>
        
                      </div>
        
                    <div class="col-12">
        
                        <div class="form-input ">
                          <input type="file" name="passport" required>
                          <label class="lh-1 text-16 text-light-1" style="top: 5px;">Upload Passport</label>
                        </div>
        
                    </div>
                    <div class="col-12">
        
                        <div class="form-input ">
                          <input type="text" name="passport_number" required>
                          <label class="lh-1 text-16 text-light-1" style="top: 5px;">Passport Number</label>
                        </div>
        
                    </div>

                    <div class="col-12">
        
                        <div class="form-input ">
                          <input type="text" name="itinernary" required>
                          <label class="lh-1 text-16 text-light-1" style="top: 5px;">Enter Itinernary</label>
                        </div>
        
                    </div>
        
                    <div class="col-12">
                        <label class="lh-1 text-16 text-light-1">Prefered cities to visit</label>
                    </div>
        
                    <div class="col-12">
                        <div class="row">
                    @isset($all_destinations)
                        @foreach($all_destinations as $dest_res)
                        <div class="col-3 mb-10">
                            <div class="d-flex items-center">
                            <div class="form-checkbox ">
                                <input type="checkbox" name="destinations[]" value="{{ $dest_res->dest_name }}">
                                <div class="form-checkbox__mark">
                                <div class="form-checkbox__icon icon-check"></div>
                                </div>
                            </div>
        
                            <div class="text-14 lh-12 ml-10">{{ $dest_res->dest_name }}</div>
        
                            </div>
                        </div>
                        @endforeach
                    @endif
                        </div>
                    </div>
                   
                    
                      
                      
                      <div class="col-12">
        
                        <div class="form-input ">
                          <textarea name="message" id="" cols="30" rows="5"></textarea>
                          <label class="lh-1 text-16 text-light-1">Special Request</label>
                        </div>
        
                      </div>
                      
                          <div class="col-md-12">
                            <hr>
                            <!-- Button trigger modal -->
        <!-- Button trigger modal -->
        
                          </div>
        
        
                     
                    </div>
        
                  
        
                    <div class="row">
                        <div class="col-12 mt-20">
                        <div class="row y-gap-20 items-center justify-between">
                          <div class="col-auto">
                            <div class="text-14 text-light-1">
                              By proceeding with this booking, I agree to GoTrip Terms of Use and Privacy Policy.
                            </div>
                          </div>
        
                          <div class="col-auto">
        
                            <button type="submit" class="button h-60 px-24 -dark-1 bg-blue-1 text-white">
                              Submit <div class="icon-arrow-top-right ml-15"></div>
                            </button>
        
                          </div>
                        </div>
                      </div>
                    </div>
                    
        
        
        
                    </form>
                </div>

                <div class="tabs__pane -tab-item-2 ">
                  <form action="{{ URL::to('visa_apply_submit') }}" enctype="multipart/form-data"  method="post">
                        @csrf
                    
        
                    <h2 class="text-22 fw-500 mt-40 md:mt-24">Visa New Form</h2>
                    <div class="row">
                        @if(session('success'))
                            <div class="col-12">
                            <div class="d-flex items-center justify-between bg-success-1 pl-30 pr-20 py-30 rounded-8">
                                <div class="text-error-2 lh-1 fw-500">{{ session('success') }}</div>
                                <div class="text-error-2 text-14 icon-close"></div>
                            </div>
                            </div>
                            @endif
                            @if(session('error'))
                            <div class="col-12">
                            <div class="d-flex items-center justify-between bg-error-1 pl-30 pr-20 py-30 rounded-8">
                                <div class="text-error-2 lh-1 fw-500">{{ session('error') }}</div>
                                <div class="text-error-2 text-14 icon-close"></div>
                            </div>
                            </div>
                            @endif
                        </div>
                    <div class="row x-gap-20 y-gap-20 pt-20">
                      <div class="col-6">
        
                        <div class="form-input ">
                          <input type="text" name="given_name" required>
                          <label class="lh-1 text-16 text-light-1">Given Name</label>
                        </div>
        
                      </div>
                      
                      <div class="col-6">
        
                        <div class="form-input ">
                          <input type="text" name="surname" required>
                          <label class="lh-1 text-16 text-light-1">Surname</label>
                        </div>
        
                      </div>
                      
                      <div class="col-12">
        
                        <div class="form-input ">
                          <input type="text" name="fullName" required>
                          <label class="lh-1 text-16 text-light-1">Full Name</label>
                        </div>
        
                      </div>
                      
                      <div class="col-6">
        
                        <div class="form-input ">
                            <input type="date" name="start_date" required>
                            <label class="lh-1 text-16 text-light-1" style="margin-top: -0.5rem;">Arrival Date</label>
                        </div>
        
                    </div>
        
                    <div class="col-6">
        
                        <div class="form-input ">
                            <input type="date" name="end_date" required>
                            <label class="lh-1 text-16 text-light-1" style="margin-top: -0.5rem;">Departure Date</label>
                        </div>
        
                    </div>
                    
                    <div class="col-6">
                            <label class="lh-1 text-16 text-light-1" style="margin-top: -0.5rem;">Employment Status</label>
                            <div class="row y-gap-15">
                                  <div class="col-6">
                                    <div class="form-radio d-flex items-center ">
                                      <div class="radio">
                                        <input type="radio" name="employment_status" value="Yes">
                                        <div class="radio__mark">
                                          <div class="radio__icon"></div>
                                        </div>
                                      </div>
                                      <div class="text-14 lh-1 ml-10">Yes</div>
                                    </div>
                                  </div>
                                  <div class="col-6">
                                    <div class="form-radio d-flex items-center ">
                                      <div class="radio">
                                        <input type="radio" name="employment_status" value="No">
                                        <div class="radio__mark">
                                          <div class="radio__icon"></div>
                                        </div>
                                      </div>
                                      <div class="text-14 lh-1 ml-10">No</div>
                                    </div>
                                  </div>
                            </div>
                    </div>
        
                      <div class="col-md-12">
                          <h6>Do You have Any Other Passport </h6>
                        <div class="form-input">
                                <input type="text" name="otherPassports" required>
                                <label class="lh-1 text-16 text-light-1" style="margin-top: -0.5rem;">Given Names</label>
                            
                        </div>
                      </div>
                      
                       <div class="col-md-6">
                        <div class="form-input" style="border: 1px solid #d5caca;border-radius: 4px;padding: 0.3rem;">
                                <label class="lh-1 text-16 text-light-1" style="margin-top: -0.5rem;">Nationality</label>
                            <select name="nationality" class="" id="" style="margin-top: 2rem;">
                                    @isset($countriesList)
                                        @foreach($countriesList as $country_res)
                                            <option value="{{ $country_res->name }}">{{ $country_res->name }}</option>
                                        @endforeach    
                                    @endisset
                            </select>
                        </div>
                      </div>
                      
                      <div class="col-md-6">
                        <div class="form-input">
                                <input type="text" name="stay_country" required>
                                <label class="lh-1 text-16 text-light-1" style="margin-top: -0.5rem;">Country of Stay</label>
                            
                        </div>
                      </div>
                      
                      <div class="col-md-6">
                        <div class="form-input">
                                <input type="text" name="country_of_birth" required>
                                <label class="lh-1 text-16 text-light-1" style="margin-top: -0.5rem;">Country of Birth</label>
                            
                        </div>
                      </div>
                      
                      <div class="col-md-6">
                        <div class="form-input">
                                <input type="text" name="place_of_birth" required>
                                <label class="lh-1 text-16 text-light-1" style="margin-top: -0.5rem;">Place of Birth</label>
                            
                        </div>
                      </div>
                      <div class="col-6">
                            <label class="lh-1 text-16 text-light-1" style="margin-top: -0.5rem;">Marital Status</label>
                            <div class="row y-gap-15">
                                  <div class="col-6">
                                    <div class="form-radio d-flex items-center ">
                                      <div class="radio">
                                        <input type="radio" name="marital_status" value="Yes">
                                        <div class="radio__mark">
                                          <div class="radio__icon"></div>
                                        </div>
                                      </div>
                                      <div class="text-14 lh-1 ml-10">Yes</div>
                                    </div>
                                  </div>
                                  <div class="col-6">
                                    <div class="form-radio d-flex items-center ">
                                      <div class="radio">
                                        <input type="radio" name="marital_status" value="No">
                                        <div class="radio__mark">
                                          <div class="radio__icon"></div>
                                        </div>
                                      </div>
                                      <div class="text-14 lh-1 ml-10">No</div>
                                    </div>
                                  </div>
                            </div>
                    </div>
                  
        
                    
                    
                    <div class="col-md-12">
        
                        <div class="form-input ">
                        <input type="text" name="other_nationalities" required>
                        <label class="lh-1 text-16 text-light-1">Other Nationalitites</label>
                        </div>
        
                    </div>

                    <div class="col-md-12">
        
                        <div class="form-input ">
                        <input type="text" name="address" required>
                        <label class="lh-1 text-16 text-light-1">Residential Address</label>
                        </div>
        
                    </div>
        
                    <div class="col-md-6">
        
                        <div class="form-input ">
                          <input type="text" name="landline_number" required>
                          <label class="lh-1 text-16 text-light-1">Landline Number</label>
                        </div>
        
                      </div>

                      <div class="col-md-6">
        
                        <div class="form-input ">
                          <input type="text" name="mobile_number" required>
                          <label class="lh-1 text-16 text-light-1">Mobile Number</label>
                        </div>
        
                      </div>

                      <div class="col-md-6">
        
                        <div class="form-input ">
                          <input type="text" name="father_name" required>
                          <label class="lh-1 text-16 text-light-1">Father Name</label>
                        </div>
        
                      </div>

                      <div class="col-md-6">
                        <div class="form-input" style="border: 1px solid #d5caca;border-radius: 4px;padding: 0.3rem;">
                                <label class="lh-1 text-16 text-light-1" style="margin-top: -0.5rem;">Nationality</label>
                            <select name="father_nationality" class="" id="" style="margin-top: 2rem;">
                                    @isset($countriesList)
                                        @foreach($countriesList as $country_res)
                                            <option value="{{ $country_res->name }}">{{ $country_res->name }}</option>
                                        @endforeach    
                                    @endisset
                            </select>
                        </div>
                      </div>

                      <div class="col-md-6">
        
                        <div class="form-input ">
                          <input type="text" name="mother_name" required>
                          <label class="lh-1 text-16 text-light-1">Mother Name</label>
                        </div>
        
                      </div>

                      <div class="col-md-6">
                        <div class="form-input" style="border: 1px solid #d5caca;border-radius: 4px;padding: 0.3rem;">
                                <label class="lh-1 text-16 text-light-1" style="margin-top: -0.5rem;">Nationality</label>
                            <select name="mother_nationality" class="" id="" style="margin-top: 2rem;">
                                    @isset($countriesList)
                                        @foreach($countriesList as $country_res)
                                            <option value="{{ $country_res->name }}">{{ $country_res->name }}</option>
                                        @endforeach    
                                    @endisset
                            </select>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <h6>do you have Accompanied member?</h6>
                        <div class="form-input ">
                          <input type="text" name="accompanied_details" required>
                          <label class="lh-1 text-16 text-light-1">if yes details</label>
                        </div>

                      </div>

                      <div class="col-md-12">
                        <h6>Finance And Employment Info</h6>
                        <div class="form-input ">
                          <input type="text" name="finance_info" required>
                          <label class="lh-1 text-16 text-light-1">Personal Circumstances</label>
                        </div>

                      </div>

                      <div class="col-md-12">
                        <div class="form-input ">
                          <input type="text" name="type_of_employment" required>
                          <label class="lh-1 text-16 text-light-1">Type of Employment</label>
                        </div>

                      </div>

                      <div class="col-md-12">
                        <h6>Travelling History, please mention countries visted in last 3 years  with complete details when visted how much stayed and for what visted</h6>
                        <div class="form-input ">
                          <input type="text" name="travel_history" required>
                          <label class="lh-1 text-16 text-light-1">Enter Details</label>
                        </div>

                      </div>

                      <div class="col-md-12">
                        <div class="form-input ">
                          <input type="text" name="visa_history" required>
                          <label class="lh-1 text-16 text-light-1">Refused Visa Application's history</label>
                        </div>

                      </div>
                      <div class="col-md-12">
                        <h6>Have you been to Pakistan before ? If yes visa number, how many days you stayed in Pakistan?</h6>
                        <div class="form-input ">
                          <input type="text" name="visa_days_last" required>
                          <label class="lh-1 text-16 text-light-1">Enter Days</label>
                        </div>

                      </div>
        
        
        
                     
                    </div>
        
                  
        
                    <div class="row">
                        <div class="col-12 mt-20">
                        <div class="row y-gap-20 items-center justify-between">
                          <div class="col-auto">
                            <div class="text-14 text-light-1">
                              By proceeding with this booking, I agree to GoTrip Terms of Use and Privacy Policy.
                            </div>
                          </div>
        
                          <div class="col-auto">
        
                            <button type="submit" class="button h-60 px-24 -dark-1 bg-blue-1 text-white">
                              Submit <div class="icon-arrow-top-right ml-15"></div>
                            </button>
        
                          </div>
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