<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 13.09.2017
 * Time: 17:06
 */
global $university;
?>
    <div class="container">
        <div class="page-header">
            <h2 class="text-center">A <strong>course</strong>. </h2></div>
        <form action="update" method="post">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><span>ID </span></div>
                    <input class="form-control" type="text" name="id" readonly=""
                           value="<?php echo !empty($university->getIDuniversity()) ? $university->getIDuniversity() : ''; ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><span>Organization </span></div>
                    <input class="form-control" type="text" name="organization"
                           value="<?php echo !empty($university->getOrganization()) ? $university->getOrganization() : ''; ?>"
                           required>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><span>Region </span></div>
                    <div class="col-md-6">
                        <select class="region-select" name="region">
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
                        <select class="program-select" name="discipline" required>
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
                    <input class="form-control" type="text" name="description"
                           value="<?php echo !empty($university->getDescription()) ? $university->getDescription() : ''; ?>"
                           required>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><span>Email </span></div>
                    <input class="form-control" type="email" name="email" required
                           value="<?php echo !empty($university->getEmail()) ? $university->getEmail() : ''; ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><span>Password </span></div>
                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><span>Repeat Password </span></div>

                    <input class="form-control" type="password" name="password-repeat" placeholder="Password (repeat)"
                           required>
                </div>
            </div>

    <div class="btn-group" role="group">
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