<!DOCTYPE html>
<html>
	<head>
		<title>Sample jQuery</title>
		<link rel="stylesheet" type="text/css" href="{{asset('js/parsley.css')}}">
		<style type="text/css">
			body, #submit, h1 {font-family: 'century gothic';}
			#content {display: none;}
			

		</style>
		
	</head>
		
	<body>
		<h1>Hello jQuery.</h1>
		<div class="bt-form__wrapper">
  <form class="uk-form bt-flabels js-flabels" data-parsley-validate data-parsley-errors-messages-disabled>
    <div class="uk-grid uk-grid-collapse">
      <div class="uk-width-1-2">
        <div class="bt-flabels__wrapper">
          <label>First Name</label>
          <input type="text" name="first_name" placeholder="First Name" autocomplete="off" data-parsley-required />
          <span class="bt-flabels__error-desc">Required</span>
        </div>
      </div>
      <div class="uk-width-1-2">
        <div class="bt-flabels__wrapper bt-flabels--right">
          <label>Last Name</label>
          <input type="text" name="last_name" autocomplete="off" placeholder="Last Name" data-parsley-required />
          <span class="bt-flabels__error-desc">Required</span>
        </div>
      </div>
    </div>
    <div class="bt-flabels__wrapper">
      <label>Email</label>
      <input type="text" name="email" placeholder="name@website.com" data-parsley-required data-parsley-type="email" autocomplete="off" />
      <span class="bt-flabels__error-desc">Required/Invalid Email</span>
    </div>
    <div class="bt-flabels__wrapper">
      <label>Phone (# used as password)</label>
      <input type="text" name="phone" data-parsley-required placeholder="Phone (# used as password)" autocomplete="off" />
      <span class="bt-flabels__error-desc">Required/Invalid Phone</span>
    </div>

    <div class="bt-flabels__wrapper">
      <label>Exam</label>
      <select style="width: 100%; height: 50px" name="exam" data-parsley-required placeholder="Phone (# used as password)" autocomplete="off">
      	<option value="">HAHAHAHAHA</option>
      	<option value="2">1fwfafafasfafafsfadfafaf</option>
      	<option value="2">11fwfafafasfafafsfadfafaf</option>
      	<option value="2">11fwfafafasfafafsfadfafaf</option>
      	<option value="2">11fwfafafasfafafsfadfafaf</option>
      	<option value="2">11fwfafafasfafafsfadfafaf</option>
      </select>
      <span class="bt-flabels__error-desc">Required/Exam</span>
    </div>
    
    <div class="uk-text-center uk-margin-top">
      <button type="submit" class="uk-button uk-button-primary uk-button-large js-submit">Submit</button>
    </div>
  </form>
  
  
</div>

		<script src="{{ asset('css/js/ajax.min.js') }}"></script> 
		<script type="text/javascript" src="{{ asset('css/js/jquery-min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('css/js/bootstrap.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('css/js/jquery.parallax.js') }}"></script>
		<script type="text/javascript" src="{{ asset('css/js/owl.carousel.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('css/js/wow.js') }}"></script>
		<script type="text/javascript" src="{{ asset('css/js/main.js') }}"></script>
		<script type="text/javascript" src="{{ asset('css/js/jquery.mixitup.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('css/js/nivo-lightbox.js') }}"></script>
		<script type="text/javascript" src="{{ asset('css/js/jquery.counterup.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('css/js/waypoints.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('css/js/form-validator.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('css/js/contact-form-script.js') }}"></script>
		<script type="text/javascript" src="{{ asset('css/js/jquery.themepunch.revolution.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('css/js/jquery.themepunch.tools.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('css/js/jquery.slicknav.js') }}"></script>
		<script src="{{ asset('css/js/bootstrap-select.min.js') }}"></script>
		<script src="{{ asset('css/js/jQuery-plugin-progressbar.js') }}"></script>
		<script src="{{ asset('css/js/calendar.js') }}"></script>
		<script type="text/javascript" src="{{asset('js/parsley.min.js')}}"></script>
		<script type="text/javascript">

			$(document).ready(function(){
				$('#')
			});
		(function ($) {
  'use strict';

  var floatingLabel;

  floatingLabel = function floatingLabel(onload) {
    var $input;
    $input = $(this);
    if (onload) {
      $.each($('.bt-flabels__wrapper input'), function (index, value) {
        var $current_input;
        $current_input = $(value);
        if ($current_input.val()) {
          $current_input.closest('.bt-flabels__wrapper').addClass('bt-flabel__float');
        }
      });
    }

    setTimeout(function () {
      if ($input.val()) {
        $input.closest('.bt-flabels__wrapper').addClass('bt-flabel__float');
      } else {
        $input.closest('.bt-flabels__wrapper').removeClass('bt-flabel__float');
      }
    }, 1);
  };

  $('.bt-flabels__wrapper input').keydown(floatingLabel);
  $('.bt-flabels__wrapper input').change(floatingLabel);

  window.addEventListener('load', floatingLabel(true), false);
  $('.js-flabels').parsley().on('form:error', function () {
    $.each(this.fields, function (key, field) {
      if (field.validationResult !== true) {
        field.$element.closest('.bt-flabels__wrapper').addClass('bt-flabels__error');
      }
    });
  });

  $('.js-flabels').parsley().on('field:validated', function () {
    if (this.validationResult === true) {
      this.$element.closest('.bt-flabels__wrapper').removeClass('bt-flabels__error');
    } else {
      this.$element.closest('.bt-flabels__wrapper').addClass('bt-flabels__error');
    }
  });

})(jQuery);
		</script>
		

	</body>
</html>


<div id="test"></div>