<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    
    public function index() {

        $projectInfo = DB::table('project')
                        ->join('autor', 'autor.id', '=', 'project.autor')
                        ->select('project.*', 'autor.name', 'autor.lastname')
                        ->limit(10)
                        ->orderBy('create_date', 'desc')
                        ->get();

        $projectNumber = DB::table('project')
                    ->count();

        return view('welcome', compact('projectNumber', 'projectInfo'));

    }

    public function mainList() {

        $projectList = DB::table('project')
                        ->select('*')
                        ->orderBy('create_date', 'desc')
                        ->paginate(10);

        return view('main', compact('projectList'));

    }

    public function single_project_page ($id) {

        $projectData = DB::table('project')
                        ->join('autor', 'autor.id', '=', 'project.autor')
                        ->join('tutor', 'tutor.id', '=', 'project.tutor')
                        ->leftjoin('line', 'line.id', '=', 'project.line')
                        ->select('project.*', 'autor.name as Aname', 'autor.lastname as Alastname', 'tutor.name as tname', 'tutor.lastname as tlastname', 'line.name as lineName')
                        ->where('project.id', '=', $id)
                        ->get();

        return view('single-project', compact('projectData'));

    }


    public function project_per_year () {

        $years = DB::table('project')
                        ->selectRaw('count(*) as pAmount, YEAR(create_date) as year')
                        ->groupByRaw('YEAR(create_date)')
                        ->get();

        return view('project-per-year', compact('years'));               

    }

    public function mainList_years($year) {

        $projectList_years = DB::table('project')
                        ->select('*')
                        ->whereYear('create_date', $year)
                        ->orderBy('create_date', 'desc')
                        ->paginate(10);

        return view('main-years', compact('projectList_years', 'year'));

    }

    public function downloadProject($filename)
    {
     
        $path = storage_path('/projects/' . $filename);

        if (!file_exists($path)) {
            abort(404);
        }

        return response()->download($path);

    }


}
