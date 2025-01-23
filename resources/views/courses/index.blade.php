@extends('front.layouts.app')
@section('title', 'My Courses - Tivio Academy')
@section('content')
<x-navigation-auth />
<nav id="bottom-nav" class="flex w-full bg-white border-b border-obito-grey py-[14px]">
    <ul class="flex w-full max-w-[1280px] px-[75px] mx-auto gap-3">
        <li class="group">
            <a href="#" class="flex items-center gap-2 rounded-full border border-obito-grey py-2 px-[14px] hover:border-obito-green bg-white transition-all duration-300 group-[.active]:bg-obito-light-green group-[.active]:border-obito-light-green">
                <img src="{{ asset('assets/images/icons/home-trend-up.svg') }}" class="flex shrink-0 w-5" alt="icon">
                <span>Overview</span>
            </a>
        </li>
        <li class="group active">
            <a href="#" class="flex items-center gap-2 rounded-full border border-obito-grey py-2 px-[14px] hover:border-obito-green bg-white transition-all duration-300 group-[.active]:bg-obito-light-green group-[.active]:border-obito-light-green">
                <img src="{{ asset('assets/images/icons/note-favorite.svg') }}" class="flex shrink-0 w-5" alt="icon">
                <span>Courses</span>
            </a>
        </li>
        <li class="group">
            <a href="#" class="flex items-center gap-2 rounded-full border border-obito-grey py-2 px-[14px] hover:border-obito-green bg-white transition-all duration-300 group-[.active]:bg-obito-light-green group-[.active]:border-obito-light-green">
                <img src="{{ asset('assets/images/icons/message-programming.svg') }}" class="flex shrink-0 w-5" alt="icon">
                <span>Quizzess</span>
            </a>
        </li>
        <li class="group">
            <a href="#" class="flex items-center gap-2 rounded-full border border-obito-grey py-2 px-[14px] hover:border-obito-green bg-white transition-all duration-300 group-[.active]:bg-obito-light-green group-[.active]:border-obito-light-green">
                <img src="{{ asset('assets/images/icons/cup.svg') }}" class="flex shrink-0 w-5" alt="icon">
                <span>Certificates</span>
            </a>
        </li>
        <li class="group">
            <a href="#" class="flex items-center gap-2 rounded-full border border-obito-grey py-2 px-[14px] hover:border-obito-green bg-white transition-all duration-300 group-[.active]:bg-obito-light-green group-[.active]:border-obito-light-green">
                <img src="{{ asset('assets/images/icons/ruler&pen.svg') }}" class="flex shrink-0 w-5" alt="icon">
                <span>Portfolios</span>
            </a>
        </li>
    </ul>
