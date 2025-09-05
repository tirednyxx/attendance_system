<?php
require_once 'Database.php';

class Student {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function register($name, $email, $course_id, $year_level) {
        $sql = "INSERT INTO students (name, email, course_id, year_level) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$name, $email, $course_id, $year_level]);
    }

    public function getAttendanceHistory($student_id) {
        $sql = "SELECT * FROM attendance WHERE student_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$student_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
