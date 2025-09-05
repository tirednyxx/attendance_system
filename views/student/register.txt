<form method="POST" action="">
  <input type="text" name="name" placeholder="Full Name" required>
  <input type="email" name="email" placeholder="Email" required>
  <select name="course_id" required>
  <?php
  require_once '../classes/Database.php';
  $db = new Database();
  $conn = $db->connect();
  $stmt = $conn->query("SELECT id, course_name FROM courses");
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      echo "<option value='{$row['id']}'>{$row['course_name']}</option>";
  }
  ?>
</select>

  <input type="number" name="year_level" placeholder="Year Level" required>
  <button type="submit" name="register">Register</button>
</form>

<?php
if (isset($_POST['register'])) {
    require_once '../../classes/Student.php';
    $student = new Student();
    $success = $student->register(
        $_POST['name'],
        $_POST['email'],
        $_POST['course_id'],
        $_POST['year_level']
    );

    echo $success ? "✅ Student registered successfully!" : "❌ Registration failed.";
}
?>
