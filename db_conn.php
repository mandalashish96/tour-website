<?php
$conn=mysqli_connect("localhost","root","","desh");
if(mysqli_connect_error())
{
  echo"<script>alert('cannot connect to the database')</script>";
  exit();
}


?>