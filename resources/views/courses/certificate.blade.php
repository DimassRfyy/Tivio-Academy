<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download Certificate</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white text-[#2f6a62]">
    <div id="backgroundImage" class="absolute top-0 left-0 right-0">
        <img src="{{ asset('assets/images/backgrounds/learning-finished.png') }}" alt="image"
            class="h-[777px] object-cover object-bottom w-full" />
    </div>
    <div class="min-h-screen flex justify-center items-center px-4 relative">
        <div class="w-full max-w-lg bg-white border border-gray-300 rounded-[20px] p-6">
            <div class="mx-auto flex flex-col gap-[10px] items-center mb-10">
                <h1 class="text-center font-bold text-[28px] leading-[42px]">Congratulations!<br>Download Your
                    Certificate 🎉</h1>
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

            <div class="text-center">
                <h1 class="text-2xl font-bold mb-4">Download Your Certificate</h1>
                <p class="text-gray-600 mb-6">Congratulations on completing the course! You can download your
                    certificate below.</p>
                <a href=""
                    class="inline-block bg-[#2f6a62] text-white py-3 px-6 rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-[#2f6a62] focus:ring-offset-2 mb-4">
                    Download Certificate
                </a>
                <a href="{{ route('dashboard') }}"
                    class="inline-block bg-white border border-[#2f6a62] text-[#2f6a62] py-3 px-6 rounded-lg hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-[#2f6a62] focus:ring-offset-2">
                    Explore Courses
                </a>
            </div>

        </div>
    </div>
</body>

</html>