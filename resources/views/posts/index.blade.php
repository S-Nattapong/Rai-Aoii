{{-- resources/views/posts/index.blade.php --}}
@extends('layouts.main')

@section('content')
    <section class="mx-8">
        <h1 class="text-3xl mx-4 mt-6">
            ข้อเสนอ
        </h1>
        <div class="my-1 px-8 py-2 flex flex-wrap justify-between space-y-6">
            @foreach($posts->sortByDesc('like_count') as $post)
                <a href="{{ route('posts.show', ['post' => $post->id]) }}"
                   class="relative block p-6 w-full bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 ">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">
                        {{ $post->title }}
                        <p class="absolute right-4 mt-2 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2">
                        &nbsp;สถานะ: {{ $post->statusTranslator() }}&nbsp;
                        @if($post->status === "Waiting")
                            <span style="color: #B9B9B9" class="material-symbols-outlined">radio_button_checked</span>
                        @elseif($post->status === "Progress")
                            <span style="color: #f6bf00" class="material-symbols-outlined">radio_button_checked</span>
                        @elseif($post->status === "Completed")
                            <span style="color: #5fdc3b" class="material-symbols-outlined">radio_button_checked</span>
                        @else
                            <span style="color: red" class="material-symbols-outlined">radio_button_checked</span>
                        @endif
                    </p>
                    </h5>
                    <p class="mb-2">
                        ข้อเสนอโดย  {{ $post->user->name }}
                    </p>
                </a>
            @endforeach
        </div>
    </section>
@endsection
