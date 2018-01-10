<?php
/**
 * Created by PhpStorm.
 * User: Tim
 * Date: 06.01.2018
 * Time: 13:36
 */
namespace domain;
/**
 * @access private
 * @author Tim van Dijke
 */
class University {
    /**
     * @AttributeType int
     */
    private $ID_university;
    /**
     * @AttributeType String
     */
    private $organization;
    /**
     * @AttributeType String
     */
    private $region;
    /**
     * @AttributeType String
     */
    private $description;
    /**
     * @AttributeType String
     */
    private $institute;
    /**
     * @AttributeType String
     */

    private $email;
    /**
     * @AttributeType String
     */
    private $password;
    /**
     * @AssociationType Customer[]
     * @AssociationMultiplicity 0..*
     */
    private $customer;
    /**
     * @access public
     * @return int
     * @ReturnType int
     */
    public function getIDuniversity() {
        return $this->ID_university;
    }
    /**
     * @access public
     * @param int id
     * @return void
     * @ParamType id int
     * @ReturnType void
     */
    public function setIDuniversity($ID_university) {
        $this->ID_university = $ID_university;
    }
    /**
     * @access public
     * @return String
     * @ReturnType String
     */
    public function getOrganization() {
        return $this->organization;
    }
    /**
     * @access public
     * @param String name
     * @return void
     * @ParamType name String
     * @ReturnType void
     */
    public function setOrganization($name) {
        $this->organization = $name;
    }
    /**
     * @access public
     * @return String
     * @ReturnType String
     */
    public function getRegion() {
        return $this->region;
    }
    /**
     * @access public
     * @param String name
     * @return void
     * @ParamType name String
     * @ReturnType void
     */
    public function setRegion($region) {
        $this->region = $region;
    }
    /**
     * @access public
     * @return String
     * @ReturnType String
     */
    public function getDescription() {
        return $this->description;
    }
    /**
     * @access public
     * @param String name
     * @return void
     * @ParamType name String
     * @ReturnType void
     */
    public function setDescription($description) {
        $this->description = $description;
    }
    public function getInstitute() {
        return $this->institute;
    }
    /**
     * @access public
     * @param String name
     * @return void
     * @ParamType name String
     * @ReturnType void
     */
    public function setInstitute($institute) {
        $this->institute = $institute;
    }
    /**
     * @access public
     * @return String
     * @ReturnType String
     */
    /**
     * @access public
     * @return String
     * @ReturnType String
     */
    public function getEmail() {
        return $this->email;
    }
    /**
     * @access public
     * @param String email
     * @return void
     * @ParamType email String
     * @ReturnType void
     */
    public function setEmail($email) {
        $this->email = $email;
    }
    /**
     * @access public
     * @return String
     * @ReturnType String
     */
    public function getPassword() {
        return $this->password;
    }
    /**
     * @access public
     * @param String password
     * @return void
     * @ParamType password String
     * @ReturnType void
     */
    public function setPassword($password) {
        $this->password = $password;
    }
    /**
     * @access public
     * @return Customer[]
     * @ReturnType Customer[]
     */
    public function getCustomer() {
        return $this->customer;
    }
    /**
     * @access public
     * @param Customer[] customer
     * @return void
     * @ParamType customer Customer[]
     * @ReturnType void
     */
    public function setCustomer(array $customer) {
        $this->customer = $customer;
    }
}
?>