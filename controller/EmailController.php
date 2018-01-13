<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 01.11.2017
 * Time: 13:51
 */

namespace controller;

use dao\UniversityDAO;
use domain\Course;
use service\AuthServiceImpl;
use service\CustomerServiceImpl;
use view\TemplateView;
use service\EmailServiceClient;

class EmailController
{


    public static function sendInvoice(Course $course){
        $universityDao = new UniversityDAO();
        $university= $universityDao->findByID($course->getFKUniversity());
        $invoiceView = new TemplateView("InvoiceEmail.php");
        $invoiceView->id= $course->getIDcourse();
        $invoiceView->university = $university;
        $invoiceView->name = $course->getName();
        $email = $university->getEmail();
        return EmailServiceClient::sendEmail($email, "Invoice for new Course",$invoiceView->render());

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
    public static function sendContact($name, $to, $message){
        $contactView = new TemplateView("contactEmail.php");
        $contactView->name= $name;
        $contactView->message= $message;
        EmailServiceClient::sendEmail($to,"contact form Swiss Study Portal",$contactView->render());
        EmailServiceClient::sendEmail("tim.vandijke@gmx.ch","contact form Swiss Study Portal",$contactView->render());
    }

}