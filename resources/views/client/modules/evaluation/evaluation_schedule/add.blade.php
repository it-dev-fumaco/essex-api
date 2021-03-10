<div class="modal fade" id="add-eval-sched-modal">
   <div class="modal-dialog modal-md">
      <form action="/evaluation/schedule/new" method="post" autocomplete="off">
         @csrf
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">New Evaluation Schedule</h4>
         </div>
         <div class="modal-body">
            <div class="row" style="margin: 0; margin-top: -20px;">
               <div class="col-md-6">
                  <div class="form-group">
                     <label>Period:</label>
                     <select name="period" required>
                        <option value="">-- Select Period --</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Quarterly">Quarterly</option>
                        <option value="Semi-Annual">Semi-Annual</option>
                        <option value="Annual">Annual</option>
                     </select>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label>Year:</label>
                     <select name="year" required>
                        <option value="">-- Select Year --</option>
                        @forelse($year_list as $row)
                        <option value="{{ $row->year }}">{{ $row->year }}</option>
                        @empty
                        <option value="">No record(s) found.</option>
                        @endforelse
                     </select>
                  </div>
               </div>
               <div class="col-md-6" id="datepairExample">
                  <div class="form-group">
                     <label>Start Date:</label>
                     <input type="text" name="start_date" class="date" value="{{ date('Y-m-d') }}" required>
                  </div>
               </div>
               <div class="col-md-6" id="datepairExample">
                  <div class="form-group">
                     <label>Is Active:</label>
                     <input type="checkbox" name="is_active" checked>
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-footer" style="margin-top: -25px;">
            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
         </div>
      </div>
      </form>
   </div>
</div>