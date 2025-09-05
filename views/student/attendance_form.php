<form method="POST" action="">
  <input type="time" name="time_in" required>
  <button type="submit" name="log">Log Attendance</button>
</form>

<?php
if (isset($_POST['log'])) {
  require_once '../classes/Attendance.php';
  $attendance = new Attendance();

  
  $student_id = 1;

  $success = $attendance->logAttendance($student_id, $_POST['time_in']);
  echo $success ? "✅ Attendance logged!" : "❌ Failed to log attendance.";
}
?>
