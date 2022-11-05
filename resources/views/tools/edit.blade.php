@extends('layouts.main')

@section('content')
    <section class="mx-8">
        <h1 class="text-3xl mx-4 mt-6">
            อัพเดตอุปกรณ์เพาะปลูก
        </h1>
        <h5 class="text-3xl mx-4 mt-6">
            ชื่ออุปกรณ์ {{ $tool->name }}
        </h5>

        <label>
            @if ($errors->has('quantity'))
                <p class="text-red-600">
                    {{ $errors->first('quantity') }}
                </p>
            @endif
        </label>
        <div class="relative z-0 mb-6 w-full group">
        <select class="status">
            <option value="increase">เพิ่ม</option>
            <option value="decrease">ลด</option>
        </select>
        </div>
{{--        decription part--}}

{{--        <div class="relative z-0 mb-6 w-full group">--}}
{{--            <label for="description" class="label-gray">--}}
{{--                รายละเอียด--}}
{{--            </label>--}}
{{--            @error('description')--}}
{{--            <p class="text-red-600">--}}
{{--                {{ $errors->first('description') }}--}}
{{--            </p>--}}
{{--            @enderror--}}
{{--            <textarea rows="4" type="text" name="description" id="description"--}}
{{--                      class="input-gray"--}}
{{--                      required >{{ old('description', $post->description) }}</textarea>--}}
{{--        </div>--}}
    </section>

@endsection
