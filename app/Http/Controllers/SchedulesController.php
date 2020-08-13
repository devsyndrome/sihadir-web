<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes;
use App\Lecturers;
use App\Classrooms;
use App\Courses;
use App\Schedules;

class SchedulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list_schedules = Schedules::with('classrooms','classes','lecturers','courses')->get();
        if($request->ajax()){
            return datatables()->of($list_schedules)
            ->addColumn('action', function($data){
                $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->schedule_id.'" data-original-title="Edit" class="edit btn btn-info btn-sm edit-post"><i class="far fa-edit"></i></a>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" id="'.$data->schedule_id.'" class="delete btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>';     
                return $button;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        $classrooms = Classrooms::orderBy('classroom_name')->pluck('classroom_name', 'classroom_id');
        $classes = Classes::orderBy('class_name')->pluck('class_name', 'class_id');
        $lecturers = Lecturers::orderBy('lecturer_name')->pluck('lecturer_name', 'lecturer_id');
        $courses = Courses::orderBy('course_name')->pluck('course_name', 'course_id');
        return view('schedules', compact('classrooms','classes','lecturers','courses'));
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
        $id = $request->id;
        $post = Schedules::updateOrCreate(['schedule_id' => $request->id],
            [
                'classroom_id' => $request->classroom_id,
                'class_id' => $request->class_id,
                'lecturer_id' => $request->lecturer_id,
                'course_id' => $request->course_id,
                'schedule_start' => $request->start,
                'schedule_end' => $request->end,
                'schedule_day' => $request->day,
                
            ]);
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
        $where = array('schedule_id' => $id);
        $post  = Schedules::where($where)->first();
        return response()->json($post);
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
        $post = Schedules::where('schedule_id',$id)->delete();
        return response()->json($post);
    }
}
