<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 07.01.2018
 * Time: 12:47
 */
use dao\CourseDAO;
use service\EmailServiceClient;
?>
<div style="background-color:rgba(19,116,177,0.35);">
        <div class="container">
            <ol class="breadcrumb" style="margin-top:73px;margin-bottom:0px;padding-left:0px;color:rgb(255,255,255);">
                <li><a href="index.php"><span>Home</span></a></li>
                <li class="active"><span>Registration </span></li>
            </ol>
        </div>
    </div>
<div class="container">
    <div class="page-header">
        <h2 class="text-center"><strong>Welcome <?php echo $_SESSION["universityLogin"]["organization"]; ?>.</strong></h2>
    </div>
    <h3 class="text-center"><?php
        $to = $_SESSION["universityLogin"]["email"];
        $subject = 'Registering for Swiss Universities';
        $message = 'Hi Thank you for registering at Swiss Universities ';
        $headers = 'From: tim.vandijke@gmx.ch' . "\r\n" .
            'Reply-To: tim.vandijke@gmx.ch\'' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

        /*if(EmailServiceClient::sendEmail("tim.vandijke@gmx.ch","test","another test as a body"))
        {
            echo ("<p>A confirmation e-mail has been sent to your e-mail address.</p>");
        }
        else {
            echo ("<p>The mail could not be sent to your account</p>");
        }
           */?>
            </h3><br>
    <h4>Your information:</h4>
    <table class="table">
        <thead>
        <tr>
            <th>Organization </th>
            <th>Region </th>
            <th>Decription </th>
            <th>Institute </th>
            <th>E-Mail </th>
            <th>ID </th>
            <th>Startdate </th>

        </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $_SESSION["universityLogin"]["organization"]; ?> </td>
                <td><?php echo $_SESSION["universityLogin"]["region"]; ?> </td>
                <td><?php echo $_SESSION["universityLogin"]["description"]; ?> </td>
                <td><?php echo $_SESSION["universityLogin"]["institute"]; ?> </td>
                <td><?php echo $_SESSION["universityLogin"]["email"]; ?> </td>
                <td><?php echo $_SESSION["universityLogin"]["id"];?></td>
                <td><?php //echo $_SESSION["universityLogin"]["startDate"];?></td>

            </tr>
        </tbody>
    </table><br>
    <h4><strong>To add, edit and delete courses, please click <a href="CourseOverview">here</a>.</strong></h4>
    <br><br><br>
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