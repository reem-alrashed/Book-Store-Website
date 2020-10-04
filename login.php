<?php
    session_start();
    $host = "localhost"; /* Host name */
    $user = "root"; /* User */
    $password = ""; /* Password */
    $dbname = "BookStore"; /* Database name */

    $con = new mysqli($host, $user, $password,$dbname);
    // Check connection
    if (!$con) {
        die("Connection failed: " . connect_error);
    }
    $username=$_POST["username"];
    $password=$_POST["password"];
    $usertype=$_POST["usertype"];
    $logged_in=false;
    $sql="SELECT * FROM User WHERE username='$username' and
    password='$password' and usertype='$usertype'";
    $result=$con->query($sql);
    if($result->num_rows==1){
      $row=$result->fetch_assoc();
            $logged_in=true;
            if($row['usertype']=="Admin"){
              	$_SESSION['id']=$row['userid'];
            header("location:Admin/admin.php");
          }
            else if($row['usertype']=="Customer"){
            	$_SESSION['id']=$row['userid'];
                 header("location:Customer/customer.php");
               }
        }
    if(!$logged_in){
            echo 'Wrong information';
    }

  ?>
