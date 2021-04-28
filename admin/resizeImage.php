<?php
   include('SimpleImage.php');
   
   $lpicurl='../images/imgupload/';
 	$nameImg=$_GET['nameImg'];
   
   $image = new SimpleImage();
   $image->load($lpicurl.$nameImg);
   $image->resizeToWidth(510);
   $image->save($lpicurl.$nameImg);
   
?>
   
<script type="text/javascript">
        parent.$.colorbox.close();
</script>