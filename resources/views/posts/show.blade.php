{{-- resources/views/posts/show.blade.php --}}
@extends('layouts.main')

@section('content')
    <article class="mt-6 mx-8">
        <h1 class="text-3xl mb-1">
            หัวข้อข้อเสนอ :{{ $post->title }}
        </h1>

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
                &nbsp;สถานะข้อเสนอ: {{ $post->status }}
            </p>
        </div>

        <h1 class="text-2xl mb-1">
            ชื่อลูกค้า: {{ $post->user->name}}
        </h1>

        <h1 class="text-2xl mb-1">
            เบอร์โทรลูกค้า: {{ $post->user->phone_no}}
        </h1>

        <h1 class="text-2xl mb-1">
            เงินมัดจำ: {{ $post->deposit_money}}
        </h1>

        <h1 class="text-2xl mb-1">
            ราคาที่ตกลงกันไว้: {{ $post->deal_money}}
        </h1>

        <h1 class="text-2xl mb-1">
            ปริมาณที่ต้องการ: {{ $post->quantity}} ตัน
        </h1>

        <h1 class="text-2xl mb-1">
            วันที่ต้องการอ้อย: {{ $post->desired}}
        </h1>

        <h1 class="text-2xl mb-1">
            ที่อยู่: {{ $post->user->address}}
        </h1>

        @if(!is_null($post->reason) && ($post->status == "Completed" || $post->status == "Cancel"))
        <h1 class="text-2xl mb-1">
            เหตุผล (ผู้ผลิตตอบ): {{ $post->reason}}
        </h1>
        @endif

        @if(!is_null($post->picture_path))
            <div class="relative flex items-center justify-center">
                <img class="max-w-lg h-auto rounded-lg" src="{{ asset('storage/' . $post->picture_path) }}" alt="picture not load">
            </div>
        @endif
    </article>

    @can('is_admin',$post)
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
            @if ($errors->has('reason'))
                <p class="text-red-600">
                    {{ $errors->first('reason') }}
                </p>
                @endif
                    @if($post->status == "Progress")
                    <label for="reason" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        เหตุผล
                        </label>
                        <input type="text" name="reason" id="reason" value="{{old('reason')}}"
                        class="bg-gray-50 border @error('reason') border-red-600 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @elseif($post->status == "Completed" || $post->status == "Cancel")
                    <label for="reason" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        เหตุผล
                        </label>
                        <input type="text" name="reason" id="reason" value="{{ $post->reason }}" disabled
                        class="bg-gray-50 border @error('reason') border-red-600 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @endif
                    <div class="p-2"></div>
                    <label for="reason" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 ">
                        สถานะข้อเสนอ
                    </label>
                <div class="grid grid-cols-2 gap-1">
                    <select name="status" id="status" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        {{--                        <option value="Default" selected>เลือกสถานะ</option>--}}
                        <option value="{{ $post->status }}" selected>{{ $post->status }}</option>
                        @if($post->status === "Waiting")
                        @foreach(\array_diff(array("Waiting","Progress"), array( $post->status ) ) as $status)
                            <option value="{{ $status }}">{{ $status }}</option>
                        @endforeach
                        @elseif($post->status === "Progress")
                        @foreach(\array_diff(array("Completed", "Cancel"), array( $post->status ) ) as $status)
                            <option value="{{ $status }}">{{ $status }}</option>
                        @endforeach
                        @elseif($post->status === "Completed")
                        @foreach(\array_diff(array("Completed"), array( $post->status ) ) as $status)
                            <option value="{{ $status }}" disable>{{ $status }}</option>
                        @endforeach
                        @else
                        @foreach(\array_diff(array("Cancel"), array( $post->status ) ) as $status)
                            <option value="{{ $status }}" disable>{{ $status }}</option>
                        @endforeach
                        @endif
                    </select>
                </div>
                @if(!($post->status == "Completed" || $post->status == "Cancel"))
                {{--                    <button type="button" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Cyan to Blue</button>--}}
                <button class="app-button mt-4" type="submit">แก้ไขสถานะ</button>
                @endif
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
