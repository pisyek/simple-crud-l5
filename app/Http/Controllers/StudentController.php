<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentDetail;
use App\Http\Requests\UpdateStudentDetail;
use App\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('student-index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreStudentDetail $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreStudentDetail $request)
    {
        $data = $request->all();
        $student = Student::create($data);
        return redirect()->back()->with('status','Successfully created ' . $student->name . '.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Student::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return view('student-edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateStudentDetail $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateStudentDetail $request, $id)
    {
        $student = Student::find($id);
        $student->update($request->all());
        return redirect()->back()->with('status', 'Successfully updated ' . $student->name . '.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect()->back()->with('status', 'Successfully deleted ' . $student->name . '.');
    }
}
