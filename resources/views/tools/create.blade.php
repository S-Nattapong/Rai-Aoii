@extends('layouts.main')

@section('content')

    <section class="p-10 mt-6 mx-72 bg-gray-100 rounded-lg shadow-lg">
        <h1 class="text-3xl mb-6">
            ลงทะเบียนอุปกรณ์
        </h1>

        <form action="{{ route('tools.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <div class="relative z-0 mb-6 w-full group">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        ชื่ออุปกรณ์
                    </label>

                        <p class="text-red-600 min-h-[1em]">
                            @if ($errors->has('name'))
                            โปรดใส่ข้อมูลชื่ออุปกรณ์ให้ครบท้วนและใส่ได้ไม่กิน 30 ตัวอักษร
                            @endif
                        </p>


                    <input type="text" name="name" id="name" maxlength="30"
                           class="bg-white border @error('name') border-red-600 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           value="{{ old('name') }}"
                           placeholder="" required>
                </div>


                <div class="relative z-0 mb-6 w-full group">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        จำนวน
                    </label>
                        <p class="text-red-600 min-h-[1em]">
                            @if ($errors->has('quantity'))
                           โปรดระบุจำนวนให้ถูกต้อง
                            @endif
                        </p>
                    <input type="number" name="quantity" type="number" id="quantity" min="0" max="99999"
                           class="bg-white border @error('quantity') border-red-600 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           value="{{ old('quantity') }}"
                           placeholder="" required>
                </div>


                <div class="relative z-0 mb-6 w-full group">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        ประเภทอุปกรณ์
                    </label>

                        <p class="text-red-600 min-h-[1em]">
                            @if ($errors->has('type'))
                           โปรดเลือกประเภทให้ถูกต้อง
                            @endif
                        </p>


                    <div class="relative z-0 mb-6 w-full group">
                        <select name="type" id="type"
                                class="w-full bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="fertilizer">ปุ๋ย</option>
                            <option value="pesticide">ยาฆ่าแมลง</option>
                            <option value="herbicide">ยาฆ่าหญ้า</option>
                            <option value="etc..">อื่น ๆ</option>
                        </select>
                    </div>

                    <button class="app-button mt-4" type="submit">บันทึก</button>
                </div>
            </div>
        </form>

    </section>

@endsection
