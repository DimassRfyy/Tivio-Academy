@extends('front.layouts.app')
@section('title', 'Pricing - Tivio Academy')
@section('content')
    <x-nav-guest/>
    <main class="flex flex-col flex-1 justify-center">
        <section id="pricing" class="flex flex-col items-center gap-[33px] mt-[50px]">
            <div class="flex flex-col items-center gap-[10px] max-w-[500px] w-full">
                <p class="flex items-center gap-[6px] w-fit rounded-full py-2 px-[14px] bg-obito-light-green">
                    <img src="{{ asset('assets/images/icons/crown-green.svg') }}" class="flex shrink-0 w-5" alt="icon">
                    <span class="font-bold text-sm">UNLOCK PRO JOURNEY</span>
                </p>
                <h1 class="font-bold text-[28px] leading-[42px] text-center">Pricing For Everyone</h1>
                <p class="leading-[28px] text-obito-text-secondary text-center">Harga yang kami tetapkan tergolong murah namun mentor tetap memberikan kualitas standard internasional</p>
            </div>
            <div class="flex items-center gap-5">
                <div class="price-card-reguler flex flex-col h-fit w-full max-w-[314px] shrink-0 rounded-[20px] p-5 border border-obito-grey gap-5 bg-white">
                    <div class="flex items-center gap-[14px]">
                        <img src="{{ asset('assets/images/icons/award-black-fill.svg') }}" class="flex w-[60px] shrink-0" alt="icon">
                        <h2 class="font-bold text-[22px] leading-[33px]">Beasiswa</h2>
                    </div>
                    <div class="price">
                        <p class="font-bold text-[32px] leading-[48px]">Rp 0</p>
                        <p class="mt-[6px] text-obito-text-secondary">3 months duration</p>
                    </div>
                    <hr class="border-obito-grey">
                    <div class="flex flex-col gap-4">
                        <p class="flex items-center gap-2">
                            <img src="{{ asset('assets/images/icons/tick-circle-green-fill.svg') }}" class="flex shrink-0" alt="icon">
                            <span class="font-semibold">Access 100+ Online Courses</span>
                        </p>
                        <p class="flex items-center gap-2">
                            <img src="{{ asset('assets/images/icons/tick-circle-green-fill.svg') }}" class="flex shrink-0" alt="icon">
                            <span class="font-semibold">Get Premium Certifications</span>
                        </p>
                    </div>
                    <hr class="border-obito-grey">
                    <a class="w-full h-11 rounded-full pt-[10px] px-5 gap-[10px] bg-obito-grey text-center">
                        <span class="font-semibold text-obito-text-grey">Sold Out</span>
                    </a>
                </div>
                @foreach($pricing_packages as $package)
                <div class="price-card-popular flex flex-col h-fit w-full max-w-[314px] shrink-0 rounded-[20px] border-2 border-obito-green gap-5 bg-white overflow-hidden">
                    <p class="popular-badge text-center font-semibold text-white py-[6px] bg-obito-green">Most Popular Package</p>
                    <div class="flex flex-col gap-5 p-5 pt-0">
                        <div class="flex items-center gap-[14px]">
                            <img src="{{ asset('assets/images/icons/cup-green-fill.svg') }}" class="flex w-[60px] shrink-0" alt="icon">
                            <h2 class="font-bold text-[22px] leading-[33px]">{{ $package->name }}</h2>
                        </div>
                        <div class="price">
                            <p class="font-bold text-[32px] leading-[48px]">
                              Rp {{ number_format($package->price, 0, '', '.') }}
                            </p>
                            <p class="mt-[6px] text-obito-text-secondary">{{ $package->duration }} months duration</p>
                        </div>
                        <hr class="border-obito-grey">
                        <div class="flex flex-col gap-4">
                            <p class="flex items-center gap-2">
                                <img src="{{ asset('assets/images/icons/tick-circle-green-fill.svg') }}" class="flex shrink-0" alt="icon">
                                <span class="font-semibold">Access 1500+ Online Courses</span>
                            </p>
                            <p class="flex items-center gap-2">
                                <img src="{{ asset('assets/images/icons/tick-circle-green-fill.svg') }}" class="flex shrink-0" alt="icon">
                                <span class="font-semibold">Get Premium Certifications</span>
                            </p>
                            <p class="flex items-center gap-2">
                                <img src="{{ asset('assets/images/icons/tick-circle-green-fill.svg') }}" class="flex shrink-0" alt="icon">
                                <span class="font-semibold">High Quality Work Portfolio</span>
                            </p>
                            <p class="flex items-center gap-2">
                                <img src="{{ asset('assets/images/icons/tick-circle-green-fill.svg') }}" class="flex shrink-0" alt="icon">
                                <span class="font-semibold">Career Consultation 2025</span>
                            </p>
                            <p class="flex items-center gap-2">
                                <img src="{{ asset('assets/images/icons/tick-circle-green-fill.svg') }}" class="flex shrink-0" alt="icon">
                                <span class="font-semibold">Support learning 24/7</span>
                            </p>
                        </div>
                        <hr class="border-obito-grey">
                        @if ($user && $package->isSubscribedByUser($user->id))
                        <a href="#" class="w-full h-11 rounded-full py-[10px] px-5 gap-[10px] bg-obito-green text-center hover:drop-shadow-effect transition-all duration-300">
                            <span class="font-semibold text-white">You have Subscribed</span>
                        </a>
                        @else
                        <a href="{{ route('front.checkout', $package) }}" class="w-full h-11 rounded-full py-[10px] px-5 gap-[10px] bg-obito-green text-center hover:drop-shadow-effect transition-all duration-300">
                            <span class="font-semibold text-white">Get Pro</span>
                        </a>
                        @endif
                    </div>
                </div>
                @endforeach
                <div class="price-card-reguler flex flex-col h-fit w-full max-w-[314px] shrink-0 rounded-[20px] p-5 border border-obito-grey gap-5 bg-white">
                    <div class="flex items-center gap-[14px]">
                        <img src="{{ asset('assets/images/icons/buildings-green-fill.svg') }}" class="flex w-[60px] shrink-0" alt="icon">
                        <h2 class="font-bold text-[22px] leading-[33px]">Business</h2>
                    </div>
                    <hr class="border-obito-grey">
                    <div class="price">
                        <p class="font-bold text-lg leading-[27px]">Customizing easily without paying too much money</p>
                    </div>
                    <div class="flex flex-col gap-4">
                        <p class="leading-7 text-obito-text-secondary">Kami bantu siapkan materi ajar sesuai kebutuhan pertumbuhan perusahaan anda saat ini.</p>
                    </div>
                    <hr class="border-obito-grey">
                    <a href="#" class="w-full h-11 rounded-full pt-[10px] px-5 gap-[10px] bg-white text-center border border-obito-grey hover:border-obito-green transition-all duration-300">
                        <span class="font-semibold">Contact Sales</span>
                    </a>
                </div>
            </div>
        </section>
        <section id="testimonials" class="mt-[50px] w-full pb-[66px]">
            <div id="testimonial-slide" class="w-full flex flex-nowrap overflow-x-hidden">
                <div class="slide-container flex gap-5 pl-5 flex-nowrap animate-[slide_50s_linear_infinite]">
                    @foreach ($testimonials as $testimonial)
                        <div class="testimonial-card flex flex-col w-[359px] shrink-0 rounded-[20px] border border-obito-grey p-5 gap-4 bg-white">
                            <div class="flex">
                                @for ($i = 0; $i < $testimonial->rating; $i++)
                                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="flex shrink-0 w-5" alt="star">
                                @endfor
                            </div>
                            <p class="leading-7">{{ $testimonial->message }}</p>
                            <div class="flex items-center gap-3">
                                <div class="flex w-[50px] h-[50px] shrink-0 rounded-full overflow-hidden bg-obito-grey">
                                    @if (Str::startsWith($testimonial->user->photo, ['http://', 'https://']))
                                        <img src="{{ $testimonial->user->photo }}" class="w-full h-full object-cover" alt="photo profile">
                                    @else
                                        <img src="{{ Storage::url($testimonial->user->photo) }}" class="w-full h-full object-cover" alt="photo profile">
                                    @endif
                                </div>
                                <div>
                                    <p class="font-semibold">{{ $testimonial->user->name }}</p>
                                    <p class="text-sm text-obito-text-secondary">{{ $testimonial->user->occupation }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection