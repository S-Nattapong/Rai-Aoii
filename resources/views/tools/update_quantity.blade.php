@extends('layouts.main')
@section('content')
    <section class="p-5 mt-6 mx-8 bg-slate-100 rounded-lg">
        <div class="relative z-0 mb-6 w-full group">
            <h1 class="text-3xl mx-4 mt-6">
                รายละเอียดอุปกรณ์ที่จะแก้ไข
            </h1>
        </div>
        <form action="{{ route('tools.update.history',['tool' => $tool])  }}" method="Post"
              enctype="multipart/form-data">
            @csrf
            @method('Post')
            <div class="relative z-0 mb-6 w-full group">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    ชื่ออุปกรณ์
                </label>
                @if ($errors->has('name'))
                    <p class="text-red-600">
                        {{ $errors->first('name') }}
                    </p>
                @endif
                <div class="relative z-0 mb-6 w-full group">
                    <input type="text" name="name" id="name" disabled
                           class="bg-gray-50 border @error('name') border-red-600 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           value="{{ $tool->name }}"
                           placeholder="" required>
                    <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        จำนวนอุปกรณ์
                    </label>
                    @if ($errors->has('quantity'))
                        <p class="text-red-600">
                            {{ $errors->first('quantity') }}
                        </p>
                    @endif
                    <input name="quantity" id="quantity" type="text" disabled
                           class="bg-gray-50 border @error('quantity') border-red-600 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           value="{{ $tool->quantity }}"
                           placeholder="" required>

                    <div class="relative z-0 mb-6 w-full group">
                        <label for="type" class="mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            ประเภทอุปกรณ์
                        </label>
                        @if ($errors->has('type'))
                            <p class="text-red-600">
                                {{ $errors->first('type') }}
                            </p>
                        @endif
                        <div class="relative z-0 mb-6 w-full group">
                            <input name="type" id="type" type="text" disabled
                                   class="bg-gray-50 border @error('type') border-red-600 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                   value="{{ $tool->typeTranslator($tool->type)}}"
                                   placeholder="" required>
                            </div>
                        </div>
                        <div class="relative z-0 mb-6 w-full group">
                            <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                ประเภทการอัพเดท
                            </label>
                            @if ($errors->has('status'))
                                <p class="text-red-600">
                                    โปรดระบุประเภทการอัพเดทให้ครบท้วน
                                </p>
                            @endif
                            <div class="relative z-0 mb-6 w-full group">
                                <select name="status" id="status"
                                        class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="" selected disabled>-</option>
                                    <option value="Increase">เพิ่มอุปกรณ์</option>
                                    <option value="Decrease">ใช้อุปกรณ์</option>
                                </select>
                            </div>
                            <div class="relative z-0 mb-6 w-full group">
                                <label for="current_quantity"
                                       class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                    จำนวนที่อัพเดทอุปกรณ์
                                </label>
                                @error('current_quantity')
                                <p class="text-red-600">อุปกรณ์ที่มีอยู่ในคลังจะต้องไม่น้อยกว่าจำนวนที่ถูกนำไปใช้</p>
                                @enderror
                                <div class="relative z-0 mb-6 w-full group">
                                    <input name="current_quantity" id="current_quantity" type="number" min="1" max="9999"
                                           class="bg-gray-50 border @error('current_quantity') border-red-600 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                           placeholder="" required>
                                </div>
                                <div class="relative z-0 mb-6 w-full group">
                                    <label for="description"
                                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        รายละเอียด
                                    </label>
                                    @if ($errors->has('description'))
                                        <p class="text-red-600">
                                            โปรดใส่ข้อมูลให้ครบท้วนและไม่เกิน 40 ตัวอักษร
                                        </p>
                                    @endif
                                    <div class="relative z-0 mb-6 w-full group">
                                        <input name="description" id="description" type="text" maxlength="50"
                                               class="bg-gray-50 border @error('description') border-red-600 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                               placeholder="" required>
                                    </div>
                                    <button class="app-button mt-4" type="submit">อัพเดทอุปกรณ์</button>
        </form>
    </section>
@endsection
