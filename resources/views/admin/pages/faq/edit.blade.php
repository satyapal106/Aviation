@extends('admin.layout.master')

@section('title', 'Edit FAQ')

@section('content')
<h1 class="text-2xl font-bold mb-6">Edit FAQ</h1>

@if ($errors->any())
    <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('faq.update', $faq->id) }}" method="POST" class="max-w-2xl">
    @csrf
    @method('PUT')

    <div class="mb-4">
        <label for="heading" class="block text-gray-700 font-semibold mb-2">Heading</label>
        <input type="text" name="heading" id="heading" value="{{ old('heading', $faq->heading) }}" class="w-full border rounded px-3 py-2" placeholder="Optional heading">
    </div>

    <div class="mb-4">
        <label for="description" class="block text-gray-700 font-semibold mb-2">Description</label>
        <textarea name="description" id="description" rows="3" class="w-full border rounded px-3 py-2" placeholder="Optional description">{{ old('description', $faq->description) }}</textarea>
    </div>

    <div class="mb-4">
        <label for="question" class="block text-gray-700 font-semibold mb-2">Question</label>
        <input type="text" name="question" id="question" value="{{ old('question', $faq->question) }}" class="w-full border rounded px-3 py-2" required placeholder="Enter frequently asked question">
    </div>

    <div class="mb-4">
        <label for="answer" class="block text-gray-700 font-semibold mb-2">Answer</label>
        <textarea name="answer" id="answer" rows="5" class="w-full border rounded px-3 py-2" required placeholder="Enter answer">{{ old('answer', $faq->answer) }}</textarea>
    </div>

    <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">Update FAQ</button>
</form>
@endsection
