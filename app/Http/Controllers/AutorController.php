<?php

namespace App\Http\Controllers;

use App\Autor;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Autores = Autor::all();
        return view('admin.autor.index', compact('Autores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.autor.add');

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

            'autorName' => 'required',
            'autorLastName' => 'required'

        ]);

        $addedAutor = Autor::create([
                                'name' => $request->autorName,
                                'lastname' => $request->autorLastName,
                                'phone' => $request->autorPhone,
                                'mail' => $request->autorMail,
                                'cedula' => $request->autorCed,
                                ]);

        if ( $addedAutor ) {  

            return response()->json([
                'isSuccess' => true,
                'Message' => "Se ha agregado el Autor con exito!"
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
     * @param  \App\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function show(Autor $autor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $autor = Autor::find($id);

        return view('admin.autor.edit', compact('autor'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Autor $autor)
    {
        $date = date('Y/m/d h:i:s', time());

        $request->validate([

            'autorName' => 'required',
            'autorLastName' => 'required'

        ]);
        
        $updatedAutor = DB::table('autor')
                        ->where('id', $request->autorId)
                        ->update([
                                'updated_at' => $date,
                                'name' => $request->autorName,
                                'lastname' => $request->autorLastName,
                                'phone' => $request->autorPhone,
                                'mail' => $request->autorMail,
                                'cedula' => $request->autorCed,
                            ]);

        if ( $updatedAutor ) {

            return response()->json([
                'isSuccess' => true,
                'Message' => "Se ha actualizado el Autor con exito!"
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
     * @param  \App\Autor  $autor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletedAutor = DB::table('autor')->where('id', '=', $id)->delete();

        if ( $deletedAutor ) {
 
            return response()->json([
                'isSuccess' => true,
                'Message' => "Se ha Borrado el Autor con exito!"
            ], 200); // Status code here

        } else {

            return response()->json([
                'isSuccess' => true,
                'Message' => "Algo ha salido mal! Si el error persiste contacta a soporte"
            ], 200); // Status code here

        }
    }
}
