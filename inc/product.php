<?php
/**
 * Created by PhpStorm.
 * User: indywib
 * Date: 1/24/2017
 * Time: 10:53 AM
 */
    include('../connect.php');
    include('../inc/admin/query_statement.php');

    session_start();
    $isAdmin = $_SESSION['isAdmin'];
    $branch_id = $_SESSION['customer_branch'];
    //$cat = $_SESSION['cat'];
    $catData =  getAllCategoryByBranchIdIsActive($branch_id);
?>
<script type="text/javascript" src="inc/js/jquery.dotdotdot.min.js"></script>
<div class="menu_pepper" style="padding-top:1%;">
    <div class="pepper_area">
        <div class="row" style="width:100%;">
            <?php if($branch_id == null || $branch_id == ''){?>
                <p> <h4>On Our Menus <a href="area-service.php" style="color: red"><b>Click Here</b></a></h4></p>
            <?php }else {
                while ($catRS = mysql_fetch_assoc($catData)) {?>
                    <div class="main">
                    <section id="<?php echo $catRS['cat_name'];?>" class="row name-category clearfixed" data-anchor="<?php echo $catRS['cat_name'];?>">
                        <?php echo $catRS['cat_name'];?>
                    </section>
                    <?php $productData = getProductByCatId($catRS['id']);
                    while ($rs = mysql_fetch_assoc($productData)){?>
                        <div class="product col-md-3 col-sm-6 col-xs-12">
                            <p>
                                <?php if($_SESSION['order_on'] == 'yes' && $rs['p_price'] != 0){?>
                                    <a href="javascript:void(0)"
                                       onclick="showFrmEdit('<?php echo $rs['id']; ?>',<?php echo $rs['cat_id']?>)">
                                        <img src="<?php echo $rs['pic_path'] != '' ? str_replace('../','',$rs['pic_path']) : 'inc/img/icon/no-image-found.gif' ;?>">
                                    </a>
                                <?php }else {?>
                                    <a href="#">
                                        <img src="<?php echo $rs['pic_path'] != '' ? str_replace('../','',$rs['pic_path']) : 'inc/img/icon/no-image-found.gif' ;?>">
                                    </a>
                                <?php } ?>
                            </p>
                            <p class="product_title"><?php echo $rs['p_name'];?></p>
                            <hr class="line_title_product">
                            <p id="dot1" class="after"><?php echo $rs['p_desc'];?></p>
                            <p>
                                <span class="price"><?php echo $rs['p_price'];?></span>
                                <span class="add-to-cart">
                            <?php if($_SESSION['order_on'] == 'yes' && $rs['p_price'] != 0){?>
                                <a href="javascript:void(0)"
                                   onclick="showFrmEdit('<?php echo $rs['id']; ?>',<?php echo $rs['cat_id']?>)">
                                    <img src="inc/img/icon/icon-cart.png" alt="">
                                </a>
                            <?php }else {?>
                                <img src="inc/img/icon/icon-cart.png" alt="">
                            <?php } ?>
                        </span>
                            </p>
                        </div>
                    <?php } ?>
                    </div>
                <?php }
            } ?>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="spin modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="spin modal-dialog" role="document">
    <div class="spin modal-content">
      <div class="spin modal-header">
        <h5 class="spin modal-title" id="exampleModalLabel"><u>YOUR CHOICES</u></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="form-product-process" name="form-product-process" enctype="multipart/form-data" method="post">
          <div class="spin modal-body">
              <div class="content">
              </div>
          </div>
          <div class="spin modal-footer">
            <button type="button" class="spin modal-title btn btn-secondary" data-dismiss="modal" style="float: left;">CANCEL</button>
            <button type="submit" class="spin modal-title btn btn-primary">CONFIRM</button>
          </div>
      </form>
    </div>
  </div>
</div>

<style>
    .after {
            font-family:'GothamLight';
            font-size:17px;
            height: 4.2em;
            overflow: hidden;
            white-space: pre-wrap;
            line-height: 18px;
            text-overflow: ellipsis
        }
    @media (max-width: 768px) {
        .product img {
            width:100%;
            margin-top:10px;
        }
    }
</style>
<script type="text/javascript">
    $(function () {
        $('#form-product-process').submit(function (e) {
            $.ajax({
                type: 'POST',
                url: "product_process-sys.php",
                data: $('#form-product-process').serialize(),
                cache: false,
                success: function (msg) {
                    if (msg.trim() == "ERROR") {
                        $('#myModal').modal('hide');
                    } else {
                        $('#myModal').find('.content').html(msg);
                        $('#myModal').modal('hide');
                        updateQtyAndTotal();
                    }
                }
            });
            return false;
        });
    });

    function showFrmEdit(id,catid) {
        $('#divLoading').css('display', 'block');
        $.ajax({
            type: 'POST',
            url: "product_process.php",
            data: {id: id,catid: catid},
            cache: false,
            success: function (msg) {
                if (msg.trim() == "nodata") {
                    alert("No Product data.");
                } else {
                    $('#myModal').find('.content').html(msg);
                    $('#myModal').modal('show');
                }
            }
        });
        return false;
    }

    $(function(){
    $('#dot1').dotdotdot({
        ellipsis: '...', /* The HTML to add as ellipsis. */
        wrap : 'word', /* How to cut off the text/html: 'word'/'letter'/'children' */
        watch : true /* Whether to update the ellipsis: true/'window' */
    });
});
</script>
