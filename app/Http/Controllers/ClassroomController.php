<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateUpdateClassRequest;
use App\Models\Classroom;
use Illuminate\Support\Facades\Log;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classrooms = Classroom::get();
        return view('classrooms.index',['classrooms'=>$classrooms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('classrooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUpdateClassRequest $request)
    {
        $data = [

            'class_name'=>$request->class_name,
            'description'=>$request->description,
        ];
        $classroom = Classroom::create($data);
        return  redirect()->route('classrooms.index')->with('success','Create class successfully');
        // try {
        //     $classrooms = Classroom::create($data);
        //     return  redirect()->route('classrooms.index')->with('success','Create class successfully');
        // } catch(\Exception $e){
        //     Log::error($e->getMessage());
        //     return  back()->with('error','Create class failed');
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Classroom
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom)
    {
        return  view('classrooms.show',['classroom'=>$classroom]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Classroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Classroom $classroom)
    {
        return  view('classrooms.edit',['classroom'=>$classroom]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classroom
     * @return \Illuminate\Http\Response
     */
    public function update(CreateUpdateClassRequest $request, Classroom $classroom)
    {
        $data = [

            'class_name'=>$request->class_name,
            'description'=>$request->description,
        ];
        try {
            $classroom -> update($data);
            return  redirect()->route('classrooms.index')->with('success','Update class successfully');
        } catch(\Exception $e){
            Log::error($e->getMessage());
            return  back()->with('error','Update class failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Classroom  $classrooms
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classroom $classroom)
    {
        try {
            $classroom -> delete();
            return  redirect()->route('classrooms.index')->with('success','Delete class successfully');
        } catch(\Exception $e){
            Log::error($e->getMessage());
            return  back()->with('error','Delete class failed');
        }
    }
}