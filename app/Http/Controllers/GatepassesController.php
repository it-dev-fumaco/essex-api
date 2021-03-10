<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail_gatepass;
use App\Gatepass;
use App\CompanyAsset;
use Illuminate\Support\Facades\Storage;
use Image;  
use DB;
use Auth;

class GatepassesController extends Controller
{
    public function index(){
        $gatepasses = Gatepass::all();
                        
        return view('admin.gatepasses')->with('gatepasses', $gatepasses);
    }

    public function store(Request $request){
        $item = new Gatepass;
        $item->user_id = $request->user_id;
        $item->date_filed = $request->date_filed;
        $item->returned_on = $request->returned_on;
        $item->company_name = $request->company_name;
        $item->time = $request->time;
        $item->address = $request->address;
        $item->purpose = $request->purpose;
        $item->purpose_type = $request->purpose_type;
        $item->tel_no = $request->tel_no;
        $item->item_description = $request->item_description;
        $item->remarks = $request->remarks;
        $item->status = 'FOR APPROVAL';
        $item->save();

        $viewdetails =DB::table('gatepass')
        ->orderBy('gatepass_id', 'desc')
        ->where('user_id', Auth::user()->user_id)
        ->first();

    //     $gatepass_id= $viewdetails->gatepass_id;

    //     $data = array(
    //         'employee_name'      => Auth::user()->employee_name,
    //         'year'               => now()->format('Y'),
    //         'slip_id'            => $gatepass_id
    //     );

    // $branch= DB::table('branch')->get();
    //       foreach ($branch as $row) {
    //         if ($row->branch_id == Auth::user()->branch) {
    //           if (Auth::user()->branch == '1') {
    //             $branch_name= "plant 2";
    //             $approver= DB::table('users')
    //             ->where('users.department_id', 12)
    //             ->where('users.designation_id', 29)
    //             ->select('users.email')
    //             ->get();
    //             foreach ($approver as $row) {
    //                 Mail::to($row->email)->send(new SendMail_gatepass($data));
    //             }

    //           }elseif (Auth::user()->branch == '2') {
    //             $branch_name= "plant 1";
    //             $approver= DB::table('users')
    //             ->where('users.department_id', 19)
    //             ->where('users.designation_id', 54)
    //             ->select('users.email')
    //             ->get();
    //             foreach ($approver as $row) {
    //                 Mail::to($row->email)->send(new SendMail_gatepass($data));
    //             }
    //           }elseif (Auth::user()->branch == '3') {
    //             $branch_name= "Showroom";
    //             $approver= DB::table('users')
    //             ->where('users.department_id', 12)
    //             ->where('users.designation_id', 30)
    //             ->select('users.email')
    //             ->get();
    //             foreach ($approver as $row) {
    //                 Mail::to($row->email)->send(new SendMail_gatepass($data));
    //             }
    //           }
                    
    //         }
    //       }

        return response()->json(['message' => 'Gatepass no. <b>' . $item->gatepass_id . '</b>']);
    }

    public function updateStatus(Request $request){
        $item = Gatepass::find($request->gatepass_id);
        $item->status = $request->status;
        $item->item_type = $request->item_type;
        $item->last_modified_by = Auth::user()->employee_name;
        if ($request->item_type == 'Returnable') {
            $item->item_status = 'Unreturned';
        }
        $item->save();

        return response()->json(['message' => 'Gatepass no. <b>' . $item->gatepass_id . '</b> has been <b>' . $item->status. '</b>.']);
    }

    public function destroy($id){
        Gatepass::destroy($id);
        return redirect('/admin/gatepasses')->with('message', 'Gatepass successfully deleted');
    }

    public function gatepassesForApproval(Request $request){
        if ($request->ajax()) {
            $pending_gatepasses = DB::table('gatepass')
                                    ->join('users', 'users.user_id', '=', 'gatepass.user_id')
                                    ->where('gatepass.status', '=', 'For Approval')
                                    ->select('gatepass.*', 'users.employee_name')
                                    ->paginate(8);

            return view('client.tables.gatepasses_for_approval_table', compact('pending_gatepasses'))->render();
        }  
    }

