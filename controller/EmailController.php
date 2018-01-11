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
        //$content = PDFController::generatePDFCustomers($course,$university);
        $id= $course->getIDcourse();
        $content = "Please pay the linked invoice as soon as possible: https://swissstudyportal.herokuapp.com/PDF?id=" .$id . " is there an ID?";

        $email = $university->getEmail();

        return EmailServiceClient::sendEmail($email, "Invoice for new Course",$content);
        //return EmailServiceClient::sendEmail($email, "Invoice for new Course", "teset");
    }
    public static function generateContent(Course $course){
        $universityDao = new UniversityDAO();
        $university= $universityDao->findByID($course->getFKUniversity());
        return $content = PDFController::generatePDFCustomers($course,$university);
    }
}