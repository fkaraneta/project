<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
	switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM product WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('dname'=>$productByCode[0]["dname"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'prod_price'=>$productByCode[0]["prod_price"], 'image'=>$productByCode[0]["image"]));
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-witdh, initial-scale=1.0">
	<meta charset="utf-8">
	<title>FMJM</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>		
<?php
		$mysql_hostname = "localhost";
		$mysql_user = "root";
		$mysql_password = "";
		$mysql_database = "fmjm";

		$connect = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password, $mysql_database) or ("Could not connect database");
		$Custmerid = $_GET['Custmerid'];
		$username = $_GET['username'];
		$sql = "SELECT * from account_user where account_user.Custmerid='$Custmerid'";
		$result = $connect->query($sql);
		$row=$result->fetch_assoc();

	?>
		<div class="header">
			<a class="contact"><i class="fa fa-phone"> (02)300-7498</i>&nbsp;&nbsp; <i class="fa fa-mobile-phone"> (+63) 938 448 3448</i></a>
				<div class="header-account">
					<div class="dropdown-profile">
			<a class="">Hi, <?php echo $_SESSION['username'];?><img src="iconuser.png" class="icon"></a>
			  <div class="dropdown-content-profile">
			  	<a href="UserProfile.php?username=<?php  echo $row['username']; ?>&Custmerid=<?php echo $row['Custmerid']; ?>&edit=<?php echo $row['Custmerid']; ?>"><p>My Account</p></a>
			  	<a href="Mypurchase.php?username=<?php  echo $row['username']; ?>&Custmerid=<?php echo $row['Custmerid']; ?>&edit=<?php echo $row['Custmerid']; ?>"><p>My Purchase</p></a>
			  	<a href="Index.php"><p>Logout</p></a>
			  </div>
			</div>	
		</div>
		</div>
		<form method="post" action="SearchProduct.php?username=<?php  echo $row['username']; ?>&Custmerid=<?php echo $row['Custmerid']; ?>&edit=<?php echo $row['Custmerid']; ?>">
		<div class="header-img">
			<a href ="Home.php?username=<?php  echo $row['username']; ?>&Custmerid=<?php echo $row['Custmerid']; ?>&edit=<?php echo $row['Custmerid']; ?>" class="contact"><img src='logo.png'></a>
			<div class="header-dropdown">
					<div class="dropdown">
				<a class ="txt" href="#home">LAPTOPS & DESKTOPS <i class="fa fa-caret-down"></i></a>
				<div class="dropdown-content">
					<div class="dropdown-laptop">
					 <a href="#" class="gaming">Gaming Laptop <i class="fa fa-caret-down"></i></a>
					 <div class="dropdown-content-laptop">
					 	<button name="search" class="textcontent"  value="Asus"> Asus</button>
					 		<button name="search" class="textcontent"  value="MSI">MSI</button>
					 </div></div>
						<div class="dropdown-desktop">
 					 <a href="#" class="gaming">Gaming Desktop <i class="fa fa-caret-down"></i></a>
 					 <div class="dropdown-content-desktop">
					 	<button name="search" class="textcontent"  value="Intel">Intel</button>
					 	<button name="search" class="textcontent"  value="AMD">AMD</button>
					 </div></div>
 			 	</div>
			</div>
			<div class="dropdown">
			<a href="#">COMPONENTS <i class="fa fa-caret-down"></i></a>
			<div class="dropdown-content">
				<div class="intelamd">
					<div>
  			<button name="search" class="textcontent" value="RAM">RAM</button></div>
  			<div>
			<button name="search" class="textcontent" value="STORAGE">STORAGE</button></div>
			</div>
			</div>
			</div>
			<div class="dropdown">
			<a href="#">PERIPHERALS <i class="fa fa-caret-down"></i></a>
			<div class="dropdown-content">
  			<p><button name="search" class="textcontent"  value="Gaming Headset">Gaming Headset</button></p>
  			<p><button name="search" class="textcontent"  value="Gaming Chairs">Gaming Chairs</button></p>
  			<p><button name="search" class="textcontent" value="Gaming Keyboard">Gaming Keyboard</button></p>
  			</div>
			</div>
			</div>
			</form>
		</div>
		</div>
		<div class="header-search">
			<form method="post" action="SearchProduct.php?username=<?php  echo $row['username']; ?>&Custmerid=<?php echo $row['Custmerid']; ?>&edit=<?php echo $row['Custmerid']; ?>"><input type="text" name="search" placeholder="Search..."><button class='btnsearch'><i class='fa fa-search'></i></button>
				<div class="dropdown-cart">
				<a class="cart" href="Payment.php?username=<?php  echo $row['username']; ?>&Custmerid=<?php echo $row['Custmerid']; ?>&edit=<?php echo $row['Custmerid']; ?>"><i class="fa fa-shopping-basket"></i></a>
				<div class="dropdown-content-cart">
			</div>
		</div>
		</div>
		</form>
		<div id="shopping-cart">
