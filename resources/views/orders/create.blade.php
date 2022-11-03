@extends('layouts.main')

@section('content')

<section class="mt-6 mx-8">
        <h1 class="text-3xl mb-6">
            กรอกคำสั่งซื้อ
        </h1>

        <form action="{{ route('orders.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="relative z-0 mb-6 w-full group">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    ชื่อร้าน
                </label>
                @if ($errors->has('shop_name'))
                    <p class="text-red-600">
                        {{ $errors->first('shop_name') }}
                    </p>
                @endif
                <input type="text" name="shop_name" id="shop_name"
                       class="bg-gray-50 border @error('shop_name') border-red-600 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ old('shop_name') }}"
                       placeholder="" required>
            </div>

            <div class="relative z-0 mb-6 w-full group">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    รายละเอียด
                </label>
                @if ($errors->has('description'))
                    <p class="text-red-600">
                        {{ $errors->first('description') }}
                    </p>
                @endif
                <input type="text" name="description" id="description"
                       class="bg-gray-50 border @error('description') border-red-600 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ old('description') }}"
                       placeholder="" required>
            </div>


            <div class="relative z-0 mb-6 w-full group">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    ที่อยู่ร้าน
                </label>
                @if ($errors->has('address'))
                    <p class="text-red-600">
                        {{ $errors->first('address') }}
                    </p>
                @endif
                <input type="text" name="address" id="address"
                       class="bg-gray-50 border @error('address') border-red-600 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ old('address') }}"
                       placeholder="" required>
            </div>


            <div class="relative z-0 mb-6 w-full group">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    ค่าใช้จ่าย
                </label>
                @if ($errors->has('money'))
                    <p class="text-red-600">
                        {{ $errors->first('money') }}
                    </p>
                @endif
                <input type="number" name="money" id="money"
                       class="bg-gray-50 border @error('money') border-red-600 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ old('money') }}"
                       placeholder="" required>
            </div>

            <div class="relative z-0 mb-6 w-full group">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    วันที่ออกคำสั่งซื้อ
                </label>
                @if ($errors->has('order_time'))
                    <p class="text-red-600">
                        {{ $errors->first('order_time') }}
                    </p>
                @endif
                <input type="date" name="order_time" id="order_time"
                       class="bg-gray-50 border @error('order_time') border-red-600 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ old('order_time') }}"
                       placeholder="" required>
            </div>



               
            <div>
                <button class="app-button" type="submit">ส่ง</button>
            </div>
        
        </form>
    
    </section>



@endsection