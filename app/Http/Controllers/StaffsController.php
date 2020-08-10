<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staffs;
use App\User;
use Illuminate\Support\Facades\Hash;

class StaffsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list_staffs = Staffs::all();
        if($request->ajax()){
            return datatables()->of($list_staffs)
            ->addColumn('action', function($data){
                $button = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$data->staff_id.'" data-original-title="Edit" class="edit btn btn-info btn-sm edit-post"><i class="far fa-edit"></i> Edit</a>';
                $button .= '&nbsp;&nbsp;';
                $button .= '<button type="button" name="delete" id="'.$data->staff_id.'" class="delete btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> Delete</button>';     
                return $button;
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        return view('staffs');

        //tampil JSON
        // return response()->json($list_staffs);

        //tampil data tabel tbody dengan  HTML
        // return view('staffs', compact('list_staffs'));

        //server-side rendering
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
        $post = Staffs::updateOrCreate(['staff_id' => $request->id],
            [
                'staff_name' => $request->name,
                'staff_birthdate' => $request->birthdate,
                'staff_birthplace' => $request->birthplace,
                'staff_gender' => $request->gender,
                'staff_address' => $request->address,
                'staff_phonenumber' => $request->phonenumber,
                'staff_email' => $request->email
            ]);
            return User::create([
                'username' => $request->id,
                'name' => $request->name,
                'email' => $request->email,
                'level' => 'admin',
                'password' => Hash::make($request->id),
            ]);
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
        $where = array('staff_id' => $id);
        $post  = Staffs::where($where)->first();
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
        $post = Staffs::where('staff_id',$id)->delete();
        return response()->json($post);
    }
}
