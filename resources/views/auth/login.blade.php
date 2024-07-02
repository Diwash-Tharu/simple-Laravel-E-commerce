@extends('layouts.app')

@section('content')

<div class="bg-blue-50 h-screen w-screen">
    <div class="flex flex-col items-center flex-1 h-full justify-center px-4 sm:px-0">
        <div class="flex rounded-lg shadow-lg w-full sm:w-3/4 lg:w-1/2 bg-white sm:mx-0" style="height: 500px">
            <div class="flex flex-col w-full md:w-1/2 p-4">
                <div class="flex flex-col flex-1 justify-center mb-8">
                    <h1 class="text-4xl text-center font-thin">Welcome Back</h1>
                    <div class="w-full mt-4">
                        <form class="form-horizontal w-3/4 mx-auto" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="flex flex-col mt-4">
                                <input id="email" type="email" class="flex-grow h-8 px-2 border rounded border-grey-400  @error('email')
                                    is-invalid @enderror" name="email" value="{{ old('email') }}" required
                                    autocomplete="email" autofocus placeholder="Email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="flex flex-col mt-4">
                                <input id="password" type="password"
                                    class="flex-grow h-8 px-2 rounded border border-grey-400 @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="current-password" placeholder="Password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="flex items-center mt-4">
                                <input class="mr-2" type="checkbox" name="remember" id="remember" {{ old('remember')
                                    ? 'checked' : '' }}> <label for="remember" class="text-sm text-grey-dark">Remember
                                    Me</label>
                            </div>
                            <div class="flex flex-col mt-8">

                                <button type="submit"
                                    class="rounded-3xl bg-teal-600 bg-opacity-70 px-10 py-2 text-white shadow-xl backdrop-blur-md transition-colors duration-300 hover:bg-teal-600">
                                    Login
                                </button>
                            </div>
                        </form>
                        <div class="text-center mt-4">
                            @if (Route::has('password.request'))
                            <a class="inline-block text-sm text-teal-800" href="{{ route('password.request') }}">
                                Forgot Your Password?
                            </a>
                            @endif
                        </div>
                        <div class="text-center">
                            <a class=" inline-block text-sm text-teal-800" href="/register">
                                Don't have an account? Create Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hidden md:block md:w-1/2 rounded-r-lg"
                style="background: url('{{ asset('images/login-image.png') }}'); background-size: cover; background-position: center center;">
            </div>
        </div>
    </div>
</div>

@endsection