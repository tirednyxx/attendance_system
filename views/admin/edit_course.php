<form method="POST" action="">
  <input type="number" name="course_id" placeholder="Course ID" required>
  <input type="text" name="new_name" placeholder="New Course Name" required>
  <button type="submit" name="edit">Edit Course</button>
</form>

<?php
if (isset($_POST['edit'])) {
  require_once '../../classes/Admin.php';
  $admin = new Admin();
  $success = $admin->editCourse($_POST['course_id'], $_POST['new_name']);
  echo $success ? "✅ Course updated!" : "❌ Update failed.";
}
?>
