<div class="register-photo" style="background-image:url(&quot;assets/img/star-sky.jpg&quot;);height:1000px;">
    <div style="background-color:rgba(19,116,177,0.35);">
        <div class="container">
            <ol class="breadcrumb" style="margin-top:73px;margin-bottom:0px;padding-left:0px;color:rgb(255,255,255);">
                <li><a href="index.php"><span>Home</span></a></li>
                <li class="active"><span>Disclaimer </span></li>
            </ol>
        </div>
    </div>
    <form action="<?php echo $GLOBALS["ROOT_URL"]; ?>/register" method="post">
        <div class="form-container register-dark">
            <div class="image-holder"></div>
            <form method="post" style="background-color:rgb(30,40,51);">
                <h2 class="text-center" style="color:rgb(255,255,255);"><strong>Create</strong> an account.</h2>
                <div class="form-group">
                    <input class="form-control" type="text" name="organization" placeholder="Organization" required>
                </div>
                <div class="col-md-6" >
                    <select class="program-select" name="region">
                        <option value="12" selected="">Jura</option>
                        <option value="13">Geneva</option>
                        <option value="14">Valais</option>
                        <option value="">Ticino</option>
                        <option value="">Graubunden</option>
                        <option value="">Berne</option>
                        <option value="">Central Switzerland</option>
                    </select>
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="description" placeholder="description" required>
                </div>
                <div class="col-md-6" >
                    <select class="program-select" name="institute">
                        <option value="12" selected="">university of applied science</option>
                        <option value="13">university</option>

                    </select>
                </div>
                <div class="form-group">
                    <input class="form-control" type="email" name="email" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="password-repeat" placeholder="Password (repeat)"
                           required>
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label class="control-label">
                            <input type="checkbox" required>I agree to the license terms.</label>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit" style="background-color:rgb(33,74,128);">
                        Sign Up
                    </button>
                </div>
                <a href="#" class="already">You already have an account? Login here.</a></form>
        </div>
    </form>
</div>
