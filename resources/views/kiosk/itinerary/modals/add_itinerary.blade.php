<!-- Modal Add Itinerary -->
<div class="modal fade" id="modalAddItinerary" tabindex="-1" role="dialog" aria-labelledby="AddItinerary" aria-hidden="true">

   <!-- Add .modal-dialog-centered to .modal-dialog to vertically center the modal -->
   <div class="modal-dialog modal-xl" role="document">
      <form>
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Add Itinerary</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <div class="row mt-2">
               <div class="col-md-6">
                  <label for="from">From</label>
                  <select class="browser-default custom-select" name="from" id="from-select">
                     <option value = "">--</option>
                     <option value="Lead">Lead</option>
                     <option value="Customer">Customer</option>
                     <option value="Supplier">Supplier</option>
                     <option value="Others">Others</option>
                  </select>
               </div>
               <div class="col-md-6">
                  <label for="destination">Destination</label>
                  <div class="input-group mb-3">
                     <input type="text" class="form-control destination-name" placeholder="Enter Destination" id="destination">
                     <div class="input-group-append">
                        <button class="btn btn-md btn-primary m-0 px-3 py-2 z-depth-0 waves-effect" type="button" id="button-addon2" data-toggle="modal" data-target="#modalSelectDestination">Select</button>
                    </div>
                  </div>
               </div>
            </div>
            <div class="row mt-2">
               <div class="col-md-6" id="datepairExample">
                  <label for="from-date">Itinerary Date & Time</label>
                  <div class="input-group">
                     <input type="text" aria-label="Itinerary Date" class="form-control w-50" name="itinerary_date" autocomplete="off" id="itinerary-date" placeholder="Select Date" readonly>
                      <input type="text" aria-label="Itinerary Time" class="form-control w-25" name="itinerary_time" autocomplete="off" id="itinerary-time" placeholder="Select Time" readonly>
                  </div>
               </div>
               <div class="col-md-6">
                  <label for="project">Project</label>
                  <div class="input-group mb-3">
                     <input type="text" class="form-control project-name" id="project" placeholder="Tap to select" readonly>
                     <div class="input-group-append">
                        <button class="btn btn-md btn-primary m-0 px-3 py-2 z-depth-0 waves-effect" type="button" id="button-addon2" data-toggle="modal" data-target="#modalSelectProject">Select</button>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row mt-2">
               <div class="col-md-6">
                  <label for="purpose">Purpose</label>
                  <textarea class="form-control" name="purpose" id="purpose"></textarea>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-primary add-row">Add</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
         </div>
      </div>
      </form>
   </div>
</div>
<!-- Modal Add Itinerary -->