<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 09.01.2018
 * Time: 07:40
 */

/**
 * Created by PhpStorm.
 * User: Tim van Dijke
 */
global $university;
?>
<div class="container">
    <div class="page-header">
        <h2 class="text-center">A <strong>course</strong>. </h2></div>
    <form action="ForgotPasswordSet" method="post">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span>ID </span></div>
                <input class="form-control" type="text" name="id" readonly=""
                       value="<?php echo !empty($university["ID_university"]) ? $university["ID_university"] : ''; ?>">
            </div>
        </div><div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span>Organization </span></div>
                <input class="form-control" type="text" name="organization" readonly=""
                       value="<?php echo !empty($university["organization"]) ? $university["organization"] : ''; ?>">
            </div>
        </div>
        <div class="form-group">
            <input class="form-control" type="password" name="password" placeholder="new Password" required>
        </div>
        <div class="form-group">
            <input class="form-control" type="password" name="password-repeat" placeholder="new Password (repeat)"
                   required>
        </div>
        <div class="btn-group" role="group">
            <button class="btn btn-default" type="submit"><i class="fa fa-save"></i></button>

        </div>
    </form>
</div>
