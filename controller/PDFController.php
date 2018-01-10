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
use service\CustomerServiceImpl;
use view\TemplateView;
use service\PDFServiceClient;

class PDFController
{
    /**
     * @param $course
     */
    public static function generatePDFCustomers($course){
        $pdfView = new TemplateView("customerListPDF.php");
        $pdfView->course = $course;
        $result = PDFServiceClient::sendPDF($pdfView->render());
        //header("Content-Type: application/pdf", NULL, 200);
        //echo $result;
        return $result;
    }
}