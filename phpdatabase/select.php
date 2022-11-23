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

$sql= "select * from account";
$result=mysqli_query($con,$sql);
$n=mysqli_num_rows($result);
//echo $n;


if($n>0)
{
  while($array=mysqli_fetch_assoc($result))
  {
    echo $array["acc_no"]." ".$array["branch_name"]." ".$array["balance"]."<br />";
  }
}


 ?>
