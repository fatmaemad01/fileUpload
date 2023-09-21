<x-layout title="Login">
    <div class="container p-5">
        <div class="row mt-3">
            <div class="col-md-1"></div>
            <div class="col-md-4">
                <div class="card form p-5 mt-5 " style="border-radius:40px; border:none">
                    <h3 class="mb-2">Login</h3>

                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <x-input-label for="email" :value="__('Email')" class="form-label" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" class="form-control"
                                name="email" :value="old('email')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" class="form-label" :value="__('Password')" />

                            <x-text-input id="password" class="block mt-1 w-full form-control" type="password"
                                name="password" required autocomplete="current-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Remember Me -->
                        <div class="block mt-2">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox"
                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                    name="remember">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-start">
                            @if (Route::has('password.request'))
                                <a style="font-size: 15px"
                                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif

                            <div class=" d-flex justify-content-center mt-3 ">
                                <x-primary-button class="primary fw-bold">
                                    {{ __('Log in') }}
                                </x-primary-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6  background"></div>
        </div>
    </div>
</x-layout>
