

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
      if(isset($_REQUEST["edit"]))

      {
        echo' <form class="" action="update form.php" method="post">
           Account no:<input type="text" name="acc" value='.$_REQUEST["acc_no"].'><br /><br />
           Branch Name:<input type="text" name="bname" value='.$_REQUEST["branch_name"].'><br /><br />
           Balance:<input type="text" name="balance" value='.$_REQUEST["balance"].'><br /><br />
           <input type="hidden" name="ano" value='.$_REQUEST["acc_no"].'>
           <input type="submit" name="submit" value="update">
         </form>';
      }
      else {

        echo' <form class="" action="update form.php" method="post">
           Account no:<input type="text" name="acc" value=""><br /><br />
           Branch Name:<input type="text" name="bname" value=""><br /><br />
           Balance:<input type="text" name="balance" value=""><br /><br />
           <input type="submit" name="submit" value="update">
         </form>';

         if(isset($_REQUEST["submit"]))
         {
           $acc=$_REQUEST['acc'];
           $bname=$_REQUEST['bname'];
           $balance=$_REQUEST['balance'];
           if($acc==""||$bname==""||$balance=="")
           {
             echo "Fill up the form";
           }
           else {
             $sql1="update account set acc_no='$acc',branch_name='$bname',balance='$balance'
             where acc_no={$_REQUEST['ano']}";

             if(mysqli_query($con,$sql1))
             {
               echo"updated successfully";
             }
             else {
               echo"updated failed";
             }
           }
         }


       }
       $sql= "select * from account";
       $result=mysqli_query($con,$sql);
       $n=mysqli_num_rows($result);
       //echo $n;


       if($n>0)
       {
        echo '<table border="2px" class="table">';

        echo "<thead>";
        echo "<tr>";

        echo"<th>acc_no </th>";
        echo"<th>branch_name </th>";
        echo"<th>balance </th>";
        echo"<th>Action</th>";

        "</tr>";
        echo  "</thead>";



         while($array=mysqli_fetch_assoc($result))
         {
           echo"<tr>";
           echo"<td>".$array["acc_no"]."</td>";
           echo"<td>".$array["branch_name"]."</td>";
           echo"<td>".$array["balance"]."</td>";
           echo'<td>
           <form action="update form.php" method="post">
           <input type="hidden" name="acc_no" value='.$array["acc_no"].'>
           <input type="hidden" name="branch_name" value='.$array["branch_name"].'>
           <input type="hidden" name="balance" value='.$array["balance"].'>
           <input type="submit" name="edit" value="Edit">
           </form>
           </td>';
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


 ?>
