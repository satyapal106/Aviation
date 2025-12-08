@extends('admin.layout.master')

@section('title', 'Gallery List')

@section('content')

<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-semibold">Gallery List</h1>
    <a href="{{ route('gallery.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Add New Gallery</a>
</div>

@if($galleries->count())
<div class="grid grid-cols-4 gap-6">
    @foreach($galleries as $gallery)
        @foreach($gallery->images as $image)
        <div class="border rounded p-2 shadow hover:shadow-lg transition-shadow">
            <img src="{{ asset($image) }}" alt="Gallery Image" class="w-full h-48 object-cover rounded" />
            <form action="{{ route('gallery.deleteImage', $gallery->id) }}" method="POST" class="mt-2 text-center">
                @csrf
                @method('DELETE')
                <input type="hidden" name="image" value="{{ $image }}">
                <button type="submit" class="bg-red-600 text-white px-4 py-1 rounded hover:bg-red-700" title="Delete Image">
                    Delete
                </button>
            </form>
        </div>
        @endforeach
    @endforeach
</div>
@else
    <p>No gallery records found.</p>
@endif

@endsection
