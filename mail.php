<?php
require 'ClassAutoLoad.php';

$conn = new mysqli('localhost', 'root', 'Pesh', 'iap_a_aug25'); 
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Show success message after redirect
$message = '';
if (isset($_GET['success'])) {
    $message = '<div class="alert alert-success">User saved and message has been sent successfully!</div>';
}

if (isset($_POST['send'])) {
    $name = trim($_POST['username']);
    $email = trim($_POST['email']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = '<div class="alert alert-danger">Invalid email address!</div>';
    } else {
        // Send welcome email
        $mailer = new SendMail();
        $verificationLink = "http://localhost/iap_a_aug25/verify.php?token=12345";
        $result = $mailer->send($name, $email, $verificationLink);

        // Save user in the database
        $stmt = $conn->prepare("INSERT INTO users (username, email) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $email);
        $stmt->execute();
        $stmt->close();

        // Redirect to prevent form resubmission on refresh
        header("Location: " . $_SERVER['PHP_SELF'] . "?success=1");
        exit();
    }
}

$users_result = $conn->query("SELECT * FROM users ORDER BY id ASC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Send Welcome Email</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="row gx-4">
        <!-- Left Column: Form -->
        <div class="col-md-6">
            <div class="card p-4 shadow">
                <h3 class="text-center mb-3">Send Welcome Email</h3>
                <?php if(!empty($message)) echo $message; ?>
                <form method="post">
                    <div class="mb-3">
                        <label class="form-label">Your Name</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Your Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <button type="submit" name="send" class="btn btn-primary w-100">Send Welcome Email</button>
                </form>
            </div>
        </div>

        <!-- Right Column: Registered Users -->
        <div class="col-md-6">
            <div class="card p-4 shadow">
                <h4 class="mb-3">Registered Users</h4>
                <ol>
                    <?php while ($row = $users_result->fetch_assoc()): ?>
                        <li><?= htmlspecialchars($row['username']) ?> — <?= htmlspecialchars($row['email']) ?></li>
                    <?php endwhile; ?>
                </ol>
            </div>
        </div>
    </div>
</div>
<script>
    // Remove ?success=1 from URL after page load
    if (window.location.search.includes('success=1')) {
        const url = window.location.href.split('?')[0];
        window.history.replaceState({}, document.title, url);
    }
</script>
</body>
</html>
