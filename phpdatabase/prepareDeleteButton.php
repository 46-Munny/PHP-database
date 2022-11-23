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
$sql="select * from account";
$result=mysqli_prepare($con,$sql);
mysqli_stmt_bind_result($result,$acc_no,$branch,$balance);
mysqli_stmt_execute($result);
echo '<table border="2px">';
echo '<tr>';
echo'<th>acc_no</th>';
echo'<th>branch_name</th>';
echo'<th>balance</th>';
echo'<th>Action</th>';
echo'</tr>';
while(mysqli_stmt_fetch($result))
{

  echo'<tr>';
  echo '<td>'.$acc_no.'</td>';
  echo '<td>'.$branch.'</td>';
  echo '<td>'.$balance.'</td>';
  echo '<td>
  <form class="" action="prepareDeleteButton.php" method="post">
  <input type="hidden" name="ano" value='.$acc_no.'>
  <input type="submit" name="submit" value="Delete">
  </td>';
  echo'</tr>';

}

echo'</table>';

if(isset($_REQUEST['submit']))
{
  $sql2="delete from account where acc_no=?";
  $result2=mysqli_prepare($con,$sql2);
  mysqli_stmt_bind_param($result2,'s',$acc_no);
  $acc_no=$_REQUEST['ano'];
  mysqli_stmt_execute($result2);
}








 ?>
