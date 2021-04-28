<?php

/**
 * Created by PhpStorm.
 * User: chawapon
 * Date: 1/29/2017
 * Time: 7:52 PM
 */
include_once('../../connect.php');

function getBranchById($id)
{

    $sql_sel = "SELECT * FROM branch where ID='$id' ";

    $rs_sel = mysql_query($sql_sel);
    $rs_arr = mysql_fetch_array($rs_sel);
    return $rs_arr;
}

function updateBranchByAvailable($id, $column, $value)
{
    $sql_upd = "UPDATE branch SET $column = '$value' WHERE id ='$id'";

    $rs_upd = mysql_query($sql_upd);
    return $rs_upd;
}

function createMediaByUpload($imgPath, $imgName, $imgBranchId, $imgPage)
{
    $sql_inst = "INSERT INTO media(img_path,img_name,img_branchId,img_page,img_status) VALUES('$imgPath','$imgName','$imgBranchId','$imgPage',0)";
    $rs_inst = mysql_query($sql_inst);
    return $rs_inst;
}

function updateStatusOnMedia($id, $status)
{
    $sql_upd = "UPDATE media SET img_status = '$status' WHERE id = '$id'";
    $rs_upd = mysql_query($sql_upd);
    return $rs_upd;
}

function updateStatusOffMedia($page)
{
    $sql_upd = "UPDATE media SET img_status = 0 WHERE img_page = '$page'";
    $rs_upd = mysql_query($sql_upd);
    return $rs_upd;
}

function updateStatusMedia($id, $status)
{
    $sql_upd = "UPDATE media SET img_status = '$status' WHERE id = '$id'";
    $rs_upd = mysql_query($sql_upd);
    return $rs_upd;
}

function deleteMedia($id)
{
    $sql_del = "DELETE FROM media WHERE id='$id'";
    $rs_del = mysql_query($sql_del);
    return $rs_del;
}

function getMediaByPage($page)
{
    $sql_sel = "SELECT M.*,P.lable FROM media AS M JOIN parameter AS P ON P.code = '002' AND P.value= M.img_status  WHERE M.img_page = '$page'";
    $rs_sel = mysql_query($sql_sel);
    return $rs_sel;
}

function getMediaActiveByPage($page)
{
    $sql_sel = "SELECT M.*,P.lable FROM media AS M JOIN parameter AS P ON P.code = '002' AND P.value= M.img_status  WHERE M.img_page = '$page' AND M.img_status = 1";
    $rs_sel = mysql_query($sql_sel);
    return $rs_sel;
}

function getMediaById($id)
{
    $sql_sel = "SELECT * FROM media WHERE id ='$id'";
    $rs_sel = mysql_query($sql_sel);
    $rs = mysql_fetch_array($rs_sel);
    return $rs;
}

function getBgByPage($page)
{
    $sql_sel = "SELECT M.* FROM media AS M JOIN parameter AS P ON P.code = '002' AND P.value= M.img_status WHERE M.img_page = '$page' AND P.lable = 'On'";
    $rs_sel = mysql_query($sql_sel);
    $rs = mysql_fetch_array($rs_sel);
    return $rs;
}

function getSlideForGalleriesPage($page)
{
    $sql_sel = "SELECT M.*,P.lable FROM media AS M JOIN parameter AS P ON P.code = '002' AND P.value= M.img_status  WHERE M.img_page = '$page' AND M.img_status = 1";
    $rs_sel = mysql_query($sql_sel);
    return $rs_sel;
}

function getContentByPageSection($remark)
{
    $sql_sel = "SELECT * FROM firstpage WHERE remark_detail = '$remark'";
    $rs_sel = mysql_query($sql_sel);
    $rs = mysql_fetch_array($rs_sel);
    return $rs;
}

function getAllBranch()
{
    $sql_sel = "SELECT ID,BRANCH_NAME FROM branch ORDER BY ID ASC";
    $rs_sel = mysql_query($sql_sel);
    return $rs_sel;
}

