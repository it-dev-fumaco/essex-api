@extends('client.app')
@section('content')
@include('client.modules.nav_menu')
<div class="col-md-12"{{--  style="margin-top: -30px;" --}}>
   <h2 class="section-title center">Evaluations</h2>
   {{-- <a href="/home">
      <i class="fa fa-arrow-circle-o-left" style="font-size: 40pt; padding: 5px; margin-bottom: -50px; float: left;"></i>
   </a> --}}
</div>


<div class="tab-content">
   <div class="tab-pane in active">
      <div class="row">
         <div class="col-sm-12 col-md-12">
            <div class="inner-box featured">
               <h2 class="title-2">Employee Data Input Overview</h2>
               <div class="row">
                  <div class="col-md-12" id="message-alert" style="margin-top: 10px;">
                     @if(session("message"))
                     <div class='alert alert-success alert-dismissible'>
                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <center>{!! session("message") !!}</center>
                     </div>
                     @endif
                  </div>
                  <div style="padding-left: 5%;" class="col-sm-8">
                     <label style="width: 15%">Department :</label>
                     <select style="width: 30%;" name="dept" id="dept" onchange="overview_table()">
                           @foreach($department_heads as $row)
                              <option value="{{ $row->department_id }}">{{ $row->department }} </option>
                           @endforeach
                  
                     </select>
                     
                  </div>
                  <div class="col-sm-4">
                  <label style="width: 15%">Month :</label>
                     <select style="width: 20%;" name="dept" id="dept" onchange="overview_table()">
                        <option value="01" {{ date('m') == '01' ? 'selected' : '' }}>January</option>
               <option value="02" {{ date('m') == '02' ? 'selected' : '' }}>February</option>
               <option value="03" {{ date('m') == '03' ? 'selected' : '' }}>March</option>
               <option value="04" {{ date('m') == '04' ? 'selected' : '' }}>April</option>
               <option value="05" {{ date('m') == '05' ? 'selected' : '' }}>May</option>
               <option value="06" {{ date('m') == '06' ? 'selected' : '' }}>June</option>
               <option value="07" {{ date('m') == '07' ? 'selected' : '' }}>July</option>
               <option value="08" {{ date('m') == '08' ? 'selected' : '' }}>August</option>
               <option value="09" {{ date('m') == '09' ? 'selected' : '' }}>September</option>
               <option value="10" {{ date('m') == '10' ? 'selected' : '' }}>October</option>
               <option value="11" {{ date('m') == '11' ? 'selected' : '' }}>November</option>
               <option value="12" {{ date('m') == '12' ? 'selected' : '' }}>December</option>   
                  
                     </select>
                     <label style="width: 15%">Year :</label>
                     <select style="width: 20%;" name="dept" id="dept" onchange="overview_table()">
                   
                                       <option value="2018" {{ date('y') == 18 ? 'selected' : '' }}>2018</option>
                                       <option value="2019" {{ date('y') == 19 ? 'selected' : '' }}>2019</option>
                                       <option value="2020" {{ date('y') == 20 ? 'selected' : '' }}>2020</option>
                                       <option value="2021" {{ date('y') == 21 ? 'selected' : '' }}>2021</option>
                                       <option value="2022" {{ date('y') == 22 ? 'selected' : '' }}>2022</option>
                                       <option value="2023" {{ date('y') == 23 ? 'selected' : '' }}>2023</option>
                                       <option value="2024" {{ date('y') == 24 ? 'selected' : '' }}>2024</option>
                                       <option value="2025" {{ date('y') == 25 ? 'selected' : '' }}>2025</option>
                                       <option value="2026" {{ date('y') == 26 ? 'selected' : '' }}>2026</option>
                                       <option value="2027" {{ date('y') == 27 ? 'selected' : '' }}>2027</option>
                                       <option value="2028" {{ date('y') == 28 ? 'selected' : '' }}>2028</option>
                                       <option value="2029" {{ date('y') == 29 ? 'selected' : '' }}>2029</option>
                                       <option value="2030" {{ date('y') == 30 ? 'selected' : '' }}>2030</option>
                               
                     </select>
                  </div>
                  <div class="col-sm-12" id="viewdatainput"></div>

                  

                  
               </div>
            </div>
         </div>
      </div>
   </div>
</div>



<style>
#tabs .nav-tabs > li {
   float: none;
   display: inline-block;
   /*zoom: 1;*/
}
input, select{
   height: 35px;
   width: 100%;
   padding: 3px;
}
textarea{
   width: 100%;
}
</style>
@endsection

@section('script')
<script>
 $(document).ready(function(){
     overview_table();
   console.log('ready');

});

</script>
<script type="text/javascript">
   function overview_table(){
      var dept = document.getElementById('dept').value;
      data = {
         dept : dept
      }  
    $.ajax({
      url: '/getdatainput_overview',
      type: 'get',
      data:data,
      success: function(data){
        $('#viewdatainput').html(data);

        }
      
    });
    
  }
</script>
@endsection