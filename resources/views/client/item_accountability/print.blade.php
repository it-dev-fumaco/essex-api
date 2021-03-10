<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="EstateX">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title></title>
<link rel="stylesheet" href="{{ asset('css/css/bootstrap.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/fonts/font-awesome.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/fonts/line-icons/line-icons.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/css/main.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/css/responsive.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/css/bootstrap-select.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/datatables/dataTables.bootstrap.min.css') }}">
</head>

<style type="text/css">
  *{
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  }

  select{
    height: 30px;
  }

/* The container */
.radio_container {
    display: block;
    position: relative;
    padding-left: 25px;
    margin-bottom: 8px;
    cursor: pointer;
    font-size: 13px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default radio button */
.radio_container input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
    position: absolute;
    top: 1px;
    left: 0;
    height: 16px;
    width: 16px;
    background-color: #ddd;
    border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.radio_container:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.radio_container input:checked ~ .checkmark {
    background-color: #50B200;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the indicator (dot/circle) when checked */
.radio_container input:checked ~ .checkmark:after {
    display: block;
}

/* Style the indicator (dot/circle) */
.radio_container .checkmark:after {
  top: 4px;
  left: 4px;
  width: 8px;
  height: 8px;
  border-radius: 50%;
  background: white;
}



  .progress1{
  position: relative;
  margin: 4px;
  float:left;
  text-align: center;
}
.barOverflow1{ /* Wraps the rotating .bar */
  position: relative;
  overflow: hidden; /* Comment this line to understand the trick */
  width: 120px; height: 60px; /* Half circle (overflow) */
  margin-bottom: -25px; /* bring the numbers up */
}
.bar1{
  position: absolute;
  top: 0; left: 0;
  width: 120px; height: 120px; /* full circle! */
  border-radius: 50%;
  box-sizing: border-box;
  border: 18px solid #eee;     /* half gray, */
  border-bottom-color: #f39c12;  /* half azure */
  border-right-color: #f39c12;
}

  .hover-image img {
  -webkit-transform: scale(1);
  transform: scale(1);
  -webkit-transition: .3s ease-in-out;
  transition: .3s ease-in-out;
  cursor: pointer;
}
.hover-image:hover img {
  -webkit-transform: scale(1.3);
  transform: scale(1.3);
cursor: pointer;
}


 .hover-icon i{
  -webkit-transform: scale(1);
  transform: scale(1);
  -webkit-transition: .3s ease-in-out;
  transition: .3s ease-in-out;
  cursor: pointer;
}
.hover-icon:hover i{
  -webkit-transform: scale(1.3);
  transform: scale(1.3);
cursor: pointer;
}


.calendar, .calendar_weekdays, .calendar_content {
    max-width: 300px;
}
.calendar {
    margin: auto;
    font-family:'Muli', sans-serif;
    font-weight: 400;
}
.calendar_content, .calendar_weekdays, .calendar_header {
    position: relative;
    overflow: hidden;
}
.calendar_weekdays div {
    display:inline-block;
    vertical-align:top;
}
.calendar_weekdays div, .calendar_content div {
    width: 14.28571%;
    overflow: hidden;
    text-align: center;
    background-color: transparent;
    color: #6f6f6f;
    font-size: 14px;
}
.calendar_content div {
    border: 1px solid transparent;
    float: left;
}
.calendar_content div:hover {
    border: 1px solid #dcdcdc;
    cursor: default;
}
.calendar_content div.blank:hover {
    cursor: default;
    border: 1px solid transparent;
}
.calendar_content div.past-date {
    color: #d5d5d5;
}
.calendar_content div.today {
    font-weight: bold;
    font-size: 14px;
    color: #87b633;
    border: 1px solid #dcdcdc;
}
.calendar_content div.selected {
    background-color: #f0f0f0;
}
.calendar_header {
    width: 100%;
    text-align: center;
}
.calendar_header h2 {
    padding: 0 10px;
    font-family:'Muli', sans-serif;
    font-weight: 300;
    font-size: 18px;
    color: #87b633;
    float:left;
    width:70%;
    margin: 0 0 10px;
}
button.switch-month {
    background-color: transparent;
    padding: 0;
    outline: none;
    border: none;
    color: #dcdcdc;
    float: left;
    width:15%;
    transition: color .2s;
}
button.switch-month:hover {
    color: #87b633;
}
</style>

 <div class="col-md-12" id="div1" name="div1">
  <div class="col-md-12" id="div1" name="div1" align="center" style="padding-top: 50px;">
    <label style="font-size: 17pt;">EMPLOYEE ITEM ACCOUNTABILITY</label>
  </div>
  <div class="col-md-12" id="div1" name="div1" align="right" style="padding-top: 60px;">
    <label style="padding: 1px 10px; width: 10%;">Date:</label>
    <label style="padding: 1px 10px; width: 20%;">{{ date('d-F-Y') }}</label>
  </div>

            <div class="col-md-6" id="div1" name="div1" style="padding-top: 5px;">
                <table style="width: 100%; font-size: 12pt;padding-top: -10px;" border="0">
                      <br>
                      <tr>
                        <td style="padding-left: 10px; width: 20%">Employee name:</td>
                        <td style="width: 30%">{{ $employee_profile->employee_name }}</td>
                        <td style="padding-left: 10px; width: 20%;">Department:</td>
                        <td style="width: 30%">{{ $employee_profile->department }}</td>
                      </tr>
                </table>
                      
            </div>
            <div class="col-md-6" id="div1" name="div1" style="padding-top: 5px;">
                <table style="width: 100%; font-size: 12pt;padding-top: -10px;" border="0">
                      <tr>
                        <td style="padding-left: 10px; width: 20%">Designation:</td>
                        <td style="width: 30%">{{ $employee_profile->designation }}</td>
                        <td style="padding-left: 10px; width: 20%">Employment Status:</td>
                        <td style="width: 30%">{{ $employee_profile->employment_status }}</td>
                      </tr>
                </table>
            </div>
  <div class="col-md-12" id="div1" name="div1" align="center" style="padding-top: 60px;">
    <label style="font-size: 13pt;align-content: center;">Issued Items to Employee </label>
  </div>
  
                     <table class="table table-bordered" id="example" style="font-size: 11pt;width: 100%">
                        <thead>
                           <tr>
                              <th>ID</th>
                              <th>Item Code</th>
                              <th>Details</th>
                              <th>Date Issued</th>
                              <th>Issued By</th>
                              <th>Status</th>
                           </tr>
                        </thead>
                        <tbody class="table-body">
                          @foreach($itemlist as $itemlists)
                           <tr>
                           <td>{{ $itemlists->id }}</td>
                           <td>{{ $itemlists->item_code }}</td>
                           <td style="line-height: 10px;">
                              <div>Category: {{ $itemlists->category }}</div><br>
                              <div>Classification: {{ $itemlists->class }}</div><br>
                              <div>Name: {{ $itemlists->name }}</div><br>
                              <div>Qty: {{ $itemlists->qty }}</div><br>
                              <div>Purchase Date: {{ $itemlists->purchase_date }}</div><br>
                              <div>Item Status: {{ $itemlists->item_status }}</div><br>
                              <div>Item Description: {{ $itemlists->desc }}</div><br>
                              <div>Brand: {{ $itemlists->brand }}</div><br>
                              <div>Model: {{ $itemlists->model }}</div><br>
                              <div class="@if(empty($itemlists->serial_no)) hideme @endif">Serial no: {{ $itemlists->serial_no }}</div><br>
                              <div class="@if(empty($itemlists->mcaddress)) hideme @endif">Mc Address: {{ $itemlists->mcaddress }}</div><br>
                              <div class="@if(empty($itemlists->color)) hideme @endif">Plate no: {{ $itemlists->color }}</div><br>
                              <div class="@if(empty($itemlists->chasis)) hideme @endif">Color: {{ $itemlists->chasis }}</div><br>
                              <div class="@if(empty($itemlists->engine)) hideme @endif">Engine no: {{ $itemlists->engine }}</div><br>
                              <div class="@if(empty($itemlists->driver_license)) hideme @endif">Driver License No: {{ $itemlists->driver_license }}</div><br>
                              <div class="@if(empty($itemlists->dl_type)) hideme @endif">DL Type: {{ $itemlists->dl_type }}</div><br>
                              <div class="@if(empty($itemlists->rc_no)) hideme @endif">RC no: {{ $itemlists->rc_no }}</div><br>
                           </td>
                           <td>{{ $itemlists->issued_date }}</td>
                           <td>{{ $itemlists->issued_by_name }}</td>
                           <td>{{ $itemlists->status }}</td>
                           @endforeach
                        </tr>
                        </tbody>
                     </table>
                     <div style="padding-top: 80px">
                      <div style="padding-top: 80px">
                     <table  >
                       <tr><br></tr>
                        <tr>
                          <td>Received by:<br></td>
                        </tr>
                        <tr>
                          <td>____________________________</td>
                        </tr>
                        <tr><td align="center">{{ $employee_profile->employee_name }}</td></tr>
                     </table>
                   </div>
                     <table  >
                       <tr><br></tr>
                        <tr>
                          <td>Noted by:<br></td>
                        </tr>
                        <tr>
                          <td>____________________________</td>
                        </tr>
                        <tr><td align="center">{{ $issued_byy }}</td></tr>
                     </table>
                     
                  </div>







<style type="text/css">
  .hideme{
    display: none;
  }
</style>
<script src="{{ asset('css/js/ajax.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('css/js/jquery-min.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/js/form-validator.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/js/jquery.bootstrap-growl.js') }}"></script>
<script src="{{ asset('css/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('css/js/jQuery-plugin-progressbar.js') }}"></script>
<script src="{{ asset('css/js/calendar.js') }}"></script>
<script type = "text/javascript" src = "{{ asset('css/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('css/js/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('css/js/datatables/dataTables.bootstrap.min.js') }}"></script>



<script>  
  $(document).ready(function(){
  setTimeout(function(){
   window.print();
  },1000);
    return true;
  });  
</script>


@yield('script')

</body>
</html>