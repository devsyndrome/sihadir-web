<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Presences;
use App\Generators;
use App\Students;
use App\Schedus;
use Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ApiGeneratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $presences = Presences::with('generators','students')->get();
        // $presences = Schedules::with('generators')->get();
        $presences = Schedules::all();
        $data = $presences->toArray();

        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Read successfully.'
        ];

        return response()->json($response, 200);
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
        // $input = $request->all();

        // $validator = Validator::make($input, [
        //     'name' => 'required',
        //     'author' => 'required'
        // ]);

        // if ($validator->fails()) {
        //     $response = [
        //         'success' => false,
        //         'data' => 'Validation Error.',
        //         'message' => $validator->errors()
        //     ];
        //     return response()->json($response, 404);
        // }
        $username = $request->username;
        $id = Str::beforeLast($request->userscan, '+');
        $min = Str::afterLast($request->userscan, '+');
        $datenow = Carbon::now();
        $addsecond = $datenow->addSecond(15);
        $max = $addsecond->format('H:i:s');
        $timescan = Carbon::now()->format('H:i:s');
        $scannerclass = Students::find($username);
        $date = Carbon::now()->format('Y-m-d');
        if ($scannerclass != null) {
            // foreach ($scannerclass as $items){
                    var_dump ($scannerclass);
                    if (Generators::with('schedules')
                    ->join('schedules', 'schedules.schedule_id', '=', 'generators.schedule_id')
                    ->where('generators.generator_id','=',$id,'AND')
                    ->where('schedules.class_id','=',$scannerclass['class_id'])->first() != null) {
                        if($timescan >= $min AND $timescan <= $max ){
                            if(Presences::where('generator_id','=', $id,'AND')
                                ->where('student_id','=',$username)
                                ->first() === null){
                                $presences = Presences::create([
                                    'generator_id' => $id,
                                    'student_id' => $username,
                                    'presence_time' => $timescan,
                                    'presence_status' => 'present',
                                    ]);
                                $data = $presences->toArray();
                                if($presences){
                                    $response = [
                                        'success' => true,
                                        'data' => $data,
                                        'message' => 'Presence success.'
                                    ];
                                    return response()->json($response, 201);
                                }else{
                                    $response = [
                                        'success' => false,
                                        'data' => '0',
                                        'message' => 'Presence failed.'
                                    ];
                                    return response()->json($response, 400);
                                }
                            }else{
                                $response = [
                                    'success' => false,
                                    'data' => '0',
                                    'message' => 'You already presence.'
                                ];
                                return response()->json($response, 406);
                            }   
                        }else{
                            $response = [
                                'success' => false,
                                'data' => '0',
                                'message' => 'QR Expired.'
                            ];
                            return response()->json($response, 403);
                        }
                    }else{
                        $response = [
                            'success' => false,
                            'data' => '0',
                            'message' => 'Is not your class.'
                        ];
                        return response()->json($response, 401);
                    }
            // }
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $presences = Generators::find($id);
        // $data = $presences->toArray();

        // if (is_null($presences)) {
        //     $response = [
        //         'success' => false,
        //         'data' => 'Empty',
        //         'message' => 'Data not found.'
        //     ];
        //     return response()->json($response, 404);
        // }


        // $response = [
        //     'success' => true,
        //     'data' => $data,
        //     'message' => 'Data retrieved successfully.'
        // ];

        // return response()->json($response, 200);
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
