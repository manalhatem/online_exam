<?php
session_start();
if(isset($_SESSION['email'])){
    session_destroy();
}
include_once('dbConnection.php');
$ref=@$_GET['q'];
$email=$_POST['email'];
$password=$_POST['password'];
$email=stripslashes($email);
$email=addslashes($email);
$password=stripslashes($password);
$password=addslashes($password);
$password=md5($password);
$sql2="SELECT name FROM user WHERE email='$email' AND password='$password'";
$query2=mysqli_query($con,$sql2) or die('error');
$count=mysqli_num_rows($query2);
if($count==1){
    while($row=mysqli_fetch_array($query2)){
        $name=$row['name'];
    }
    $_SESSION['name']=$name;
    $_SESSION['email']=$email;
    header('location:account.php?q=1');

}
else{
    header("location:$ref?w=Wrong Username or Password");
}




?>