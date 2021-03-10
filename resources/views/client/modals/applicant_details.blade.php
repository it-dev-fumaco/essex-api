<!-- The Modal -->
<div class="modal fade" id="applicantDetails">
   <div class="modal-dialog modal-lg" style="width: 50%;">
      <form action="/updateExamineeStatus" method="POST">
         @csrf
      
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Applicant Details</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row" style="margin: 7px;">
               <input type="hidden" id="examinee_id">
               <input type="hidden" id="id" name="id">
               <input type="hidden" name="status" value="On Going">
               <div class="col-md-12">
                  Exam Title: <span id="examtitle"></span><br>
                  Applicant Name: <span id="applicantname"></span><br>
                  Exam Date: <span id="examdate"></span><br>
                  Duration in Minutes: <span id="duration"></span>
               </div>
            </div>
         </div>
         <!-- Modal footer -->
         <div class="modal-footer">
              <button type="submit" class="btn btn-primary" id="takeExam"><i class="fa fa-check"></i> Take Exam</button>
              <button type="button" class="btn btn-danger" id="closeAddQuestion" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
         </div>
         </form>
      </div>
   </div>
</div>


<!-- The Modal -->
<div class="modal fade" id="applicantSubmittedExam">
   <div class="modal-dialog modal-lg" style="width: 50%;">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Applicant Details</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row" style="margin: 7px;">
               <input type="hidden" id="examinee_id">
               <div class="col-md-12 text-center">
                  <span class="h3 text-center">You already took the exam!</span><br>
                  Exam Title: <span id="examtitle"></span><br>
                  Applicant Name: <span id="applicantname"></span><br>
                  Exam Date: <span id="examdate"></span><br>
                  Duration in Minutes: <span id="duration"></span>
               </div>
            </div>
         </div>
         <!-- Modal footer -->
         <div class="modal-footer">
              <button type="button" class="btn btn-danger" id="closeAddQuestion" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
         </div>
      </div>
   </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="applicantVerification">
   <div class="modal-dialog modal-lg" style="width: 50%;">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Alert</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row" style="margin: 7px;">
               <input type="hidden" id="examinee_id">
               <div class="col-md-12 text-center">
                  <span class="h3 text-center">Invalid Exam Code!</span><br>
                  
               </div>
            </div>
         </div>
         <!-- Modal footer -->
         <div class="modal-footer">
              <button type="button" class="btn btn-danger" id="closeAddQuestion" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
         </div>
      </div>
   </div>
</div>
