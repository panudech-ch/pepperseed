<?php
include('../connect.php');
include('../inc/admin/query_statement.php');
require_once('../inc/fineuploader/php-traditional-server/uploadfile.php');
?>
<?php
session_start();
$id = $_POST['id'];
$branch_id = $_SESSION['branch_id'];
$status = $_POST['status'];
$cat_name = $_POST['cat_name'];
$pic_name = $_POST['pic-name'];
$cat_ordertime = 'dinner'; //$_POST['cat_ordertime'];

// $data = $_POST['data'];
// echo "data = " . $data;
// echo die;
// echo "5555555555555";
// echo "<br>";
// echo "cat_name = " . $cat_name = $_POST['cat_name'];
// echo "<br>";
// echo "pic_name = " . $pic_name = $_POST['pic-name'];
// echo "<br>";
// echo "_FILES = " . $_FILES["up-pic"]["type"];
// echo "<br>";
// echo die;

if (isset($_FILES["up-pic"]["type"]) && !empty($_FILES["up-pic"]) && $_FILES["up-pic"]["error"] == 0) {
	$upd = uploadfile($_FILES["up-pic"], $pic_name, "categories");
	if ($upd['success']) {
		$targetPath = $upd['targetPath'];
	} else {
		return $upd['msg'];
	}
}

$sql = "UPDATE catname SET
		cat_ordertime='$cat_ordertime'";
$cat_name != null ? $sql .= ", cat_name='$cat_name'" : '';
$branch_id != null ? $sql .= ", branch_id='$branch_id'" : '';
$status != null ? $sql .= ", cat_status='$status'" : '';
$targetPath != null ? $sql .= ", cat_img='$targetPath' , cat_img_name='$pic_name'" : '';
$sql .= "WHERE id='$id'";
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