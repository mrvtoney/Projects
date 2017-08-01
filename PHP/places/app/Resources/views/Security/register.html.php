<?php $view->extend('base.html.php');?>

<?php $view['slots']->start('body');?>

<div class="input-group">
<form action="<?php echo $view['router']->path('register') ?>" method="post">
    <h2>Register</h2>
    <input type="text" placeholder="firstname" class="form-control" id="firstname" name="firstname" value="" required/>
    <input type="text" placeholder="lastname" class="form-control" id="lastname" name="lastname" value="" required/>
    <input type="text" placeholder="email" class="form-control" id="email" name="email" value="" required/>
    <input type="text" placeholder="Username" class="form-control" id="username" name="username" value="" required/>

    <input type="password" placeholder="Password" class="form-control" id="password" name="password" required/>
    <input type="password" placeholder="Confirm Password" class="form-control" id="confirm_password" name="confirm_password" required/>

    <button type="submit" id="login" name="login" value="" class="btn btn-default">Login</button>
</form>
</div>

<?php $view['slots']->stop();?>
