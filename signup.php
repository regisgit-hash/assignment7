<!-- sign_up.php -->
<?php
$error = "";

if(isset($_POST['register'])){
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm = trim($_POST['confirm']);

    // Validation
    if(empty($username) || empty($email) || empty($password) || empty($confirm)){
        $error = "All fields are required!";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error = "Invalid email format!";
    } elseif(strlen($password) < 6){
        $error = "Password must be at least 6 characters!";
    } elseif($password !== $confirm){
        $error = "Passwords do not match!";
    } else {
        // Save user to file (simple simulation)
        $data = $username . "|" . $email . "|" . $password . "\n";
        file_put_contents("users.txt", $data, FILE_APPEND);

        header("Location: sign_in.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <style>
        body { background:#111; color:#fff; font-family:Arial; display:flex; 
               justify-content:center; align-items:center; height:100vh; }
        .box { width:350px; background:#1b1b1b; padding:25px; border-radius:10px; }
        input { width:100%; padding:10px; margin:8px 0; border-radius:6px; 
                border:none; background:#333; color:white; }
        button { width:100%; padding:10px; background:#ff0050; color:white; 
                 border:none; border-radius:6px; cursor:pointer; }
        button:hover { opacity:0.8; }
        .error { background:#ff4444; padding:8px; margin-bottom:10px; border-radius:5px; }
        a { color:#ff0050; }
    </style>
</head>
<body>

<div class="box">
    <h2>Create Account</h2>

    <?php if($error) echo "<div class='error'>$error</div>"; ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Username">
        <input type="text" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <input type="password" name="confirm" placeholder="Confirm Password">
        <button type="submit" name="register">Sign Up</button>
    </form>

    <p>Already have an account? <a href="sign_in.php">Sign In</a></p>
</div>

</body>
</html>
