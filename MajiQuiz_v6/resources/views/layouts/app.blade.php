<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('MajiQuiz', 'MajiQuiz') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
   
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
<header style="margin-bottom:-6rem">
  <div class="page-header min-vh-100 pb-md-5 absolute" style="background-image: url('./img/logo2.jpg');" >
  <container class="container">
    <div class="position-absolute w-100 z-index-1 top-0">
    <div class="d-flex align-items-center justify-content-center min-vh-100 pb-md-5">
      <div class="text-center " >
          <h1 class="text-white text-bold pt-10 mt-n5 display-1 mb-4" style="text-shadow: 4px 4px 1px black; font-size: 150px"><b>MajiQuiz</b></h1>
          <p class="lead text-light mt-n5 transparent-background" style="text-shadow: 2px 2px 2px black; font-size: 50"><b>Unlocking Knowledge, One Question at a Time!</b> <br/> Dive into Wisdom! </p>
        </div>
      </div>
    </div>
    <div class="position-absolute w-100 z-index-1 bottom-0">
      <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 40" preserveAspectRatio="none" shape-rendering="auto">
        <defs>
          <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
        </defs>
        <g class="moving-waves">
          <use xlink:href="#gentle-wave" x="48" y="-1" fill="rgba(255,255,255,0.40" />
          <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.35)" />
          <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.25)" />
          <use xlink:href="#gentle-wave" x="48" y="8" fill="rgba(255,255,255,0.20)" />
          <use xlink:href="#gentle-wave" x="48" y="13" fill="rgba(255,255,255,0.15)" />
          <use xlink:href="#gentle-wave" x="48" y="16" fill="rgba(255,255,255,0.95" />
        </g>
      </svg>
    </div>
  </div>
</header>
    <div id="app">
        <div class="container" class="d-flex justify-content-center align-items-center min-vh-100">
    <div class="jumbotron text-center mx-auto">
  {{-- <h1 class="display-1">Hello, There!</h1>
  <p class="lead">Get ready to flex those brain muscles and embrace the wild world of MajiQuiz! We're not just here to tickle your funny bone, but to challenge your noodle with mind-boggling questions and brain-teasing riddles. </p>
  <hr class="my-2">
  <p>Grab your thinking cap and a side of laughter, because at MajiQuiz, learning is the name of the game, and giggles are the bonus points!</p>
  <p class="lead">
    <a class="btn btn-warning btn-lg" href="{{ route('select-quiz') }}" role="button">Try it out!</a>
  </p> --}}
</div>

<br>
<br>
<br>
</div>

    <nav class="navbar navbar-expand-lg fixed-top navbar-white bg-light">
        <div class="container">
                <a class ="navbar-brand" style="margin-left: 5.8rem;" href="{{ url('/') }}">
                <img src="/img/logo.jpg" alt="logo" width="80" height="80" class="d-inline-block align-text-md-center">
                
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                    
                </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a type="button" class="btn btn-lg btn-outline-warning" style="margin-left: 39rem;" href="{{ route('leaderboard') }}">Leaderboard</a>
                    </li>
                </ul>
                <ul class="navbar-nav" style="margin-left: 9rem;">
                    @guest
                    <li class="nav-item">
                    <a class="btn btn-outline-primary btn-lg btn-rounded" style="margin-left: -6rem;" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                    <a class="btn btn-outline-info btn-lg btn-rounded teste" style="margin-right: 6rem; margin-left: -0.3rem;" href="{{ route('register') }}">Register</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" @if(Auth::user()['username'] == 'admin') href="{{ route('admin.index') }}" @else href="{{ route('my-scores') }}" @endif><i class="fa fa-user"></i> {{ Auth::user()['username'] }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" 
                          style="color: blue; transition: color 0.3s;" 
                          onmouseover="this.style.color='darkblue';" 
                          onmouseout="this.style.color='blue';"
                          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                          Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                </li>
                @endguest
            </ul>
        </div>
    </nav>

        <main class="py-4">
            @yield('content')
            <br>
            <br>
            <br>
        </main>
    </div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
