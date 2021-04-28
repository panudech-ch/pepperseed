<!--/**-->
<!--* Created by PhpStorm.-->
<!--* User: kuber-->
<!--* Date: 15/02/2560-->
<!--* Time: 22:50-->
<!--*/-->

<?php
include('../../connect.php');
include('../../constant.php');
include('query_statement.php');
if ($_SESSION['sessionLogin'] != "admin") {
    header("location:index.php");
} ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Untitled Document</title>
    <style type="text/css">
        @media print {
            @page {
                margin: 0;
            }

            body {
                margin: 0.5cm;
            }
        }
    </style>

</head>
<body>
<div class="detail">
    <?php
    $id = $_GET['id'];

//    $sql="UPDATE orderno SET
//		ord_chk='yes'
//	WHERE id='$id' ";
//    mysql_query($sql);

    $sqlOrd = "select * from orderno where id='$id'";
    $rslOrd = mysql_query($sqlOrd);
    $dataOrd = mysql_fetch_array($rslOrd);
    $choicedelivery = $dataOrd['ord_choicedelivery'];
    $ord_payment = $dataOrd['ord_payment'];
    $branch_id = $dataOrd['branch_id'];
    $promotion_code = $dataOrd['promotion_code'];
    $total_discount = $dataOrd['total_discount'];
    $total_charge = $dataOrd['total_charge'];
    $total_credit_charge = $dataOrd['total_credit_charge'];

    /* ---- Area Price ---*/
    $sqlArea = "select * from deliveryarea WHERE id = '$choicedelivery' ";
    $rslArea = mysql_query($sqlArea);
    $dataArea = mysql_fetch_array($rslArea);
    $area = $dataArea['area'];
    $charge_price = $dataArea['charge_price'];
    
    updateOrderPrinted($id);
    ?>
    <table width="210" cellspacing="0" cellpadding="0" border="0">
        <tbody style="padding:10px;width: 33%;font-size: 12px;" valign="top">
        <?php for ($i = 1; $i <= 1; $i++) {
            $sumdiscount = 0;
            $subTotal = 0;
            ?>
            <tr>
                <td style="text-align: center;font-size: 11px;" colspan="2" class="text-font">
                    <?php echo "Tel. " . $tel[$branch_id] . " | ABN 18 635 440 381" ?>
                </td>
            </tr>
            <tr>
                <td style="text-align: center;margin: 5px 0 5px;" colspan="2">
                    <img src="../img/peper-logo.black.png" style="margin: 10px 0 10px;width: 75%;"/>
                </td>
            </tr>
            <tr>
                <td width="55" align="right" valign="top" class="text-font"> ID :</td>
                <td valign="top" class="text-font"><?php echo $titleOrderID . str_pad($dataOrd['id'], 6, "0", STR_PAD_LEFT); ?></td>
            </tr>
            <tr>
                <td align="right" valign="top" class="text-font">Date :</td>
                <td valign="top" class="text-font"><?php echo str_replace(' ', '', $dataOrd['ord_date']); ?>
                    (<?php echo $dataOrd['ord_time']; ?>)
                </td>
            </tr>
            <tr>
                <td align="right" valign="top" class="text-font">Name :</td>
                <td valign="top" style="font-weight: 700;" class="text-font-bold"><?php echo $dataOrd['ord_cname']; ?></td>
            </tr>
            <tr>
                <td align="right" valign="top" class="text-font">Addr :</td>
                <td valign="top" style="font-weight: 700;" class="text-font-bold"><?php if ($dataOrd['ord_choicedelivery'] != 1) {
                        echo $dataOrd['ord_addr'] . " (" . $area . ")";
                    } else {
                        echo $area;
                    } ?></td>
            </tr>
            <tr>
                <td align="right" valign="top" class="text-font">Email :</td>
                <td valign="top" class="text-font"><?php echo $dataOrd['ord_mail']; ?></td>
            </tr>
            <tr>
                <td align="right" valign="top" class="text-font">Phone :</td>
                <td valign="top" style="font-weight: 700;" class="text-font-bold"><?php echo $dataOrd['ord_phone']; ?></td>
            </tr>
            <tr>
                <td align="right" valign="top" style="padding-right:5px;" class="text-font">Comment:</td>
                <td valign="top" class="text-font"><?php echo $dataOrd['ord_cmmt']; ?></td>
            </tr>
            <tr>
                <td align="right" valign="top" style="padding-right:5px;" class="text-font">Payment :</td>
                <?php if (($ord_payment != "Cash") && ($ord_payment != "")) {
                    $arrPay = split('No.', $ord_payment);
                    $pay = substr(trim($arrPay[0]), 0, -1); //payment type
                    $arrNo = split('Expiry Date', preg_replace('/(\[.*?\])/', '', $arrPay[1]));
                    $dummy = "XXXX XXXX XXXX ";
                    $no = substr(trim($arrNo[0]), -4); // pay no.
                    $printNew = '<span class="text-font-bold">'.$pay . '</span><br>No. <span style="font-size:5px;" class="text-font-bold">' . $dummy . $no . '</span> <br>Expiry Date <span style="font-size:9px;" class="text-font-bold">XX/XX</span><br>CVV <span style="font-size:9px;" class="text-font-bold">XXX</span>';
                    ?>
                    <!--<td valign="top" style="font-size:11px;!important;"><?php echo $dataOrd['ord_choicedelivery'] == 1 ? $pay : $printNew; ?></td>-->
                    <td valign="top" style="font-size:9px;!important;" class="text-font-bold"><?php echo $dataOrd['ord_payment']; ?></td>
                <?php } else { ?>
                    <td valign="top" style="font-size:9px;!important;" class="text-font-bold"><?php echo $dataOrd['ord_payment']; ?></td>
                <?php } ?>
            </tr>
            <tr style="margin-top: 10px;">
                <td colspan="2">
                    <table width="100%" cellspacing="0" cellpadding="0" style="margin-top: 10px;border-collapse: collapse;">
                        <?php
                        $sql = "select * from ordermenu where OrderID='$id' ";
                        $rsl = mysql_query($sql);
                        while ($data = mysql_fetch_array($rsl)) {
                            $pid = $data['p_id'];
                            $rid = $data['id'];
                            $chkChoice = $data['extra'];
                            $chkChoiceSelect = $data['choice'];
                            $chkChoiceSelect2 = $data['choice2'];
                            $note = $data['note'];

                            $sql2 = "select * from products where id='$pid' "; //get data product for show
                            $rsl2 = mysql_query($sql2);
                            $data2 = mysql_fetch_array($rsl2);
                            $catID = $data2['cat_id'];

                            $sql3 = "SELECT * FROM catname WHERE id='$catID' ";
                            $rsl3 = mysql_query($sql3);
                            $data3 = mysql_fetch_array($rsl3);
                            $catname = $data3['cat_name'];
                            ?>
                            <tr style="border: dotted 1px;">
                                <td align="left" valign="top" style="padding:3px; font-size:11px; line-height:10px;">
                                    <div style="width: 70%;float: left;">
                                        <span class="text-font-bold"><?php echo $data['p_qty']; ?> x</span>
                                        <span class="text-font-bold"><?php echo $data2['p_name']; ?><?php if ($data2['p_subname'] != '') {
                                                echo " - " . $data2['p_subname'];
                                            } ?></span>
                                        <div style="padding:3px 0 0 20px;">
                                            <?php
                                            $extraprice = 0;
                                            $choiceprice = 0;
                                            if ($chkChoiceSelect != '') {
                                                echo "<span class='text-font'>Choice :</span> ";
                                                $sql4 = "select * from choice where id='$chkChoiceSelect' ";
                                                $rsl4 = mysql_query($sql4);
                                                $item4 = mysql_fetch_array($rsl4);
                                                echo "<span style='font-size:12px; font-style:italic;' class='text-font-bold'> " . $item4['choice_name'] . "</span><br />";
                                                $choiceprice += $data['total_price'] == 0 ? $item4['choice_price'] : $data['total_price'] ;
                                            }

                                            if ($chkChoiceSelect2 != '') {
                                                echo "<span class='text-font'>Choice :</span> ";
                                                $sql4 = "select * from choice2 where id='$chkChoiceSelect2' ";
                                                $rsl4 = mysql_query($sql4);
                                                $item4 = mysql_fetch_array($rsl4);
                                                echo "<span style='font-size:12px; font-style:italic;' class='text-font-bold'> " . $item4['choice_name'] . "</span><br />";
                                                $choiceprice += $data['total_price'] == 0 ? $item4['choice_price'] : $data['total_price'] ;
                                            }

                                            if ($chkChoice != '') {   // Show Choice Extra
                                                $choice = explode(",", $chkChoice);
                                                $num = count($choice);
                                                echo "<span class='text-font'>Extra :</span> ";

                                                for ($i = 0; $i < $num; $i++) {
                                                    $selectChoice = $choice[$i];
                                                    $sql_extra_total = "select * from ordermenu_extra where ordermenu_id = '$rid' and extra_id = '$selectChoice'";
                                                    $rsl_extra_total = mysql_query($sql_extra_total);
                                                    $extra_item = mysql_fetch_array($rsl_extra_total);

                                                    $sql4 = "select * from  extra where id='$selectChoice' ";
                                                    $rsl4 = mysql_query($sql4);
                                                    $item4 = mysql_fetch_array($rsl4);
                                                    echo "<span style='font-size:12px; font-style:italic;' class='text-font-bold'> " . $item4['ex_name'] . "</span><span class='text-font'> ($" . number_format($item4['ex_price'], 2) . ")</span><br />";
                                                    $extraprice += $extra_item['total_price'] == 0 ? $item4['ex_price'] : $extra_item['total_price'] ;
                                                }
                                            }
                                            ?>
                                            <?php
                                            if ($data['p_cmmt'] != '') {
                                                echo "<div style='padding:3px 0 0 0;'><span class='text-font'>Comment :</span> <br /><span style='font-size:12px; font-style:italic;' class='text-font-bold'>" . $data['p_cmmt'] . "</span></div>";
                                            }
                                            if ($note != '') {
                                                echo "<div style='padding:3px 0 0 0;'><span class='text-font'>Note :</span> <br /><span style='font-size:12px; font-style:italic;' class='text-font-bold'>" . $note . "</span></div>";
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div style="width: 30%;float: right;text-align: right" class="text-font">
                                        <?php
                                        if($choiceprice > 0){
                                            $pp = ($choiceprice + $extraprice);
                                        }else{
                                            if($data['total_price'] == 0){
                                                if($data['product_price'] == 0){
                                                    $pp = $data2['p_price']*$data['p_qty'];
                                                }else{
                                                    $pp = $data['product_price']*$data['p_qty'];
                                                }
                                            }else{
                                                $pp = $data['total_price']+$extraprice;
                                            }
                                        }
                                        echo '$' . number_format($pp, 2);
                                        $subTotal += $pp ?>
                                    </div>
                                </td>
                            </tr>

                        <?php } ?>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top: 20px;">
                        <tr>
                            <td align="right" class="text-font">SUB&nbsp;TOTAL :</td>
                            <td width="70" align="right" style="padding-right:5px;">
                                <span class="text-font">$<?php echo number_format($subTotal, 2); ?></span></td>
                        </tr>
                        <?php
                        if($total_charge > 0){
                            $subTotal = $subTotal+$total_charge;?>
                            <tr>
                                <td align="right" style="padding:5px 0 0 0;" class="text-font">Charge order total < $35
                                </td>
                                <td align="right" style="padding:5px 5px 0 0;" class="text-font">
                                    $<?php echo number_format($total_charge, 2); ?></td>
                            </tr>
                        <?php }?>
                        <?php
                        if($total_credit_charge > 0){
                            $subTotal = $subTotal+$total_credit_charge;?>
                            <tr>
                                <td align="right" style="padding:5px 0 0 0;" class="text-font">Credit card charge 1.5%
                                </td>
                                <td align="right" style="padding:5px 5px 0 0;" class="text-font">
                                    $<?php echo intval(($total_credit_charge*100))/100; ?></td>
                            </tr>
                        <?php }?>
                        <?php
                        if($total_discount > 0){
                            $subTotal = $subTotal-$total_discount;?>
                            <tr>
                                <td align="right" style="padding:5px 0 0 0;" class="text-font">Discount(promocode:<?php echo $promotion_code;?>)
                                </td>
                                <td align="right" style="padding:5px 5px 0 0;" class="text-font">
                                    $<?php echo number_format($total_discount, 2); ?></td>
                            </tr>
                        <?php }?>
                        <?php
//                        if ($chkdiscount == 'yes') {
//                            $sumdiscount = ($subTotal * $discount) / 100;
//                            $subTotal = $subTotal - $sumdiscount;
//                            ?>
<!--                            <tr>-->
<!--                                <td align="right" style="padding:5px 0 0 0;" class="text-font">Discount --><?php //echo $discount; ?>
<!--                                    %-->
<!--                                </td>-->
<!--                                <td align="right" style="padding:5px 5px 0 0;" class="text-font">--->
<!--                                    $--><?php //echo number_format($sumdiscount, 2); ?><!--</td>-->
<!--                            </tr>-->
<!--                            --><?php
//                        }
                        if (($canOrderUnderMinPrice == "yes") && ($subTotal <= $minimumPrice) && ($subTotal != 0) && ($area != "Pick Up at Shop")) {
                            $subTotal = $subTotal + $OrderUnderMinPrice;
                            ?>
                            <tr>
                                <td align="right" style="padding:5px 0 0 0;" class="text-font">Delivery Fee :</td>
                                <td align="right" style="padding:5px 5px 0 0;" class="text-font">
                                    $<?php echo number_format($OrderUnderMinPrice, 2); ?></td>
                            </tr>
                            <?php
                        }
                        if (($area != '') && ($charge_price != 0)) { ?>
                            <tr>
                                <td align="right" style="padding:5px 0 0 0;" class="text-font">Delivery Area :</td>
                                <td align="right"
                                    style="padding:5px 5px 0 0;" class="text-font"><?php echo "<b>$" . number_format($charge_price, 2) . "</b>";
                                    $subTotal += $charge_price; ?></td>

                            </tr>
                            <?php
                        }
//                        if (($ord_payment != "Cash") && ($ord_payment != "") && ($surchargePercent != 0) && ($subTotal <= 20)) { ?>
<!--                            <tr>-->
<!--                                <td align="right" style="padding:5px 0 0 0;">Credit Card Surcharge-->
<!--                                    (--><?php //echo $surchargePercent; ?><!--%) :-->
<!--                                </td>-->
<!--                                <td align="right" style="padding:5px 5px 0 0;">-->
<!--                                    $--><?php //$surcharge = $subTotal * ($surchargePercent / 100);
//                                    $subTotal += $surcharge;
//                                    echo number_format($surcharge, 2); ?><!--</td>-->
<!--                            </tr>-->
<!--                        --><?php //} ?>
                        <tr>
                            <td align="right" style="padding-top:5px;">
                                <span style="font-size:18px;"class="text-font-bold">TOTAL :</span>
                            </td>
                            <td align="right" style="padding:5px 5px 0 0;"><span
                                    style="font-size:18px;" class="text-font-bold">$<?php echo intval(($subTotal*100))/100; ?></span></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="right" style="padding:5px 5px 0 0;">
                                <?php /* if($subTotal>=$overcon2) { echo '<b>FREE</b> '.$overcon2Free; }
			else if($subTotal>=$overcon1) { echo '<b>FREE</b> '.$overcon1Free; }*/ ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;padding-top: 10px;">
                    <span class="text-font">PEPPER SEEDS THANK YOU</span>
                </td>
            </tr>
            <tr>
                <td colspan="2"  style="text-align: center;">
                    <span class="text-font-bold"><?php echo $dataOrd['ord_cname']; ?></span>
                </td>
            </tr>

        <?php } ?>
        </tbody>
    </table>

</div>
<style type="text/css">
    @font-face {
        font-family: 'GothamLight';
        src: url('../fonts/GothamLight.eot');
        src: url('../fonts/GothamLight.eot?#iefix') format('embedded-opentype'), url('../fonts/GothamLight.woff2') format('woff2'), url('../fonts/GothamLight.woff') format('woff'), url('../fonts/GothamLight.ttf') format('truetype'), url('../fonts/GothamLight.svg#GothamLight') format('svg');
        font-weight: 700;
        font-style: normal;
    }

    @font-face {
        font-family: 'GothamBold';
        src: url('../fonts/Gotham-Bold.eot');
        src: url('../fonts/Gotham-Bold.eot?#iefix') format('embedded-opentype'), url('../fonts/Gotham-Bold.woff2') format('woff2'), url('../fonts/Gotham-Bold.woff') format('woff'), url('../fonts/Gotham-Bold.ttf') format('truetype'), url('../fonts/Gotham-Bold.svg#Gotham-Bold') format('svg');
        font-weight: bold;
        font-style: normal;
    }

    .text-font {
        font-family: 'GothamLight';
    }
    .text-font-bold{
        font-family: 'GothamBold';
    }
</style>
</body>
</html>
