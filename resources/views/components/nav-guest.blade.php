<nav id="nav-guest" class="flex w-full bg-white border-b border-obito-grey">
    <div class="flex w-[1280px] px-[75px] py-5 items-center justify-between mx-auto">
        <div class="flex items-center gap-[50px]">
            <a href="{{ route('front.index') }}" class="flex shrink-0">
                <img src="{{ asset('assets/images/logos/logo-tivio.png') }}" class="flex shrink-0" alt="logo">
            </a>
            <ul class="flex items-center gap-10">
                <li
                    class=" {{ request()->routeIs('front.index') ? 'font-semibold' : '' }} hover:font-semibold transition-all duration-300 ">
                    <a href="{{ route('front.index') }}">Home</a>
                </li>
                <li
                    class=" {{ request()->routeIs('front.pricing') ? 'font-semibold' : '' }} hover:font-semibold transition-all duration-300">
                    <a href="{{ route('front.pricing') }}">Pricing</a>
                </li>
                <li class="hover:font-semibold transition-all duration-300">
                    <a href="#">Features</a>
                </li>
                <li class="hover:font-semibold transition-all duration-300">
                    <a href="#">Testimonials</a>
                </li>
            </ul>
        </div>
        <div class="flex items-center gap-5 justify-end">
            <a href="#" class="flex shrink-0">
                <img src="{{ asset('assets/images/icons/device-message.svg') }}" class="flex shrink-0" alt="icon">
            </a>
            <div class="h-[50px] flex shrink-0 bg-obito-grey w-px"></div>
            <div class="flex items-center gap-3">
                <a href="{{ route('register') }}"
                    class="rounded-full border border-obito-grey py-3 px-5 gap-[10px] bg-white hover:border-obito-green transition-all duration-300">
                    <span class="font-semibold">Sign Up</span>
                </a>
                <a href="{{ route('login') }}"
                    class="rounded-full py-3 px-5 gap-[10px] bg-obito-green hover:drop-shadow-effect transition-all duration-300">
                    <span class="font-semibold text-white">My Account</span>
                </a>
            </div>
        </div>
    </div>
</nav>