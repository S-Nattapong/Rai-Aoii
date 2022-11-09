@extends('layouts.main')

@section('content')

    <section class="p-5 mt-6 mx-8 bg-slate-100 rounded-lg">
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
                    @if ($errors->has('name'))
                        <p class="text-red-600">
                            โปรดใส่ข้อมูลชื่ออุปกรณ์ให้ครบท้วนและใส่ได้ไม่กิน 30 ตัวอักษร
                        </p>
                    @endif
                    <input type="text" name="name" id="name" maxlength="30"
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
                           โปรดระบุจำนวนให้ถูกต้อง
                        </p>
                    @endif
                    <input type="number" name="quantity" type="number" id="quantity" min="0" max="99999"
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
                           โปรดเลือกประเภทให้ถูกต้อง
                        </p>
                    @endif

                    <div class="relative z-0 mb-6 w-full group">
                        <select name="type" id="type"
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="fertilizer">ปุ๋ย</option>
                            <option value="pesticide">ยาฆ่าแมลง</option>
                            <option value="herbicide">ยาฆ่าหญ้า</option>
                            <option value="etc..">อื่น ๆ</option>
                        </select>
                    </di>

                    <button class="app-button mt-4" type="submit">บันทึก</button>
                </div>
        </form>

    </section>

@endsection
