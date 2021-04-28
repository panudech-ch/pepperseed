<?php

/**

 * Created by PhpStorm.

 * User: chawapon

 * Date: 2/19/2017

 * Time: 10:56 PM

 */

session_start();

$page = $_SESSION['currentPage'];
$branch_id = $_SESSION['branch_id'];
$branchInfo = getBranchById($branch_id);
?>
<link href="../inc/css/newfonts.css" rel="stylesheet" type="text/css" />
<div class="container-fluid">
    <div class="row">
        <div class="col-12" style="text-align: center;">

            <img src="../images/pepperseed_logo@2x.png" onclick="onPickBrachPage()" style="width: 80%;" />
        </div>
    </div>
    <div class="row" style="margin-top: 50px;">
        <div class="col-12" style="text-align: left;padding-left: 10%;margin-bottom: 15%;">
            <u>
                <h1><span style=" text-transform: uppercase;" class="HEADER_MENU-BebasBold"><?php echo $branchInfo["branch_name"]; ?></span> </h1>
            </u>
        </div>
        <div class="col-12" style="text-align: left;padding-left: 10%;margin-bottom: 15%;">
            <h2><a href="../inc/admin/menu_showOrderList.php?branch_id=<?php echo $branch_id ?>" class="HEADER_MENU-BebasBold">List (today) </a></h2>
        </div>
        <div class="col-12" style="text-align: left;padding-left: 10%;margin-bottom: 15%;">
            <h2><a href="../inc/admin/menu_showOrderListAll.php?condition=all&branch_id=<?php echo $branch_id ?>"  class="HEADER_MENU-BebasBold">List (all)</a></h2>

            <h2> <a href="../admin/add_cat.php" class="HEADER_MENU-BebasBold">Beckend</a></h2>
        </div>
        <div class="col-12" style="text-align: left;padding-left: 10%;margin-bottom: 15%;">
            -
        </div>
        <div class="col-12" style="text-align: left;padding-left: 10%;margin-bottom: 15%;">
            <h2><a href="../inc/admin/reservation.php?&branch_id=<?php echo $branch_id ?>" class="HEADER_MENU-BebasBold">Reservation</a></h2>

        </div>
        <div class="col-12" style="text-align: left;padding-left: 10%;margin-bottom: 15%;">
            -
        </div>
        <div class="col-12" style="text-align: left;padding-left: 10%;margin-bottom: 15%;">
            <h2><a href="../logout.php"  class="HEADER_MENU-BebasBold">Logout </a></h2>
        </div>

    </div>

</div>

<script type="text/javascript">
    function onPickBrachPage() {
        location.href = "../inc/admin/pick_branch.php";
    }
</script>