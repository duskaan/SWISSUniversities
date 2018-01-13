<?php

/**
 * Created by PhpStorm.
 * User: andreas.martin
 * Date: 12.09.2017
 * Time: 21:30
 */
require_once("config/Autoloader.php");
require_once("view/layout.php");

use router\Router;
use http\HTTPException;
use domain\Course;
use domain\University;
use dao\CourseDAO;
use dao\UniversityDAO;
use domain\filteredCourse;
use database\Database;
use service\EmailServiceClient;
use controller\EmailController;
use service\PDFServiceClient;
use controller\PDFController;


session_start();

$authFunction = function () {
    if (isset($_SESSION["universityLogin"])) {
        return true;
    }
    router::redirect("/Login");
};

Router::route("GET", "/Login", function () {
    if (isset($_SESSION["universityLogin"])) {
        Router::redirect("/logout");
    } else {
        layoutSetContent("view/Login.php");
    }
});

Router::route("GET", "/Register", function () {
    if (isset($_SESSION["universityLogin"])) {
        Router::redirect("/logout");
    } else {
        layoutSetContent("view/Register.php");
    }
});

Router::route("POST", "/register", function () {
    /* TODO: refactor and use WECRMServiceImpl::getInstance()->editAgent($_POST["name"],$_POST["email"], $_POST["password"]); */
    //todo use university
    if ($_POST["password"] == $_POST["password-repeat"]) {
        $university = new University();
        $universityDAO = new UniversityDAO();
        if (is_null($universityDAO->findByEmail($_POST["email"]))) {
            $university->setOrganization($_POST["organization"]);
            $university->setRegion($_POST["region"]);
            $university->setInstitute($_POST["institute"]);
            $university->setDescription($_POST["description"]);
            $university->setEmail($_POST["email"]);
            $university->setPassword(password_hash($_POST["password"], PASSWORD_DEFAULT));

            $universityDAO->create($university);
            $_SESSION["universityLogin"]["organization"] = $university->getOrganization();
            $_SESSION["universityLogin"]["email"] = $university->getEmail();
            $_SESSION["universityLogin"]["id"] = session_id();
            //$_SESSION["universityLogin"]["id"] = $universityDAO->findByEmail($_POST["email"])->getIDuniversity();
            $_SESSION["universityLogin"]["region"] = $university->getRegion();
            $_SESSION["universityLogin"]["description"] = $university->getDescription();
            $_SESSION["universityLogin"]["institute"] = $university->getInstitute();
            Router::redirect("/Welcome");
        } else {
            Router::redirect("/Login");
        }
    } else {
        Router::redirect("/register");
    }
});

Router::route("POST", "/login", function () {
    /* TODO: refactor and use $weCRMService->verifyAgent($_POST["email"],$_POST["password"]) */
    $email = $_POST["email"];
    $universityDAO = new UniversityDAO();
    $university = $universityDAO->findByEmail($email);
    if (!empty($university)) {
        if (password_verify($_POST["password"], $university->getPassword())) {
            $_SESSION["universityLogin"]["organization"] = $university->getOrganization();
            $_SESSION["universityLogin"]["email"] = $email;
            $_SESSION["universityLogin"]["id"] = $university->getIDuniversity();
            session_id($university->getIDuniversity());
            if (password_needs_rehash($university->getPassword(), PASSWORD_DEFAULT)) {
                $university->setPassword(password_hash($_POST["password"], PASSWORD_DEFAULT));
                $universityDAO->update($university);
            };
            Router::redirect("/CourseOverview");

        } else {
            Router::redirect("/Login");
        }
    } else {
        Router::redirect("/index");
    }
});
Router::route("POST", "EduResults", function () {
    $filter = new filteredCourse();
    $filter->setDiscipline($_POST["discipline"]);
    $filter->setDegree($_POST["degree"]);
    $filter->setAttendance($_POST["attendance"]);
    $filter->setRegion($_POST["region"]);
    $filter->setInstitute($_POST["institute"]);
    global $filteredCourses;
    $courseDAO = new CourseDAO();
    $filteredCourses = $courseDAO->findByFilter($filter);
    if (!empty($filteredCourses)) { //here it not is empty

    } else {
        router::redirect("/EduResults?match=false");
    }
    //require_once("view/EduResults.php");
    layoutSetContent("view/EduResults.php");
    //Router::redirect("/EduResults");
});

Router::route_auth("GET", "/logout", $authFunction, function () {
    session_destroy();
    setcookie("token", "", time() - 3600, "/");
    Router::redirect("/Login");
});

