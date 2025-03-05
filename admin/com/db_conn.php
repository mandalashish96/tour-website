<?php
$conn=mysqli_connect("localhost","root","","desh");
if(mysqli_connect_error())
{
  echo"<script>alert('cannot connect to the database')</script>";
  exit();
}

function filteration($data){
  foreach($data as $key => $value){
    $data[$key]=trim($value);
    $data[$key]=stripcslashes($value);
    $data[$key]=htmlspecialchars($value);
    $data[$key]=strip_tags($value);
  }
  return $data;
}

function select($sql,$values,$datatypes)
{
  $conn = $GLOBALS['conn'];
  if($stmt = mysqli_prepare($conn,$sql))
  {
    mysqli_stmt_bind_param($stmt,$datatypes,...$values);
    if(mysqli_stmt_execute($stmt)){
      $res = mysqli_stmt_get_result($stmt);
      mysqli_stmt_close($stmt);
      return $res;
    }
    else{
      mysqli_stmt_close($stmt);
      die("query cannot be excuted-select");
    }
  }
  else{
    die("query canot be prepared-select");
  }
}

function update($sql,$values,$datatypes)
{
  $conn = $GLOBALS['conn'];
  if($stmt = mysqli_prepare($conn,$sql))
  {
    mysqli_stmt_bind_param($stmt,$datatypes,...$values);
    if(mysqli_stmt_execute($stmt)){
      $res = mysqli_stmt_affected_rows($stmt);
      mysqli_stmt_close($stmt);
      return $res;
    }
    else{
      mysqli_stmt_close($stmt);
      die("query cannot be excuted-update");
    }
  }
  else{
    die("query canot be prepared-update");
  }
}


?>