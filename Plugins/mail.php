<?php
// Show all errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/../ClassAutoLoad.php'; // so DB + conf.php load
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "<div class='alert alert-danger'>❌ Invalid email address.</div>";
    } else {
        // Send mail
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'mugomoses506@gmail.com'; 
            $mail->Password   = 'ywjjcupuqfneuttm'; 
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;

            $mail->setFrom('mugomoses506@gmail.com', 'ICS2.2 System Admin');
            $mail->addAddress('moses.njoroge@strathmore.edu','moses');

            $mail->isHTML(true);
            $mail->Subject = "Welcome to ICS2.2";
            $mail->Body    = "
                <p>Hello <b>$name</b>,</p>
                <p>You have requested an account on <b>ICS2.2</b>.</p>
                <p>In order to see the account click 
                <a href='http://localhost:8081/fol_project/signin.php'>here</a> 
                to complete registration process.</p>
                <p>Regards,<br>System Admin<br>ICS2.2</p>
            ";

            $mail->send();

            /** ✅ Insert into DB */
            $conn = new mysqli(
                $conf['DB_HOST'],
                $conf['DB_USER'],
                $conf['DB_PASS'],
                $conf['DB_NAME']
            );

            if ($conn->connect_error) {
                die("DB Connection failed: " . $conn->connect_error);
            }

            $stmt = $conn->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
            $stmt->bind_param("ss", $name, $email);
            $stmt->execute();
            $stmt->close();
            $conn->close();

            $message = "<div class='alert alert-success'>✅ Welcome email has been sent to <b>$email</b> and user saved in DB</div>";
        } catch (Exception $e) {
            $message = "<div class='alert alert-danger'>❌ Message could not be sent. Error: {$mail->ErrorInfo}</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Signup Mailer</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5">
  <div class="card shadow p-4">
    <h2 class="mb-4">Sign Up</h2>

    <?php if (!empty($message)) echo $message; ?>

    <form method="post" action="">
      <div class="form-group">
        <label for="name">Full Name</label>
        <input type="text" name="name" id="name" class="form-control" required>
      </div>

      <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" name="email" id="email" class="form-control" required>
      </div>

      <button type="submit" class="btn btn-primary">Register & Receive Email</button>
    </form>
  </div>
</div>
</body>
</html>
