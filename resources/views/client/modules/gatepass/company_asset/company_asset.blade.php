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
      <li><a href="/client/gatepass/unreturned_gatepass">Unreturned Gatepass Item(s)</a></li>
      <li><a href="/client/gatepass/employee_accountability">Employee Accountabilities</a></li>
      <li class="active"><a href="/client/gatepass/company_asset">Fixed Asset(s)</a></li>
   </ul>
   <div class="tab-content">
      <div class="tab-pane in active" id="tab-applicants-list">
         <div class="row">
            <div class="inner-box featured">
               <h2 class="title-2">Asset List(s)</h2>
               <div class="row">
                  <div class="col-md-12">
                     @if(empty($assets))
                     <div class='alert alert-danger alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <center>{{ $me }}</center>
                     </div>
                     @endif

                  </div>
                  <div class="col-md-12">
                     <table class="table" id="example">
                        <thead>
                           <tr>
                              <th>Item Code</th>
                              <th>Name</th>
                              <th>Description</th>
                              <th>Qty</th>
                              <th>Classification</th>
                              <th>Status</th>
                              
                         
                           </tr>
                        </thead>
                        <tbody class="table-body">
                        @if(empty($assets))
                        @else
                       @foreach($assets as $row) 
                        <tr>
                        <td width="10%">{{ $row->item_code }}</td>   
                        <td>{{ $row->name }}</td>
                        <td>Description:{{ $row->description }}<br>
                        Purchase Date:{{ $row->purchase_date }}<br>
                        Purchase Order no:{{ $row->purchase_order}}<br></td>
                        <td>{{ (int)$row->quantity }}</td>
                        <td>{{ $row->asset_category }}</td>
                        <td>{{ $row->status }}</td>

                        </tr>                 
                        @endforeach
                        @endif
                        </tbody>
                     </table>
                  </div>
                     
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>



@endsection

@section('script')
<script>
$(document).ready(function() {
$('#example').DataTable({
      "bLengthChange": false,
      "ordering": false,
      "dom": '<"top"f>rt<"bottom"ip><"clear">'
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