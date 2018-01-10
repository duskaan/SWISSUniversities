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
<div class="container">
    <div class="page-header">
        <h2 class="text-center">My <strong>courses</strong>.</h2></div>
        <h4 class="text-justify">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</h4>
    <div class="table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th>Course ID </th>
                <th>Name </th>
                <th>Startdate </th>
                <th>Discipline </th>
                <th>Degree </th>
                <th>Attendance </th>
                <th>Duration </th>
                <th>Language </th>
                <th>Link </th>
            </tr>
            </thead>
            <tbody>
            <?php
            global $courses;

            foreach($courses as $course): ?>
                <tr>
                    <td><?php echo $course["ID_course"]; ?> </td>
                    <td><?php echo $course["name"]; ?> </td>
                    <td><?php echo $course["startdate"]; ?> </td>
                    <td><?php echo $course["discipline"]; ?> </td>
                    <td><?php echo $course["degree"];?></td>
                    <td><?php echo $course["attendance"]; ?> </td>
                    <td><?php echo $course["duration"]; ?> </td>
                    <td><?php echo $course["language"]; ?> </td>
                    <td><?php echo $course["link"]; ?> </td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group">
                            <a class="btn btn-default" role="button" href="course-edit?id=<?php echo $course["ID_course"]; ?>"> <i class="fa fa-edit"></i></a>
                            <button class="btn btn-default" type="button" data-target="#confirm-modal" data-toggle="modal" data-href="course-delete?id=<?php echo $course["ID_course"]; ?>"> <i class="glyphicon glyphicon-trash"></i></button>
                        </div>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
    <div class="btn-group" role="group">
        <a class="btn btn-default" role="button" href="course-create"> <i class="fa fa-plus-square-o"></i></a>
        <button class="btn btn-default" type="button"> <i class="fa fa-file-pdf-o"></i></button>
        <button class="btn btn-default" type="button"> <i class="fa fa-envelope-o"></i></button>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="confirm-modal">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Deletion of a <strong>customer</strong>.</h4></div>
                <div class="modal-body">
                    <p>Do you want to delete a customer?</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" type="button" data-dismiss="modal">Cancel </button><a class="btn btn-primary" role="button" href="course-delete?id=<?php echo $course["ID_course"]; ?>">Delete </a></div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
