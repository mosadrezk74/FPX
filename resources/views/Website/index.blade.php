@extends('Website.layout')
@section('content')

    <section class="header">

       <img src="{{ asset('Website/assets/images/main_screen/2.png') }}"
            class="arrow2 wow slideInLeft" data-wow-duration="1s" alt="">
       <img src="{{ asset('Website/assets/images/main_screen/2.png') }}"
            class="arrow wow slideInRight" data-wow-duration="1s" alt="">



    <div class="container">
      <div class="contain">
        <nav class="navbar navbar-expand-lg wow slideInDown" data-wow-duration="1s">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="{{asset('Website/assets/images/main_screen/logo.png')}}"
          width="255px"
        height="255px"
        loading="lazy">
      </a>
          <button class="navbar-toggler" type="button"
          data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false"
          aria-label="Toggle navigation">
          <img src="{{asset('Website/assets/images/main_screen/bars-solid (1).svg')}}"
          width="25px"
          height="25px">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 flex-grow-2 justify-content-center gap-4">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">
                  HOME
                </a>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  اللاعب
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  CLUBS
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>

              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">
                  REVENT GHANGE
                </a>
              </li>

                <li class="nav-item">
                    @auth
                        <a class="nav-link active" aria-current="page" href="{{route('dashboard.user')}}">
                            Dashboard
                        </a>
                    @else
                        <a class="nav-link active" aria-current="page" href="{{route('login')}}">
                            LOGIN
                        </a>
{{--                        @if (Route::has('register'))--}}
{{--                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>--}}
{{--                        @endif--}}
                    @endauth
                </li>
            </ul>

          </div>
        </div>
      </nav>



      <div class="footy">

        <div class="images">
          <img src="{{asset('Website/assets/images/main_screen/photo-2.png')}}"
          width="400px"
          height="700px"
          loading="lazy">
        </div>
        <div class="analyzing">
        <h1>FOOTY</h1>
        <h2>PROSPECT X</h2>
        <P>
          Analyzing players data discovering them and developing their skills
        </P>
      </div>
      </div>
      </div><!-- contain -->
    </div><!-- container -->
   </section>

@endsection
