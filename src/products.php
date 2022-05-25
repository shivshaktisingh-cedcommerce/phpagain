<?php include "config.php";
	session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="code.js"></script>
	<title>
		Products
	</title>
	<link href="style.css" type="text/css" rel="stylesheet">
</head>

<body>
	<?php include "header.php";?>
	<div id="main">
		<div id="products">
			<?php foreach($products as $value){ ?>
				<div id="product-101" class="product">
					<img src="<?php echo $value['image'];?>">
					<h3 class="title"><a href="#"><?php echo $value['name'];?></a></h3>
					<span><?php echo $value['price'];?></span>
					<a class="add-to-cart" id="<?php echo $value['ID'];?>" name="<?php echo $value['name'];?>" price="<?php echo $value['price'];?>" href="">Add To Cart</a>
				</div>
			<?php } ?>
		</div>
	</div>
	
		<table id="myTable">

		</table>
		<input type="hidden" value="Empty your Cart" id="empty">
	
	<?php include "footer.php";?>
	
</body>
</html>