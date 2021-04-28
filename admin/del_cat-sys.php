<?php
include('../connect.php');
include('../inc/admin/query_statement.php');
?>
<?php
	session_start();
	$id=$_POST['id'];
	$branch_id = $_SESSION['branch_id'];

$sql="DELETE FROM catname WHERE id='$id' and branch_id='$branch_id'";
$result=mysql_query($sql);

if($result){
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
						<input type="checkbox" class="js-switch" id="js-check-<?php echo $rs['id']; ?>"
							   onchange="changeStatus(<?php echo $rs['id']; ?>,this.id,<?php echo $branch_id; ?>)" <?php echo $rs['cat_status'] == 1 ? 'checked' : '' ?>/>
					</td>
					<td style="font-family: 'GothamLight';">
						<a href="javascript:void(0)" style="color: black"
						   onclick="showFrmEdit('<?php echo $rs['id']?>','<?php echo $rs['cat_name']?>' ,'<?php echo $rs['cat_img']; ?>','<?php echo $rs['cat_img_name']?>')">
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
			var switchery = new Switchery(html, { size: 'small' });
		});
	</script>
<?php } else {
	echo "ERROR";
} ?>
