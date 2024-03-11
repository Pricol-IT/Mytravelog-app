@extends('layouts.app')

@section('content')

<div class="container d-flex align-items-center justify-content-center flex-column" >
        <div class="company-logo p-3">
            <img src="assets/img/logo.png" alt="">
            <!-- <img src="assets/img/logo.png" alt=""> -->
        </div>
        <div class="login-form  d-flex bg-white shadow p-4 rounded  flex-column">
            <div class="logo p-3 text-center" style="color:#0072BC;"><h1>MyTravelog</h1></div>
            <div class="welcome-text p-1"><h3>Welcome</h3>
            <p>Login to our MyTravelog</p></div>

            <form method="POST" action="{{ route('login') }}">
                        @csrf
                <div class="form-group p-1">
                  <!-- <label for="username" class="d-none"></label> -->
                  <input id="emp_id" type="text" class="form-control @error('emp_id') is-invalid @enderror" name="emp_id" value="{{ old('emp_id') }}" required placeholder="Username">

                </div>
                <div class="form-group pt-2">
                  <!-- <label for="exampleInputPassword1" class="d-none"></label> -->
                  <input  class="form-control" type="password" name="password" autocomplete="current-password"  placeholder="Password" id="id_password">

                </div>
                <div class="form-group p-2">
                <div class="fs-6"><p class="m-0 p-1">
                    <input class="form-check-input mt-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Password?') }}
                                    </a>
                                @endif
                            </p></div>
              </div>
                <button type="submit" class="btn btn-primary form-control">Submit</button>
              </form>
        </div>
    </div>

@endsection
