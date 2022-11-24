<?php
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "fmjm";

$connect = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database) or ("Could not connect database");

error_reporting(0);
session_start();
if (isset($_POST['Login'])) 
{
$username = $_POST['username'];
$pwd = $_POST['pwd'];
$pwd = mysqli_real_escape_string($connect, $pwd); 
    
  $sql= "select * from account_user where username = '$username' AND pwd = '$pwd'";

  $result = mysqli_query($connect,$sql);
  $resultCheck = mysqli_num_rows($result);


   if ($result) 
   {
    
    if($resultCheck){
       $_SESSION['username'] = $username ;
       $_SESSION['pwd'] = $password ;
       $_SESSION['Custmerid'] = $Custmerid ;
        while ($row = mysqli_fetch_array($result)) {

            $cust = $row['Custmerid'];
            $type = $row['type'];
            if ($pwd = $row['pwd'])
            {
                if($type == 1){
                    header("refresh:1; url=HomeAdmin.php?username=$username&type=$type&Custmerid=$cust"); 
                    echo "<br>";
                    echo "<br>";
                   echo "<script>alert('You have successfully login!');</script>";
                    exit(); 
                }else{
                    header("refresh:1; url=Home.php?username=$username&type=$type&Custmerid=$cust"); 
                    echo "<br>";
                    echo "<br>";
                   echo "<script>alert('You have successfully login!');</script>";
                    exit(); 
                }
            } else {
                header("refresh:1; url=login.php?nomatch"); 
                echo "<br>";
               echo "<script>alert('No match login');</script>";
            }
        }
      
    }
    else{
        header("refresh:1; url=login.php?incorrect"); 
        echo "<br>";
        echo "<script>alert('Incorrect login details');</script>";
    } 
  }

}
?>