Router::route("GET", "/", function () {
    layoutSetContent("view/index.php");
});

Router::route("GET", "index", function () {
    layoutSetContent("view/index.php");
});

Router::route("GET", "AboutUs", function () {
    //require_once("view/AboutUs.php");
    layoutSetContent("view/AboutUs.php");
});
Router::route("GET", "ForgotPassword", function () {
    //require_once("view/ForgotPasswordSet.php");
    layoutSetContent("view/ForgotPasswordSet.php");
});
Router::route_auth("GET", "customerListPDF", $authFunction, function () {
    //require_once("view/ForgotPasswordSet.php");
    layoutSetContent("view/customerListPDF.php");
});
Router::route("GET", "PDF", function () {
    $courseDAO = new CourseDAO();
    $course = $courseDAO->read($_GET["id"]);
    echo EmailController::generateContent($course);
    header("Content-Type: application/pdf", NULL, 200);
    layoutSetContent("/index");
    /*
        global $results;
        echo $results; //todo create the pdf here instead of trying to send it. and give the IDCourse with pdf so that i know which course
        header("Content-Type: application/pdf", NULL, 200);*/

});
Router::route("GET", "Contact", function () {
    //require_once("view/Contact.php");
    layoutSetContent("view/Contact.php");
});
Router::route("GET", "Disclaimer", function () {
    //require_once("view/Disclaimer.php");
    layoutSetContent("view/Disclaimer.php");
});
Router::route("GET", "EduProgram", function () {
    //require_once("view/EduProgram.php");
    layoutSetContent("view/EduProgram.php");
});

Router::route("GET", "EduResults", function () {
    //require_once("view/EduProgram.php");
    if (isset($_GET["match"])) {
        layoutSetContent("view/EduPrograms.php");
    } else {
        layoutSetContent("view/EduProgram.php");
    }
});

Router::route("GET", "Privacy", function () {
    //require_once("view/Privacy.php");
    layoutSetContent("view/Privacy.php");
});

Router::route("GET", "Terms", function () {
    //require_once("view/Terms.php");
    layoutSetContent("view/Terms.php");
});


Router::route("GET", "ForgotPasswordGet", function () {
    layoutSetContent("ForgotPasswordGet.php");
});

Router::route("POST", "ForgotPasswordGet", function () {
    $universityDAO = new UniversityDAO();
    $university = $universityDAO->findByEmail($_POST["email"]);
    $to = $_POST["email"];
    $subject = "ForgotPassword";

    $content = "Hi " . $university->getOrganization() . " \n Please use this link to reset your password "
        . "https://swissstudyportal.herokuapp.com/ForgotPasswordSet?id=" . $university->getIDuniversity();
    EmailServiceClient::sendEmail($to, $subject, $content);
    Router::redirect("/index");
});

