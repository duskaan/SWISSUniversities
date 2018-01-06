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
use domain\Customer;
use domain\University;
use dao\CustomerDAO;
use dao\UniversityDAO;


session_start();

$authFunction = function () {
    if (isset($_SESSION["agentLogin"])) {
        return true;
    }
    //router::redirect("/");
    return true;
};

Router::route("GET", "/login", function () {
    require_once("view/agentLogin.php");
});

Router::route("GET", "/register", function () {
    require_once("view/agentRegister.php");
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
    Router::redirect("/EduResults.php");
});

Router::route("POST", "/login", function () {
    /* TODO: refactor and use $weCRMService->verifyAgent($_POST["email"],$_POST["password"]) */
    $email = $_POST["email"];
    $agentDAO = new UniversityDAO();
    $agent = $agentDAO->findByEmail($email);
    if (isset($agent)) {
        if (password_verify($_POST["password"], $agent->getPassword())) {
            $_SESSION["agentLogin"]["name"] = $agent->getName();
            $_SESSION["agentLogin"]["email"] = $email;
            $_SESSION["agentLogin"]["id"] = $agent->getId();
            if (password_needs_rehash($agent->getPassword(), PASSWORD_DEFAULT)) {
                $agent->setPassword(password_hash($_POST["password"], PASSWORD_DEFAULT));
                $agentDAO->update($agent);
            }
        }
    }
    Router::redirect("/");
});

Router::route("GET", "/logout", function () {
    session_destroy();
    Router::redirect("/login");
});

Router::route_auth("GET", "/", $authFunction, function () {
    layoutSetContent("view/index.php");
});

Router::route_auth("GET", "AboutUs.php", $authFunction, function () {
    require_once("view/AboutUs.php");
    layoutSetContent("view/AboutUs.php");
});
Router::route_auth("GET", "Contact.php", $authFunction, function () {
    require_once("view/Contact.php");
    layoutSetContent("view/Contact.php");
});
Router::route_auth("GET", "Disclaimer.php", $authFunction, function () {
    require_once("view/Disclaimer.php");
    layoutSetContent("view/Disclaimer.php");
});
Router::route_auth("GET", "EduProgram.php", $authFunction, function () {
    require_once("view/EduProgram.php");
    layoutSetContent("view/EduProgram.php");
});
Router::route_auth("GET", "EduResults.php", $authFunction, function () {
    require_once("view/EduResults.php");
    layoutSetContent("view/EduResults.php");
});
Router::route_auth("GET", "Login.php", $authFunction, function () {
    require_once("view/Login.php");
    layoutSetContent("view/Login.php");
});
Router::route_auth("GET", "Privacy.php", $authFunction, function () {
    require_once("view/Privacy.php");
    layoutSetContent("view/Privacy.php");
});
Router::route_auth("GET", "Register.php", $authFunction, function () {
    require_once("view/Register.php");
    layoutSetContent("view/Register.php");
});
Router::route_auth("GET", "Terms.php", $authFunction, function () {
    require_once("view/Terms.php");
    layoutSetContent("view/Terms.php");
});
Router::route_auth("GET", "TileTest.php", $authFunction, function () {
    require_once("view/TileTest.php");
    layoutSetContent("view/TileTest.php");
});
Router::route_auth("POST", "/agent/edit", $authFunction, function () {
    WECRMServiceImpl::getInstance()->editAgent($_POST["name"],$_POST["email"], $_POST["password"]);
    Router::redirect("/logout");
});

Router::route_auth("GET", "/customer/create", $authFunction, function () {
    layoutSetContent("customerEdit.php");
});

Router::route_auth("GET", "/customer/edit", $authFunction, function () {
    $id = $_GET["id"];
    global $customer;
    $customer = WECRMServiceImpl::getInstance()->readCustomer($id);
    layoutSetContent("customerEdit.php");
});

Router::route_auth("GET", "/customer/delete", $authFunction, function () {
    /* TODO: WECRMServiceImpl::getInstance()->deleteCustomer($id); */
    $id = $_GET["id"];
    $customerDAO = new CustomerDAO();
    $customer = new Customer();
    $customer->setId($id);
    $customerDAO->delete($customer);
    Router::redirect("/");
});

Router::route_auth("POST", "/customer/update", $authFunction, function () {
    $customer = new Customer();
    $customer->setId($_POST["id"]);
    $customer->setName($_POST["name"]);
    $customer->setEmail($_POST["email"]);
    $customer->setMobile($_POST["mobile"]);
    if ($customer->getId() === "") {
        WECRMServiceImpl::getInstance()->createCustomer($customer);
    } else {
        WECRMServiceImpl::getInstance()->updateCustomer($customer);
    }
    Router::redirect("/");
});

try {
    Router::call_route($_SERVER['REQUEST_METHOD'], $_SERVER['PATH_INFO']);
} catch (HTTPException $exception) {
    $exception->getHeader();
    require_once("view/404.php");
}