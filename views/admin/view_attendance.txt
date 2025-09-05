<form method="POST" action="">
  <input type="number" name="course_id" placeholder="Course ID" required>
  <input type="number" name="year_level" placeholder="Year Level" required>
  <button type="submit" name="view">View Attendance</button>
</form>

<?php
if (isset($_POST['view'])) {
  require_once '../../classes/Admin.php';
  $admin = new Admin();
  $records = $admin->viewAttendanceByCourseYear($_POST['course_id'], $_POST['year_level']);

  echo "<table border='1'><tr><th>Name</th><th>Date</th><th>Time In</th><th>Status</th></tr>";
  foreach ($records as $row) {
    echo "<tr>
            <td>{$row['name']}</td>
            <td>{$row['date']}</td>
            <td>{$row['time_in']}</td>
            <td>{$row['status']}</td>
          </tr>";
  }
  echo "</table>";
}
?>
