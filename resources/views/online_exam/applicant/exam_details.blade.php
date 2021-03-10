<!-- The Modal -->
<div class="modal fade" id="exam-details-modal">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title text-center">Applicant Examination Details</h4>
         </div>
         <form id="update-examinee-details-form">
         <div class="modal-body">
            <div class="row" style="margin: 7px;">
               <input type="hidden" name="start_time" id="start-time">
               <input type="hidden" name="status" value="On Going">
               <input type="hidden" name="date_taken" value="{{ date('Y-m-d') }}">
               <input type="hidden" name="examinee_id" value="{{ $examinee->examinee_id }}">
               <div class="col-md-12">
                  Applicant Name: <b>{{ $examinee->employee_name }}</b><br>
                  Exam Title: <b>{{ $examinee->exam_title }}</b><br>
                  Duration: <b>{{ $examinee->duration_in_minutes }} min(s)</b>
                  <div class="row">
                     <div class="col-md-12">
                        Exam types are composed of the following:
                     </div>
                     @foreach($active_exam_types as $data)
                     <div class="col-md-6">
                        <span style="margin-left: 10px;">
                           <i class="fa fa-angle-double-right"></i> <b>{{ $data['title'] }}</b>
                        </span>
                     </div>
                     @endforeach
                  </div>
               </div>
               <div class="col-md-12" style="margin-top: 10px; text-align: center;">
                  <div style="font-size: 12pt; font-style: italic;">Click 'Start Exam' to begin.</div>
               </div>
            </div>
         </div>
         </form>
         <!-- Modal footer -->
         <div class="modal-footer" style="text-align: center;">
               <button class="btn btn-primary" id="start-exam-btn">
                  <i class="fa fa-check"></i> Start Exam
               </button>
         </div>
      </div>
   </div>
</div>