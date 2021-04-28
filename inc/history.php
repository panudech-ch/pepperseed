<?php
/**
 * Created by PhpStorm.
 * User: indywib
 * Date: 1/26/2017
 * Time: 8:05 PM
 */
	include('../connect.php');
	include('../inc/admin/query_statement.php');
?>
<?php
	session_start();
	$isAdmin = $_SESSION['isAdmin'];
	$slocanData = getContentByPageSection('Slocan_aboutus');
	$historyData = getContentByPageSection('History_aboutus');
	$detailData = getContentByPageSection('Detail_aboutus');
?>
<?php if($isAdmin){?> Edit Slocan <a href="admin/edit_firstpage.php?id=<?php echo $slocanData['id']; ?>" target="_blank" class="bg"><img src="images/bt-edit.png" border="0" align="absmiddle" /></a><?php } ?>

<div class="pepper_detail_en">
	<?php if($historyData['firstpage'] != null){ echo $historyData['firstpage']; ?>
	<?php } else {?>
		<p>It's been a while In 2012, we opened Pepper Seeds with our custom menu, Focusing on Boutique Thai dinin, we carefully chose dishes to please the Balmainian's fine tastebuds, because we value your love of Thai food. This inspires our creativitygrowth and strive for perfection on every plate. It's all in how we combine and layer the spices, cooking techique that marry perfectly with fresh Australian produce.</p>
		</br>
		<p>PEPPER SEEDS's BROAKWAY is our second restaurant, which opened in August 2016. We decided to open a type of Thai restaurant Broadway hadn't seen before, our relaxed, informal Pepper Seeds's Boutique Thai. Just like our other restaurants, Pepper Seeds's Broadway serves boutique Thai cuisine with a modern twist in a shopping center environment. Perfet for taking a bread from shooping, sightseeing and working, is's a place to relax and watch the world go by.</p>
	<?php } ?>
	<?php if($isAdmin){?> <a href="admin/edit_firstpage.php?id=<?php echo $historyData['id']; ?>" target="_blank" class="bg"><img src="images/bt-edit.png" border="0" align="absmiddle" /></a><?php } ?>
</div>

<div class="pepper_detail_th_small">
	<?php if($detailData['firstpage'] != null) { echo $detailData['firstpage']; ?>
	<?php } else {?>
		<p>จากมือ..สู่มือ...จากรุ่น..สู่รุ่น จากอดีตกาล..สู่ปัจจุบัน</p>
		<p>จากบรรพบุรุษ..สู่ลูกหลาน จากความดั้งเดิม..สู่ความเป็นตำนาน</p>
		<p>ให้คนทุกรุ่นได้จดจำ ..สังคม..สร้างสรรค์ และสืบทอดผ่านกาลเวลา</p>
		<p>..มาสู่เรา..</p>
	<?php } ?>
	<?php if($isAdmin){?> <a href="admin/edit_firstpage.php?id=<?php echo $detailData['id']; ?>" target="_blank" class="bg"><img src="images/bt-edit.png" border="0" align="absmiddle" /></a><?php } ?>
</div>

<script type="text/javascript">
	$(document).ready(function () {
		// $(".bg").colorbox({iframe:true, width:"80%", height:"80%"});
	})
</script>