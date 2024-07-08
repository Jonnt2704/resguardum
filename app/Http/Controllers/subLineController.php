<?php

namespace App\Http\Controllers;

use App\Subline;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class subLineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sublines = DB::table('subline')
                ->join('line', 'line.id', '=', 'subline.line')
                ->select('subline.*', 'line.name as lName')
                ->get();

        return view('admin.subline.index', compact('sublines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allLines = DB::table('line')->get();

        return view('admin.subline.add', compact('allLines'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'subLineName' => 'required',
            'selectLine' => 'required'

        ]);

        $addedLine = Subline::create([
                            'name' => $request->subLineName,
                            'line' => $request->selectLine
                            ]);

        if ( $addedLine ) {

            return response()->json([
                'isSuccess' => true,
                'Message' => "Linea de investigación creada con exito"
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
     * @param  \App\subline  $subline
     * @return \Illuminate\Http\Response
     */
    public function show(subline $subline)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\subline  $subline
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subline = DB::table('subline')
                        ->where('id', '=', $id)
                        ->get();

        $allLines = DB::table('line')->get();

        return view('admin.subline.edit', compact('subline', 'allLines')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\subline  $subline
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, subline $subline)
    {
        $update = DB::table('subline')
                    ->where('id', $request->subLineId)
                    ->update([
                            'name' => $request->subLineName,
                            'line' => $request->selectLine,
                        ]);

        if ( $update ) {

            return response()->json([
                'isSuccess' => true,
                'Message' => "Se ha Actualizado la Sub Linea de investigación"
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
     * @param  \App\subline  $subline
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $deleted = DB::table('subline')->where('id', '=', $id)->delete();

        if ( $deleted ) {
 
            return response()->json([
                'isSuccess' => true,
                'Message' => "Sub Linea borrada con exito"
            ], 200); // Status code here

        } else {

            return response()->json([
                'isSuccess' => true,
                'Message' => "Algo ha salido mal! Si el error persiste contacta a soporte"
            ], 200); // Status code here

        }
    }
}
