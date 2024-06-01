<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Who Are You</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/who.css') }}">

<body>
    <div>
        <div class="row gx-0">
            <div class="col auth-bg d-none d-lg-block">
                <div class="login text-center">
                    <img class="mx-auto pt-4" src="/images/Welcome.png">
                </div>
            </div>
            <div class="col">
                <x-guest-layout>
                    <x-authentication-card>
                        <x-slot name="logo">
                            <x-authentication-card-logo />
                        </x-slot>

                        <x-validation-errors class="mb-4" />

                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div>
                                <x-label for="email" value="{{ __('Email') }}" />
                                <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                    :value="old('email')" required autofocus autocomplete="username"
                                    placeholder="email..." />
                            </div>

                            <div class="mt-4">
                                <x-label for="password" value="{{ __('Password') }}" />
                                <x-input id="password" class="block mt-1 w-full" type="password" name="password"
                                    required autocomplete="current-password" placeholder="password..." />
                            </div>

                            <div class="flex justify-between items-end">
                                <div class="block mt-4">
                                    <label for="remember_me" class="flex items-center">
                                        <x-checkbox id="remember_me" name="remember" />
                                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                    </label>
                                </div>
    
                                @if (Route::has('password.request'))
                                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                        href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif
                            </div>

                            <div class="mt-4 ">
                                <button
                                    class="w-full text-white bg-[#960021] hover:bg-[#960021]/90 focus:ring-4 focus:outline-none focus:ring-[#960021]/50 rounded-full text-sm px-5 py-3 font-bold text-center flex justify-center gap-2 items-center dark:focus:ring-[#960021]/55 transition ease-in-out duration-300"
                                    type="submit">
                                    {{ __('Log in') }}
                                </button>
                            </div>
                            <div class="mt-4 text-center">
                                <a href="{{ route('register') }}" class="text-[#960021]">Create New Account</a>
                            </div>
                            <div class="relative flex py-4 items-center">
                                <div class="flex-grow border-t border-gray-200"></div>
                                <span class="flex-shrink mx-4 text-gray-400">or</span>
                                <div class="flex-grow border-t border-gray-200"></div>
                            </div>
                            <div>
                                <a
                                href="{{ url('auth/google') }}"
                                    class="border-1 border-[#960021] text-[#960021] hover:bg-[#960021]/90 hover:text-white focus:ring-4 focus:outline-none focus:ring-[#960021]/50 rounded-full text-sm px-5 py-2.5 font-bold text-center flex justify-center gap-2 items-center dark:focus:ring-[#960021]/55  transition ease-in-out duration-300">
                                    
                                    <i class="fa-brands fa-google"></i>
                                    Login With Google
                                </a>
                            </div>
                        </form>
                    </x-authentication-card>
                </x-guest-layout>
            </div>

        </div>
    </div>
</body>

</html>
