<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="prepareInsertForm.php" method="post">
      Account no:<input type="text" name="acc" value=""><br /><br />
      Branch Name:<input type="text" name="bname" value=""><br /><br />
      Balance:<input type="text" name="balance" value=""><br /><br />
      <input type="submit" name="submit" value="submit">
    </form>
  </body>
</html>

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
if(isset($_REQUEST['submit']))
{
  $acc=$_REQUEST['acc'];
  $bname=$_REQUEST['bname'];
  $balance=$_REQUEST['balance'];
  if($acc==""||$bname==""||$balance=="")
  {
    echo "Fill up the form";
  }
  else {
    $sql= "insert into account (acc_no,branch_name,balance) values(?,?,?)";
    $result=mysqli_prepare($con,$sql);
    if($result)
    {
      mysqli_stmt_bind_param($result,'sss',$acc_no,$branch_name,$bal);
      $acc_no=$acc;
      $branch_name=$bname;
      $bal=$balance;
      mysqli_stmt_execute($result);
      echo mysqli_stmt_affected_rows($result)." row inserted<br />";
    }
    else {
      echo"New record insert failed";
    }
  }
}

$sql2= "select * from account";
$result=mysqli_prepare($con,$sql2);
mysqli_stmt_bind_result($result,$ano,$brname,$balance1);
mysqli_stmt_execute($result);
mysqli_stmt_store_result($result);
$n=mysqli_stmt_num_rows($result);
//echo $n;


if($n>0)
{
  while(mysqli_stmt_fetch($result))
  {
    echo $ano." ".$brname." ".$balance1."<br />";
  }
}
