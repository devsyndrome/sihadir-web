<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes;
use App\Lecturers;
use App\Classrooms;
use App\Courses;
use App\Schedules;
use App\Presences;
use App\Generators;
use App\Students;
use Illuminate\Support\Facades\Auth;    
use Carbon\Carbon;

class PresencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list_schedules = Generators::with('schedules','presences')
        ->leftJoin('schedules', 'schedules.schedule_id', '=', 'generators.schedule_id')
        ->leftJoin('presences', 'presences.generator_id', '=', 'generators.generator_id')
        ->leftJoin('students', 'students.student_id', '=', 'presences.student_id')
        ->leftJoin('classrooms', 'classrooms.classroom_id', '=', 'schedules.classroom_id')
        ->leftJoin('classes', 'classes.class_id', '=', 'schedules.class_id')
        ->leftJoin('lecturers', 'lecturers.lecturer_id', '=', 'schedules.lecturer_id')
        ->leftJoin('courses', 'courses.course_id', '=', 'schedules.course_id')
        ->where('presences.presence_id','<>','NULL')
        ->get();
        
        if($request->ajax()){
            
            return datatables()->of($list_schedules)
            ->make(true);
        }
        return view('presences');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $date = Carbon::now()->format('Y-m-d');
        return view('generator', compact('id','date'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
