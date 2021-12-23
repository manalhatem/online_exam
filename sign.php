<?php
include_once ('dbConnection.php');
ob_start();
$name=$_POST['name'];
$name=ucwords(strtolower($name));
$gender=$_POST['gender'];
$email = $_POST['email'];
$college = $_POST['college'];
$mob = $_POST['mob'];
$password = $_POST['password'];//password nour 123
$name=stripslashes($name);
$name=addslashes($name);
$name=ucwords(strtolower($name));
$gender = stripslashes($gender);
$gender = addslashes($gender);
$email = stripslashes($email);
$email = addslashes($email);
$college = stripslashes($college);
$college = addslashes($college);
$mob = stripslashes($mob);
$mob = addslashes($mob);
$password = stripslashes($password);
$password = addslashes($password);
$password = md5($password);
 
$sql="INSERT INTO user VALUES ('$name','$gender','$college','$email','$mob','$password')";
$query=mysqli_query($con,$sql);

if($query){
    $_SESSION['email']=$email;
    $_SESSION['name']=$name;
    header('location: account.php?q=1');

}
else{
    header('location: index.php?q7=Email Already Registered !!!!');
}
ob_end_flush();
?>