Router::route("GET", "ForgotPasswordSet", function () {
    $universityID = $_GET["id"];

    $pdoInstance = Database::connect();
    $stmt = $pdoInstance->prepare('
            SELECT * FROM university WHERE "ID_university" = :id;');
    $stmt->bindValue(':id', $universityID);
    $stmt->execute();
    global $university;
    $university = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
    //require_once("view/ForgotPasswordSet.php");
    layoutSetContent("view/ForgotPasswordSet.php");
});
Router::route("POST", "ForgotPasswordSet", function () {
    if ($_POST["password"] == $_POST["password-repeat"]) {
        $universityDAO = new UniversityDAO();
        $university = $universityDAO->findByID($_POST["id"]);
        $university->setPassword(password_hash($_POST["password"], PASSWORD_DEFAULT));
        $universityDAO->update($university);
        Router::redirect("/Login");
    } else {
        Router::redirect("/ForgotPasswordSet?id=" . $_POST["id"]);
    }
});

Router::route_auth("GET", "CourseOverview", $authFunction, function () {
    //require("database/database.php");

    $courseDAO = new CourseDAO();
    $id = $_SESSION["universityLogin"]["id"];
    if (is_null($id)) {
        router::redirect("/");
    }
    global $courses;
    $courses = $courseDAO->findByUniversity($_SESSION["universityLogin"]["id"]);
    //$pdoInstance = Database::connect();
    /** TODO: create a prepared SQL statement to retrieve all customers */
    /*$stmt = $pdoInstance->prepare('
        SELECT * FROM course WHERE "FK_university" = :id ORDER BY "ID_course";');
    $stmt->bindValue(':id', $_SESSION["universityLogin"]["id"]);
    $stmt->execute();
    $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // TODO: extend the customers.php file to show the data
    */
    //$courses = $courseDAO->findByUniversity($_SESSION["universityLogin"]["id"]);*//*
    //require_once("view/CourseOverview.php");
    layoutSetContent("view/CourseOverview.php");

});
Router::route_auth("POST", "/university-edit", $authFunction, function () {
        $university = new University();
        $universityDAO = new UniversityDAO();
        $university->setOrganization($_POST["organization"]);
        $university->setRegion($_POST["region"]);
        $university->setInstitute($_POST["institute"]);
        $university->setDescription($_POST["description"]);
        $university->setEmail($_POST["email"]);
        $university->setPassword(password_hash($_POST["password"], PASSWORD_DEFAULT));

        $universityDAO->update($university);
        $_SESSION["universityLogin"]["organization"] = $university->getOrganization();
        $_SESSION["universityLogin"]["email"] = $university->getEmail();
        $_SESSION["universityLogin"]["id"] = session_id();
        //$_SESSION["universityLogin"]["id"] = $universityDAO->findByEmail($_POST["email"])->getIDuniversity();
        $_SESSION["universityLogin"]["region"] = $university->getRegion();
        $_SESSION["universityLogin"]["description"] = $university->getDescription();
        $_SESSION["universityLogin"]["institute"] = $university->getInstitute();

        Router::redirect("/Welcome");
});

Router::route_auth("GET", "/course-create", $authFunction, function () {
    layoutSetContent("view/courseEdit.php");
});

Router::route_auth("GET", "/course-edit", $authFunction, function () {
    $id = $_GET["id"];
    $pdoInstance = Database::connect();
    $stmt = $pdoInstance->prepare('
            SELECT * FROM course WHERE "ID_course" = :id;');
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    global $course;
    $course = $stmt->fetchAll(PDO::FETCH_ASSOC)[0];
    layoutSetContent("courseEdit.php");

    /*

    $id = $_GET["id"];
    global $course;
    $courseDAO = new CourseDAO();
    $course = $courseDAO->findByUniversity($_SESSION["universityLogin"]["id"]);
    $course = WECRMServiceImpl::getInstance()->readCustomer($id);
    layoutSetContent("courseEdit.php");*/
});

Router::route_auth("GET", "/course-delete", $authFunction, function () {
    // TODO: WECRMServiceImpl::getInstance()->deleteCustomer($id);
    $id = $_GET["id"];
    $courseDAO = new CourseDAO();
    $course = new Course();
    $course->setIDcourse($id);
    $courseDAO->delete($course);
    Router::redirect("/CourseOverview");
});
Router::route_auth("GET", "Welcome", $authFunction, function () {
    layoutSetContent("view/Welcome.php");
});
Router::route_auth("GET", "/university-edit", $authFunction, function () {
    Global $university;
    $universityDAO = new UniversityDAO();
    $university = $universityDAO->read($_SESSION["universityLogin"]["id"]);
    layoutSetContent("view/UniversityEdit.php");
});
Router::route_auth("POST", "/update", $authFunction, function () {
    $course = new Course();
    $courseDAO = new CourseDAO();
    $course->setFKUniversity($_SESSION["universityLogin"]["id"]);
    $course->setIDcourse($_POST["id"]);
    $course->setName($_POST["name"]);
    $course->setStartdate($_POST["startDate"]);
    $course->setDiscipline($_POST["discipline"]);
    $course->setDescription($_POST["description"]);
    $course->setDegree($_POST["degree"]);
    $course->setAttendance($_POST["attendance"]);
    $course->setDuration($_POST["duration"]);
    $course->setLanguage($_POST["language"]);
    $course->setLink($_POST["link"]);
    if ($course->getIDcourse() === "") {
        $courseDAO->create($course);

        //PDFController::generatePDFCustomers($course);


        EmailController::sendInvoice($courseDAO->getID($course));
        //Router::redirect("/customerListPDF");
        //WECRMServiceImpl::getInstance()->createCustomer($course);
    } else {
        $courseDAO->update($course);
        //WECRMServiceImpl::getInstance()->updateCustomer($course);
    }
    Router::redirect("/CourseOverview");
});
Router::route_auth("GET", "/course/email", $authFunction, function () {
    EmailController::sendMeMyCustomers();
    Router::redirect("/");
});

Router::route_auth("GET", "/course/pdf", $authFunction, function () {
    //PDFController::generatePDFCustomers();
});
try {
    Router::call_route($_SERVER['REQUEST_METHOD'], $_SERVER['PATH_INFO']);
} catch (HTTPException $exception) {
    $exception->getHeader();
    require_once("view/404.php");
}
