<?php
require_once 'Database.php';

class Admin {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function addCourse($course_name) {
        $sql = "INSERT INTO courses (course_name) VALUES (?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$course_name]);
    }

    public function editCourse($id, $new_name) {
        $sql = "UPDATE courses SET course_name = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$new_name, $id]);
    }

    public function viewAttendanceByCourseYear($course_id, $year_level) {
        $sql = "SELECT a.*, s.name FROM attendance a
                JOIN students s ON a.student_id = s.id
                WHERE s.course_id = ? AND s.year_level = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$course_id, $year_level]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
