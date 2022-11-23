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
$sql="select * from account where acc_no=?";
$result=mysqli_prepare($con,$sql);
mysqli_stmt_bind_param($result,'s',$acc_no);
$acc_no='123';
mysqli_stmt_bind_result($result,$acc_no,$branch,$balance);
mysqli_stmt_execute($result);
mysqli_stmt_fetch($result);
echo $acc_no." ".$branch." ".$balance."<br />";

/*while(mysqli_stmt_fetch($result))
{
  echo $acc_no." ".$branch." ".$balance."<br />";
}*/


 ?>
