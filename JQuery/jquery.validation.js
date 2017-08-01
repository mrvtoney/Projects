function Validate(vf) {
	this.validate = function(obj) {	
		if(typeof $(obj).attr('data-regex') !== 'undefined') {
			return this.validateField(obj);
		} 
		if(typeof $(obj).attr('data-funct') !== 'undefined') {
			return vf[$(obj).attr('data-funct')](obj);
		}
//		if($(obj).attr('id') == 'ssn0' || $(obj).attr('id') == 'ssn1' || $(obj).attr('id') == 'ssn2') {
		//	return vf.get_ssn($(obj));
//		}
//		if(!$(obj).is(':checked') && $(obj).is(':checkbox')) {
//			return false;
//		}
//		if($(obj).is(':checked') && $(obj).is(':checkbox')) {
//			return true;
//		}
	}

	this.validateField = function(obj) {
		var valid =  this;
		var reg = $(obj).attr('data-regex');
		var objVal = $(obj).val();
		regex = reg.slice(2, -2);
		regex = regex.split('],[');
		var isValid = false;
		$.each(regex, function(index, data) {
			if(data.indexOf(':alpha:') > 0 ) {
				data = valid.multibyteAlphaReplace(data);
			}
			if(objVal.match(data.slice(1, -1)) !== null && data != '') {
				isValid = true;
			} 
		});	
		return isValid;
	}

	this.checkValidity = function(obj) {
		if(!$(obj).is(':visible')) {
			return;
		}
		
		if($(obj).attr('type') == 'radio'){
			return;
		}

		if($(obj).is(':disabled')) {
			return;
		}

		//For fields that have some sort of auto formatting and if a user decides not to enter a value for a field
		var isValid = false;	
		if(($(obj).val() == '' || $(obj).val() == '___-___-____' )&& $(obj).is('input') && $(obj).attr('id') !== 'emailconfirm') {
			isValid = true;
			if($(obj).attr('id') == 'email') {
				$('#emailconfirm').parent('div').removeClass('error');
				$('#emailconfirm').removeClass('border-error');
				this.removeErrorMessage($('#emailconfirm').parents('div').attr('id'));
			}
			$(obj).removeClass('border-error');
			$(obj).parent('div').removeClass('error');
			this.removeErrorMessage($(obj).parents('div').attr('id'));
			this.removeCheck($(obj).parents('div').attr('id'));
			return ;
		}

		if($(obj).is(':checkbox') && $(obj).is(':checked')) {
			$(obj).parent('div').removeClass('error');
			$(obj).removeClass('border-error');
			this.removeErrorMessage($(obj).parent('div').attr('id'));
			this.removeCheck($(obj).parents('div').attr('id'));
		}
		isValid = this.validate($(obj));
		if(typeof isValid != 'undefined' && isValid == true && !$(obj).is(':checkbox')) {
			$(obj).removeClass('border-error');
			$(obj).parent('div').removeClass('error');
			this.removeErrorMessage($(obj).parents('div').attr('id'));
			this.displayCheck(obj);	
		} else if(isValid == false) {
			$(obj).addClass('border-error');
			$(obj).parent('div').addClass('error');
			this.setErrorMessage(obj);
			this.removeCheck($(obj).parents('div').attr('id'));
		} else if ( typeof isValid == 'undefined' && $(obj).attr('id') == 'emailconfirm') {
			$(obj).parent('div').removeClass('error');
			$(obj).removeClass('border-error');
			this.removeErrorMessage($(obj).parents('div').attr('id'));
		}
	}

	this.checkAllFieldValidity = function(stopObj) {
		var valid = this;
		$('form input').not('.border-error, #ssn0, #ssn1, #ssn2, select, input[type=checkbox]').each(function(index, data) { 
			if(stopObj == data) {
				valid.checkValidity($(stopObj));
				return false;
			}
		
			if(!$(data).is(':visible')) {
				return;
			}

			valid.checkValidity($(data));
		});
	}

	this.checkAllRequiredFields = function(stopObj) {
		var wrappedId = '';
		var valid = this;
		var count = 0;
		$('form input:visible, form select:visible, form radio').each(function(index, data) {
			if(stopObj == data) {
				return false;
			}
			valid.checkRequiredField(data);
		});
	}

	this.checkRequiredField = function(data) {
//			if(typeof $(data).attr('id') == 'undefined') {
//				return;
//			}
			wrappedId = $(data).parents('div').attr('id');
			if($(data).is(':disabled')) {
				return;
			}
	                if($('#nossn').is(':checked') && ($(data).get(0) == $('#ssn0').get(0) || $(data) == $('#ssn1') || $(data) == $('#ssn2'))) {
	                        return;
        	        }

			if($('#' + wrappedId + ' label.required').length) {
				if($(data).val() == '' && $(data).is('input') && $(data).attr('type') != 'radio' && $(data).attr('type') != 'checkbox') {
					var errorMessage = this.parseRequiredText($('#' + wrappedId + ' label.required').text());
					$('#' + wrappedId + ' .error-msg').html('');
					$('#' + wrappedId + ' .error-msg').html($('<p>').html(errorMessage));
					$(data).parent('div').addClass('error');
					$(data).addClass('border-error');
					this.removeCheck(wrappedId);
				} else if ($(data).val() != '' && $(data).is('input') && $(data).attr('type') != 'radio' &&  $('#' + wrappedId + ' input').length == 1 && $(data).attr('type') != 'checkbox') {
					this.displayCheck(data);
					$('#' + wrappedId + ' .error-msg').html('');
					$(data).parent('div').removeClass('error');
					$(data).removeClass('border-error');
				} else if ($(data).val() != '' && $(data).is('input') && $(data).attr('type') != 'radio' &&  $('#' + wrappedId + ' input').length > 1 && $(data).attr('type') != 'checkbox') {
//					this.displayCheck($('#' + wrappedId + ' input:last-child '));
///					$('#' + wrappedId + ' .error-msg').html('');
//					$(data).parent('div').removeClass('error');
//					$(data).removeClass('border-error');
				}

        	                        if(!$(data).is(':checked') && $(data).is('input') && $(data).attr('type') != 'radio' && $(data).attr('type') == 'checkbox') {
                	                        var errorMessage = this.setErrorMessage($(data));
	                                        $(data).parent('div').addClass('error');
        	                                $(data).addClass('border-error');
                	                        this.removeCheck(wrappedId);
                        	        } else if ($(data).is(':checked') && $(data).is('input') && $(data).attr('type') != 'radio' &&  $('#' + wrappedId + ' input').length == 1 && $(data).attr('type') == 'checkbox') {
                                        	$('#' + wrappedId + ' .error-msg').html('');
	                                        $(data).parent('div').removeClass('error');
        	                                $(data).removeClass('border-error');
        	                        }
				if($(data).find(':selected').val() == 'default' && $(data).is('select') ) {
					var errorMessage = this.parseRequiredText($('#' + wrappedId + ' label.required').text());
					$('#' + wrappedId + ' .error-msg').html('');
					$('#' + wrappedId + ' .error-msg').html($('<p>').html(errorMessage));
					$(data).parent('div').addClass('error');
					$(data).addClass('border-error');
					this.removeCheck(wrappedId);
				} else if($(data).find(':selected').val() != 'default' && $(data).is('select') && $('#' + wrappedId + ' select').length == 1) {
					this.displayCheck(data);
					$(data).parent('div').removeClass('error');
					$(data).removeClass('border-error');
					$('#' + wrappedId + ' .error-msg').html(' ');
				} else if($(data).find(':selected').val() != 'default' && $(data).is('select') && $('#' + wrappedId + ' select').length > 1) {
//					this.displayCheck($('#' + wrappedId + ' select:last-child '));
//					$(data).removeClass('border-error');
//					$('#' + wrappedId + ' .error-msg').html(' ');
				}
				if($(data).attr('type') == 'radio') {
					var radioName = $(data).attr('name');
					var isChecked = false;
					$('input[name=' + radioName + ']').each(function(index, data) {
						if($(data).is(':checked')) {
							isChecked = true;
						}
					});
					if(!isChecked) {
				
							$('#' + wrappedId + ' .error-msg').html('');
							var errorMessage = this.parseRequiredText($('#' + wrappedId + ' label.required').text());
							$('#' + wrappedId + ' .error-msg').html($('<p>').html(errorMessage));
							$(data).parent('div').addClass('error');
							$(data).addClass('border-error');
			//			valid.removeCheck(wrappedId);
					} else {
			//			var lastRadio = $('#' + wrappedId + ' span:last-child input');
			//			valid.displayCheck(lastRadio);
						$('#' + wrappedId + ' .error-msg').html('');
						$(data).parent('div').removeClass('error');
						$(data).removeClass('border-error');
					}
				}

			}

	}

	this.setErrorMessage = function(obj) {
		var errorMessage = '';
		var wrapperDiv  = $(obj).parents('div').attr('id');
		var errorName = wrapperDiv.replace('-wrapper', '');
		if(typeof window[errorName + '_error'] !== 'undefined') {
			errorMessage = window[errorName + '_error'];
		} else {
			return;//	errorMessage = 'error did not exist';
		}
			
		if(errorMessage.indexOf('%s') != -1) {
			errorMessage = this.parseValidityText(errorName + '_error', $('#' + wrapperDiv + ' label').text());
		}
	
		if(errorMessage.indexOf('*') != -1) {
			errorMessage = errorMessage.replace('*', '');
		}
		var wrapperDiv  = $(obj).parents('div').attr('id');
		$('#' + wrapperDiv + ' .error-msg').html('');
		$('#' + wrapperDiv + ' .error-msg').html($('<p>')
					     .html(errorMessage));
	}

	this.removeErrorMessage = function(wrapperId) {
		$('#' + wrapperId + ' .error-msg').text('');
	}

		
	this.displayCheck = function(obj) {
		if(!$(obj).next().hasClass('green-check-mark')) {
			$(obj).after('<img class="green-check-mark" width="24" height="24" src="/forms/images/green-checkmark-icon.png">');
		}
	}

	this.removeCheck =  function(wrapperId) {
		$('#' + wrapperId + ' .green-check-mark').remove();
	}

	this.multibyteAlphaReplace = function(regexString) {
		return regexString.replace('[:alpha:]', 'A-Za-zÃ¡Ã©Ã*Ã³ÃºÃ¼Ã±Ã§');
	}
	
	this.parseRequiredText = function(label) {
		label = label.replace('*', '');
		return window['required_error'].replace('%s', label);
	}
	
	this.parseValidityText = function(errorVar, label) {
		return window[errorVar].replace('%s', label);
	}
}
