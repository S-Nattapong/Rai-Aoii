@extends('layouts.main')

@section('content')

<section class="mt-6 mx-8">
        <h1 class="text-3xl mb-6">
            ลงทะเบียนอุปกรณ์
        </h1>
        
        
        <form action="{{ route('tools.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="relative z-0 mb-6 w-full group">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    ชื่ออุปกรณ์
                </label>
                @if ($errors->has('name'))
                    <p class="text-red-600">
                        {{ $errors->first('title') }}
                    </p>
                @endif
                <input type="text" name="name" id="name"
                       class="bg-gray-50 border @error('name') border-red-600 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ old('name') }}"
                       placeholder="" required>
            </div>


            <div class="relative z-0 mb-6 w-full group">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    จำนวน
                </label>
                @if ($errors->has('quantity'))
                    <p class="text-red-600">
                        {{ $errors->first('title') }}
                    </p>
                @endif
                <input type="number" name="quantity" type="number" id="quantity"
                       class="bg-gray-50 border @error('quantity') border-red-600 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ old('quantity') }}"
                       placeholder="" required>
            </div>


            <div class="relative z-0 mb-6 w-full group">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    ประเภทอุปกรณ์
                </label>
                @if ($errors->has('type'))
                    <p class="text-red-600">
                        {{ $errors->first('type') }}
                    </p>
                @endif

                <select type="text" name="type" id="type">
                    <option value="pesticide">pesticide</option>
                    <option value="fertilizer">fertilizer</option>
                    <option value="herbicide">herbicide</option>
                    <option value="etc..">etc..</option>
                </select>
               
            <div>
                <button class="app-button" type="submit">ส่ง</button>
            </div>
        
        </form>
    
    </section>


@endsection