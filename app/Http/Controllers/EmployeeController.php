<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Project;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('employees', ['employees' => Employee::all()]);
    }

    public function show($id)
    {
        return view('employee', ['employee' => Employee::find($id), 'projects' => Project::all()]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
               'name' => 'required|unique:employees,name'
           ]);
        $e = new Employee();
        $e->name = $request['name'];
        return ($e->save() == 1) ?
            redirect('/sprint5/employees')->with('status_success', 'New employee created') :
            redirect('/sprint5/employees')->with('status_error', 'New employee was not created');
    }

    public function destroy($id){
        Employee::destroy($id);
        return redirect('/sprint5/employees')->with('status_success', 'Employee deleted');
    }
    
    public function update($id, Request $request){
        // [Dėmesio] validacijoje unique turi būti teisingas lentelės pavadinimas!
                $this->validate($request, [
                    'name' => 'required',
                    'project_id'
                ]);
                $e = Employee::find($id);
                $e->name = $request['name'];
                $e->project_id = $request['project_id'];
                return ($e->save() !== 1) ? 
                    redirect('/sprint5/employees/')->with('status_success', 'Employee updated!') : 
                    redirect('/sprint5/employees/')->with('status_error', 'Employee was not updated!');
            }
    
}