function createBooking($venue, $numP, $date, $time, $name, $contactnum, $email)
{
    $sql_inst = "INSERT INTO booking(venue, numpeople, date, time, name, contactnum, email) VALUES('$venue','$numP','$date','$time','$name','$contactnum','$email')";
    $rs_inst = mysql_query($sql_inst);
    return $rs_inst;
}

function getStatusBracne($branch_id)
{
    $sql_sel = "SELECT * FROM branch WHERE id=$branch_id  and open_close = '1'";
    $rs_sel = mysql_query($sql_sel);
    return $rs_sel;
}
function getAllCategoryByBranchId($branch_id)
{
    $sql_sel = "SELECT * FROM catname WHERE branch_id=$branch_id ORDER BY id ASC";
    $rs_sel = mysql_query($sql_sel);
    return $rs_sel;
}

function getAllActiveCategoryByBranchId($branch_id)
{
    $sql_sel = "SELECT * FROM catname WHERE branch_id=$branch_id AND cat_status = 1 ORDER BY id ASC";
    $rs_sel = mysql_query($sql_sel);
    return $rs_sel;
}

function getCategoryByBranchIdAndName($branch_id, $name)
{
    $sql_sel = "SELECT * FROM catname WHERE branch_id=$branch_id AND (LOWER(cat_name) like LOWER('%$name') OR LOWER(cat_name) like LOWER('$name%') OR LOWER(cat_name) like LOWER('%$name%') OR LOWER(cat_name) = LOWER('$name')) ORDER BY id ASC";
    $rs_sql = mysql_query($sql_sel);
    return $rs_sql;
}

function getAllCategoryByBranchIdIsActive($branch_id)
{
    $sql_sel = "SELECT * FROM catname WHERE branch_id=$branch_id  AND cat_status = 1 ORDER BY id ASC";
    $rs_sql = mysql_query($sql_sel);
    return $rs_sql;
}

function getAllDeliveryAreaByBranchId($branch_id)
{
    $sql_sel = "SELECT * FROM deliveryarea WHERE id!=1 && id!=2 && id!=15 && id!=16 && branch_id=$branch_id ORDER BY id ASC";
    $rs_sel = mysql_query($sql_sel);
    return $rs_sel;
}

function getAllActiveDeliveryArea($branch_id)
{
    $sql_sel = "SELECT * FROM deliveryarea WHERE id!=1 && id!=2 && id!=15 && id!=16 && branch_id=$branch_id && deli_status = 1 ORDER BY id ASC";
    $rs_sel = mysql_query($sql_sel);
    return $rs_sel;
}

function getDeliveryAreaByBranchIdAndName($branch_id, $name)
{
    $sql_sel = "SELECT * FROM deliveryarea WHERE id!=1 && id!=2 && id!=15 && id!=16 AND branch_id = $branch_id AND (area LIKE '%$name' OR area LIKE '$name%' OR area LIKE '%$name%' OR area = '$name') ORDER BY id ASC";
    $rs_sel = mysql_query($sql_sel);
    return $rs_sel;
}

function getAllPromotions($branch_id)
{
    $branch_id = 0;
    $sql_sql = "SELECT * FROM promotions WHERE  branch_id=$branch_id  ORDER BY id ASC";
    $rs_sel = mysql_query($sql_sql);
    return $rs_sel;
}

function getPromotionsByBranchIdAndName($branch_id, $name)
{
    $condition = "";
    if ($name !== "") {
        $condition =    " AND (name LIKE '%$name%') ORDER BY id ASC";
    }
    //  $sql_sel = "SELECT * FROM promotions WHERE branch_id = $branch_id AND (name LIKE '%$name%') ORDER BY id ASC";
    $sql_sel = "SELECT * FROM promotions WHERE 1=1 $condition";

    $rs_sel = mysql_query($sql_sel);
    return $rs_sel;
}

