<div class="modal fade" id="deleteExaminee{{$examinee->examinee_id}}">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Delete Examinee</h4>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form method='post' action="/tabDeleteExaminee">
                @csrf
                    <div class="row" style="margin: 7px; font-size: 12pt;">
                        <div class="col-sm-12" style="margin-top: -30px;">
                            Delete Examinee <b>{{$examinee->employee_name}}</b> for <b>{{$examinee->exam_title}}</b> ?
                            <input type="number" name="examinee_id" id="examinee_id" value="{{$examinee->examinee_id}}" hidden>
                        </div>
                    </div>
                    <div class="modal-footer" style="margin-top: -20px;">
                        <button type="submit" class="btn btn-primary" id="deleteExamType"><i class="fa fa-check"></i> Delete</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                    </div>
                </form>
            </div>
        </div>
         <!-- Modal footer -->
    </div>
</div>