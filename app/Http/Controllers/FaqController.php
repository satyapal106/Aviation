<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = FAQ::all();
        return view('admin.pages.faq.index', compact('faqs'));
    }

    public function create()
    {
        return view('admin.pages.faq.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'heading' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'question' => 'nullable|string|max:255',
            'answer' => 'nullable|string',
        ]);

        FAQ::create($request->all());

        return redirect()->route('faq.index')->with('success', 'FAQ created successfully.');
    }

    public function show($id)
    {
        $faq = FAQ::findOrFail($id);
        return view('admin.pages.faq.show', compact('faq'));
    }

    public function edit($id)
    {
        $faq = FAQ::findOrFail($id);
        return view('admin.pages.faq.edit', compact('faq'));
    }

    public function update(Request $request, $id)
    {
        $faq = FAQ::findOrFail($id);

        $request->validate([
            'heading' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'question' => 'nullable|string|max:255',
            'answer' => 'nullable|string',
        ]);

        $faq->update($request->all());

        return redirect()->route('faq.index')->with('success', 'FAQ updated successfully.');
    }

    public function destroy($id)
    {
        $faq = FAQ::findOrFail($id);
        $faq->delete();

        return redirect()->route('faq.index')->with('success', 'FAQ deleted successfully.');
    }
}
