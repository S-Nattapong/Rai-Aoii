@extends('layouts.main')

@section('content')
    <section class="p-5 mt-6 mx-8 bg-slate-100 rounded-lg">
        <h1 class="text-3xl mb-6">
            จัดทำข้อเสนอ
        </h1>
        <script>
            var x;
            var y;
            var z;
            function mult(value){
                x = Math.round((1000 *value)*100)/100;
                document.getElementById('deal_money').value =x;
            }
            function percent(value){
                y = Math.round(x*(value/100));
                document.getElementById('deposit_money').value =y;
            }
            function deal(value){
                z = Math.round((value/x)*100);
                document.getElementById('deal_percent').value =z;
            }
        </script>
        <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="relative z-0 mb-6 w-full group">
                <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    หัวข้อของข้อเสนอ
                </label>
                @if ($errors->has('title'))
                    <p class="text-red-600">
                        ต้องกรอกหัวข้อของข้อเสนออย่างน้อย 5 ตัวอักษร
                    </p>
                @endif
                <input type="text" name="title" id="title" maxlength="50"
                       class="bg-gray-50 border @error('title') border-red-600 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ old('title') }}"
                       placeholder="" required>
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    ปริมาณอ้อยที่ต้องการ (หน่วยเป็นตัน โดยราคาตันละ 1000 บาท ใส่เฉพาะตัวเลข)
                </label>
                @if ($errors->has('quantity'))
                    <p class="text-red-600">
                     ปริมาณอ้อยที่ต้องการจะไม่เกิน 9999 ตันและไม่น้อยกว่า 1 ตัน
                    </p>
                @endif
                <input name="quantity" id="quantity" type="number" min="1" step="0.5" max="9999"
                       class="bg-gray-50 border @error('quantity') border-red-600 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ old('quantity') }}"
                       placeholder="" required onkeyup="mult(this.value)">
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <label for="deal_percent" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    เปอร์เเซ็นต์เงินมัดจำที่จะจ่าย (ไม่ต้องใส่ %)
                </label>
                @if ($errors->has('deal_percent'))
                    <p class="text-red-600">
                        ใส่ได้ตั้งแต่ 1 แต่จะไม่เกิน 100
                    </p>
                @endif
                <input name="deal_percent" id="deal_percent" type="number" min="1" max="100"
                       class="bg-gray-50 border @error('deal_percent') border-red-600 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ old('deal_percent') }}"
                       placeholder="" required onkeyup="percent(this.value)">
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <label for="deposit_money" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    เงินมัดจำ (บาท)
                </label>
                @if ($errors->has('deposit_money'))
                    <p class="text-red-600">
                     เงินมัดจำจะต้องไม่เกินเงินที่ต้องจ่ายทั้งหมดในข้อเสนอ
                    </p>
                @endif
                <input name="deposit_money" id="deposit_money" type="number" min="1" max="9999000"
                       class="bg-gray-50 border @error('deposit_money') border-red-600 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ old('deposit_money') }}"
                       placeholder="" required onkeyup="deal(this.value)">
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <label for="deal_money" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    เงินที่ต้องจ่ายทั้งหมดในข้อเสนอ (บาท)
                </label>
                @if ($errors->has('deal_money'))
                    <p class="text-red-600">
                    เงินที่ต้องจ่ายทั้งหมดในข้อเสนอจะต้องไม่น้อยกว่าเงินมัดจำ
                    </p>
                @endif
                <input name="deal_money" id="deal_money" type="number" min="1" max="9999000"
                       class="bg-gray-50 border @error('deal_money') border-red-600 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ old('deal_money') }}"
                       placeholder="" required>
            </div>

            <div class="relative z-0 mb-6 w-full group">
                <label for="desired" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    วันที่ต้องการอ้อย
                </label>
                @if ($errors->has('desired'))
                    <p class="text-red-600">
                        วันที่ต้องการอ้อยจะต้องมากกว่า ณ วันที่ปัจจุบันอย่างน้อย 1 วัน และไม่เกิน 1 ปี
                    </p>
                @endif
                <input type="date" name="desired" id="desired"
                       class="bg-gray-50 border @error('desired') border-red-600 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ old('desired') }}" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}"
                       placeholder="" required>
            </div>

        <div>
                <button class="app-button" type="submit">ส่ง</button>
            </div>

        </form>

    </section>

@endsection
