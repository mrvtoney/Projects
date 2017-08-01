jQuery(document).ready(function() {
/*	jQuery("input, select").blur(function(){
		jQuery('div#address2-wrapper.input div.error-msg').remove();
		jQuery('[name="address1"]').removeAttr('style');
		jQuery('[name="address1"]').removeAttr('class');
	});
*/	
	window.alreadyValidated = false;
	jQuery('[name="state"]').change(function(ev, smarty){
	});
	
	function prepAddress(address1, address2, zip) {
		if (jQuery('[name="state"]').val()=='PR' && address2.length > 0) {
			addressAll = { street: address2,
                    street2: address1,
                    zipcode: zip };
		} else {
			addressAll = { street: address1,
                    street2: address2,
                    zipcode: zip };
		}
		return addressAll
	}
	
	validateAddress = function(event, validated){

        address1 = jQuery('[name="address1"]').val();
        address2 = jQuery('[name="address2"]').val();
        zip = jQuery('[name="zip"]').val();
        
        if(zip){ // submit address to smarty streets if a zip code is set
        	addressAll = prepAddress(address1, address2, zip);
        	LiveAddress.verify(addressAll, function(response){ // handle smarty streets reply
        		if(!window.alreadyValidated)
                    window.alreadyValidated = true;

                 correct_address = false;
                 jQuery('#address-dialog > #dialog-content').empty();

                 if(response !== 'undefined' && response.length > 0){
                    correct_address = true;
                    data = response[0].components;
                    if (data.state_abbreviation == 'PR' && typeof response[0].delivery_line_2 != 'undefined' && response[0].delivery_line_2.length>0) {
                    	whole_address = response[0].delivery_line_2 + '<br />';
                    } else if ( data.state_abbreviation == 'PR' && typeof response[0].components.urbanization != 'undefined'){
                    	whole_address = response[0].components.urbanization + '<br/>';
                    } else {
			whole_address = '';
			}
                    whole_address += response[0].delivery_line_1 + '<br />' + response[0].last_line;
                    jQuery("#address-dialog > #dialog-content").append('<p class="lead">'+ss_confirm_msg+'</p>');
                    jQuery('<div class="lead valid">'+whole_address+'</div>').click('.valid', function () {
                    	data = response[0].components;
                    	if(data.state_abbreviation == 'PR'){
                    		primary_addr = response[0].delivery_line_1;
                            secondary_addr = data.secondary_number? data.secondary_number + ' ' : '';
                            secondary_addr += data.secondary_designator? data.secondary_designator : '';
                            if (secondary_addr === ''){
                                secondary_addr = data.urbanization? data.urbanization : '';
                            }

                            if (data.state_abbreviation == 'PR') {
                            	if (typeof response[0].delivery_line_2 != 'undefined' && response[0].delivery_line_2.length>0) {
                            		 jQuery('[name="address1"]').val(response[0].delivery_line_2);
                            		 jQuery('[name="address2"]').val(primary_addr);
                            	} else if (typeof response[0].components.urbanization != 'undefined') {
                            		jQuery('[name="address1"]').val(response[0].components.urbanization);
                                    jQuery('[name="address2"]').val(primary_addr);
                            	} else {
                            		jQuery('[name="address1"]').val(secondary_addr);
                                    jQuery('[name="address2"]').val(primary_addr);
				}
                            } else {
                                jQuery('[name="address1"]').val(primary_addr);
                                    jQuery('[name="address2"]').val(secondary_addr);
                            }
                            jQuery('[name="city"]').val(data.city_name);
                            jQuery('[name="state"]').val(data.state_abbreviation);

                            zipcode = data.zipcode ;
                            zipcode += data.plus4_code? '-' + data.plus4_code : '';
                            jQuery('[name="zip"]').val(zipcode);
                    	} else {
                    		primary_addr = response[0].delivery_line_1;
                    		jQuery('[name="address1"]').val(primary_addr);
                            jQuery('[name="address2"]').val('');

                            jQuery('[name="city"]').val(data.city_name);
                            jQuery('[name="state"]').val(data.state_abbreviation);

                            zipcode = data.zipcode ;
                            zipcode += data.plus4_code? '-' + data.plus4_code : '';
                            jQuery('[name="zip"]').val(zipcode);
                    	}
                    	jQuery('[name="state"]').trigger("change", ["smarty"]);
                    	jQuery('#address-dialog').foundation('reveal', 'close');
                    }).appendTo('#address-dialog > #dialog-content');
                 } else {
               		 var whole_address = '';
                	 if (address1.length>0) whole_address += address1 + '<br />';
                	 if (address2.length>0) whole_address += address2 + '<br />';
                	 whole_address += jQuery('[name="city"]').val() + ', ' + jQuery('[name="state"]').val() + ' ' + zip;
                	
                	 jQuery("#address-dialog > #dialog-content")
                     .append('<p class="lead">'+ss_not_recognized+'</p>');

                     jQuery('<div class="lead invalid">'+whole_address+'</div>')
                       .bind('click touchstart', '.invalid', function () {
                           jQuery('#address-dialog').foundation('reveal', 'close');
                        })
                       .appendTo('#address-dialog > #dialog-content');
                 }
                 if (!correct_address && validated){
                	 return;
                 }
                 jQuery('#address-dialog').foundation('reveal', 'open');
        	});
        }
        return false;
	};
	var smartyAPIKey = (window.location.hostname=='www.univisiontarjeta.com')?'123263772':'2223973654563521082';
	LiveAddress.init(smartyAPIKey);
	
	jQuery(document).foundation().foundation('reveal', {
        closeOnBackgroundClick: false
	});
	
	jQuery('[name="zip"]').change(validateAddress);
	
	jQuery('[name="address1"],[name="address2"]').change(function(){
		if(window.alreadyValidated){
	       jQuery('[name="zip"]').triggerHandler('change',  [true]);
	       return;
	    }
	});
});
