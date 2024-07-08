<?php

namespace App\Http\Controllers;

use App\Tutor;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class TutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $allTutor = Tutor::all();
        return view('admin.tutors.index', compact('allTutor'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tutors.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = date('Y/m/d h:i:s', time());

        $request->validate([

            'TutorName' => 'required',
            'TutorLastName' => 'required'

        ]);

        $addedTutor = Tutor::create([
                                'name' => $request->TutorName,
                                'lastname' => $request->TutorLastName,
                                'phone' => $request->tutorPhone,
                                'email' => $request->TutorMail,
                                'cedula' => $request->TutorCed,
                                ]);

        if ( $addedTutor ) {  

            return response()->json([
                'isSuccess' => true,
                'Message' => "Se ha agregado el tutor con exito!"
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
     * @param  \App\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function show(Tutor $tutor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tutor = Tutor::find($id);

        return view('admin.tutors.edit',compact('tutor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tutor $tutor)
    {

        $date = date('Y/m/d h:i:s', time());

        $request->validate([

            'TutorName' => 'required',
            'TutorLastName' => 'required'

        ]);
        
        $updatedTutor = DB::table('tutor')
                        ->where('id', $request->tutorId)
                        ->update([
                                'updated_at' => $date,
                                'name' => $request->TutorName,
                                'lastname' => $request->TutorLastName,
                                'phone' => $request->TutorPhone,
                                'email' => $request->TutorMail,
                                'cedula' => $request->TutorCed,
                            ]);

        if ( $updatedTutor ) {

            return response()->json([
                'isSuccess' => true,
                'Message' => "Se ha actualizado el Tutor con exito!"
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
     * @param  \App\Tutor  $tutor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletedTutor = DB::table('tutor')->where('id', '=', $id)->delete();

        if ( $deletedTutor ) {
 
            return response()->json([
                'isSuccess' => true,
                'Message' => "Se ha Borrado el Tutor con exito!"
            ], 200); // Status code here

        } else {

            return response()->json([
                'isSuccess' => true,
                'Message' => "Algo ha salido mal! Si el error persiste contacta a soporte"
            ], 200); // Status code here

        }
    }
}
