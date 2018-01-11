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
use service\AuthServiceImpl;
use service\CustomerServiceImpl;

use service\EmailServiceClient;

class EmailController
{
    public static function sendInvoice(Course $course){
        $universityDao = new UniversityDAO();
        $university= $universityDao->findByID($course->getFKUniversity());
        $content = PDFController::generatePDFCustomers($course,$university);

        $email = $university->getEmail();

        return EmailServiceClient::sendInvoiceMail($email, "Invoice for new Course","Please pay the attached invoice as soon as possible", $content);
        //return EmailServiceClient::sendEmail($email, "Invoice for new Course", "teset");
    }
}