    public function unreturnedItems(){
        $unreturned_items = DB::table('gatepass')
                                ->join('users', 'users.user_id', '=', 'gatepass.user_id')
                                ->where('gatepass.status', '=', 'Unreturned')
                                ->select('gatepass.*', 'users.employee_name')
                                ->get();

        return view('admin.unreturned_items')->with('unreturned_items', $unreturned_items);
    }

    public function fetchGatepasses(Request $request){
        if($request->ajax()){
            $gatepasses = DB::table('gatepass')
                        ->join('users', 'users.user_id', '=', 'gatepass.user_id')
                        ->where('gatepass.user_id', '=', Auth::user()->user_id)
                        ->orderBy('gatepass.gatepass_id', 'desc')
                        ->select('users.*', 'gatepass.*')
                        ->paginate(8);

            return view('client.tables.gatepasses_table', compact('gatepasses'))->render();
        }
    }

    public function getGatepassDetails(Request $request){
        $gatepass = DB::table('gatepass')
                    ->join('users', 'users.user_id', '=', 'gatepass.user_id')
                    ->where('gatepass.gatepass_id', '=', $request->id)
                    ->select('users.*', 'gatepass.*', DB::raw("(SELECT employee_name FROM users WHERE user_id = gatepass.approved_by) as approved_by"))
                    ->first();

        return response()->json($gatepass);
    }

    public function updateGatepassDetails(Request $request){
        $gatepass = Gatepass::find($request->gatepass_id);
        $gatepass->date_filed = $request->date_filed;
        $gatepass->returned_on = $request->returned_on;
        $gatepass->company_name = $request->company_name;
        $gatepass->time = $request->time;
        $gatepass->address = $request->address;
        $gatepass->purpose = $request->purpose;
        $gatepass->purpose_type = $request->purpose_type;
        $gatepass->tel_no = $request->tel_no;
        $gatepass->item_description = $request->item_description;
        $gatepass->remarks = $request->remarks;
        $gatepass->last_modified_by = Auth::user()->employee_name;
        $gatepass->save();

        return response()->json(['message' => 'Gatepass no.<b>' . $gatepass->gatepass_id . '</b> has been updated.']);
    }

    public function cancelGatepass(Request $request){
        $gatepass = Gatepass::find($request->id);
        $gatepass->status = 'CANCELLED';
        $gatepass->last_modified_by = Auth::user()->employee_name;
        $gatepass->save();
   
        return response()->json(['message' => 'Gatepass no. <b>' . $gatepass->gatepass_id . '</b> has been cancelled.']);
    }

    public function getGatepasses(Request $request){
        if ($request->ajax()) {
            $filteredGatepass = DB::table('gatepass')
                            ->join('users', 'users.user_id', '=', 'gatepass.user_id');
            if ($request->employee) {
                $filteredGatepass = $filteredGatepass->where('gatepass.user_id', $request->employee);
            }
            if ($request->item_type) {
                $filteredGatepass = $filteredGatepass->where('gatepass.item_type', $request->item_type);
            }

            $filteredGatepass = $filteredGatepass->select('gatepass.*', 'users.employee_name')->orderBy('gatepass_id', 'desc')->paginate(7);

            return view('client.tables.manage_gatepass_table', compact('filteredGatepass'))->render();
        }
    }

    public function printGatepass(Request $request, $id){
        $gatepass = Gatepass::join('users', 'users.user_id', '=', 'gatepass.user_id')
                            ->join('departments', 'departments.department_id', '=', 'users.department_id')
                            ->select('users.employee_name', 'gatepass.*', 'departments.department', DB::raw("(SELECT employee_name FROM users WHERE user_id = gatepass.approved_by) as approved_by"), DB::raw("(SELECT designation FROM users JOIN designation ON designation.des_id = users.designation_id WHERE user_id = gatepass.approved_by) as appr_designation"))
                            ->find($id);

        return view('client.print.printGatepass', compact('gatepass'));
    }

    public function getUnreturnedGatepass(Request $request){
        if($request->ajax()){
            $unreturned_gatepass = DB::table('gatepass')
                        ->join('users', 'users.user_id', '=', 'gatepass.user_id')
                        ->where('gatepass.item_type', '=', 'Returnable')
                        ->where('gatepass.item_status', '=', 'Unreturned')
                        ->where('gatepass.status', '=', 'Approved');
                        
            if ($request->employee) {
                $unreturned_gatepass = $unreturned_gatepass->where('gatepass.user_id', $request->employee);
            }

            $unreturned_gatepass = $unreturned_gatepass->orderBy('gatepass.gatepass_id', 'desc')
                        ->select('users.*', 'gatepass.*')
                        ->paginate(8);

            return view('client.tables.unreturned_gatepass_table', compact('unreturned_gatepass'))->render();
        }
    }

