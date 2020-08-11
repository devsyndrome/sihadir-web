<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Students;
use App\Classes;
use Illuminate\Support\Facades\Hash;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list_students = students::with('classes')->get();;
        if($request->ajax()){
            return datatables()->of($list_students)
            ->addColumn('action', function($data){
                $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->student_id.'" data-original-title="Edit" class="edit btn btn-info btn-sm edit-post"><i class="far fa-edit"></i></a>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" id="'.$data->student_id.'" class="delete btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>';     
                return $button;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        $classes = Classes::orderBy('class_name')->pluck('class_name', 'class_id');

        return view('students', compact('class_id', 'classes'));
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
        $post = students::updateOrCreate(['student_id' => $request->id],
            [
                'student_name' => $request->name,
                'student_birthdate' => $request->birthdate,
                'student_birthplace' => $request->birthplace,
                'student_gender' => $request->gender,
                'student_address' => $request->address,
                'student_phonenumber' => $request->phonenumber,
                'student_email' => $request->email,
                'class_id' => $request->class_id
            ]);
            if (User::where('username', '=', $request->id)->exists()) {
                // user found
            }else{
                return User::create([
                    'username' => $request->id,
                    'name' => $request->name,
                    'email' => $request->email,
                    'level' => 'student',
                    'password' => Hash::make($request->id),
                ]);
            }
        return response()->json($post);
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
        $where = array('student_id' => $id);
        $post  = Students::where($where)->first();
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
        $post = Students::where('student_id',$id)->delete();
        User::where('username',$id)->delete();
        return response()->json($post);
    }
}
