<!-- The Modal -->
<div class="modal fade" id="addQuestion">
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
               <form method='post' action="{{route('admin.question_save')}}">
                  @csrf
               <div class="col-sm-12">
                  <div class="form-group">
                     <label>Exam</label>
                     <select class="selectpicker" name="exam_id" id="exam_id" class="form-control">
                        <option value="">None</option>
                     @forelse($exams as $exam)
                        <option value="{{$exam->exam_id}}">{{$exam->exam_title}}</option>
                     @empty
                        <option value="">None</option>                        
                     @endforelse
                     </select>
                  </div>
                  <div class="form-group">
                     <label>Exam Type</label>
                     <select class="selectpicker" name="exam_type_id" id="exam_type_id" class="form-control" onchange="dynamicForm();">
                     @forelse($examtypes as $examtype)
                        <option value="{{$examtype->exam_type_id}}">{{$examtype->exam_type}}</option>
                     @empty
                        <option value="">None</option>
                     @endforelse
                     </select>
                  </div>
                  <div class="form-group">
                     <label>Question</label>
                     <textarea id="ckeditor" name="questions" class="form-control ckeditor" rows="1" required></textarea>
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <label>Option 1</label>
                     <input type="text" class="form-control" name="option1" id="option1" placeholder="Option 1" onchange="opt();" onkeypress="opt();">
                  </div>
                  <div class="form-group">
                     <label>Option 3</label>
                     <input type="text" class="form-control" name="option3" id="option3" placeholder="Option 3" onchange="opt();" onkeypress="opt();" disabled>
                  </div>
               </div>
               <div class="col-sm-6">
                  <div class="form-group">
                     <label>Option 2</label>
                     <input type="text" class="form-control" name="option2" id="option2" placeholder="Option 2" onchange="opt();" onkeypress="opt();">
                  </div>
                  <div class="form-group">
                     <label>Option 4</label>
                     <input type="text" class="form-control" name="option4" id="option4" placeholder="Option 4" disabled>
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

<script type="text/javascript">
   function opt(){
      var op1 = document.getElementById('option1');
      var op2 = document.getElementById('option2');
      var op3 = document.getElementById('option3');
      var op4 = document.getElementById('option4');

      if(op1.value != '' && op2.value != ''){
         op3.disabled = false;
      }
      else{
         op3.value = '';
         op3.disabled = true;
      }
      if(op3.value != ''){
         op4.disabled = false;
      }
      else{
         op4.value = '';
         op4.disabled = true;
      }
   }
   function dynamicForm(){
      var e = document.getElementById('exam_type_id');
      var val = e.options[e.selectedIndex].value;
      var txt  = e.options[e.selectedIndex].text;

      if(txt == 'Essay'){
         document.getElementById('option1').disabled = true;
         document.getElementById('option2').disabled = true;
         document.getElementById('option3').disabled = true;
         document.getElementById('option4').disabled = true;
         document.getElementById('correct_answer').disabled = true;
      }
      else if(txt == 'True or False'){
         document.getElementById('option1').value = 'True';
         document.getElementById('option2').value = 'False';
         document.getElementById('option1').readOnly = true;
         document.getElementById('option2').readOnly = true;
         document.getElementById('option3').disabled = true;
         document.getElementById('option4').disabled = true;
      }
      else{
         document.getElementById('option1').readOnly = false;
         document.getElementById('option2').readOnly = false;
         document.getElementById('option1').disabled = false;
         document.getElementById('option2').disabled = false;
         document.getElementById('option3').disabled = false;
         document.getElementById('option4').disabled = false;
         document.getElementById('correct_answer').disabled = false;        
      }
   }
</script>