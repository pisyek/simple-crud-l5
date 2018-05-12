<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentDetail;
use App\Http\Requests\UpdateStudentDetail;
use App\Repositories\Student\StudentRepository;

/**
 * Class StudentController
 *
 * @package App\Http\Controllers
 * @author Hafiz Suhaimi <pisyek@gmail.com>
 * @copyright 2018 Pisyek Studios
 */
class StudentController extends Controller
{
    /**
     * @var StudentRepository
     */
    protected $student;

    /**
     * StudentController constructor.
     *
     * @param StudentRepository $student
     */
    public function __construct(StudentRepository $student)
    {
        $this->student = $student;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = $this->student->getAll();
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
        $student = $this->student->create($data);
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
        return $this->student->getById($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = $this->student->getById($id);
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
        $data = $request->all();
        $student = $this->student->update($id, $data);
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
        $student = $this->student->delete($id);
        return redirect()->back()->with('status', 'Successfully deleted ' . $student->name . '.');
    }
}
