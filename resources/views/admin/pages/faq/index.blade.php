@extends('admin.layout.master')

@section('title', 'FAQs List')

@section('content')
<h1 class="text-2xl font-bold mb-6">FAQs List</h1>

<a href="{{ route('faq.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded mb-4 inline-block hover:bg-indigo-700">
    Add New FAQ
</a>

@if($faqs->count())
<table class="min-w-full table-auto bg-white shadow rounded">
    <thead>
        <tr>
            <th class="border px-4 py-2">Heading</th>
            <th class="border px-4 py-2">Description</th>
            <th class="border px-4 py-2">Question</th>
            <th class="border px-4 py-2">Answer</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($faqs as $faq)
        <tr>
            <td class="border px-4 py-2">{{ $faq->heading }}</td>
            <td class="border px-4 py-2">{{ Str::limit($faq->description, 50) }}</td>
            <td class="border px-4 py-2">{{ $faq->question }}</td>
            <td class="border px-4 py-2">{{ Str::limit($faq->answer, 50) }}</td>
            <td class="border px-4 py-2 space-x-2 flex justify-center items-center gap-2">
                <a href="{{ route('faq.show', $faq->id) }}"
                   class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center"
                   title="View FAQ">
                    <i class="fas fa-eye"></i>
                </a>
                <a href="{{ route('faq.edit', $faq->id) }}"
                   class="bg-green-500 hover:bg-green-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center"
                   title="Edit FAQ">
                    <i class="fas fa-edit"></i>
                </a>
                <form action="{{ route('faq.destroy', $faq->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure to delete this FAQ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-full w-10 h-10 flex items-center justify-center"
                            title="Delete FAQ">
                        <i class="fas fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@else
<p>No FAQs found.</p>
@endif

@endsection
