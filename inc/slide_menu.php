<?php
/**
 * Created by PhpStorm.
 * User: indywib
 * Date: 1/26/2017
 * Time: 7:56 PM
 */
    include('../connect.php');
    include('../inc/admin/query_statement.php');
	session_start();
	$page = $_SESSION['currentPage'];
	$isAdmin = $_SESSION['isAdmin'];
	$cat = $_SESSION['cat'];
    $catData = getAllActiveCategoryByBranchId($_SESSION['customer_branch']);
	$catDataMobile = getAllActiveCategoryByBranchId($_SESSION['customer_branch']);
?>
<div class="menu_desktop">
	<div class="slide_logo">
		<a href="painpage.php#home-page"><img src="inc/img/logo-left.png" alt=""></a>
	</div>
	<div class="slide_menu">
        <ul style="height: 66vh; overflow: scroll;">
			<li>
				<a href="painpage.php#aboutus">OUR STORY</a>
			</li>
			<li <?php if($page == 'order_online' || $page == 'area-service' || $page == 'order_online_item' || $page == 'tiffin'){ echo 'class="is-active"'; }?> >
				<?php if($page == 'order_online' || $page == 'area-service' || $page == 'order_online_item' || $page == 'tiffin') {
					if($page == 'order_online'){ ?>
						<u>ONLINE ORDER</u>
					<?php } else { ?>
						ONLINE ORDER
					<?php }?>
					<ul>
						<?php if($page == 'area-service'){?>
							<li><u>AREAS SERVICE</u></li>
						<?php } else { ?>
							<li><a href="painpage.php#area-service">AREAS SERVICE</a></li>
						<?php }
						while ($rsM = mysql_fetch_assoc($catData)){
							if($page == 'order_online_item' || $page == 'tiffin'){ ?>
								<li><a href="order_online_item.php?branch_id=<?php echo $_SESSION['customer_branch'];?>#<?php echo $rsM['cat_name'];?>" class="scroll-item" data-scroll="<?php echo $rsM['cat_name'];?>"><?php echo $rsM['cat_name'];?></a></li>
							<?php } ?>
						<?php }?>
						<?php if($page == 'tiffin'){?>
							<li style="margin-top: 5%"><u>Show your Tiffin!</u></li>
						<?php }else{ ?>
							<li style="margin-top: 5%"><a href="tiffin.php">Show your Tiffin!</a></li>
						<?php } ?>
					</ul>
				<?php } else {?>
					<a href="painpage.php#area-service">ONLINE ORDER</a>
				<?php } ?>
			</li>
			<li>
				<a href="painpage.php#promotion">PROMOTIONS</a>
			</li>
			<li>
				<a href="painpage.php#menus">MENU</a>
			</li>
			<li>
				<a href="painpage.php#booking">BOOK OUR TABLE</a>
			</li>
			<li>
				<a href="painpage.php#store">LOCATIONS</a>
			</li>
			<li>
				<a href="painpage.php#gallery">GALLERY</a>
			</li>
			<?php if($isAdmin){?>
			<li>
				<a href="inc/admin/pick_branch.php">Edit Backend</a>
			</li>
			<?php }?>
		</ul>
	</div>
</div>

<!--<button id="hidden-desktop" class="btn-nav">-->
<!--        <div class="bar arrow-top-r"></div>-->
<!--        <div class="bar arrow-middle-r"></div>-->
<!--        <div class="bar arrow-bottom-r"></div>-->
<!--</button>-->
<nav class="nav-container hidden hideNav">
        <ul class="nav-list">
        	<li class="list-item" style="padding-bottom: 20px; padding-top: 70px;">
				<a href="painpage.php#home-page"><img src="inc/img/logo-left.png" style="width:70%;" alt=""></a>
			</li>
            <li class="list-item">
				<a href="painpage.php#aboutus">OUR STORY</a>
			</li>
			<li class="list-item"<?php if($page == 'order_online' || $page == 'area-service' || $page == 'order_online_item' || $page == 'tiffin'){ echo 'class="list-item is-active"'; }?> >
				<?php if($page == 'order_online' || $page == 'area-service' || $page == 'order_online_item' || $page == 'tiffin') {
					if($page == 'order_online'){ ?>
						<u>ONLINE ORDER</u>
					<?php } else { ?>
						ONLINE ORDER
					<?php }?>
					<ul>
						<?php if($page == 'area-service'){?>
							<li><u>AREAS SERVICE</u></li>
						<?php } else { ?>
							<li><a href="painpage.php#area-service">AREAS SERVICE</a></li>
						<?php }
						while ($rsM = mysql_fetch_assoc($catDataMobile)){
							if($page == 'order_online_item' || $page == 'tiffin'){ ?>
                                <li><a href="order_online_item.php?branch_id=<?php echo $_SESSION['customer_branch'];?>#<?php echo $rsM['cat_name'];?>" class="scroll-item" data-scroll="<?php echo $rsM['cat_name'];?>"><?php echo $rsM['cat_name'];?></a></li>
							<?php } ?>
						<?php }?>
						<?php if($page == 'tiffin'){?>
							<li style="margin-top: 5%"><u>Show your Tiffin!</u></li>
						<?php }else{ ?>
							<li style="margin-top: 5%"><a href="tiffin.php">Show your Tiffin!</a></li>
						<?php } ?>
					</ul>
				<?php } else {?>
					<a href="painpage.php#area-service">ONLINE ORDER</a>
				<?php } ?>
			</li>
			<li class="list-item">
				<a href="painpage.php#promotion">PROMOTIONS</a>
			</li>
			<li class="list-item">
				<a href="painpage.php#menus">MENU</a>
			</li>
			<li class="list-item">
				<a href="painpage.php#booking">BOOK OUR TABLE</a>
			</li>
			<li class="list-item">
				<a href="painpage.php#store">LOCATIONS</a>
			</li>
			<li class="list-item">
				<a href="painpage.php#gallery">GALLERY</a>
			</li>
			<?php if($isAdmin){?>
			<li class="list-item">
				<a href="inc/admin/pick_branch.php">Edit Backend</a>
			</li>
			<?php }?>
        </ul>
        <div class="footer_slide" style="bottom:20px; position: absolute; left:20px;">
             <div class="footer_custom" style=" float: left; text-align: left;">
                &copy;2017 PEPPER SEEDS
                <hr class="peper_footer_line" style="width: 97.5%; float:left;">
                <div class="footer_icon">
                    <a href="">
                        <img class="icon_pep" src="inc/img/icon/icon-pepper-ig.png" alt="">
                    </a>
                    <a href="">
                        <img class="icon_pep" src="inc/img/icon/icon-pepper-fb.png" alt="">
                    </a>
                    <a href="">
                        <img class="icon_pep" src="inc/img/icon/icon-pepper-mail.png" alt="">
                    </a>
                </div>
            </div>
        </div>
</nav>


<script type="text/javascript">
	function printIt() {
	var wnd = window.open('inc/pdf/menu.pdf');
	wnd.print();
}
</script>

