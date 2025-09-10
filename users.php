<?php
require 'ClassAutoLoad.php';

$conn = new mysqli(
    $conf['DB_HOST'],
    $conf['DB_USER'],
    $conf['DB_PASS'],
    $conf['DB_NAME']
);

if ($conn->connect_error) {
    die("DB Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT id, name, email FROM users ORDER BY id ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Registered Users</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5">
  <div class="card shadow p-4">
    <h2 class="mb-4">Registered Users</h2>
    <ol class="list-group list-group-numbered">
      <?php while($row = $result->fetch_assoc()): ?>
        <li class="list-group-item d-flex justify-content-between align-items-center">
          <?php echo htmlspecialchars($row['name']); ?>
          <span class="badge badge-primary badge-pill"><?php echo htmlspecialchars($row['email']); ?></span>
        </li>
      <?php endwhile; ?>
    </ol>
  </div>
</div>
</body>
</html>
<?php $conn->close(); ?>
