<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\CreateUpdateStudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::get();
        $classrooms = Classroom::get();
        return view('students.index',['students'=>$students],['classroom'=>$classrooms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classrooms = Classroom::get();

        return view('students.create',['classroom'=>$classrooms]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUpdateStudentRequest $request)
    {
        $data = [
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'age'=>$request->age,
            'address'=>$request->address,
        ];
        try {
            $student = Student::create($data);

            return  redirect()->route('students.index')->with('success','Create student successfully');
        } catch(\Exception $e){
            Log::error($e->getMessage());
            return  back()->with('error','Create student failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return  view('students.show',['student'=>$student]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return  view('students.edit',['student'=>$student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(CreateUpdateStudentRequest $request, Student $student)
    {
        $data = [
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'age'=>$request->age,
            'address'=>$request->address,
        ];
        try {
            $student ->update($data);

            return  redirect()->route('students.index')->with('success','Update student successfully');
        } catch(\Exception $e){
            Log::error($e->getMessage());
            return  back()->with('error','Update student failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        try {
            $student ->delete();
            return  redirect()->route('students.index')->with('success','Delete student successfully');
        } catch(\Exception $e){
            Log::error($e->getMessage());
            return  back()->with('error','Delete student failed');
        }
    }
}