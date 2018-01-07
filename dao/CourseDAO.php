<?php

namespace dao;

use domain\Course;
use domain\University;

/**
 * @access public
 * @author andreas.martin
 */
class CourseDAO extends BasicDAO {

	/**
	 * @access public
	 * @param Customer customer
	 * @return Customer
	 * @ParamType customer Customer
	 * @ReturnType Customer
	 */
	public function create(Course $course) {
        $stmt = $this->pdoInstance->prepare('
            INSERT INTO course ("FK_university", name, startdate, discipline, description, degree, attendance, duration)
            VALUES (:FK_university, :name, :startdate, :discipline, :description, :degree, :attendance, :duration)');
        $stmt->bindValue(':FK_university', $course->getUniversityID());
        $stmt->bindValue(':name', $course->getName());
        $stmt->bindValue(':startdate', $course->getStartDate());
        $stmt->bindValue(':discipline', $course->getDiscipline());
        $stmt->bindValue(':description', $course->getDescription());
        $stmt->bindValue(':degree', $course->getDegree());
        $stmt->bindValue(':attendance', $course->getAttendance());
        $stmt->bindValue(':duration', $course->getDuration());
        $stmt->execute();
        //return $this->read($this->pdoInstance->lastInsertId());
	}

	/**
	 * @access public
	 * @param int customerId
	 * @return Customer
	 * @ParamType customerId int
	 * @ReturnType Customer
	 */
	public function read($courseId) {
        $stmt = $this->pdoInstance->prepare('
            SELECT * FROM course WHERE ID_course = :id;');
        $stmt->bindValue(':id', $courseId);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\Course")[0];
	}

	/**
	 * @access public
	 * @param Customer customer
	 * @return Customer
	 * @ParamType customer Customer
	 * @ReturnType Customer
	 */
	public function update(Course $course) {
        $stmt = $this->pdoInstance->prepare('
            UPDATE customer SET name = :name,
                email = :email,
                mobile = :mobile
            WHERE id = :id');
        $stmt->bindValue(':name', $course->getName());
        $stmt->bindValue(':email', $course->getEmail());
        $stmt->bindValue(':mobile', $course->getMobile());
        $stmt->bindValue(':id', $course->getId());
        $stmt->execute();
        return $this->read($course->getId());
	}

	/**
	 * @access public
	 * @param Customer customer
	 * @ParamType customer Customer
	 */
	public function delete(Customer $customer) {
        $stmt = $this->pdoInstance->prepare('
            DELETE FROM customer
            WHERE id = :id
        ');
        $stmt->bindValue(':id', $customer->getId());
        $stmt->execute();
	}

	/**
	 * @access public
	 * @param int universityId
	 * @return Course[]
	 * @ParamType agentId int
	 * @ReturnType Course[]
	 */
	public function findByUniversity($universityID) {
        $stmt = $this->pdoInstance->prepare('
            SELECT * FROM course WHERE "FK_university" = :universityID ORDER BY "ID_course"');
        $stmt->bindValue(':universityID', $universityID);
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\Course");
	}
}
?>