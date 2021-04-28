<?php
session_start();
include('../connect.php');

if(!empty($_POST))
{
    if($_SESSION['customer_branch'] == 0 || $_SESSION['customer_branch'] == '' || $_SESSION['customer_branch'] == null){
        echo 'BranchError';
    }else{
        $delivery_mode = $_POST['delivery_mode'];
        $area = $_POST['area'];
        $addr = $_POST["address"];
        $cname = $_POST["name"];
        $mail = $_POST["email"];
        $phone = $_POST["phone"];
        $cmmt = $_POST["comment"];
        $email = $_POST['email'];
        $payment = $_POST['payment_mode'];
        $paymentall = $payment;
        $ordertime= 'dinner';
        $promo = $_POST['promo'];
        $branch_id = $_SESSION['customer_branch'];
        $card_no1 = $_POST['card_no1'];
        $card_no2 = $_POST['card_no2'];
        $card_no3 = $_POST['card_no3'];
        $card_no4 = $_POST['card_no4'];
        $cvv = $_POST['cvv'];
        $total_discount = $_POST['total_discount'];
        $total_charge = $_POST['total_charge'];
        $total_credit_charge = isset($_POST['total_credit_charge']) ? $_POST['total_credit_charge'] : 0;
        $cardno = '';
        // if(!empty($_POST['card_no1']))
        // {
        //     foreach ($_POST['card_no4'] as $no) {
        //         $cardno .= $no;
        //     }
        // }
        $cardno = $card_no1. " " .$card_no2. " ".$card_no3." ".$card_no4;

        if($payment == "Master Card"){
            $carno = $cardno;  $expirm = $_POST["exp_month"];   $expiry = $_POST["exp_year"];
            // $paymentall = $payment." / No.".$carno."  [card_no ".$card_no1."] [card_no ".$card_no2."] [card_no ".$card_no3."] [card_no ".$card_no4."][Expiry Date ".$expirm."/".$expiry."] [CVV ".$cvv."]";
            $paymentall = $payment." / No.".$carno." [Expiry Date ".$expirm."/".$expiry."] [CVV ".$cvv."]";
        }
        if($payment == "Visa"){
            $carno = $cardno;  $expirm = $_POST["exp_month"];   $expiry = $_POST["exp_year"];
            // $paymentall = $payment." / No.".$carno."  [card_no ".$card_no1."] [card_no ".$card_no2."] [card_no ".$card_no3."] [card_no ".$card_no4."][Expiry Date ".$expirm."/".$expiry."] [CVV ".$cvv."]";
            $paymentall = $payment." / No.".$carno." [Expiry Date ".$expirm."/".$expiry."] [CVV ".$cvv."]";
        }

        date_default_timezone_set('Australia/Sydney');
        $dateOrd= date(" j / n / Y");
        $timeOrd= date(" g:i a");

        if(($cname!='') && ($area !='')) {
            $promo = $total_discount > 0 ? $promo : '';

            $sqlAdd = "INSERT INTO orderno(
			ord_choicedelivery, 
			ord_addr,  
			ord_cname, 
			ord_mail, 
			ord_phone, 
			ord_cmmt, 
			ord_payment, 
			ord_date, 
			ord_time,
			branch_id,
			ord_ordertime,
			promotion_code,
			total_discount,
			total_charge,
            total_credit_charge
		)VALUES(
			'$area', 
			'$addr', 
			'$cname', 
			'$mail', 
			'$phone', 
			'$cmmt', 
			'$paymentall',
			'$dateOrd', 
			'$timeOrd', 
			'$branch_id', 
			'$ordertime',
			'$promo',
			'$total_discount',
			'$total_charge',
            '$total_credit_charge'
		)";
            $result = mysql_query($sqlAdd);

            if($result){
                $intOrderID = mysql_insert_id(); // Get  Lastest ID
                $strSQL = "UPDATE ordermenu SET OrderID = '" . $intOrderID . "' ,ses_num = ''  WHERE ses_num = '" . session_id() . "'  ";
                $objQuery = mysql_query($strSQL);
                $sessionLogin = $_SESSION['sessionLogin'];
                $customer_branch = $_SESSION['customer_branch'];
                session_unset();
                $_SESSION['sessionLogin'] = $sessionLogin;
                $_SESSION['customer_branch'] = $customer_branch ;
                include("../menu_orderMail-sys.php");
                echo $intOrderID;
            }else{
                echo 'ERROR';
            }


        }else{
            echo 'ERROR';
        }
    }
}else{
    echo 'ERROR';
}
