<?php
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "fmjm";
//create connection
$dbcon = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database) or ("Could not connect database");

if(isset($_POST['submit'])){
    $fname = mysqli_real_escape_string($dbcon, $_POST['fname']); 
    $lname = mysqli_real_escape_string($dbcon, $_POST['lname']); 
    $contact = mysqli_real_escape_string($dbcon, $_POST['contact']); 
    $username = mysqli_real_escape_string($dbcon, $_POST['username']); 
    $email = mysqli_real_escape_string($dbcon, $_POST['email']); 
    $password = mysqli_real_escape_string($dbcon, $_POST['password']); 

    if(empty($fname) || empty($lname) || empty($username) || empty($email) || empty($password)){
        exit();
    }else{
        //check if input characters are valid
        if(!preg_match("/^[a-zA-Z]*$/", $fname) || !preg_match("/^[a-zA-Z]*$/", $lname)){
            header("refresh:1; url=register.php?addaccount=invalid");
            echo "<br>";
            echo "<script>alert('You enter an invalid characters');</script>";
            exit();
        } else{
            $sql = "SELECT * FROM account_user WHERE username = '$username'";
            $result = mysqli_query($dbcon, $sql);
            $resultCheck = mysqli_num_rows($result);

            if($resultCheck > 0){
                header("refresh:1; url=register.php?addaccount=UsernameTaken");
                echo "<br>";
               echo "<script>alert('User Taken.');</script>";
                exit();
            }else{
                //password hashing
         
                //insert user into the database
                $sql = "INSERT INTO account_user (Name, Lastname,contact, username, email, pwd) 
                VALUES ('$fname', '$lname','$contact','$username', '$email', '$password');";
                mysqli_query($dbcon, $sql);
                header("refresh:1; url=login.php?addaccount=success");
                echo "<br>";
                echo "<script>alert('New account successfully created!');</script>";
                exit();
            }
        }
    }

}else{
    header("Location:register.php");
    exit();
}
 $resultss = mysqli_query($db, "SELECT * FROM account_user")
?>
