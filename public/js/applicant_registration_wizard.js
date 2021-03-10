;(function($) {
    "use strict";  
    
    //* Form js
    function verificationForm(){
        //jQuery time
        var current_fs, next_fs, previous_fs; //fieldsets
        var left, opacity, scale; //fieldset properties which we will animate
        var animating; //flag to prevent quick multi-click glitches

        $(".next").click(function () {
            if (animating) return false;
            animating = true;

            current_fs = $(this).parent();
            next_fs = $(this).parent().next();

            //activate next step on progressbar using the index of next_fs
            $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

            //show the next fieldset
            next_fs.show();
            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function (now, mx) {
                    //as the opacity of current_fs reduces to 0 - stored in "now"
                    //1. scale current_fs down to 80%
                    scale = 1 - (1 - now) * 0.2;
                    //2. bring next_fs from the right(50%)
                    left = (now * 50) + "%";
                    //3. increase opacity of next_fs to 1 as it moves in
                    opacity = 1 - now;
                    current_fs.css({
                        'transform': 'scale(' + scale + ')',
                        'position': 'absolute'
                    });
                    next_fs.css({
                        'left': left,
                        'opacity': opacity
                    });
                },
                duration: 800,
                complete: function () {
                    current_fs.hide();
                    animating = false;
                },
                //this comes from the custom easing plugin
                easing: 'easeInOutBack'
            });
        });

        $(".previous").click(function () {
            if (animating) return false;
            animating = true;

            current_fs = $(this).parent();
            previous_fs = $(this).parent().prev();

            //de-activate current step on progressbar
            $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

            //show the previous fieldset
            previous_fs.show();
            //hide the current fieldset with style
            current_fs.animate({
                opacity: 0
            }, {
                step: function (now, mx) {
                    //as the opacity of current_fs reduces to 0 - stored in "now"
                    //1. scale previous_fs from 80% to 100%
                    scale = 0.8 + (1 - now) * 0.2;
                    //2. take current_fs to the right(50%) - from 0%
                    left = ((1 - now) * 50) + "%";
                    //3. increase opacity of previous_fs to 1 as it moves in
                    opacity = 1 - now;
                    current_fs.css({
                        'left': left
                    });
                    previous_fs.css({
                        'transform': 'scale(' + scale + ')',
                        'opacity': opacity
                    });
                },
                duration: 800,
                complete: function () {
                    current_fs.hide();
                    animating = false;
                },
                //this comes from the custom easing plugin
                easing: 'easeInOutBack'
            });
        });

    }; 
    
    /*Function Calls*/  
    verificationForm ();
})(jQuery); 


$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#register-exams-fs .next').hide();

    var d = new Date();
    var month = d.getMonth()+1;
    var day = d.getDate();

    var today = d.getFullYear() + '-' +
        ((''+month).length<2 ? '0' : '') + month + '-' +
        ((''+day).length<2 ? '0' : '') + day;

    // Append table with add row form on add new button click
    $(".add-new").click(function(){
        var exam_sel = '<select class="form-control1" name="exam_id[]">';
        var actions = '<a class="delete"><i class="fa fa-trash"></i></a>';
        $.ajax({
            url:"/client/exams/applicant_exams",
            type:"GET",
            success:function(response){
                $.each(response, function(i,d){
                    exam_sel += '<option value=' + d['exam_id'] + '>' + d['exam_title'] + '</option>';
                });
                exam_sel += '</select>';
                var row = '<tr>' +
                    '<td>' + exam_sel + '</td>' +
                    '<td><input type="date" class="form-control1" name="exam_date[]" value="'+ today +'"></td>' +
                    '<td><input type="date" class="form-control1" name="validity_date[]" value="'+ today +'"></td>' +
                    '<td>' + actions + '</td>' +
                '</tr>';
                $("#exams-table").append(row);     
            }
        });

        var rowCount = $('#exams-table tr').length;
        if (rowCount > 0) {
            $('#register-exams-fs .next').show();
        }
    });

    // Delete row on delete button click
    $(document).on("click", ".delete", function(){
        $(this).parents("tr").remove();
        $(".add-new").removeAttr("disabled");
    });

    $('#register-applicant-fs .action-button').click(function(){
        var applicant_id = $('#register-exams-fs .applicant_id').val();
        if (applicant_id === '') {
            $.ajax({
                url:"/client/applicant/create",
                type:"POST",
                data:$('#register-applicant-frm').serialize(),
                success:function(response){
                    $('#register-exams-fs .applicant_id').val(response.id);
                }
            });
        }else{
            $.ajax({
                url:"/client/applicant/update/" + applicant_id,
                type:"POST",
                data:$('#register-applicant-frm').serialize(),
                success:function(response){
                    $('#register-exams-fs .applicant_id').val(response.id);
                }
            });
        }
    });

    $('#applicant-exam-details-fs .action-button').click(function(){
        location.reload();
    });

    $('#register-exams-fs .next').click(function(){
        var applicant_id = $('#register-exams-fs .applicant_id').val();

        $.ajax({
            url:"/client/applicant/submitWizard",
            type:"POST",
            data:$('#register-exams-frm').serialize(),
            success:function(response){
                console.log(response);
            }
        });
        
        $.ajax({
            url:"/client/hr/applicant_exam_details/" + applicant_id,
            type:"GET",
            success:function(response){
                $('#applicant-exam-details-fs .applicant-name').text(response.applicant.employee_name);
                $('#applicant-exam-details-fs .position-1').text(response.applicant.pos1);
                $('#applicant-exam-details-fs .position-2').text(response.applicant.pos2);

                $.each(response.exams, function(i,d){
                    var row = '<tr>' +
                        '<td>' + d['exam_title'] + '</td>' +
                        '<td>' + d['exam_code'] + '</td>' +
                        '<td>' + d['date_of_exam'] + '</td>' +
                        '<td>' + d['validity_date'] + '</td>' +
                    '</tr>';
                    $("#applicant-exam-details-fs table").append(row); 
                });

            }
        });
    });

    $('#register-applicant-fs .action-button').hide();

    $('.req').each(function() {
        $(this).attr('style', "border:#FF0000 1px solid;");
    });
    
    $('#register-applicant-fs .form-control1').bind('keyup change', function() {
        var isValid = true;
        $('#register-applicant-fs input,textarea,select').filter('[required]:visible').each(function() {
            $(this).removeAttr('style');
            if ( $(this).val() === '' ){
                isValid = false;
                $(this).attr('style', "border:#FF0000 1px solid;");
            }
        });

        if (isValid == false) {
            $('#register-applicant-fs .action-button').hide();
        } else {
            $('#register-applicant-fs .action-button').show();
        }
    });

    $('#add-applicant-modal').on('hidden.bs.modal', function(){
        $(this).find('form')[0].reset();
        location.reload();
    });
});