    public function updateUnreturnedGatepass(Request $request){
        $gatepass = Gatepass::find($request->gatepass_id);
        $gatepass->item_status = 'Returned';
        $gatepass->last_modified_by = Auth::user()->employee_name;
        $gatepass->save();

        return response()->json(['message' => 'Gatepass no. <b>' . $gatepass->gatepass_id . '</b> has been returned.']);
    }

    public function countPendingGatepass(Request $request){
        if ($request->ajax()) {
             $count_pending_gatepasses = DB::table('gatepass')
                                    ->join('users', 'users.user_id', '=', 'gatepass.user_id')
                                    ->where('gatepass.status', '=', 'For Approval')
                                    ->select('gatepass.*', 'users.employee_name')
                                    ->count();

            return $count_pending_gatepasses;
        }  
    }

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

        $gatepass = DB::table('gatepass')->where('status', 'APPROVED')->get();

        $total_gatepass = $gatepass->count();
        $total_unreturned = $gatepass->where('item_type', '=', 'Returnable')->where('item_status', '=', 'Unreturned')->count();
        $total_pending = $gatepass->where('status', 'FOR APPROVAL')->count();

        $totals = [
            'gatepass' => $total_gatepass,
            'unreturned_items' => $total_unreturned,
            'pending' => $total_pending
        ];