</nav>
<main class="flex flex-col gap-10 pb-10 mt-[30px]">
    <section id="roadmap" class="flex flex-col w-full max-w-[1280px] px-[75px] gap-4 mx-auto">
        <h2 class="font-bold text-[22px] leading-[33px]">Popular Roadmap</h2>
        <div class="grid grid-cols-2 gap-5">
            <a href="#" class="card">
                <div class="roadmap-card flex items-center rounded-[20px] border border-obito-grey p-[10px] pr-4 gap-4 bg-white hover:border-obito-green transition-all duration-300">
                    <div class="relative flex shrink-0 w-[240px] h-[150px] rounded-[14px] overflow-hidden bg-obito-grey">
                        <img src="{{ asset('assets/images/thumbnails/thumbnail-1.png') }}" class="w-full h-full object-cover" alt="thumbnail">
                        <p class="absolute flex m-[10px] bottom-0 w-[calc(100%-20px)] items-center gap-0.5 bg-white rounded-[14px] py-[6px] px-2">
                            <img src="{{ asset('assets/images/icons/cup.svg') }}" class="flex shrink-0 w-5" alt="icon">
                            <span class="font-semibold text-xs leading-[18px]">Featured In AI Industry Digital</span>
                        </p>
                    </div>
                    <div class="flex flex-col gap-3">
                        <h3 class="font-bold text-lg line-clamp-2">Full-Stack Sr. Website JavaScript Developer 2025</h3>
                        <p class="flex items-center gap-[6px]">
                            <img src="{{ asset('assets/images/icons/briefcase-green.svg') }}" class="flex shrink-0 w-5" alt="icon">
                            <span class="text-sm text-obito-text-secondary">Rp 125.500.000/year</span>
                        </p>
                        <p class="flex items-center gap-[6px]">
                            <img src="{{ asset('assets/images/icons/menu-board-green.svg') }}" class="flex shrink-0 w-5" alt="icon">
                            <span class="text-sm text-obito-text-secondary">18,498 Courses</span>
                        </p>
                    </div>
                </div>
            </a>
            <a href="#" class="card">
                <div class="roadmap-card flex items-center rounded-[20px] border border-obito-grey p-[10px] pr-4 gap-4 bg-white hover:border-obito-green transition-all duration-300">
                    <div class="relative flex shrink-0 w-[240px] h-[150px] rounded-[14px] overflow-hidden bg-obito-grey">
                        <img src="{{ asset('assets/images/thumbnails/thumbnail-2.png') }}" class="w-full h-full object-cover" alt="thumbnail">
                        <p class="absolute flex m-[10px] bottom-0 w-[calc(100%-20px)] items-center gap-0.5 bg-white rounded-[14px] py-[6px] px-2">
                            <img src="{{ asset('assets/images/icons/cup.svg') }}" class="flex shrink-0 w-5" alt="icon">
                            <span class="font-semibold text-xs leading-[18px]">Featured In AI Industry Digital</span>
                        </p>
                    </div>
                    <div class="flex flex-col gap-3">
                        <h3 class="font-bold text-lg line-clamp-2">Digital Marketing Enterprise User Acquisitions Level</h3>
                        <p class="flex items-center gap-[6px]">
                            <img src="{{ asset('assets/images/icons/briefcase-green.svg') }}" class="flex shrink-0 w-5" alt="icon">
                            <span class="text-sm text-obito-text-secondary">Rp 125.500.000/year</span>
                        </p>
                        <p class="flex items-center gap-[6px]">
                            <img src="{{ asset('assets/images/icons/menu-board-green.svg') }}" class="flex shrink-0 w-5" alt="icon">
                            <span class="text-sm text-obito-text-secondary">18,498 Courses</span>
                        </p>
                    </div>
                </div>
            </a>
        </div>
    </section>
    <section id="catalog" class="flex flex-col w-full max-w-[1280px] px-[75px] gap-4 mx-auto">
        <h1 class="font-bold text-[22px] leading-[33px]">Course Catalog</h1>
        <div id="tabs-container" class="flex items-center gap-3">

            @foreach($coursesByCategory as $category => $courses )
            <button type="button" class="tab-btn group {{ $loop->first ? 'active' : '' }}" data-target="{{ Str::slug($category) }}-content">
                <p class="rounded-full border border-obito-grey py-2 px-4 hover:border-obito-green bg-white transition-all duration-300 group-[.active]:bg-obito-black">
                    <span class="group-[.active]:font-semibold group-[.active]:text-white">{{ $category }}</span>
                </p>
            </button>
            @endforeach

        </div>
        <div id="tabs-content-container" class="mt-1">
            @foreach ($coursesByCategory as $category => $courses)
            <div id="{{ Str::slug($category) }}-content" class="{{ $loop->first ? '' : 'hidden' }} tab-content grid grid-cols-4 gap-5">
                
                @forelse ($courses as $course)
                <x-course-card :course="$course"/>
                @empty
                <p>Belum ada kelas pada kategori ini</p>
                @endforelse

            </div>
            @endforeach
        </div>
    </section>
</main>


@endsection

@push('after-scripts')
<script src="{{ asset('js/dropdown-navbar.js') }}"></script>
<script src="{{ asset('js/tabs.js') }}"></script>
@endpush