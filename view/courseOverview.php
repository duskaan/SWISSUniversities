<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 06.01.2018
 * Time: 15:31
 */
use dao\CourseDAO;
?>
<div class="container">
    <div class="page-header">
        <h2 class="text-center">My <strong>customers</strong>.</h2></div>
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
            </tr>
            </thead>
            <tbody>
            <?php
            global $courses;
            //$courses = findByUniversity(1);
            foreach($courses as $course): ?>
                <tr>
                    <td><?php echo $course["ID_course"]; ?> </td>
                    <td><?php echo $course["name"]; ?> </td>
                    <td><?php echo $course["startdate"]; ?> </td>
                    <td><?php echo $course["discipline"]; ?> </td>
                    <td><?php echo $course["degree"];?></td>
                    <td><?php echo $course["attendance"]; ?> </td>
                    <td><?php echo $course["duration"]; ?> </td>
                    <td>
                        <div class="btn-group btn-group-sm" role="group">
                            <a class="btn btn-default" role="button" href="customer/edit?id=<?php echo $course["ID_course"]; ?>"> <i class="fa fa-edit"></i></a>
                            <button class="btn btn-default" type="button" data-target="#confirm-modal" data-toggle="modal" data-href="customer/delete?id=<?php echo $course["ID_course"]; ?>"> <i class="glyphicon glyphicon-trash"></i></button>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="btn-group" role="group">
        <a class="btn btn-default" role="button" href="customer/create"> <i class="fa fa-plus-square-o"></i></a>
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
                    <button class="btn btn-default" type="button" data-dismiss="modal">Cancel </button><a class="btn btn-primary" role="button" href="#">Delete </a></div>
            </div>
        </div>
    </div>
</div>