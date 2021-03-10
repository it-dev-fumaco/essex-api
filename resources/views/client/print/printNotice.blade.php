<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Essex v3.0</title>

<script type="text/javascript" src="{{ asset('css/js/JsBarcode.code128.min.js')}}"></script>



</head>
<body>

<style type="text/css">
*{
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  font-size: 10pt;
}
  table td{
    padding: 6px;
  }
</style>
<table width="950" align="center" style="border-collapse: collapse;">
  <input type="hidden" id="notice_id" value="{{ $notice->notice_id }}">
  <tr>
    <td colspan="2"><img src="{{ asset('storage/img/form_notice.png') }}" width="240" height="60" /></td>
    <td><img id="noticeBarcode"/></td>
    <td width="10" rowspan="17"></td>
    <td colspan="2"><img src="{{ asset('storage/img/form_notice.png') }}" width="240" height="60" /></td>
    <td><img id="noticeBarcode"/></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><b>{{ $notice->employee_name }}</b></td>
    <td>Form No. <b>{{ $notice->notice_id }}</b></td>
    <td colspan="2" align="center"><b>{{ $notice->employee_name }}</b></td>
    <td>Form No. <b>{{ $notice->notice_id }}</b></td>
  </tr>
  <tr style="border-top: 1px solid; border-bottom: 1px solid; font-weight: bold;">
    <td colspan="3">DETAILS</td>
    <td colspan="3">DETAILS</td>
  </tr>
  <tr>
    <td style="font-weight: bold;">Department</td>
    <td style="font-weight: bold;">Absent From - To</td>
    <td style="font-weight: bold;">Time</td>
    <td style="font-weight: bold;">Department</td>
    <td style="font-weight: bold;">Absent From - To</td>
    <td style="font-weight: bold;">Time</td>
  </tr>
  <tr>
    <td align="center" style="font-style: italic;">{{ $notice->department }}</td>
    <td align="center" style="font-style: italic;">{{ date('m-d-Y', strtotime($notice->date_from)) }} - {{ date('m-d-Y', strtotime($notice->date_to)) }}</td>
    <td align="center" style="font-style: italic;">{{ $notice->time_from }} - {{ $notice->time_to }}</td>
    <td align="center" style="font-style: italic;">{{ $notice->department }}</td>
    <td align="center" style="font-style: italic;">{{ date('m-d-Y', strtotime($notice->date_from)) }} - {{ date('m-d-Y', strtotime($notice->date_to)) }}</td>
    <td align="center" style="font-style: italic;">{{ $notice->time_from }} - {{ $notice->time_to }}</td>
  </tr>
  <tr>
    <td colspan="2" style="font-weight: bold;">Reason</td>
    <td style="font-weight: bold;">Date Filed</td>
    <td colspan="2" style="font-weight: bold;">Reason</td>
    <td style="font-weight: bold;">Date Filed</td>
  </tr>
  <tr>
    <td colspan="2" style="font-style: italic;">{{ $notice->reason }}</td>
    <td align="center" style="font-style: italic;">{{ date('m-d-Y', strtotime($notice->date_filed)) }}</td>
    <td colspan="2" style="font-style: italic;">{{ $notice->reason }}</td>
    <td align="center" style="font-style: italic;">{{ date('m-d-Y', strtotime($notice->date_filed)) }}</td>
  </tr>
  <tr style="border-top: 1px solid; border-bottom: 1px solid; font-weight: bold;">
    <td colspan="3">TYPE OF ABSENCE</td>
    <td colspan="3">TYPE OF ABSENCE</td>
  </tr>
  <tr>
  <td colspan="3" align="center" style="font-style: italic;">{{ $notice->leave_type }}</td>
  <td colspan="3" align="center" style="font-style: italic;">{{ $notice->leave_type }}</td>
  </tr>
  <tr>
    <td style="font-weight: bold;">Reported through</td>
    <td style="font-weight: bold;">Time Reported</td>
    <td style="font-weight: bold;">Received by</td>
    <td style="font-weight: bold;">Reported through</td>
    <td style="font-weight: bold;">Time Reported</td>
    <td style="font-weight: bold;">Received by</td>
  </tr>
  <tr>
    <td width="150" align="center" style="font-style: italic;">{{ $notice->means }}</td>
    <td width="170" align="center" style="font-style: italic;">{{ $notice->time_reported }}</td>
    <td width="150" align="center" style="font-style: italic;">{{ $notice->info_by }}</td>
    <td width="150" align="center" style="font-style: italic;">{{ $notice->means }}</td>
    <td width="170" align="center" style="font-style: italic;">{{ $notice->time_reported }}</td>
    <td width="150" align="center" style="font-style: italic;">{{ $notice->info_by }}</td>
  </tr>
  <tr>
    <td colspan="3" style="font-weight: bold;">Remarks</td>
    <td colspan="3" style="font-weight: bold;">Remarks</td>
  </tr>
  <tr>
    <td colspan="3" style="font-style: italic;">{{ $notice->remarks }}</td>
    <td colspan="3" style="font-style: italic;">{{ $notice->remarks }}</td>
  </tr>
  <tr>
    <td></td>
    <td align="center" style="font-weight: bold;">{{ $notice->status }}</td>
    <td></td>
    <td></td>
    <td align="center" style="font-weight: bold;">{{ $notice->status }}</td>
    <td></td>
  </tr>
  <tr>
    <td align="center" style="border-top: 1px solid;">Employee</td>
    <td align="center">Immediate Head</td>
    <td align="center" style="border-top: 1px solid;">Noted by: HR/Admin Manager</td>
    <td align="center" style="border-top: 1px solid;">Employee</td>
    <td align="center">Immediate Head</td>
    <td align="center" style="border-top: 1px solid;">Noted by: HR/Admin Manager</td>
  </tr>
  <tr>
    <td colspan="2">By: <b>{{ $notice->approved_by }}</b></td>
    <td align="center">Copy 1 of 2</td>
    <td colspan="2">By: <b>{{ $notice->approved_by }}</b></td>
    <td align="center">Copy 2 of 2</td>
  </tr>
  <tr>
    <td colspan="2">{{ $notice->appr_designation }}</td>
    <td align="center">{{ date('m-d-Y g:i a') }}</td>
    <td colspan="2">{{ $notice->appr_designation }}</td>
    <td align="center">{{ date('m-d-Y g:i a') }}</td>
  </tr>
</table>

<script>
  var id = document.getElementById("notice_id").value;
  JsBarcode("#noticeBarcode", id, {
    format: "code128",
    height:35,
    displayValue: false
  });
</script>

</body>
</html>
