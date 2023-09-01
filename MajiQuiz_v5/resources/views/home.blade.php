@extends('layouts.app')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h1 class="display-1" style="text-align:center">Hello, There!</h1>
                <p class ="lead" style="text-align:center">Get ready to flex those brain muscles and embrace the wild world of MajiQuiz! We're not just here to tickle your funny bone, but to challenge your noodle with mind-boggling questions and brain-teasing riddles. </p>
                <hr class="my-2">
                <p style="text-align:center">Grab your thinking cap and a side of laughter, because at MajiQuiz, learning is the name of the game, and giggles are the bonus points!</p>
                <p class="lead" style="text-align:center">
                    <a class="btn btn-warning btn-lg" href="{{ route('select-quiz') }}" role="button">Try it out!</a>
                </p>
        
                @guest
                <div class="col-md-8">
            <div class="card">
        
                
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                @endguest
            </div>
        </div>
    </div>
</div>
@endsection

<!-- Scripts e plugins JavaScript aqui -->
<script src="{{ asset('assets/js/core/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/parallax.min.js') }}"></script>
<script src="{{ asset('assets/js/soft-design-system.min.js?v=1.0.9') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
