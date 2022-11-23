<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="insert form.php" method="post">
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
    $sql= "insert into account (acc_no,branch_name,balance) values('$acc','$bname','$balance')";
    if(mysqli_query($con,$sql))
    {
      echo"New record inserted";
    }
    else {
      echo"New record insert failed";
    }
  }
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
