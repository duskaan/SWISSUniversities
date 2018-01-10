<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 09.01.2018
 * Time: 07:53
 *
 */
?>
<div style="background-color:rgba(19,116,177,0.35);">
    <div class="container">
        <ol class="breadcrumb" style="margin-top:73px;margin-bottom:0px;padding-left:0px;color:rgb(255,255,255);">
            <li><a href="index"><span>Home</span></a></li>
            <li class="active"><span>Login </span></li>
        </ol>
    </div>
</div>
<div class="form-container register-dark" style="height:1000px">
    <div class="image-holder"></div>
    <form action="<?php echo $GLOBALS["ROOT_URL"]; ?>/ForgotPasswordGet" method="post" style="background-color:rgb(30,40,51);">
        <h2 class="text-center" style="color:rgb(255,255,255);"><strong>Create</strong> new Password.</h2>
            <div class="form-group">
                <input class="form-control" type="email" name="email" placeholder="Email" required>
            </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit" style="background-color:rgb(33,74,128);">
                Forgot Password
            </button>
        </div>
    </form>
</div>