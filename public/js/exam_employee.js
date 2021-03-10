$(document).ready(function(){
	$.ajaxSetup({
  		headers: {
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$(document).on('click', '.submit-btn', function(){
		var frmid = $(this).data('id');
		var data = $('#form' + frmid).serialize();
		$.ajax({
          	url:'/oem/employee/update_answer',
          	method:"POST",
          	data: data,
          	success:function(response){
           		console.log(response);
          	},
          	error: function(response) {
	            console.log(response);
	        }
        });
	});
});



