<?php $view->extend('base.html.php');?>

<?php $view['slots']->start('body');?>
<style>

	.inner-div-border {
		border: 1px solid black;
		padding: 25px 25px;
		border-radius: 25px;
		max-width: 450px;
		min-width: 200px;
		width: 100%;
		margin-top: 88px !important;
		margin-left: 0px;
		height: 150px;
	}

	.div-border {
		border: 1px solid black;
		padding: 25px 25px;
		border-radius: 25px;
		max-width: 450px;
		min-width: 200px;
		width: 100%;
		margin: 30px;
		min-height: 300px;
	}

	.row {
		width:50%;
	}

	.row h1 {
		margin: 0 85%;
		width: 250px;
	}

	.div-border input {
		margin-bottom: 10px !important;
	}

	.div-border button {
		width:100% !important;
	}

	.float-left {
		float: left;
	}

	.float-right {
		float: right;
	}

	.text-overlay {
		margin-top:-34px;
		margin-left: -10px;
		background: white;
		width: 110px;
	}

	.div-border h2 {
		margin-top: 0px;
	}

	.remove-list {
		float:right;
	}

	#list-places li {
		list-style: none;
	}

	#pick-placeholder h2,
	.not-selected{
		font-weight: bold;
	}

	#pick_place {
		height: 60px;
	}

	#success, 
	#failed, 
	#exists,
	#selected-msg {
		display: none;
		height: 30px;
		margin-top: 87px;
		margin-bottom: 9px;
		position:relative;
		padding: 5px;
	}
	#your-places {
		overflow-x: auto;
		height:400px;
	}
</style>

<script type="text/javascript">
//Specifically for dynamically created table tr elements
jQuery(document).on('click', '.remove-list',function() {
	var dataObj = {};
	var name = dataObj['name'] = jQuery(this).attr('data-name');
	var address = dataObj['address'] = jQuery(this).attr('data-address');
	var elem = this;
	jQuery.ajax({
		url: 'http://<?php echo $_SERVER['HTTP_HOST']; ?>/app_dev.php/remove_place',
		type: 'POST',
		data: dataObj,
		success: function(data) {
			var code = jQuery.parseJSON(data);
			var tr = jQuery(elem).closest('tr').remove();
		}	
	});
	
});

//For all else when page loads
jQuery(document).ready(function() {
	jQuery('#add_place').click(function(e) {
		//Prevent the submit button from running
		e.preventDefault();

		//Prepare data
		var dataObj = {};
		var name = dataObj['name'] = jQuery('#name').val();
		var address = dataObj['address'] = jQuery('#address').val();
		jQuery.ajax({
			url: 'http://<?php echo $_SERVER['HTTP_HOST']; ?>/add_place',
			type: 'POST',
			data: dataObj,
			success: function(data) {
				var data = jQuery.parseJSON(data);
				var code = data['code'];

				//Handle when the place is new
				if (code == 200) {
					jQuery('#list-places').prepend('<tr class="not-selected"><td><span>' + name + '</span><span class="remove-list" data-name="' + name + '" data-address="' + address + '">X</span></td></tr>');
					jQuery('#name').val('');
					jQuery('#address').val('');
					jQuery('#success').show();
					jQuery('#success').fadeOut(3000);
				}
			
				//Handle when the place already exists
				if (code == 300) {
					jQuery('#exists').show();
					jQuery('#exists').css('display', 'block');
				}

				//Handle when there is an internal error
				if (code == 500) {
					jQuery('#failed').show();
				}
			}	
		});
	});

	jQuery('#pick_place').click(function() {
		//Find random tr that has not been selected
		var random =  jQuery('.table .not-selected').eq(Math.floor(Math.random() * jQuery('.not-selected').length));

		//Show error if no more trs are available
		if (jQuery('.not-selected').length == 0 ) {
			jQuery('#selected-msg').show();
		} else {

			//Grab the data for the name and address
			jQuery('#place-name').html(jQuery(random).find('.remove-list')
								 .attr('data-name')
			);
			
			jQuery('#place-address').html(jQuery(random).find('.remove-list')
								    .attr('data-address')
			);
			
			//Remove class so that it will not get counted next time the Pick a place button is clicked
			jQuery(random).removeClass('not-selected');

			//Mute the selected places so that the user knows what has been selected
			jQuery(random).addClass('text-muted');
		}
	});


	jQuery('#name, #address').focus(function() {
	        //Clear error messages on focus
		jQuery('.info-box').css('display', 'none');	
	});
});
</script>


<div class="row">
	<h1>WP Indecision</h1>
</div>
<div class="row float-left">
	<div class="input-group  div-border">
		<input type="text" class="form-control" id="name" name="name" placeholder="Name" value="" required/>
		<input type="text" class="form-control" id="address" name="address" placeholder="Address" value="" required/>
		<div id="success" class="alert-success info-box">
			<span>Success</span>
		</div>
		<div id="exists" class="alert-info info-box">
			<span>Place already exists!</span>
		</div>
		<div id="failed" class="alert-danger info-box">
			<span>Failed to add place. Please try again</span>
		</div>
		<button type="submit" id="add_place" name="add_place" value="" class="btn btn-default">Add a Place</button>
	</div>

	<div class="input-group div-border">
		<button type="button" class="form-control" id="pick_place" name="pick_place" value="">Pick A Place</button>
		<div id="selected-msg" class="alert-danger info-box">
			<span>You have selected all of the available places.</span>
		</div>
		<div class="inner-div-border">
			<p class="text-overlay">You're Going To</p>
			<div id="place-placeholder">
				<h2 id="place-name"></h2>
				<h4 id="place-address"></h4>
			</div>
		</div>
	</div>
</div>
<div class="row float-right">
	<div class="input-group div-border ">
		<h2>Your Places</h2>
		<div id="your-places">
			<table class="table table-striped table-hover"  id="list-places">
				<tbody>
					<?php if(!empty($places)) : ?>
						<?php foreach ($places as $place) : ?>
						<tr class="not-selected">
							<td>
								<span><?php echo $place->getName(); ?></span>
								<span class="remove-list" data-name="<?php echo $place->getName(); ?>" data-address="<?php echo $place->getAddress(); ?>">X</span>
							</td>
						</tr>
						<?php endforeach; ?>
					<?php endif; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php $view['slots']->stop(); ?>
