{{--<!-- The Modal -->
<div class="modal fade" id="addMultipleChoice">
   <div class="modal-dialog modal-lg" style="width: 50%;">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">New Question</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row" style="margin: 7px;">
               <form method='post' action="{{route('admin.exam_multiplechoice_save')}}">
                  @csrf
               <div class="col-sm-12">
                  <div class="form-group">
                     <label>Exam</label>
                     <input type="text" value="{{$exam->exam_title}}" class="form-control" readonly>
                     <input type="text" name="exam_id" id="exam_id" value="{{$exam->exam_id}}" hidden>
                  </div>
                  <div class="form-group">
                     <label>Exam Type</label>
                     @foreach($examtypes as $examtype)
                        @if($examtype->exam_type == 'Multiple Choice')
                           <div class="form-group">
                              <input type="text" value="{{$examtype->exam_type}}" class="form-control" readonly>
                              <input type="text" name="exam_type_id" id="exam_type_id" value="{{$examtype->exam_type_id}}" hidden>
                           </div>
                        @endif
                     @endforeach
                  </div>
                  <div class="form-group">
                     <label>Question</label>
                     <textarea id="ckeditor" name="questions" class="form-control ckeditor" rows="1"></textarea>
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <label>Option 1</label>
                     <input type="text" class="form-control" name="option1" id="option1" placeholder="Option 1">
                  </div>
                  <div class="form-group">
                     <label>Option 3</label>
                     <input type="text" class="form-control" name="option3" id="option3" placeholder="Option 3">
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <label>Option 2</label>
                     <input type="text" class="form-control" name="option2" id="option2" placeholder="Option 2">
                  </div>
                  <div class="form-group">
                     <label>Option 4</label>
                     <input type="text" class="form-control" name="option4" id="option4" placeholder="Option 4">
                  </div>
               </div>
               <div class="col-sm-12"> 
                  <div class="form-group">
                     <label>Correct Answer</label>
                     <input type="text" class="form-control" name="correct_answer" id="correct_answer" placeholder="Enter Correct Answer">
                  </div>
               </div>
               <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="saveQuestion"><i class="fa fa-check"></i> Submit</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                </div>
               </form>
            </div>
         </div>
         <!-- Modal footer -->
      </div>
   </div>
</div>
--}}

<!-- The Modal -->
<div class="modal fade" id="addMultipleChoice">
   <div class="modal-dialog modal-lg" style="width: 50%;">
      <div class="modal-content">
         <!-- Modal Header -->
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">New Question</h4>
         </div>
         <!-- Modal body -->
         <div class="modal-body">
            <div class="row" style="margin: 7px;">
               <form method='post' action="{{route('admin.exam_multiplechoice_save')}}" autocomplete="off">
                  @csrf
                  <input type="hidden" name="exam_type" id="exam_type">
                  <div class="form-group col-md-6">
                     <label id="examLbl">Exam</label>
                        <select class="form-control" id="exam_id" name="exam_id" autofocus>
                           <option value="">None</option>
                     @forelse($exams as $exam)
                           <option value="{{$exam->exam_id}}">{{$exam->exam_title}}</option>
                     @empty
                        <option value="">None</option>
                     @endforelse
                        </select>
                  </div>
                  <div class="form-group col-md-6">
                     <label id="examtypeLbl">Exam Type</label>
                     <select class="form-control" name="exam_type_id" id="exam_type_id" data-parsley-required >
                        @foreach($examtypes as $examtype)
                           <option value="{{$examtype->exam_type_id}}">{{$examtype->exam_type}}</option>
                        @endforeach
                     </select>
                  </div>
                  <div class="form-group col-md-12">
                     <label id="questionLbl">Question</label>
                     <textarea id="questions" name="questions" class="form-control ckeditor" rows="1" required></textarea>
                  </div>
                  <div class="form-group col-md-4">
                     <label class="lbl" id="op1Lbl">Option 1</label>
                     <input type="text" class="form-control opts" name="option1" id="option1" placeholder="Option 1 (required)">
                  </div>
                  <div class="form-group col-md-4">
                     <label class="lbl" id="op3Lbl">Option 2</label>
                     <input type="text" class="form-control opts" name="option2" id="option2" placeholder="Option 2 (required)">
                  </div>
                  <div class="form-group col-md-4">
                     <label class="lbl" id="op2Lbl">Option 3</label>
                     <input type="text" class="form-control opts" name="option3" id="option3" placeholder="Option 3 (required)">
                  </div>
                  <div class="form-group col-md-4">
                     <label class="lbl" id="op4Lbl">Option 4</label>
                     <input type="text" class="form-control opts" name="option4" id="option4" placeholder="Option 4 (required)">
                  </div>
                  <div class="form-group col-md-8 mc">
                     <label class="calbl">Correct Answer</label>
                     {{--<input type="text" class="form-control" name="correct_answer" id="correct_answer" placeholder="Correct Answer (required)">--}}
                     <select class="form-control" name="correct_answer" id="correct_answer" placeholder="Correct Answer (required)"></select>
                  </div>
               </div>
                  
               <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="saveQuestion"><i class="fa fa-check"></i> Submit</button>
                    <button type="button" class="btn btn-danger" id="closeAddQuestion" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                </div>
               </form>

         </div>
         <!-- Modal footer -->
      </div>
   </div>
</div>


<script type="text/javascript">
   $("#addMultipleChoice #exam_type_id").change(function(){
          
           var optionSelected = $("option:selected", this).text();
           $("#exam_type").val(optionSelected);
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
           

         });
</script>