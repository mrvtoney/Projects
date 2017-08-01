<?php $view->extend('base.html.php');?>

<?php $view['slots']->start('body');?>
<?php if ($error): ?>
    <div><?php print_r($error->getMessage()); ?></div>
<?php endif ?>

<div class="input-group">
<form action="<?php echo $view['router']->path('login') ?>" method="post">
    <h2>Login</h2>
    <input type="text" placeholder="Username" class="form-control" id="username" name="_username" value="<?php echo $last_username ?>" />

    <input type="password" placeholder="Password" class="form-control" id="password" name="_password" />

    <button type="submit" id="login" name="login" value="" class="btn btn-default">Login</button>
</form>
</div>

<?php $view['slots']->stop();?>
