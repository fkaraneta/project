<?php include('Adminserver.php');
//fetch the record to be updated
 if(isset($_GET['edit'])){
 	$id = $_GET['edit'];
	 $edit_state = true;
 	$rec = mysqli_query($db, "SELECT * FROM account_user WHERE Custmerid=$id");
 	$record= mysqli_fetch_array($rec);
 	$name= $record['Name'];
 	$type = $record['type'];
 	$lastname = $record['Lastname'];
  	$contact = $record['contact'];
  	$username = $record['username'];
  	$email = $record['email'];
  	$password = $record['pwd'];
 	$id = $record['Custmerid'];
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
<a href="Product.php" class="active">Manage Product</a>
<a href="Account.php" class="active"> Manage Account</a>
  <a href="transaction.php" class="activea">Transaction History</a>
</div>
</div>
 <div class="table-boxss">
<table class="Psizes">
   	 <thead>
   	 	<tr>
        <th>TransactionID</th>
        <th>CustomerName</th>
        <th>Product</th>
        <th>ProductName</th>
        <th>Code</th>
        <th>QTY</th>
        <th>Price</th>
        <th>DeliveryAddress</th>
        <th>Date_Purchased</th>
   	 	</tr>
   	 </thead>
   <tbody class="display">
<?php while ($row = mysqli_fetch_array($resultsT)) { ?>
          <tr>
            <td><?php echo  $row['transactionID']; ?> </td>
         <td><?php echo  $row['Customername']; ?> </td>
        <td><?php echo "<img src='product-images/".$row['img_product']."' class='imgs'>";?> </td>
        <td><?php echo $row['ProductName']; ?> </td>
        <td><?php echo $row['Code']; ?> </td>
        <td><?php echo $row['QTY']; ?> </td>
        <td><?php echo $row['Price']; ?> </td>
        <td><?php echo $row['Delivery_Address']; ?> </td>
        <td><?php echo $row['Date_Purchased']; ?> </td>

</tr>
<?php } ?>

</tbody>
  </table>
</div>
</body>
</html>
