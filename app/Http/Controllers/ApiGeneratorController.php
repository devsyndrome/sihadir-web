<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Presences;
use App\Generators;
use App\Schedules;
use Validator;
use Illuminate\Support\Str;

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
        $id = Str::beforeLast($request->userscan, '+');
        $timescan = Str::afterLast($request->userscan, '+');
        $datenow = Carbon::now();
        $addsecond = $datenow->addSecond(10);
        $max = $addsecond->format('H:i:s');
        $min = Carbon::now()->format('H:i:s');
        if($timescan >= $min AND $timescan <= $max ){
            if(Generators::where('generator_id', $id)->first() === null){
                $presences = Presences::create([
                    'schedule_id' => $request->id,
                    'generator_date' => $date,
                    'generator_status' => 'ok',
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
                return response()->json($response, 400);
            }
            
        }else{
            $response = [
                'success' => false,
                'data' => '0',
                'message' => 'Is not your class.'
            ];
            return response()->json($response, 400);
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
        $presences = Generators::find($id);
        $data = $book->toArray();

        if (is_null($presences)) {
            $response = [
                'success' => false,
                'data' => 'Empty',
                'message' => 'Data not found.'
            ];
            return response()->json($response, 404);
        }


        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'Data retrieved successfully.'
        ];

        return response()->json($response, 200);
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
