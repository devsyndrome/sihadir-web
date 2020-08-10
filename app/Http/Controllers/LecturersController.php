<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lecturers;
use App\User;
use Illuminate\Support\Facades\Hash;

class LecturersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list_lecturers = lecturers::all();
        if($request->ajax()){
            return datatables()->of($list_lecturers)
            ->addColumn('action', function($data){
                $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->lecturer_id.'" data-original-title="Edit" class="edit btn btn-info btn-sm edit-post"><i class="far fa-edit"></i></a>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" id="'.$data->lecturer_id.'" class="delete btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>';     
                return $button;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('lecturers');
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
        $post = lecturers::updateOrCreate(['lecturer_id' => $request->id],
            [
                'lecturer_name' => $request->name,
                'lecturer_birthdate' => $request->birthdate,
                'lecturer_birthplace' => $request->birthplace,
                'lecturer_gender' => $request->gender,
                'lecturer_address' => $request->address,
                'lecturer_phonenumber' => $request->phonenumber,
                'lecturer_email' => $request->email
            ]);
            if (User::where('username', '=', $request->id)->exists()) {
                // user found
            }else{
                return User::create([
                    'username' => $request->id,
                    'name' => $request->name,
                    'email' => $request->email,
                    'level' => 'lecturer',
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $where = array('lecturer_id' => $id);
        $post  = lecturers::where($where)->first();
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
        $post = lecturers::where('lecturer_id',$id)->delete();
        User::where('username',$id)->delete();
        return response()->json($post);
    }
}
