<?php

namespace dao;

use domain\Course;
use domain\filteredCourse;


/**
 * @access public
 * @author Tim van Dijke
 */
class CourseDAO extends BasicDAO {

    /**
     * @access public
     * @param Course $course
     * @internal param Course $Course
     * @ParamType Course course
     */
	public function create(Course $course) {
        $stmt = $this->pdoInstance->prepare('
            INSERT INTO course ("FK_university", name, startdate, discipline, description, degree, attendance, duration, "language", link)
            VALUES (:FK_university, :name, :startdate, :discipline, :description, :degree, :attendance, :duration, :language, :link)');
        //$stmt->bindValue(':FK_university', $course->getUniversityID());
        $stmt->bindValue(':FK_university', session_id());
        $stmt->bindValue(':name', $course->getName());
        $stmt->bindValue(':startdate', $course->getStartdate());
        $stmt->bindValue(':discipline', $course->getDiscipline());
        $stmt->bindValue(':description', $course->getDescription());
        $stmt->bindValue(':degree', $course->getDegree());
        $stmt->bindValue(':attendance', $course->getAttendance());
        $stmt->bindValue(':duration', $course->getDuration());
        $stmt->bindValue(':language', $course->getLanguage());
        $stmt->bindValue(':link', $course->getLink());
        $stmt->execute();
	}

	/**
	 * @access public
	 * @param int CourseId
	 * @return Course
	 * @ParamType courseID int
	 * @ReturnType Course
	 */
	public function read($courseId) {
        $stmt = $this->pdoInstance->prepare('
            SELECT * FROM course WHERE "ID_course" = :id;');
        $stmt->bindValue(':id', $courseId);
        $stmt->execute();

        $result = $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\Course")[0];
        if(!empty($result)){
            return $result;
        }
        //return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}

	/**
	 * @access public
	 * @param Course course
	 * @ParamType course Course
	 */
	public function update(Course $course) {
        $stmt = $this->pdoInstance->prepare('
            UPDATE course SET name = :name,
                startdate = :startdate,
                discipline= :discipline,
                description= :description,
                degree=:degree,
                attendance=:attendance,
                duration=:duration,
                link= :link,
                language  =:language
            WHERE "ID_course" = :id');
        $stmt->bindValue(':name', $course->getName());
        $stmt->bindValue(':startdate', $course->getStartdate());
        $stmt->bindValue(':discipline', $course->getDiscipline());
        $stmt->bindValue(':description', $course->getDescription());
        $stmt->bindValue(':degree', $course->getDegree());
        $stmt->bindValue(':attendance', $course->getAttendance());
        $stmt->bindValue(':id', $course->getIDcourse());
        $stmt->bindValue(':duration', $course->getDuration());
        $stmt->bindValue(':link', $course->getLink());
        $stmt->bindValue(':language', $course->getLanguage());
        $stmt->execute();
        //return $this->read($course->getIDcourse());
	}

	/**
	 * @access public
	 * @param Course course
	 * @ParamType course Course
	 */
	public function delete(Course $course) {
        $stmt = $this->pdoInstance->prepare('
            DELETE FROM course
            WHERE "ID_course" = :id
        ');
        $stmt->bindValue(':id', $course->getIDcourse());
        $stmt->execute();
	}

	/**
	 * @access public
	 * @param int universityId
	 * @return Course[]
	 * @ParamType universityID int
	 * @ReturnType Course[]
	 */
	public function findByUniversity($universityID) {
        $stmt = $this->pdoInstance->prepare('
            SELECT * FROM course WHERE "FK_university" = :universityID ORDER BY "ID_course"');
        $stmt->bindValue(':universityID', $universityID);
        $stmt->execute();

        //return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\Course");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}
    /**
     * @access public
     * @param $filters filteredCourse
     * @return Course[]
     * @ParamType filters filteredCourse
     * @ReturnType Course[]
     */
    public function findByFilter($filters) {
        $stmt = $this->pdoInstance->prepare('
            SELECT course.link, course.name, course.description, course.discipline, university.organization, course.startdate, course.degree, course.attendance, course.duration
            FROM course join university ON "ID_university"="FK_university"
            WHERE university.institute = :institute 
            AND course.discipline = :discipline
            AND course.attendance = :attendance
            AND university.region = :region
            AND course.degree = :degree 
            ORDER BY course.startdate');
        $stmt->bindValue(':institute', $filters->getInstitute());
        $stmt->bindValue(':discipline', $filters->getDiscipline());
        $stmt->bindValue(':attendance', $filters->getAttendance());
        $stmt->bindValue(':region', $filters->getRegion());
        $stmt->bindValue(':degree', $filters->getDegree());
        $stmt->execute();
        $result=$stmt->fetchAll(\PDO::FETCH_ASSOC);
        if (!empty($result)){
            return $result;
        }
    }
    /**
     * @access public
     * @param course Course
     * @return Course
     * @ParamType course Course
     * @ReturnType Course[]
     */
    public function getID(Course $course)
    {
        $stmt = $this->pdoInstance->prepare('
            SELECT * FROM course 
            WHERE  "FK_university"= :FKid 
            AND name= :name
            AND startdate= :startdate
            AND discipline= :discipline
            AND description= :description
            AND degree= :degree
            AND attendance= :attendance
            AND duration= :duration
            AND link= :link
            AND language= :language
            ');
        $stmt->bindValue(':FKid', $course->getFKUniversity());
        $stmt->bindValue(':name', $course->getName());
        $stmt->bindValue(':startdate', $course->getStartdate());
        $stmt->bindValue(':discipline', $course->getDiscipline());
        $stmt->bindValue(':description', $course->getDescription());
        $stmt->bindValue(':degree', $course->getDegree());
        $stmt->bindValue(':attendance', $course->getAttendance());
        $stmt->bindValue(':duration', $course->getDuration());
        $stmt->bindValue(':link', $course->getLink());
        $stmt->bindValue(':language', $course->getLanguage());

        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "domain\Course")[0];

    }
}
?>