function getPromotionIsActive()
{
    $sql_sel = "SELECT * FROM promotions WHERE status = 1 ORDER BY id ASC";
    $rs_sel = mysql_query($sql_sel);
    return $rs_sel;
}

function getPromotionByIdAndBranch($id, $branch_id)
{
    $sql_sel = "SELECT * FROM promotions WHERE id = $id AND branch_id = $branch_id ";
    $rs_sel = mysql_query($sql_sel);
    return $rs_sel;
}

function getAllChoiceByBranchId($branch_id)
{
    $sql_sel = "SELECT C.*,CAT.cat_name FROM choice AS C JOIN catname AS CAT ON C.cat_id = CAT.id WHERE C.branch_id = $branch_id ORDER BY C.id ASC";
    $rs_sel = mysql_query($sql_sel);
    return $rs_sel;
}

function getChoiceByFilter($choiceName, $choicePrice, $catId, $branchId)
{
    $sql_sel = "SELECT C.*,CAT.cat_name FROM choice AS C JOIN catname AS CAT ON C.cat_id = CAT.id WHERE C.branch_id = $branchId ";
    $choiceName != '' ? $sql_sel .= " AND (C.choice_name = '$choiceName' OR C.choice_name LIKE '%$choiceName' OR C.choice_name LIKE '$choiceName%' OR C.choice_name LIKE '%$choiceName%')" : '';
    $choicePrice != '' ? $sql_sel .= " AND FORMAT(C.choice_price,2) = FORMAT($choicePrice,2) " : '';
    $catId != '' ? $sql_sel .= " AND C.cat_id = $catId" : '';
    $sql_sel .= " ORDER BY C.id ASC ";
    $rs_sel = mysql_query($sql_sel);
    return $rs_sel;
}

function getChoiceByCateID($catId, $branchId)
{
    $sql_sel = "SELECT * FROM choice WHERE cat_id ={$catId} AND branch_id = {$branchId} AND choice_stat = 1 ORDER BY id ASC ";
    $rs_sel = mysql_query($sql_sel);
    return $rs_sel;
}

function getAllergy()
{
    $sql_sel = "SELECT * FROM infomation WHERE info_type = 'Allergy' ORDER BY id ASC ";
    $rs_sel = mysql_query($sql_sel);
    return $rs_sel;
}

function getChoiceByChoiceId($id)
{
    $sql_sel = "SELECT * FROM choice WHERE id IN($id)";
    $rs_sel = mysql_query($sql_sel);
    return $rs_sel;
}

function getAllExtra()
{
    $sql_sel = "SELECT * FROM extra ORDER BY id ASC";
    $rs_sel = mysql_query($sql_sel);
    return $rs_sel;
}

function getExtraById($id)
{
    $sql_sel = "SELECT * FROM extra WHERE id IN ($id) ORDER BY id ASC";
    $rs_sel = mysql_query($sql_sel);
    return $rs_sel;
}

function getAllMenuByBranchId($branch_id)
{
    $sql_sel = "SELECT P.*,C.cat_name FROM products AS P JOIN catname AS C ON P.cat_id = C.id WHERE C.branch_id = $branch_id ORDER BY C.id,P.id ASC";
    $rs_sel = mysql_query($sql_sel);
    return $rs_sel;
}

function getAllMenuByFilter($branch_id, $name, $cat, $price)
{
    $sql_sel = "SELECT P.*,C.cat_name FROM products AS P JOIN catname AS C ON P.cat_id = C.id WHERE P.branch_id = $branch_id ";
    $name != '' ? $sql_sel .= " AND (P.p_name LIKE '%$name' OR P.p_name LIKE '$name%' OR P.p_name LIKE '%$name%' OR P.p_name = '$name') " : "";
    $cat != '' ? $sql_sel .= " AND P.cat_id = $cat " : "";
    $price != '' ? $sql_sel .= " AND FORMAT(P.p_price,2) = FORMAT($price,2) " : "";
    $sql_sel .= "ORDER BY C.id,P.id ASC";
    $rs_sel = mysql_query($sql_sel);
    return $rs_sel;
}

