<div class="modal fade" id="edit-eval-sched-modal{{ $row->eval_sched_id }}">
   <div class="modal-dialog modal-md">
      <form action="/evaluation/schedule/{{ $row->eval_sched_id }}/update" method="post" autocomplete="off">
         @csrf
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit Evaluation Schedule</h4>
         </div>
         <div class="modal-body">
            <div class="row" style="margin: 0; margin-top: -20px;">
               <div class="col-md-6">
                  <div class="form-group">
                     <label>Period:</label>
                     <select name="period" required>
                        <option value="">-- Select Period --</option>
                        <option value="Monthly"{{ $row->period == 'Monthly' ? 'selected' : '' }}>Monthly</option>
                        <option value="Quarterly"{{ $row->period == 'Quarterly' ? 'selected' : '' }}>Quarterly</option>
                        <option value="Semi-Annual"{{ $row->period == 'Semi-Annual' ? 'selected' : '' }}>Semi-Annual</option>
                        <option value="Annual"{{ $row->period == 'Annual' ? 'selected' : '' }}>Annual</option>
                     </select>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label>Year:</label>
                     <select name="year" required>
                        <option value="">-- Select Year --</option>
                        @forelse($year_list as $row_yr)
                        <option value="{{ $row_yr->year }}" {{ $row->year == $row_yr->year ? 'selected' : '' }}>{{ $row_yr->year }}</option>
                        @empty
                        <option value="">No record(s) found.</option>
                        @endforelse
                     </select>
                  </div>
               </div>
               <div class="col-md-6" id="datepairExample">
                  <div class="form-group">
                     <label>Start Date:</label>
                     <input type="text" name="start_date" class="date" value="{{ $row->start_date }}" required>
                  </div>
               </div>
               <div class="col-md-6" id="datepairExample">
                  <div class="form-group">
                     <label>Is Active:</label>
                     <input type="checkbox" name="is_active" {{ $row->is_active == 1 ? 'checked' : '' }}>
                  </div>
               </div>
               <div style="font-size: 8pt; padding-right: 3%;float: right;">
               <i>Last modified: <b>{{ $row->updated_at }} </b> -{{ $row->last_modified_by }} </i>
               </div>
            </div>
         </div>
         <div class="modal-footer" style="margin-top: -25px;">
            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Update</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
         </div>
      </div>
      </form>
   </div>
</div>