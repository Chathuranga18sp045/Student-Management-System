<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course; /*Path Of Student Model */
use Illuminate\View\View;/*path for view*/


class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses =Course::all();
        return view ('courses.index')->with('courses',$courses);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('courses.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();
        Course::create($input);
        return redirect('courses')->with('flash_message','Course Addedd!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $coursess= Courset::find($id);
        return view('courses.show')->with('coursess',$courses);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course= Course::find($id);
        return view('courses.edit')->with('courses',$course);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $course= Course::find($id);
       $input= $request->all();
       $course->update($input);
       return redirect('courses')->with('flash_message','Course updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       Course::destroy($id);
        return redirect()->route('courses.index')->with('flash_message', 'Course removed!');
    }
}