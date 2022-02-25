<?php 
session_start();
$conn=mysqli_connect('localhost','root','','webster');

  echo "<script>window.open('login.php','_self');</script>";
  session_destroy();

?>