function getMenuByID($id)
{
    $sql_sel = "SELECT * FROM products WHERE id = {$id} ";
    $rs_sel = mysql_query($sql_sel);
    return $rs_sel;
}

function getProductByCatname($cat_name)
{
    $sql_sel = "SELECT P.* FROM products AS P JOIN catname AS C ON P.cat_id = C.id WHERE P.status = 1 AND LOWER(REPLACE(C.cat_name,' ','')) = LOWER('$cat_name') ORDER BY P.id ASC";
    $rs_sel = mysql_query($sql_sel);
    return $rs_sel;
}

function getProductByCatId($cat_id)
{
    $sql_sel = "SELECT P.* FROM products AS P JOIN catname AS C ON P.cat_id = C.id WHERE P.status = 1 AND P.cat_id = $cat_id ORDER BY P.id ASC";
    $rs_sel = mysql_query($sql_sel);
    return $rs_sel;
}

function getProductById($product_id)
{
    $sql_sel = "SELECT * FROM products WHERE id = $product_id";
    $rs_sel = mysql_query($sql_sel);
    return $rs_sel;
}

function getStatusOrderOnline($branch_id)
{
    $sql_sel = "SELECT * FROM branch WHERE id=$branch_id";
    $rs_sel = mysql_query($sql_sel);
    return $rs_sel;
}

function getCartByProductIdAndSessionId($product_id, $session_id, $choice_id, $extra, $note)
{
    $sql_sel = "SELECT * FROM  ordermenu WHERE p_id = $product_id AND ses_num = '$session_id' ";
    $sql_sel .= $choice_id != null ? " AND choice = '$choice_id' " : " AND choice = '' ";
    $sql_sel .= $extra != null ? " AND extra = '$extra' " : " AND extra = '' ";
    $sql_sel .= $note != null ? " AND note = '$note' " : " AND note = '' ";
    $rs_sel = mysql_query($sql_sel);
    return $rs_sel;
}

function getCartBySessionId($session_id)
{
    $sql_sel = "SELECT ORD.*,P.p_name FROM ordermenu AS ORD JOIN products AS P ON ORD.p_id = P.id WHERE ORD.ses_num = '$session_id' ORDER BY ORD.id ASC";
    $rs_sel = mysql_query($sql_sel);
    return $rs_sel;
}

function getCartByID($cart_id)
{
    $sql_sel = "SELECT * FROM ordermenu WHERE id = $cart_id";
    $rs_sel = mysql_query($sql_sel);
    return $rs_sel;
}

function createNewCartEntry($product_id, $product_qty, $product_price, $choice_price, $session_id, $choice_id, $extra, $note, $total_price)
{
    $sql_inst = "INSERT INTO ordermenu(p_id, p_qty, ses_num, extra, choice, choice2, note, product_price, choice_price, total_price) VALUES($product_id,$product_qty,'$session_id','$extra','$choice_id','','$note',$product_price, $choice_price, $total_price)";
    $rs_inst = mysql_query($sql_inst);
    return $rs_inst;
}

function updateCartEntry($id, $product_qty, $product_price, $choice_price, $total_price)
{
    $sql_upd = "UPDATE ordermenu SET p_qty = $product_qty
                                    ,product_price = $product_price
                                    ,choice_price = $choice_price
                                    ,total_price = $total_price
                        WHERE id = $id";
    $rs_upd =  mysql_query($sql_upd);
    return $rs_upd;
}


function updateExtra($ordid, $extid, $ext_price, $total_price)
{
    $sql_upd = "UPDATE ordermenu_extra SET extra_price = $ext_price,total_price = $total_price
                  WHERE ordermenu_id=$ordid AND extra_id=$extid";
    $rs_upd = mysql_query($sql_upd);
    return $rs_upd;
}

function deleteCartEntry($id)
{
    $sql_del = "DELETE FROM ordermenu WHERE id = $id";
    $rs_del = mysql_query($sql_del);
    return $rs_del;
}

