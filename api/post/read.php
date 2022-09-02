<?php
include_once '../../config/Database.php';
include_once '../../models/Get.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate the get class
$get = new Get($db);

// Getting the result of the query
$result = $get->read();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet"  href="styles.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Showing Employee Information</title>
</head>
<body>
<table align = "center" border = "1px" style = "width:600px; line-height:40px;">
<tr>
<th> ID </th>
<th>Name</th>
<th>Salary</th>
<th>Joining</th>
</t>
<?php
while($rows = $result->fetch(PDO::FETCH_ASSOC)){
    $class_value = '';
    $curr = date('Y-M-d');
    $diff = abs(strtotime($curr) - strtotime($rows['joining']));
    //Checking if their joining was more than 5 years ago
    if(floor($diff/(365*60*60*24)) > 5)
    $class_value = 'urgent';
     ?>
<tr class = "<?php echo $class_value; ?>">
    <td><?php echo $rows['id']; ?></td>
    <td><?php echo $rows['name']; ?></td>
    <td><?php echo $rows['salary']; ?></td>
    <td><?php echo $rows['joining']; ?></td>
</tr>
<?php
} ?>

</table>

</body>
</html>
