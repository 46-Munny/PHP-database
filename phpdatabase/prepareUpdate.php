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
$sql="update account set acc_no=?,branch_name=?,balance=?
where acc_no=?";
$result=mysqli_prepare($con,$sql);
mysqli_stmt_bind_param($result,'ssss',$acc_no,$branch,$balance,$ano);
$acc_no='122';
$branch='dinajpur';
$balance='33000';
$ano='111';
mysqli_stmt_execute($result);

echo mysqli_stmt_affected_rows($result)."row updated";

/*while(mysqli_stmt_fetch($result))
{
  echo $acc_no." ".$branch." ".$balance."<br />";
}*/


 ?>
