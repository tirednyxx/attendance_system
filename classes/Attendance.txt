<?php
require_once 'Database.php';

class Attendance {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    public function logAttendance($student_id, $time_in) {
        $status = $this->checkLateness($time_in);
        $sql = "INSERT INTO attendance (student_id, date, time_in, status) VALUES (?, CURDATE(), ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$student_id, $time_in, $status]);
    }

    private function checkLateness($time_in) {
        return ($time_in > '08:00:00') ? 'Late' : 'On time';
    }
}
?>
