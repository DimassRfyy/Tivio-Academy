<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Services\CourseService;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //
    protected $courseService;

    public function __construct(
        CourseService $courseService,
    ) {
        $this->courseService = $courseService;
    }

    public function index()
    {
        $coursesByCategory = $this->courseService->getCoursesGroupedByCategory();

        return view('courses.index', compact('coursesByCategory'));
    }

    // public function index()  jika tidak menggunakan repositories pake ini
    // {
    //     $coursesByCategory = Course::with('category')
    //         ->latest()
    //         ->get()
    //         ->groupBy(function ($course) {
    //             return $course->category->name ?? 'Uncategorized';
    //         });
        
    //     return view('courses.index', compact('coursesBycategory'));
    // }

    public function details(Course $course)
    {   
        //eager loading
        $course->load([
            'category', 
            'benefits',
            'courseTestimonials.user',
            'courseSections.sectionContents',
            'courseMentors.mentor'
        ]);
        return view('courses.details', compact('course'));
    } 

    public function join(Course $course)
    {
        $studentName = $this->courseService->enrollUser($course);
        $firstSectionAndContent = $this->courseService->getFirstSectionAndContent($course);

        return view('courses.success_joined', array_merge(compact('course', 'studentName'), 
        $firstSectionAndContent
        ));
    }

    public function learning(Course $course, $contentSectionId, $sectionContentId)
    {
        $learningData = $this->courseService->getLearningData($course, $contentSectionId, $sectionContentId);

        return view('courses.learning', $learningData);
    }

    public function learning_finished(Course $course)
    {
        return view('courses.learning_finished', compact('course'));
    }

    public function testimonial(Course $course)
    {
        return view('courses.testimonial', compact('course'));
    }

    public function testimonial_store(Request $request, Course $course)
    {
    $request->validate([
        'rating' => 'required|integer|min:1|max:5',
        'message' => 'required|string',
    ]);

    $this->courseService->storeTestimonial($request->all(), $course);

    return redirect()->route('dashboard.course.learning.certificate', $course->slug);
    }

    public function certificate(Course $course)
    {
        return view('courses.certificate', compact('course'));
    }

    public function search_courses(Request $request)
    {
        $request->validate([
            'search' => 'required|string',
        ]);
        $keyword = $request->search;
        $courses = $this->courseService->searchCourses($keyword);

        return view('courses.search', compact('courses', 'keyword'));
    }


    // jika tidak menggunakan repositori pake ini
    // public function search_courses(Request $request)
    // {
    //     $request->validate([
    //         'search' => 'required|string',
    //     ]);
    //     $keyword = $request->search;
    //     $courses = Course::where('name', 'like', "%{$keyword}%")
    //         ->orWhere('about', 'like', "%{$keyword}%")
    //         ->get();
        
    //     return view('courses.search', compact('coruses', 'keyword'));
    // }
}
