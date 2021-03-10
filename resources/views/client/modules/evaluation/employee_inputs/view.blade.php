@extends('client.app')
@section('content')
<div class="col-md-12" style="margin-top: -30px;">
   <a href="/evaluation/employee_inputs">
      <i class="fa fa-arrow-circle-o-left" style="font-size: 40pt; padding: 5px; margin-top: -21px; float: left;"></i>
   </a>
   <h2 class="section-title center" style="padding: 0;">Employee Data Input</h2>
</div>
<form action="/updateEmpInputs" method="POST">
   @csrf
   <input type="hidden" name="metric_type" value="employee_input">
<div class="row">
   <div class="col-md-12 col-sm-12">
      <div class="inner-box featured" id="form">
         <h2 class="title-2">{{ $department_name }}</h2>
         <div class="row">
            <div class="col-md-12">
               @if(session("message"))
               <div class='alert alert-success alert-dismissible'>
                  <button type='button' class='close' data-dismiss='alert'>&times;</button>
                  <center>{!! session("message") !!}</center>
               </div>
               @endif
               <table class="table table-bordered" id="inputs-table">
                  <col style="width: 8%;">
                  <col style="width: 64%;">
                  <col style="width: 20%;">
                  <col style="width: 8%;">
                  @foreach($employee_data_inputs as $i => $kpi)
                  <tr>
                     <td colspan="4" style="font-size: 12pt; background-color: #D7DBDD;"><b>{{ $i + 1 }}. {{ $kpi['kpi_description'] }}</b></td>
                  </tr>
                  @foreach($kpi['designation_metrics'] as $des)
                     <tbody>
                     <tr>
                        <td class="center">
                           <a href="#" class="btn btn-primary add-row" data-kpi="{{ $kpi['id'] }}" data-des="{{ $des['designation_id'] }}" style="padding: 5px 10px;">
                              <i class="fa fa-plus" style="margin: 0;"></i>
                           </a>
                        </td>
                        <td colspan="3" style="font-size: 12pt; font-weight: bold;">{{ $des['designation_name'] }}</td>
                     </tr>
                     @foreach($des['metrics'] as $metric)
                     <input type="hidden" name="old_metric_id[]" value="{{ $metric->metric_id }}">
                     <tr>
                        <td></td>
                        <td class="center">
                           <input type="hidden" name="metric_id[]" value="{{ $metric->metric_id }}" required>
                           <input type="text" name="input_details[]" value="{{ $metric->metric_description }}" required>
                           <input type="hidden" name="kpi[]" value="{{ $kpi['id'] }}" required>
                           <input type="hidden" name="designation[]" value="{{ $des['designation_id'] }}" required>
                        </td>
                        <td>
                           <select name="schedule[]" required>
                              <option value="Monthly" {{ $metric->entry_schedule == 'Monthly' ? 'selected' : '' }}>Monthly</option>
                              <option value="Quarterly" {{ $metric->entry_schedule == 'Quarterly' ? 'selected' : '' }}>Quarterly</option>
                              <option value="Annually" {{ $metric->entry_schedule == 'Annually' ? 'selected' : '' }}>Annually</option>
                           </select>
                        </td>
                        <td class="center"><a class="delete" href="#"><i class="fa fa-trash"></i></a></td>
                     </tr>
                     @endforeach
                  </tbody>
                  <tbody></tbody>
                  @endforeach
                  @endforeach
               </table>
            </div>
            <div class="col-md-12" style="text-align: center;">
               <button type="submit" class="btn btn-primary">
                  <i class="fa fa-check"></i> Save
               </button>
            </div>
         </div>
      </div>
   </div>
</div>
</form>

<style>
   input[type='text'], input[type='number'], select{
      height: 35px;
      width: 100%;
      padding: 3px;
   }
   textarea{
      width: 100%;
      padding: 3px;
   }
   #inputs-table td{
      vertical-align: middle;
   }
   #inputs-table .fa-trash{
      color: #A93226;
      font-size: 13pt;
   }
</style>

@endsection

@section('script')
<script>
   $(document).ready(function(){
      $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
      });

      $('.add-row').on('click', function(e){
         e.preventDefault();
         var kpi = $(this).data('kpi');
         var des = $(this).data('des');
         var row = '<tr>' +
               '<td></td>' +
               '<td class="center">' +
               '<input type="text" name="new_input_details[]" required>' +
               '<input type="hidden" name="new_kpi[]" value="'+kpi+'" required>' +
               '<input type="hidden" name="new_designation[]" value="'+des+'" required></td>' +
               '<td class="center"><select name="new_schedule[]" required><option value="Monthly">Monthly</option><option value="Quarterly">Quarterly</option><option value="Annually">Annually</option></select></td>' +
               '<td class="center"><a class="delete" href="#"><i class="fa fa-trash"></i></a></td>' +
            '</tr>';

         $(this).closest('tbody').append(row);
      });

      $(document).on("click", ".delete", function(e){
         e.preventDefault();
        $(this).parents("tr").remove();
      });
   });
</script>
@endsection