<div class="modal fade" id="edit-training-modal">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Training</h4>
         </div>
         <div class="modal-body">
            <form id="edit-form-training" action="/module/hr/edit_training" method="POST" >
            @csrf
               <input type="hidden" name="training_id" class="training_id">

               <div class="row" style="padding-top: 0;">
                  <div class="col-md-12">
                     <div class="inner-box featured" style="padding: 2px 10px 2px 10px;">
                        <div class="row" style="padding-top: 0; padding-bottom: 0;">
                           <div class="col-md-6">
                              <div class="form-group" style="width: 100%;">
                                 <label>Title:</label>
                                 <input type="text" name="training_title" class="training_title" placeholder="Title" required>
                              </div>
                              <div class="form-group" style="width: 100%;">
                                 <label>Description:</label>
                                 <input type="text" name="training_desc" class="training_desc" placeholder="Description" required>
                              </div>
                              <div class="form-group" style="width: 100%;">
                                 <label>Department:</label>
                                 <input type="hidden" name="department_name" class="department_name_edit" id="department_name_edit">
                                 @if(isset($departments))
                                 <select name="department" id="department_id" class="department_id" onchange="employeelist_edit()" required>
                                    <option value="" disabled>Select Department</option>
                                    <option value="All">All Employee</option>
                                    @forelse($departments as $department)
                                    <option value="{{ $department->department_id }}">{{ $department->department }}</option>
                                    @empty
                                    <option>No Department(s) Found.</option>
                                    @endforelse
                                 </select>
                                 @endif
                              </div>
                             
                           </div>
                           <div class="col-md-6">
                              
                              <div class="form-group" style="width: 100%;">
                                 <label>Proposed by:</label>
                                 <input type="text" name="proposed_by" class="proposed_by" placeholder="Proposed by" required>
                              </div>
                              <div class="form-group" style="width: 100%;">
                                 <label>Training Date:</label>
                                 <input type="date" name="training_date" class="training_date" placeholder="Enter Date" required>
                              </div>
                              <div class="form-group" style="width: 100%;">
                                 <label>Status:</label>
                                 <select name="training_status" class="training_status" required>
                                    <option value="">Select Status</option>
                                    <option value='Proposal'>Proposal</option>
                                    <option value='Implemented'>Implemented</option>
                                    <option value='Denied'>Denied</option>
                                    <option value='Cancelled'>Cancelled</option>
                                 </select>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group" style="width: 100%;">
                                 <label>REMARKS:</label>
                                 <textarea name="remarks" id="remarks_edit" class="remarks_edit" placeholder="Remarks" required></textarea>
                              </div>
                           </div>

                        </div>
                     </div>
                  </div>
                  
                  <div class="col-sm-12">
                     <a href="#" class="btn btn-primary add-row">
                        <i class="fa fa-plus"></i> Attendee
                     </a>
                     <div id="old_ids"></div>
                        <table class="table" id="designation-table">
                           <thead>
                              <tr>
                                 <th style="width: 5%; text-align: center;">No.</th>
                                 <th style="width: 70%; text-align: center;">Employee Name</th>
                                 <th style="width: 5%; text-align: center;"></th>
                              </tr>
                         </thead>
                         <tbody class="table-body">
                              <tr>
                           
                              </tr>
                           </tbody>
                        </table>
                  </div>

               </div>
            
            <div class="modal-footer" style="margin-top: -30px;">
               <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
               <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            </div>
         </form>
         </div>
      </div>
   </div>
</div>
