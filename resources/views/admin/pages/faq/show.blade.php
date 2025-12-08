@extends('admin.layout.master')

@section('title', 'View FAQ')

@section('content')
<h1 class="text-2xl font-bold mb-6">View FAQ</h1>

<div class="bg-white rounded p-6 shadow max-w-3xl">

    <div class="mb-4">
        <h2 class="text-lg font-semibold">Heading</h2>
        <p>{{ $faq->heading ?? '-' }}</p>
    </div>

    <div class="mb-4">
        <h2 class="text-lg font-semibold">Description</h2>
        <p>{{ $faq->description ?? '-' }}</p>
    </div>

    <div class="mb-4">
        <h2 class="text-lg font-semibold">Question</h2>
        <p>{{ $faq->question }}</p>
    </div>

    <div class="mb-4">
        <h2 class="text-lg font-semibold">Answer</h2>
        <p>{{ $faq->answer }}</p>
    </div>

    <a href="{{ route('faq.index') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded inline-block mt-4">Back to List</a>

</div>
@endsection
