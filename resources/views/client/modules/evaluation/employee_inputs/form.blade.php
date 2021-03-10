{{-- @extends('client.app')
@section('content')
<div class="col-md-12" style="margin-top: -30px;">
   <a href="/evaluation/employee_inputs">
      <i class="fa fa-arrow-circle-o-left" style="font-size: 40pt; padding: 5px; margin-top: -21px; float: left;"></i>
   </a>
   <h2 class="section-title center" style="padding: 0;">Employee Data Input</h2>
</div>
<form action="/createEmpInputs" method="POST">
   @csrf
<div class="row">
   <div class="col-md-12 col-sm-12">
      <div class="inner-box featured" id="form">
         <h2 class="title-2">{{ $department_name }}</h2>
         <div class="row">
            <div class="col-md-12">
               <table class="table table-bordered" id="inputs-table">
                  <col style="width: 8%;">
                  <col style="width: 64%;">
                  <col style="width: 20%;">
                  <col style="width: 8%;">
                  @foreach($kpi_data as $i => $kpi)
                  <tr>
                     <td colspan="4" style="font-size: 12pt; background-color: #D7DBDD;"><b>{{ $i + 1 }}. {{ $kpi['description'] }}</b></td>
                  </tr>
                  @foreach($designation_list as $row)
                     <tbody>
                     <tr>
                        <td class="center">
                           <a href="#" class="btn btn-primary add-row" data-kpi="{{ $kpi['id'] }}" data-des="{{ $row->des_id }}" style="padding: 5px 10px;">
                              <i class="fa fa-plus" style="margin: 0;"></i>
                           </a>
                        </td>
                        <td colspan="3" style="font-size: 12pt; font-weight: bold;">{{ $row->designation }}</td>
                     </tr>
                     <tr>
                        <td></td>
                        <td class="center">
                           <input type="text" name="input_details[]" required>
                           <input type="hidden" name="kpi[]" value="{{ $kpi['id'] }}" required>
                           <input type="hidden" name="designation[]" value="{{ $row->des_id }}" required>
                        </td>
                        <td>
                           <select name="schedule[]" required>
                              <option value="Monthly">Monthly</option>
                              <option value="Quarterly">Quarterly</option>
                              <option value="Annually">Annually</option>
                           </select>
                        </td>
                        <td class="center"><a class="delete" href="#"><i class="fa fa-trash"></i></a></td>
                     </tr>
                  </tbody>
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
               '<input type="text" name="input_details[]" required>' +
               '<input type="hidden" name="kpi[]" value="'+kpi+'" required>' +
               '<input type="hidden" name="designation[]" value="'+des+'" required></td>' +
               '<td class="center"><select name="schedule[]" required><option value="Monthly">Monthly</option><option value="Quarterly">Quarterly</option><option value="Annually">Annually</option></select></td>' +
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
@endsection --}}