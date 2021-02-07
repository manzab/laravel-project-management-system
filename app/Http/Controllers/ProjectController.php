<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        return view('projects', ['projects' => Project::all()]);
    }

    public function show($id)
    {
        return view('project', ['project' => Project::find($id)]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
               'title' => 'required|unique:projects,title'
           ]);
        $p = new Project();
        $p->title = $request['title'];
        return ($p->save() == 1) ?
            redirect('/sprint5/projects')->with('status_success', 'Project created!') :
            redirect('/sprint5/projects')->with('status_error', 'Project was not created!');
    }

    public function destroy($id){
        Project::destroy($id);
        return redirect('/sprint5/projects')->with('status_success', 'Project deleted!');
    }
    
    public function update($id, Request $request){
        // [Dėmesio] validacijoje unique turi būti teisingas lentelės pavadinimas!
                $this->validate($request, [
                    'title' => 'required|unique:projects,title'
                ]);
                $p = Project::find($id);
                $p->title = $request['title'];
                return ($p->save() !== 1) ? 
                    redirect('/sprint5/projects/')->with('status_success', 'Project updated!') : 
                    redirect('/spritn5/projects/')->with('status_error', 'Project was not updated!');
            }
    
};