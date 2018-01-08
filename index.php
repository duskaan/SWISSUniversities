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
use database\Database;


session_start();

$authFunction = function () {
    if (isset($_SESSION["universityLogin"])) {
        return true;
    }
    //router::redirect("/");
    return true;
};

Router::route("GET", "/login", function () {
    require_once("view/Login.php");
});

Router::route("GET", "/register", function () {
    session_destroy();
    require_once("view/Register.php");
    session_create_id();
});

Router::route("POST", "/register", function () {
    /* TODO: refactor and use WECRMServiceImpl::getInstance()->editAgent($_POST["name"],$_POST["email"], $_POST["password"]); */
    //todo use university
    $university = new University();
    $university->setOrganization($_POST["organization"]);
    $university->setRegion($_POST["region"]);
    $university->setInstitute($_POST["institute"]);
    $university->setDescription($_POST["description"]);
    $university->setEmail($_POST["email"]);
    $university->setPassword(password_hash($_POST["password"], PASSWORD_DEFAULT));
    $universityDAO = new UniversityDAO();
    $universityDAO->create($university);


    $_SESSION["universityLogin"]["organization"] = $university->getOrganization();
    $_SESSION["universityLogin"]["email"] = $university->getEmail();
    $_SESSION["universityLogin"]["id"] = session_id();
    //$_SESSION["universityLogin"]["id"] = $universityDAO->findByEmail($_POST["email"])->getIDuniversity();

    $_SESSION["universityLogin"]["region"] = $university->getRegion();
    $_SESSION["universityLogin"]["description"] = $university->getDescription();
    $_SESSION["universityLogin"]["institute"] = $university->getInstitute();
    Router::redirect("/Welcome");




});

Router::route("POST", "/login", function () {
    /* TODO: refactor and use $weCRMService->verifyAgent($_POST["email"],$_POST["password"]) */
    $email = $_POST["email"];
    $universityDAO = new UniversityDAO();
    $university = $universityDAO->findByEmail($email);
    if (isset($university)) {
        if (password_verify($_POST["password"], $university->getPassword())) {
            $_SESSION["universityLogin"]["organization"] = $university->getOrganization();
            $_SESSION["universityLogin"]["email"] = $email;
            $_SESSION["universityLogin"]["id"] = $university->getIDuniversity();
            session_id($university->getIDuniversity());
            if (password_needs_rehash($university->getPassword(), PASSWORD_DEFAULT)) {
                $university->setPassword(password_hash($_POST["password"], PASSWORD_DEFAULT));
                $universityDAO->update($university);
            }
           ;
            Router::redirect("/Welcome");
        }
    } else {
        Router::redirect("/index.php");
    }


});

Router::route("GET", "/logout", function () {
    session_destroy();
    Router::redirect("/login");
});

Router::route_auth("GET", "/", $authFunction, function () {
    layoutSetContent("view/index.php");
});
Router::route_auth("GET", "/index", $authFunction, function () {
    layoutSetContent("view/index.php");
});

Router::route_auth("GET", "AboutUs", $authFunction, function () {
    require_once("view/AboutUs.php");
    layoutSetContent("view/AboutUs.php");
});
Router::route_auth("GET", "Contact", $authFunction, function () {
    require_once("view/Contact.php");
    layoutSetContent("view/Contact.php");
});
Router::route_auth("GET", "Disclaimer", $authFunction, function () {
    require_once("view/Disclaimer.php");
    layoutSetContent("view/Disclaimer.php");
});
Router::route_auth("GET", "EduProgram", $authFunction, function () {
    require_once("view/EduProgram.php");
    layoutSetContent("view/EduProgram.php");
});
Router::route_auth("GET", "EduResults", $authFunction, function () {
    require_once("view/EduResults.php");
    layoutSetContent("view/EduResults.php");
});
Router::route_auth("GET", "Login", $authFunction, function () {
    require_once("view/Login.php");
    layoutSetContent("view/Login.php");
});
Router::route_auth("GET", "Privacy", $authFunction, function () {
    require_once("view/Privacy.php");
    layoutSetContent("view/Privacy.php");
});
Router::route_auth("GET", "Register", $authFunction, function () {
    require_once("view/Register.php");

    layoutSetContent("view/Register.php");
});
Router::route_auth("GET", "Terms", $authFunction, function () {
    require_once("view/Terms.php");
    layoutSetContent("view/Terms.php");
});
Router::route_auth("GET", "TileTest", $authFunction, function () {
    require_once("view/TileTest.php");
    layoutSetContent("view/TileTest.php");
});

Router::route_auth("GET", "CourseOverview", $authFunction, function () {
    //require("database/database.php");
    /*
    $courseDAO = new CourseDAO();
    global $courses;

    //$courses = $courseDAO->findByUniversity($_SESSION["UniversityLogin"]["id"]);
    $pdoInstance = Database::connect();
    /** TODO: create a prepared SQL statement to retrieve all customers */
    /*$stmt = $pdoInstance->prepare('
        SELECT * FROM course WHERE "FK_university" = :id ORDER BY "ID_course";');
    $stmt->bindValue(':id', $_SESSION["universityLogin"]["id"]);
    $stmt->execute();
    $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // TODO: extend the customers.php file to show the data

    //$courses = $courseDAO->findByUniversity($_SESSION["universityLogin"]["id"]);*/
    //require_once("view/CourseOverview.php");
   // layoutSetContent("view/CourseOverview.php");
    //require_once("view/EduResults.php");
    //layoutSetContent("view/EduResults.php   ");
    require_once("view/customers.php");
    layoutSetContent("view/customers.php");

});
Router::route_auth("POST", "/agent/edit", $authFunction, function () {
    WECRMServiceImpl::getInstance()->editAgent($_POST["name"], $_POST["email"], $_POST["password"]);
    Router::redirect("/logout");
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
    layoutSetContent("view/courseEdit.php");

    /*

    $id = $_GET["id"];
    global $course;
    $courseDAO = new CourseDAO();
    $course = $courseDAO->findByUniversity($_SESSION["universityLogin"]["id"]);
    $course = WECRMServiceImpl::getInstance()->readCustomer($id);
    layoutSetContent("courseEdit.php");*/
});

Router::route_auth("GET", "/course-delete", $authFunction, function () {
    /* TODO: WECRMServiceImpl::getInstance()->deleteCustomer($id); */
    $id = $_GET["id"];
    $courseDAO = new CourseDAO();
    $course = new Course();
    $course->setIDcourse($id);
    $courseDAO->delete($course);
    Router::redirect("/");
});
Router::route_auth("GET", "Welcome", $authFunction, function () {
    layoutSetContent("view/Welcome.php");
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
    if ($course->getIDcourse() === "") {
        $courseDAO->create($course);
        //WECRMServiceImpl::getInstance()->createCustomer($course);
    } else {
        $courseDAO->update($course);
        //WECRMServiceImpl::getInstance()->updateCustomer($course);
    }
    Router::redirect("/CourseOverview");
});

try {
    Router::call_route($_SERVER['REQUEST_METHOD'], $_SERVER['PATH_INFO']);
} catch (HTTPException $exception) {
    $exception->getHeader();
    require_once("view/404.php");
}