<form method="POST" action="">
  <input type="text" name="course_name" placeholder="Course Name" required>
  <button type="submit" name="add">Add Course</button>
</form>

<?php
if (isset($_POST['add'])) {
  require_once '../../classes/Admin.php';
  $admin = new Admin();
  $success = $admin->addCourse($_POST['course_name']);
  echo $success ? "✅ Course added!" : "❌ Failed to add course.";
}
?>
