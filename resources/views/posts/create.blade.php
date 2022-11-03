@extends('layouts.main')

@section('content')
    <section class="mt-6 mx-8">
        <h1 class="text-3xl mb-6">
            จัดทำข้อเสนอ
        </h1>
        <script>
            function mult(value){
                var x;
                x = Math.round((500 *value)*100)/100;
                document.getElementById('deposit_money').value =x;
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
                        {{ $errors->first('title') }}
                    </p>
                @endif
                <input type="text" name="title" id="title"
                       class="bg-gray-50 border @error('title') border-red-600 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ old('title') }}"
                       placeholder="" required>
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    ปริมาณออ้ยที่ต้องการ (หน่วยเป็นตัน ใส่เฉพาะตัวเลข)
                </label>
                @if ($errors->has('quantity'))
                    <p class="text-red-600">
                        {{ $errors->first('quantity') }}
                    </p>
                @endif
                <input name="quantity" id="quantity" type="number" min="1" step="0.5"
                       class="bg-gray-50 border @error('quantity') border-red-600 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ old('quantity') }}"
                       placeholder="" required onkeyup="mult(this.value)">
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <label for="deposit_money" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    ค่ามัดจำ
                </label>
                @if ($errors->has('deposit_money'))
                    <p class="text-red-600">
                        {{ $errors->first('deposit_money') }}
                    </p>
                @endif
                <input name="deposit_money" id="deposit_money" type="number" min="1" 
                       class="bg-gray-50 border @error('deposit_money') border-red-600 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ old('deposit_money') }}"
                       placeholder="" required>
            </div>
            <div class="relative z-0 mb-6 w-full group">
                <label for="deal_money" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    เงินที่ตกลงกันไว้
                </label>
                @if ($errors->has('deal_money'))
                    <p class="text-red-600">
                        {{ $errors->first('deal_money') }}
                    </p>
                @endif
                <input name="deal_money" id="deal_money" type="number" min="1" 
                       class="bg-gray-50 border @error('deal_money') border-red-600 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ old('deal_money') }}"
                       placeholder="" required>
            </div>

            <div class="relative z-0 mb-6 w-full group">
                <label for="desired" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    วันที่ต้องการออ้ย
                </label>
                @if ($errors->has('desired'))
                    <p class="text-red-600">
                        {{ $errors->first('desired') }}
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
