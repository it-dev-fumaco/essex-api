<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;
use Auth;
use DB;

class PortalController extends Controller
{
    public function index(){
        $albums = DB::table('photo_albums')->orderBy('created_at', 'desc')->get();
        $milestones = DB::table('posts')
                    ->where('category', 'historical_milestones')
                    ->orderBy('created_at', 'desc')
                    ->get();

        $latest_news = DB::table('post_logs')
                    ->select('post_logs.post_id as p_id',
                        DB::raw("(SELECT max(id) FROM post_logs where post_id = p_id group by post_id) as log_id"),
                        DB::raw("(SELECT new_title FROM post_logs where id = log_id) as title"),
                        DB::raw("(SELECT new_content FROM post_logs where id = log_id) as content"),
                        DB::raw("(SELECT date_modified FROM post_logs where id = log_id) as date_modified"),
                        DB::raw("(SELECT employee_name FROM post_logs JOIN users ON users.user_id = post_logs.user_id where post_logs.id = log_id) as employee_name")
                    )
                    ->groupBy('post_id')
                    ->orderBy('date_modified', 'desc')
                    ->limit(5)
                    ->get();

        $updates = DB::table('posts')->where('category', 'updates')->orderBy('created_at', 'desc')->get();

        return view('portal.homepage', compact('albums', 'milestones', 'latest_news', 'updates'));
    }

    public function phoneEmailDirectory(){
        $departments = DB::table('departments')->select('departments.department_id', 'department', DB::raw('(select count(id) from users where department_id = departments.department_id and telephone != "") as users'))->orderBy('order_no', 'asc')->get();

        $employees = DB::table('users')->where('user_type', 'Employee')
                    ->where('telephone', '!=', null)
                    ->join('designation', 'designation.des_id', '=', 'users.designation_id')
                    ->get();

        return view('portal.directory', compact('departments', 'employees'));
    }

    public function internetServices(){
        return view('portal.internet_services');
    }

    public function showInternet(){
        $internet_services = DB::table('posts')->where('category', 'internet_services')
                                ->orderBy('created_at', 'desc')
                                ->get();

        return view('portal.internet', compact('internet_services'));
    }

    public function internet(){
        return view('portal.internet');
    }

    public function email(){
        return view('portal.email');
    }

    public function system(){
        return view('portal.system');
    }

    
    public function itGuidelines(){
        return view('portal.it_guidelines');
    }
    

    public function showAlbum(Request $request, $id){
        $album = DB::table('photo_albums')->where('id', $id)->first();
        $images = DB::table('images')->where('album_id', $id)->paginate(8);

        return view('portal.album', compact('album', 'images'));
    }

    

    public function uploadImage(Request $request){
        $data = [];
        if($request->hasFile('imageFile')){
            foreach($request->file('imageFile') as $file){

                //get filename with extension
                $filenamewithextension = $file->getClientOriginalName();
     
                //get filename without extension
                $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
     
                //get file extension
                $extension = $file->getClientOriginalExtension();
     
                //filename to store
                $filenametostore = $filename.'_'.uniqid().'.'.$extension;
     
                Storage::put('public/uploads/'. $filenametostore, fopen($file, 'r+'));
                Storage::put('public/uploads/thumbnail/'. $filenametostore, fopen($file, 'r+'));
     
                //Resize image here
                $thumbnailpath = public_path('storage/uploads/thumbnail/'.$filenametostore);
                $img = Image::make($thumbnailpath)->resize(750, 500, function($constraint) {
                    $constraint->aspectRatio();
                });
                $img->save($thumbnailpath);

                $data[] = [
                    'album_id' => $request->album_id,
                    'filename' => $filenametostore,
                    'filepath' => 'uploads/'.$filenametostore,
                    'thumbnail' => 'uploads/thumbnail/'.$filenametostore,
                ];
            }
        }

        $image = DB::table('images')->insert($data);

        return redirect()->back()->with('message', 'Image(s) has been successfully uploaded!');
    }

    public function deleteImage(Request $request, $id){
        $img = DB::table('images')->where('id', $id)->first();

        Storage::delete('public/'. $img->filepath);
        Storage::delete('public/'. $img->thumbnail);

        DB::table('images')->where('id', $id)->delete();

        return redirect()->back()->with('message', 'Image(s) has been successfully deleted!');
    }

    

