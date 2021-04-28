<?php
/**
 * Created by PhpStorm.
 * User: chawapon
 * Date: 5/21/2017
 * Time: 12:13 AM
 */
include('../connect.php');
include('../inc/admin/query_statement.php');

?>
<?php
    session_start();
    $promo_code = $_POST['code'];
    $cartTotal = $_POST['total'];
    $deliverymode = $_POST['deliverymode']; // Pickup,Delivery
    $payment_method = $_POST['paymentmethod'];
    $branch_id = $_SESSION['customer_branch'];

    $discountValue = 0;

    $promoData = getPromotionCodeByCode($promo_code,$branch_id);
    $rs = mysql_fetch_array($promoData);

    if($rs){
        $mode = $rs['promo_deliverymode']; //P = Pickup , D = Delivery, A = All Mode
        $modeFlag = false;
        if($mode == 'A'){
            $modeFlag = true;
        }elseif($mode == 'P' && $deliverymode == 'pickup'){
            $modeFlag = true;
        }elseif($mode == 'D' && $deliverymode == 'delivery'){
            $modeFlag = true;
        }else{
            $modeFlag = false;
            if($mode == 'P'){
                $arr = array('msg' => 'Can use for Pickup Only.');
            }else{
                $arr = array('msg' => 'Can use for Delivery Only.');
            }
            echo json_encode($arr);
        }

        if($modeFlag){
            $payment = $rs['promo_payment_type']; // C = Cash, V= Credit Card, A= All Payment
            $paymentFlag = false;
            if($payment == 'A'){
                $paymentFlag = true;
            }elseif ($payment == 'C' && $payment_method == 'Cash'){
                $paymentFlag = true;
            }elseif ($payment == 'V' && ($payment_method == 'Visa'|| $payment_method == 'Master Card' ) ){
                $paymentFlag = true;
            }else{
                $paymentFlag = false;
                if($payment == 'C'){
                    $arr = array('msg' => 'Can use for Cash Only!');
                }else{
                    $arr = array('msg' => 'Can use for Credit Card Only.');
                }
                echo json_encode($arr);
            }
        }

        if($paymentFlag) {
            $resType = $rs['promo_resmin_type']; //MT= MoreThan ,LT= LessThan, ME=MoreThanOrEqual, LE= LessThanOrEqual, E= Equal
            $conResFlag = false;

            if ($resType == 'MT') {
                if ($cartTotal > $rs['promo_resmin_value']) {
                    $conResFlag = true;
                } else {
                    $arr = array('msg' => 'Can use for Subtotal morethan $'.$rs['promo_resmin_value']);
                    echo json_encode($arr);
                }
            } elseif ($resType == 'LT') {
                if ($cartTotal < $rs['promo_resmin_value']) {
                    $conResFlag = true;
                } else {
                    $arr = array('msg' => 'Can use for SubTotal lessthan $'.$rs['promo_resmin_value']);
                    echo json_encode($arr);
                }
            } elseif ($resType == 'ME') {
                if ($cartTotal >= $rs['promo_resmin_value']) {
                    $conResFlag = true;
                } else {
                    $arr = array('msg' => 'Can use for SubTotal morethan or equal $'.$rs['promo_resmin_value']);
                    echo json_encode($arr);
                }
            } elseif ($resType == 'LE') {
                if ($cartTotal <= $rs['promo_resmin_value']) {
                    $conResFlag = true;
                } else {
                    $arr = array('msg' => 'Can use for SubTotal lessthan or equal $'.$rs['promo_resmin_value']);
                    echo json_encode($arr);
                }
            } elseif ($resType == 'E') {
                if ($cartTotal == $rs['promo_resmin_value']) {
                    $conResFlag = true;
                } else {
                    $arr = array('msg' => 'Can use for SubTotal equal $'.$rs['promo_resmin_value']);
                    echo json_encode($arr);
                }
            }

            if($conResFlag){
                $promoType = $rs['promo_type']; //D= Discount percent, F= Fix price
                if($promoType == 'D'){
                    $discountValue = ($rs['promo_value']/100)*$cartTotal;
                    $resValue = $rs['promo_value'].'%';
                }elseif($promoType == 'F'){
                    $discountValue = $rs['promo_value'];
                    $resValue = '$'.$rs['promo_value'];
                }

                $arr = array('discountValue' => $discountValue, 'resValue' => $resValue, 'msg' => '', 'deliveryMode' => $deliverymode);
                echo json_encode($arr);
            }
        }
    }else{
        $arr = array('msg' => 'Promotion Code Invalid!!');
        echo json_encode($arr);
    }

    


