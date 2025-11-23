<?php
include('conn.php');

$id = $_GET['u_id'];
echo $id;
$result = mysqli_query($conn, "SELECT * FROM user WHERE u_id=$id");
$data = mysqli_fetch_assoc($result);

$message = "";

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $tel = $_POST['telephone'];
    $job = $_POST['Job'];

    if(empty($name) || empty($price)){
        $message = "All fields required!";
    } else {
        mysqli_query($conn, "UPDATE user SET name='$name',telephone='$tel',Job='$job' WHERE id=$id");
        $message = "Updated successfully!";
    }
}
?>

<!DOCTYPE html>
<html>
<body>

<h2>Edit Product</h2>
<p style="color:red;"><?= $message ?></p>

<form method="POST">
    Name:<br>
    <input type="text" name="name" value="<?= $data['name'] ?>"><br><br>

    Telephone:<br>
    <input type="number" name="tel" ><br><br> value="<?= $data['telephone'] ?>"><br><br>
     Job:<br>
    <input type="text" name="job" value="<?= $data['Job'] ?>"><br><br>
    <button type="submit" name="update">Update</button>
</form>

</body>
</html>
