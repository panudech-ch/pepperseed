<?php include('../connect.php'); ?>
<?php
$id = $_GET['id'];
$branch_id = $_GET['branch_id'];

$sql = "DELETE FROM deliveryarea WHERE id='$id'";
$result = mysql_query($sql);

if ($result) { ?>
	<div class="table-responsive">
		<table class="table table-hover" style="margin: 15px;">
			<thead style="background-color: white ">
				<tr>

					<td>
						<span style="font-family: 'GothamBlack'">
							Choice Name
						</span>
					</td>
					<td>
						<span style="font-family: 'GothamBlack'">
							Status
						</span>
					</td>
					<td style="text-align: center;">
						<span style="font-family: 'GothamBlack'">
							Delete
						</span>
					</td>
				</tr>
			</thead>
			<tbody style="background-color:white">
				
				<?php
					$sql_sel = "SELECT * FROM deliveryarea WHERE id!=1 && id!=2 && id!=15 && id!=16 && branch_id=$branch_id ORDER BY id ASC";
					$rs_sel = mysql_query($sql_sel);
					while ($rs = mysql_fetch_assoc($rs_sel)) {
						?>
					<tr>
					
						<td style="font-family: 'GothamLight';">
							<?php echo $rs['area']; ?>
						</td>
						<td style="font-family: 'GothamLight';">
							<input type="checkbox" class="js-switch" id="js-check-<?php echo $rs['id']; ?>" onchange="changeStatus(<?php echo $rs['id']; ?>,this.id,<?php echo $branch_id; ?>)" <?php echo $rs['deli_status'] == 1 ? 'checked' : '' ?> />
						</td>
						<td style="text-align: center;">
							<a href="javascript:void(0)" title="Delete" onclick="showDeleteDeliveryConfirm(<?php echo $rs['id']; ?>,<?php echo $branch_id; ?>)">
								<span style="color: red;" class="glyphicon glyphicon-trash"></span>
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