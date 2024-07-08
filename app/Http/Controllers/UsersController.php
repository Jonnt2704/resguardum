<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::all();
        return view('admin.users.index', compact('users'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userTypes = DB::table('type')
                    ->get();

        return view( 'admin.users.add', compact('userTypes') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
  
        $addedUser = User::create([
                                'name' => $request->userName,
                                'email' => $request->userMail,
                                'password' => $request->userPass,
                                'type' => $request->userType,
                                ]);

        if ( $addedUser ) {  

            return response()->json([
                'isSuccess' => true,
                'Message' => "Se ha agregado el usuario al sistema con exito!"
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
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        $userTypes = DB::table('type')
                    ->get();

        return view('admin.users.edit',compact('user', 'userTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
  
        $updatedUser = DB::table('users')
                        ->where('id', $request->userId)
                        ->update([
                                'name' => $request->userName,
                                'email' => $request->userMail,
                                'password' => $request->userPass,
                                'type' => $request->userType,
                            ]);

        if ( $updatedUser ) {

            return response()->json([
                'isSuccess' => true,
                'Message' => "Se ha actualizado el Usuario del sistema con exito!"
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletedUser = DB::table('users')->where('id', '=', $id)->delete();

        if ( $deletedUser ) {
 
            return response()->json([
                'isSuccess' => true,
                'Message' => "Se ha Borrado el usuario con exito!"
            ], 200); // Status code here

        } else {

            return response()->json([
                'isSuccess' => true,
                'Message' => "Algo ha salido mal! Si el error persiste contacta a soporte"
            ], 200); // Status code here

        }
    }

}
