<?php
include('conn.php');
$result = mysqli_query($conn, "SELECT * FROM user");
?>

<!DOCTYPE html>
<html>
<body>

<h2>Product List</h2>

<a href="create.php">Add New participant</a>
<br><br>

<table border="1" cellpadding="10"> 
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>TELEPHONE</th>
        <th>JOB</th>
        <th>Actions</th>
    </tr>

    <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $row['u_id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['telephone'] ?></td>
            <td><?= $row['Job'] ?></td>
            <td>
                <a href="update.php?id=<?= $row['u_id'] ?>">Edit</a> |
                <a href="delete.php?id=<?= $row['u_id'] ?>">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>

</body>
</html>
