<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes;
use App\Lecturers;
use App\Classrooms;
use App\Courses;
use App\Schedules;
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
        $list_schedules = Schedules::with('classrooms','classes','lecturers','courses')->where('schedules.lecturer_id',Auth::user()->username)->get();
        
        if($request->ajax()){
            
            return datatables()->of($list_schedules)
            ->addColumn('action', function($data){
                $date = Carbon::now()->format('Y-m-d');
                $day = Carbon::now()->format('l');
                $time = Carbon::now()->format('H:i');
                if($data->schedule_day == $day AND $data->schedule_start <= $time AND $data->schedule_end >= $time){
                    $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->schedule_id.'" data-original-title="Edit" class="btn btn-info btn-sm generate"><i class="fa fa-qrcode ">Generate</i></a>';
                }else{
                    // $button = '<button class="edit btn btn-warning btn-sm edit-post"><i class="fa fa-qrcode ">No Schedule</i></button>';
                    $button = '<button class="btn btn-icon icon-center btn-warning"><i class="fas fa-times"></i></button>';
                }
                return $button;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
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
