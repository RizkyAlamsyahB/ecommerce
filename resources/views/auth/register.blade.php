@extends('layouts.app')

@section('content')
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo mb-3">
                        <a href="{{ url('/') }}"><img src="{{ asset('template/dist/assets/compiled/png/logo_baru.png') }}" alt="Logo" style="width: 200px; height: auto;"></a>
                    </div>
                    <h1 class="auth-title" style="color: #27292C; font-weight: bold;">Sign Up</h1>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input id="name" type="text" class="form-control form-control-xl @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Name" required autocomplete="name" autofocus>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input id="email" type="email" class="form-control form-control-xl @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input id="password" type="password" class="form-control form-control-xl @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="new-password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input id="password-confirm" type="password" class="form-control form-control-xl" name="password_confirmation" placeholder="Confirm Password" required autocomplete="new-password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button type="submit" class="btn  btn-block btn-lg shadow-lg mt-5" style="background-color: #EB5633; color: white;">Sign Up</button>
                    </form>

                    <div class="text-center mt-5 text-lg fs-4" >
                        <p class='text-gray-600'>Already have an account? <a href="{{ route('login') }}" class="font-bold" style="color: #EB5633;">Log in</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right"></div>
            </div>
        </div>

    </div>
@endsection
