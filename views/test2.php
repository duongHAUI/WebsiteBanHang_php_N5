<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
    $q = intval($_GET['q']);

    include_once("db/connectdb.php");

    $sql="SELECT * FROM admins WHERE admin_id = '".$q."'";
    $result = mysqli_query($con,$sql);

    echo "<table>
    <tr>
    <th>Firstname</th>
    <th>Lastname</th>
    <th>Age</th>
    <th>Hometown</th>
    <th>Job</th>
    </tr>";
    while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['admin_name'] . "</td>";
    echo "<td>" . $row['admin_email'] . "</td>";
    echo "<td>" . $row['admin_password'] . "</td>";
    echo "<td>" . $row['admin_image'] . "</td>";
    echo "<td>" . $row['admin_about'] . "</td>";
    echo "</tr>";
    }
    echo "</table>";
    mysqli_close($con);
?>
</body>
</html>