<?php include("adminnav.html");include('session.php');
 ?>
<html>
<head>
<title>Book Store</title>
<link href="../css/tablestyle.css" rel="stylesheet">
<style>
body{
text-align:center;
}
table{
  text-align:center;
}
</style>
</head>
<body>
  <br/><br/>
<h1>View Customers Info</h1>
</body>
</html>
<?php
$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "BookStore"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
    die("Connection failed: " . connect_error);
}
echo "<table border='3'align='center'cellspacing='5' cellpadding='7''>";
$sql="select * from User left join Customer on Customer.userid=User.userid and  User.usertype='Customer'";
$result=$con->query($sql);
if($result->num_rows>0){
  echo "<tr><th>Customer Name</th> <th>Customer Address Type</th>
  <th>Customer Phone Number </th> <th>username</th> </tr>";
    while($row=$result->fetch_assoc()){
            if($row['usertype']=="Customer"){
        echo "<tr>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['address']."</td>";
        echo "<td>".$row['number']."</td>";
        echo "<td>".$row['username']."</td>";
         echo "</tr>";
}}}
echo "<br/><br/>";
echo "</table>";
?>
