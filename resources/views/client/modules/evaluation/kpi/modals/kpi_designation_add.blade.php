<div class="modal fade" id="add-kpi-modal">
   <div class="modal-dialog modal-lg">
      <form id="add-kpi-form">
         @csrf
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Create KPI</h4>
         </div>
         <div class="modal-body">
            <div class="row" style="margin: 7px; margin-top: -20px;">
               <div class="col-sm-6">
                  <div class="form-group">
                     <label>Objective:</label>
                     <select name="objective" required>
                        <option value="">Select Objective</option>
                        @forelse($objective_list as $row)
                        <option value="{{ $row->obj_id }}">{{ $row->obj_description }}</option>
                        @empty
                        <option value="">No Objective(s) Found.</option>
                        @endforelse
                     </select>
                  </div>
               </div>
               <div class="col-sm-3">
                  <div class="form-group">
                     <label>Evaluation Period:</label>
                     <select name="period" required>
                        <option value="">-- Select Period --</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Quarterly">Quarterly</option>
                        <option value="Semi-Annual">Semi-Annual</option>
                        <option value="Annual">Annual</option>
                     </select>
                  </div>
               </div>
               <div class="col-sm-3">
                  <div class="form-group">
                     <label>Category:</label>
                     <select name="category" required>
                        <option value="Quantitative">Quantitative</option>
                        <option value="Qualitative">Qualitative</option>
                     </select>
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <label>KPI:</label>
                     <textarea name="kpi_description" rows="4" required></textarea>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="form-group">
                     <label>Target %:</label>
                     <input type="number" name="target" step="0.01" required>
                  </div>
               </div> 
               <div class="col-md-3">
                  <div class="form-group">
                     <label>Weight Average %:</label>
                     <input type="number" name="weight_average" step="0.01" required>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label>Formula:</label>
                     <input type="text" name="formula" required>
                  </div>
               </div> 
              
               
               <div class="col-sm-6">
               <input type="checkbox" id="set_kpi_perdepartment" name="set_kpi_perdepartment" value="1">
               <label for="set_kpi_perdepartment">Note: Check (<i class="fa fa-check"></i>)
                If KPI is per department</label>
</div>


               <div class="col-sm-6" style="float: right;">
               <input type="checkbox" id="set_kpi_manual" name="set_kpi_manual" class="set_kpi_manual" value="1">
               <label for="set_kpi_manual">Note: Check (<i class="fa fa-check"></i>)
                If Manual Data Input Result</label>
               </div>




                  
               
               <div class="col-sm-12">
                  <a href="#" class="btn btn-primary add-row">
                     <i class="fa fa-plus"></i> Add
                  </a>
                  <table class="table" id="designation-table">
                     <thead>
                        <tr>
                           <th style="width: 5%; text-align: center;">No.</th>
                           <th style="width: 70%; text-align: center;">Designation</th>
                           <th style="width: 5%; text-align: center;"></th>
                        </tr>
                     </thead>
                     <tbody class="table-body">
                        <tr>
                           <td>1</td>
                           <td>
                              <select name="kpi_designation_new[]">
                                 <option value="">--Select Designation--</option>
                                 @forelse($designation_list as $row)
                                 <option value="{{ $row->des_id }}">{{ $row->designation }}</option>
                                 @empty
                                 @endforelse
                              </select>
                           </td>
                           <td><a class="delete"><i class="fa fa-trash icon-delete"></i></a></td>
                        </tr>
                     </tbody>
                  </table>
               </div>             
            </div>
         </div>
         <input type="hidden" name="department" value="{{$dept_details->department_id}}">
         <div class="modal-footer" style="margin-top: -30px;">
            <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Submit</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
         </div>
      </div>
      </form>
   </div>
</div>
<style type="text/css">
   input[type=checkbox] + label {
  display: block;
  margin: 0.2em;
  cursor: pointer;
  padding: 0.2em;
}

input[type=checkbox] {
  display: none;
}

input[type=checkbox] + label:before {
  content: "\2714";
  border: 0.20px solid #000;
  border-radius: 0.2em;
  display: inline-block;
  width: 20px;
  height: 20px;
  padding-left: 0.2em;
  padding-bottom: 0.3em;
  margin-right: 0.2em;
  vertical-align: bottom;
  color: transparent;
  transition: .2s;
}

input[type=checkbox] + label:active:before {
  transform: scale(0);
}

input[type=checkbox]:checked + label:before {
  background-color: MediumSeaGreen;
  border-color: MediumSeaGreen;
  color: #fff;
}

input[type=checkbox]:disabled + label:before {
  transform: scale(20px);
  border-color: #aaa;
}

input[type=checkbox]:checked:disabled + label:before {
  transform: scale(20px);
  background-color: #bfb;
  border-color: #bfb;
}
</style>