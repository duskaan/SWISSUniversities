<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 13.09.2017
 * Time: 17:06
 */
global $course;
?>
<div class="container">
    <div class="page-header">
        <h2 class="text-center">A <strong>customer</strong>. </h2></div>
    <form action="update" method="post">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span>ID </span></div>
                <input class="form-control" type="text" name="id" readonly="" value="<?php echo !empty($course["id"]) ? $course["id"] : ''; ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span>Name </span></div>
                <input class="form-control" type="text" name="name" value="<?php echo !empty($course["name"]) ? $course["name"] : ''; ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span>Email </span></div>
                <input class="form-control" type="email" name="email" value="<?php echo !empty($course["email"]) ? $course["email"] : ''; ?>">
            </div>
        </div>
        <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><span>Mobile </span></div>
                    <input class="form-control" type="text" name="mobile" value="<?php echo !empty($course["mobile"]) ? $course["mobile"] : ''; ?>">
                </div>
        </div>
        <div class="btn-group" role="group">
            <button class="btn btn-default" type="submit"> <i class="fa fa-save"></i></button>
        </div>
    </form>
</div>
