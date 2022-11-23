<?php
$db_host="localhost";
$db_username="root";
$db_passward="";
$db_name="bank";

$con=mysqli_connect($db_host,$db_username,$db_passward,$db_name);
if($con)
{
  echo "Connected successfully <br />";
}
else {
   die("Connection failed: " . mysqli_connect_error());
}

$sql= "insert into account (acc_no,branch_name,balance) values('1234','Mirpur','20000')";
if(mysqli_query($con,$sql))
{
  echo"New record inserted";
}
else {
  echo"New record insert failed";
}


 ?>
