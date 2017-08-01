function ValidateField(valid) {

	this.get_ssn = function(){
		var ssn0 = $('#ssn0').val();
		var ssn1 = $('#ssn1').val();
		var ssn2 = $('#ssn2').val();
		var ssn = ssn0 + ssn1 + ssn2;
		if($('#nossn').is(':checked')) {
			return true;
		}

		if(ssn0 != '' && ssn0.match(/[0-9]{3}/)) {
			$('#ssn0').parent('div').removeClass('error');
			$('#ssn0').removeClass('border-error');	
		}
		if(ssn1 != '' && ssn1.match(/[0-9]{2}/)) {
			$('#ssn1').parent('div').removeClass('error');
			$('#ssn1').removeClass('border-error');	
		}
		if(ssn2 != '' && ssn2.match(/[0-9]{4}/)) {
			$('#ssn2').parent('div').removeClass('error');
			$('#ssn2').removeClass('border-error');	
		}
		if(ssn0 == '' || ssn1 == '' || ssn2 == '') {
			this.removeCheck($('#ssn2'));
			return false;
		} else if (ssn.match(/[0-9]{9}/) !== null) {
			var wrapperId = $('#ssn0').parents('div').attr('id');
			$('#' + wrapperId + ' .error-msg').html('');
			this.displayCheck($('#ssn2'));
			return true;			
		} else if (ssn.match(/[0-9]{9}/)) {
			this.removeCheck($('#ssn2'));
			return false;
		}
	}

	this.no_ssn = function() {
		if($('#nossn').is(':checked')) {
			$('#ssn1').parent('div').removeClass('error');
			$('#ssn0').removeClass('border-error');	
			$('#ssn1').removeClass('border-error');	
			$('#ssn2').removeClass('border-error');	
		}
	}
	
	this.get_not_address1 = function(obj) {
		if($('#address1').val() == $('#address2').val()) {
			return false;
		} else {
			return true;
		}
	}

	this.get_throw_away_email = function(obj) {
		var email = $(obj).val();
		if(typeof email == 'undefined') {
			return;
		}	
	
		if(email == '') {
			return false;
		}

		if(email.indexOf('@') == -1) {
			return false;
		}

        	var domain = email.split('@')[1];
                switch (domain) {
                        case 'klzlk.com':
                        case 'mailinator.com':
                                return false;
                                break;
                        default:
                                return true;
                }
	}
	
	this.get_confirm_email = function(obj) {
		var objId = $(obj).attr('id');
		if($('#email').val() == '' || $(obj).is(':focus')) {
			return;
		}
		if($('#' + objId).val() == $('#email').val() && $('#email').val() !== '') {
			return true;
		} else {
			return false;
		}
	}

	this.get_correct_birthday = function(obj) {
		var wrapperId = $(obj).parents('div').attr('id');
		var month = $('select[name=month]').find(':selected').val();
		if(month == 'default') {
			return false;
		}
		if( month.match(/^0/) != null) {
			month =	month.replace('0', '');
		}
		month = parseInt(month);

		var day = $('select[name=day]').find(':selected').val();
		if(day == 'default') {
			return;
		}

		if( day.match(/^0/) != null) {
			day = day.replace('0', '');
		}
		day = parseInt(day);

		var year = $('select[name=year]').find(':selected').val();
		if(year == 'default') {
			return;
		}

		year = parseInt(year);
		var DoB = new Date(year,month-1,day);
		var minDoB = new Date;
		var minYear = minDoB.getFullYear()-18;
		minDoB.setFullYear(minYear);
		if((DoB > minDoB)) {
			$('select[name=year]').addClass('border-error');	
			$('select[name=month]').addClass('border-error');
			$('select[name=day]').addClass('border-error');
			this.removeCheck($(obj).parent('div').attr('id'));
//			this.setErrorMessage($(obj));
			//$('#age .legend').html('');
                        errorMessage = window['age_error']; 
                	$('#age .error-msg').html(''); 
	                $('#age .error-msg').html($('<p>') 
        	                                     .html(errorMessage)); 
		/*} else if(month > curMonth && yearCount <= 18) {
			$('select[name=year]').addClass('border-error');	
			$('select[name=month]').addClass('border-error');
			$('select[name=day]').addClass('border-error');
			this.removeCheck($(obj).parent('div').attr('id'));
			this.setErrorMessage($(obj));*/
		} else {
			$('select[name=year]').removeClass('border-error');	
			$('select[name=month]').removeClass('border-error');
			$('select[name=day]').removeClass('border-error');
			$('#' + wrapperId).removeClass('error');
			this.displayCheck($('select[name=year]'));
			$('#' + wrapperId + ' .error-msg').text('');
		}
	}

        this.displayCheck = function(obj) { 
                if(!$(obj).next().hasClass('green-check-mark')) { 
                        $(obj).after('<img class="green-check-mark" width="24" height="24" src="/forms/images/green-checkmark-icon.png">'); 
                } 
        } 
 
        this.removeCheck =  function(wrapperId) { 
                $('#' + wrapperId + ' .green-check-mark').remove(); 
        } 

        this.setErrorMessage = function(obj) { 
                var errorMessage = ''; 
                var wrapperDiv  = $(obj).parents('div').attr('id'); 
                var errorName = wrapperDiv.replace('-wrapper', ''); 
                if(typeof window[errorName + '_error'] !== 'undefined') { 
                        errorMessage = window[errorName + '_error']; 
                } else { 
                        return; //errorMessage = 'error did not exist'; 
                } 
                         
                if(errorMessage.indexOf('%s') != -1) { 
                        errorMessage = this.parseValidityText(errorName + '_error', $('#' + wrapperDiv + ' label').text()); 
                } 

                var wrapperDiv  = $(obj).parents('div').attr('id'); 
                $('#' + wrapperDiv + ' .error-msg').html(''); 
                //$('#' + wrapperDiv + ' .error-msg').html($('<p>').text(errorMessage));
                $('#' + wrapperDiv + ' .error-msg').html(errorMessage).text(); 
        } 

        this.removeErrorMessage = function(wrapperId) {
                $('#' + wrapperId + ' .error-msg').text('');
        }

}
