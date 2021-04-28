<?php
include('../connect.php');
include('admin/query_statement.php');
session_start();

$sessID =  session_id();
$data = getQtyAndTotal($sessID);
if (mysql_num_rows($data) > 0) {
    $result = mysql_fetch_array($data);
    $extra = getTotalOrdExtraByOrderID($sessID);
    $total = $result['total'];
    if(mysql_num_rows($extra) > 0)
    {
        $resultExtra = mysql_fetch_array($extra);
        $total += $resultExtra['total'];
    }
    $_SESSION['serving'] = $result['qty'];
    $_SESSION['cartTotal'] = $total;
    $array = array('qty' => $result['qty'],
        'total' => $total);
    echo json_encode($array);
}else{
    echo "error";
}