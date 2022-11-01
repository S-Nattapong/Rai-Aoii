{{-- resources/views/posts/show.blade.php --}}
@extends('layouts.main')

@section('content')
    <article class="mt-6 mx-8">
        <h1 class="text-3xl mb-1">
            {{ $post->title }}
        </h1>

        {{--<p>
            รายงานโดย {{ $post->user->name }}
        </p>--}}

        <div class="mb-4 justify-center items-center">
{{--            <p class="bg-orange-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2">
                <svg class="w-6 h-6 inline mr-1" viewBox="0 0 20 20">
                    <path d="M10,6.978c-1.666,0-3.022,1.356-3.022,3.022S8.334,13.022,10,13.022s3.022-1.356,3.022-3.022S11.666,6.978,10,6.978M10,12.267c-1.25,0-2.267-1.017-2.267-2.267c0-1.25,1.016-2.267,2.267-2.267c1.251,0,2.267,1.016,2.267,2.267C12.267,11.25,11.251,12.267,10,12.267 M18.391,9.733l-1.624-1.639C14.966,6.279,12.563,5.278,10,5.278S5.034,6.279,3.234,8.094L1.609,9.733c-0.146,0.147-0.146,0.386,0,0.533l1.625,1.639c1.8,1.815,4.203,2.816,6.766,2.816s4.966-1.001,6.767-2.816l1.624-1.639C18.536,10.119,18.536,9.881,18.391,9.733 M16.229,11.373c-1.656,1.672-3.868,2.594-6.229,2.594s-4.573-0.922-6.23-2.594L2.41,10l1.36-1.374C5.427,6.955,7.639,6.033,10,6.033s4.573,0.922,6.229,2.593L17.59,10L16.229,11.373z"></path>
                </svg>
                {{ $post->view_count }} views
            </p>

            <label class="switch">
                <input type="checkbox">
                <span class="slider round"></span>
            </label>--}}           


            <p class="mt-2 bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2">
                @if($post->status === "Waiting")
                    <span style="color: #B9B9B9" class="material-symbols-outlined">radio_button_checked</span>
                @elseif($post->status === "Received")
                    <span style="color: black" class="material-symbols-outlined">radio_button_checked</span>
                @elseif($post->status === "Progress")
                    <span style="color: #f6bf00" class="material-symbols-outlined">radio_button_checked</span>
                @elseif($post->status === "Completed")
                    <span style="color: #5fdc3b" class="material-symbols-outlined">radio_button_checked</span>
                @else
                    <span style="color: red" class="material-symbols-outlined">radio_button_checked</span>
                @endif
                &nbsp;สถานะ: {{ $post->statusTranslator() }}
            </p>
        </div>


        <p class="text-gray-900 font-normal p-2 mb-8">
            {{ $post->description }}
        </p>

        @if(!is_null($post->picture_path))
            <div class="relative flex items-center justify-center">
                <img class="max-w-lg h-auto rounded-lg" src="{{ asset('storage/' . $post->picture_path) }}" alt="picture not load">
            </div>
        @endif
    </article>

    @can('is_your_duty', $post)
    <section class="mt-8 mx-16">
        <div class="relative py-4">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-b border-gray-300"></div>
            </div>
            <div class="relative flex justify-center">
                <span class="bg-white px-4 text-sm text-gray-500">ดำเนินการ</span>
            </div>
        </div>
        <div class="relative z-0 p-2 w-full group">
            <label for="contact" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                ช่องทางการติดต่อ
            </label>
            @if ($errors->has('title'))
                <p class="text-red-600">
                    {{ $errors->first('title') }}
                </p>
            @endif
            <input type="text" name="contact" id="contact" value="{{ $post->user->email }}" disabled
                   class="bg-gray-50 border @error('title') border-red-600 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
        </div>
        <form action="{{ route('posts.status.update', ['post' => $post->id]) }}" method="post">
            @csrf
            {{--                @method('PUT')--}}
            <div class="p-2 rounded">
                <div class="grid grid-cols-2 gap-1">
                    <label for="countries" class="col-span-2 mx-4 block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400"></label>
                    <select name="status" id="status" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        {{--                        <option value="Default" selected>เลือกสถานะ</option>--}}
                        <option value="{{ $post->status }}" selected>{{ $post->status }}</option>
                        @foreach(\array_diff(array("Waiting", "Received", "Progress", "Completed", "Return"), array( $post->status ) ) as $status)
                            <option value="{{ $status }}">{{ $status }}</option>
                        @endforeach
                        {{--                        <option value="Waiting" selected>รอรับเรื่อง</option>--}}
                        {{--                        <option value="Received">รับเรื่องแล้ว</option>--}}
                        {{--                        <option value="Progress">กำลังดำเนินการ</option>--}}
                        {{--                        <option value="Completed">ดำเนินการเสร็จสิ้น</option>--}}
                        {{--                        <option value="Return">ถูกตีกลับ</option>--}}
                    </select>
                    <select name="organization" id="organization" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="{{ $post->organization->id }}" selected>{{ $post->organization->name }}</option>
                        @foreach(\App\Models\Organization::get() as $organization)
                            <option value="{{ $organization->id }}">{{ $organization->name }}</option>
                        @endforeach
                    </select>
                </div>
                {{--                    <button type="button" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Cyan to Blue</button>--}}
                <button class="app-button mt-4" type="submit">แก้ไขสถานะ</button>
            </div>
            {{--                <p class="mt-4 bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2">--}}
            {{--                    <span style="color: green" class="material-symbols-outlined md-18">adjust</span>--}}
            {{--                    &nbsp;status: {{ $post->status }}--}}
            {{--                </p>--}}
        </form>
    </section>
    @endcan

    

    @can('update', $post)
        <section class="mt-8 mx-8 mb-6">
            <div class="relative py-4">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-b border-gray-300"></div>
                </div>
                <!-- <div class="relative flex justify-center">
                    <span class="bg-white px-4 text-sm text-gray-500">ตัวเลือกเพิ่มเติม</span>
                </div> -->
            </div>

            <!-- <div class="mb-6">
                <a class="app-button" href="{{ route('posts.edit', ['post' => $post->id]) }}">
                    แก้ไขรายงาน
                </a>
            </div> -->
        </section>
    @endcan

@endsection