<div class="txt-heading">Shopping Cart</div>

<a id="btnEmpty" href="Payment.php?username=<?php  echo $row['username']; ?>&Custmerid=<?php echo $row['Custmerid']; ?>&edit=<?php echo $row['Custmerid']; ?>&action=empty">Empty Cart</a>
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Name</th>
<th style="text-align:left;">Code</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:center;" width="5%">Remove</th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["prod_price"];
		?>
				<tr>
				<td><?php echo "<img src='product-images/".$item['image']." 'class='mycart' >";?></td><td><?php echo $item["dname"]; ?></td>
				<td><?php echo $item["code"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "₱ ".number_format($item["prod_price"],2); ?></td>
				<td  style="text-align:right;"><?php echo "₱ ". number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="Payment.php?username=<?php  echo $row['username']; ?>&Custmerid=<?php echo $row['Custmerid']; ?>&edit=<?php echo $row['Custmerid']; ?>&action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><i class="fa fa-trash-o"></a></i></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["prod_price"]*$item["quantity"]);
		}
		?>
<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
<td></td>
<td></td>
</tr>
</tbody>

</table>
<br>
<a href="checkout.php?username=<?php  echo $row['username']; ?>&Custmerid=<?php echo $row['Custmerid']; ?>&edit=<?php echo $row['Custmerid']; ?>"><button class="btncheck">Proceed to Check out</button></a>
<a href="Home.php?username=<?php  echo $row['username']; ?>&Custmerid=<?php echo $row['Custmerid']; ?>&edit=<?php echo $row['Custmerid']; ?>"><button class="continue">Continue Shopping</button></a>
  <?php
} else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php 
}
?>
</div>

		
		<div class="location">
			<table>
				<tr><td>
			<h4>DAVAO CITY</h4>
			<p>near FTC tower Malvar St.,</p>
			<p>(02)300-7489</p>
			<p>(+63)938 448 3448
			<p>Mon-Sun: 8AM to 10PM</p>
				</td><td>
			<h4>LA Calinan</h4>
			<p>near USA st., Agdao City</p>
			<p>(02)328-4289</p>
			<p>(+63)942 334 5555
			<p>Mon-Sun: 8AM to 10PM</p>
			</td>
			<td>
			<h4>USA</h4>
			<p>near Tugbok st.,</p>
			<p>(02)428-4289</p>
			<p>(+63)922 344 5657
			<p>Mon-Sun: 8AM to 10PM</p>
			</td>
			<td>
			<h4>UM</h4>
			<p>near Dapsa st.,</p>
			<p>(02)328-7489</p>
			<p>(+63)910 354 8857
			<p>Mon-Sun: 8AM to 10PM</p>
			</td></tr>
			</table>
			</div>
		<div class="disclaimer">
			<p>DISCLAIMER: Product Names and Logos used in this website are for identification purposes <br>only
			and are trademarks of their respective owners.</p>
				<div class="copyright">
					<p> Copyright <i class="fa fa-copyright"></i> 2020 FMJMPC</p>
				</div>
		</div>
		</body>
</html>

