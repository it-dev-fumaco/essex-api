@extends('admin.app')
@section('content')
   @include('exam.modal.question_add')
	<div class="row">
      <div class="col-md-12 col-sm-12">
        <div class="inner-box featured" style="width: 100%;">
          <h2 class="title-2">Question List</h2>
          <div><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addQuestion"><i class="fa fa-plus"></i> Add Question</a><br><br></div>
          @if(session("message"))
            <div class='alert alert-success alert-dismissible'>
               <button type='button' class='close' data-dismiss='alert'>&times;</button>
               <center>{{ session("message") }}</center>
            </div>
          @endif
          <div id="exam_type">
             @include('exam.table.question_table')
          </div>
        </div>
      </div>
   </div>
@endsection

@section('script')
  
   <script>
     $(document).ready(function(){

      CKEDITOR.replaceClass = 'ckeditor';

        $('#formAddQuestion').parsley();
        $('#formEditQuestion').parsley();
        
        $('#closeAddQuestion').click(function(){
          $('#formAddQuestion').trigger("reset");
          $('.err').html('');
          for(let instanceName of CKEDITOR.instances){
            CKEDITOR.instances[instanceName].setData('');
          }
        });

        function resetOptions(){
          $("#addQuestion .lbl").hide()
          $("#addQuestion #option1").val('')
          $("#addQuestion #option2").val('')
          $("#addQuestion #option3").val('')
          $("#addQuestion #option4").val('')
          $("#addQuestion #option1").removeAttr('required')
          $("#addQuestion #option2").removeAttr('required')
          $("#addQuestion #option3").removeAttr('required')
          $("#addQuestion #option4").removeAttr('required')
          $("#addQuestion #option1").hide()
          $("#addQuestion #option2").hide()
          $("#addQuestion #option3").hide()
          $("#addQuestion #option4").hide()
        }

        function resetCorrectAns(){
          $("#addQuestion .calbl").hide();
          $("#addQuestion #correct_answer").hide()
          $("#addQuestion #correct_answer").val('')
          $("#addQuestion #correct_answer").removeAttr('required')
        }

        $("#addQuestion").on('show.bs.modal', function(){
          
          var optionFirst = $('#addQuestion #exam_type_id').find('option').first().text();
           $("#exam_type").val(optionFirst);
           if(optionFirst == "Essay"){
             $("#addQuestion #option1").val('');
             $("#addQuestion #option2").val('');
             $("#addQuestion #option3").val('');
             $("#addQuestion #option4").val('');
             $("#addQuestion #correct_answer").val('');
             $("#addQuestion #option1").removeAttr('required');
             $("#addQuestion #option2").removeAttr('required');
             $("#addQuestion #option3").removeAttr('required');
             $("#addQuestion #option4").removeAttr('required');
             $("#addQuestion #correct_answer").removeAttr('required');
             $("#addQuestion .lbl").hide();
             $("#addQuestion .calbl").hide();
             $("#addQuestion #option1").hide();
             $("#addQuestion #option2").hide();
             $("#addQuestion #option3").hide();
             $("#addQuestion #option4").hide();
             $("#addQuestion #correct_answer").hide();
           }
           else if(optionFirst == "True or False"){
             $("#addQuestion .lbl").hide();
             $("#addQuestion #option1").val('');
             $("#addQuestion #option2").val('');
             $("#addQuestion #option3").val('');
             $("#addQuestion #option4").val('');
             $("#addQuestion #correct_answer").val('');
             $("#addQuestion #option1").hide();
             $("#addQuestion #option2").hide();
             $("#addQuestion #option3").hide();
             $("#addQuestion #option4").hide();
             $('.mc').removeClass('col-md-8').addClass('col-md-12');   
              $('#addQuestion #correct_answer').remove();
              $('#addQuestion .mc').append('<select class="form-control" name="correct_answer" id="correct_answer" placeholder="Correct Answer (required)" required></select>');
              $('#addQuestion #correct_answer').empty();
              var o = new Option('True', 'True');
              $(o).html('True');
              $('#addQuestion #correct_answer').append(o);
              o = new Option('False', 'False');
              $(o).html('False');
              $('#addQuestion #correct_answer').append(o);
           }
            else if(optionFirst == 'Identification - Dexterity and Accuracy Measures'){
             $("#addQuestion .mc").removeClass('col-md-8');
             $("#addQuestion .mc").addClass('col-md-12');
             $("#addQuestion .mc").show();
             $("#addQuestion #correct_answer").prop('required','required');
             $("#addQuestion .lbl").hide();
             $("#addQuestion .calbl").show();
             $("#addQuestion #option1").hide();
             $("#addQuestion #option2").hide();
             $("#addQuestion #option3").hide();
             $("#addQuestion #option4").hide();
             $("#addQuestion #correct_answer").show();
            }
           else{
              $('#addQuestion #correct_answer').empty();

             $("#addQuestion .mc").removeClass('col-md-12');
             $("#addQuestion .mc").addClass('col-md-8');
             $("#addQuestion .mc").show();
             $("#addQuestion .lbl").show();
             $("#addQuestion .calbl").show();
             $("#addQuestion #option1").show();
             $("#addQuestion #option2").show();
             $("#addQuestion #option3").show();
             $("#addQuestion #option4").show();
             $("#addQuestion #correct_answer").show();
           }

           if($("#addQuestion #correct_answer").prop('data-parsley-required')){
            $("#addQuestion #correct_answer").attr('placeholder','REQUIRED!');
           }

        });

         $("#addQuestion #exam_type_id").change(function(){
          
           var optionSelected = $("option:selected", this).text();
           $("#exam_type").val(optionSelected);
           if(optionSelected == "Essay"){
             $("#addQuestion #option1").val('');
             $("#addQuestion #option2").val('');
             $("#addQuestion #option3").val('');
             $("#addQuestion #option4").val('');
             $("#addQuestion #correct_answer").val('');
             $("#addQuestion #option1").removeAttr('required');
             $("#addQuestion #option2").removeAttr('required');
             $("#addQuestion #option3").removeAttr('required');
             $("#addQuestion #option4").removeAttr('required');
             $("#addQuestion #correct_answer").removeAttr('required');
             $("#addQuestion .lbl").hide();
             $("#addQuestion .calbl").hide();
             $("#addQuestion #option1").hide();
             $("#addQuestion #option2").hide();
             $("#addQuestion #option3").hide();
             $("#addQuestion #option4").hide();
             $("#addQuestion #correct_answer").hide();
           }
           else if(optionSelected == "True or False"){
             $("#addQuestion .lbl").hide();
             $("#addQuestion #option1").val('');
             $("#addQuestion #option2").val('');
             $("#addQuestion #option3").val('');
             $("#addQuestion #option4").val('');
             $("#addQuestion #correct_answer").val('');
             $("#addQuestion #option1").hide();
             $("#addQuestion #option2").hide();
             $("#addQuestion #option3").hide();
             $("#addQuestion #option4").hide();
             $('.mc').removeClass('col-md-8').addClass('col-md-12');   
              $('#addQuestion #correct_answer').remove();
              $('#addQuestion .mc').append('<select class="form-control" name="correct_answer" id="correct_answer" placeholder="Correct Answer (required)" required></select>');
              $('#addQuestion #correct_answer').empty();
              var o = new Option('True', 'True');
              $(o).html('True');
              $('#addQuestion #correct_answer').append(o);
              o = new Option('False', 'False');
              $(o).html('False');
              $('#addQuestion #correct_answer').append(o);
           }
            else if(optionSelected == 'Identification - Dexterity and Accuracy Measures'){
             $("#addQuestion .mc").removeClass('col-md-8');
             $("#addQuestion .mc").addClass('col-md-12');
             $("#addQuestion .mc").show();
             $("#addQuestion #correct_answer").prop('required','required');
             $("#addQuestion .lbl").hide();
             $("#addQuestion .calbl").show();
             $("#addQuestion #option1").hide();
             $("#addQuestion #option2").hide();
             $("#addQuestion #option3").hide();
             $("#addQuestion #option4").hide();
             $("#addQuestion #correct_answer").show();
            }
           else{
              $('#addQuestion #correct_answer').empty();

             $("#addQuestion .mc").removeClass('col-md-12');
             $("#addQuestion .mc").addClass('col-md-8');
             $("#addQuestion .mc").show();
             $("#addQuestion .lbl").show();
             $("#addQuestion .calbl").show();
             $("#addQuestion #option1").show();
             $("#addQuestion #option2").show();
             $("#addQuestion #option3").show();
             $("#addQuestion #option4").show();
             $("#addQuestion #correct_answer").show();
           }
           

         });

         $('.qedit').on('show.bs.modal',function(){
            var optionSelected = $("#exam_type_id option:selected", this).text();
            $('.qedit #exam_type').val(optionSelected);
           var valueSelected = this.value;
           if(optionSelected == "Essay"){
             $(".qedit .lbl").hide();
             $(".qedit .calbl").hide();
             $(".qedit #option1").val('');
             $(".qedit #option2").val('');
             $(".qedit #option3").val('');
             $(".qedit #option4").val('');
             $(".qedit #option1").hide();
             $(".qedit #option2").hide();
             $(".qedit #option3").hide();
             $(".qedit #option4").hide();
             $(".qedit #correct_answer").hide();
             $(".qedit #correct_answer").val('');
           }
            else if(optionSelected == 'True or False'){
             $(".qedit .mc").addClass('hidden');
             $(".qedit .lbl").hide();
             $(".qedit #option1").val('');
             $(".qedit #option2").val('');
             $(".qedit #option3").val('');
             $(".qedit #option4").val('');
             $(".qedit #option1").hide();
             $(".qedit #option2").hide();
             $(".qedit #option3").hide();
             $(".qedit #option4").hide();
             $(".qedit .tf").removeClass('hidden');
             $(".qedit #catf").show();

            }
            else{
              $(".qedit .mc").removeClass('hidden');
              $(".qedit .lbl").show();
              $(".qedit .calbl").show();
              $(".qedit #option1").show();
              $(".qedit #option2").show();
              $(".qedit #option3").show();
              $(".qedit #option4").show();
              $(".qedit #correct_answer").show();
            }

         });
     });

  


  $('#addQuestion #option1, #addQuestion #option2, #addQuestion #option3, #addQuestion #option4').change(function(){
    $('#addQuestion #correct_answer').empty();
    var op1 = $('#addQuestion #option1').val();
    var op2 = $('#addQuestion #option2').val();
    var op3 = $('#addQuestion #option3').val();
    var op4 = $('#addQuestion #option4').val();
    if(op1){
      var o = new Option(op1, op1);
      $(o).html(op1);
      $('#addQuestion #correct_answer').append(o);
    }
    if(op2){
      var o = new Option(op2, op2);
      $(o).html(op2);
      $('#addQuestion #correct_answer').append(o);
    }
    if(op3){
      var o = new Option(op3, op3);
      $(o).html(op3);
      $('#addQuestion #correct_answer').append(o);
    }
    if(op4){
      var o = new Option(op4, op4);
      $(o).html(op4);
      $('#addQuestion #correct_answer').append(o);
    }
  })



  $('.qedit #option1, .qedit #option2, .qedit #option3, .qedit #option4').change(function(){
    $('.qedit #correct_answer').empty();
    var op1 = $('.qedit #option1').val();
    var op2 = $('.qedit #option2').val();
    var op3 = $('.qedit #option3').val();
    var op4 = $('.qedit #option4').val();
    var ans = $('.qedit #sagot').val();
    if(op1){
      $('.qedit #correct_answer').append('<option {{'+op1+' == '+ans+' ? "selected" : ""}} value="'+op1+'">'+op1+'</option>');
    }
    if(op2){
      $('.qedit #correct_answer').append('<option {{'+op2+' == '+ans+' ? "selected" : ""}} value="'+op2+'">'+op2+'</option>');
    }
    if(op3){
      $('.qedit #correct_answer').append('<option {{'+op3+' == '+ans+' ? "selected" : ""}} value="'+op3+'">'+op3+'</option>');
    }
    if(op4){
      $('.qedit #correct_answer').append('<option {{'+op4+' == '+ans+' ? "selected" : ""}} value="'+op4+'">'+op4+'</option>');
    }
  })

  // CKEDITOR.config.startupMode = 'source';  
  CKEDITOR.config.enterMode = CKEDITOR.ENTER_BR;
  CKEDITOR.config.resize_enabled = false;
  CKEDITOR.config.autoParagraph = false;
  CKEDITOR.config.height = 150;
   </script>
@endsection