<?php
	include('../connect.php');
	include('../inc/admin/query_statement.php');
?>
<?php
	session_start();
	$id = $_POST['id'];
	$branch_id = $_SESSION['branch_id'];
	$choice_name = $_POST['choice_name'];
	$choice_price = $_POST['price'];
	$cat_id =  $_POST['cat_id'];
	$choice_stat = $_POST['status'];

$sql="UPDATE choice SET choice_price_dinner = 0";
	$choice_name != '' ? $sql.=" , choice_name='$choice_name' " : '';
	$choice_price != '' ? $sql.=", choice_price='$choice_price' " : '';
	$cat_id != '' ? $sql.=", cat_id='$cat_id' " : '';
	$choice_stat != '' ? $sql.=", choice_stat='$choice_stat' " : '';
	$sql .= " WHERE id='$id' ";
$result=mysql_query($sql);
 
if($result){
	$cData = getAllChoiceByBranchId($branch_id);
	?>
	<div class="table-responsive">
		<table class="table table-hover">
			<tbody style="background-color: #E9E9E9;">
			<tr style="background-color: #DAD5D1; ">
				<td style="width: 10%">
				</td>
				<td>
					<span style="font-family: 'GothamBlack'">
						 Choice Name
					</span>
				</td>
				<td>
					<span style="font-family: 'GothamBlack'">
						Category
					</span>
				</td>
				<td>
					<span style="font-family: 'GothamBlack'">
						Price
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
			<?php while ($rs = mysql_fetch_assoc($cData)) { ?>
				<tr>
					<td style="width: 10%">
					</td>
					<td style="font-family: 'GothamLight'">
						<?php echo $rs['choice_name']; ?>
					</td>
					<td style="font-family: 'GothamLight'">
						<?php echo $rs['cat_name']; ?>
					</td>
					<td style="font-family: 'GothamLight'">
						<?php echo $rs['choice_price']; ?>
					</td>
					<td>
						<input type="checkbox" class="js-switch" id="js-check-<?php echo $rs['id']; ?>"
							   onchange="changeStatus(<?php echo $rs['id']; ?>,this.id,<?php echo $branch_id; ?>)" <?php echo $rs['choice_stat'] == 1 ? 'checked' : '' ?>/>
					</td>
					<td style="font-family: 'GothamLight'">
						<a href="javascript:void(0)" style="color: black"
						   onclick="showFrmEdit('<?php echo $rs['id']?>','<?php echo $rs['choice_name']?>' ,'<?php echo $rs['choice_price']; ?>','<?php echo $rs['cat_id']?>')">
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
<?php
} else {
	echo "ERROR";
} ?>
