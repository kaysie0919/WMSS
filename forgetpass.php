<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Passs</title>
    <script type="application/x-javascript"> 
    addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); 
    function hideURLbar(){ window.scrollTo(0,1); } 


</script>
</head>
<body>
    
<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format!";
        exit;
    }

  
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $token = bin2hex(random_bytes(50)); // Generate reset token
        $stmt = $conn->prepare("UPDATE users SET reset_token=?, reset_expiry=DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE email=?");
        $stmt->bind_param("ss", $token, $email);
        $stmt->execute();

        $resetLink = "reset-password.php?token=$token";
        mail($email, "Password Reset", "Click here to reset: $resetLink");

        echo "Reset link sent to your email!";
    } else {
        echo "Email not found!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Forgot Password</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="text-center">
    <form method="POST" class="form-signin">
        <h2>Forgot Password</h2>
        <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
        <br>
        <button class="btn btn-primary btn-block" type="submit">Send Reset Link</button>
        <br>
        <a href="login.php">Back to Login</a>
    </form>
</body>
</html>
