<?php
    include('header.php');
    include('connect.php');
    include('inc/admin/check_admin.php');
    include('inc/admin/query_statement.php');
?>
<?php
    session_start();
    $chkPage='home';
    $_SESSION['currentPage'] = $chkPage;
    $isAdmin = $_SESSION['isAdmin'];

    $bgData = getBgByPage('bg_'.$chkPage);
?>
<!--body modify at 2017.01.24-->
<body class="bg_home" <?php if($bgData != null) {?>style="background: url(<?php echo $bgData['img_path'];?>) no-repeat center center " <?php } else { echo 'inc/img/bg-home.png';} ?>>
<?php if($isAdmin){?>
    <div id="modify_bg" style="float: right">
        Edit Background<a href="inc/admin/edit_bg.php?page=<?php echo $chkPage; ?>" class='bg'><img src="images/bt-edit.png" border="0" align="absmiddle" /></a>
    </div>
<?php } ?>

<div class="container"><!--JavaScript--></div>

<script type="text/javascript" src="inc/js/index.min.js"></script>

<?php include('inc/footer_home.php'); ?>

<style type="text/css">
    .navtop{display: none;}
</style>
