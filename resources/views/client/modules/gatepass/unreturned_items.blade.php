@extends('client.app')
@section('content')
@include('client.modules.nav_menu')
<div class="col-md-12">
   <h2 class="section-title center">Gatepass</h2>
   <a href="/home">
      <i class="fa fa-arrow-circle-o-left" style="font-size: 40pt; padding: 5px; margin-bottom: -50px; float: left;"></i>
   </a>
</div>

<div id="tabs">
   <ul class="nav nav-tabs" style="text-align: center;">
      {{-- <li><a href="/module/gatepass/analytics">Analytics</a></li> --}}
      <li><a href="/client/gatepass/history">Gatepass History</a></li>
      <li class="active"><a href="/client/gatepass/unreturned_gatepass">Unreturned Gatepass Item(s)</a></li>
      <li><a href="/client/gatepass/employee_accountability">Employee Accountabilities</a></li>
      <li><a href="/client/gatepass/company_asset">Fixed Asset(s)</a></li>
   </ul>
   <div class="tab-content">
      <div class="tab-pane in active">
         <div class="row">
            <div class="inner-box featured">
               <h2 class="title-2">Unreturned Item(s)</h2>
                  <div class="row">
                              <div class="col-sm-6">
                                       <select style="width: 180px; margin-left: 3%;" id="selectEmpGatepassUnreturned" class="manageUnreturnedGatepassFltr">
                                          <option value="">All Employees</option>
                                          @forelse($employees as $employee)
                                          <option value="{{ $employee->user_id }}">{{ $employee->employee_name }}</option>
                                          @empty
                                          <option disabled>No Records Found.</option>
                                          @endforelse
                                       </select>
                                    </div>
                              <div class="col-sm-12" style="margin-top: 1%;">
                                 <div id="unreturned-gatepass-table"></div>
                              </div>
                           </div>
            </div>
                              
                             
                           </div>
      </div>
   </div>
</div>

@include('client.modals.unreturned_gatepass')

@endsection

@section('script')
<script>
   $(document).ready(function(){


         $.ajaxSetup({
      headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
   });

      loadUnreturnedGatepasses();

         $('#edit-unreturned-gatepass-form').on("submit", function(event){
      event.preventDefault();
      $.ajax({
         url:"/updateUnreturnedGatepass",
         type:"POST",
         data:$(this).serialize(),
            success:function(data){
               loadUnreturnedGatepasses();
               $.bootstrapGrowl("<center><i class=\"fa fa-check-square-o\" style=\"font-size: 30pt; float: left; padding-right: 10px;\"></i><span style=\"display:block; font-size: 12pt; padding-top: 5px;\">" + data.message + "</span></center>", {
                        type: 'success',
                        align: 'center',
                        delay: 4000,
                        width: 450,
                        offset: {from: 'top', amount: 300},
                        stackup_spacing: 20
                    });

               $('#unreturnedGatepassModal').modal('hide');
            }
        });
   });


      $(document).on('click', '#edit-unreturned-gatepass', function(event){
      event.preventDefault();
      var id = $(this).data('id');
      data = {'id' : id }
      $.ajax({  
            url:"/gatepass/getDetails",  
            data:data,  
            success:function(data){  
               $('#unreturnedGatepassModal .gatepass_id').val(data.gatepass_id);
               $('#unreturnedGatepassModal .gatepass-id').text(data.gatepass_id);
               $('#unreturnedGatepassModal .employee-name').text(data.employee_name);
                  $('#unreturnedGatepassModal .date-filed').text(data.date_filed);
                  $('#unreturnedGatepassModal .time').text(data.time);
                  $('#unreturnedGatepassModal .items').text(data.item_description);
                  $('#unreturnedGatepassModal .purpose').text(data.purpose);
                  $('#unreturnedGatepassModal .returned-on').text(data.returned_on);
                  $('#unreturnedGatepassModal .company-name').text(data.company_name);
                  $('#unreturnedGatepassModal .address').text(data.address);
                  $('#unreturnedGatepassModal .tel-no').text(data.tel_no);
                  $('#unreturnedGatepassModal .remarks').text(data.remarks);
                  $('#unreturnedGatepassModal .item-type').text(data.item_type);
                  $('#unreturnedGatepassModal .status').text(data.status);
                  $('#unreturnedGatepassModal .approved-by').text(data.approved_by);
                  $('#unreturnedGatepassModal .date-approved').text(data.approved_date);
                  var status = data.status;
                  switch (status.toLowerCase()){
                     case 'approved': 
                        $('#unreturnedGatepassModal .hidden-row').attr('hidden', false);
                        $("#unreturnedGatepassModal .status").html("<span class=\"label label-primary\"><i class=\"fa fa-thumbs-o-up\"></i> Approved</span>");
                        break;
                     case 'cancelled':
                     $('#unreturnedGatepassModal .hidden-row').attr('hidden', true);
                        $("#unreturnedGatepassModal .status").html("<span class=\"label label-danger\"><i class=\"fa fa-ban\"></i> Cancelled</span>");
                        break;
                     case 'disapproved': 
                     $('#unreturnedGatepassModal .hidden-row').attr('hidden', true);
                        $("#unreturnedGatepassModal .status").html("<span class=\"label label-danger\"><i class=\"fa fa-thumbs-o-down\"></i> Disapproved</span>");
                        break;
                     case 'deferred': 
                     $('#unreturnedGatepassModal .hidden-row').attr('hidden', true);
                        $("#unreturnedGatepassModal .status").html("<span class=\"label label-danger\"><i class=\"fa fa-thumbs-o-down\"></i> Deferred</span>");
                        break;
                     default:
                     $('#unreturnedGatepassModal .hidden-row').attr('hidden', true);
                        $("#unreturnedGatepassModal .status").html("<span class=\"label label-warning\"><i class=\"fa fa-clock-o\"></i> For Approval</span>");
                  }
            $('#unreturnedGatepassModal').modal('show');
            }
        });
   });

      function loadUnreturnedGatepasses(page){
      var employee = $('#selectEmpGatepassUnreturned').val();
      
      data = {
         employee : employee,
      }

      $.ajax({
         url: "/getUnreturnedGatepass?page="+page,
         data: data,
         success:function(data){
               $('#unreturned-gatepass-table').html(data);
            }
      });

   }


$('.manageUnreturnedGatepassFltr').on('change', function(){
      loadUnreturnedGatepasses();
   });

$(document).on('click', '#unreturned_gatepass_pagination a', function(event){
      event.preventDefault();
      var page = $(this).attr('href').split('page=')[1];
      loadUnreturnedGatepasses(page);
   });
   });
</script>

@endsection

<style>
#tabs .nav-tabs > li {
   float: none;
   display: inline-block;
   /*zoom: 1;*/
}
</style>