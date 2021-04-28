<?php
/**
 * Created by PhpStorm.
 * User: indywib
 * Date: 1/26/2017
 * Time: 7:56 PM
 */
	session_start();
	$page = $_SESSION['currentPage'];
?>
<div class="slide_logo">
	<a href="index.php"><img src="inc/img/logo-left.png" alt=""></a>
</div>
<div class="slide_menu">
	<ul>
		<li>
			<?php if($page == 'aboutus') {?>
				<u>OUR STORY</u>
			<?php } else {?>
				<a href="aboutus.php">OUR STORY</a>
			<?php } ?>
		</li>
		<li>
			<?php if($page == 'booking') {?>
				<u>BOOK A TABLE</u>
			<?php } else {?>
				<a href="booking.php">BOOK A TABLE</a>
			<?php } ?>
		</li>
		<li>
			<?php if($page == 'our_menu') {?>
				MENUS
				<ul>
					<li><u>OVERALL</u></li>
					<li><a href="javascript:void(0)">DOWNLOAD</a></li>
					<li><a href="javascript:void(0)">PRINT MENU</a></li>
				</ul>
			<?php } else {?>
				<a href="our_menu.php">MENUS</a>
			<?php } ?>
		</li>
		<li>
			<?php if($page == 'our_stores') {?>
				<u>OUR STORES</u>
				<ul>
					<li>BALMAIN</li>
						<ul>
							<li>Map</li>
							<li>Galleries</li>
						</ul>
					<li>BROADWAY</li>
						<ul>
							<li>Map</li>
							<li>Galleries</li>
						</ul>
				</ul>
			<?php } else {?>
				<a href="our_stores.php">OUR STORES</a>
			<?php } ?>
		</li>
		<li>
			<?php if($page == 'order_online') {?>
				<u>ORDER ONLINE</u>
				<ul>
					<li>AREAS SERVICE</li>
					<li>FIRST BITES</li>
					<li>PEPPER SEEDS DARLING</li>
					<li>CURRIES</li>
					<li>STIR FRY</li>
					<li>NOODLE AND RICE</li>
					<li>GARDEN SALAD</li>
					<li>SOUP</li>
					<li>GRILL BAR</li>
					<li>SIDE DISH</li>
					<li>DRINKS</li>
					<li>Show your Tiffin!</li>
				</ul>
			<?php } else {?>
				<a href="order_online.php">ORDER ONLINE</a>
			<?php } ?>
		</li>
		<li>
			<?php if($page == 'promotion') {?>
				<u>PROMOTION</u>
			<?php } else {?>
				<a href="promotion.php">PROMOTIONS</a>
			<?php } ?>
		</li>
	</ul>
</div>

