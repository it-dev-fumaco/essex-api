@extends('client.app')
@section('content')
@include('client.background_check.modals.crud_add_questions')
<div class="col-md-12" style="margin-top: -30px;">
   <a href="/home">
      <i class="fa fa-arrow-circle-o-left" style="font-size: 40pt; padding: 5px; margin-bottom: -50px; float: left;"></i>
   </a>
</div>
   <div class="tab-content">
      <div class="tab-pane in active" id="tab-applicants-list">
         <div class="row">
            <div class="inner-box featured">
               <h2 class="title-2">Background Investigation Question/s</h2>
               <div class="row">
                  <div class="col-md-12">
                     @if(session("message"))
                     <div class='alert alert-success alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <center>{!! session("message") !!}</center>
                     </div>
                     @endif
                  </div>
                  <div class="col-md-12">
                     <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addquestion" style="float: left; z-index: 1;">
                        <i class="fa fa-plus"></i> Question
                     </a>
                     <table class="table" id="example" style="font-size: 11pt;">
                        <thead>
                           <tr>
                              <th>ID</th>
                              <th>Question</th>
                              <th>Actions</th>
                           </tr>
                        </thead>
                        <tbody class="table-body">
                           @foreach($question as $questions)
                           <tr>
                           <td>{{ $questions->question_id }}</td>
                           <td>{{ $questions->question }}</td>
                           <td>
                              <a href="#" class="hover-icon"  data-toggle="modal" data-target="#edit-questions-{{ $questions->question_id }}">
                                 <i class="fa fa-pencil" style="font-size: 15pt; color: #27AE60;"></i>
                              </a>
                              <a href="" class="hover-icon">
                                 <i class="fa fa-eye" style="font-size: 15pt; color: #FFA500;"></i>
                              </a>
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="hover-icon"  data-toggle="modal" data-target="#delete-questions-{{ $questions->question_id }}">
                                 <i class="fa fa-close" style="font-size: 15pt; color: #C0392B;"></i> 
                              </a>
                           </td>
                           @include('client.background_check.modals.crud_edit_questions')
                           @include('client.background_check.modals.crud_delete_questions')
                           @endforeach
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection

@section('script')

<script type="text/javascript">
   $(document).ready(function(){
      $('#example').DataTable({
         "bLengthChange": false,
         "ordering": false,
         "dom": '<"top"f>rt<"bottom"ip><"clear">'
      });

      $('.modal').on('hidden.bs.modal', function(){
         $(this).find('form')[0].reset();
      });
   });
</script>
@endsection


<style>
#online-exam-tab .nav-tabs > li {
   float: none;
   display: inline-block;
   /*zoom: 1;*/
}
</style>

