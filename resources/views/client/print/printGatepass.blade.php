


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
  <input type="hidden" id="gatepass_id" value="{{ $gatepass->gatepass_id }}">
  <tr>
    <td colspan="2"><img src="{{ asset('storage/img/form_gatepass.png') }}" width="240" height="60" /></td>
    <td><img id="gatepassBarcode"/></td>
    <td width="10" rowspan="18"></td>
    <td colspan="2"><img src="{{ asset('storage/img/form_gatepass.png') }}" width="240" height="60" /></td>
    <td><img id="gatepassBarcode"/></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><b>{{ $gatepass->employee_name }}</b></td>
    <td>Form No. <b>{{ $gatepass->gatepass_id }}</b></td>
    <td colspan="2" align="center"><b>{{ $gatepass->employee_name }}</b></td>
    <td>Form No. <b>{{ $gatepass->gatepass_id }}</b></td>
  </tr>
  <tr style="border-top: 1px solid; border-bottom: 1px solid; font-weight: bold;">
    <td colspan="3">DETAILS</td>
    <td colspan="3">DETAILS</td>
  </tr>
  <tr>
    <td colspan="2" style="font-weight: bold;">Item(s):</td>
    <td style="font-weight: bold;">Date Filed:</td>
    <td colspan="2" style="font-weight: bold;">Item(s):</td>
    <td style="font-weight: bold;">Date Filed:</td>
  </tr>
  <tr>
    <td colspan="2" style="font-style: italic;">{{ $gatepass->item_description }}</td>
    <td style="font-style: italic; text-align: center;">{{ date('m-d-Y', strtotime($gatepass->date_filed)) }}</td>
    <td colspan="2" style="font-style: italic;">{{ $gatepass->item_description }}</td>
    <td style="font-style: italic; text-align: center;">{{ date('m-d-Y', strtotime($gatepass->date_filed)) }}</td>
  </tr>
  <tr>
    <td colspan="2" style="font-weight: bold;">Purpose:</td>
    <td style="font-weight: bold;">Time:</td>
    <td colspan="2" style="font-weight: bold;">Purpose:</td>
    <td style="font-weight: bold;">Time:</td>
  </tr>
  <tr>
    <td colspan="2" style="font-style: italic;">{{ $gatepass->purpose }}</td>
    <td style="font-style: italic; text-align: center;">{{ $gatepass->time }}</td>
    <td colspan="2" style="font-style: italic;">{{ $gatepass->purpose }}</td>
    <td style="font-style: italic; text-align: center;">{{ $gatepass->time }}</td>
  </tr>
  <tr style="border-top: 1px solid; border-bottom: 1px solid; font-weight: bold;">
    <td colspan="3">If not connected with FUMACO Inc.:</td>
    <td colspan="3">If not connected with FUMACO Inc.:</td>
  </tr>
  <tr>
    <td colspan="2" style="font-weight: bold;">Company Name:</td>
    <td style="font-weight: bold;">Tel No.:</td>
    <td colspan="2" style="font-weight: bold;">Company Name:</td>
    <td style="font-weight: bold;">Tel No.:</td>
  </tr>
  <tr>
    <td colspan="2" style="font-style: italic; text-align: center;">{{ $gatepass->company_name }}</td>
    <td style="font-style: italic; text-align: center;">{{ $gatepass->tel_no }}</td>
    <td colspan="2" style="font-style: italic; text-align: center;">{{ $gatepass->company_name }}</td>
    <td style="font-style: italic; text-align: center;">{{ $gatepass->tel_no }}</td>
  </tr>
  <tr>
    <td colspan="3" style="font-weight: bold;">Address:</td>
    <td colspan="3" style="font-weight: bold;">Address:</td>
  </tr>
  <tr>
    <td colspan="3" style="font-style: italic;">{{ $gatepass->address }}</td>
    <td colspan="3" style="font-style: italic;">{{ $gatepass->address }}</td>
  </tr>
    <tr style="border-top: 1px solid; border-bottom: 1px solid; font-weight: bold;">
    <td colspan="3">REMARKS</td>
    <td colspan="3">REMARKS</td>
  </tr>
    <tr>
    <td colspan="3" style="font-style: italic;">{{ $gatepass->remarks }}</td>
    <td colspan="3" style="font-style: italic;">{{ $gatepass->remarks }}</td>
  </tr>
  <tr>
    <td></td>
    <td align="center" style="font-weight: bold;">{{ $gatepass->status }}</td>
    <td></td>
    <td></td>
    <td align="center" style="font-weight: bold;">{{ $gatepass->status }}</td>
    <td></td>
  </tr>
  <tr>
    <td align="center" style="border-top: 1px solid;" width="150">Employee</td>
    <td align="center" width="170">Immediate Head</td>
    <td align="center" style="border-top: 1px solid;" width="150">Noted by: HR/Admin Manager</td>
    <td align="center" style="border-top: 1px solid;" width="150">Employee</td>
    <td align="center" width="170">Immediate Head</td>
    <td align="center" style="border-top: 1px solid;" width="150">Noted by: HR/Admin Manager</td>
  </tr>
  <tr>
    <td colspan="2">By: <b>{{ $gatepass->approved_by }}</b></td>
    <td align="center">Copy 1 of 2</td>
    <td colspan="2">By: <b>{{ $gatepass->approved_by }}</b></td>
    <td align="center">Copy 2 of 2</td>
  </tr>
  <tr>
    <td colspan="2">{{ $gatepass->appr_designation }}</td>
    <td align="center">{{ date('m-d-Y g:i a') }}</td>
    <td colspan="2">{{ $gatepass->appr_designation }}</td>
    <td align="center">{{ date('m-d-Y g:i a') }}</td>
  </tr>
</table>

<script>
  var id = document.getElementById("gatepass_id").value;
  JsBarcode("#gatepassBarcode", id, {
    format: "code128",
    height:35,
    displayValue: false
  });
</script>

</body>
</html>
