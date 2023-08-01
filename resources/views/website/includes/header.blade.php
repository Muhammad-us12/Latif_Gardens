<!DOCTYPE html>
<html lang="en" data-x="html" data-x-toggle="html-overflow-hidden">

<head>
  <!-- Required meta tags -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@400;500;600&display=swap" rel="stylesheet">

  <!-- Stylesheets -->
  @yield('style')
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="{{ asset('public/frontend/css/vendors.css') }}">
  <link rel="stylesheet" href="{{ asset('public/frontend/css/main.css') }}">

  <title>Latif Gardens</title>
</head>

<body>
  <div class="preloader js-preloader">
    <div class="preloader__wrap">
      <div class="preloader__icon">
      <img src="{{ asset('public/frontend/img/general/logo.png') }}" alt="logo icon">
      </div>
    </div>

    <div class="preloader__title">Latif Gardens</div>
  </div>

  <main>


    <header data-add-bg="" class="header bg-white shadow-3 js-header" data-x="header" data-x-toggle="is-menu-opened">
      <div data-anim="fade" class="header__container px-30 sm:px-20">
        <div class="row justify-between items-center">

          <div class="col-auto">
            <div class="d-flex items-center">
              <a href="{{ URL::to('/') }}" class="header-logo mr-30" data-x="header-logo" data-x-toggle="is-logo-dark">
                <img src="{{ asset('public/frontend/img/general/logo.png') }}" alt="logo icon">
                <img src="{{ asset('public/frontend/img/general/logo.png') }}" alt="logo icon">
              </a>

              <div class="header-menu " data-x="mobile-menu" data-x-toggle="is-menu-active">
                <div class="mobile-overlay"></div>

                <div class="header-menu__content">
                  <div class="mobile-bg js-mobile-bg"></div>

                  <div class="menu js-navList">
                    <ul class="menu__nav text-dark-1 -is-active">

                     <li>
                        <a href="{{ URL::to('/') }}">
                          Home
                        </a>
                      </li>

                      <li>
                        <a href="{{ URL::to('blogs_list') }}">
                            Blogs
                        </a>
                      </li>

                      <li>
                        <a href="{{ URL::to('contact_us') }}">
                            Contact Us
                        </a>
                      </li>

                      <li>
                        <a href="{{ URL::to('about_us') }}">
                            About Us
                        </a>
                      </li>


                    </ul>
                  </div>

                  <div class="mobile-footer px-20 py-20 border-top-light js-mobile-footer">
                  </div>
                </div>
              </div>

            </div>
          </div>


          <div class="col-auto">
            <div class="d-flex items-center">

              


              <div class="d-flex items-center ml-20 is-menu-opened-hide md:d-none">
                <?php 
                   if(Session::has('customer_data')){
                    ?>
                        <a href="{{ URL::to('customer_dashboard') }}" class="button px-30 fw-400 text-14 -outline-blue-1 h-40 text-blue-1 ml-20">Dashboard</a>
                    <?php
                    }else{
                        ?>
                        <a href="{{ URL::to('customer_login') }}" class="button px-30 fw-400 text-14 -outline-blue-1 h-40 text-blue-1 ml-20">Login</a>
                        <?php
                    }
                ?>
                
                <!-- <a href="signup.html" class="button -white bg-blue-1 px-30 fw-400 text-14 h-40 text-white ml-20">Register</a> -->
              </div>

              <div class="d-none xl:d-flex x-gap-20 items-center pl-30" data-x="header-mobile-icons" data-x-toggle="text-white">
                <div><a href="" class="d-flex items-center icon-user text-inherit text-22"></a></div>
                <div><button class="d-flex items-center icon-menu text-inherit text-20" data-x-click="html, header, header-logo, header-mobile-icons, mobile-menu"></button></div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </header>