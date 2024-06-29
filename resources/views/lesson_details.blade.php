<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div>
                    <h4 class="lesson_title">
                        {{ $lesson->title }}
                    </h4>
                    <p class="lesson_description">
                        {{ $lesson->content }} 
                    </p>
                </div>

                @if (session('status') !== null)
                    @if (session('status') === true)
                        <div class="lesson_div">
                            {{ session('message') }}
                        </div> 
                        {{-- <div class="alert alert-success">
                            {{ session('message') }}
                        </div> --}}

                        <div class="input_comment">
                            <input type="text" placeholder="Your comments matter...">
                        </div>

                        
                    @else
                        <div class="lesson_div">
                            {{ session('message') }}
                        </div> 
                        {{-- <div class="alert alert-warning">
                            {{ session('message') }}
                        </div> --}}
                    @endif
                @endif
                {{-- --}}
            
                
        </div>
    </div>
</x-app-layout>