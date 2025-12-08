<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Course;
use App\Models\Facility;

class HomeController extends Controller
{
    public function index (){

        $about = About::first();
        $course_detail = Course::all();
        $facility = Facility::all();
        return view('pages.index', compact('about', 'course_detail', 'facility'));

    }
    
}
