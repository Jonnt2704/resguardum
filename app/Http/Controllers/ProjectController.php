<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = DB::table('project')
                ->join('autor', 'autor.id', '=', 'project.autor')
                ->select('project.*', 'autor.name', 'autor.lastname')
                ->get();
        return view('admin.project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $autors = DB::table('autor')->get();

        $tutors = DB::table('tutor')->get();

        $lines = DB::table('line')->get();

        return view('admin.project.add', compact('autors', 'tutors', 'lines'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $date = date('Y', time());

        $filesPath = storage_path('/projects/');
        
        if ($request->hasFile('projectFile')) { 

            $projectPdf = $request->file('projectFile');
            $projectName = $date . '_' . time() . '.' . $projectPdf->getClientOriginalExtension();
            $projectPdf->move($filesPath, $projectName);
            $projectSave = "/projects/" . $projectName;

        } else {

            $projectSave = NULL;

        }

        $addedProject = Project::create([
                                'title' => $request->projectName,
                                'autor' => $request->selectAutor,
                                'line' => $request->selectLine,
                                'tutor' => $request->selectTutor,
                                'resume' => $request->projectResume,
                                'note' => $request->projectNote,
                                'path' => $projectSave,
                                'create_date' => $request->projectCreatedDate,
                                ]);

        if ( $addedProject ) {  

            return response()->json([
                'isSuccess' => true,
                'Message' => "Se ha agregado el Proyecto con exito!"
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
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
    public function edit(project $project)
    {
        //
=======
    public function edit($id)
    {
        $project = DB::table('project')
                        ->where('id', '=', $id)
                        ->get();

        $autors = DB::table('autor')->get();

        $tutors = DB::table('tutor')->get();

        $lines = DB::table('line')->get();

        return view('admin.project.edit', compact('project', 'autors', 'tutors', 'lines'));
>>>>>>> ce1107b17ac5d14b0768d5e33b44443823d01e4a
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, project $project)
    {
<<<<<<< HEAD
        //
=======
        $date = date('Y', time());

        $filesPath = storage_path('/projects/');
        
        if ($request->hasFile('projectFile')) { 

            $projectPdf = $request->file('projectFile');
            $projectName = $date . '_' . time() . '.' . $projectPdf->getClientOriginalExtension();
            $projectPdf->move($filesPath, $projectName);
            $projectSave = "/projects/" . $projectName;

        } else {

            if (isset($request->current_project_file)) {
                $projectSave = $request->current_project_file;
            } else {
                $projectSave = NULL;
            }

        }

        $updatedProject = DB::table('project')
                    ->where('id', $request->projectId)
                    ->update([
                                'title' => $request->projectName,
                                'autor' => $request->selectAutor,
                                'line' => $request->selectLine,
                                'tutor' => $request->selectTutor,
                                'resume' => $request->projectResume,
                                'note' => $request->projectNote,
                                'path' => $projectSave,
                                'create_date' => $request->projectCreatedDate,
                        ]);

        if ( $updatedProject ) {  

            return response()->json([
                'isSuccess' => true,
                'Message' => "Se ha actualizado el Proyecto con exito!"
            ], 200); // Status code here

        } else {

            return response()->json([
                'isSuccess' => true,
                'Message' => "Algo ha salido mal! Si el error persiste contacta a soporte"
            ], 200); // Status code here

        }
>>>>>>> ce1107b17ac5d14b0768d5e33b44443823d01e4a
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletedProject = DB::table('project')->where('id', '=', $id)->delete();

        if ( $deletedProject ) {
 
            return response()->json([
                'isSuccess' => true,
                'Message' => "Se ha Borrado el Trabajo de grado con exito!"
            ], 200); // Status code here

        } else {

            return response()->json([
                'isSuccess' => true,
                'Message' => "Algo ha salido mal! Si el error persiste contacta a soporte"
            ], 200); // Status code here

        }
    }
}
