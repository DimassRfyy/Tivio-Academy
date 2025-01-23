@extends('front.layouts.app')
@section('title', 'Course Detail - Tivio Academy')
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
<main class="flex flex-col gap-[30px] pb-10 mt-[30px]">
  <header class="flex items-center w-full max-w-[1000px] rounded-[20px] border border-obito-grey p-5 gap-[30px] bg-white mx-auto">
    <div id="thumbnail-container" class="flex relative w-[500px] h-[350px] shrink-0 rounded-[14px] overflow-hidden bg-obito-grey">
      <img src="{{ Storage::url($course->thumbnail) }}" class="w-full h-full object-cover" alt="thumbnail">
      <p class="absolute bottom-[10px] left-[10px] z-10 w-fit h-fit flex flex-col items-center rounded-[14px] py-[6px] px-[10px] bg-white gap-0.5 z-10">
        <img src="{{ asset('assets/images/icons/like.svg') }}" class="w-5 h-5" alt="icon">
        <span class="font-semibold text-xs">4.8</span>
      </p>
      <button type="button" class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 z-10">
        <img src="{{ asset('assets/images/icons/video-circle-green-fill.svg') }}" class="flex w-[60px] h-[60px] shrink-0" alt="icon">
      </button>
    </div>
    <div id="course-info" class="flex flex-col justify-center gap-[30px]">
      <div class="flex flex-col gap-[10px]">
        @if ($course->is_popular)
        <p id="badge" class="flex items-center bg-custom-gradient gap-[6px] rounded-[14px] py-[6px] px-2 w-fit">
          <img src="{{ asset('assets/images/icons/cup-white.svg') }}" class="w-5 flex shrink-0" alt="icon">
          <span class="font-semibold text-xs text-white">This Course is Popular This Year</span>
        </p>
        @endif
        <h1 class="font-bold text-[28px] leading-[42px]">{{ $course->name }}</h1>
      </div>
      <div class="flex flex-col gap-4">
        <div class="flex gap-4 items-center">
          <p class="flex items-center gap-[6px]">
            <img src="{{ asset('assets/images/icons/crown-green.svg') }}" class="w-6 flex shrink-0" alt="icon">
            <span class="font-semibold text-sm leading-[21px]">{{ $course->category->name }}</span>
          </p>
          <p class="flex items-center gap-[6px]">
            <img src="{{ asset('assets/images/icons/menu-board-green.svg') }}" class="w-6 flex shrink-0" alt="icon">
            <span class="font-semibold text-sm leading-[21px]">{{ $course->content_count }} Lessons</span>
          </p>
        </div>
        <div class="flex gap-4 items-center">
          <p class="flex items-center gap-[6px]">
            <img src="{{ asset('assets/images/icons/briefcase-green.svg') }}" class="w-6 flex shrink-0" alt="icon">
            <span class="font-semibold text-sm leading-[21px]">Ready to Work</span>
          </p>
          <p class="flex items-center gap-[6px]">
            <img src="{{ asset('assets/images/icons/briefcase-green.svg') }}" class="w-6 flex shrink-0" alt="icon">
            <span class="font-semibold text-sm leading-[21px]">Beginner Level</span>
          </p>
        </div>
      </div>
      <div class="flex items-center gap-3">
        <a href="{{ route('dashboard.course.join', $course->slug) }}" class="rounded-full py-[10px] px-5 gap-[10px] bg-obito-green hover:drop-shadow-effect transition-all duration-300">
          <span class="font-semibold text-white">Start Learning Now</span>
        </a>
        <a href="#" class="rounded-full border border-obito-grey py-[10px] px-5 gap-[10px] bg-white hover:border-obito-green transition-all duration-300">
          <span class="font-semibold">Add to Bookmark</span>
        </a>
      </div>
    </div>
  </header>
  <section id="details" class="flex flex-col w-full max-w-[1000px] gap-4 mx-auto">
    <h2 class="font-bold text-[22px] leading-[33px]">Upgrade Your Skills</h2>
    <div id="contents" class="flex flex-col gap-5">
      <div id="tabs-container" class="flex items-center gap-3">
        <button type="button" class="tab-btn group active" data-target="about-content">
          <p class="rounded-full border border-obito-grey py-2 px-4 hover:border-obito-green bg-white transition-all duration-300 group-[.active]:bg-obito-black">
            <span class="font-semibold group-[.active]:text-white">About</span>
          </p>
        </button>
        <button type="button" class="tab-btn group" data-target="lessons-content">
          <p class="rounded-full border border-obito-grey py-2 px-4 hover:border-obito-green bg-white transition-all duration-300 group-[.active]:bg-obito-black">
            <span class="font-semibold group-[.active]:text-white">Lessons</span>
          </p>
        </button>
        <button type="button" class="tab-btn group" data-target="testimonials-content">
          <p class="rounded-full border border-obito-grey py-2 px-4 hover:border-obito-green bg-white transition-all duration-300 group-[.active]:bg-obito-black">
            <span class="font-semibold group-[.active]:text-white">Testimonials</span>
          </p>
        </button>
        <button type="button" class="tab-btn group" data-target="example">
          <p class="rounded-full border border-obito-grey py-2 px-4 hover:border-obito-green bg-white transition-all duration-300 group-[.active]:bg-obito-black">
            <span class="font-semibold group-[.active]:text-white">Portfolios</span>
          </p>
        </button>
        <button type="button" class="tab-btn group" data-target="example">
          <p class="rounded-full border border-obito-grey py-2 px-4 hover:border-obito-green bg-white transition-all duration-300 group-[.active]:bg-obito-black">
            <span class="font-semibold group-[.active]:text-white">Rewards</span>
          </p>
        </button>
      </div>
      <div id="tabs-content-container">
        <div id="about-content" class="tab-content flex flex-col gap-[30px]">
          <div id="description" class="flex flex-col gap-4 leading-7 w-full max-w-[844px]">
            <p>
              {{ $course->about }}
            </p>
          </div>
          <div id="what-you-learn" class="flex flex-col gap-4">
            <h3 class="font-semibold text-lg">What Will You Learn</h3>
            <div class="grid grid-cols-2 gap-x-[30px] gap-y-4 w-full max-w-[700px]">

              @foreach($course->benefits as $benefit)
              <div class="flex items-center gap-3">
                <img src="{{ asset('assets/images/icons/tick-circle-green-fill.svg') }}" class="w-6 flex shrink-0" alt="icon">
                <p>{{ $benefit->name }}</p>
              </div>
              @endforeach

            </div>
          </div>
          <div id="instructors" class="flex flex-col w-full max-w-[900px] rounded-[20px] border border-obito-grey p-5 gap-4 bg-white">
            <h3 class="font-semibold text-lg">Course Instructors</h3>
            <div class="grid grid-cols-2 gap-5">

              @foreach($course->courseMentors as $mentor)
              <div class="instructors-card flex flex-col rounded-[20px] border border-obito-grey p-5 gap-4 bg-white">
                <div class="flex items-center justify-between">
                  <div class="flex items-center gap-3">
                    <div class="flex w-[50px] h-[50px] shrink-0 rounded-full overflow-hidden">
                      <img src="{{ Storage::url($mentor->mentor->photo) }}" class="w-full h-full object-cover" alt="photo">
                    </div>
                    <div>
                      <p class="font-semibold">{{ $mentor->mentor->name }}</p>
                      <p class="text-sm text-obito-text-secondary">{{ $mentor->mentor->occupation }}</p>
                    </div>
                  </div>
                  <div class="flex items-center">
                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-5 flex shrink-0" alt="icon">
                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-5 flex shrink-0" alt="icon">
                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-5 flex shrink-0" alt="icon">
                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-5 flex shrink-0" alt="icon">
                    <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-5 flex shrink-0" alt="icon">
                  </div>
                </div>
                <hr class="border-obito-grey">
                <p class="leading-7">{{ $mentor->about }}</p>
              </div>
              @endforeach

            </div>
          </div>
        </div>
        <div id="lessons-content" class="tab-content flex flex-col gap-5 w-full max-w-[650px] hidden">

          @foreach($course->courseSections as $section)
          <div class="accordion flex flex-col gap-4 rounded-[20px] border border-obito-grey p-5 bg-white">
            <button type="button" id="accordion-btn" data-expand="{{ $section->id }}" class="flex items-center justify-between">
              <p class="font-semibold text-lg">{{ $section->name }}</p>
              <img src="{{ asset('assets/images/icons/arrow-circle-down.svg') }}" alt="icon" class="size-6 shrink-0 transition-all duration-300 -rotate-180" />
            </button>
            <div id="{{ $section->id }}" class="">
              <div class="flex flex-col gap-4">

                @foreach($section->sectionContents as $content)
                <div class="flex items-center rounded-[50px] gap-[10px] border border-obito-grey py-3 px-4 bg-white">
                  <img src="{{ asset('assets/images/icons/menu-board.svg') }}" class="size-6 flex shrink-0" alt="icon">
                  <p class="font-semibold">{{$content->name}}</p>
                </div>
                @endforeach
                
              </div>
            </div>
          </div>
          @endforeach
          
        </div>
        <div id="testimonials-content" class="tab-content grid grid-cols-2 w-full max-w-[860px] gap-5 hidden">
          <div class="testimonial-card flex flex-col rounded-[20px] border border-obito-grey p-5 gap-4 bg-white">
            <div class="flex items-center">
              <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-5 flex shrink-0" alt="icon">
              <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-5 flex shrink-0" alt="icon">
              <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-5 flex shrink-0" alt="icon">
              <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-5 flex shrink-0" alt="icon">
              <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-5 flex shrink-0" alt="icon">
            </div>
            <p class="leading-7">Asik banget belajar di sini dapat contoh kasus sesuai kebutuhan perusahaan saat ini proses adaptasi jadi lebih cepat dan produktif.</p>
            <div class="flex items-center gap-3">
              <div class="flex w-[50px] h-[50px] shrink-0 rounded-full overflow-hidden">
                <img src="{{ asset('assets/images/photos/sami.png') }}" class="w-full h-full object-cover" alt="photo">
              </div>
              <div>
                <p class="font-semibold">Angga Risky</p>
                <p class="text-sm text-obito-text-secondary">Full Stack Developer</p>
              </div>
            </div>
          </div>
          <div class="testimonial-card flex flex-col rounded-[20px] border border-obito-grey p-5 gap-4 bg-white">
            <div class="flex items-center">
              <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-5 flex shrink-0" alt="icon">
              <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-5 flex shrink-0" alt="icon">
              <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-5 flex shrink-0" alt="icon">
              <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-5 flex shrink-0" alt="icon">
              <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-5 flex shrink-0" alt="icon">
            </div>
            <p class="leading-7">Asik banget belajar di sini dapat contoh kasus sesuai kebutuhan perusahaan saat ini proses adaptasi jadi lebih cepat dan produktif.</p>
            <div class="flex items-center gap-3">
              <div class="flex w-[50px] h-[50px] shrink-0 rounded-full overflow-hidden">
                <img src="{{ asset('assets/images/photos/4thPerson.png') }}" class="w-full h-full object-cover" alt="photo">
              </div>
              <div>
                <p class="font-semibold">Angga Risky</p>
                <p class="text-sm text-obito-text-secondary">Full Stack Developer</p>
              </div>
            </div>
          </div>
          <div class="testimonial-card flex flex-col rounded-[20px] border border-obito-grey p-5 gap-4 bg-white">
            <div class="flex items-center">
              <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-5 flex shrink-0" alt="icon">
              <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-5 flex shrink-0" alt="icon">
              <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-5 flex shrink-0" alt="icon">
              <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-5 flex shrink-0" alt="icon">
              <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-5 flex shrink-0" alt="icon">
            </div>
            <p class="leading-7">Asik banget belajar di sini dapat contoh kasus sesuai kebutuhan perusahaan saat ini proses adaptasi jadi lebih cepat dan produktif.</p>
            <div class="flex items-center gap-3">
              <div class="flex w-[50px] h-[50px] shrink-0 rounded-full overflow-hidden">
                <img src="{{ asset('assets/images/photos/anggaphoto.png') }}" class="w-full h-full object-cover" alt="photo">
              </div>
              <div>
                <p class="font-semibold">Angga Risky</p>
                <p class="text-sm text-obito-text-secondary">Full Stack Developer</p>
              </div>
            </div>
          </div>
          <div class="testimonial-card flex flex-col rounded-[20px] border border-obito-grey p-5 gap-4 bg-white">
            <div class="flex items-center">
              <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-5 flex shrink-0" alt="icon">
              <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-5 flex shrink-0" alt="icon">
              <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-5 flex shrink-0" alt="icon">
              <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-5 flex shrink-0" alt="icon">
              <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-5 flex shrink-0" alt="icon">
            </div>
            <p class="leading-7">Asik banget belajar di sini dapat contoh kasus sesuai kebutuhan perusahaan saat ini proses adaptasi jadi lebih cepat dan produktif.</p>
            <div class="flex items-center gap-3">
              <div class="flex w-[50px] h-[50px] shrink-0 rounded-full overflow-hidden">
                <img src="{{ asset('assets/images/photos/sami.png') }}" class="w-full h-full object-cover" alt="photo">
              </div>
              <div>
                <p class="font-semibold">Angga Risky</p>
                <p class="text-sm text-obito-text-secondary">Full Stack Developer</p>
              </div>
            </div>
          </div>
          <div class="testimonial-card flex flex-col rounded-[20px] border border-obito-grey p-5 gap-4 bg-white">
            <div class="flex items-center">
              <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-5 flex shrink-0" alt="icon">
              <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-5 flex shrink-0" alt="icon">
              <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-5 flex shrink-0" alt="icon">
              <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-5 flex shrink-0" alt="icon">
              <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-5 flex shrink-0" alt="icon">
            </div>
            <p class="leading-7">Asik banget belajar di sini dapat contoh kasus sesuai kebutuhan perusahaan saat ini proses adaptasi jadi lebih cepat dan produktif.</p>
            <div class="flex items-center gap-3">
              <div class="flex w-[50px] h-[50px] shrink-0 rounded-full overflow-hidden">
                <img src="{{ asset('assets/images/photos/5thPerson.png') }}" class="w-full h-full object-cover" alt="photo">
              </div>
              <div>
                <p class="font-semibold">Angga Risky</p>
                <p class="text-sm text-obito-text-secondary">Full Stack Developer</p>
              </div>
            </div>
          </div>
          <div class="testimonial-card flex flex-col rounded-[20px] border border-obito-grey p-5 gap-4 bg-white">
            <div class="flex items-center">
              <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-5 flex shrink-0" alt="icon">
              <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-5 flex shrink-0" alt="icon">
              <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-5 flex shrink-0" alt="icon">
              <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-5 flex shrink-0" alt="icon">
              <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-5 flex shrink-0" alt="icon">
            </div>
            <p class="leading-7">Asik banget belajar di sini dapat contoh kasus sesuai kebutuhan perusahaan saat ini proses adaptasi jadi lebih cepat dan produktif.</p>
            <div class="flex items-center gap-3">
              <div class="flex w-[50px] h-[50px] shrink-0 rounded-full overflow-hidden">
                <img src="{{ asset('assets/images/photos/anggaphoto.png') }}" class="w-full h-full object-cover" alt="photo">
              </div>
              <div>
                <p class="font-semibold">Angga Risky</p>
                <p class="text-sm text-obito-text-secondary">Full Stack Developer</p>
              </div>
            </div>
          </div>
          <div class="testimonial-card flex flex-col rounded-[20px] border border-obito-grey p-5 gap-4 bg-white">
            <div class="flex items-center">
              <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-5 flex shrink-0" alt="icon">
              <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-5 flex shrink-0" alt="icon">
              <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-5 flex shrink-0" alt="icon">
              <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-5 flex shrink-0" alt="icon">
              <img src="{{ asset('assets/images/icons/Star 1.svg') }}" class="w-5 flex shrink-0" alt="icon">
            </div>
            <p class="leading-7">Asik banget belajar di sini dapat contoh kasus sesuai kebutuhan perusahaan saat ini proses adaptasi jadi lebih cepat dan produktif.</p>
            <div class="flex items-center gap-3">
              <div class="flex w-[50px] h-[50px] shrink-0 rounded-full overflow-hidden">
                <img src="{{ asset('assets/images/photos/3rdPerson.png') }}" class="w-full h-full object-cover" alt="photo">
              </div>
              <div>
                <p class="font-semibold">Angga Risky</p>
                <p class="text-sm text-obito-text-secondary">Full Stack Developer</p>
              </div>
            </div>
          </div>
        </div>
        <div id="example" class="tab-content hidden">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic, sapiente?</p>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection

@push('after-scripts')
<script src="{{ asset('js//dropdown-navbar.js') }}"></script>
<script src="{{ asset('js//tabs.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="{{ asset('js//accordion.js') }}"></script>
@endpush