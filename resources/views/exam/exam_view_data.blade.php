@extends('admin.app')
@section('content')
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
    

.card {background: #FFF none repeat scroll 0% 0%; box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.3); margin-bottom: 30px; }
    
</style>

    <div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="row">
          
          <div class="col-md-12">

          <div class="col-md-12" style="margin: 25px">
            <table style="width: 100%">
            <tr>
              <td><span style="font-size: 20px">{{$exam->exam_title}}</span></td>
              <td><span style="font-size: 20px">{{$exam->department}}</span></td>
            </tr>
            <tr>
              <td><span style="font-size: 20px">{{$exam->exam_group_description}}</span></td>
              <td><span style="font-size: 20px">Total Items: {{count($examquestions)}}</span></td>
            </tr>
          </table>
          </div>
          <!-- Nav tabs -->
            <div class="card">
              <ul class="nav nav-tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#multiplechoice" aria-controls="multiplechoice" role="tab" data-toggle="tab">Part I: Multiple Choice</a></li>
                  <li role="presentation"><a href="#truefalse" aria-controls="truefalse" role="tab" data-toggle="tab">Part II: True or False</a></li>
                  <li role="presentation"><a id="tessay" href="#essay" aria-controls="essay" role="tab" data-toggle="tab">Part III: Essay</a></li>
                  <li role="presentation"><a id="tnumerical" href="#numerical" aria-controls="numerical" role="tab" data-toggle="tab">Part IV: Numerical Exam</a></li>
                  <li role="presentation"><a id="tidentif" href="#identif" aria-controls="identif" role="tab" data-toggle="tab">Part V: Identification - Dexterity and Accuracy Measures</a></li>
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
                      <div><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addNumerical"><i class="fa fa-plus"></i> Add Numerical Exam</a><br><br></div>
                      @if(session("message"))
                        <div class='alert alert-success alert-dismissible'>
                           <button type='button' class='close' data-dismiss='alert'>&times;</button>
                           <center>{{ session("message") }}</center>
                        </div>
                      @endif
                      <div id="exam_type">
                        @include('exam.table.exam_numericals_table')
                      </div>
                    </div>
                  </div>

                  <div role="tabpanel" class="tab-pane" id="identif">
                    <div class="inner-box featured">
                      <h2 class="title-2">Identification - Dexterity and Accuracy Measures</h2>
                      <div><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addIdentif"><i class="fa fa-plus"></i> Add Identification</a><br><br></div>
                      @if(session("message"))
                        <div class='alert alert-success alert-dismissible'>
                           <button type='button' class='close' data-dismiss='alert'>&times;</button>
                           <center>{{ session("message") }}</center>
                        </div>
                      @endif
                      <div id="exam_type">
                        @include('exam.table.exam_identif_table')
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

@include('exam.modal.exam_multiplechoice_add')
@include('exam.modal.exam_truefalse_add')
@include('exam.modal.exam_essay_add')
@include('exam.modal.exam_numerical_add')
@include('exam.modal.exam_identif_add')

@endsection

@section('script')
<script type="text/javascript">

  var optionSelected = $("#exam_title").val();
           // $("#exam_type").val(optionSelected);
           if(optionSelected == "Essay"){
             $("#addMultipleChoice #option1").val('');
             $("#addMultipleChoice #option2").val('');
             $("#addMultipleChoice #option3").val('');
             $("#addMultipleChoice #option4").val('');
             $("#addMultipleChoice #correct_answer").val('');
             $("#addMultipleChoice #option1").removeAttr('required');
             $("#addMultipleChoice #option2").removeAttr('required');
             $("#addMultipleChoice #option3").removeAttr('required');
             $("#addMultipleChoice #option4").removeAttr('required');
             $("#addMultipleChoice #correct_answer").removeAttr('required');
             $("#addMultipleChoice .lbl").hide();
             $("#addMultipleChoice .calbl").hide();
             $("#addMultipleChoice #option1").hide();
             $("#addMultipleChoice #option2").hide();
             $("#addMultipleChoice #option3").hide();
             $("#addMultipleChoice #option4").hide();
             $("#addMultipleChoice #correct_answer").hide();
           }
           else if(optionSelected == "True or False"){
             $("#addMultipleChoice .lbl").hide();
             $("#addMultipleChoice #option1").val('');
             $("#addMultipleChoice #option2").val('');
             $("#addMultipleChoice #option3").val('');
             $("#addMultipleChoice #option4").val('');
             $("#addMultipleChoice #correct_answer").val('');
             $("#addMultipleChoice #option1").hide();
             $("#addMultipleChoice #option2").hide();
             $("#addMultipleChoice #option3").hide();
             $("#addMultipleChoice #option4").hide();
             $('.mc').removeClass('col-md-8').addClass('col-md-12');   
              $('#addMultipleChoice #correct_answer').remove();
              $('#addMultipleChoice .mc').append('<select class="form-control" name="correct_answer" id="correct_answer" placeholder="Correct Answer (required)" required></select>');
              $('#addMultipleChoice #correct_answer').empty();
              var o = new Option('True', 'True');
              $(o).html('True');
              $('#addMultipleChoice #correct_answer').append(o);
              o = new Option('False', 'False');
              $(o).html('False');
              $('#addMultipleChoice #correct_answer').append(o);
           }
            else if(optionSelected == 'Identification - Dexterity and Accuracy Measures'){
             $("#addMultipleChoice .mc").removeClass('col-md-8');
             $("#addMultipleChoice .mc").addClass('col-md-12');
             $("#addMultipleChoice .mc").show();
             $("#addMultipleChoice #correct_answer").prop('required','required');
             $("#addMultipleChoice .lbl").hide();
             $("#addMultipleChoice .calbl").show();
             $("#addMultipleChoice #option1").hide();
             $("#addMultipleChoice #option2").hide();
             $("#addMultipleChoice #option3").hide();
             $("#addMultipleChoice #option4").hide();
             $("#addMultipleChoice #correct_answer").show();
            }
           else{
              $('#addMultipleChoice #correct_answer').empty();

             $("#addMultipleChoice .mc").removeClass('col-md-12');
             $("#addMultipleChoice .mc").addClass('col-md-8');
             $("#addMultipleChoice .mc").show();
             $("#addMultipleChoice .lbl").show();
             $("#addMultipleChoice .calbl").show();
             $("#addMultipleChoice #option1").show();
             $("#addMultipleChoice #option2").show();
             $("#addMultipleChoice #option3").show();
             $("#addMultipleChoice #option4").show();
             $("#addMultipleChoice #correct_answer").show();
           }
           


     $('#addMultipleChoice #option1, #addMultipleChoice #option2, #addMultipleChoice #option3, #addMultipleChoice #option4').change(function(){
      console.log('changing')
    $('#addMultipleChoice #correct_answer').empty();
    var op1 = $('#addMultipleChoice #option1').val();
    var op2 = $('#addMultipleChoice #option2').val();
    var op3 = $('#addMultipleChoice #option3').val();
    var op4 = $('#addMultipleChoice #option4').val();
    if(op1){
      var o = new Option(op1, op1);
      $(o).html(op1);
      $('#addMultipleChoice #correct_answer').append(o);
    }
    if(op2){
      var o = new Option(op2, op2);
      $(o).html(op2);
      $('#addMultipleChoice #correct_answer').append(o);
    }
    if(op3){
      var o = new Option(op3, op3);
      $(o).html(op3);
      $('#addMultipleChoice #correct_answer').append(o);
    }
    if(op4){
      var o = new Option(op4, op4);
      $(o).html(op4);
      $('#addMultipleChoice #correct_answer').append(o);
    }
  })
  
  CKEDITOR.config.enterMode = CKEDITOR.ENTER_BR;
  CKEDITOR.config.resize_enabled = false;
  CKEDITOR.config.autoParagraph = false;
  CKEDITOR.config.height = 150;

$('.btn-danger').click(function(event){
  for(let instanceName in CKEDITOR.instances){
    // alert(instanceName);
    CKEDITOR.instances[instanceName].setData('');
  }
  CKEDITOR.instances['questions'].setData('');
});
</script>
@endsection
