<?php 
    use App\Helpers\Helper;
?>
@extends('website/includes/master')

@section('content')
<section class="layout-pt-lg layout-pb-lg bg-blue-2">
      <div class="container">
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
        <div class="row justify-center">
          <div class="col-xl-6 col-lg-7 col-md-9">
            <div class="px-50 py-50 sm:px-20 sm:py-20 bg-white shadow-4 rounded-4">
                <form action="{{ URL::to('otp_submit') }}" method="post">
                    @csrf
                    <div class="row y-gap-20">
                        <div class="col-12">
                        <h1 class="text-22 fw-500">Welcome back</h1>
                        <!-- <p class="mt-10">Don't have an account yet? <a href="#" class="text-blue-1">Sign up for free</a></p> -->
                        </div>

                        <div class="col-12">

                        <div class="form-input ">
                            <input type="text" name="otp" required>
                            <label class="lh-1 text-14 text-light-1">Enter OTP</label>
                        </div>

                        </div>

                        

                        <!-- <div class="col-12">
                        <a href="#" class="text-14 fw-500 text-blue-1 underline">Forgot your password?</a>
                        </div> -->

                        <div class="col-12">

                        <button type="submit" style="width:100%;" class="button py-20 -dark-1 bg-blue-1 text-white">
                            Submit <div class="icon-arrow-top-right ml-15"></div>
                        </button>

                        </div>
                    </div>

                </form>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection