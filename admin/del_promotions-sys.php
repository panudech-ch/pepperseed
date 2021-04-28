<?php
include('../connect.php');
include('../inc/admin/query_statement.php');
require_once('../inc/fineuploader/php-traditional-server/uploadfile.php');
?>
<?php
session_start();
$id = $_POST['id'];
$branch_id = $_SESSION['branch_id'];

// hard branch id = 0 for both branch
$sql = "DELETE FROM `promotions` WHERE id= {$id} AND branch_id=0 ";


$result = mysql_query($sql);

if ($result) {
    $promoData = getAllPromotions(0);
    ?>
    <div class="table-responsive">
        <table class="table table-hover" style="margin: 15px;">
            <thead style="background-color: white ">
                <tr>

                    <td>
                        <span style="font-family: 'GothamBlack'">
                            Promotion Name
                        </span>
                    </td>
                    <td>
                        <span style="font-family: 'GothamBlack'">
                            Show
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
            </thead>
            <tbody style="background-color: white">

                <?php
                    while ($rs = mysql_fetch_assoc($promoData)) {
                        ?>
                    <tr>
                        
                        <td style="font-family: 'GothamLight';">
                            <?php echo $rs['name']; ?>
                        </td>
                        <td style="font-family: 'GothamLight';">
                            <a href="javascript:void(0)" onclick="showDetail(<?php echo $rs['id'] ?>,'<?php echo $rs['name'] ?>' ,'<?php echo $rs['pic_name']; ?>',<?php echo $rs['status'] ?>)" style="color: black">
                                <span style="font-family: 'GothamLight'">Show</span>
                            </a>
                        </td>
                        <td style="font-family: 'GothamLight';">
                            <input type="checkbox" class="js-switch" id="js-check-<?php echo $rs['id']; ?>" onchange="changeStatus(<?php echo $rs['id']; ?>,this.id,<?php echo $branch_id; ?>)" <?php echo $rs['status'] == 1 ? 'checked' : '' ?> />
                        </td>
                        <td style="font-family: 'GothamLight';">
                            <a href="javascript:void(0)" title="Delete" onclick="showFrmEdit(<?php echo $rs['id'] ?>,<?php echo $branch_id; ?>)" style="color: black">
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