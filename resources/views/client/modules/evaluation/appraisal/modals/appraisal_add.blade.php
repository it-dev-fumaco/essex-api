<div class="modal fade" id="create-appraisal-modal">
   <div class="modal-dialog modal-md">
      <form action="/createAppraisal" method="post">
         @csrf
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Create Performance Appraisal</h4>
         </div>
         <div class="modal-body">
            <div class="row" style="margin: 0; margin-top: -20px;">
               <div class="col-md-6">
                  <div class="form-group">
                     <label>Employee:</label>
                     <select name="employee" required>
                        <option value="">Select Employee</option>
                        @foreach($employee_list as $row)
                        <option value="{{ $row->user_id }}">{{ $row->employee_name }}</option>
                        @endforeach
                     </select>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label>Purpose:</label>
                     <select name="purpose" required>
                        <option value="">Select Purpose</option>
                        <option value="Periodic Review">Periodic Review</option>
                        <option value="Nomination">Nomination</option>
                        <option value="Regularization">Regularization</option>
                        <option value="Promotion">Promotion</option>
                        <option value="Confirmation">Confirmation</option>
                        <option value="Extension">Extension</option>
                     </select>
                  </div>
               </div>
               <div class="col-md-12" id="datepairExample">
                  <div class="form-group">
                     <label>Evaluation Period:</label>
                     <div>
                        <select name="period_from_month" style="width: 30%;">
                           <option value="01">January</option>
                           <option value="02">February</option>
                           <option value="03">March</option>
                           <option value="04">April</option>
                           <option value="05">May</option>
                           <option value="06">June</option>
                           <option value="07">July</option>
                           <option value="08">August</option>
                           <option value="09">September</option>
                           <option value="10">October</option>
                           <option value="11">November</option>
                           <option value="12">December</option>
                        </select>
                        <select name="period_from_year" style="width: 15%;">
                           <option value="2019" {{ date('Y') == 2019 ? 'selected' : '' }}>2019</option>
                           <option value="2020" {{ date('Y') == 2020 ? 'selected' : '' }}>2020</option>
                           <option value="2021" {{ date('Y') == 2021 ? 'selected' : '' }}>2021</option>
                           <option value="2022" {{ date('Y') == 2022 ? 'selected' : '' }}>2022</option>
                           <option value="2023" {{ date('Y') == 2023 ? 'selected' : '' }}>2023</option>
                        </select>
                        <div style="width: 6%; display: inline-block; text-align: center;" ><i class="fa fa-long-arrow-right" aria-hidden="true"></i></div>
                        <select name="period_to_month" style="width: 30%;">
                           <option value="01">January</option>
                           <option value="02">February</option>
                           <option value="03">March</option>
                           <option value="04">April</option>
                           <option value="05">May</option>
                           <option value="06">June</option>
                           <option value="07">July</option>
                           <option value="08">August</option>
                           <option value="09">September</option>
                           <option value="10">October</option>
                           <option value="11">November</option>
                           <option value="12">December</option>
                        </select>
                        <select name="period_to_year" style="width: 15%;">
                           <option value="2019" {{ date('Y') == 2019 ? 'selected' : '' }}>2019</option>
                           <option value="2020" {{ date('Y') == 2020 ? 'selected' : '' }}>2020</option>
                           <option value="2021" {{ date('Y') == 2021 ? 'selected' : '' }}>2021</option>
                           <option value="2022" {{ date('Y') == 2022 ? 'selected' : '' }}>2022</option>
                           <option value="2023" {{ date('Y') == 2023 ? 'selected' : '' }}>2023</option>
                        </select>
                     </div>
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