function createCartExtraPrice($ordermenu_id, $extra_id, $extra_price, $total_price)
{
    $sql_inst = "INSERT INTO ordermenu_extra (ordermenu_id, extra_id, extra_price, total_price) VALUES ($ordermenu_id, $extra_id, $extra_price, $total_price)";
    $rs_inst = mysql_query($sql_inst);
    return $rs_inst;
}

function getCartExtraPrice($orderMenu_id)
{
    $sql_sel = "SELECT * FROM ordermenu_extra WHERE ordermenu_id = $orderMenu_id";
    $rs_sel = mysql_query($sql_sel);
    return $rs_sel;
}

function getCartExtraPriceByOrderMenuIdAndExtraId($orderMenu_id, $extra_id)
{
    $sql_sel = "SELECT * FROM ordermenu_extra WHERE ordermenu_id = $orderMenu_id AND extra_id = $extra_id";
    $rs_sel = mysql_query($sql_sel);
    return $rs_sel;
}

function getDeliveryForCheckout($branch_id)
{
    $sql_sel = "select * from deliveryarea WHERE branch_id='$branch_id' && id!=1 && id!=2 && id!=16 && id!=15 ORDER BY id ASC";
    $rs_sel = mysql_query($sql_sel);
    return $rs_sel;
}

function getQtyAndTotal($session_id)
{
    $sql_sel = "SELECT ORD.id as id,sum(ORD.p_qty) as qty , round(sum(total_price),2) as total FROM ordermenu AS ORD  WHERE ORD.ses_num = '$session_id' ORDER BY ORD.id ASC";

    $rs_sel = mysql_query($sql_sel);
    return $rs_sel;
}

function getTotalOrdExtraByOrderID($session_id)
{
    $sql_sel = "SELECT round(sum(total_price),2) as total FROM ordermenu_extra WHERE ordermenu_id in (SELECT id FROM ordermenu WHERE ses_num = '{$session_id}') ";
    $rs_sel = mysql_query($sql_sel);
    return $rs_sel;
}



function getPromotionCodeByID($id)
{
    $sql_sel = "SELECT * FROM promocode WHERE id = {$id} ";
    $rs_sel = mysql_query($sql_sel);
    return $rs_sel;
}


function getPromotionCodeByCode($code, $branch_id)
{
    $sql_sel = "SELECT * FROM promocode WHERE promo_code = '{$code}' AND promo_branch = {$branch_id} AND promo_stat = 1";
    $rs_sel = mysql_query($sql_sel);
    return $rs_sel;
}
function getAllPromotionCodeByBranchId($branch_id)
{
    $sql_sel = "SELECT pmc.*, prm1.lable as 'type_label' , prm2.lable as 'resmin_label', prm3.lable as 'delivery_label', prm4.lable as 'payment_label'
                  FROM promocode AS pmc
                  LEFT JOIN parameter AS prm1 ON prm1.name='Promotion Type' AND pmc.promo_type = prm1.value 
                  LEFT JOIN parameter AS prm2 ON prm2.name='Promotion Restriction Minimum Type' AND pmc.promo_resmin_type = prm2.value
                  LEFT JOIN parameter AS prm3 ON prm3.name='Promotion Code Delivery Type' AND pmc.promo_deliverymode = prm3.value
                  LEFT JOIN parameter AS prm4 ON prm4.name='Promotion Payment Type' AND pmc.promo_payment_type = prm4.value
                  WHERE pmc.promo_branch =$branch_id 
                  ORDER BY id ASC";
    $rs_sel = mysql_query($sql_sel);
    return $rs_sel;
}
function getPromotionCodeByCodeFilter($branch_id, $code)
{

    $sql_sel = "SELECT pmc.*, prm1.lable as 'type_label' , prm2.lable as 'resmin_label', prm3.lable as 'delivery_label', prm4.lable as 'payment_label'
    FROM promocode AS pmc
    LEFT JOIN parameter AS prm1 ON prm1.name='Promotion Type' AND pmc.promo_type = prm1.value 
    LEFT JOIN parameter AS prm2 ON prm2.name='Promotion Restriction Minimum Type' AND pmc.promo_resmin_type = prm2.value
    LEFT JOIN parameter AS prm3 ON prm3.name='Promotion Code Delivery Type' AND pmc.promo_deliverymode = prm3.value
    LEFT JOIN parameter AS prm4 ON prm4.name='Promotion Payment Type' AND pmc.promo_payment_type = prm4.value
    WHERE pmc.promo_branch =$branch_id and (LOWER(pmc.promo_code) like LOWER ('%$code') OR LOWER(pmc.promo_code) like LOWER('$code%') OR LOWER(pmc.promo_code) like LOWER('%$code%') OR LOWER(pmc.promo_code) = LOWER('$code'))
    ORDER BY id ASC";
    $rs_sel = mysql_query($sql_sel);
    return $rs_sel;
    // $sql_sel = "SELECT * FROM promocode WHERE LOWER(promo_code) like LOWER ('%$code') OR LOWER(promo_code) like LOWER('$code%') OR LOWER(promo_code) like LOWER('%$code%') OR LOWER(promo_code) = LOWER('$code') ORDER BY id ASC";
    // $rs_sel = mysql_query($sql_sel);
    // return $rs_sel;
}

