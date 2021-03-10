 <div class="container">
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step "> 
                <a href="#step-1" type="button" class="btn btn-success btn-circle">1</a>
                <p><small>Step 1</small></p>
            </div>
            <div class="stepwizard-step "> 
                <a href="#step-2" type="button" class="btn btn-default btn-circle">2</a>
                <p><small>Step 2</small></p>
            </div>
            <div class="stepwizard-step "> 
                <a href="#step-3" type="button" class="btn btn-default btn-circle">3</a>
                <p><small>Step 3</small></p>
            </div>  
            <div class="stepwizard-step "> 
                <a href="#step-4" type="button" class="btn btn-default btn-circle">4</a>
                <p><small>Step 4</small></p>
            </div>
            <div class="stepwizard-step "> 
                <a href="#step-5" type="button" class="btn btn-default btn-circle">5</a>
                <p><small>Step 5</small></p>
            </div>
            <div class="stepwizard-step "> 
                <a href="#step-6" type="button" class="btn btn-default btn-circle">6</a>
                <p><small>Step 6</small></p>
            </div>
            <div class="stepwizard-step "> 
                <a href="#step-7" type="button" class="btn btn-default btn-circle">7</a>
                <p><small>Step 7</small></p>
            </div>
            <div class="stepwizard-step "> 
                <a href="#step-8" type="button" class="btn btn-default btn-circle">8</a>
                <p><small>Step 8</small></p>
            </div>
            <div class="stepwizard-step "> 
                <a href="#step-9" type="button" class="btn btn-default btn-circle">9</a>
                <p><small>Step 9</small></p>
            </div>
        </div>
    </div>
    
    <form role="form">
        <div class="panel panel-primary setup-content" id="step-1">
            <div class="panel-heading">
            </div>
            <div class="panel-body">
                <img src="{{ asset('storage/kiosk/itinerary_step1.png') }}"  width="450" height="350"/>
            </div>
        </div>
        
        <div class="panel panel-primary setup-content" id="step-2">
            <div class="panel-heading">
        
            </div>
            <div class="panel-body">
                <img src="{{ asset('storage/kiosk/itinerary_step2.png') }}"  width="450" height="350"/>
            </div>
        </div>
        
        <div class="panel panel-primary setup-content" id="step-3">
            <div class="panel-heading">
              
            </div>
            <div class="panel-body">
                <img src="{{ asset('storage/kiosk/itinerary_step3.png') }}"  width="450" height="350"/>
                
            </div>
        </div>
        
        <div class="panel panel-primary setup-content" id="step-4">
            <div class="panel-heading">
             
            </div>
            <div class="panel-body">
                <img src="{{ asset('storage/kiosk/itinerary_step4.png') }}"  width="450" height="350"/>
                
            </div>
        </div>
        <div class="panel panel-primary setup-content" id="step-5">
            <div class="panel-heading">
            </div>
            <div class="panel-body">
                <img src="{{ asset('storage/kiosk/itinerary_step5.png') }}"  width="450" height="350"/>
                
            </div>
        </div>
        <div class="panel panel-primary setup-content" id="step-6">
            <div class="panel-heading">
            </div>
            <div class="panel-body">
                <img src="{{ asset('storage/kiosk/itinerary_step6.png') }}"  width="450" height="350"/>
                
            </div>
        </div>
        <div class="panel panel-primary setup-content" id="step-7">
            <div class="panel-heading">
            </div>
            <div class="panel-body">
                <img src="{{ asset('storage/kiosk/itinerary_step7.png') }}"  width="450" height="350"/>
                
            </div>
        </div>
        <div class="panel panel-primary setup-content" id="step-8">
            <div class="panel-heading">
            </div>
            <div class="panel-body">
                <img src="{{ asset('storage/kiosk/itinerary_step8.png') }}"  width="450" height="350"/>
                
            </div>
        </div>
        <div class="panel panel-primary setup-content" id="step-9">
            <div class="panel-heading">
            </div>
            <div class="panel-body">
                <img src="{{ asset('storage/kiosk/itinerary_step9.png') }}"  width="450" height="350"/>
                
            </div>
        </div>
    </form>
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
   <script type="text/javascript">
  $(document).ready(function () {

    var navListItems = $('div.setup-panel div a'),
        allWells = $('.setup-content'),
        allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-success').addClass('btn-default');
            $item.addClass('btn-success');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function () {
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for (var i = 0; i < curInputs.length; i++) {
            if (!curInputs[i].validity.valid) {
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid) nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-success').trigger('click');
});
</script>