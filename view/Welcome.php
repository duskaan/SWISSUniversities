<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 07.01.2018
 * Time: 12:47
 */
use dao\CourseDAO;
use service\EmailServiceClient;
use controller\EmailController;
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
        //$message = 'Hi '.$_SESSION["universityLogin"]["organization"]."\r\n". 'Thank you for registering at Swiss Universities ';
        $org = $_SESSION["universityLogin"]["organization"];
        //EmailServiceClient::sendEmail($to,$subject,$message)
        if(EmailController::sendRegistration($to,$org))
        {
        echo ("<p>A confirmation e-mail has been sent to your e-mail address.</p>");

        ?>
    </h3><br>
    <h4>Your information:</h4>
    <table class="table">
        <thead>
        <tr>
            <th>Organization </th>
            <th>Region </th>
            <th>Description </th>
            <th>Institute </th>
            <th>E-Mail </th>
            <th>ID </th>

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

        </tr>
        </tbody>
    </table><br>
    <h4 style="padding-bottom: 50px"><strong>To add, edit and delete courses, please click <a href="CourseOverview">here</a>.</strong></h4>
    <br><br><br>

    <?php }
    else {
        echo ("<p>The mail could not be sent to your account</p>");
    }?>
</div>