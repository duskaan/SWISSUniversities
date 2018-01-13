<?php

namespace dao;

use domain\University;

/**
 * @access public
 * @author andreas.martin
 */
class UniversityDAO extends BasicDAO {

	/**
	 * @access public
	 * @param Agent agent
	 * @return Agent
	 * @ParamType agent Agent
	 * @ReturnType Agent
	 */
	public function create(University $university) {
        session_regenerate_id();

	    $stmt = $this->pdoInstance->prepare('
        INSERT INTO university ("ID_university", organization,region,description,institute, email, password)
          VALUES(:ID, :organization,:region,:description,:institute,:email, :password);');

        $stmt->bindValue(':ID', session_id());
        $stmt->bindValue(':organization', $university->getOrganization());
        $stmt->bindValue(':region', $university->getRegion());
        $stmt->bindValue(':description', $university->getDescription());
        $stmt->bindValue(':institute', $university->getInstitute());
        $stmt->bindValue(':email', $university->getEmail());
        //$stmt->bindValue(':emailExist', $university->getEmail());
        $stmt->bindValue(':password', $university->getPassword());
        $stmt->execute();
        //return $this->read($this->pdoInstance->lastInsertId());
	}

	/**
	 * @access public
	 * @param int agentId
	 * @return Agent
	 * @ParamType agentId int
	 * @ReturnType Agent
	 */
	public function read($universityID) {
        $stmt = $this->pdoInstance->prepare('
            SELECT * FROM university WHERE "ID_university" = :id;');
        $stmt->bindValue(':id', $universityID);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\University")[0];
    }

	/**
	 * @access public
	 * @param Agent agent
	 * @return Agent
	 * @ParamType agent Agent
	 * @ReturnType Agent
	 */
	public function update(University $university) {
        $stmt = $this->pdoInstance->prepare('
                UPDATE university SET organization=:org,region=:region, email=:email, institute=:institute,description=:description, password=:password WHERE "ID_university"= :id;');
        $stmt->bindValue(':org', $university->getOrganization());
        $stmt->bindValue(':id', $university->getIDuniversity());
        $stmt->bindValue(':region', $university->getRegion());
        $stmt->bindValue(':email', $university->getEmail());
        $stmt->bindValue(':password', $university->getPassword());
        $stmt->bindValue(':institute', $university->getInstitute());
        $stmt->bindValue(':description', $university->getDescription());
        $stmt->execute();
	}

	/**
	 * @access public
	 * @param String email
	 * @return University
	 * @ParamType email String
	 * @ReturnType University
	 */
	public function findByEmail($email) {
        $stmt = $this->pdoInstance->prepare('
            SELECT * FROM university WHERE email = :email;');
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        if ($stmt->rowCount() > 0)
            return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\University")[0];
        return null;
    }
    /**
     * @access public
     * @param String id
     * @return University
     * @ParamType email String
     * @ReturnType University
     */
    public function findByID($id) {
        $stmt = $this->pdoInstance->prepare('
            SELECT * FROM university WHERE "ID_university" = :id ;');
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        if ($stmt->rowCount() > 0)
            return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\University")[0];
        return null;
    }
}
?>