    public function showHistoricalMilestones(){
        $milestones = DB::table('posts')->where('category', 'historical_milestones')->orderBy('created_at', 'desc')->get();
        
        return view('portal.milestones', compact('milestones'));
    }

    public function setAsFeatured(Request $request){
        DB::table('photo_albums')->where('id', $request->album_id)->update(['featured_image' => $request->image_path, 'modified_by' => Auth::user()->employee_name]);
        return redirect()->back()->with('message', 'Photo has been set as featured image!');
    }

    public function showManuals(){
        $manuals = DB::table('posts')->where('category', 'manuals')->orderBy('created_at', 'desc')->get();
        return view('portal.manuals', compact('manuals'));
    }

    

    public function showUpdates(){
        $updates = DB::table('posts')->where('category', 'updates')->orderBy('created_at', 'desc')->get();
        
        return view('portal.updates', compact('updates'));
    }


    // G A L L E R Y
    public function showGallery(){
        $activity_types = DB::table('company_activity_type')->get(); 

        return view('portal.gallery', compact('activity_types'));
    }

    public function fetchAlbums(Request $request){
        // if ($request->ajax()) {
            $albums = DB::table('photo_albums');
            
            if ($request->activity) {
                $albums = $albums->where('activity_type', $request->activity);
            }
            $albums = $albums->orderBy('created_at', 'desc')->paginate(8);

            return view('portal.lists.album_list', compact('albums'))->render();
        // }
    }

    public function addAlbum(Request $request){
        $data = [
            'activity_type' => $request->activity_type,
            'name' => $request->album_name,
            'description' => $request->description,
            'created_by' => Auth::user()->employee_name
        ];

        $album = DB::table('photo_albums')->insert($data);

        return redirect()->back()->with('message', 'Album has been successfully created!');
    }

    public function editAlbum(Request $request){
        $data = [
            'activity_type' => $request->activity_type,
            'name' => $request->album_name,
            'description' => $request->description,
            'modified_by' => Auth::user()->employee_name
        ];

        $album = DB::table('photo_albums')->where('id', $request->album_id)->update($data);

        return redirect()->back()->with('message', 'Album has been successfully updated!');
    }

    public function deleteAlbum(Request $request){
        DB::table('photo_albums')->where('id', '=', $request->album_id)->delete();

        return redirect()->back()->with('message', 'Album has been successfully deleted!');
    }
    // E N D G A L L E R Y

    // P O S T S (Updates, Manuals, Milestones)
    public function addPost(Request $request){
        $filenametostore = null;
        if($request->hasFile('featuredImage')){
            $file = $request->file('featuredImage');

            //get filename with extension
            $filenamewithextension = $file->getClientOriginalName();
     
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
     
            //get file extension
            $extension = $file->getClientOriginalExtension();
     
            //filename to store
            $filenametostore = $filename.'_'.uniqid().'.'.$extension;
     
            Storage::put('public/uploads/files/'. $filenametostore, fopen($file, 'r+'));
        }

        $data = [
            'title' => $request->post_title,
            'content' => $request->post_content,
            'created_by' => Auth::user()->employee_name,
            'featured_file' => $filenametostore,
            'category' => $request->post_category,
        ];

        $post = DB::table('posts')->insertGetId($data);

        $log_data = [
            'post_id' => $post,
            'new_title' => $request->post_title,
            'new_content' => $request->post_content,
            'new_attachment' => $filenametostore,
            'user_id' => Auth::user()->user_id
        ];
        
        $logs = DB::table('post_logs')->insert($log_data);

        return redirect()->back()->with('message', 'Post has been successfully added!');
    }

