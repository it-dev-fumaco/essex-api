@extends('client.app')
@section('content')
@include('client.modules.nav_menu')
<div class="col-md-12"{{--  style="margin-top: -30px;" --}}>
   <h2 class="section-title center">Human Resources</h2>
   <a href="/home">
      <i class="fa fa-arrow-circle-o-left" style="font-size: 40pt; padding: 5px; margin-bottom: -50px; float: left;"></i>
   </a>
</div>
@include('client.modules.human_resource.department_heads.modal.add_modal')
<div id="tabs">
   <ul class="nav nav-tabs" style="text-align: center;">
      {{-- <li><a href="/module/hr/analytics">Analytics</a></li> --}}
      <li><a href="/module/hr/applicants">Applicant(s)</a></li>
      <li><a href="/module/hr/employees">Employee(s)</a></li>
      {{-- <li><a href="/module/hr/background_check">Background Investigation Form</a></li> --}}
      <li><a href="/module/hr/applicant_exams">Applicant Exam(s)</a></li>
      <li><a href="/module/hr/exam_results">Exam Result(s)</a></li>
      <li class="active"><a href="/module/hr/department_head_list">Department Head(s)</a></li>
      <li><a href="/module/hr/designation">Designation(s)</a></li>
      <li><a href="/module/hr/training">Training(s)</a></li>
   </ul>
  {{-- <div id="datepairExample"><input type="text" class="date" name=""></div> --}}
   <div class="tab-content">
      <div class="tab-pane in active">
         <div class="row">
            <div class="col-sm-12 col-md-8 col-md-offset-2">
      <div class="inner-box featured">
         <h2 class="title-2">Department Heads List</h2>
         <div class="row">
            <div class="col-md-12">
               @if(session("message"))
               <div class='alert alert-success alert-dismissible'>
                  <button type='button' class='close' data-dismiss='alert'>&times;</button>
                  <center>{!! session("message") !!}</center>
               </div>
               @endif
               <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#add-depthead-modal" style="float: left; margin-bottom: -55px; z-index: 1;">
                  <i class="fa fa-plus"></i> ADD
               </a>
            </div>
            <div class="col-md-12">
               <table class="table" id="example">
                  <thead>
                     <tr>
                        <th>ID</th>
                        <th>Department</th>
                        <th>Department Head</th>
                        <th>Actions</th>
                     </tr>
                  </thead>
                  <tbody class="table-body">
                     @forelse($headlist as $row)
                     <tr>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->department }}</td>
                        <td>{{ $row->employee_name }}</td>
                        <td>
                           <a href="#" data-toggle="modal" data-target="#edit-deptheadlist-{{ $row->id }}">
                              <i class="fa fa-pencil icon-edit"></i>
                           </a>
                           <a href="#" data-toggle="modal" data-target="#delete-deptheadlist-{{ $row->id }}">
                              <i class="fa fa-trash icon-delete"></i> 
                           </a>
                        </td>
                     </tr>
                     @include('client.modules.human_resource.department_heads.modal.edit_modal')
                     @include('client.modules.human_resource.department_heads.modal.delete_modal')
                     @empty
                     <tr>
                        <td colspan="4">No Approver(s) Found.</td>
                     </tr>
                     @endforelse
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
         </div>
      </div>
   </div>
</div>
<style>
#tabs .nav-tabs > li {
   float: none;
   display: inline-block;
   /*zoom: 1;*/
}

.multi_step_form {
  display: block;
  overflow: hidden;
}
.multi_step_form #msform {
  position: relative;
  padding-top: 50px;
  min-height: 790px;
  /*max-width: 810px;*/
  margin: 0 auto;
  background: #ffffff;
  z-index: 1;
  text-align: center;
}
.multi_step_form #msform fieldset {
  border: 0;
  padding: 20px 105px 0;
  position: relative;
  width: 100%;
  left: 0;
  right: 0;
}
.multi_step_form #msform fieldset:not(:first-of-type) {
  display: none;
}
.multi_step_form #msform fieldset h3 {
  font: 500 18px/35px "Roboto", sans-serif;
  color: #3f4553;
}
.multi_step_form #msform fieldset h6 {
  font: 400 15px/28px "Roboto", sans-serif;
  color: #5f6771;
  padding-bottom: 30px;
}

