<!-- Modal -->
<div class="modal fade" id="selectDateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
   <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
   <div class="modal-dialog modal-lg modal-dialog-centered" role="document">

      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Select Absence Date</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form></form>
         <div class="modal-body" id="datetimerange">
            <div class="row">
               <div class="col-md-12 text-center">
                  <p><span id="selected-dates">Please select date range</span></p>
                  <input type="hidden" id="date-from"/>
                  <input type="hidden" id="date-to"/>
               </div>
               <div class="col-md-12 mt-3 mb-3">
                  <div id="time-range" class="text-center">
                     <p><span class="slider-time"></span> to <span class="slider-time2"></span></p>
                     <div class="sliders_step1">
                        <div id="slider-range"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal" id="set-dates">Set</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
         </div>
      </div>
   </div>
</div>

<style type="text/css">
   #datetimerange p {
      font-family:"Arial", sans-serif;
      font-size:20px;
      color:#333;
   }
   .ui-slider-horizontal {
      height: 10px;
      background: #D7D7D7;
      border: 1px solid #BABABA;
      box-shadow: 0 1px 0 #FFF, 0 1px 0 #CFCFCF inset;
      clear: both;
      margin: 8px 0;
      -webkit-border-radius: 6px;
      -moz-border-radius: 6px;
      -ms-border-radius: 6px;
      -o-border-radius: 6px;
      border-radius: 6px;
   }
   .ui-slider {
      position: relative;
      text-align: left;
   }
   .ui-slider-horizontal .ui-slider-range {
      top: -1px;
      height: 100%;
   }
   .ui-slider .ui-slider-range {
      position: absolute;
      z-index: 1;
      height: 10px;
      font-size: .7em;
      display: block;
      border: 1px solid #0288d1;
      -moz-border-radius: 6px;
      -webkit-border-radius: 6px;
      -khtml-border-radius: 6px;
      border-radius: 6px;
      background: #4fc3f7;
   }
   .ui-slider .ui-slider-handle {
      border-radius: 50%;
      background: #039be5   ;
      width: 28px;
      height: 28px;
   }
   .ui-slider .ui-slider-handle {
      position: absolute;
      z-index: 2;
      width: 28px;
      height: 28px;
      cursor: default;
      border: none;
      cursor: pointer;
   }
   .ui-slider-horizontal .ui-slider-handle {
      top: -.5em;
      margin-left: -.6em;
   }
   .ui-slider a:focus {
      outline:none;
   }

   #slider-range {
      width: 90%;
      margin: 0 auto;
   }
   #time-range {
      width: 100%;
   }
</style>