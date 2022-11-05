@extends('layouts.main')
@section('content')
    <section class="mx-8 mt-6">
        <h1 class="mb-6 text-3xl">
            ประวัติการสั่งซื้อ
        </h1>
        <div class="mx-8 mt-3">

            <div class="my-1 px-8 py-2 flex flex-wrap justify-between space-y-6">
                @foreach ($historys as $history)

                    <a href="{{ route('orders.show',['order'=>$order]) }}"
                       class="block p-6 w-full bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 ">
                        <div class="inline-flex">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">
                                {{$order->shop_name}}
                            </h5>
                        </div>
                        <p class="mt-5 text-sm font-medium text-slate-500">
                            {{$order->order_time}}
                        </p>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

@endsection
