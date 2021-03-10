<div class="modal fade" id="logout_confirmation" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
  aria-hidden="true" data-keyboard="false" data-backdrop="static">

    <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
    <div class="modal-dialog modal-dialog-centered" role="document">

      <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Confirmation</h5>
          </div>
          <div class="modal-body">
            <h4>Do you want to continue transaction?</h4>
            <span id="timer"></span>
          </div>
          <div class="modal-footer">
                  <button type="submit" class="btn btn-primary" data-dismiss="modal" onclick="stoptimer()"><i class="fa fa-check"></i> Yes</button>
                  <button type="button" class="btn btn-danger" onclick="logout_user()"><i class="fa fa-times"></i> No</button>
            </div>
      </div>
    </div>
</div>
<style type="text/css">
     .stepwizard-step p {
    margin-top: 0px;
    color:#666;
}
.stepwizard-row {
    display: table-row;
}
.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}
.stepwizard-step button[disabled] {
    /*opacity: 1 !important;
    filter: alpha(opacity=100) !important;*/
}
.stepwizard .btn.disabled, .stepwizard .btn[disabled], .stepwizard fieldset[disabled] .btn {
    opacity:1 !important;
    color:blue;
}
.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content:" ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-index: 0;
}
.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}
.btn-circle {
    width: 30px;
    height: 30px;
    text-align: center;
    padding: 6px 0;
    font-size: 12px;
    line-height: 1.428571429;
    border-radius: 15px;
    background-color: blue;
}
   </style>