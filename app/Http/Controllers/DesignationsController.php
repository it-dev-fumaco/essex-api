<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Designation;
use Validator;
use DB;
use Auth;

class DesignationsController extends Controller
{
    public function sessionDetails($column){
       $detail = DB::table('users')
                   ->join('designation', 'users.designation_id', '=', 'designation.des_id')
                   ->join('departments', 'users.department_id', '=', 'departments.department_id')
                   ->where('user_id', Auth::user()->user_id)
                   ->first();
       return $detail->$column;
    }

    public function hr_desig_index(){
        $designations = DB::table('designation')
                    ->join('departments', 'departments.department_id', '=', 'designation.department_id')
                    ->select('designation.*', 'departments.department')
                    ->get();
        $designation = $this->sessionDetails('designation');
        $department = $this->sessionDetails('department');

        $departments = DB::table('departments')->get();

        return view('client.modules.human_resource.designation.index')->with(["designations" => $designations, "departments" => $departments, "department" => $department, "designation" => $designation]);
    }
    
    public function index(){
        $designations = DB::table('designation')
                    ->join('departments', 'departments.department_id', '=', 'designation.department_id')
                    ->select('designation.*', 'departments.department')
                    ->get();

        $departments = DB::table('departments')->get();

        return view('admin.designation.index')->with(["designations" => $designations, "departments" => $departments]);
    }

    public function store(Request $request){
        $designation = DB::table('designation')
                    ->insert([
                        'department_id' => $request->department,
                        'designation' => $request->designation,
                        'remarks' => $request->remarks
                    ]);

        return redirect()->back()->with(['message' => 'Designation <b>' . $request->designation . '</b>  has been added!']);
    }

    public function update(Request $request){
        $designation = DB::table('designation')
                    ->where('des_id', $request->id)
                    ->update([
                        'department_id' => $request->department,
                        'designation' => $request->designation,
                        'remarks' => $request->remarks
                    ]);
        
        return redirect()->back()->with(['message' => 'Designation <b>' . $request->designation . '</b>  has been updated!']);
    }

    

    public function delete(Request $request){
        Designation::destroy($request->id);

        return redirect()->back()->with(['message' => 'Designation <b>' . $request->designation . '</b>  has been deleted!']);
    }
}