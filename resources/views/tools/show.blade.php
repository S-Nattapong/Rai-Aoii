@extends('layouts.main')
@section('content')
    <h1 class="text-3xl mx-4 mt-6">

    </h1>
    <a href="{{route('tools.edit'),['tool' => $tool]}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline"> Edit </a>
@endsection
