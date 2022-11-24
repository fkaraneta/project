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
<a href="Account.php" class="activea"> Manage Account</a>
  <a href="transaction.php" class="active">Transaction History</a>
</div>
</div>
 <div class="table-boxs">
<table class="Psizes">
   	 <thead>
   	 	<tr>
        <th>UserID</th>
          <th>Type</th>
   	 		<th>Name</th>
        <th>Lastname</th>
        <th>Contact</th>
        <th>Username</th>
        <th>Email</th>
   	 		<th colspan="2">Action</th>
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
<td>
		<a class="del_btn" href="Account.php?delA=<?php echo $row['Custmerid']; ?> " onclick="return  confirm('Do you want to delete Y/N')">Delete</a>
</td>
</tr>
<?php } ?>

</tbody>
  </table>
</div>
</body>
</html>
