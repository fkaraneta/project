<?php include('Adminserver.php');
//fetch the record to be updated
 if(isset($_GET['edit'])){
  $id = $_GET['edit'];
   $edit_state = true;
    
  $rec = mysqli_query($db, "SELECT * FROM product WHERE productid=$id");
  $record= mysqli_fetch_array($rec);
  $name= $record['productname'];
  $dname= $record['dname'];
  $code = $record['code'];
  $description = $record['prod_description'];
  $price = $record['prod_price'];
  $qty = $record['prod_qty'];
  $category = $record['category'];
  $id = $record['productid'];
 }
 ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/adminstyle.css">
</head>
<body>

<div class="adminheader">
<div class="title"><i class="fa fa-dashboard">Dashboard</i><div class="dropdown">
  <img src="iconuser.png" class="avatar">
  <div class="dropdown-content">
    <a href="Index.php" class="log">Logout</a>
  </div>
</div>
  </div></div><div class="user">Hi, <?php echo $_SESSION['username']; ?></div>

<div class="vertical">
<div class="vertical-menu">
<a href="HomeAdmin.php" class="active">Home</a>
<a href="AdminAdd.php" class="activea">Add New Product</a>
<a href="Product.php" class="active">Manage Product</a>
<a href="Account.php" class="active"> Manage Account</a>
  <a href="transaction.php" class="active">Transaction History</a>
</div>
</div>
<div class="addN"><h1>Add New Product</h1></div>
 <div class="addc">
  <form method="post" action="Adminserver.php" enctype="multipart/form-data" name="fm">
      <input type="hidden" name="id" value=" <?php echo $id; ?> ">
    
    <div class="input-group">
     <input type="file" name="image"  value=" <?php echo $image; ?> " >
     </div>

     <div class="input-group">
       <label>Brand Name</label>  
     <input type="text" name="name" value=" <?php echo $dname; ?> " >
     </div>
     
     <div class="input-group">
       <label>Display Name</label>  
     <input type="text" name="dname" value=" <?php echo $name; ?> " >
     </div>
   
   <div class="input-group">
       <label>Code</label>
     <input type="text" name="code" value=" <?php echo $code; ?>" >
     </div>
   
     <div class="input-group">
       <label>Description</label>
      <textarea 
      name="description" 
      placeholder="Description......"
      class="descri"
      value=" <?php echo $description; ?>"></textarea>
     </div>

      <div class="input-group">
       <label>Price</label>
     <input type="text" name="price" value=" <?php echo $price; ?>" >
     </div>

      <div class="input-group">
       <label>Quantity</label>
     <input type="text" name="qty" value=" <?php echo $qty; ?>" >
     </div>

      <div class="input-group">
       <label>Category</label></td><td>
          <select name="category" value=" <?php echo $category; ?>">
          <option>Laptop & Desktop </option>
          <option>Components</option>
          <option>Peripherals</option>
        </select>
     </div>
   <div class="input-group">
       <button type='submit' name='upload' class='btn'>Save</button>
     </div>
  </form>
</div>
</body>
</html>
