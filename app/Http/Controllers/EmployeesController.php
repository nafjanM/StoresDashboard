<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Employee;


class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $employeesList = DB::table('employees')
        ->join('employees_skills', 'employees.skill_id', '=', 'employees_skills.id')
        ->join('stores', 'employees.store_id', '=', 'stores.id')
        ->select('employees.id', 'employees.status', 'employees.age', 'employees.name','stores.name As store_name', 'employees_skills.skill_name')
        ->simplePaginate(10);
        //dd($employeesList);
        return view('employeesList')->with('employeesList', $employeesList);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $stores = DB::table('stores')->select('stores.id', 'stores.name')->get();
        $skills = DB::table('employees_skills')->select('id', 'skill_name')->get();
        return view('createEmployee')->with(['stores'=>$stores, 'skills'=>$skills]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
        'name' => 'required',
        'age' => 'required|integer',
        'storeId' => 'required|integer',
        'skillId' => 'required|integer',
        'EmployeeStatus' => 'required|integer'
        ]
    );
    $newEmployee = new Employee();
    $newEmployee->name = $request->input('name');
    $newEmployee->age = $request->input('age');
    $newEmployee->store_id = $request->input('storeId');
    $newEmployee->skill_id = $request->input('skillId');
    $newEmployee->status = $request->input('EmployeeStatus');
    $newEmployee->save();

    return redirect()->to('/employees')->with('success','Employee was added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $employee = Employee::findOrFail($id);
        $employee = $employee->join('employees_skills', 'employees.skill_id', '=', 'employees_skills.id')
        ->join('stores', 'employees.store_id', '=', 'stores.id')->where('employees.id', $id)
        ->select('employees.id', 'employees.status', 'employees.age', 'employees.name','employees.skill_id','employees.store_id', 'employees.status' ,'stores.name As store_name', 'employees_skills.skill_name')->get();
        $stores = DB::table('stores')->select('stores.id', 'stores.name')->get();
        $skills = DB::table('employees_skills')->select('id', 'skill_name')->get();
        return view('employeeUpdate')->with(['employee'=>$employee, 'stores'=> $stores, 'skills'=> $skills]);
        //DB::table('employees')->()
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
        
        $employee = Employee::findOrFail($id);
        $employee->name = $request->input('name');
        $employee->age = $request->input('age');
        $employee->store_id = $request->input('storeId');
        $employee->skill_id = $request->input('skillId');
        $employee->status = $request->input('EmployeeStatus');
        $employee->update();

        return redirect()->to('/employees')->with('success','Employee was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
