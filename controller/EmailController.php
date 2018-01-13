<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 01.11.2017
 * Time: 13:51
 */

namespace controller;

use dao\CourseDAO;
use dao\UniversityDAO;
use domain\Course;
use domain\University;
use service\AuthServiceImpl;
use service\CustomerServiceImpl;
use view\TemplateView;
use service\EmailServiceClient;

class EmailController
{


    public static function sendInvoice(Course $course){
        $universityDao = new UniversityDAO();
        $university= $universityDao->findByID($course->getFKUniversity());
        //$content = PDFController::generatePDFCustomers($course,$university);
        $invoiceView = new TemplateView("InvoiceEmail.php");
        $invoiceView->id= $course->getIDcourse();
        $invoiceView->university = $university;
        $invoiceView->name = $course->getName();
        //$content = "Please pay the linked invoice as soon as possible: https://swissstudyportal.herokuapp.com/PDF?id=" .$id . " is there an ID?";
        $email = $university->getEmail();
        return EmailServiceClient::sendEmail($email, "Invoice for new Course",$invoiceView->render());

        /*

        $universityDao = new UniversityDAO();
        $university= $universityDao->findByID($course->getFKUniversity());

        $invoiceView = new TemplateView("InvoiceEmail.php");
        $invoiceView->university = $university;
        $invoiceView->course = $course;
        $email = $university->getEmail();
        return EmailServiceClient::sendEmail($email, "Invoice for new Course",$invoiceView->render());*/
        //return EmailServiceClient::sendEmail($email, "Invoice for new Course", "teset");
    }
    public static function sendRegistration($to, $org){
        $registrationView = new TemplateView("registrationEmail.php");
        $registrationView->organization=$org;
        return EmailServiceClient::sendEmail($to, "Registration for Swiss Study Portal", $registrationView->render());
    }
    public static function sendForgotPassword($to){
        $universityDAO = new UniversityDAO();
        $university = $universityDAO->findByEmail($to);
        $subject = "ForgotPassword";
        $forgotPasswordView= new TemplateView("forgotPasswordEmail.php");
        $forgotPasswordView->university=$university;
        return EmailServiceClient::sendEmail($to, $subject, $forgotPasswordView->render());

        if(EmailServiceClient::sendEmail($to, $subject, $content)){
            Router::redirect("/index");
        }else{
            Router::redirect("/ForgotPasswordGet");
        }
    }

}