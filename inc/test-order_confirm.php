<?php
include '../connect.php';
$id = $_GET['ord_id'];   // Lastest ID
$orderId = str_replace('Array', '', $id);

$sql = "select o.*,b.branch_name as branch_name from orderno o JOIN branch b on b.id = o.branch_id where o.id='$orderId'";
$rsl = mysql_query($sql);
$data = mysql_fetch_array($rsl);

$choicedelivery = $data['ord_choicedelivery'];

$sqlArea = "select * from deliveryarea WHERE id = '$choicedelivery' ";
$rslArea = mysql_query($sqlArea);
$dataArea = mysql_fetch_array($rslArea);
$area = $dataArea['area'];

$branch_id = $data['branch_id'];
$branch_name = $data['branch_name'];
$addr = $data['ord_addr'];
$emailCustomer = $data['ord_mail'];
$phone = $data['ord_phone'];
$cname = $data['ord_cname'];

?>
<div style="padding: 40px;font-family:'GothamLight';">
    <div class="row">
        <div class="col-lg-12 form-group">
            <div style="font-size: 20px;font-family:'GothamBlack';">
                <span>Thank you for</span>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 20px;">
        <div class="col-lg-12 form-group">
            <div style="font-size: 18px;font-family:'GothamBlack';">
                <?php
                if ($choicedelivery == '1') {
                    ?>
                        <span>Pick up Order</span>
                    <?php
                } else {
                    ?>
                        <span>Delivery order</span>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 50px;">
        <div class="col-lg-12 form-group">
            <div style="font-size: 18px;font-family:'GothamBlack';">
                <span>YOUR ORDER WAS PLACED SUCCESSFULLY </span>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 50px;">
        <div class="col-lg-12 form-group">
            <div style="font-size: 20px;">
                <span>Please check you email for your order confirmation.</span>
            </div>
        </div>
    </div>

</div>



