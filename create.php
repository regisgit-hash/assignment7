<?php
include("conn.php");

$message = "";

if(isset($_POST['save'])){
    $Name = $_POST['name'];
    $tel   = $_POST['tel'];
    $Job   = $_POST['job'];

    // Correct variable names (case-sensitive!)
    if(empty($Name) || empty($tel) || empty($Job)){
        $message = "All fields are required!";
    } else {

        // u_id removed because it is AUTO_INCREMENT
        $query = "INSERT INTO user(name, telephone, Job) 
                  VALUES('$Name', '$tel', '$Job')";

        if(mysqli_query($conn, $query)){
            $message = "User added successfully!";
        } else {
            // show actual MySQL error
            $message = "Error: " . mysqli_error($conn);
        }
    }
}
?>


<!DOCTYPE html>
<html>
<body>

<h2>Add participant</h2>
<p style="color:red;"><?= $message ?></p>

<form method="POST">
    Name:<br>
    <input type="text" name="name"><br><br>

    Telephone:<br>
    <input type="number" name="tel" ><br><br>

    Job:<br>
    <input type="text" name="job" ><br><br>

    <button type="submit" name="save">Save</button>
</form>

</body>
</html>
