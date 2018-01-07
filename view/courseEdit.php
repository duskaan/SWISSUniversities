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
        <h2 class="text-center">A <strong>course</strong>. </h2></div>
    <form action="update" method="post">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span>ID </span></div>
                <input class="form-control" type="text" name="id" readonly="" value="<?php echo !empty($course["ID_course"]) ? $course["ID_course"] : ''; ?>">
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span>Name </span></div>
                <input class="form-control" type="text" name="name" value="<?php echo !empty($course["name"]) ? $course["name"] : ''; ?>" required>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span>Start Date</span></div>
                <input class="form-control" type="date" name="startDate"  value="<?php echo !empty($course["startdate"]) ? $course["startdate"] : ''; ?>"required>
            </div>
        </div>
        <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon"><span>Discipline </span></div>
                    <div class="col-md-6" >
                        <select class="program-select" name="discipline"required >
                            <option value="Engineering" selected="<?php echo !empty($course["discipline"]) ? $course["discipline"] : ''; ?>">Engineering</option>
                            <option value="Business">Business</option>
                            <option value="Social">Social</option>
                            <option value="">Ticino</option>
                            <option value="">Graubunden</option>
                            <option value="">Berne</option>
                            <option value="">Central Switzerland</option>
                        </select>
                    </div>
                </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span>Description </span></div>
                <input class="form-control" type="text" name="description" value="<?php echo !empty($course["description"]) ? $course["description"] : ''; ?>"required>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span>Degree </span></div>
                <div class="col-md-6" >
                    <select class="program-select" name="degree" required>
                        <option value="MSc" selected="<?php echo !empty($course["degree"]) ? $course["degree"] : ''; ?>"> MSc </option>
                        <option value="CAS">CAS</option>
                        <option value="MAS">MAS</option>
                        <option value="DAS">DAS</option>
                        <option value="">Berne</option>
                        <option value="">Central Switzerland</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span>Attendance </span></div>
                <div class="col-md-6" >
                    <select class="program-select" name="attendance" required >
                        <option value="Full-time" selected="<?php echo !empty($course["attendance"]) ? $course["attendance"] : ''; ?>">Full-time</option>
                        <option value="Part-time">Part-time</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon"><span>Duration</span></div>
                <input class="form-control" type="number" name="duration" required value="<?php echo !empty($course["duration"]) ? $course["duration"] : ''; ?>">
            </div>
        </div>
        <div class="btn-group" role="group">
            <button class="btn btn-default" type="submit"> <i class="fa fa-save"></i></button>
        </div>
    </form>
</div>
