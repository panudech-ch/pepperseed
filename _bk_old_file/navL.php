<a href="index.php"><img src="images/logo.png" border="0"  /></a>
        <div id="navL">
            <a href="index.php" <?php if($chkPage=='home'){ echo "class='active'";} ?>>HOME</a> <br />
            <a href="about.php" <?php if($chkPage=='about'){ echo "class='active'";} ?>>ABOUT US</a><br />
            <a href="menushow.php" <?php if($chkPage=='menushow'){ echo "class='active'";} ?>>MENUS</a><br />
            <a href="location.php" <?php if($chkPage=='location'){ echo "class='active'";} ?>>LOCATION</a><br />
            <a href="feedback.php" <?php if($chkPage=='feedback'){ echo "class='active'";} ?>>FEEDBACK</a><br />
            <a href="../bk_old/gallery.php" <?php if($chkPage=='gallery'){ echo "class='active'";} ?>>GALLERY</a><br />
            <a href="menu.php" <?php if($chkPage=='menu'){ echo "class='active'";} ?>>ORDER ONLINE</a>
        </div>