    public function updatePost(Request $request){
        //original image
        $filenametostore = $request->original_post_image;
        if($request->hasFile('featuredImage')){
            $file = $request->file('featuredImage');

            //get filename with extension
            $filenamewithextension = $file->getClientOriginalName();
     
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
     
            //get file extension
            $extension = $file->getClientOriginalExtension();
     
            //filename to store
            $filenametostore = $filename.'_'.uniqid().'.'.$extension;
     
            Storage::put('public/uploads/files/'. $filenametostore, fopen($file, 'r+'));
        }

        $data = [
            'title' => $request->post_title,
            'content' => $request->post_content,
            'modified_by' => Auth::user()->employee_name,
            'featured_file' => $filenametostore,
        ];

        $log_data = [
            'post_id' => $request->post_id,
            'original_title' => $request->original_post_title,
            'original_content' => $request->original_post_content,
            'original_attachment' => $request->original_post_image,
            'new_title' => $request->post_title,
            'new_content' => $request->post_content,
            'new_attachment' => $filenametostore,
            'user_id' => Auth::user()->user_id
        ];

        if ($request->original_post_title != $request->post_title || $request->original_post_content != $request->post_content || $request->original_post_image != $filenametostore) {
            $logs = DB::table('post_logs')->insert($log_data);
        }

        $post = DB::table('posts')->where('id', $request->post_id)->update($data);

        return redirect()->back()->with('message', 'Post has been successfully updated!');
    }

    public function deletePost(Request $request){
        DB::table('posts')->where('id', '=', $request->post_id)->delete();

        return redirect()->back()->with('message', 'Post has been successfully deleted!');
    }

    // E N D P O S T S

    // P O L I C Y
    public function addPolicy(Request $request){
        $filenametostore = null;
        if($request->hasFile('file_attachment')){

            $file = $request->file('file_attachment');

            //get filename with extension
            $filenamewithextension = $file->getClientOriginalName();
     
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
     
            //get file extension
            $extension = $file->getClientOriginalExtension();
     
            //filename to store
            $filenametostore = $filename.'_'.uniqid().'.'.$extension;
     
            Storage::put('public/uploads/files/'. $filenametostore, fopen($file, 'r+'));
        }

        $data = [
            'department_id' => $request->department,
            'subject' => $request->subject,
            'description' => $request->description,
            'file_attachment' => $filenametostore,
        ];

        $policy = DB::table('operational_policy_files')->insert($data);

        return redirect()->back()->with('message', 'Policy has been successfully added!');
    }

    public function editPolicy(Request $request){
        $filenametostore = $request->old_file;
        if($request->hasFile('file_attachment')){

            $file = $request->file('file_attachment');

            //get filename with extension
            $filenamewithextension = $file->getClientOriginalName();
     
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
     
            //get file extension
            $extension = $file->getClientOriginalExtension();
     
            //filename to store
            $filenametostore = $filename.'_'.uniqid().'.'.$extension;
     
            Storage::put('public/uploads/files/'. $filenametostore, fopen($file, 'r+'));
        }

        $data = [
            'department_id' => $request->department,
            'subject' => $request->subject,
            'description' => $request->description,
            'file_attachment' => $filenametostore,
        ];

        $policy = DB::table('operational_policy_files')->where('policy_id', $request->policy_id)->update($data);

        return redirect()->back()->with('message', 'Policy has been successfully updated!');
    }

    public function deletePolicy(Request $request){
        DB::table('operational_policy_files')->where('policy_id', '=', $request->policy_id)->delete();

        return redirect()->back()->with('message', 'Policy has been successfully deleted!');
    }

    public function getPoliciesByDept($department){
        $policies = DB::table('operational_policy_files');

        if ($department) {
            $policies = $policies->where('department_id', $department);
        }
        
        $policies = $policies->orderBy('operational_policy_files.created_at', 'desc')->get();

        return collect($policies);
    }

    public function showMemorandum(){

        $department_ids = [];
        foreach ($this->getPoliciesByDept(null) as $row) {
            $department_ids[] = $row->department_id;
        }

        $departments = DB::table('departments')
                    ->whereIn('department_id', $department_ids)
                    ->get();

        // for add policy modal
        $department_list = DB::table('departments')->get();
       
        $policiesByDept = [];
        foreach ($departments as $department) {
            $policiesByDept[] = [
                'policies' => $this->getPoliciesByDept($department->department_id),
                'department' => $department->department
            ];
        }

        $policiesAllDept = $this->getPoliciesByDept(0);
        return view('portal.memorandum', compact('policiesByDept', 'policiesAllDept', 'department_list'));
    }

    // E N D P O L I C Y
    public function showitGuidelines (){
        return view ('portal.it_guidelines');
    }
}
