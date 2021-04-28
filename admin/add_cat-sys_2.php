<?php
include('../connect.php');
include('../inc/admin/query_statement.php');
require_once('../inc/fineuploader/php-traditional-server/uploadfile.php');
?>
<?php
session_start();
$cat_name = $_POST['cat_name_2'];
$cat_ordertime = 'dinner'; //$_POST['cat_ordertime'];
$branch_id = $_SESSION['branch_id'];

$cat_name = $_POST['cat_name_2'];
$pic_name = $_POST['pic-name_2'];

//$datahead = $_POST['datahead'];


if (isset($_FILES["up-pic_2"]["type"]) && !empty($_FILES["up-pic_2"]) && $_FILES["up-pic_2"]["error"] == 0) {

	$upd = uploadfile($_FILES["up-pic_2"], $pic_name, "categories");

	if ($upd['success']) {
		$targetPath = $upd['targetPath'];
	} else {
		return $upd['msg'];
	}
}




$cat_name = str_replace("'", "&#39;", $cat_name);
$cat_name = str_replace("\"", "&quot;", $cat_name);

$sql = "INSERT INTO catname(
		cat_name, 
		branch_id,
		cat_ordertime,
		cat_img,
		cat_img_name
	)VALUES(
		'$cat_name', 
		'$branch_id',
		'$cat_ordertime',
		'$targetPath',
		'$pic_name'
	)";
$result = mysql_query($sql);


if ($result) {
	$catData = getAllCategoryByBranchId($branch_id);
	?>
	<div class="table-responsive">
		<table class="table table-hover">
			<tbody style="background-color: #E9E9E9;">
				<tr style="background-color: #DAD5D1; ">
					<td style="width: 10%">
					</td>
					<td>
						<span style="font-family: 'GothamBlack'">
							Category Name
						</span>
					</td>
					<td>
						<span style="font-family: 'GothamBlack'">
							Status
						</span>
					</td>
					<td>
						<span style="font-family: 'GothamBlack'">
							Edit
						</span>
					</td>
				</tr>
				<?php
					while ($rs = mysql_fetch_assoc($catData)) {
						?>
					<tr>
						<td>

						</td>
						<td style="font-family: 'GothamLight';">
							<?php echo $rs['cat_name']; ?>
						</td>
						<td style="font-family: 'GothamLight';">
							<input type="checkbox" class="js-switch" id="js-check-<?php echo $rs['id']; ?>" onchange="changeStatus(<?php echo $rs['id']; ?>,this.id,<?php echo $branch_id; ?>)" <?php echo $rs['cat_status'] == 1 ? 'checked' : '' ?> />
						</td>
						<td style="font-family: 'GothamLight';">
							<a href="javascript:void(0)" style="color: black" onclick="showFrmEdit('<?php echo $rs['id'] ?>','<?php echo $rs['cat_name'] ?>' ,'<?php echo $rs['cat_img']; ?>','<?php echo $rs['cat_img_name'] ?>')">
								<span>
									Edit
								</span>
							</a>
						</td>
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<script type="text/javascript">
		var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
		elems.forEach(function(html) {
			var switchery = new Switchery(html, {
				size: 'small'
			});
		});
	</script>
<?php } else {
	echo "ERROR";
} ?>