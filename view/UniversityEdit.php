<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 13.09.2017
 * Time: 17:06
 */
global $university;
?>
    <div style="background-color:rgba(19,116,177,0.35);">
        <div class="container">
            <ol class="breadcrumb" style="margin-top:73px;margin-bottom:0px;padding-left:0px;color:rgb(255,255,255);">
                <li><a href="index.php"><span>Home</span></a></li>
                <li class="active"><span>Edit credentials </span></li>
            </ol>
        </div>
    </div>
    <div class="container">
        <div class="page-header">
            <h2 class="text-center">Edit your <strong>University Credentials</strong>. </h2></div>
        <form action="<?php echo $GLOBALS["ROOT_URL"]; ?>/university-edit" method="post">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><span>ID </span></div>
                    <input class="form-control" type="text" name="id" readonly="" style="width:218px"
                           value="<?php echo !empty($university->getIDuniversity()) ? $university->getIDuniversity() : ''; ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><span>Organization </span></div>
                    <input class="form-control" type="text" name="organization" style="width:350px"
                           value="<?php echo !empty($university->getOrganization()) ? $university->getOrganization() : ''; ?>"
                           required>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><span>Region </span></div>
                    <div class="col-md-6">
                        <select class="region-select" name="region"  style="min-width:210px">
                            <option value="Central"
                            "<?php echo !empty($university->getRegion()) ? $university->getRegion() : ''; ?>
                            >Central</option>
                            <option value="Eastern">Eastern</option>
                            <option value="Espace Mittelland">Espace Mittelland</option>
                            <option value="Lake Geneva Region">Lake Geneva Region</option>
                            <option value="Northwestern" selected="">Northwestern</option>
                            <option value="Ticino">Ticino</option>
                            <option value="Zurich">Zurich</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><span>Institute </span></div>
                    <div class="col-md-6">
                        <select class="program-select" name="discipline"  style="min-width:200px" style="width:350px" required>
                            <option value="University of applied Science"
                                    selected="<?php echo !empty($university->getInstitute()) ? $university->getInstitute() : ''; ?>">
                                University of Applied Science
                            </option>
                            <option value="University">University</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><span>Description </span></div>
                    <input class="form-control" type="text" name="description" style="width:550px"
                           value="<?php echo !empty($university->getDescription()) ? $university->getDescription() : ''; ?>"
                           required>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><span>Email </span></div>
                    <input class="form-control" type="email" name="email" required style="width:350px"
                           value="<?php echo !empty($university->getEmail()) ? $university->getEmail() : ''; ?>">
                </div>
            </div>
            <div class="btn-group" role="group" style="padding-bottom: 50px">
                <button class="btn btn-default" type="submit"><i class="fa fa-save"></i></button>

            </div>
        </form>
    </div>
<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 11.01.2018
 * Time: 18:45
 */