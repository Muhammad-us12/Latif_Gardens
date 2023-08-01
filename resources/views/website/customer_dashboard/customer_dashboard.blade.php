<?php 
    use App\Helpers\Helper;
?>
@extends('website/includes/master')

@section('content')

<div class="dashboard" data-x="dashboard" data-x-toggle="-is-sidebar-open">
  @include('website/customer_dashboard/dashboard_sidebar')


    <div class="dashboard__main">
      <div class="dashboard__content bg-light-2">
        <div class="row y-gap-20 justify-between items-end pb-60 lg:pb-40 md:pb-32">
          <div class="col-auto">

            <h1 class="text-30 lh-14 fw-600">Dashboard</h1>
            <div class="text-15 text-light-1">Lorem ipsum dolor sit amet, consectetur.</div>

          </div>

          <div class="col-auto">

          </div>
        </div>


        <div class="row y-gap-30">

          <div class="col-xl-3 col-md-6">
            <div class="py-30 px-30 rounded-4 bg-white shadow-3">
              <div class="row y-gap-20 justify-between items-center">
                <div class="col-auto">
                  <div class="fw-500 lh-14">Tentative</div>
                  <div class="text-26 lh-16 fw-600 mt-5">{{ $tentative_booking }}</div>
                  <div class="text-15 lh-14 text-light-1 mt-5">Tentative Booking</div>
                </div>

                <div class="col-auto">
                  <img src="{{ asset('public/frontend/img/dashboard/icons/3.svg') }}" alt="icon">
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-md-6">
            <div class="py-30 px-30 rounded-4 bg-white shadow-3">
              <div class="row y-gap-20 justify-between items-center">
                <div class="col-auto">
                  <div class="fw-500 lh-14">Confirmed</div>
                  <div class="text-26 lh-16 fw-600 mt-5">{{ $confirmed_booking }}</div>
                  <div class="text-15 lh-14 text-light-1 mt-5">Confirmed Booking</div>
                </div>

                <div class="col-auto">
                  <img src="{{ asset('public/frontend/img/dashboard/icons/3.svg') }}" alt="icon">
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-md-6">
            <div class="py-30 px-30 rounded-4 bg-white shadow-3">
              <div class="row y-gap-20 justify-between items-center">
                <div class="col-auto">
                  <div class="fw-500 lh-14">Payable</div>
                  <div class="text-26 lh-16 fw-600 mt-5">{{ $customer_Data->balance }}</div>
                  <div class="text-15 lh-14 text-light-1 mt-5">Payable Remaining</div>
                </div>

                <div class="col-auto">
                  <img src="{{ asset('public/frontend/img/dashboard/icons/2.svg') }}" alt="icon">
                </div>
              </div>
            </div>
          </div>

     

          <div class="col-xl-3 col-md-6">
            <div class="py-30 px-30 rounded-4 bg-white shadow-3">
              <div class="row y-gap-20 justify-between items-center">
                <div class="col-auto">
                  <div class="fw-500 lh-14">Paid</div>
                  <div class="text-26 lh-16 fw-600 mt-5">${{ $total_paid_amount }}</div>
                  <div class="text-15 lh-14 text-light-1 mt-5">Paid Amount</div>
                </div>

                <div class="col-auto">
                  <img src="{{ asset('public/frontend/img/dashboard/icons/4.svg') }}" alt="icon">
                </div>
              </div>
            </div>
          </div>

        </div>

        <div class="row y-gap-30 pt-20">
          

          <div class="col-xl-12 col-md-12">
            <div class="py-30 px-30 rounded-4 bg-white shadow-3">
              <div class="d-flex justify-between items-center">
                <h2 class="text-18 lh-1 fw-500">
                  Recent Bookings
                </h2>

                <div class="">
                  <a href="#" class="text-14 text-blue-1 fw-500 underline">View All</a>
                </div>
              </div>

              <div class="overflow-scroll scroll-bar-1 pt-30">
                <table class="table-2 col-12">
                  <thead class="">
                    <tr>
                      <th>#</th>
                      <th>Invoice No</th>
                      <th>Item</th>
                      <th>Type</th>
                      <th>Adults</th>
                      <th>Childs</th>
                      <th>Total</th>
                      <th>Status</th>
                      <th>Created At</th>
                    </tr>
                  </thead>
                  <tbody>

                  @isset($last_bookings)
                    @foreach($last_bookings as $book_res)
                    <?php 
                      $cart_data = json_decode($book_res->cart_data);
                    ?>
                    <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $book_res->invoice_no }}</td>
                      <td>{{ $cart_data->package_title }}</td>
                      <td class="fw-500">{{ $cart_data->booking_type }}</td>
                      <td>{{ $book_res->adults }}</td>
                      <td>{{ $book_res->childs }}</td>
                      <td>${{ $book_res->total_price }}</td>
                      <td>
                        @if($book_res->status == 'Tentative')
                        <div class="rounded-100 py-4 text-center col-12 text-14 fw-500 bg-red-3 text-red-2">{{ $book_res->status }}</div>
                        @endif

                        @if($book_res->status == 'Confirmed')
                        <div class="rounded-100 py-4 px-10 text-center text-14 fw-500 bg-blue-1-05 text-blue-1">{{ $book_res->status }}</div>
                        @endif                      </td>
                      <td>@isset($book_res->created_at) {{ date('d-m-Y',strtotime($book_res->created_at)) }} @endisset</td>
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