        return view('client.modules.gatepass.analytics', compact('designation', 'department', 'totals'));
    }

    public function purposeRateChart(Request $request){
        // if ($request->ajax()) {
           $gatepass = DB::table('gatepass')->select(DB::raw('YEAR(IFNULL(date_filed_converted, date_filed)) AS year'), 'purpose_type')
                    ->where('status', 'APPROVED')->having('year', $request->year)->get();

            $total_gatepass = $gatepass->count();

            $servicing = $gatepass->where('purpose_type', 'For Servicing')->count();
            $company_activity = $gatepass->where('purpose_type', 'For Company Activity')->count();
            $personal_use = $gatepass->where('purpose_type', 'For Personal Use')->count();
            $others = $gatepass->where('purpose_type', 'Others')->count();

            $data = [
                ['purpose_type' => 'For Servicing', 'percentage' => round(($servicing / $total_gatepass) * 100, 2)],
                ['purpose_type' => 'For Company Activity', 'percentage' => round(($company_activity / $total_gatepass) * 100, 2)],
                ['purpose_type' => 'For Personal Use', 'percentage' => round(($personal_use / $total_gatepass) * 100, 2)],
                ['purpose_type' => 'Others', 'percentage' => round(($others / $total_gatepass) * 100, 2)],
            ];

            return response()->json($data);
        // }
    }

    public function gatepassPerDeptChart(Request $request){
        $gatepass_per_dept = DB::table('gatepass')
                ->join('users', 'users.user_id', 'gatepass.user_id')
                ->join('departments', 'users.department_id', 'departments.department_id')
                ->select('department', DB::raw('COUNT(users.department_id) as total, YEAR(IFNULL(date_filed_converted, date_filed)) AS year'))
                ->where('gatepass.status', 'APPROVED');
                
                if ($request->purpose) {
                    $gatepass_per_dept = $gatepass_per_dept->where('gatepass.purpose_type', $request->purpose);
                }

        return $gatepass_per_dept->having('year', $request->year)->groupBy('users.department_id', 'department', 'year')->get();    
    }

    public function showGatepassHistory(){
        $designation = $this->sessionDetails('designation');
        $department = $this->sessionDetails('department');

        $employees = DB::table('users')->where('user_type', 'Employee')->orderBy('employee_name', 'asc')->get();

        return view('client.modules.gatepass.history', compact('designation', 'department', 'employees'));
    }

    public function showUnreturnedItems(){
        $designation = $this->sessionDetails('designation');
        $department = $this->sessionDetails('department');

        $employees = DB::table('users')->where('user_type', 'Employee')->orderBy('employee_name', 'asc')->get();

        return view('client.modules.gatepass.unreturned_items', compact('designation', 'department', 'employees'));
    }

    public function storeAsset(Request $request){
               foreach($request->file('imageFile') as $file){
                //get filename with extension
                $filenamewithextension = $file->getClientOriginalName();
     
                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
     
                //get file extension
                $extension = $file->getClientOriginalExtension();
     
                //filename to store
                $filenametostore = $filename.'_'.uniqid().'.'.$extension;
     
                Storage::put('public/uploads/assetpicture/'. $filenametostore, fopen($file, 'r+'));
                Storage::put('public/uploads/assetpicture/thumbnail/'. $filenametostore, fopen($file, 'r+'));
     
                //Resize image here
                $thumbnailpath = public_path('storage/uploads/assetpicture/thumbnail/'.$filenametostore);
                $img = Image::make($thumbnailpath)->resize(750, 500, function($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($thumbnailpath);

                
           $path='uploads/assetpicture/thumbnail/'.$filenametostore;
         $this->validate($request, [
            'assetclass' => 'required', 
            'asset_code' => 'required', 
            'brand' => 'required',
            'qty' => 'required',
            'model' => 'required',
            'serial' => 'required',
            'mcaddress' => 'required',
            'assetdesc' => 'required']);
        $asset = new CompanyAsset;
        $status="Active";
        $date=date('Y-d-m');
        $asset->assetclass = $request->assetclass;
        $asset->asset_code = $request->asset_code;
        $asset->brand = $request->brand;
        $asset->qty = $request->qty;
        $asset->model = $request->model;
        $asset->serial_no = $request->serial;
        $asset->mcaddress = $request->mcaddress;
        $asset->asset_desc = $request->assetdesc;
        $asset->status = $status;
        $asset->asset_date = $date;
        $asset->created_by= $request->issuedbyid;
        $asset->filename=$filenametostore;
        $asset->filepath=$path;
        $asset->save();

        return redirect()->back()->with(["message" => "Asset code - <b>" . $asset->asset_code . "</b> has been successfully added!"]);
        // return $asset;
    }
}

    public function updateAsset(Request $request){
        //original image
        $asset = CompanyAsset::find($request->id);
        if($request->hasFile('imageFile')){
            $file = $request->file('imageFile');
            $filenamewithextension = $file->getClientOriginalName();
     
                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
     
                //get file extension
                $extension = $file->getClientOriginalExtension();
     
                //filename to store
                $filenametostore = $filename.'_'.uniqid().'.'.$extension;
     
                Storage::put('public/uploads/assetpicture/'. $filenametostore, fopen($file, 'r+'));
                Storage::put('public/uploads/assetpicture/thumbnail/'. $filenametostore, fopen($file, 'r+'));
     
                //Resize image here
                $thumbnailpath = public_path('storage/uploads/assetpicture/thumbnail/'.$filenametostore);
                $img = Image::make($thumbnailpath)->resize(750, 500, function($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($thumbnailpath);
                $path='uploads/assetpicture/thumbnail/'.$filenametostore;
                
        
   
          
           
      $this->validate($request, [
            'asset_code' => 'required', 
            'brand' => 'required',
            'qty' => 'required',
            'model' => 'required',
            'serial' => 'required',
            'mcaddress' => 'required',
            'status' => 'required',
            'assetdesc' => 'required']);
        
        $status="Active";
        $date=date('Y-d-m');
        $asset->assetclass = $request->assetclass;
        $asset->asset_code = $request->asset_code;
        $asset->brand = $request->brand;
        $asset->qty = $request->qty;
        $asset->model = $request->model;
        $asset->serial_no = $request->serial;
        $asset->mcaddress = $request->mcaddress;
        $asset->asset_desc = $request->assetdesc;
        $asset->status = $request->status;
        $asset->asset_date = $date;
        $asset->created_by= $request->issuedbyid;
        $asset->filename=$filenametostore;
        $asset->filepath=$path;
        // $asset->save();

        // return redirect()->back()->with(["message" => "Asset code - <b>" . $asset->asset_code . "</b> has been successfully updated!"]);
  
       }
           return $asset;
    }
    public function deleteAsset(Request $request){
        $asset = CompanyAsset::find($request->id);
        $asset->delete();
        
        return redirect()->back()->with(['message' => 'Asset code - <b>' . $asset->asset_code . '</b>  has been successfully deleted!']);
    }
    public function uploadImage(Request $request){


        return redirect()->back()->with('message', 'Image(s) has been successfully uploaded!');
    }

    public function showCompanyAsset(){
        $designation = $this->sessionDetails('designation');
        $department = $this->sessionDetails('department');

        try { 
            $assets = DB::connection('mysql_erp')
                ->table('tabAsset')
                ->whereIn('asset_category', ['Machine and Equipment','Car', 'Factory Equipments', 'Office Equipments', 'Tools and Equipment'])
                ->get();
            // Closures include ->first(), ->get(), ->pluck(), etc.
        } catch(\Illuminate\Database\QueryException $e){ 
            if ($e instanceof \Illuminate\Database\QueryException) {
                $assets=null;
                $message="Errror fetching data!!";

                return view('client.modules.gatepass.company_asset.company_asset')->with(["me" => $message,'designation'=>$designation,'assets'=>$assets,'department'=>$department]);
            } elseif ($e instanceof \PDOException) {
                $assets=null;
                $message="Errror fetching data!!";
                
                return view('client.modules.gatepass.company_asset.company_asset')->with(["me" => $message,'designation'=>$designation,'assets'=>$assets,'department'=>$department]);
            }
            
            $assets=null;
            $message="Errror fetching data!!";
            
            return view('client.modules.gatepass.company_asset.company_asset')->with(["me" => $message,'designation'=>$designation,'assets'=>$assets,'department'=>$department]);
         // Note any method of class PDOException can be called on $ex.
        }
          return view('client.modules.gatepass.company_asset.company_asset', compact('designation', 'department','assets'));
    }

    public function getItemsIssuedtoEmployee($user_id){
        $items = DB::table('issued_to_employee')->where('issued_to', $user_id)->get();

        return response()->json($items);
    }

    public function showAccountability(Request $request){
        if ($request->category == 'tabAsset') {
            $assets = DB::connection('mysql_erp')
            ->table('tabAsset')
            ->where('item_code', $request->itemcode)
            ->first();  
        }elseif ($request->category == 'tabItem') {
            $assets = DB::connection('mysql_athena')
            ->table('item')
            ->join('components', 'components.com_id','=', 'item.com_id')
            ->join('category', 'category.cat_id','=', 'item.cat_id')
            ->where('item_code', $request->itemcode)
            ->select(DB::raw('category.cat_name as asset_category,item.description as name, item.serial_no,item.description,item.date_entered as purchase_date,item.image_path,item.image, components.com_type'))
            ->first(); 
        }
        

        return response()->json($assets);
    }
        public function showCateg(Request $request){
            $output="";
            if ($request->category == 'tabAsset') {
            $assets = DB::connection('mysql_erp')
            ->table('tabAsset')
            ->whereIn('asset_category', ['Machine and Equipment','Car', 'Factory Equipments', 'Office Equipments', 'Tools and Equipment'])
            ->get();

            foreach($assets as $row)
                 {
                $output .= '<option value="'.$row->item_code.'">'.$row->item_code.'</option>';
                 }
            }

            if ($request->category == 'tabItem') {
            $assets = DB::connection('mysql_athena')
            ->table('item')
            // ->join('components', 'components.com_id','=', 'item.com_id')
            // ->join('category', 'category.cat_id','=', 'item.cat_id')
            ->get();
            foreach($assets as $row)
                 {
                $output .= '<option value="'.$row->item_code.'">'.$row->item_code.'</option>';
                 }
            }

                 
       
        return json_encode($output);
    }

    public function showEmployeeAccountability(Request $request){
        $designation = $this->sessionDetails('designation');
        $department = $this->sessionDetails('department');

      
        $user= DB::table('users')->select('user_id','employee_name')->where('user_type', 'Employee')->get();

        $employee_accountability = DB::table('issued_to_employee')->join('users', 'users.user_id', 'issued_to_employee.issued_to')->select(DB::raw('COUNT(*) as total_issued_items'), 'users.employee_name', 'issued_to_employee.issued_to')->groupBy('issued_to', 'employee_name')->get();

        return view('client.modules.gatepass.employee_accountability.index', compact('designation', 'department', 'employee_accountability','user'));
    }

    
}