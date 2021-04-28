<?php
include '../connect.php';
$id = $_GET['ord_id'];   // Lastest ID

$sql = "select o.*,b.branch_name as branch_name from orderno o JOIN branch b on b.id = o.branch_id where o.id='$id'";
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
                <span>YOUR ORDER ALREADY SENT TO US</span>
            </div>
            <div style="font-size: 20px;font-family:'GothamBlack';">
                <span>WE GOT YOUR ORDER</span>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 20px;">
        <div class="col-lg-12 form-group">
            <div style="font-size: 18px;font-family:'GothamBlack';">
                <?php
                if ($choicedelivery == '1') {
                    ?>
                        <span>Pickup Store</span>
                    <?php
                } else {
                    ?>
                        <span>Delivery order</span>
                    <?php
                }
                ?>
            </div>
            <div style="font-size: 18px;">
                <span><?php echo $cname; ?></span>
            </div>
            <?php
            if ($choicedelivery != '1') {
                ?>
                <div style="font-size: 18px;">
                    <span><?php echo $addr; ?></span>
                </div>
                <div style="font-size: 18px;">
                    <span><?php echo $area; ?></span>
                </div>
                <?php
            }
            ?>
            <div style="font-size: 18px;">
                <span><?php echo $phone; ?></span>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 50px;">
        <div class="col-lg-12 form-group">
            <div style="font-size: 18px;font-family:'GothamBlack';">
                <span>Your Order Sending to <?php echo $branch_name; ?> shop </span>
            </div>
            <div style="font-size: 18px;font-family:'GothamBlack';">
                <span>You will get confirmation via email shortly</span>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 50px;">
        <div class="col-lg-12 form-group">
            <div style="font-size: 20px;">
                <span>PEPPER SEEDS THANK YOU.</span>
            </div>
            <div style="font-size: 28px;">
                <span><?php echo $cname; ?></span>
            </div>
        </div>
    </div>
<!--    <div class="row" style="margin-top: 20px;">-->
<!--        <div class="col-lg-12 form-group">-->
<!--            <div style="font-size: 18px;">-->
<!--                <span>We are sending a note to you in a couple minite...</span>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->

</div>



