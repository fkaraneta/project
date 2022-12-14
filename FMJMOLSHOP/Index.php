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

		<div class="header">
			<a class="contact"><i class="fa fa-phone"> (02)300-7498</i>&nbsp;&nbsp; <i class="fa fa-mobile-phone"> (+63) 938 448 3448</i></a>
				<div class="header-account">
			<a class="" href="Login.php"><i class="fa fa-lock"></i>	Login &nbsp;&nbsp;</a>
			<a class="" href="Register.php"><i class="fa fa-pencil"></i> Register</a>
		</div>
		</div>
		<form method="post" action="Search.php">
		<div class="header-img">
			<a href ='Index.php' class='contact'><img src='logo.png'></a>
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
			<form method="post" action="Search.php">
			<input type="text" name="search" placeholder="Search..."><button class="btnsearch"><i class="fa fa-search"></i></button>
			
				<div class="dropdown-cart">
				<a class="cart" href="Viewcart.php"><i class="fa fa-shopping-basket	"></i></a>
				<div class="dropdown-content-cart">
		<?php
			if(isset($_SESSION["cart_item"])){
   			 $total_quantity = 0;
   			 $total_price = 0;
		?>	
	<?php		
    		foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["prod_price"];
		?>		
			
				<table class="mycart-product">

					<tr>
						
						<td><?php echo "<img src='product-images/".$item['image']." 'class='mycart' >";?></td>
						<td class="word"><?php echo $item["dname"]; ?></td>
				<td  colspan="5"><?php echo "??? ".$item["prod_price"]; ?> x<?php echo $item["quantity"]?> <a href="Index.php?action=remove&code=<?php echo $item["code"]; ?>" >Delete</a></td></tr>
				<td olspan="5"></td>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["prod_price"]*$item["quantity"]);
				}
				?>
				<tr>
				<td colspan="1"><strong>Subtotal:</strong></td>
				<td  colspan="2" class="subtotal2"> <?php echo "??? ".number_format($total_price, 2); ?>
				</td>
				</tr>
				<tr>
					<td colspan="3" class="viewmycart"><a href="Viewcart.php" class=""><p class="color-text">View My Cart</p></a></td>
				</tr>
 		 <?php
			} else {
			?>
			<div class="no-records">Your Cart is Empty</div>
			<?php 
			}
			?>
				</table>
			</div>
		</div>
		</div>
		</form>
		<div class="dropdown-container">
			<div class="mySlides fade">
			<a href="#"><img class ="dropdown-img"src="msi.jpg"></a>
		</div>

		<div class="mySlides fade">
			<a href="#"><img class ="dropdown-img"src="asus_zephy.jpg"></a>
		</div>

		<div class="mySlides fade">
			<a href="#"><img class ="dropdown-img"src="vr.jpg"></a>
		</div>

			<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
			<a class="next" onclick="plusSlides(-1)">&#10095;</a>
		</div>
		<div class="product-content">
		
		<h3>New Arrivals</h3>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM product ORDER BY productid ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>	

   	 	    
			<form method="post" action="Index.php?action=add&code=<?php echo $value["code"]; ?>">

			<div class ="main">
				
					<?php echo "<img src='product-images/".$value['image']."' class='product-img'>";?>
				
					<br>
					<div class="product-name"><strong><?php echo $value["dname"]; ?></strong></div>
					
					<div class="product-name"><?php echo "???".number_format($value["prod_price"],2); ?></div>
			
					<div><input type="hidden" class="product-quantity" name="quantity" value="1" size="2" /><button value="Add to Cart" class="btn btn4" />Add to Cart</button></div>	
			</div>
			
			</form>

	<?php

		}

	}

	?></div>
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
<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var myIndex = 0;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
  }

  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>
<script>
	var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 6000); 
}
</script>