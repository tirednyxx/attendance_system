<?php
require_once '../../classes/Student.php';
$student = new Student();

// Replace with actual student ID (e.g., from session or input)
$student_id = 1;

$records = $student->getAttendanceHistory($student_id);
?>

<h2>Attendance History</h2>
<table border="1" cellpadding="8">
  <tr>
    <th>Date</th>
    <th>Time In</th>
    <th>Status</th>
  </tr>
  <?php foreach ($records as $row): ?>
    <tr>
      <td><?= $row['date'] ?></td>
      <td><?= $row['time_in'] ?></td>
      <td><?= $row['status'] ?></td>
    </tr>
  <?php endforeach; ?>
</table>
