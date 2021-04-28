<?php
/**
 * Created by PhpStorm.
 * User: chawapon
 * Date: 2/26/2017
 * Time: 11:55 PM
 */
    include('connect.php');
    include('inc/admin/query_statement.php');
    session_start();
    $sesid = session_id();
    $branch = getBranchById(1);

    $product_id =$_POST['product_id'];
    $product_qty = $_POST['product_qty'];
    $product_price = $_POST['product_price'];
    $choice = $_POST['choice_id'];
    $note = $_POST['note'];

    //substring
    $choice_price = 0;
    if (!empty($choice)) {
        if (strpos($choice, ',')) {
            $choice_price = substr($choice, strpos($choice, ',') + 1);
            $choice = substr($choice, 0, strpos($choice, ','));
        }
    }

    $extra_price = 0;
    if (!empty($_POST['extra'])) {
        $arr_ext_id = array();
        $arr_ext_price = array();
        foreach ($_POST['extra'] as $extra) {
            if ($p_extra != '') {
                if (strpos($extra, ',')) {
                    $extra_price = substr($extra, strpos($extra, ',') + 1);
                    $extra_id = substr($extra, 0, strpos($extra, ','));
                    $p_extra .= ',' . $extra_id;
                    array_push($arr_ext_id, $extra_id);
                    array_push($arr_ext_price, $extra_price);
                } else {
                    $p_extra .= ',' . $extra;
                }

            } else {
                if (strpos($extra, ',')) {
                    $extra_price = substr($extra, strpos($extra, ',') + 1);
                    $extra_id = substr($extra, 0, strpos($extra, ','));
                    $p_extra .= $extra_id;
                    array_push($arr_ext_id, $extra_id);
                    array_push($arr_ext_price, $extra_price);
                } else {
                    $p_extra .= $extra;
                }
            }
        }
    }

    if($_GET['mode'] == 'update-qty'){
        $cart_id = isset($_POST['cart_id']) ? $_POST['cart_id'] : '';
        $cart = getCartByID($cart_id);
        while ($rs = mysql_fetch_assoc($cart)) {
            if ($product_price == null || $product_price == '') {
                $p = getProductById($rs['p_id']);
                $rp = mysql_fetch_array($p);
                $product_price  = $rp ? $rp['p_price'] : 0;
            }
            if ($choice_price == null || $choice_price == '') {
                $c = getChoiceByChoiceId($rs['choice']);
                $rc = mysql_fetch_array($c);

                $choice_price = $rc ? $rc['choice_price'] : 0;
            }
            $updateCart = updateCartEntry($rs['id'], $product_qty, $product_price , $choice_price , $choice_price > 0 ? $product_qty * $choice_price : $product_qty * $product_price );
            $arrEx = explode(',', $rs['extra']);
            foreach ($arrEx as $ex) {
                $x = getExtraById($ex);
                $rex = mysql_fetch_array($x);
                $updateExtra = updateExtra($rs['id'], $rex['id'],$rex['ex_price'], $product_qty * $rex['ex_price']);
            }
            echo $updateCart ? "SUCCESS" : "ERROR";
        }
    }else if($_GET['mode'] == 'delete'){
        $id = $_POST['id'];
        $del = deleteCartEntry($id);
        if($del){
            echo "SUCCESS";
        }else{
            echo "ERROR";
        }
    }else {
        if ($product_id != '') {
            $cartData = getCartByProductIdAndSessionId($product_id, $sesid, $choice, $p_extra, $note);
            if (mysql_num_rows($cartData) == 0) {
                $createCart = createNewCartEntry($product_id, $product_qty, $product_price , $choice_price , $sesid, $choice, $p_extra, $note, $choice_price > 0 ? $choice_price*$product_qty : $product_price*$product_qty);
                $orderMenuId = mysql_insert_id();
                $i = 0;
                foreach ($arr_ext_id as $extId) {
                    createCartExtraPrice($orderMenuId, $extId, $arr_ext_price[$i], $arr_ext_price[$i] * $product_qty);
                    $i++;
                }
                echo $cartData ? "SUCCESS" : "ERROR";
            } else {
                while ($rs = mysql_fetch_assoc($cartData)) {
                    if ($product_price == null || $product_price == '') {
                        $p = getProductById($rs['p_id']);
                        $rp = mysql_fetch_array($p);
                        $product_price = $rp['p_price'];
                    }
                    if ($choice_price == null || $choice_price == '') {
                        $c = getChoiceByChoiceId($rs['choice']);
                        $rc = mysql_fetch_array($c);
                        if($rc){
                            $choice_price = $rc['choice_price'];
                        }
                    }
                    $updateCart = updateCartEntry($rs['id'], $rs['p_qty'] + $product_qty, $product_price, $choice_price, $choice_price > 0 ? ($rs['p_qty'] + $product_qty)*$choice_price : ($rs['p_qty'] + $product_qty)*$product_price );
                    $arrEx = explode(',', $rs['extra']);
                    foreach ($arrEx as $ex) {
                        $x = getExtraById($ex);
                        $rex = mysql_fetch_array($x);
                        $updateExtra = updateExtra($rs['id'], $rex['id'], $rex['ex_price'],($rs['p_qty'] + $product_qty) * $rex['ex_price']);
                    }
                    echo $updateCart ? "SUCCESS" : "ERROR";
                }
            }
        }
    }
?>