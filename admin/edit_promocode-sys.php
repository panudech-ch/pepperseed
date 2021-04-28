<?php
/**
 * Created by PhpStorm.
 * User: chawapon
 * Date: 5/20/2017
 * Time: 10:40 PM
 */

include('../connect.php');
include('../inc/admin/query_statement.php');
require_once('../inc/fineuploader/php-traditional-server/uploadfile.php');
    session_start();
    $branch_id = $_SESSION['branch_id'];
    $id = $_POST['id'];
    $status = $_POST['status'];
    $promo_code = $_POST['promo_code'];
    $promo_type = $_POST['promo_type'];
    $promo_value = $_POST['promo_value'];
    $promo_resmin_type = $_POST['promo_resmin_type'];
    $promo_resmin_value = $_POST['promo_resmin_value'];
    $promo_deliverymode = $_POST['promo_deliverymode'];
    $promo_payment_type = $_POST['promo_payment_type'];

    $sql = "UPDATE promocode SET `promo_branch` = {$branch_id}";
    $promo_code != null ? $sql.= ", `promo_code` = '{$promo_code}' " : "";
    $promo_type != null ? $sql.= ", `promo_type` = '{$promo_type}' " : "";
    $promo_deliverymode != null ? $sql.= ", `promo_deliverymode` = '{$promo_deliverymode}' " : "";
    $promo_resmin_type != null ? $sql.=", `promo_resmin_type` = '{$promo_resmin_type}' " : "";
    $promo_resmin_value != null ? $sql.=", `promo_resmin_value` = {$promo_resmin_value} " : "";
    $promo_value != null ? $sql.=", `promo_value` = {$promo_value} " : "";
    $promo_payment_type != null ? $sql.=", `promo_payment_type` = '{$promo_payment_type}' " : "";
    $status != null ? $sql.=", `promo_stat` = {$status} " : "";
    $sql.=" WHERE `id` = {$id}";

    $result = mysql_query($sql);
    if ($result) {
        $promocodeData = getAllPromotionCodeByBranchId($branch_id);
        ?>
        <div class="table-responsive">
            <table class="table table-hover">
                <tbody style="background-color: #E9E9E9;">
                <tr style="background-color: #DAD5D1; ">
                    <td style="width: 10%">
                    </td>
                    <td>
                                <span style="font-family: 'GothamBlack'">
                                     Promotion Code
                                </span>
                    </td>
                    <td>
                                <span style="font-family: 'GothamBlack'">
                                    Promotion Code Conditions
                                </span>
                    </td>
                    <td>
                                <span style="font-family: 'GothamBlack'">
                                    Promotion Code Type
                                </span>
                    </td>

                    <td>
                                <span style="font-family: 'GothamBlack'">
                                    Promotion Code Value
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
                while ($rs = mysql_fetch_assoc($promocodeData)) {
                    ?>
                    <tr>
                        <td style="width: 10%">
                        </td>
                        <td style="font-family: 'GothamLight';">
                            <?php echo $rs['promo_code']; ?>
                        </td>
                        <td style="font-family: 'GothamLight';">
                            <p> Order Subtotal: <?php echo $rs['resmin_label'];?> <?php echo $rs['promo_resmin_value'];?></p>
                            <p> Delivery Mode : <?php echo $rs['delivery_label'];?></p>
                            <p> Payment Mode  : <?php echo $rs['payment_label'];?></p>
                        </td>
                        <td style="font-family: 'GothamLight';">
                            <?php echo $rs['type_label']; ?>
                        </td>
                        <td style="font-family: 'GothamLight';">
                            <?php echo $rs['promo_value']; ?>
                        </td>
                        <td style="font-family: 'GothamLight';">
                            <input type="checkbox" class="js-switch" id="js-check-<?php echo $rs['id']; ?>"
                                   onchange="changeStatus(<?php echo $rs['id']; ?>,this.id,<?php echo $branch_id; ?>)" <?php echo $rs['promo_stat'] == 1 ? 'checked' : '' ?>/>
                        </td>
                        <td style="font-family: 'GothamLight';">
                            <a href="javascript:void(0)" style="color: black"
                               onclick="showFrmEdit('<?php echo $rs['id']?>')">
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
    <?php } else {
        echo "ERROR";
    } ?>