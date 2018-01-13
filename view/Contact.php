    <div style="background-color:rgba(19,116,177,0.35);">
        <div class="container">
            <ol class="breadcrumb" style="margin-top:73px;margin-bottom:0px;padding-left:0px;color:rgb(255,255,255);">
                <li><a href="index.html"><span>Home</span></a></li>
                <li class="active"><span>Contact </span></li>
            </ol>
        </div>
    </div>
    <div class="contact-clean" style="background-image:url(&quot;assets/img/star-sky.jpg&quot;);">
        <form method="post" action="<?php echo $GLOBALS["ROOT_URL"]; ?>/Contact">
            <h2 class="text-center">Contact us</h2>
            <div class="form-group has-success has-feedback"><input class="form-control" type="text" name="name" required placeholder="Name"></div>
            <div class="form-group has-error has-feedback"><input class="form-control" type="email" name="email" required placeholder="Email">
            </div>
            <div class="form-group"><textarea class="form-control" rows="14" maxlength="255" name="message" placeholder="Message"></textarea></div>
            <div class="form-group"><button class="btn btn-primary btn-top" type="submit" id="btn-send">send meSSaGe</button></div>
        </form>
    </div>
    <div style="padding-bottom:0px;margin-right:0px;margin-left:0px;padding-right:0px;padding-left:0px;margin-top:65px;margin-bottom:85px;">
        <div class="container"><img class="img-responsive center-block" src="assets/img/map_Mod.png"></div>
    </div>
