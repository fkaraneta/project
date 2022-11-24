<?php
  session_start();  
//initialize variables
  $Name="";
  $Lastname ="";
  $contact = "";
    $username = "";
    $email = "";
    $password = "";
  $Custmerid = "";
$edit_state = false;

//connect to database
$db = mysqli_connect('localhost','root','','fmjm') or ("Could not connect database");

 if(isset($_POST['update'])) {
        $Name = $_POST['name'];
        $Lastname = $_POST['lastname'];
        $contact =  $_POST['contact'];
        $username = $_POST['username'];
       $email = $_POST['email'];
        $password = $_POST['pwd'];
        $Custmerid = $_POST['Custmerid'];

    if(mysqli_query($db, "UPDATE account_user SET Name='$Name',Lastname='$Lastname',contact='$contact', username='$username', email='$email', pwd='$password' WHERE Custmerid=$Custmerid")){
    echo "<script>alert('Product update!');</script>";

  }
      header('location: Home.php');  //redirect to index page after updating

}

     $results = mysqli_query($db, "SELECT * FROM account_user");
     $resultsa = mysqli_query($db, "SELECT * FROM transaction");


 ?>


