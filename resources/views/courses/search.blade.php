@extends('front.layouts.app')
@section('title', 'Search Courses - Tivio Academy')
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
    <li class="group">
      <a href="{{ route('dashboard') }}" class="flex items-center gap-2 rounded-full border border-obito-grey py-2 px-[14px] hover:border-obito-green bg-white transition-all duration-300 group-[.active]:bg-obito-light-green group-[.active]:border-obito-light-green">
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
<main class="flex flex-col gap-10 pb-10 mt-[50px]">
  <div class="flex flex-col items-center gap-[10px] max-w-[500px] w-full mx-auto">
    <p class="flex items-center gap-[6px] w-fit rounded-full py-2 px-[14px] bg-obito-light-green">
      <img src="{{ asset('assets/images/icons/crown-green.svg') }}" class="flex shrink-0 w-5" alt="icon">
      <span class="font-bold text-sm">GROW CAREER</span>
    </p>
    <h1 class="font-bold text-[28px] leading-[42px] text-center">Explore Our Greatest Courses</h1>
    <form method="GET" action="{{ route('dashboard.search.courses') }}" class="relative ">
      <label class="group">
        <input type="text" name="search" id="" class="appearance-none outline-none ring-1 ring-obito-grey rounded-full w-[550px] py-[14px] px-5 bg-white font-bold placeholder:font-normal placeholder:text-obito-text-secondary group-focus-within:ring-obito-green transition-all duration-300 pr-[50px]" placeholder="Search course by name">
        <button type="submit" class="absolute right-0 top-0 h-[52px] w-[52px] flex shrink-0 items-center justify-center">
          <img src="{{ asset('assets/images/icons/search-normal-green-fill.svg') }}" class="flex shrink-0 w-10 h-10" alt="">
        </button>
      </label>
    </form>
  </div>
  <section id="result" class="flex flex-col w-full max-w-[1280px] px-[75px] gap-5 mx-auto">
    <h2 class="font-bold text-[22px] leading-[33px]">Search Result: JavaScript</h2>
    <div id="result-list" class="tab-content grid grid-cols-4 gap-5">
      
        @forelse($courses as $course)
          <x-course-card :course="$course" />
        @empty
          <p>No course available in this keyword</p> 
        @endforelse

    </div>
  </section>
</main>
@endsection

@push('after-scripts')
  <script src="{{ asset('js/dropdown-navbar.js') }}"></script>
@endpush