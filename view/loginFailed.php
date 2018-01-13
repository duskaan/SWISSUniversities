<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 13.01.2018
 * Time: 18:24
 */
?>
<div style="background-color:rgba(19,116,177,0.35);">
    <div class="container">
        <ol class="breadcrumb" style="margin-top:73px;margin-bottom:0px;padding-left:0px;color:rgb(255,255,255);">
            <li><a href="index.php"><span>Home</span></a></li>
            <li class="active"><span>Login </span></li>
        </ol>
    </div>
</div>

<div class="login-dark">
    <form method="get" form action="<?php echo $GLOBALS["ROOT_URL"]; ?>/Login">
        <h2 class="sr-only">Login Form</h2>

        <div class="form-group">
            <div class="input-group">
                <input class="form-control" type="text" name="failed" readonly=""
                       value="<?php echo ($_GET["failed"]=="mail") ? "Invalid Email" : "Invalid Password" ?>">
        </div>
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">Try again</button>

        </div>
        <a href="ForgotPasswordGet" class="forgot">Forgot your password?</a></form>
</div>

