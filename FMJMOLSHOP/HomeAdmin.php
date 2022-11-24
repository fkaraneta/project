<?php include('Adminserver.php');

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
<a href="HomeAdmin.php" class="activea">Home</a>
<a href="AdminAdd.php" class="active">Add New Product</a>
<a href="Product.php" class="active">Manage Product</a>
<a href="Account.php" class="active"> Manage Account</a>
<a href="transaction.php" class="active">Transaction History</a>
</div>
</div>
<div class="pl"><h2>Product List</h2></div>
  <div class="table-prod">

<table class="Psizea">

   	 <thead>
   	 	<tr>
        <th>ProductID</th>
   	 		<th>Image</th>
   	 		<th>ProductName</th>
        <th>Code</th>
        <th>Description</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Category</th>
   	 	</tr>
   	 </thead>
   <tbody class="display">
<?php while ($row = mysqli_fetch_array($results)) { ?>
   	 	    <tr>
         <td><?php echo  $row['productid']; ?> </td>
        <td><?php echo "<img src='product-images/".$row['image']."' class='imgs'>";?> </td>
   	 		<td><?php echo $row['productname']; ?> </td>
   	 		<td><?php echo $row['code']; ?> </td>
        <td><?php echo $row['prod_description']; ?> </td>
        <td><?php echo $row['prod_price']; ?> </td>
        <td><?php echo $row['prod_qty']; ?> </td>
        <td><?php echo $row['category']; ?> </td>
</tr>
<?php } ?>

</tbody>
  </table>
</div>
<div class="c"><h2>Customer List</h2></div>
 <div class="table-Home">
<table class="Psizess">
   	 <thead>
   	 	<tr>
        <th>UserID</th>
          <th>Type</th>
   	 		<th>Name</th>
        <th>Lastname</th>
        <th>Contact</th>
        <th>Username</th>
        <th>Email</th>
   	 	</tr>
   	 </thead>
   <tbody class="display">
<?php while ($row = mysqli_fetch_array($resultss)) { ?>
   	 	    <tr>
            <td><?php echo $row['Custmerid']; ?> </td>
            <td><?php echo $row['type']; ?> </td>
   	 		   <td><?php echo $row['Name']; ?> </td>
   	 		   <td><?php echo $row['Lastname']; ?> </td>
        	<td><?php echo $row['contact']; ?> </td>
        	<td><?php echo $row['username']; ?> </td>
        	<td><?php echo $row['email']; ?> </td>	 		

</tr>
<?php } ?>

</tbody>
  </table>
</div>
</body>
</html>
