<?php include("customernav.html");include('session.php');
 ?>
<html>
<head>
<title>Book Store</title>
<link href="../css/tablestyle.css" rel="stylesheet">
<style>
body{
text-align:center;
}

</style>
</head>
<body>
  <br/><br/>
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
$sql="select * from Sales left join Customer on Sales.userid=Customer.userid where Customer.userid='".$_SESSION['id']."' ";
$result=$con->query($sql);
if($result->num_rows>0){
  echo "<h1> Sales history</h1>";
  echo "<tr><th> Userid</th>
  <th>Cutomer name </th> <th>Address</th><th>Phone number</th><th>Sale Id</th> <th>Sale Date</th><th>Total price</th> </tr>";
    while($row=$result->fetch_assoc()){
        echo "<tr>";
        echo "<td>".$row['userid']."</td>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['address']."</td>";
        echo "<td>".$row['number']."</td>";
        echo "<td>".$row['saleid']."</td>";
        echo "<td>".$row['saledate']."</td>";
        echo "<td>".$row['totalprice']."</td>";
         echo "</tr>";
}}
else {
echo "<br/><br/>";
echo "No sales history!";
}
echo "<br/><br/>";
echo "</table>";
?>
