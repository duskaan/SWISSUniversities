<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 11.01.2018
 * Time: 09:32
 */ ?>
<div style="background-color:rgba(19,116,177,0.35);">
        <div class="container">
            <ol class="breadcrumb" style="margin-top:73px;margin-bottom:0px;padding-left:0px;color:rgb(255,255,255);">
                <li><a href="index.php"><span>Home</span></a></li>
                <li class="active"><span>Educational Programs</span></li>
            </ol>
        </div>
    </div>
    <div id="promo1" style="background-image:url(&quot;assets/img/Untitled-design-11.png&quot;);margin-top:0px;">
        <p style="color:rgb(255,255,255);font-size:22px;padding-top:100px;font-weight:normal;">Decide about your Educational Future!</p>
    </div>
    <div class="container site-section" id="welcome">
        <form action="<?php echo $GLOBALS["ROOT_URL"]; ?>/EduResults" method="post" >
        <h1>Choose your what? where? and how? preferences!</h1>
        <p style="padding-bottom:80px;">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no
            sea takimata sanctus est Lorem ipsum dolor sit amet. </p>
        <h2>No Course matches to the selected filters. </h2>

            <div style="padding-bottom:50px;">
            <div class="row row-align" style="height:58px;">
                <div class="col-md-6">
                    <p class="select-paragraph">Institute </p>
                </div>
                <div class="col-md-6" style="margin-right:280px;">
                    <select class="program-select" style="font-size:20px;" name="institute" required>
                        <option value="University of Applied Science" selected="">University of Applied Science</option>
                        <option value="University">University</option>
                    </select>
                </div>
            </div>
            <div class="row row-align" style="height:58px;">
                <div class="col-md-6">
                    <p class="select-paragraph">Degree </p>
                </div>
                <div class="col-md-6" style="margin-right:280px;">
                    <select class="program-select" style="font-size:20px;" name="degree" required>
                        <option value="MAS" selected="">MAS</option>
                        <option value="MSc">MSc</option>
                        <option value="DAS">DAS</option>
                        <option value="CAS">CAS</option>
                    </select>
                </div>
            </div>
            <div class="row row-align" style="height:58px;">
                <div class="col-md-6">
                    <p class="select-paragraph">Discipline </p>
                </div>
                <div class="col-md-6" style="margin-right:280px;">
                    <select class="program-select" style="font-size:20px;" name="discipline" required>
                            <option value="Engineering" selected="">Engineering</option>
                            <option value="Business">Business</option>
                            <option value="Social">Social</option>
                    </select>
                </div>
            </div>
            <div class="row row-align" style="height:58px;">
                <div class="col-md-6">
                    <p class="select-paragraph">Attendance </p>
                </div>
                <div class="col-md-6" style="margin-right:280px;" >
                    <select class="program-select" style="font-size:20px;" name="attendance" required>
                        <option value="Full-time" selected="">Full-time</option>
                        <option value="Part-time">Part-time</option>
                    </select>
                </div>
            </div>
            <div class="row row-align" style="height:58px;">
                <div class="col-md-6">
                    <p class="select-paragraph">Region </p>
                </div>
                <div class="col-md-6" style="margin-right:280px;">
                    <select class="program-select" style="font-size:20px;" name="region" required>
                        <option value="Northwestern" selected="">Northwestern</option>
                        <option value="Eastern">Eastern</option>
                        <option value="Espace Mittelland">Espace Mittelland</option>
                        <option value="Lake Geneva Region">Lake Geneva Region</option>
                        <option value="Ticino">Ticino</option>
                        <option value="Zurich">Zurich</option>
                    </select>
                </div>
            </div>
            <div class="row row-align" style="height:58px;">
                <div class="col-md-6">
                    <p class="select-paragraph"> </p>
                </div>
                <div class="col-md-6" style="margin-right:280px;">
                    <button class="btn btn-default btn-search" type="submit">Search <i class="glyphicon glyphicon-search"></i></button>
                </div>
            </div>
        </div>
        </form>
    </div>
