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
      <li class="active"><a href="/client/gatepass/history">Gatepass History</a></li>
      <li><a href="/client/gatepass/unreturned_gatepass">Unreturned Gatepass Item(s)</a></li>
      <li><a href="/client/gatepass/employee_accountability">Employee Accountabilities</a></li>
      <li><a href="/client/gatepass/company_asset">Fixed Asset(s)</a></li>
   </ul>
   <div class="tab-content">
      <div class="tab-pane in active">
         <div class="row">
            <div class="inner-box featured">
               <h2 class="title-2">Gatepass History</h2>
                  <div class="row">
                     <div class="col-md-12">
                                       <select style="width: 180px; margin-left: 3%;" id="selectEmpGatepass" class="manageGatepassFltr">
                                          <option value="">All Employees</option>
                                          @forelse($employees as $employee)
                                          <option value="{{ $employee->user_id }}">{{ $employee->employee_name }}</option>
                                          @empty
                                          <option disabled>No Records Found.</option>
                                          @endforelse
                                       </select>
                                       <select style="width: 180px; margin-left: 3%;" id="itemTypeGatepass" class="manageGatepassFltr">
                                          <option value="">All Item Types</option>
                                          <option value="Returnable">Returnable</option>
                                          <option value="Unreturnable">Unreturnable</option>
                                       </select>
                     </div>
                      <div class="col-sm-12" style="margin-top: 1%;">
                                 <div id="manage-gatepass-table"></div>
                              </div>
                  </div>
            </div>
                              
                             
                           </div>
      </div>
   </div>
</div>
<iframe id="iframe-print" hidden></iframe>

@include('client.modals.view_gatepass')

@endsection

@section('script')
<script>
   $(document).ready(function(){
      $(document).on('click', '#printGatepass', function(event){
      event.preventDefault();
      var id = $(this).data('id');
      $("#iframe-print").attr("src", "/printGatepass/" + id);
      $('#iframe-print').load(function(){
         $(this).get(0).contentWindow.print();
      });
   });


         $.ajaxSetup({
      headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
   });

      loadFiledGatepasses();

      function loadFiledGatepasses(page){
      // var start = $('#manageNotice_start').val();
      // var end = $('#manageNotice_end').val();
      var employee = $('#selectEmpGatepass').val();
      var item_type = $('#itemTypeGatepass').val();
      
      data = {
      //    start : start,
      //    end : end,
         employee : employee,
         item_type : item_type,
      }

      $.ajax({
         url: "/getGatepasses?page="+page,
         data: data,
         success:function(data){
               $('#manage-gatepass-table').html(data);
            }
      });
   }

   $('.manageGatepassFltr').on('change', function(){
      loadFiledGatepasses();
   });

   $(document).on('click', '#manage_gatepass_pagination a', function(event){
      event.preventDefault();
      var page = $(this).attr('href').split('page=')[1];
      loadFiledGatepasses(page);
   });
$(document).on('click', '#view-gatepass', function(event){
      event.preventDefault();
      var id = $(this).data('id');
      data = {'id' : id }
      $.ajax({  
            url:"/gatepass/getDetails",  
            data:data,  
            success:function(data){  
               $('#viewGatepassModal .gatepass-id').text(data.gatepass_id);
               $('#viewGatepassModal .employee-name').text(data.employee_name);
                  $('#viewGatepassModal .date-filed').text(data.date_filed);
                  $('#viewGatepassModal .time').text(data.time);
                  $('#viewGatepassModal .items').text(data.item_description);
                  $('#viewGatepassModal .purpose').text(data.purpose);
                  $('#viewGatepassModal .returned-on').text(data.returned_on);
                  $('#viewGatepassModal .company-name').text(data.company_name);
                  $('#viewGatepassModal .address').text(data.address);
                  $('#viewGatepassModal .tel-no').text(data.tel_no);
                  $('#viewGatepassModal .remarks').text(data.remarks);
                  $('#viewGatepassModal .item-type').text(data.item_type);
                  $('#viewGatepassModal .status').text(data.status);
                  $('#viewGatepassModal .approved-by').text(data.approved_by);
                  $('#viewGatepassModal .date-approved').text(data.approved_date);
                  var status = data.status;
                  switch (status.toLowerCase()){
                     case 'approved': 
                        $('#viewGatepassModal .hidden-row').attr('hidden', false);
                        $("#viewGatepassModal .status").html("<span class=\"label label-primary\"><i class=\"fa fa-thumbs-o-up\"></i> Approved</span>");
                        break;
                     case 'cancelled':
                     $('#viewGatepassModal .hidden-row').attr('hidden', true);
                        $("#viewGatepassModal .status").html("<span class=\"label label-danger\"><i class=\"fa fa-ban\"></i> Cancelled</span>");
                        break;
                     case 'disapproved': 
                     $('#viewGatepassModal .hidden-row').attr('hidden', true);
                        $("#viewGatepassModal .status").html("<span class=\"label label-danger\"><i class=\"fa fa-thumbs-o-down\"></i> Disapproved</span>");
                        break;
                     case 'deferred': 
                     $('#viewGatepassModal .hidden-row').attr('hidden', true);
                        $("#viewGatepassModal .status").html("<span class=\"label label-danger\"><i class=\"fa fa-thumbs-o-down\"></i> Deferred</span>");
                        break;
                     default:
                     $('#viewGatepassModal .hidden-row').attr('hidden', true);
                        $("#viewGatepassModal .status").html("<span class=\"label label-warning\"><i class=\"fa fa-clock-o\"></i> For Approval</span>");
                  }
            $('#viewGatepassModal').modal('show');
            }
        });
      
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