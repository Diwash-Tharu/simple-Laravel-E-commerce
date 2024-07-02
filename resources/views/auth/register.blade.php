@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="flex justify-center px-6 my-12">

        <div class="w-full xl:w-3/4 lg:w-11/12 flex">

            <div class="w-full h-auto bg-gray-400 hidden lg:block lg:w-5/12 bg-cover rounded-l-lg"
                style="background-image: url('{{ asset('images/register-image.jpg') }}')"></div>

            <div class="w-full lg:w-7/12 bg-white p-5 rounded-lg lg:rounded-l-none">
                <h2 class="pt-4 text-3xl text-center">Create an Account</h2>
                <form class="px-8 pt-6 pb-8 mb-4 bg-white rounded" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-4 md:flex md:justify-between">
                        <div class="mb-4">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="firstName">
                                Full Name
                            </label>
                            <input
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline @error('name') is-invalid @enderror"
                                name="name" id="name" type="text" placeholder="Full Name" value="{{ old('name') }}"
                                required autocomplete="name" autofocus />
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
                            Email
                        </label>
                        <input
                            class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline @error('email') is-invalid @enderror"
                            id="email" type="email" placeholder="Email" name="email" value="{{ old('email') }}" required
                            autocomplete="email" />

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-4 md:flex md:justify-between">
                        <div class="mb-4 md:mr-2 md:mb-0">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="password">
                                Password
                            </label>
                            <input
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline  @error('password') is-invalid @enderror"
                                id="password" type="password" placeholder="******************" name="password" required
                                autocomplete="new-password" />
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                        <div class="md:ml-2">
                            <label class="block mb-2 text-sm font-bold text-gray-700" for="c_password">
                                Confirm Password
                            </label>
                            <input
                                class="w-full px-3 py-2 mb-3 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                id="c_password" type="password" placeholder="******************"
                                name="password_confirmation" required autocomplete="new-password" />
                        </div>
                    </div>
                    <div class="mb-6 text-center">
                        <button
                            class="rounded-3xl bg-teal-600 bg-opacity-70 px-10 py-2 text-white shadow-xl backdrop-blur-md transition-colors duration-300 hover:bg-teal-600"
                            type="submit">
                            Register Account
                        </button>
                    </div>
                    <hr class="mb-6 border-t" />
                    <div class="text-center">
                        <a class="inline-block text-sm text-teal-800" href="/password/reset">
                            Forgot Password?
                        </a>
                    </div>
                    <div class="text-center">
                        <a href="/login" class="inline-block text-sm text-teal-800">
                            Already have an account? Login?
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection