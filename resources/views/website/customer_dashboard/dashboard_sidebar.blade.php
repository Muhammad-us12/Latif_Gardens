<div class="dashboard__sidebar bg-white scroll-bar-1">


      <div class="sidebar -dashboard">

        <div class="sidebar__item">
          <div class="sidebar__button -is-active">
            <a href="{{ URL::to('customer_dashboard') }}" class="d-flex items-center text-15 lh-1 fw-500">
              <img src="{{ asset('public/frontend/img/dashboard/sidebar/compass.svg') }}" alt="image" class="mr-15">
              Dashboard
            </a>
          </div>
        </div>

        <div class="sidebar__item">
          <div class="sidebar__button ">
            <a href="{{ URL::to('customer_booking') }}" class="d-flex items-center text-15 lh-1 fw-500">
              <img src="{{ asset('public/frontend/img/dashboard/sidebar/booking.svg') }}" alt="image" class="mr-15">
              Booking History
            </a>
          </div>
        </div>

        <div class="sidebar__item">
          <div class="sidebar__button ">
            <a href="{{ URL::to('customer_payment_request') }}" class="d-flex items-center text-15 lh-1 fw-500">
              <img src="{{ asset('public/frontend/img/dashboard/sidebar/booking.svg') }}" alt="image" class="mr-15">
                Payment Request
            </a>
          </div>
        </div>

        <div class="sidebar__item">
          <div class="sidebar__button ">
            <a href="#" class="d-flex items-center text-15 lh-1 fw-500">
              <img src="{{ asset('public/frontend/img/dashboard/sidebar/log-out.svg') }}" alt="image" class="mr-15">
              Logout
            </a>
          </div>
        </div>

      </div>


    </div>