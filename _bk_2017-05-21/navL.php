<a href="index.php"><img src="images/logo.png" border="0"  /></a>
        <div id="navL">
            <a href="index.php" <? if($chkPage=='home'){ echo "class='active'";} ?>>HOME</a> <br />
            <a href="about.php" <? if($chkPage=='about'){ echo "class='active'";} ?>>ABOUT US</a><br />
            <a href="menushow.php" <? if($chkPage=='menushow'){ echo "class='active'";} ?>>MENUS</a><br />
            <a href="location.php" <? if($chkPage=='location'){ echo "class='active'";} ?>>LOCATION</a><br />
            <a href="feedback.php" <? if($chkPage=='feedback'){ echo "class='active'";} ?>>FEEDBACK</a><br />
            <a href="gallery.php" <? if($chkPage=='gallery'){ echo "class='active'";} ?>>GALLERY</a><br />
            <a href="menu.php" <? if($chkPage=='menu'){ echo "class='active'";} ?>>ORDER ONLINE</a>
        </div>