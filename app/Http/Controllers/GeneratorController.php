<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes;
use App\Lecturers;
use App\Classrooms;
use App\Courses;
use App\Schedules;
use App\Generators;
use Illuminate\Support\Facades\Auth;    
use Carbon\Carbon;

class GeneratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = Carbon::now()->format('Y-m-d');
        $day = Carbon::now()->format('l');
        $time = Carbon::now()->format('H:i');
        // $list_schedules = Schedules::with('classrooms','classes','lecturers','courses')->where('schedules.lecturer_id',Auth::user()->username)->get();
        $cek = Schedules::with('generators','classrooms','classes','lecturers','courses')->join('generators', 'generators.schedule_id', '=', 'schedules.schedule_id')->where('schedules.lecturer_id','=',Auth::user()->username,'AND')->where('schedules.schedule_start','<=',$time,'AND')->where('schedules.schedule_end','>=',$time,'AND')->where('generators.generator_date','=',$date,'AND')->where('schedules.schedule_day','=',$day,'OR')->where('generators.generator_status','=','scan')->first();
        $list_schedules = Schedules::with('classrooms','classes','lecturers','courses')->where('schedules.lecturer_id','=',Auth::user()->username,'AND')->where('schedules.schedule_start','<=',$time,'AND')->where('schedules.schedule_end','>=',$time,'AND')->where('schedules.schedule_day','=',$day)->first();
        if($cek === null){
            $schedules = "0";
            if($list_schedules != null){
                $data = Schedules::with('classrooms','classes','lecturers','courses')->where('schedules.lecturer_id','=',Auth::user()->username,'AND')->where('schedules.schedule_start','<=',$time,'AND')->where('schedules.schedule_end','>=',$time,'AND')->where('schedules.schedule_day','=',$day)->get();
                if($data[0]->schedule_day == $day AND $data[0]->schedule_start <= $time AND $data[0]->schedule_end >= $time){
                    $button = 'scan';
                }
            }else{
                $data = "0";
                $button = 'empty';
            }
        }else{
            $schedules = Schedules::with('generators','classrooms','classes','lecturers','courses')->join('generators', 'generators.schedule_id', '=', 'schedules.schedule_id')->where('schedules.lecturer_id','=',Auth::user()->username,'AND')->where('schedules.schedule_start','<=',$time,'AND')->where('schedules.schedule_end','>=',$time,'AND')->where('generators.generator_date','=',$date)->get();
        }
        
        return view('generator',compact('schedules','button','data'));
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
        $date = Carbon::now()->format('Y-m-d');
        $post = Generators::Create([
            'schedule_id' => $request->id,
            'generator_date' => $date,
            'generator_status' => 'ok',
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
        //
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
