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
        $content = PDFController::generatePDFCustomers($course);

        $universityDao = new UniversityDAO();
        $email = $universityDao->findByID()->getEmail();


        $emailView = new TemplateView("customerListEmail.php");
        $emailView->customers = (new CustomerServiceImpl())->findAllCustomer();
        return EmailServiceClient::sendEmail($email, "Invoice for new Course", $content);
    }
}