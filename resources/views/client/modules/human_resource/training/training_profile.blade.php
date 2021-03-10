@extends('client.app')
@section('content')
<style>
#tabs .nav-tabs > li {
   float: none;
   display: inline-block;
}
input, select{
   height: 35px;
   width: 100%;
}
textarea{
   width: 100%;
}
#eval-table td{
   vertical-align: middle;
}

#kpi-tree-table td{
   vertical-align: middle;
}


</style>

<div class="col-md-12" style="margin-top: -30px;">
   <h2 class="section-title center">Training details</h2>
   <a href="/module/hr/training">
      <i class="fa fa-arrow-circle-o-left" style="font-size: 40pt; padding: 5px;margin-top: -50px; margin-bottom: -50px; float: left;"></i>
   </a>
</div>
<input type="hidden" id="department-id" value="">
<div class="col-md-12">
   <div class="row">
      <div class="col-sm-12 col-md-10 col-md-offset-2">
      <div class="col-sm-10">
         <div class="inner-box featured">
            <h2 class="title-2">{{ $training->training_title }}</h2>
            <div class="row">
               <div class="col-sm-12">
                  <table style="width: 100%; font-size: 11pt;" border="0" class="table-responsive">
                    <tr>
                      <td class="line-height" style="padding-left: 20px; width: 30%;"><b>Training Description:</b></td>
                      <td class="line-height">{{ $training->training_desc}}</td>
                      <td class="line-height" style="padding-left: 10px; width: 10%;"><b>Training Date:</b></td>
                      <td class="line-height" style="width: 20%;">{{ $training->training_date }}</td>
                    </tr>
                    <tr>
                      <td class="line-height" style="padding-left: 20px; width: 30%;"><b>Department:</b></td>
                      <td class="line-height">{{ $training->department_name}}</td>
                      <td class="line-height" style="padding-left: 10px; width: 20%;"><b>Proposed By:</b></td>
                      <td class="line-height" style="width: 20%;">{{$training->proposed_by}}</td>
                    </tr>
                    <tr>
                      <td class="line-height" style="padding-left: 20px; width: 30%;"><b>Status:</b></td>
                      <td class="line-height">{{ $training->status}}</td>
                    </tr>
                    <tr >
                      <td class="line-height" style="padding-left: 20px; width: 30%;"><b>Remarks:</b></td>
                      <td  colspan="2" class="line-height">{{ $training->remarks}}</td>
                    </tr>
                  </table>
               <br>
               <h4>Attendees:</h4>
               <br>

               <div class="inner-box featured" style="padding: 2px 10px 2px 10px;">
                  <div class="row" style="padding-top: 0; padding-bottom: 0;">
                     <div class="box-inner">
                        <div class="col-md-12">
                            @forelse($attendees as $row)
                              <ul style="list-style-type: circle;">
                                 <li><label style="padding-left: 10px;">{{ $row->employee_name }}</label></li>
                                @empty
                                <label>No Records</label><br>
                              </ul>
                            @endforelse
                        </div>
                     </div>
                  </div>
               </div>

                  <div id="message-alert" style="padding: 10px;"></div>
                  <div id="kpi-setup-table"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


@endsection