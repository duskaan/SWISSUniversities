<?php

namespace dao;

use domain\Agent;

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
	public function create(University $agent) {
        $stmt = $this->pdoInstance->prepare('
        INSERT INTO university ("University ID", name,region,description,institute, email, password)VALUES
          VALUES(:universityID, :name,:region,:description,:institute,:email, :password)
        );');
        $stmt->bindValue(':name', $agent->getName());
        $stmt->bindValue(':email', $agent->getEmail());
        $stmt->bindValue(':emailExist', $agent->getEmail());
        $stmt->bindValue(':password', $agent->getPassword());
        $stmt->execute();
        return $this->read($this->pdoInstance->lastInsertId());
	}

	/**
	 * @access public
	 * @param int agentId
	 * @return Agent
	 * @ParamType agentId int
	 * @ReturnType Agent
	 */
	public function read($agentId) {
        $stmt = $this->pdoInstance->prepare('
            SELECT * FROM agent WHERE id = :id;');
        $stmt->bindValue(':id', $agentId);
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
	 * @return Agent
	 * @ParamType email String
	 * @ReturnType Agent
	 */
	public function findByEmail($email) {
        $stmt = $this->pdoInstance->prepare('
            SELECT * FROM agent WHERE email = :email;');
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        if ($stmt->rowCount() > 0)
            return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\Agent")[0];
        return null;
    }
}
?>