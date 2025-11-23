<?php
include("conn.php");
$id = $_GET['u_id'];

mysqli_query($conn, "DELETE FROM user WHERE u_id=$id");

header("Location: index.php");
exit();
?>
