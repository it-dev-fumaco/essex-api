<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="EstateX">
<title>ESSEX v3.0</title>
<link rel="stylesheet" href="{{ asset('css/css/bootstrap.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/fonts/font-awesome.min.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/fonts/line-icons/line-icons.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/css/main.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/extras/animate.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/extras/owl.carousel.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/extras/owl.theme.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/extras/settings.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/extras/nivo-lightbox.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/css/responsive.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/css/slicknav.css') }}" type="text/css">
<link rel="stylesheet" href="{{ asset('css/css/bootstrap-select.min.css') }}">
</head>


<style type="text/css">
    *{
      font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
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
    .nav-tabs { border-bottom: 2px solid #DDD; }
    .nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover { border-width: 0; }
    .nav-tabs > li > a { border: none; color: #666; }
        .nav-tabs > li.active > a, .nav-tabs > li > a:hover { border: none; color: #4285F4 !important; background: transparent; }
        .nav-tabs > li > a::after { content: ""; background: #4285F4; height: 2px; position: absolute; width: 100%; left: 0px; bottom: -1px; transition: all 250ms ease 0s; transform: scale(0); }
    .nav-tabs > li.active > a::after, .nav-tabs > li:hover > a::after { transform: scale(1); }
    .tab-nav > li > a::after { background: #21527d none repeat scroll 0% 0%; color: #fff; }
    .tab-pane { padding: 15px 0; }
    .tab-content{padding:20px}

    .card {background: #FFF none repeat scroll 0% 0%; box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.3); margin-bottom: 30px; }
    
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
          <div class="col-md-5 col-sm-6">
            <div class="account-setting">
              <a href="{{ url('/admin/logout') }}">
                <i class="icon-logout"></i>
                <span>Logout</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="top-bar-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-5 col-sm-6">
            <div class="header-logo">
              <a href="index.html">
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
                    <h4>{{ Auth::user()->name }}</h4>
                  </span>
                  <span style="display: block;">IT Specialist | Information Technology</span>
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
    <div class="col-md-12">
       <a href="/admin"><h2 class="section-title center">Essex 3 Admin Panel</h2></a>
    </div>
    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="row">
          <div class="col-md-12">
            <div class="col-md-12">
              <h2 class="title-2">{{$exam->exam_title}}</h2>
            <div class="col-md-6">
              <h2 class="title-2">{{$exam->exam_group_description}}</h2>
              <h2 class="title-2">{{$exam->department}}</h2>
            </div>
            <div class="col-md-6">
            <h2 class="title-2">{{Carbon\Carbon::now()->format('l, F d, Y')}}</h2>
            <h2 class="title-2">Total Items: {{count($examquestions)}}</h2>
            </div>
            </div>

          <!-- Nav tabs -->
            <div class="card">
              <ul class="nav nav-tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#multiplechoice" aria-controls="multiplechoice" role="tab" data-toggle="tab">Part I: Multiple Choice</a></li>
                  <li role="presentation"><a href="#truefalse" aria-controls="truefalse" role="tab" data-toggle="tab">Part II: True or False</a></li>
                  <li role="presentation"><a id="tessay" href="#essay" aria-controls="essay" role="tab" data-toggle="tab">Part III: Essay</a></li>
                  <li role="presentation"><a id="tnumerical" href="#numerical" aria-controls="numerical" role="tab" data-toggle="tab">Part IV: Numerical Exam</a></li>
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                  <div role="tabpanel" class="tab-pane active" id="multiplechoice">
                    <div class="inner-box featured">
                      <h2 class="title-2">Multiple Choice</h2>
                      <div><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addMultipleChoice"><i class="fa fa-plus"></i> Add Multiple Choice</a><br><br></div>
                      @if(session("message"))
                        <div class='alert alert-success alert-dismissible'>
                           <button type='button' class='close' data-dismiss='alert'>&times;</button>
                           <center>{{ session("message") }}</center>
                        </div>
                      @endif
                      <div id="exam_type">
                        @include('exam.table.exam_multiplechoice_table')
                      </div>
                    </div>
                  </div>

                  <div role="tabpanel" class="tab-pane" id="truefalse">
                    <div class="inner-box featured">
                      <h2 class="title-2">True or False</h2>
                      <div><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addTrueFalse"><i class="fa fa-plus"></i> Add True or False</a><br><br></div>
                      @if(session("message"))
                        <div class='alert alert-success alert-dismissible'>
                           <button type='button' class='close' data-dismiss='alert'>&times;</button>
                           <center>{{ session("message") }}</center>
                        </div>
                      @endif
                      <div id="exam_type">
                        @include('exam.table.exam_truefalse_table')
                      </div>
                    </div>
                  </div>

                  <div role="tabpanel" class="tab-pane" id="essay">
                    <div class="inner-box featured">
                      <h2 class="title-2">Essay</h2>
                      <div><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addEssay"><i class="fa fa-plus"></i> Add Essay</a><br><br></div>
                      @if(session("message"))
                        <div class='alert alert-success alert-dismissible'>
                           <button type='button' class='close' data-dismiss='alert'>&times;</button>
                           <center>{{ session("message") }}</center>
                        </div>
                      @endif
                      <div id="exam_type">
                        @include('exam.table.exam_essay_table')
                      </div>
                    </div>
                  </div>

                  <div role="tabpanel" class="tab-pane" id="numerical">
                    <div class="inner-box featured">
                      <h2 class="title-2">Numerical Exam</h2>
                      <div><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addNumerical"><i class="fa fa-plus"></i> Add Question</a><br><br></div>
                      @if(session("message"))
                        <div class='alert alert-success alert-dismissible'>
                           <button type='button' class='close' data-dismiss='alert'>&times;</button>
                           <center>{{ session("message") }}</center>
                        </div>
                      @endif
                      <div id="exam_type">
                      </div>
                    </div>
                  </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@include('exam.modal.exam_truefalse_add')
@include('exam.modal.exam_essay_add')





<div id="copyright">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="site-info text-center">
          <p>&copy; All rights reserved 2017 - Designed & Developed by <a href="http://uideck.com">UIdeck</a></p>
        </div>
      </div>
    </div>
  </div>
</div>
<a href="#" class="back-to-top">
<i class="icon-arrow-up"></i>
</a>

<div id="loader">
  <div class="sk-folding-cube">
    <div class="sk-cube1 sk-cube"></div>
    <div class="sk-cube2 sk-cube"></div>
    <div class="sk-cube4 sk-cube"></div>
    <div class="sk-cube3 sk-cube"></div>
  </div>
</div>

<script src="{{ asset('css/js/ajax.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('css/js/jquery-min.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/js/jquery.parallax.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/js/wow.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/js/main.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/js/jquery.mixitup.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/js/nivo-lightbox.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/js/jquery.counterup.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/js/waypoints.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/js/form-validator.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/js/contact-form-script.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/js/jquery.themepunch.revolution.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/js/jquery.themepunch.tools.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('css/js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('css/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('css/js/jQuery-plugin-progressbar.js') }}"></script>
<script src="{{ asset('css/js/calendar.js') }}"></script>

  <!-- <script src="{{ asset('css/css/ckeditor/node-waves/waves.js') }}"></script>
  <script src="{{ asset('css/css/ckeditor/ckeditor/ckeditor.js') }}"></script>
  <script src="{{ asset('css/css/ckeditor/editors.js') }}"></script> -->

<script>  
    
</script>

</body>
</html>
