<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use App\Project;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    
    public function index() {

        $projectInfo = DB::table('project')
                        ->join('autor', 'autor.id', '=', 'project.autor')
                        ->select('project.*', 'autor.name', 'autor.lastname')
                        ->limit(16)
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


    public function ayuda_ia(){

        $lines = DB::table('line')
                        ->select('*')
                        ->get();

        return view('consulta-ia', compact('lines'));

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

    public function tutorList() {

        $tutors = DB::table('project')
                        ->selectRaw('COUNT(*) as tprojects, tutor.name, tutor.lastname, tutor.id')
                        ->join('tutor', 'tutor.id', '=', 'project.tutor')  
                        ->groupBy('project.tutor')
                        ->orderBy('tutor.lastname')
                        ->paginate(10);

        return view('project-per-tutor', compact('tutors'));

    }

    public function project_result($type, $id) {

        $projectList = DB::table('project')
                        ->select('*')
                        ->where($type, '=', $id)
                        ->orderBy('create_date', 'desc')
                        ->paginate(10);

        $types = DB::table($type)
                        ->select('*')
                        ->where('id', '=', $id)
                        ->get();

        $tipo = $type;

        return view('project-per-result', compact('projectList', 'types', 'tipo'));

    }

    public function autorList() {

        $autors = DB::table('project')
                        ->selectRaw('COUNT(*) as aprojects, autor.name, autor.lastname, autor.id')
                        ->join('autor', 'autor.id', '=', 'project.autor')  
                        ->groupBy('project.autor')
                        ->orderBy('autor.lastname')
                        ->paginate(10);

        return view('project-per-autor', compact('autors'));

    }

    public function downloadProject($filename)
    {
     
        $path = storage_path('/projects/' . $filename);

        if (!file_exists($path)) {
            abort(404);
        }

        return response()->download($path);

    }


    public function find_project() {

        $val = $_POST['busqueda'];

        /*$results = */

        $results =  Project::where('title', $val)
                            ->orWhere('resume', 'like', '%' . $val . '%')
                            ->get();

            echo '<div class="page-wrapper">
                            <div class="blog-top clearfix" style="margin-top:2rem; margin-bottom: 2rem;">
                                <h4 style="float: left;">Resultados de "'.$val.'" <a href=""><i class="fa fa-list"></i></a></h4>
                            </div>
                            <div id="news-space" class="blog-list clearfix">
                            </div>
                        </div>';

        foreach ($results as $project) {

            echo "<div class='blog-box row my-2'>
                                        <div class='col-md-4'>
                                            <div class='post-media'>
                                                <a href='/single/project/".$project->id."' title='project-img'>
                                                    <img src='/assets/img/Biblio-10_x.jpg' class='img-fluid border' width='50%'>
                                                    <div class='hovereffect'></div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class='blog-meta big-meta col-md-8 text-left pb-5'>
                                            <h6><a href='/single/project/".$project->id."' >".$project->title."</a></h6>
                                            <div class='fs-6 fw-light'><p style='max-height: 100px; overflow: hidden;'>".$project->resume.".</p></div>
                                            
                                            <small>Año: ".$project->create_date."</small>
                                        </div>
                                    </div>";

        }


    }


}
