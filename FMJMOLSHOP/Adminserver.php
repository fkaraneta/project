<?php
  session_start();  
//initialize variables
$name= "";
$code= "";
$description= "";
$price= "";
$qty= "";
$category= "";
$id= 0;
$image="";
$name= "";
$type = "";
$lastname ="";
$contact = "";
$username = "";
$email ="";
$password = "";
$dname = "";
$address = "";
$date = "";
$edit_state = false;

//connect to database
$db = mysqli_connect('localhost','root','','fmjm') or ("Could not connect database");

// if save button is clicked
 if (isset($_POST['upload'])) {
    // Get image name
    $image = $_FILES['image']['name'];
    // Get text
    $dname= $record['dname'];
    $name = $_POST['name'];
    $code = $_POST['code'];
    $dname = $_POST['dname'];
    $description = mysqli_real_escape_string($db, $_POST['description']);
    $price = $_POST['price'];
    $qty = $_POST['qty'];
    $category = $_POST['category'];
    $target = "product-images/".basename($image);

    $sql = "INSERT INTO product (image,productname,dname,code,prod_description,prod_price,prod_qty,category) VALUES ('$image','$name','$dname','$code','$description','$price','$qty','$category')";
      
    $quer=mysqli_query($db, $sql);
    // execute query
   if(move_uploaded_file($_FILES['image']['tmp_name'], "product-images/$image")){

       echo "<script>alert('You have successfully login!');</script>";
       
   }else{
        echo "<script>alert('Product does notsave!');</script>";
   }
    header('location: AdminAdd.php');//redirect to index page after inserting
    }

	//update records
    if(isset($_POST['update'])) {
       $image = $_FILES['image']['name'];
       $dname= $record['dname'];
      $name = $_POST['name'];
     $code = $_POST['code'];
      $description = mysqli_real_escape_string($db, $_POST['description']);
      $price = $_POST['price'];
      $qty = $_POST['qty'];
      $category = $_POST['category'];
      $id = $_POST['id'];

      $username = $_GET['username']; 
      $type= $_GET['type'];
	  $target = "product-images/".basename($image);
	  if(mysqli_query($db, "UPDATE product SET image='$image',productname='$name',dname='$dname', code='$code', prod_description='$description', prod_price='$price', prod_qty='$qty', category ='$category' WHERE productid=$id")){
    echo '<script type="text/javascript">alert("Product update!"");</script>';

  }
      header('location: Product.php');  //redirect to index page after updating

}
//delete records (DELETE/REMOVE)
    if(isset($_GET['del'])) {
      $id = $_GET['del'];
      $username = $_GET['username'];
      $type = $_GET['type'];
      if(mysqli_query($db, "DELETE FROM product WHERE productid=$id")){
        echo "<script>alert('Product deleted');</script>";
      }
      echo"username=$username&type=$type";
      header('location: Product.php');  //redirect to index page after deleting
	  
	}
  if(isset($_POST['updateA'])) {
     $name= mysqli_real_escape_string($db, $_POST['name']);
     $type = mysqli_real_escape_string($db, $_POST['type']);
     $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
     $contact = mysqli_real_escape_string($db, $_POST['contact']);
     $username = mysqli_real_escape_string($db, $_POST['username']);
     $email = mysqli_real_escape_string($db, $_POST['email']);
     $id = $_POST['id'];
    $sql= "UPDATE account_user SET Name='$name',type='$type',Lastname='$lastname',contact='$contact',username='$username',email='$email' WHERE Custmerid=$id";
    $result = mysqli_query($db, $sql);

    if($result){
    echo "<script>alert('User update!');</script>";
    }
      header('location: Account.php');  //redirect to index page after updating
}
//delete records (DELETE/REMOVE)
    if(isset($_GET['delA'])) {
      $id = $_GET['delA'];

      mysqli_query($db, "DELETE FROM account_user WHERE Custmerid=$id");

    echo "<script>alert('User update!');</script>";

      header('location: Account.php');  //redirect to index page after deleting
    
  }
 
     $resultss = mysqli_query($db, "SELECT * FROM account_user");
 
     $results = mysqli_query($db, "SELECT * FROM product");
     $resultsT = mysqli_query($db, "SELECT * FROM transaction");

 ?>


