{{-- resources/views/posts/show.blade.php --}}
@extends('layouts.main')

@section('content')
    <article class="mt-6 mx-8">
        <h1 class="text-3xl mb-1">
            หัวข้อข้อเสนอ :{{ $post->title }}
        </h1>
        <div class="mb-4 justify-center items-center">
            <p class="mt-2 text-gray-800 text-2xl font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2">
                @if($post->status === "Waiting")
                    <span style="color: #B9B9B9" class="material-symbols-outlined">radio_button_checked</span>
                @elseif($post->status === "Received")
                    <span style="color: black" class="material-symbols-outlined">radio_button_checked</span>
                @elseif($post->status === "Progress")
                    <span style="color: #f6bf00" class="material-symbols-outlined">radio_button_checked</span>
                @elseif($post->status === "Completed")
                    <span style="color: #5fdc3b" class="material-symbols-outlined">radio_button_checked</span>
                @else
                    <span style="color: red" class="material-symbols-outlined">radio_button_checked</span>
                @endif
                &nbsp;สถานะข้อเสนอ: {{ $post->status }}
            </p>
        </div>
        <div class=" mx-28 gap-4 grid-cols-2 grid">
            <div class="relative z-0 mb-6 w-full group">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                ชื่อลูกค้า
            </label>
                <input type="text" name="name" id="name" disabled
                       class="bg-gray-50 border @error('name') border-red-600 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ $post->user->name }}"
                       placeholder="" required \>
            </div>
            <div class="relative z-0 mb-6 w-full group">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                เบอร์โทรลูกค้า
            </label>
            <input type="text" name="name" id="name" disabled
                   class="bg-gray-50 border @error('name') border-red-600 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                   value="{{ $post->user->phone_no}}"
                   placeholder="" required \>
            </div>

            <div class="relative z-0 mb-6 w-full group">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                เงินมัดจำ
            </label>
            <input type="text" name="name" id="name" disabled
                   class="bg-gray-50 border @error('name') border-red-600 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                   value="{{ $post->deposit_money}}"
                   placeholder="" required \>
            </div>
            <div class="relative z-0 mb-6 w-full group">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                เงินที่ต้องจ่ายทั้งหมดในข้อเสนอ
            </label>
            <input type="text" name="name" id="name" disabled
                   class="bg-gray-50 border @error('name') border-red-600 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                   value="{{ $post->deal_money}}"
                   placeholder="" required \>
            </div>
            <div class="relative z-0 mb-6 w-full group">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                ปริมาณอ้อยที่ต้องการ
            </label>
            <input type="text" name="name" id="name" disabled
                   class="bg-gray-50 border @error('name') border-red-600 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                   value="{{ $post->quantity}}"
                   placeholder="" required \>
            </div>
            <div class="relative z-0 mb-6 w-full group">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                วันที่ต้องการอ้อย
            </label>
            <input type="text" name="name" id="name" disabled
                   class="bg-gray-50 border @error('name') border-red-600 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                   value="{{ $post->desired}}"
                   placeholder="" required \>
            </div>
            <div class="relative z-0 mb-6 w-full group col-span-2">
            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                ที่อยู่
            </label>
            <textarea type="text" name="name" id="name" disabled
                   class="bg-gray-50 border @error('name') border-red-600 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                   placeholder="">{{ $post->user->address}}
            </textarea>
            </div>
        </div>
        <div class="relative z-0 mb-6 w-full group col-span-2">
        @if(!is_null($post->reason) && ($post->status == "Completed" || $post->status == "Cancel"))
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    เหตุผล (ผู้ผลิตตอบ)
                </label>
                <input type="text" name="name" id="name" disabled
                       class="bg-gray-50 border @error('name') border-red-600 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       value="{{ $post->reason}}"
                       placeholder="" required \>
        @endif
        </div>

        @if(!is_null($post->picture_path))
            <div class="relative flex items-center justify-center">
                <img class="max-w-lg h-auto rounded-lg" src="{{ asset('storage/' . $post->picture_path) }}"
                     alt="picture not load">
            </div>
        @endif
    </article>

    @can('is_admin',$post)
        <section class="mt-8 mx-16">
            <div class="relative py-4">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-b border-gray-300"></div>
                </div>
                <div class="relative flex justify-center">
                    <span class="bg-white px-4 text-sm text-gray-500">ดำเนินการ</span>
                </div>
            </div>
            <div class="relative z-0 p-2 w-full group">
                <label for="contact" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    ช่องทางการติดต่อ
                </label>
                @if ($errors->has('title'))
                    <p class="text-red-600">
                       กรุณาใส่ข้อมูลให้ครบถ้วน
                    </p>
                @endif
                <input type="text" name="contact" id="contact" value="{{ $post->user->email }}" disabled
                       class="bg-gray-50 border @error('title') border-red-600 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <form action="{{ route('posts.status.update', ['post' => $post->id]) }}" method="post">
                @csrf
                <div class="p-2 rounded">
                    <div class="p-2 ">
                    <label for="reason" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 ">
                        สถานะข้อเสนอ
                    </label>
                    <div class="grid grid-cols-2 gap-1">
                        <select name="status" id="status"
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                onchange="enablereason(this)">
                            <option value="{{ $post->status }}" selected>{{ $post->status }}</option>
                            @if($post->status === "Waiting")
                                @foreach(\array_diff(array("Waiting","Progress"), array( $post->status ) ) as $status)
                                    <option value="{{ $status }}">{{ $status }}</option>
                                @endforeach
                            @elseif($post->status === "Progress")
                                @foreach(\array_diff(array("Completed", "Cancel"), array( $post->status ) ) as $status)
                                    <option value="{{ $status }}">{{ $status }}</option>
                                @endforeach
                            @elseif($post->status === "Completed")
                                @foreach(\array_diff(array("Completed"), array( $post->status ) ) as $status)
                                    <option value="{{ $status }}" disable>{{ $status }}</option>
                                @endforeach
                            @else
                                @foreach(\array_diff(array("Cancel"), array( $post->status ) ) as $status)
                                    <option value="{{ $status }}" disable>{{ $status }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    </div>
                    @if ($errors->has('reason') ||$errors->has('reason_etc'))
                        <p class="text-red-600">
                            โปรดใส่ข้อมูลเหตุผลที่ปฏิเสธให้ครบถ้วน ถ้าเป็นเหตุผลอื่น ๆ โปรดระบุเพิ่มเติม
                        </p>
                    @endif
                    @if($post->status == "Progress")
                    <div  id="r-main" hidden >

                    <label for="reason" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 ">
                        เหตุผลที่ปฏิเสธ
                    </label>
                    <select name="reason" id="reason"  onchange="enablereason(this)"
                                class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="" selected disabled>-</option>
                                <option value="เงินที่ต้องจ่ายทั้งหมดในข้อเสนอไม่เหมาะสม">เงินที่ต้องจ่ายทั้งหมดในข้อเสนอไม่เหมาะสม</option>
                                <option value="เงินมัดจำน้อยกว่า 50 %">เงินมัดจำน้อยกว่า 50 %</option>
                                <option value="เวลาที่ต้องการอ้อยช้าหรือเร็วไป">เวลาที่ต้องการอ้อยช้าหรือเร็วไป</option>
                                <option value="ช่วงนี้โรคอ้อยระบาดไม่พร้อมปลูก">ช่วงนี้โรคอ้อยระบาดไม่พร้อมปลูก</option>
                                <option value="พื้นที่ไม่พร้อมเพาะปลูก">พื้นที่ไม่พร้อมเพาะปลูก</option>
                                <option value="อื่น ๆ">อื่น ๆ</option>
                    </select>
                    </div>
                    <div class="r-none" id="r-none" hidden >
                    <label for="reason_etc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            เหตุผลเพิ่มเติม
                        </label>
                        <input type="text" name="reason_etc" id="reason_etc" value="{{old('reason_etc')}}" maxlength="40"
                               class="bg-gray-50 border @error('reason_etc') border-red-600 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    </div>
                    @elseif(!is_null($post->reason) && $post->status == "Completed" || $post->status == "Cancel")
                        <label for="reason" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            เหตุผล
                        </label>
                        <input type="text" name="reason" id="reason" value="{{ $post->reason }}" disabled
                               class="bg-gray-50 border @error('reason') border-red-600 @else border-gray-300 @enderror text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @endif
<script type="text/javascript">
    var x = 1;
    function enablereason(ans){
    console.log(ans.value);
    if(ans.value == "Completed" || ans.value == "Progress"){
        document.getElementById('r-main').hidden = true;
        document.getElementById('r-none').hidden = true;
    }
    else if(ans.value == "Cancel" && x == 0){
        document.getElementById('r-main').hidden = false;
        document.getElementById('r-none').hidden = false;

    }
    else if(ans.value == "Cancel"){
        document.getElementById('r-main').hidden = false;

    }
    else if(ans.value == "อื่น ๆ"){
        document.getElementById('r-none').hidden = false;
        x = 0;
    }
    else{
        document.getElementById('r-none').hidden = true;
        x = 1;
    }
};
    // function showDelete() {
    //     document.getElementById("hidereason").hidden = false;
    //     }
    // function hideDelete() {
    //     document.getElementById("hidereason").hidden = true;
    //     }
</script>
                    @if(!($post->status == "Completed" || $post->status == "Cancel"))
            <div class="inline-flex pt-3">
                        <button class="app-button px-3 inline-flex" type="submit"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square " viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg>แก้ไขสถานะ</button>
            </div>
                    @endif

            </form>
        </section>
    @endcan



    @can('update', $post)
        <section class="mt-8 mx-8 mb-6">
            <div class="relative py-4">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-b border-gray-300"></div>
                </div>
                <!-- <div class="relative flex justify-center">
                    <span class="bg-white px-4 text-sm text-gray-500">ตัวเลือกเพิ่มเติม</span>
                </div> -->
            </div>

            <!-- <div class="mb-6">
                <a class="app-button" href="{{ route('posts.edit', ['post' => $post->id]) }}">
                    แก้ไขรายงาน
                </a>
            </div> -->
        </section>
    @endcan

@endsection
