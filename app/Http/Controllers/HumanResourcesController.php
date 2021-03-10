<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Training;

class HumanResourcesController extends Controller
{
    public function sessionDetails($column){
        $detail = DB::table('users')
                    ->join('designation', 'users.designation_id', '=', 'designation.des_id')
                    ->join('departments', 'users.department_id', '=', 'departments.department_id')
                    ->where('user_id', Auth::user()->user_id)
                    ->first();

        return $detail->$column;
    }     

    public function showAnalytics(){
        $designation = $this->sessionDetails('designation');
        $department = $this->sessionDetails('department');

        $users = DB::table('users')->get();

        $total_employees = collect($users)->where('user_type', 'Employee')->where('status', 'Active')->count();
        $total_regular = collect($users)->where('user_type', 'Employee')->where('status', 'Active')->where('employment_status', 'Regular')->count();
        $total_contractual = collect($users)->where('user_type', 'Employee')->where('status', 'Active')->where('employment_status', 'Contractual')->count();
        $total_probationary = collect($users)->where('user_type', 'Employee')->where('status', 'Active')->where('employment_status', 'Probationary')->count();

        $total_contractual_probationary = $total_contractual + $total_probationary;

        $total_applicants = collect($users)->where('user_type', 'Applicant')->count();
        $total_hired = collect($users)->where('applicant_status', 'Hired')->count();
        $total_declined = collect($users)->where('applicant_status', 'Declined')->count();
        $total_not_qualified = collect($users)->where('applicant_status', 'Not Qualified')->count();

        $totals = [
            'applicants' => $total_applicants,
            'hired' => $total_hired,
            'declined' => $total_declined,
            'not_qualified' => $total_not_qualified,
            'employees' => $total_employees,
            'regular' => $total_regular,
            'contractual_probationary' => $total_contractual_probationary,
        ];

        return view('client.modules.human_resource.analytics', compact('designation', 'department', 'totals'));
    }

    public function hiringRate(){
        $users = DB::table('users')->get();

        $total_applicants = collect($users)->where('user_type', 'Applicant')->count();
        $total_hired = collect($users)->where('applicant_status', 'Hired')->count();
        $total_declined = collect($users)->where('applicant_status', 'Declined')->count();
        $total_not_qualified = collect($users)->where('applicant_status', 'Not Qualified')->count();

        $data = [
            'hired' => round(($total_hired / $total_applicants) * 100, 2),
            'declined' => round(($total_declined / $total_applicants) * 100, 2),
            'not_qualified' => round(($total_not_qualified / $total_applicants) * 100, 2),
        ];

        return response()->json($data);
    }

    public function applicantsChart(Request $request){
        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        $data = [];
        foreach ($months as $i => $month) {
            $i = $i + 1;
            $applicants = DB::table('users')
                    ->select(DB::raw('MONTH(created_at) AS month, YEAR(created_at) AS year'))->where('source', 'Applicant');

            $applicants = $applicants->having('month', $i)->having('year', $request->year)->get();

            $total = collect($applicants)->count();

            $data[] = [
                'month' => $month,
                'total' => $total,
            ];
        }

        return response()->json($data);
    }

    public function employeesPerDeptChart(){
        return DB::table('users')->join('departments', 'departments.department_id', 'users.department_id')->select('department', DB::raw('COUNT(users.department_id) as total'))->where('user_type', 'Employee')->groupBy('users.department_id', 'department')->get();
    }

    public function jobSourceChart(){
        $job_source = DB::table('users')->select('job_source')->get();

        $data = [
            'jobstreet' => $job_source->where('job_source', 'Jobstreet')->count(),
            'indeed' => $job_source->where('job_source', 'Indeed')->count(),
            'walkin' => $job_source->where('job_source', 'Walk-in')->count(),
            'referrals' => $job_source->where('job_source', 'Referrals')->count(),
            'linkedIn' => $job_source->where('job_source', 'LinkedIn')->count(),
            'others' => $job_source->where('job_source', 'Others')->count(),
        ];

        return $data;
    }

