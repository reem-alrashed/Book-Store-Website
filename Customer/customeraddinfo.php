<?php include("customernav.html"); ?>
<html><head><title>Book Store</title>
  <link href="../css/formstyle.css" rel="stylesheet">
  <style>
    body{text-align:center;  }
    </style></head>
<body>
<h1>Add Customer Info</h1>
<form name="CustomerInfo" method="POST" action="customeraddinfo.php">
  <fieldset><legend>Customer Information</legend>
Customer name: <input type="text" name="customer"><br/><br/>
Address: <input type="text" name="address"><br/><br/>
Phone number: <input type="text" name="phone"><br/><br/>
<input type="submit" value="Add Information"><br/><br/>
<input type="reset" value="reset Information"><br/><br/><br/><br/>
</fieldset></form><br/><br/></body></html>

<?php
include('session.php');
    $host = "localhost"; /* Host name */
    $user = "root"; /* User */
    $password = ""; /* Password */
    $dbname = "BookStore"; /* Database name */
    $con = new mysqli($host, $user, $password,$dbname);
    // Check connection
    if (!$con) {    die("Connection failed: " . connect_error);  }
    $sql="select * from Customer where userid='".$_SESSION['id']."'";
    $result=$con->query($sql);
    if($result->num_rows==1){
      header("location:a.html");
      }else{
    $userid=$_SESSION['id'];
    $name=$_POST["customer"];
    $address=$_POST["address"];
    $phone=$_POST["phone"];
    $usertype="Customer";
    $sql2="insert into Customer(userid,name,address,number)
    values('$userid','$name','$address','$phone')";
    if($con->query($sql2)===TRUE){ ?>
    <script type='text/javascript'>
   alert("Information are inserted successfuly");
   window.history.back();
    </script>
<?php  }
  else{?>
  <script type='text/javascript'>
  alert("Insertion have problem , try again");
  </script>
  <?php
  }
}
  $con->close();
  ?>
