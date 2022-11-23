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
 ?>
 <!doctype html>
 <html lang="en">
   <head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

     <title>table</title>
   </head>
   <body>

     <div class="container">
       <?php

       $sql="select * from account";
       $result=mysqli_prepare($con,$sql);
       mysqli_stmt_bind_result($result,$acc_no,$branch,$balance);
       mysqli_stmt_execute($result);
      mysqli_stmt_store_result($result);
      $n=mysqli_stmt_num_rows($result);

       if($n>0)
       {
        echo '<table border="2px" class="table">';

        echo "<thead>";
        echo "<tr>";

        echo"<th>acc_no </th>";
        echo"<th>branch_name </th>";
        echo"<th>balance </th>";

        "</tr>";
        echo  "</thead>";



         while(mysqli_stmt_fetch($result))
         {
           echo"<tr>";
           echo"<td>".$acc_no."</td>";
           echo"<td>".$branch."</td>";
           echo"<td>".$balance."</td>";



           "</tr>";

         }
         echo "</table>";
       }

        ?>
     </div>


     <!-- Optional JavaScript -->
     <!-- jQuery first, then Popper.js, then Bootstrap JS -->
     <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
   </body>
 </html>
