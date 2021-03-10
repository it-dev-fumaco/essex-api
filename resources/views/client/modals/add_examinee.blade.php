<!-- The Modal -->
<div class="modal fade" id="add-examinee-modal">
   <div class="modal-dialog modal-lg" style="width: 50%;">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">New Examinee</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row" style="margin: 7px;">
               <form  id="add-examinee-form">
                  @csrf
                  <div class="form-group col-md-6">
                     <label>Department</label>
                     <select class="form-control department">
                      <option value="">Select Department</option>
                     @forelse($departments as $dept)
                        <option value="{{$dept->department_id}}">{{$dept->department}}</option>
                     @empty
                        <option disabled>No department(s) found.</option>
                      @endforelse
                     </select>
                  </div>
                  <div class="form-group col-md-6">
                     <label>Examinee</label>
                     <select name="user_id" class="form-control users"></select>
                  </div>
                  
                    <input type="hidden" name="exam_id" class="exam-id">
                    <div class="form-group col-md-6">
                       <label>Exam Date</label>
                       <input class="form-control" type="date" name="date_of_exam" placeholder="Enter Exam Date" min="{{date('Y-m-d')}}" value="{{date('Y-m-d')}}" required>
                    </div>
                    <div class="form-group col-md-6">
                       <label>Validity Date</label>
                       <input class="form-control" type="date" name="validity_date" placeholder="Enter Validity Date" min="{{date('Y-m-d')}}" value="{{date('Y-m-d')}}" required>
                    </div>
                  
            </div>
                  <div class="modal-footer">
                       <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
                       <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                  </div>
               </form>
         </div>
         <!-- Modal footer -->
      </div>
   </div>
</div>  