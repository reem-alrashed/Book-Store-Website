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

</style>
</head>
<body>
  <br/><br/>
<h1>View Available Books Info</h1>
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
$sql="select * from Book";
$result=$con->query($sql);
if($result->num_rows>0){
  echo "<tr><th> Name</th> <th>Id</th>
  <th>Price </th> <th>Picture</th> </tr>";
    while($row=$result->fetch_assoc()){
        echo "<tr>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['price']."</td>";?>
      	<td><img src="<?php echo $row['pic'];?>" height="150px" width="150px;"></td>
        <?php
         echo "</tr>";
}}
echo "<br/><br/>";
echo "</table>";
?>
