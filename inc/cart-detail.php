<?php
/**
 * Created by PhpStorm.
 * User: indywib
 * Date: 1/26/2017
 * Time: 8:05 PM
 */
include('../connect.php');
include('../inc/admin/query_statement.php');
?>
<?php
session_start();
$sesid = session_id();
$isAdmin = $_SESSION['isAdmin'];
$cartData = getCartBySessionId($sesid);
$num = mysql_num_rows($cartData);
$total = 0;
$cartItemQty = 0;
?>
<div class="cart-data">
    <div class="cart-data-layout" style="padding:30px;">
        <h5 class="cart-data-title">YOUR ORDERS</h5>
        <p>
            <table class="cart-table" width="100%">
                <?php while ($rs = mysql_fetch_assoc($cartData)){ ?>
                <tr class="cart-table-tr">
                    <td class="qty-td"><input id="product_qty" name="product_qty" type="number" class="form-control" style="display: inline-block; width: 90%; text-align: center;" value="<?php echo $rs['p_qty']; ?>" min="1" onchange="updateQty(<?php echo $rs['id'];?>)"/></td>
                    <td width="40%;"><?php echo $rs['p_name']; ?>
                        <?php
                        $sumprice = 0;
                        $cartItemQty += $rs['p_qty'];
                        $c = getChoiceByChoiceId($rs['choice']);
                        while ($rc = mysql_fetch_assoc($c)){
                        ?>
        <p>: <?php echo $rc['choice_name']; ?> <span style="float: right">$<?php echo $rc['choice_name'] != '' ? $rs['total_price'] : ''; ?></span></p>
        <?php $sumprice = $sumprice + ($rc['choice_name'] != '' ? $rs['total_price'] : 0);
        }
        if ($rs['choice_price'] == 0) { ?>
        <span style="float: right">
								<?php echo '$' . $rs['total_price']; ?>
							</span>
        <?php $sumprice = $sumprice + $rs['total_price'];
        }; ?>
        <?php $ex = getExtraById($rs['extra']);
        while ($rx = mysql_fetch_assoc($ex)) {
            ?>
            <p>: Extra <?php echo $rx['ex_name']; ?>
                <span style="float: right">
                                <?php
                                $exprice = getCartExtraPriceByOrderMenuIdAndExtraId($rs['id'], $rx['id']);
                                while ($p = mysql_fetch_assoc($exprice)) {
                                    ?>
                                    $<?php echo $p['extra_price']; ?>
                                    <?php
                                    $sumprice = $sumprice + $p['total_price'];
                                }
                                ?>
                            </span>
            </p>
        <?php }
        if($rs['note'] != null){ ?>
            <p>Note: <?php echo $rs['note'];?>
            </p>
        <?php } ?>
        </td>

        <td width="2%;" style="text-align: right;">&nbsp;&nbsp;<span style="cursor: pointer" onclick="deleteCart(<?php echo $rs['id']; ?>)">x</span></td>
        </tr>
        <?php
//        $sumprice = $sumprice * $rs['p_qty'];
        $total = $total + $sumprice;
        } ?>
        </table>
        </p>
        <hr class="line_cart">
        <div class="clearfixed"></div>
        <p>
            <span class="cart-left"
                  style="font-family: 'TheMixBold'; font-size: 25.29px;"><?php $_SESSION['serving'] = $cartItemQty;
                echo $cartItemQty; ?> <b style="font-family: 'GothamLight'; font-size: 17.43px;">Serving</b></span>
            <span class="cart-right"
                  style="font-family:'TheMixBold'; font-size: 24px;">Total $<?php $_SESSION['cartTotal'] = $total;
                echo $total; ?></span>
        </p>
        <div class="clearfixed"></div>
        <hr class="line_cart">
        <div class="clearfixed"></div>
        <p style="font-family: 'GothamBold'; font-size: 13px;">
            <button class="cart-right" onclick="nextStep()">CHECK OUT</button>
        </p>
        <div class="clearfixed"></div>

    </div>

</div>

<div class="modal fade" id="ModalAlert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content" style="color: black;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Alert</h4>
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function deleteCart(id) {
        $.ajax({
            type: 'POST',
            url: "product_process-sys.php?mode=delete",
            data: {id: id},
            cache: false,
            success: function (msg) {
                if (msg.trim() == "ERROR") {
                    alert("Can not save data.");
                } else {
                    alert("Delete Success");
                    location.reload();
                }
            }
        });
    }

    function updateQty(id){
        qty = document.getElementById('product_qty').value;
        if(qty == "" || qty == 0){
            document.getElementById('product_qty').value = 1;
            return alert("Can't update qty to blank or zero");
        }else{
            $.ajax({
                type: 'POST',
                url: "product_process-sys.php?mode=update-qty",
                data: {cart_id: id,product_qty: qty},
                cache: false,
                success: function (msg) {
                    if (msg.trim() == "ERROR") {
                        alert("Can not update qty.");
                    } else {
                        alert("Update qty Success");
                        location.reload();
                    }
                }
            });
        }
    }

    function nextStep() {
        var total = "<?php echo $_SESSION['cartTotal']; ?>";
        var item = "<?php echo $_SESSION['serving']; ?>";
        if (parseFloat(item) > 0 && parseFloat(total) > 0) {
            location.href = 'checkout.php';
        } else {
            $('#ModalAlert').find('.modal-body').html("Empty Cart");
            $('#ModalAlert').modal('show');
        }
    }
</script>