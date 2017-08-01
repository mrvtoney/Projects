<!-- app/Resources/views/base.html.php -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport"/>
	<meta content="" name="description"/>
	<meta content="" name="author"/>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/react/0.14.3/react.js"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/react/0.14.3/react-dom.js"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.8.23/browser.min.js"></script>
	<script src="https://use.fontawesome.com/b575ff31cd.js"></script>

	<script src="jquery-3.2.1.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<link href="<?php echo $view['assets']->getUrl('assets/global/css/components.css');?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo $view['assets']->getUrl('assets/global/css/plugins.css');?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo $view['assets']->getUrl('assets/layouts/layout/css/layout.css'); ?>" rel="stylesheet" type="text/css"/>
	<link href="<?php echo $view['assets']->getUrl('assets/layouts/layout/css/themes/default.css');?>" rel="stylesheet" type="text/css" id="style_color"/>
	<link href="<?php echo $view['assets']->getUrl('assets/layouts/layout/css/custom.css');?>" rel="stylesheet" type="text/css"/>
        <title><?php $view['slots']->output('title', 'Dashboard') ?></title>
    </head>
    <body style="background-color: white !important;">

        <div id="content" style="margin: 0 auto; margin-top: 20px; padding:50px 50px; width: 800px">
            <?php $view['slots']->output('body') ?>
        
        </div>
	    <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
    </body>
</html>
