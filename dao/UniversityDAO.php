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
            SELECT * FROM university WHERE ID_university = :id;');
        $stmt->bindValue(':id', $universityID);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\Agent")[0];
    }

	/**
	 * @access public
	 * @param Agent agent
	 * @return Agent
	 * @ParamType agent Agent
	 * @ReturnType Agent
	 */
	public function update(Agent $agent) {
        $stmt = $this->pdoInstance->prepare('
                UPDATE agent SET name=:name, email=:email, password=:password WHERE id = :id;');
        $stmt->bindValue(':id', $agent->getId());
        $stmt->bindValue(':name', $agent->getName());
        $stmt->bindValue(':email', $agent->getEmail());
        $stmt->bindValue(':password', $agent->getPassword());
        $stmt->execute();
        return $this->read($agent->getId());
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