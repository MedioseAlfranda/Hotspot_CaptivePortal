@extends('auth.layouts.app')

@section('content')
<div class="row justify-content-center">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 d-none d-lg-block bg-login-image" ></div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Hello, Selamat Datang. Silahkan Login</h1>
                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Email Address.">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input class="custom-control-input" type="checkbox" name="remember" id="customCheck" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="custom-control-label" for="customCheck">Remember
                                            Me</label>
                                    </div>
                                </div>

                                
                                <button class="btn btn-primary btn-user btn-block">
                                    Login
                                </button>

                                 <div class="text-center">
                                    <a class="small" href="{{route('password.request')}}">Lupa Password?</a>
                                 </div>

                                 <div class="text-center">
                                     <a class="small" href="{{('register')}}">Buat akun Baru Klik disini</a>
                                </div>

                                    <div class="text-center">
                                      <p>===================================</p>
                                    </div>
                                 
                                    <div class="text-center">
                                      <p class="font-weight-bold"> Atau Membuat Akun Lewat Authentikasi Social Media </p>
                                    </div>
                                    
                               <div class="form-group row">
                                   
                                        <a href="/auth/google" class="btn btn-danger btn-user btn-block">Login Dengan Google</a>
                                        <a href="/auth/facebook" class="btn btn-primary  btn-user btn-block">Login Dengan Facebook</a>
                                        <a href="/auth/github" class="btn btn-dark btn-user  btn-block">Login Dengan Github</a>
                                    
                                </div>  
                            </form>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
