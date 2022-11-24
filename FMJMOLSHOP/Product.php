<?php include('Adminserver.php');
//fetch the record to be updated
 if(isset($_GET['edit'])){
 	$id = $_GET['edit'];
	 $edit_state = true;
 	$rec = mysqli_query($db, "SELECT * FROM product WHERE productid=$id");
 	$record= mysqli_fetch_array($rec);
 	$image = "product-images/".basename($image);
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
<a href="AdminAdd.php" class="active">Add New Product</a>
<a href="Product.php" class="activea">Manage Product</a>
<a href="Account.php" class="active"> Manage Account</a>
<a href="transaction.php" class="active">Transaction History</a>
</div>
</div>
<div class="p"><h1>Product List</h1></div>
  <div class="table-box">

<table class="Psize">

   	 <thead>
   	 	<tr>
        <th>ProductID</th>
   	 		<th>Image</th>
        <th>Brand</th>
   	 		<th>DisplayName</th>
        <th>Code</th>
        <th>Description</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Category</th>
   	 		<th colspan="2">Action</th>
   	 	</tr>
   	 </thead>
   <tbody class="display">
<?php while ($row = mysqli_fetch_array($results)) { ?>
   	 	    <tr>
         <td><?php echo  $row['productid']; ?> </td>
         <td><?php echo  $row['productname']; ?> </td>
        <td><?php echo "<img src='product-images/".$row['image']."' class='imgs'>";?> </td>
   	 		<td><?php echo $row['dname']; ?> </td>
   	 		<td><?php echo $row['code']; ?> </td>
        <td><?php echo $row['prod_description']; ?> </td>
        <td><?php echo $row['prod_price']; ?> </td>
        <td><?php echo $row['prod_qty']; ?> </td>
        <td><?php echo $row['category']; ?> </td>

   	 		
<td>
    <a class="edit_btn" href="Product.php?edit=<?php echo $row['productid']; ?>"  >Edit</a></td>

<td>
		<a class="del_btn" href="Product.php?del=<?php echo $row['productid']; ?> " onclick="return  confirm('Do you want to delete Y/N')">Delete</a>
</td>
</tr>
<?php } ?>

</tbody>
  </table>
</div>

  <div class="fm">
  <form method="post" action="Adminserver.php" enctype="multipart/form-data" name="fm">
      <input type="hidden" name="id" value=" <?php echo $id; ?> ">
    
      <table class="managep">
        <tr><td colspan = '2'>
     <input type="file" name="image" class="file" value=" <?php echo $image; ?> " >
      </td></tr>
      <tr><td>
       <label>Name</label></td><td>  
     <input type="text" name="name" value=" <?php echo $dname; ?> " >
      </td>
      <td>
       <label>Price</label></td><td>
       <input type="text" name="price" value=" <?php echo $price; ?>" >
      </td>
    </tr>
      <tr><td>
       <label>Code</label></td><td>
     <input type="text" name="code" value=" <?php echo $code; ?>" >
     </td>
     <td>
      <label>Quantity</label></td><td>
     <input type="text" name="qty" value=" <?php echo $qty; ?>" >
    </td>
   </tr>
    <tr><td>
       <label>Description</label></td><td>
      <textarea 
      name="description" 
      placeholder="Description......"
      class="descr"
      value=" <?php echo $description; ?>"></textarea>
     </td>
     <td>
         <label>Category</label></td><td>
          <select name="category" value=" <?php echo $category; ?>">
          <option>Laptop & Desktop</option>
          <option>Components</option>
          <option>Peripherals</option>
        </select>
     </td>
   </tr>
   <tr><td>
   <?php if($edit_state == false): ?>
   
       <button type="submit" name="update" class="btn">Update</button>
     <?php else: ?>
      <button type="submit" name="update" class="btn">Update</button>
     <?php endif ?>
     </td></tr></table>
  </form>
</div>
</body>
</html>
