<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Testimonial</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white text-[#2f6a62]">
    <div id="backgroundImage" class="absolute top-0 left-0 right-0">
        <img src="{{ asset('assets/images/backgrounds/learning-finished.png') }}" alt="image"
            class="h-[777px] object-cover object-bottom w-full" />
    </div>
    <div class="min-h-screen relative flex justify-center items-center px-4">
        <div class="w-full max-w-lg bg-white border border-gray-300 rounded-[20px] p-6">
            <div class="mx-auto flex flex-col gap-[10px] items-center mb-10">
                <h1 class="text-center font-bold text-[28px] leading-[42px]">Share Your Experience!!<br>Give Your
                    Rating💕</h1>
            </div>

            <div id="card"
                class="flex items-center pt-[10px] pb-[10px] pl-[10px] pr-4 border border-gray-300 rounded-[20px] gap-4 mb-6">
                <div
                    class="flex justify-center items-center overflow-hidden shrink-0 w-[180px] h-[130px] rounded-[14px]">
                    <img src="{{ Storage::url($course->thumbnail) }}" alt="image" class="w-full h-full object-cover" />
                </div>
                <div class="flex flex-col gap-[10px]">
                    <h2 class="font-bold text-xl">{{ $course->name }}</h2>
                    <div class="flex items-center gap-[6px]">
                        <img src="{{ asset('assets/images/icons/crown-green.svg') }}" alt="icon"
                            class="w-4 h-4 shrink-0" />
                        <p class="text-sm leading-[21px] text-gray-600">{{$course->category->name}}</p>
                    </div>
                    <div class="flex items-center gap-[6px]">
                        <img src="{{ asset('assets/images/icons/menu-board-green.svg') }}" alt="icon"
                            class="w-4 h-4 shrink-0" />
                        <p class="text-sm leading-[21px] text-gray-600">{{$course->content_count}} Lessons</p>
                    </div>
                </div>
            </div>

            <form method="POST" action="{{ route('dashboard.course.learning.testimonial.store', $course->slug) }}"
                class="space-y-6">
                @csrf
                <div>
                    <label for="rating" class="block text-sm font-medium text-gray-700">Your Rating</label>
                    <div id="rating" class="flex space-x-2 mt-2">
                        @for ($i = 1; $i <= 5; $i++)
                            <input type="radio" id="rating-{{ $i }}" name="rating" value="{{ $i }}" class="hidden peer">
                            <label for="rating-{{ $i }}" class="cursor-pointer text-gray-400 hover:text-[#2f6a62]">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"
                                    class="w-6 h-6">
                                    <path
                                        d="M12 .587l3.668 7.425 8.207 1.192-5.938 5.782 1.404 8.184L12 18.896 5.659 23.17l1.404-8.184-5.938-5.782 8.207-1.192L12 .587z" />
                                </svg>
                            </label>
                        @endfor
                    </div>
                </div>

                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700">Your Feedback</label>
                    <textarea id="message" name="message" rows="4" required
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-[#2f6a62] focus:border-[#2f6a62]"></textarea>
                </div>

                <div>
                    <button type="submit"
                        class="w-full bg-[#2f6a62] text-white py-2 px-4 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-[#2f6a62] focus:ring-offset-2">
                        Submit Feedback
                    </button>
                </div>
            </form>

        </div>
    </div>
    <script>
        const ratingDiv = document.getElementById('rating');
        const radios = ratingDiv.querySelectorAll('input[type="radio"]');
        const labels = ratingDiv.querySelectorAll('label');

        radios.forEach((radio, index) => {
            radio.addEventListener('change', () => {
                labels.forEach((label, i) => {
                    // Change color for all labels up to the selected one
                    label.style.color = i <= index ? '#2f6a62' : 'gray';
                });
            });
        });
    </script>
</body>

</html>