<?php
$servername = "localhost"; 
$username = "id19678285_root"; 
$password = "_P~47[z]\KoyCL57";
$db="id19678285_message";
$conn = new mysqli($servername,$username, $password,$db);
session_start();
$groupcount=0;
$groupc=0;
if(isset($_POST['create'])){
//$_SESSION["groupid"] = $_POST['cgroupid'];
$groupid=$_POST['cgroupid'];
$sql2="SELECT * FROM  messaging";
$res2=mysqli_query($conn,$sql2);


$count= mysqli_num_rows($res2);
if( $count > 0)
{
while($row=mysqli_fetch_assoc($res2))
{
   


 if(($row['group']==$groupid)){
     $groupcount++;
    


}
}
}
    if($groupcount>=1)
    {
echo '<script type="text/JavaScript">  

     alert("Name already taken! retry with other name"); 

     </script>';
    }
    

    else{
        setcookie("groupid", "$groupid", time()+86400*30);
//$_SESSION['groupid']=$groupid;
 header("Location: index.php");
    }
}


if(isset($_POST['join'])){
//$_SESSION["groupid"] = $_POST['cgroupid'];
$groupid=$_POST['jgroupid'];
$sql2="SELECT * FROM  messaging";
$res2=mysqli_query($conn,$sql2);


$count= mysqli_num_rows($res2);
if( $count > 0)
{
while($row=mysqli_fetch_assoc($res2))
{
   


 if(($row['group']==$groupid)){
     $groupcount++;
    


}
}
}
    if($groupcount<=0)
    {
echo '<script type="text/JavaScript">  

     alert("group not found! try again with correct name"); 

     </script>';
    }
    

    else{
//$_SESSION['groupid']=$groupid;
setcookie("groupid", "$groupid", time()+86400*30);
 header("Location: index.php");
    }
}



    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>create / join</title>
  <link rel="stylesheet" href="./style.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="login-page">
  <div class="form">
    <form class="register-form" method="post" action="">
      <input type="text" placeholder="Enter group id" name="cgroupid"/>
<?php

    ?>
      <button name="create">create</button>
      <p class="message">join a group <a href="#">Join</a></p>
    </form>
    <form class="login-form" method="post" action="">
      <input type="text" placeholder="Enter group id" name="jgroupid"/>
      <?php

?>
      <button name="join">Join</button>
      <p class="message">Not have group? <a href="#">Create a group</a></p>
    </form>
  </div>
</div>

<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./script.js"></script>

</body>
</html>
