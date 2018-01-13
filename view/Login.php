<div style="background-color:rgba(19,116,177,0.35);">
    <div class="container">
        <ol class="breadcrumb" style="margin-top:73px;margin-bottom:0px;padding-left:0px;color:rgb(255,255,255);">
            <li><a href="index.php"><span>Home</span></a></li>
            <li class="active"><span>Login </span></li>
        </ol>
    </div>
</div>

<div class="login-dark">
    <form method="post" form action="<?php echo $GLOBALS["ROOT_URL"]; ?>/login">
        <h2 class="sr-only">Login Form</h2>
        <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>

        <div class="form-group">
            <input class="form-control" type="email" name="email" placeholder="Email">
        </div>
        <div class="form-group">
            <input class="form-control" type="password" name="password" placeholder="Password">
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">Log In</button>

        </div>
        <a href="ForgotPasswordGet" class="forgot">Forgot your password?</a></form>
</div>
