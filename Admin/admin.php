<?php include("adminnav.html");
include('session.php'); ?>
<html>
<head>
  <title>Book Store</title>
  <style>
  body,h2,li{
    text-align: center;
  }
ul{
  list-style-position: inside;
  align-content: center; margin: 5;
border-style: outset;
  text-align: center;
  border-top-width: medium;
  border-bottom-width: medium;
}
tr:hover {background-color: #f5f5f5;}
a:link {
  text-decoration: none;
}
a:visited {
  text-decoration: none;
}
a:hover {
  text-decoration: underline;
}
a:active {
  text-decoration: underline;
}
  </style>
  </head>
  <body>
    <h1>Admin Page</h1>

    <h3> Welcome <?php
      $sql="select * from User where userid='".$_SESSION['id']."' ";
      $result=$con->query($sql);
      if($result->num_rows>0){
          while($row=$result->fetch_assoc()){
              echo $row['username'];
}}
    ?> </h3>
        <h2>Available Services for Admin:</h2>
      <table align='center' border="1" cellpadding="7" cellspacing="5">
    <tr>  <td> <a href="admin.php">Home </a> </td></tr>
      <tr>  <td> <a href="customerinfo.php">View Customer info </td></tr>
      <tr>  <td> <a href="addProductForm.php">Add Book </a> </td></tr>
      <tr>  <td> <a href="viewbookinfo.php">View Available Books </a> </td></tr>
     <tr>  <td> <a href="salesinfo.php">View Sales History </a> </td></tr>
      <tr>  <td>  <a href="../logout.php">Logout</a></td></tr>
    </table>
        </body>
<html>
