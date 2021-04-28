<?php
/**
 * Created by PhpStorm.
 * User: indywib
 * Date: 1/26/2017
 * Time: 7:59 PM
 */
include('header.php');
include('connect.php');
include('inc/admin/query_statement.php');
?>
<?php
session_start();
$chkPage = 'aboutus';
$_SESSION['currentPage'] = $chkPage;
$isAdmin = $_SESSION['isAdmin'];

$bgData = getBgByPage('bg_' . $chkPage);
$headerData = getContentByPageSection('Title_aboutus');

?>
<!--body modify at 2017.01.24-->
<body class="bg_aboutus"
      <?php if ($bgData != null) { ?>style="background: url(<?php echo $bgData['img_path']; ?>) no-repeat center center" <?php } ?>>
<div class="left_content">
    <div class="content_aboutus">
        <?php include('inc/slide_menu.php'); ?>
    </div>
</div>

<div class="right_content" style="height: 100vh;">
    <?php if ($isAdmin) { ?>
        <div id="modify_bg" style="float: right">
            Edit Background<a href="inc/admin/edit_bg.php?page=<?php echo $chkPage; ?>" class='bg'><img
                    src="images/bt-edit.png" border="0" align="absmiddle"/></a>
        </div>
    <?php } ?>
    <div class="content_aboutus">

        <div class="title_header">
            <?php if ($headerData['firstpage'] != null) {
                echo $headerData['firstpage'];
            } else { ?> DARLINGS! <?php } ?>
            <?php if ($isAdmin) { ?> <a href="admin/edit_firstpage.php?id=<?php echo $headerData['id']; ?>"
                                        class="bg"><img src="images/bt-edit.png" border="0"
                                                        align="absmiddle"/></a> <?php } ?>
        </div>
        <hr class="line_title">
        <div class="clearfixed"></div>
        <div class="slocan"><!-- JavaScript --></div>
        <!--<div class="footer_right">
                <?php /*include('inc/footer_right.php'); */ ?>
            </div>-->
    </div>

</div>


<?php include('inc/footer.php'); ?>

<script type="text/javascript">
    $(document).ready(function () {
        $('.slocan')
            .load('inc/slocan.php')
            .css({opacity: 0})/*set opacity to 0*/
            .delay(2E0)/*wait 2 seconds*/
            .animate({opacity: 1});
        setTimeout(function () {
            $('.slocan').load('inc/history.php', function () {
                $(this).css({opacity: 0})/*set opacity to 0*/
                    .delay(4E0)/*wait 2 seconds*/
                    .animate({opacity: 1});
            });
        }, 5000);
    });
</script>
