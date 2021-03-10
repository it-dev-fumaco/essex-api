                <div class="col-md-3">
                  <button type="button" class="btn btn-success action-button preview submit-btn" onclick="back_question()">Back to Examination</button>
                </div> 
                <div class="col-md-3" style="float: right;">
                  <button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#confirm-submit-modal">SUBMIT EXAMINATION</button>
                </div> 
                <div class="col-md-6" style="font-size: 12pt;text-align: center;border-width: 2px; border-style: solid;">
                  <label>Reminder</label><br>Hi <i><b>{{ $examinee->employee_name }}</b></i> Please review your answers for each exam category before submitting the exam. <br>
                  <br>
                  <div style="font-size: 8pt;line-height: 11px;">
                    <label>Note:</label><br>
                    <i>Please click the item with <b>"No Answer"</b> remark to update your answer.</i>
                  </div>
                  <br>
                </div>

              
              <div class="col-md-12 text-center">
                <div class="row row-centered" style="padding-top: 30px;">
                  @foreach($answer as $a => $lvl0)
                    <div class="col-md-2 col-centered" style="font-size: 6pt;line-height: 10pt;padding-top: 2px;" height=200><h5>{{ $lvl0['exam_name'] }}</h5><br>
                          

                       @foreach($lvl0['nodess'] as $lvl2)
                      <label style="font-size: 10pt;">{{ $lvl2['q_no'] }}.) {{ $lvl2['examinee_answer'] == '' ? '' :$lvl2['examinee_answer']}} </label> @if( $lvl2['examinee_answer'] == '') <button type="button" data-toggle="modal" data-target="#update_answer_preview" data-question="{{ $lvl2['q_no'] }}" data-id="{{ $examinee->examinee_id }}" data-examtype="{{ $lvl0['question_id'] }}" data-exam="{{ $examinee->exam_id }}" style="font-size: 11pt;" class="update_no_answer">No Answer</button> @endif <br>
                      @endforeach
                    </div>
                   @endforeach
                </div>
              </div>

<style type="text/css">
/* centered columns styles */
.row-centered {
    text-align:center;
}
.col-centered {
 display:inline-block;
    float:none;
    /* reset the text-align */
    text-align:left;
    /* inline-block space fix */
    margin-right:-4px;
      vertical-align: text-top;
}
</style>
                   