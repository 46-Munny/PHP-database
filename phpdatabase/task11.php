<?php
$db_host="localhost";
$db_username="root";
$db_passward="";
$db_name="registration";

$con=mysqli_connect($db_host,$db_username,$db_passward,$db_name);
if($con)
{
  echo "Connected successfully <br />";
}
else {
   die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>
  <body>
    <?php
    if(isset($_POST['submit']))
    {
      $name=$_POST['name'];
      $gen=$_POST['gender'];
      $pass=$_POST['pass'];
      $email=$_POST['email'];
      $phn=$_POST['phn'];
      $phnNo=$_POST['phnNo'];
      $p=$phn.$phnNo;


    $sql= "insert into reg (name,gender,password,email,phn) values('$name','$gen','$pass','$email','$p')";
    if(mysqli_query($con,$sql))
    {
      echo"New record inserted";
    }
    else {
      echo"New record insert failed";
    }

}

     ?>
  </body>
</html>
