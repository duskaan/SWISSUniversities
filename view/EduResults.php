<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 06.01.2018
 * Time: 15:31
 */

?>
<div style="background-color:rgba(19,116,177,0.35);">
    <div class="container">
        <ol class="breadcrumb" style="margin-top:73px;margin-bottom:0px;padding-left:0px;color:rgb(255,255,255);">
            <li><a href="index.php"><span>Home</span></a></li>
            <li class="active"><span>Course Overview</span></li>
        </ol>
    </div>
</div>
<form class="container">
    <div class="page-header">
        <h2 class="text-center">Available <strong>courses</strong>.</h2></div>
    <h4 class="text-justify">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
        invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores
        et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum
        dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna
        aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd
        gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</h4>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Organization</th>
                <th>Startdate</th>
                <th>Discipline</th>
                <th>Degree</th>
                <th>Attendance</th>
                <th>Duration</th>
            </tr>
            </thead>
            <tbody>
            <?php
            global $filteredCourses;
            if (empty($filteredCourses)) {
                echo "<h1>There is no matching courses";
            } else {




            foreach ($filteredCourses as $filteredCourse): ?>

                <tr>
                <td><?php echo $filteredCourse["name"]; ?> </td>
                <td><?php echo $filteredCourse["organization"]; ?> </td>
                <td><?php echo $filteredCourse["startdate"]; ?> </td>
                <td><?php echo $filteredCourse["discipline"]; ?> </td>
                <td><?php echo $filteredCourse["degree"]; ?></td>
                <td><?php echo $filteredCourse["attendance"]; ?> </td>
                <td><?php echo $filteredCourse["duration"]; ?> </td>
                <td><?php echo $filteredCourse["description"]; ?> </td>

                <td> <a class="btn btn-primary" role="button" href="<?php echo $filteredCourse["link"] ?>" >details</a></td>

            </tr>

<?php endforeach; }?>
</tbody>

</table>
</div>

<div class="modal fade" role="dialog" tabindex="-1" id="confirm-modal">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                <h4 class="modal-title">Deletion of a <strong>customer</strong>.</h4></div>
            <div class="modal-body">
                <p>Do you want to delete a customer?</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" role="button" href="#">Delete </a></div>
        </div>
    </div>
</div>
</div>
</form>