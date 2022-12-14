<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\EmployeeLeave;
use DB;
use Auth;

class EmployeeLeavesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee_leaves = DB::table('employee_leaves')
                            ->join('users', 'employee_leaves.employee_id', '=', 'users.user_id')
                            ->join('leave_types', 'employee_leaves.leave_type_id', '=', 'leave_types.leave_type_id')
                            ->select('employee_leaves.*', 'users.employee_name', 'leave_types.leave_type')
                            ->get();
        $employees = DB::table('users')->get();
        $leave_types = DB::table('leave_types')->get();

        return view('admin.employee_leaves', ["employees" => $employees, "employee_leaves" => $employee_leaves, "leave_types" => $leave_types]);
    }

    public function store(Request $request){
        $employee_leave = new EmployeeLeave;
        $employee_leave->employee_id = $request->employee;
        $employee_leave->leave_type_id = $request->leave_type;
        $employee_leave->total = $request->total;
        $employee_leave->remaining = $request->total;
        $employee_leave->year = $request->year;
        $employee_leave->save();

        return redirect('/admin/employee_leaves')->with('message', 'Employee Leave successfully added');
    }

    public function update(Request $request, $id){
        $employee_leave = EmployeeLeave::find($id);
        $employee_leave->employee_id = $request->employee;
        $employee_leave->leave_type_id = $request->leave_type;
        $employee_leave->total = $request->total;
        $employee_leave->remaining = $request->total;
        $employee_leave->year = $request->year;
        $employee_leave->last_modified_by = Auth::user()->employee_name;
        $employee_leave->save();

        return redirect('/admin/employee_leaves')->with('message', 'Employee Leave successfully updated');
    }

    public function destroy($id){
        EmployeeLeave::destroy($id);
        
        return redirect('/admin/employee_leaves')->with('message', 'Employee Leave successfully deleted');
    }

    public function leaveBalances(){
        $employee_leaves = DB::table('employee_leaves')
                            ->join('users', 'employee_leaves.employee_id', '=', 'users.user_id')
                            ->join('leave_types', 'employee_leaves.leave_type_id', '=', 'leave_types.leave_type_id')
                            ->select('employee_leaves.*', 'users.employee_name', 'leave_types.leave_type')
                            ->get();
        $employees = DB::table('users')->get();
        $leave_types = DB::table('leave_types')->get();

        return view('admin.leave_balances', ["employees" => $employees, "employee_leaves" => $employee_leaves, "leave_types" => $leave_types]);
    }

    public function sessionDetails($column){
        $detail = DB::table('users')
                    ->join('designation', 'users.designation_id', '=', 'designation.des_id')
                    ->join('departments', 'users.department_id', '=', 'departments.department_id')
                    ->where('user_id', Auth::user()->user_id)
                    ->first();

        return $detail->$column;
    }

    public function showLeaveBalances(){
        $designation = $this->sessionDetails('designation');
        $department = $this->sessionDetails('department');

        $employee_leaves = DB::table('employee_leaves')
                            ->join('users', 'employee_leaves.employee_id', '=', 'users.user_id')
                            ->join('leave_types', 'employee_leaves.leave_type_id', '=', 'leave_types.leave_type_id')
                            ->select('employee_leaves.*', 'users.employee_name', 'leave_types.leave_type')
                            ->get();
        $employees = DB::table('users')->get();
        $leave_types = DB::table('leave_types')->get();

        return view('client.modules.absent_notice_slip.leave_balances.index', compact('employees', 'employee_leaves', 'leave_types', 'designation', 'department'));
    }

    public function leaveBalanceCreate(Request $request){
        $employee_leave = new EmployeeLeave;
        $employee_leave->employee_id = $request->employee;
        $employee_leave->leave_type_id = $request->leave_type;
        $employee_leave->total = $request->total;
        $employee_leave->remaining = $request->total;
        $employee_leave->year = $request->year;
        $employee_leave->save();

        return redirect('/module/absent_notice_slip/leave_balances')->with('message', 'Employee Leave successfully added');
    }

    public function leaveBalanceUpdate(Request $request, $id){
        $employee_leave = EmployeeLeave::find($id);
        $employee_leave->employee_id = $request->employee;
        $employee_leave->leave_type_id = $request->leave_type;
        $employee_leave->total = $request->total;
        $employee_leave->remaining = $request->total;
        $employee_leave->year = $request->year;
        $employee_leave->last_modified_by = Auth::user()->employee_name;
        $employee_leave->save();

        return redirect('/module/absent_notice_slip/leave_balances')->with('message', 'Employee Leave successfully updated');
    }

    public function leaveBalanceDelete($id){
        EmployeeLeave::destroy($id);
        
        return redirect('/module/absent_notice_slip/leave_balances')->with('message', 'Employee Leave successfully deleted');
    }
}