<?php
$host = "localhost:3306";
$userName = "group4";
$password = "STUgroup4";
$dbName = "group4";
$conn = new mysqli($host, $userName, $password,$dbName);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
?>

<html>
 <head>
 </head>
 <body>
 <h1>Test php page</h1>
 
<?php
//Step2
$query = "SELECT * FROM Users";
mysqli_query($db, $query) or die('Error querying database.');
?>

</body>
</html>