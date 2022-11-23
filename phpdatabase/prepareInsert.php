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
$sql="insert into account values(?,?,?)";
$result=mysqli_prepare($con,$sql);
mysqli_stmt_bind_param($result,'sss',$acc_no,$branch,$balance);
$acc_no='223';
$branch='dinajpur';
$balance='33000';
mysqli_stmt_execute($result);

echo mysqli_stmt_affected_rows($result)."row inserted";

/*while(mysqli_stmt_fetch($result))
{
  echo $acc_no." ".$branch." ".$balance."<br />";
}*/


 ?>
