<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top" width="190" style="padding-right:15px;">
    <div style="padding:15px; background-color:#FFF;">    
        <h2 style="font-size:23px; font-weight:700; color:#ffcc00; margin:15px 0; padding:0;">FEEDBACK</h2>
        <iframe src="FB.php" frameborder="0" scrolling="yes" height="290" width="100%"></iframe>
    </div>
    </td>
    <td valign="top" width="360" bgcolor="#FFF" style="padding:15px;">    
        <h2 style="font-size:23px; font-weight:700; color:#ffcc00; margin:15px 0; padding:0;">NEWS / PROMOTION</h2>   
<?php
	$id = 6;
	$sql = "SELECT * FROM firstpage WHERE id=$id ";
	$rsl = mysql_query($sql);
	$data = mysql_fetch_array($rsl);
?>
<?php if($_SESSION['sessionLogin']=="admin"){?>
<div align="right" style="padding:5px 0 5px 0;">
<a href="admin/edit_firstpage.php?id=<?php echo $id;?>" class='example6'><img src="images/bt-edit.png" border="0" align="absmiddle" /></a>
</div>
<?php	} echo $tmp = str_replace("<p>
	&nbsp;</p>", "", $data['firstpage']); ?>
    
    <!--<div style="position:relative; width:360px; height:280px;">
    	 <div style="position:absolute; width:360px; height:280px; z-index:98;">
          <img src="images/news-image1.jpg" width="360" height="280" />
          </div> 
    	<div style="position:absolute; right:0; top:80px; padding:15px; width:220px;  background-image:url(images/bgWhite.png); font-size:15px; color:#333; z-index:99;">
        <strong>PEPPER SEEDS RICE PAPER ROLL</strong><br /><br />
Just some simple and fresh Rice Paper Rolls at Pepper Seeds "Boutique Thai Bites"
        </div>   	
    </div>-->
    
    
    </td>
    <td valign="top" style="padding-left:15px;">
    
    <div style="background-color:#FFF; padding:15px;">
    
    	<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.3&appId=10150141548270134";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-page" data-href="https://www.facebook.com/pepperseedsthai" data-height="343" data-hide-cover="true" data-show-facepile="false" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/pepperseedsthai"><a href="https://www.facebook.com/pepperseedsthai">Pepper Seeds   &quot;Boutique Thai Bites&quot;</a></blockquote></div></div>    </div>
    </td>
  </tr>
</table>