function getAllPromotionCodeType()
{
    $sql_sel = "SELECT * FROM parameter where name='Promotion Type' ";
    $rs_sel = mysql_query($sql_sel);
    return $rs_sel;
}

function getAllRestricionPromotion()
{
    $sql_sel = "SELECT * FROM parameter where name='Promotion Restriction Minimum Type' ";
    $rs_sel = mysql_query($sql_sel);
    return $rs_sel;
}

function getAllAvaliableDeliveryMode()
{
    $sql_sel = "SELECT * FROM parameter where name='Promotion Code Delivery Type' ";
    $rs_sel = mysql_query($sql_sel);
    return $rs_sel;
}

function getAllAvialablePaymentMode()
{
    $sql_sel = "SELECT * FROM parameter where name='Promotion Payment Type' ";
    $rs_sel = mysql_query($sql_sel);
    return $rs_sel;
}

function getCheckoutSettingByBranch($branch)
{
    $sql_sel = "SELECT c.*,b.branch_name FROM checkout_setting as c
                JOIN branch as b ON c.branch = b.id 
                where c.branch={$branch} ";
    $rs_sel = mysql_query($sql_sel);
    return $rs_sel;
}

function getCheckoutSettingById($id)
{
    $sql_sel = "SELECT c.*,b.branch_name FROM checkout_setting as c
                JOIN branch as b ON c.branch = b.id 
                where c.id={$id} ";
    $rs_sel = mysql_query($sql_sel);
    return $rs_sel;
}

function getAllCheckoutSetting()
{
    $sql_sel = "SELECT c.*,b.branch_name FROM checkout_setting as c
                JOIN branch as b ON c.branch = b.id";
    $rs_sel = mysql_query($sql_sel);
    return $rs_sel;
}

function getAllCheckputSettingMode()
{
    $sql_sel = "SELECT * FROM parameter where name='Checkout Setting' ";
    $rs_sel = mysql_query($sql_sel);
    return $rs_sel;
}

function updateOrderPaymentToNull()
{
    $sql_upd = "UPDATE orderno SET ord_payment = NULL
                  WHERE ord_payment is not null and date_format(str_to_date(ord_date, '%d / %m/ %Y'), '%Y-%m-%d') < now()";
    $rs_upd = mysql_query($sql_upd);
    return $rs_upd;
}

function updateOrderPrinted($id)
{
    $sql_upd = "UPDATE orderno SET is_printed = 1 WHERE id ={$id} and is_printed is null";
    $rs_upd = mysql_query($sql_upd);
    return $rs_upd;
}

?>


