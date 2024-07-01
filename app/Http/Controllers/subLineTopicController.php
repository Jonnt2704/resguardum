<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class subLineTopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allSlines = DB::table('subline_topic')
                ->join('subline', 'subline.id', '=', 'subline_topic.subline')
                ->select('subline_topic.*', 'subline.name as sName')
                ->get();

        return view('admin.subline-topic.index', compact('allSlines'));

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
       
        $url = DB::table('subline_topic')->insert([
                'name' => $request->subLineName,
                'subline' => $request->selectLine,
            ]);

        if ( $url ) {

            return response()->json([
                'isSuccess' => true,
                'Message' => "Tema creado con exito!"
            ], 200); // Status code here

        } else {

            return response()->json([
                'isSuccess' => true,
                'Message' => "Algo ha salido mal! Si el error persiste contacta a soporte"
            ], 200); // Status code here

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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $allLines = DB::table('subline')->get();

        return view('admin.subline-topic.add', compact('allLines'));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $subline_topic = DB::table('subline_topic')
                        ->where('id', '=', $id)
                        ->get();

        $allLines = DB::table('subline')->get();

        return view('admin.subline-topic.edit', compact('subline_topic', 'allLines'));  

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

        $update = DB::table('subline_topic')
                    ->where('id', $request->subLineId)
                    ->update([
                            'name' => $request->subLineName,
                            'subline' => $request->selectLine,
                        ]);

        if ( $update ) {

            return response()->json([
                'isSuccess' => true,
                'Message' => "Tema actualizado con exito!"
            ], 200); // Status code here

        } else {

            return response()->json([
                'isSuccess' => true,
                'Message' => "Algo ha salido mal! Si el error persiste contacta a soporte"
            ], 200); // Status code here

        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $deleted = DB::table('subline_topic')->where('id', '=', $id)->delete();

        if ( $deleted ) {
 
            return response()->json([
                'isSuccess' => true,
                'Message' => "Sub Linea borrada con exito!"
            ], 200); // Status code here

        } else {

            return response()->json([
                'isSuccess' => true,
                'Message' => "Algo ha salido mal! Si el error persiste contacta a soporte"
            ], 200); // Status code here

        }

    }
}
