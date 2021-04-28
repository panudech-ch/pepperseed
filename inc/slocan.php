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
?>
<div class="pepper_detail_th">
	<?php if($slocanData['firstpage'] != null) { echo $slocanData['firstpage'];?>
	<?php } else { ?>
		<p>จากมือสู่มือ....จากรุ่น..สู่รุ่น</p>
		<p>จากอดีตกาล...สู่ปัจจุบัน</p>
		<p>จากบรรพบุรุษ...สู่ลูกหลาน</p>
		<p>จากความดั้งเดิม...สู่ความเป็นตำนาน</p>
		<p>ให้คนทุกรุ่นได้จดจำ...สังคม...สร้างสรรค์</p>
		<p>และสืบทอดผ่านกาลเวลา</p>
		<p>...มาสู่เรา...</p>
	<?php } ?>
</div>