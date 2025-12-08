<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
        return view('admin.pages.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.pages.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imagePaths = [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $path = public_path('admin-assets/images/home-page/gallery/');

                if (!File::isDirectory($path)) {
                    File::makeDirectory($path, 0777, true, true);
                }

                $image->move($path, $filename);
                $imagePaths[] = 'admin-assets/images/home-page/gallery/' . $filename;
            }
        }

        Gallery::create([
            'images' => $imagePaths,
        ]);

        return redirect()->route('gallery.index')->with('success', 'Gallery images uploaded successfully.');
    }

    public function destroy($id)
    {
        // Delete entire gallery record along with all images
        $gallery = Gallery::findOrFail($id);

        if (!empty($gallery->images)) {
            foreach ($gallery->images as $img) {
                $fullPath = public_path($img);
                if (File::exists($fullPath)) {
                    File::delete($fullPath);
                }
            }
        }

        $gallery->delete();

        return redirect()->back()->with('success', 'Gallery deleted successfully.');
    }

    // New method to delete a single image from a gallery
    public function deleteImage(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);
        $imageToDelete = $request->input('image');

        if (!$imageToDelete) {
            return redirect()->back()->with('error', 'No image specified for deletion.');
        }

        $images = $gallery->images ?? [];

        // Filter out the image to delete
        $updatedImages = array_filter($images, function($img) use ($imageToDelete) {
            return $img !== $imageToDelete;
        });

        // Delete the file from storage if exists
        $fullPath = public_path($imageToDelete);
        if (File::exists($fullPath)) {
            File::delete($fullPath);
        }

        // Update the gallery with remaining images
        $gallery->images = array_values($updatedImages);
        $gallery->save();

        return redirect()->back()->with('success', 'Image deleted successfully.');
    }
}
