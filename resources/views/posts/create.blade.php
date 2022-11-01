@extends('layouts.main')

@section('content')
    <section class="mt-6 mx-8">
        <h1 class="text-3xl mb-6">
            เขียนรายงานใหม่
        </h1>

        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="relative z-0 mb-6 w-full group">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    หัวข้อ
                </label>
                @if ($errors->has('title'))
                    <p class="text-red-600">
                        {{ $errors->first('title') }}
                    </p>
                @endif
                <input type="text" name="title" id="title"
                       class="bg-gray-50 border @error('title') border-red-600 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ old('title') }}"
                       placeholder="" required>
            </div>

            <div class="relative z-0 mb-6 w-full group">
                <label for="tags" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    ปัญหานี้เกี่ยวข้องกับเรื่องอะไรบ้าง (ใส่ได้มากกว่า 1 หัวข้อโดยแบ่งระหว่างหัวข้อด้วยลูกน้ำ `,`)
                </label>
                <input type="text" name="tags" id="tags"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ old('tags') }}"
                       placeholder="" autocomplete="off" required>
            </div>

            <label for="organization" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">เลือกหน่วยงานที่ต้องการให้รับผิดชอบรายงานนี้</label>
            <select name="organization" id="organization" class="mb-6 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach(\App\Models\Organization::get() as $organization)
                    <option value="{{ $organization->id }}">{{ $organization->name }}</option>
                @endforeach
            </select>

            <div class="relative z-0 mb-6 w-full group">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">
                   รายละเอียด
                </label>
                @error('description')
                    <p class="text-red-600">
                        {{ $message }}
                    </p>
                @enderror
                <textarea rows="4" type="text" name="description" id="description"
                       class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                          required >{{ old('description') }}</textarea>
            </div>
           
        <div>
                <button class="app-button" type="submit">ส่ง</button>
            </div>
        
        </form>
    
    </section>

@endsection
