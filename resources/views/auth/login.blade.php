@extends('front.layouts.app')
@section('title', 'Login - Tivio Academy')
@section('content')
        <x-nav-guest/>
        <main class="relative flex flex-1 h-full">
            <section class="flex flex-1 items-center py-5 px-5 pl-[calc(((100%-1280px)/2)+75px)]">
                <form method="POST" action="{{ route('login') }}" class="flex flex-col h-fit w-[510px] shrink-0 rounded-[20px] border border-obito-grey p-5 gap-5 bg-white">
                @csrf
                    <h1 class="font-bold text-[22px] leading-[33px] mb-5">Welcome Back, <br>Let’s Upgrade Skills</h1>
                    <div class="flex flex-col gap-2">
                        <p>Email Address</p>
                        <label class="relative group">
                            <input name="email" type="email" class="appearance-none outline-none w-full rounded-full border border-obito-grey py-[14px] px-5 pl-12 font-semibold placeholder:font-normal placeholder:text-obito-text-secondary group-focus-within:border-obito-green transition-all duration-300" placeholder="Type your valid email address">
                            <img src="assets/images/icons/sms.svg" class="absolute size-5 flex shrink-0 transform -translate-y-1/2 top-1/2 left-5" alt="icon">
                        </label>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="flex flex-col gap-3">
                        <p>Password</p>
                        <label class="relative group">
                            <input name="password" type="password" class="appearance-none outline-none w-full rounded-full border border-obito-grey py-[14px] px-5 pl-12 font-semibold placeholder:font-normal placeholder:text-obito-text-secondary group-focus-within:border-obito-green transition-all duration-300" placeholder="Type your password">
                            <img src="assets/images/icons/shield-security.svg" class="absolute size-5 flex shrink-0 transform -translate-y-1/2 top-1/2 left-5" alt="icon">
                        </label>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        <a href="#" class="text-sm text-obito-green hover:underline">Forgot My Password</a>
                    </div>
                    <button type="submit" class="flex items-center justify-center gap-[10px] rounded-full py-[14px] px-5 bg-obito-green hover:drop-shadow-effect transition-all duration-300">
                        <span class="font-semibold text-white">Sign In to My Account</span>
                    </button>
                </form>
            </section>
            <div class="relative flex w-1/2 shrink-0">
                <div id="background-banner" class="absolute flex w-full h-full overflow-hidden">
                    <img src="assets/images/backgrounds/banner-subscription.png" class="w-full h-full object-cover" alt="banner">
                </div>
            </div>
        </main>
@endsection