.multi_step_form #msform fieldset .form-group {
  padding: 0 10px;
}
.multi_step_form #msform #progressbar {
  margin-bottom: 30px;
  overflow: hidden;
}
.multi_step_form #msform #progressbar li {
  list-style-type: none;
  color: #99a2a8;
  font-size: 9px;
  width: calc(100%/3);
  float: left;
  position: relative;
  font: 500 13px/1 "Roboto", sans-serif;
}
.multi_step_form #msform #progressbar li:nth-child(2):before {
  content: "\2713";
  text-align: center;
}
.multi_step_form #msform #progressbar li:nth-child(3):before {
  content: "\2713";
  text-align: center;
}
.multi_step_form #msform #progressbar li:nth-child(4):before {
  content: "\2713";
  text-align: center;
}
.multi_step_form #msform #progressbar li:before {
  content: "\2713";
  text-align: center;
  font: normal normal normal 30px/50px Ionicons;
  width: 50px;
  height: 50px;
  line-height: 50px;
  display: block;
  background: #eaf0f4;
  border-radius: 50%;
  margin: 0 auto 10px auto;
}
.multi_step_form #msform #progressbar li:after {
  content: '';
  width: 100%;
  height: 10px;
  background: #eaf0f4;
  position: absolute;
  left: -50%;
  top: 21px;
  z-index: -1;
}
.multi_step_form #msform #progressbar li {
  text-align: center;
}
.multi_step_form #msform #progressbar li:last-child:after {
  width: 150%;
}
.multi_step_form #msform #progressbar li.active {
  color: #5cb85c;
}
.multi_step_form #msform #progressbar li.active:before, .multi_step_form #msform #progressbar li.active:after {
  background: #5cb85c;
  color: white;
}
.multi_step_form #msform .action-button {
  background: #5cb85c;
  color: white;
  border: 0 none;
  border-radius: 5px;
  cursor: pointer;
  min-width: 130px;
  font: 700 14px/40px "Roboto", sans-serif;
  border: 1px solid #5cb85c;
  margin: 0 5px;
  text-transform: uppercase;
  display: inline-block;
}
.multi_step_form #msform .action-button:hover, .multi_step_form #msform .action-button:focus {
  background: #405867;
  border-color: #405867;
}
.multi_step_form #msform .previous_button {
  background: transparent;
  color: #99a2a8;
  border-color: #99a2a8;
}
.multi_step_form #msform .previous_button:hover, .multi_step_form #msform .previous_button:focus {
  background: #405867;
  border-color: #405867;
  color: #fff;
}

input, select{
  width: 100%;
  height: 35px;
}
textarea{width: 100%;}
</style>

@endsection

@section('script')
<script type="text/javascript" src="{{ asset('css/js/datepicker/jquery.timepicker.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/js/datepicker/jquery.timepicker.css') }}" />
<script type="text/javascript" src="{{ asset('css/js/datepicker/datepair.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/js/datepicker/jquery.datepair.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/js/datepicker/bootstrap-datepicker.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/js/datepicker/bootstrap-datepicker.css') }}" />
<script>
  $(document).ready(function(){
    $('#datepairExample .date').datepicker({
        'format': 'yyyy-mm-dd',
        'autoclose': true
    });

    // initialize datepair
    $('#datepairExample').datepair();

  $('#example').DataTable({
      "bLengthChange": false,
      "ordering": false,
      "dom": '<"top"f>rt<"bottom"ip><"clear">'
   });

   });
</script>

<script src="{{ asset('js/applicant_registration_wizard.js') }}"></script>
@endsection

