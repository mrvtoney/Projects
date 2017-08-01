$(document).ready(function() {

	var validfield = new ValidateField();

	var valid = new Validate(validfield);

	var form = new Form();

	$('form  input').not(' #ssn0, #ssn1, #ssn2').blur(function() {
		valid.checkValidity(this);
	});

	$('form input[type=checkbox]').click(function() {
		valid.checkValidity(this);
	});

	$('form  input[type=checkbox], form input[type=text], form select, form input[type=email]'
		+', form input[type=tel], form input[type=number] ').focus(function() {
		valid.checkAllRequiredFields(this);
		valid.checkAllFieldValidity(this);
	});
	
	$('form input[type=radio]').change(function() {
		valid.checkAllRequiredFields(this);
		valid.checkAllFieldValidity(this);
	});

	$('form input[type=checkbox]').change(function() {
		valid.checkAllRequiredFields(this);
	});
	$('#enrollment-2 form #submit button').click(function(e) {
		e.preventDefault();
		valid.checkAllRequiredFields(null);
		valid.checkAllFieldValidity(null);
		validfield.get_ssn();
		var errorExist = false;
		if($('.border-error').length == 0) {
			$('form #submit button').hide();
			$('form #submit').prepend('<img width="32" height="32" class="loader" src="/wp-content/themes/univision/images/ajax-loader.gif" />'); 
			form.submitEnrollment();
		}
	});

	$('#refer-reminder form #submit #refer-final-send-me-reminder').click(function(e) {
		e.preventDefault();
		valid.checkAllRequiredFields(null);
		valid.checkAllFieldValidity(null);
		var errorExist = false;
		if($('.border-error').length == 0) {
			$('form #submit button').hide();
			$('form #submit').prepend('<img width="32" height="32" class="loader" src="/wp-content/themes/univision/images/ajax-loader.gif" />'); 
		//	form.submitEnrollment();
			$('form').submit();
			
		}
	});

	$('form select[name=year], form select[name=day], form select[name=month]').change(function() {
		validfield.get_correct_birthday(this, valid);
	});

	$('form select').change(function() {
		valid.checkRequiredField(this);
	});

	$('form #ssn0, form #ssn1, form #ssn2').blur( function() {
		validfield.get_ssn();
	});

	$('form #nossn').click(function() {
		validfield.no_ssn();
	});
	
	$('#nossn').click(function() {
		if($('#nossn').is(':checked')) {
			$('#ssn0').removeClass('border-error');
			$('#ssn1').removeClass('border-error');
			$('#ssn2').removeClass('border-error');
			$('#ssn-wrapper .error-msg').html('');
		} 
	});
	
	$('#emailme-reminder').blur(function() {
			 var obj = $(this);
	         if(!validfield.get_throw_away_email(obj)) {
                        validfield.setErrorMessage(obj);
             } else {
                        validfield.removeErrorMessage("emailreminder-wrapper");

						//$('#emailreminder-container .submit').removeAttr('disabled');
             } 
	});

	$('#emailreminder-container .submit').click( function(e) {
		e.preventDefault();

		var obj = $('#emailme-reminder');
	    if(!validfield.get_throw_away_email(obj)) {
            validfield.setErrorMessage(obj);
        } else {
            validfield.removeErrorMessage("emailreminder-wrapper");
            emailReminder($('#emailForm'));
        }

		//if($(this).attr('disabled') != 'disabled') {
		//	emailReminder($('#emailForm'));
		//}
	});

	$('#emailme-reminder-a').click(function(e) {
		e.preventDefault();
		$('#emailreminder-container').css('display', 'block');
	});

	$('#id').show(); 
         
        if(isCitizen) { 
                $('.yes-mssg-ssn').show(); 
                $('.no-mssg-ssn').hide(); 
                var hideElements = new Array('#idtype-legend', '#idtype-wrapper', '#idnumber-wrapper', '#or-legend', '#nossn-wrapper', '#passportcountry-wrapper');              
                $.each(hideElements, function(index, item){ 
                        $(item).hide();                  
                });
        } else {
                $('.no-mssg-ssn').show();
        }
function emailReminder(obj) {
       jQuery.ajax({
                type: "POST",
                url: "email-reminder",
                data: $(obj).serialize(),
                success: function(data) {
			var dataJson = jQuery.parseJSON(data);
			if($("#emailme-reminder-error").length > 0) {
				$("#emailme-reminder-error").remove();
			}

			$(obj).after('<p id="emailme-reminder-error"><b>' + dataJson.response + '</b></p>');
                        if(dataJson.sent == true) {
				$("#comeback-container").remove();
				$(obj).css('height' , '0px').remove();
				$('#emailreminder-container').css('height', '20px');
			}
                }
        });
}
});
