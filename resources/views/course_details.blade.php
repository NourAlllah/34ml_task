<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="course_div">
                <img src="{{ asset($course->image_url) }}" alt="course" class="course_img">
                <h2 class="course_title">{{ $course->title }}</h2>
                <p class="course_description">{{ $course->description }}</p>
            </div>

            <strong class="course_lessons">course lessons</strong> 

            @foreach ($lessons as $lesson)
                <div class="lesson_div">
                    <div>
                        <h4 class="lesson_title">
                            {{ $lesson->title }}
                        </h4>
                        <p class="lesson_description">
                            {{ $lesson->content }} ( {{ $course->title }} )
                        </p>
                    </div>
                    <button class="watch_button">Watch now</button>
                </div>
            @endforeach
            
            
        </div>
    </div>
</x-app-layout>