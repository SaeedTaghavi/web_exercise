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

$con = mysqli_connect('localhost','root','@dmin12345#','test_db');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"test_db");
// echo "$q  <br>";

$sql="SELECT * FROM users WHERE id = '".$q."'";
if ($q=="0")
{
    $sql="SELECT * FROM users ";
}

$result = mysqli_query($con,$sql);

echo "<table>

<tr>
<th>id</th>
<th>name</th>

</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    // echo "<td>" . $row['lastname'] . "</td>";
    // echo "<td>" . $row['Age'] . "</td>";
    // echo "<td>" . $row['Hometown'] . "</td>";
    // echo "<td>" . $row['Job'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>