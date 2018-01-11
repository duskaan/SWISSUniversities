<?php
/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 01.11.2017
 * Time: 13:52
 */

namespace service;

use config\Config;


class EmailServiceClient
{

    public static function sendEmail($toEmail, $subject, $htmlData){

        $jsonObj = self::createEmailJSONObj();
        $jsonObj->personalizations[0]->to[0]->email = $toEmail;
        //$jsonObj->personalizations[0]->to[0]->email = 'test@example.com';
        $jsonObj->subject = $subject;
        //$jsonObj->subject = "Sending with SendGrid is Fun";

        $jsonObj->content[0]->value = $htmlData;
        //$jsonObj->content[0]->value = "and easy to do anywhere, even with PHP";

        $options = ["http" => [
            "method" => "POST",
            "header" => ["Content-Type: application/json",
                "Authorization: Bearer ".Config::emailConfig("apikey").""],
            "content" => json_encode($jsonObj)
        ]];
        $context = stream_context_create($options);
        $response = file_get_contents("https://api.sendgrid.com/v3/mail/send", false, $context);
        if(strpos($http_response_header[0],"202"))
            return true;
        return false;
    }

    protected static function createEmailJSONObj(){
        return json_decode('{
          "personalizations": [
            {
              "to": [
                {
                  "email": "email"
                }
              ]
            }
          ],
          "from": {
            "email": "tim.vandijke@gmx.ch",
            "name": "Swiss University Portal"
          },
          "subject": "subject",
          "content": [
            {
              "type": "text/html",
              "value": "value"
            }
          ]
        }');
    }
    protected static function createEmailAttachmentJSONObj(){
        return json_decode('{
          "personalizations": [
            {
              "to": [
                {
                  "email": "email"
                }
              ]
            }
          ],
          "from": {
            "email": "tim.vandijke@gmx.ch",
            "name": "Swiss University Portal"
          },
          "subject": "subject",
          "content": [
            {
              "type": "text/html",
              "value": "value"
            }
          ],
          "attachment": 
             {  
               "content": "content",
               "name": "Invoice For Course",
               "type": "application/pdf",
               "filename": "InvoiceForCourse.pdf",
               "disposition": "attachment"
             }
           
        }');
    }
public static function sendInvoiceMail($toEmail, $subject, $htmlData, $file){
    $file_encoded = base64_encode($file);
    $jsonObj = self::createEmailAttachmentJSONObj();

    //$jsonObj->personalizations[0]->to[0]->email = $toEmail;
    $jsonObj->personalizations[0]->to[0]->email = 'tim.vandijke@gmx.ch';
    $jsonObj->subject = $subject;
    //$jsonObj->subject = "Sending with SendGrid is Fun";

    $jsonObj->content[0]->value = $htmlData;
    $jsonObj->attachment->content = $file_encoded;
    //$jsonObj->attachment[0]->content = "TG9yZW0gaXBzdW0gZG9sb3Igc2l0IGFtZXQsIGNvbnNlY3RldHVyIGFkaXBpc2NpbmcgZWxpdC4gQ3JhcyBwdW12";
    //$jsonObj->content[0]->value = "and easy to do anywhere, even with PHP";

    $options = ["http" => [
        "method" => "POST",
        "header" => ["Content-Type: application/json",
            "Authorization: Bearer ".Config::emailConfig("apikey").""],
        "content" => json_encode($jsonObj)
    ]];
    $context = stream_context_create($options);
    echo $response = file_get_contents("https://api.sendgrid.com/v3/mail/send", false, $context);
    if(strpos($http_response_header[0],"202"))
        return true;
    return false;
}

}