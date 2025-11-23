<!-- sign_in.php -->
<?php
$error = "";

if(isset($_POST['login'])){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if(empty($username) || empty($password)){
        $error = "All fields required!";
    } else {
        $users = file("users.txt", FILE_IGNORE_NEW_LINES);

        $found = false;

        foreach($users as $u){
            list($uname, $email, $pass) = explode("|", $u);

            if(($username == $uname || $username == $email)){
                $found = true;

                if($password == $pass){
                    header("Location: crud.php"); 
                    exit();
                } else {
                    $error = "Wrong password!";
                }
            }
        }

        if(!$found){
            $error = "Account not found!";
        }
    }
}

# GOOGLE LOGIN SIMULATION
if(isset($_GET['google'])){
    header("Location: crud.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign In</title>
    <style>
        body { background:#111; color:white; font-family:Arial; 
               display:flex; justify-content:center; align-items:center; height:100vh; }
        .box { width:350px; background:#1b1b1b; padding:25px; border-radius:10px; }
        input { width:100%; padding:10px; margin:8px 0; border-radius:6px; background:#333; border:none; color:white; }
        button { width:100%; padding:10px; background:#ff0050; color:white; border:none; border-radius:6px; cursor:pointer; }
        .google { background:white; color:black; margin-top:10px; }
        .error { background:#ff4444; padding:8px; border-radius:5px; margin-bottom:10px; }
        a { color:#ff0050; }
    </style>
</head>
<body>

<div class="box">
    <h2>Sign In</h2>

    <?php if($error) echo "<div class='error'>$error</div>"; ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Username or Email">
        <input type="password" name="password" placeholder="Password">
        <button name="login">Sign In</button>
    </form>

    <a href="sign_in.php?google=1">
        <button class="google">Login with Google</button>
    </a>

    <p>Don’t have an account? <a href="signup.php">Sign Up</a></p>
</div>

</body>
</html>
