<div class="modal fade" id="add-training-modal">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">New Training</h4>
         </div>
         <div class="modal-body">
            <form action="/module/hr/add_training" method="POST" autocomplete="off" enctype="multipart/form-data">
            @csrf
               <div class="row" style="padding-top: 0;">
                  <div class="col-md-12">
                     <div class="inner-box featured" style="padding: 2px 10px 2px 10px;">
                        <div class="row" style="padding-top: 0; padding-bottom: 0;">
                           <div class="col-md-6">
                              <div class="form-group">
                                 <label>Title:</label>
                                 <input type="text" name="training_title" placeholder="Title" required>
                              </div>
                              <div class="form-group">
                                 <label>Description:</label>
                                 <input type="text" name="training_desc" placeholder="Description" required>
                              </div>
                              <div class="form-group">
                                 <label>Department:</label>
                                 <input type="hidden" name="department_name" class="department_name_add" id="department_name_add">
                                 @if(isset($departments))
                                 <select name="department" id="department" class="department" required onchange="employeelist()">
                                    <option value="null">Select Department</option>
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
                              
                              <div class="form-group">
                                 <label>Proposed by:</label>
                                 <input type="text" name="proposed_by" placeholder="Proposed by" required>
                              </div>
                              <div class="form-group">
                                 <label>Training Date:</label>
                                 <input type="date" name="training_date" placeholder="Enter Date" required>
                              </div>
                              <div class="form-group">
                                 <label>Status:</label>
                                 <select name="training_status" required>
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
                                 <textarea name="remarks" placeholder="Remarks" required></textarea>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  
                  <div class="col-sm-12">
                     <a href="#" class="btn btn-primary add-row">
                      <i class="fa fa-plus"></i> Attendee
                     </a>
                        <table class="table" id="attendies_table">
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
            </div>
            <div class="modal-footer" style="margin-top: -30px;">
               <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
               <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
            </div>
         </form>
      </div>
   </div>
</div>
