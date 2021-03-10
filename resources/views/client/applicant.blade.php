<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<meta name="author" content="EstateX">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="apple-mobile-web-app-capable" content="yes">
<title>ESSEX v4.2</title>
<link rel="stylesheet" href="{{ asset('css/css/bootstrap.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/fonts/font-awesome.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/fonts/line-icons/line-icons.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/css/main.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/extras/animate.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/css/responsive.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/css/bootstrap-select.min.css') }}">
</head>

<style type="text/css">
  *{
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  }

  select{
    height: 30px;
  }


</style>


<body>
  <div class="header">
    <div class="top-bar">
      <div class="container">
        <div class="row">
          <div class="col-md-7 col-sm-6">
            <ul class="contact-details">
              <li>
                <a href="#">
                  <i class="icon-location-pin"></i>35 Pleasant View Drive, Bagbaguin, Caloocan City
                </a>
              </li>
            </ul>
          </div>
          {{--<div class="col-md-5 col-sm-6">
            <div class="account-setting">
              <a href="{{ url('/userLogout') }}">
                <i class="icon-logout"></i>
                <span>Logout</span>
              </a>
            </div>
          </div>--}}
        </div>
      </div>
    </div>

    <div class="top-bar-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-5 col-sm-6">
            <div class="header-logo">
              <a href="/">
                <img src="{{ asset('storage/img/logo5.png') }}" alt="">
              </a>
            </div>
            <div class="name-title">FUMACO Inc. <br> The Art of Science & Lighting</div>
          </div>
          <div class="col-md-7 col-sm-6">
            <div class="pull-right">
              <div class="row" style="padding: 3px;">
                <div style="float: left; margin-right: 5px;">
                  <img src="{{ asset('storage/img/user.png') }}" width="60" height="60">
                </div>
                <div style="float: right; margin-top: 8px;">
                  <span style="display: block;">
                    <h4>Applicant</h4>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

<div class="main-container section">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="columns-wrapper">
          <h3 class="h3" style="text-align: center">Welcome, Applicant! Please provide the Examination Code.</h3>
          <div class="col-md-12" style="text-align: center; height: 25em;">
            
              <center>
              <div id="invalid-alert" style="width: 40%;"></div>
              </center>
            <form autocomplete="off" id="examCodeForm">
              @csrf
              <input type="text" id="code" class="form-control" style="width: 30%; margin:auto; font-size: 17pt; font-weight: bold; text-align: center;" pattern="[0-9]{4}-[0-9]{5}" maxlength="10" minlength="10" name="excode" id="excode" required autofocus>
              <div style="padding: 10px;">
                <input type="submit" class="btn btn-success" name="submit" value="Proceed">
              </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>


  @include('client.modals.applicant_details')


<div id="copyright">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="site-info text-center">
          <p>&copy; All rights reserved 2019</p>
        </div>
      </div>
    </div>
  </div>
</div>
<a href="#" class="back-to-top">
  <i class="icon-arrow-up"></i>
</a>



<script src="{{ asset('css/js/ajax.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('css/js/jquery-min.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/js/form-validator.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/js/contact-form-script.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/js/jquery.bootstrap-growl.js') }}"></script>
<script type = "text/javascript" src = "{{ asset('css/js/jquery-ui.min.js') }}"></script>



<script>  
  $(document).ready(function(){

      $.ajaxSetup({
      headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
   });

    $('#examCodeForm').submit(function(e){
      e.preventDefault();

      $.ajax({
        type: 'post',
        url: '/applicant/examinee',
        data: $(this).serialize(),
        success: function(data){

          if (data.examFound == true) {
            if(data.applicant_client_veri == 'false'){
               $('#applicantVerification').modal('show');
              
            } else if(data.tookExam == 'false'){

              $('#applicantDetails #examtitle').html(data.examinee.exam_title);
              $('#applicantDetails #applicantname').html(data.examinee.employee_name);
              $('#applicantDetails #examdate').html(data.examinee.date_of_exam);
              $('#applicantDetails #duration').html(data.examinee.duration_in_minutes);
              $('#applicantDetails #examinee_id').html(data.examinee.examinee_id);
              $('#applicantDetails #id').val(data.examinee.examinee_id);
              $('#applicantDetails').modal('show');

            }else{
              $('#applicantSubmittedExam #examtitle').html(data.examinee.exam_title);
              $('#applicantSubmittedExam #applicantname').html(data.examinee.employee_name);
              $('#applicantSubmittedExam #examdate').html(data.examinee.date_of_exam);
              $('#applicantSubmittedExam #duration').html(data.examinee.duration_in_minutes);
              $('#applicantSubmittedExam #examinee_id').html(data.examinee.examinee_id);
              $('#applicantSubmittedExam').modal('show');
            }
          }else{
            $('#invalid-alert').html("<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button><center><b>Invalid Exam Code!</b></center></div>");
          }
        }
      });
    });

    // $('#takeExam').click(function(e){
    //   e.preventDefault();
    //   var id = $('#applicantDetails #examinee_id').text();
    //   alert('test');
    //   $.ajax({
    //     type: 'post',
    //     url: '/examinee/updateStatus',
    //     data: {status: 'On Going'},
    //     success: function(data){
    //       location.href = '/applicant/takeExam/' + $('#applicantDetails #examinee_id').text();
    //     }
    //   });
    // });
  });  
</script>


</body>
</html>