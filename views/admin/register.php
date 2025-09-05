<form method="POST" action="">
  <input type="text" name="username" placeholder="Username" required>
  <input type="password" name="password" placeholder="Password" required>
  <button type="submit" name="register">Register Admin</button>
</form>

<?php
if (isset($_POST['register'])) {
  require_once '../../classes/Database.php';
  $db = new Database();
  $conn = $db->connect();

  $username = $_POST['username'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $sql = "INSERT INTO admins (username, password) VALUES (?, ?)";
  $stmt = $conn->prepare($sql);
  $success = $stmt->execute([$username, $password]);

  echo $success ? "✅ Admin registered successfully!" : "❌ Registration failed.";
}
?>
