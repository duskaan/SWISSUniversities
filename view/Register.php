
    <div style="background-color:rgba(19,116,177,0.35);">
        <div class="container">
            <ol class="breadcrumb" style="margin-top:73px;margin-bottom:0px;padding-left:0px;color:rgb(255,255,255);">
                <li><a href="index.php"><span>Home</span></a></li>
                <li class="active"><span>Register </span></li>
            </ol>
        </div>
    </div>
    <div class="form-container register-dark" style="height:1000px">
            <div class="image-holder"></div>
            <form action="<?php echo $GLOBALS["ROOT_URL"]; ?>/register" method="post" style="background-color:rgb(30,40,51);">
                <h2 class="text-center" style="color:rgb(255,255,255);"><strong>Create</strong> an account.</h2>
                <div class="form-group">
                    <input class="form-control" type="text" name="organization" placeholder="Organization" required>
                </div>
                <div class="col-md-6" >
                    <select class="region-select" name="region">
                        <option value="Central">Central</option>
                        <option value="Eastern">Eastern</option>
                        <option value="Espace Mittelland">Espace Mittelland</option>
                        <option value="Lake Geneva Region">Lake Geneva Region</option>
                        <option value="Northwestern" selected="">Northwestern</option>
                        <option value="Ticino">Ticino</option>
                        <option value="Zurich">Zurich</option>
                    </select>
                </div>
                <div class="form-group">
                    <input class="form-control" type="text" name="description" placeholder="description" required>
                </div>
                <div class="col-md-6" >
                    <select class="region-select" name="institute">
                        <option value="University of Applied Science" selected="">University of Applied Science</option>
                        <option value="University">University</option>

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
                <a href="Login" class="already">You already have an account? Login here.</a>

			</form>
        </div>
