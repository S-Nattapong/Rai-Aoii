@extends('layouts.main')
@section('content')
    <section class="mx-8">
    <h1 class="text-3xl mx-4 mt-6">
        รายละเอียดประวัติการอัพเดท
    </h1>
        <div class="mx-32 grid grid-cols-2 gap-4">
                <p class="text-xl mt-3">รหัสอุปกรณ์: {{ $history->tool_id }}</p>
                    <p class="text-2xl mt-3">
                    ประเภท : {{ $history->translateStatus($history) }}
                       </p>
                    <p class="text-xl mt-3">
                        ชื่ออุปกรณ์ : {{ $tool->name}}
                        </p>
                    <p class="text-xl mt-3">
                        จำนวนที่อัพเดท : {{ $history->quntityUpdate($history)}}
                        </p>
                    <p class="text-xl mt-3">
                        จำนวนก่อนที่จะอัพเดท : {{ $history->old_quantity}}
                        </p>
                    <p class="text-xl mt-3">
                        จำนวนที่อัพเดทแล้ว : {{ $history->current_quantity}}
                        </p>
                    <p class="text-xl mt-3">
                        รายละเอียด : {{ $history->description}}
                        </p>
                        <p class="text-xl mt-3">
                        เมื่อวันที่: {{ $history->created_at}}</p>
                    </p>
        </div>

    </section>
@endsection
