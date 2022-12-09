<?php

namespace App\Http\Controllers;

use App\AllCourse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;

class CourseController extends Controller
{
    function __construct()
    {
        $this->middleware('role:training');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $course = AllCourse::latest()->get();
        return view('course.index', compact('course'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:courses',
            'photo'=>'required|string:courses',
        ]);

        $create = AllCourse::create($request->all());

        if ($create){
            return redirect(route('course.index'))->with('success', 'Course create successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param AllCourse $course
     * @return Response
     */
    public function edit(AllCourse $course)
    {
        return view('course.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param AllCourse $course
     * @return void
     */
    public function update(Request $request, AllCourse $course)
    {
        $request->validate([
            'name' => 'required|unique:courses,name,'. $course->id,
        ]);

        $update = $course->update($request->all());

        if ($update){
            return redirect(route('course.index'))->with('success', 'Course update successfully');
        }
        return back()->with('warning', 'Course could not be update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param AllCourse $course
     * @return Response
     * @throws \Exception
     */
    public function destroy(AllCourse $course)
    {
        if ($course->attendances->count() > 0){
            return back()->with('warning', 'Not allow to delete');
        }

        if ($course->delete()){
            return back()->with('success', 'Course delete successfully');
        }
        return back()->with('warning', 'Course could not be delete');
    }
}
