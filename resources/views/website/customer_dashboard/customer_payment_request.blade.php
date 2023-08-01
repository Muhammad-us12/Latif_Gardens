<?php 
    use App\Helpers\Helper;
?>
@extends('website/includes/master')

@section('style')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
     
    </style>
@endsection

@section('content')

<div class="dashboard" data-x="dashboard" data-x-toggle="-is-sidebar-open">
    
    @include('website/customer_dashboard/dashboard_sidebar')

    <div class="dashboard__main">
      <div class="dashboard__content bg-light-2">
        <div class="row y-gap-20 justify-between items-end pb-60 lg:pb-40 md:pb-32">
          <div class="col-auto">

            <h1 class="text-30 lh-14 fw-600">Bookings</h1>
            <div class="text-15 text-light-1">Lorem ipsum dolor sit amet, consectetur.</div>

          </div>

          <div class="col-auto">

          </div>
        </div>

<div class="row">
    <div class="offset-md-10 col-md-2">
        <a href="#exampleModal" data-bs-toggle="modal" data-bs-target="" class="button h-60 px-24 -dark-1 bg-blue-1 text-white">
            Add Payment <div class="icon-arrow-top-right ml-15"></div>
        </a>
    </div>
</div>
        <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Payments Instruction</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ URL::to('payment_request_submit') }}" method="post" enctype="multipart/form-data">
      <div class="modal-body">
            @csrf
            <div class="row">
                <div class="col-md-6 p-2">
                    <div class="form-input ">
                        <input type="number" step=".01" name="payment_amount" required>
                        <label class="lh-1 text-16 text-light-1">Payment Amount</label>
                    </div>
                </div>

                <div class="col-md-6 p-2">
                    <div class="form-input ">
                        <input type="text" name="transcation_id" required>
                        <label class="lh-1 text-16 text-light-1">Transcation Id</label>
                    </div>
                </div>

                <div class="col-md-6 p-2">
                    <div class="form-input ">
                        <input type="text" name="payment_method" required>
                        <label class="lh-1 text-16 text-light-1">Payment Method</label>
                    </div>
                </div>

                <div class="col-md-6 p-2">
                    <div class="form-input ">
                        <input type="text" name="invoice_no" required>
                        <label class="lh-1 text-16 text-light-1">Invoice No</label>
                    </div>
                </div>

                <div class="col-md-6 p-2">
                    <div class="form-input ">
                        <input type="date" name="payment_date" required>
                        <label class="lh-1 text-16 text-light-1" style="top: 11px;">Payment Date</label>
                    </div>
                </div>

                <div class="col-md-6 p-2">
                    <div class="form-input ">
                        <input type="file" name="payment_pic" required>
                        <label class="lh-1 text-16 text-light-1" style="top: 11px;">Payment Screen Shoot</label>
                    </div>
                </div>
            </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="button h-60 px-24 -dark-1 bg-blue-1 text-white">Confirm Booking <div class="icon-arrow-top-right ml-15"></div></button>
      </div>
      </form>
    </div>
  </div>
</div>

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
        <div class="row y-gap-30 pt-20">
          

          <div class="col-xl-12 col-md-12">
            <div class="py-30 px-30 rounded-4 bg-white shadow-3">
              <div class="d-flex justify-between items-center">
                <h2 class="text-18 lh-1 fw-500">
                  All Payments Requests
                </h2>

                <div class="">
                  <!-- <a href="#" class="text-14 text-blue-1 fw-500 underline">View All</a> -->
                </div>
              </div>

              <div class="overflow-scroll scroll-bar-1 pt-30">
                <table class="table-2 col-12">
                  <thead class="">
                    <tr>
                      <th>#</th>
                      <th>Invoice No</th>
                      <th>Transcation Id</th>
                      <th>Payment Amount</th>
                      <th>Date</th>
                      <th>Method</th>
                      <th>Status</th>
                      <th>Message</th>
                     
                    </tr>
                  </thead>
                  <tbody>

                  @isset($payments_request_data)
                    @foreach($payments_request_data as $pay_res)
                    
                    <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $pay_res->invoice_no }}</td>
                      <td>{{ $pay_res->transcation_id }}</td>
                      <td class="fw-500">{{ $pay_res->payment_amount }}</td>
                      <td>{{ $pay_res->payment_date }}</td>
                      <td>{{ $pay_res->payment_method }}</td>
                      <td>
                        @if($pay_res->status == 'Approve')
                          <span class="rounded-100 py-4 px-10 text-center text-14 fw-500 bg-blue-1-05 text-blue-1">{{ $pay_res->status }}</span>  
                        @endif

                        @if($pay_res->status == 'Pending')
                          <span class="rounded-100 py-4 px-10 text-center text-14 fw-500 bg-yellow-4 text-yellow-3">{{ $pay_res->status }}</span>  
                        @endif

                        @if($pay_res->status == 'Reject')
                          <span class="rounded-100 py-4 px-10 text-center text-14 fw-500 bg-red-3 text-red-2">{{ $pay_res->status }}</span>  
                        @endif
                      </td>
                      <td>{{ $pay_res->message }}</td>

                     
                    </tr>
                    @endforeach
                  @endisset


                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>


        <footer class="footer -dashboard mt-60">
          <div class="footer__row row y-gap-10 items-center justify-between">
            <div class="col-auto">
              <div class="row y-gap-20 items-center">
                <div class="col-auto">
                  <div class="text-14 lh-14 mr-30">© 2022 GoTrip LLC All rights reserved.</div>
                </div>

                <div class="col-auto">
                  <div class="row x-gap-20 y-gap-10 items-center text-14">
                    <div class="col-auto">
                      <a href="#" class="text-13 lh-1">Privacy</a>
                    </div>
                    <div class="col-auto">
                      <a href="#" class="text-13 lh-1">Terms</a>
                    </div>
                    <div class="col-auto">
                      <a href="#" class="text-13 lh-1">Site Map</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-auto">
              <div class="d-flex x-gap-5 y-gap-5 items-center">
                <button class="text-14 fw-500 underline">English (US)</button>
                <button class="text-14 fw-500 underline">USD</button>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
@endsection