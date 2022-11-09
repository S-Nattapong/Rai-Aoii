@extends('layouts.main')
@section('content')
    <section class="p-10 mt-6 mx-72 bg-gray-100 rounded-lg shadow-lg">
        <div class="relative z-0 mb-6 w-full group">
            <h1 class="text-3xl mt-6">
                รายละเอียดอุปกรณ์ที่จะแก้ไข
            </h1>
        </div>
        <form action="{{ route('tools.show',['tool' => $tool])  }}" method="Post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="relative z-0 mb-6 w-full group">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    ชื่ออุปกรณ์
                </label>

                    <p class="text-red-600 min-h-[1em]">
                        @if ($errors->has('name'))
                        โปรดใส่ข้อมูลชื่ออุปกรณ์ให้ครบท้วนและมีตัวอักษรไม่เกิน 30 ตัวอักษร
                        @endif
                    </p>
                <input type="text" name="name" id="name" maxlength="30"
                       class="bg-white border @error('name') border-red-600 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ $tool->name }}"
                       placeholder="" required>
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    จำนวนอุปกรณ์
                </label>

                    <p class="text-red-600 min-h-[1em]">
                        @if ($errors->has('quantity'))
                        โปรดใส่ให้ครบท้วนและใส่ได้ไม่เกิน 99999
                        @endif
                    </p>

                <input name="quantity" id="quantity" type="text" disabled
                       class="bg-white border @error('quantity') border-red-600 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ $tool->quantity }}"
                       placeholder="" required>
            </div>

            <div class="relative z-0 mb-6 w-full group">
                <label for="type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    ประเภทอุปกรณ์
                </label>
                <div class="relative z-0 mb-6 w-full group">
                    <select name="type" id="type"
                            class="w-full bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="{{ $tool->type }}" selected>{{ $tool->typeTranslator($tool->type) }}</option>
                        @foreach(\array_diff(array("fertilizer","pesticide","herbicide","etc.."), array( $tool->type ) ) as $type)
                            <option value="{{ $type }}">{{ $tool->typeTranslator($type) }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="app-button mt-4" type="submit">แก้ไขอุปกรณ์</button>
            </div>
        </form>
    </section>
@endsection
