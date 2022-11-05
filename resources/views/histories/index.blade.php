@extends('layouts.main')
@section('content')
<section class="mx-8">
        <h1 class="text-3xl mx-4 mt-6">
            ประวัติการอัพเดท
        </h1>
        <div class="my-1 px-8 py-2 flex flex-wrap justify-between space-y-6">
    @foreach($historys->sortByDesc('created_at') as $history)
    <a href="{{ route('historys.show', ['history' => $history])}}"
                   class="relative block p-6 w-full bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 ">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 ">
                        รหัสอุปกรณ์ที่อัพเดท: {{ $history->tool_id }}
                        <p class="absolute right-4 mt-2 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2">
                        &nbsp;ประเภท : {{ $history->translateStatus($history) }}&nbsp;
                       
                    </p>
                    </h5>
                    <p class="mb-2">
                        จำนวนที่อัพเดท  {{ $history->quntityUpdate($history)}}
                        </p>
                        <p class="mb-2"> 
                        เมื่อวันที่: {{ $history->created_at}}</p>
                    
                </a>
            @endforeach
        </div>
    </section>
@endsection