        public function show_HR_training(){
        $designation = $this->sessionDetails('designation');
        $department = $this->sessionDetails('department');
        $departments = DB::table('departments')->get(); 
        $training = DB::table('training')
                    ->select('training.training_title','training.training_desc','training.training_date','training.date_submitted', 'training.proposed_by','training.status','training.training_id', 'training.remarks','training.department_name','training.department')->get(); 

        return view('client.modules.human_resource.training.index', compact('designation', 'department','departments','training'));
    }
        public function training_profile($id){
        $designation = $this->sessionDetails('designation');
        $department = $this->sessionDetails('department');
        $departments = DB::table('departments')->get(); 
        $training = DB::table('training')
                    ->select('training.training_title','training.training_desc','training.training_date','training.date_submitted', 'training.proposed_by','training.status','training.training_id', 'training.remarks','training.department_name')
                    ->where('training.training_id', $id)
                    ->first(); 
                    
        $attendees = DB::table('training_attendees')
        ->join('users', 'users.user_id','=','training_attendees.user_id')
        ->where('training_id', $id)
        ->get();

        return view('client.modules.human_resource.training.training_profile', compact('designation', 'department','departments','training', 'attendees'));
    }
        public function add_HR_training(Request $request){
        $date = date('Y-m-d');
        $training = new Training;
        $training->training_title = $request->training_title;
        $training->training_desc = $request->training_desc;
        $training->department = $request->department;
        $training->training_date = $request->training_date;
        $training->proposed_by = $request->proposed_by;
        $training->status = $request->training_status;
        $training->date_submitted = $date;
        $training->last_modified_by = Auth::user()->employee_name;
        $training->remarks = $request->remarks;
        $training->department_name = $request->department_name;

        $training->save();
        $get_id= DB::table('training')
        ->where('training_title', $request->training_title)
        ->where('training_date', $request->training_date)
        ->where('department', $request->department)
        ->first();

        if ($request->kpi_designation_new) {
                foreach($request->kpi_designation_new as $i => $row){
                      $kpi_designation[] = [
                        'user_id' => $request->kpi_designation_new[$i],
                        'training_id' => $get_id->training_id                    ];
                } 
                DB::table('training_attendees')->insert($kpi_designation);
            }

        return redirect()->back()->with(['message' => ''.$request->training_title.' has been successfully added!']);
    }
    public function edit_HR_training(Request $request){
        $training = Training::find($request->training_id);
        $training->training_title = $request->training_title;
        $training->training_desc = $request->training_desc;
        $training->department = $request->department;
        $training->training_date = $request->training_date;
        $training->proposed_by = $request->proposed_by;
        $training->status = $request->training_status;
        $training->last_modified_by = Auth::user()->employee_name;
        $training->remarks = $request->remarks;
        $training->department_name = $request->department_name;
        $training->save();

        $kpi_designation_id = collect($request->kpi_designation_id);


        // for insert
        if ($request->kpi_designation_new) {
            foreach($request->kpi_designation_new as $i => $row){
                $kpi_designation_new[] = [
                        'user_id' => $request->kpi_designation_new[$i],
                        'training_id' => $request->training_id 
                ];
            }

            DB::table('training_attendees')->insert($kpi_designation_new);
        }

        // for delete
        if ($request->kpi_designation_id) {
            $delete = DB::table('training_attendees')
                ->where('training_id', $request->training_id)
                ->whereIn('attendies_id', $request->old_kpi_designation)
                ->whereNotIn('attendies_id', $kpi_designation_id)
                ->delete();
        }

        
        // for update
        if ($request->kpi_designation_id) {
            foreach($request->kpi_designation_id as $i => $row){
                $kpi_designation_update = [
                    'user_id' => $request->kpi_designation_old[$i],
                    'last_modified_by' => Auth::user()->employee_name
                ];

                DB::table('training_attendees')->where('attendies_id', $request->kpi_designation_id[$i])->update($kpi_designation_update);
            }
        }


        if ($request->ajax()) {
            return response()->json(['message' => '' . $request->training_title. ' has been successfully updated!', 'id' => $request->training_id]);
        }
        return redirect()->back()->with(['message' => ''.$request->training_title.'  has been successfully updated!']);
    }
    
    public function delete_HR_training(Request $request){
        $training = Training::find($request->training_id);
        $training->delete();
        
        return redirect()->back()->with(['message' => ' Training has been Successfully deleted!']);
    }
    public function Employee_list_edit(Request $request){
        $employee_list = DB::table('users')
        ->where('user_type', 'Employee')
        ->where('status', 'Active')
        ->orderBy('employee_name', 'asc')->get();

        return response()->json($employee_list);

    }
    public function Employee_list(Request $request){
        $employee_list = DB::table('users')
        ->where('department_id', $request->department)
        ->where('user_type', 'Employee')
        ->where('status', 'Active')
        ->orderBy('employee_name', 'asc')->get();

        return response()->json($employee_list);

    }

    public function edit_training_details($id){
        $designation = $this->sessionDetails('designation');
        $department = $this->sessionDetails('department');
        $departments = DB::table('departments')->get(); 
        $training = DB::table('training')
                    ->select('training.training_title','training.training_desc','training.training_date','training.date_submitted', 'training.proposed_by','training.status','training.department','training.training_id','training.remarks','training.department_name')
                    ->where('training.training_id', $id)
                    ->first(); 
        $training_attendees =  DB::table('training_attendees')
        ->join('users', 'users.user_id','=','training_attendees.user_id')
        ->where('training_id', $training->training_id)->get();

        $data = [
            'training_attendees' => $training_attendees,
            'training' => $training
        ];

        return response()->json($data);

    }
}