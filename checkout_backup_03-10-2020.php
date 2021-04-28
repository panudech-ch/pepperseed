<?php

include('header.php');
include('connect.php');
include('inc/admin/query_statement.php');

session_start();
$chkPage = 'checkout';
$_SESSION['currentPage'] = $chkPage;
$isAdmin = $_SESSION['isAdmin'];

$bgData = getBgByPage('bg_' . $chkPage);
$headerData = getContentByPageSection('Title_tiffin');
$checkoutMode = getCheckoutSettingByBranch($_SESSION['customer_branch']);
$branch_id = $_SESSION['customer_branch'];
$status = getStatusOrderOnline($branch_id);

while ($rs = mysql_fetch_assoc($status)){
    if($rs['open_close'] == 0){
        echo "<script>location.href='order_online_item.php?branch_id=$branch_id';</script>";
    }
}
?>
<!--body modify at 2017.01.24-->
<body class="bg_aboutus"
      <?php if ($bgData != null) { ?>style="background: url(<?php echo $bgData['img_path']; ?>) no-repeat center center " <?php } ?>>
<div id="divLoading">
</div>
<div class="left_content">
    <div class="content_aboutus">
        <?php include('inc/slide_menu.php'); ?>
    </div>
</div>

<div class="right_content">
    <?php if ($isAdmin) { ?>
        <div id="modify_bg" style="float: right">
            Edit Background<a href="inc/admin/edit_bg.php?page=<?php echo $chkPage; ?>" class='bg'><img
                    src="images/bt-edit.png" border="0" align="absmiddle"/></a>
        </div>
    <?php } ?>
    <div class="content_aboutus">
        <div class="title_header">
            <?php if ($TitleData['firstpage'] != null) {
                echo $TitleData['firstpage'];
            } else { ?> <p>Let’s make you Party!</p> <?php } ?>
            <?php if ($isAdmin) { ?> <a href="admin/edit_firstpage.php?id=<?php echo $TitleData['id']; ?>"
                                        class="bg"><img src="images/bt-edit.png" border="0"
                                                        align="absmiddle"/></a> <?php } ?>
        </div>
        <div class="little_title">
            <?php if ($SubTitleData['firstpage'] != null) {
                echo $SubTitleData['firstpage'];
            } else { ?> <p>What's on the menu?</p><?php } ?>
            <?php if ($isAdmin) { ?> <a href="admin/edit_firstpage.php?id=<?php echo $SubTitleData['id']; ?>"
                                        class="bg"><img src="images/bt-edit.png" border="0"
                                                        align="absmiddle"/></a> <?php } ?>
        </div>
    </div>
    <hr class="line_title" style="margin-top:1%;">
    <div class="clearfixed"></div>
    <div class="slocan" >
        <div class="cart-data">
            <div class="cart-data-layout" style="padding:30px;font-family:'GothamLight';">
                <form method="post" name="frm-payment" id="frm-payment">
                    <?php if($_SESSION['customer_branch'] == null || $_SESSION['customer_branch'] == '' || $_SESSION['customer_branch'] == 0){ ?>
                        <h5 class="cart-data-title"><u>Sorry!</u><br/><br/>
                            <span style="vertical-align: top; font-size: 15px; font-family: 'Gotham-Book';">Please choose area again. <a href="painpage.php#area-service" style="color: red;"><b>Click Here</b></a></span>
                        </h5>
                    <?php }else{ ?>
                        <h5 class="cart-data-title"><u>YOUR DETAILS</u><br/><br/>
                            <span style="color:red; vertical-align: top; font-size: 12px; font-family: 'Gotham-Book';">*Must fill your name, contact number</span>
                        </h5>

                        <div class="row">
                            <div class="form-inline col-lg-12">
                                <div class="col-lg-12">
                                    <?php $checkoutMode = mysql_fetch_array($checkoutMode);

                                        if($checkoutMode && $checkoutMode[value] == 0) { ?>
                                            <input type="radio" name="delivery_mode" id="mode-pickup" value="pickup"
                                                   checked> Pick up &nbsp;
                                            <input type="radio" name="delivery_mode" id="mode-delivery"
                                                   value="delivery"> Delivery<span
                                                style="color:red; vertical-align: top;">*</span>
                                     <?php }elseif($checkoutMode && $checkoutMode[value] == 1){?>
                                            <input type="radio" name="delivery_mode" id="mode-pickup" value="pickup"
                                                   checked> Pick up &nbsp;
                                     <?php }elseif($checkoutMode && $checkoutMode[value] == 2){?>
                                            <input type="radio" name="delivery_mode" id="mode-delivery"
                                                   value="delivery" checked> Delivery
                                     <?php }?>
                                </div>
                            </div>
                        </div>
                        <p>
                        <div id="payment-detail">

                        </div>
                        <hr class="line_cart">
                        <div class="clearfixed"></div>
                        <p>
                        <div class="row">
                            <div class="col-lg-6">
                                <span class="cart-left"
                                      style="font-family: 'TheMixBold'; font-size: 25.29px;"> <?php echo $_SESSION['serving']; ?>
                                    &nbsp;<b
                                        style="font-family: 'GothamLight'; font-size: 17.43px;">Serving</b></span>
                            </div>
                            <div class="col-lg-6">
                                <span class="cart-right" id="cart-total"
                                      style="font-family:'TheMixBold'; font-size: 24px;">Total <span><?php echo $_SESSION['cartTotal']; ?></span></span>
                                <input type="hidden" id="cartTotal" value="<?php echo $_SESSION['cartTotal']; ?>">
                            </div>
                        </div>
                        <div class="row promocode" style="display: none;">
                            <div class="col-lg-6 col-xs-9" >
                                <span class="cart-left"
                                      style="font-family: 'TheMixBold'; font-size: 21.29px;">
                                    &nbsp;<b style="font-family: 'GothamLight'; font-size: 15.00px;">Discount(PromoCode <span class="resValue"></span>) </b></span>
                            </div>
                            <div class="col-lg-6 col-xs-3">
                                <span class="cart-right" id="charge-total"
                                      style="font-family:'TheMixBold'; font-size: 24px;"> <b><span class="discountValue"></span> </b></span>
                            </div>
                        </div>
                        <div class="row charge" style="display: none;">
                            <div class="col-lg-6 col-xs-9">
                                <span class="cart-left"
                                      style="font-family: 'TheMixBold'; font-size: 21.29px;">
                                    &nbsp;<b style="font-family: 'GothamLight'; font-size: 15.00px;">Delivery Fee !!!</b></span>
                            </div>
                            <div class="col-lg-6 col-xs-3">
                                <span class="cart-right" id="charge-total"
                                      style="font-family:'TheMixBold'; font-size: 22px;"> <b>3.0</b></span>
                                <input type="hidden" name="total_charge" id="total_charge" value="0"/>
                            </div>
                        </div>
                        <div class="row credit-charge" style="display: none;">
                            <div class="col-lg-6 col-xs-9">
                                <span class="cart-left"
                                      style="font-family: 'TheMixBold'; font-size: 21.29px;">
                                    &nbsp;<b style="font-family: 'GothamLight'; font-size: 15.00px;">Credit Charge 1%</b></span>
                            </div>
                            <div class="col-lg-6 col-xs-3">
                                <span class="cart-right" id="total_credit_charge_text" style="font-family:'TheMixBold'; font-size: 24px;"></span>
                                <input type="hidden" name="total_credit_charge" id="total_credit_charge" value="0"/>
                            </div>
                        </div>
                        <div class="row total" style="display: none;">
                            <div class="col-lg-6 col-xs-9">
                                <span class="cart-left"
                                      style="font-family: 'TheMixBold'; font-size: 21.29px;">
                                    &nbsp;<b style="font-family: 'GothamLight'; font-size: 15.00px;">Total Serving (include charge , discount)</b></span>
                            </div>
                            <div class="col-lg-6 col-xs-3">
                                <span class="cart-right" id="total" style="font-family:'TheMixBold'; font-size: 24px;"></span>
                            </div>
                        </div>
                        </p>
                        <div class="clearfixed"></div>
                        <hr class="line_cart">
                        <div class="clearfixed"></div>
                        <p style="font-family: 'GothamBold'; font-size: 13px;">
                        <div class="row" style="font-family: 'TheMixBold';">
                            <div class="col-lg-6 col-xs-6">
                                <button class="cart-left" onclick="location.href='tiffin.php'">BACK TO EDIT ORDERS</button>
                            </div>
                            <div class="col-lg-6 col-xs-6">
                                <button class="cart-right" type="submit">CHECK OUT</button>
                            </div>
                        </div>
                        </p>
                        <div class="clearfixed"></div>
                    <?php }?>
                </form>
            </div>

        </div>
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

<div class="modal fade" id="ModalAlertCheckout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content" style="color: black;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Alert</h4>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" style="text-align: center;" onclick="okChargeCost()">OK</button>
                <button type="button" class="btn btn-default" style="text-align: center;" data-dismiss="modal" aria-label="Close">CLOSE</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ModalAlertPromoCode" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content" style="color: black;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Alert</h4>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" style="text-align: center;" data-dismiss="modal" aria-label="Close">CLOSE</button>
            </div>
        </div>
    </div>
</div>


<?php include('inc/footer.php'); ?>

<style type="text/css">
    #divLoading {
        display: none;
        position: fixed;
        z-index: 1500;
        background-image: url('inc/img/icon/processing.gif');
        background-color: #666;
        opacity: 0.4;
        background-repeat: no-repeat;
        background-position: center;
        left: 0;
        bottom: 0;
        right: 0;
        top: 0;
    }

    #loadinggif.show {
        left: 50%;
        top: 50%;
        position: absolute;
        z-index: 101;
        width: 32px;
        height: 32px;
        margin-left: -16px;
        margin-top: -16px;
    }
</style>

<script type="text/javascript">
    //    $(document).ready(function(){
    //        $('.slocan')
    //            .load('inc/cart-detail.php')
    //            .css({opacity:0})
    //            .animate({opacity:1});
    //    });


    $(document).ready(function () {
        $('#payment-detail')
            .load('inc/payment-pickup.php')
            .css({opacity: 0})
            .animate({opacity: 1});

        $('#mode-pickup').change(function (e) {
            var total = $('#cartTotal').val();
            clearPromoCode(true);
            clearCreditCharge();
            if(parseFloat(total) <= parseFloat(35)){
                $('.total').hide();
                $('.charge').hide();
                document.getElementById('total_charge').value = 0;
                $('#payment-detail')
                    .load('inc/payment-pickup.php')
                    .css({opacity: 0})
                    .animate({opacity: 1});
            }else{
                $('#payment-detail')
                    .load('inc/payment-pickup.php')
                    .css({opacity: 0})
                    .animate({opacity: 1});
            }

        });

        $('#mode-delivery').change(function (e) {
            var total = $('#cartTotal').val();
            clearPromoCode(true);
            clearCreditCharge();
            if (parseFloat(total) >= parseFloat(35)) {
                document.getElementById('total_charge').value = 0;
                $('#payment-detail')
                    .load('inc/payment-delivery.php')
                    .css({opacity: 0})
                    .animate({opacity: 1});
            } else {
                $('#ModalAlertCheckout').find('.modal-body').html("$3 Surcharge apply if order less than $35 for Home Delivery");
                $('#ModalAlertCheckout').modal('show');
                $('#mode-pickup').trigger('click');
            }
        });

        checkoutMode();

        $('#frm-payment').submit(function (e) {
            var slot1 = $('#card_no1').val();
            var slot2 = $('#card_no2').val();
            var slot3 = $('#card_no3').val();
            var slot4 = $('#card_no4').val();
            if(document.getElementById('mode-delivery') != null) {
                if (document.getElementById('mode-delivery').checked) {
                    if ($('#area').val() == '') {
                        $('#ModalAlert').find('.modal-body').html("Can not save data.<br>Must select your suburb.");
                        $('#ModalAlert').modal('show');
                        return false;
                    }
                    if (slot1 != '' || slot2 != '' || slot3 != '' || slot4 != '') {
                        if (slot1.length != 4 || slot2.length != 4 || slot3.length != 4 || slot4.length != 4) {
                            $('#ModalAlert').find('.modal-body').html("Please check Card No Format.");
                            $('#ModalAlert').modal('show');
                            return false;
                        }
                    } else {
                        var str = slot1.substr(0, 1);
                        if (str == "3") {
                            $('#ModalAlert').find('.modal-body').html("Please check Card No,American Express not excepted ");
                            $('#ModalAlert').modal('show');
                            return false;
                        }
                    }

                    if (document.getElementsByName('exp_month')[0].value != '') {
                        if (document.getElementsByName('exp_month')[0].value.length > 2) {
                            $('#ModalAlert').find('.modal-body').html("Invalid Month Format, Please check.");
                            $('#ModalAlert').modal('show');
                            return false;
                        } else {
                            if (document.getElementsByName('exp_month')[0].value < 1 || document.getElementsByName('exp_month')[0].value > 12) {
                                $('#ModalAlert').find('.modal-body').html("Invalid Month, Please check.");
                                $('#ModalAlert').modal('show');
                                return false;
                            }
                        }
                    } else {
                        if (!document.getElementById('cash-action').checked) {
                            $('#ModalAlert').find('.modal-body').html("Invalid Month, Please check.");
                            $('#ModalAlert').modal('show');
                            return false;
                        }
                    }

                    var today = new Date();
                    if (document.getElementsByName('exp_year')[0].value != '') {
                        if (document.getElementsByName('exp_year')[0].value.length > 2) {
                            $('#ModalAlert').find('.modal-body').html("Invalid Year Format, Please check.");
                            $('#ModalAlert').modal('show');
                            return false;
                        } else {
                            var year = today.getFullYear();
                            var final = year.toString().substring(2);
                            if (document.getElementsByName('exp_year')[0].value < parseInt(final) || document.getElementsByName('exp_year')[0] > parseInt(final) + 5) {
                                $('#ModalAlert').find('.modal-body').html("Invalid Year, Please check.");
                                $('#ModalAlert').modal('show');
                                return false;
                            }
                        }
                    } else {
                        if (!document.getElementById('cash-action').checked) {
                            $('#ModalAlert').find('.modal-body').html("Invalid Year, Please check.");
                            $('#ModalAlert').modal('show');
                            return false;
                        }
                    }

                    if (document.getElementsByName('exp_month')[0].value != '' && document.getElementsByName('exp_year')[0].value != '') {
                        var someday = new Date();
                        someday.setFullYear(20 + document.getElementsByName('exp_year')[0].value, document.getElementsByName('exp_month')[0].value, 1);
                        if (someday < today) {
                            $('#ModalAlert').find('.modal-body').html("The exprie date is before today's date. Please check a valid expire date.");
                            $('#ModalAlert').modal('show');
                            return false;
                        }
                    }

                    if (document.getElementsByName('cvv')[0].value != '') {
                        if (document.getElementsByName('cvv')[0].value.length > 3) {
                            $('#ModalAlert').find('.modal-body').html("Invalid CVV Format, Please check.");
                            $('#ModalAlert').modal('show');
                            return false;
                        } else {
                            if (document.getElementsByName('cvv')[0].value.length < 3) {
                                $('#ModalAlert').find('.modal-body').html("Invalid CVV Format,  Please check.");
                                $('#ModalAlert').modal('show');
                                return false;
                            }
                        }
                    } else {
                        if (!document.getElementById('cash-action').checked) {
                            $('#ModalAlert').find('.modal-body').html("Invalid CVV, Please check.");
                            $('#ModalAlert').modal('show');
                            return false;
                        }
                    }
                }
            }

            e.preventDefault();
            $('#divLoading').css('display', 'block');
            $.ajax({
                type: 'POST',
                url: 'inc/add-payment-sys.php',
                data: $('#frm-payment').serialize(),
                cache: false,
                success: function (msg) {
                    if (msg.trim() == "ERROR") {
                        $('#divLoading').css('display', 'none');
                        alert("Can not checkout. Please try again.");
                    } else if(msg.trim() == "BranchError") {
                        $('#divLoading').css('display', 'none');
                        alert("Can not checkout. Please choose area again.");
                    }else {
                        $('.title_header').html('<p>Enjoy your meal!</p>');
                        $('.little_title').html('<p>Thank you.</p>');
                        $('.cart-data').load('inc/order_confirm.php?ord_id=' + msg.trim());
                        $('#divLoading').css('display', 'none');
                    }
                }
            });
            return false;
        });
    });

    function okChargeCost(discountValue){
        var chargeValue = 3;
        $('#ModalAlertCheckout').modal('hide');
        document.getElementById('mode-delivery').checked = true;
        document.getElementById('total_charge').value = parseFloat(chargeValue).toFixed(1);
        var sumTotal = calculateSubTotal();
        $('#cartTotal').value = sumTotal;
        showTotal();
        document.getElementById("total").textContent= sumTotal.toString();
        $('#payment-detail')
            .load('inc/payment-delivery.php')
            .css({opacity: 0})
            .animate({opacity: 1});
    }

    $(window).scroll(function() {
        if ($(this).scrollTop() > 50) {
            $('.btn-nav').removeClass('animated');
            $('.nav-container').removeClass('showNav');
            $('.nav-container').addClass('hideNav');
        }
    });

    function checkPromoCode(){
        if($('#promo').val() != ''){
            if($('#promo').val().length > $('#promo')){
                $('#ModalAlertPromoCode').find('.modal-body').html("Promotion Code Fix 6 Digits.");
                $('#ModalAlertPromoCode').modal('show');
            }else{
                if($('#cartTotal').val() != '' || $('#cartTotal').val() > 0){
                    var deliverymode = $('input[name=delivery_mode]:checked', '#frm-payment').val();
                    var payment_method = $('input[name=payment_mode]:checked', '#frm-payment').val();

                    $('#divLoading').css('display', 'block');
                    $.ajax({
                        type: 'POST',
                        url: 'inc/use_promocode-sys.php',
                        data: {code:$('#promo').val(),total:$('#cartTotal').val(),deliverymode:deliverymode,paymentmethod:payment_method},
                        cache: false,
                        dataType:'json',
                        success: function (data) {
                            if (data.msg == "ERROR") {
                                $('#divLoading').css('display', 'none');
                                alert("Can not use Promotion Code.");
                            } else {
                                if(data.msg != ''){
                                    $('.promo_err').html(data.msg);
                                    $('.discountValue').html('');
                                    $('.resValue').html('');
                                    $('.promocode').hide();
                                    document.getElementById('total_discount').value = 0;
                                    var sumTotal = calculateSubTotal();
                                    document.getElementById("total").textContent= sumTotal.toString().match(/^-?\d+(?:\.\d{0,2})?/)[0];
                                    if(chargeValue == 0){
                                        $('.total').hide();
                                    }
                                    showTotal();
                                    $('#divLoading').css('display', 'none');
                                    return false;
                                }else{
                                    $('.promo_err').html('');
                                    if(data.discountValue != '' || data.discountValue != 0){
                                        var discount = data.discountValue;
                                        $('.discountValue').html(discount);
                                        document.getElementById('total_discount').value = discount;
                                        var sumTotal = calculateSubTotal();
                                        $('#cartTotal').value = sumTotal;
                                        $('.total').show();
                                        showTotal();
                                        document.getElementById("total").textContent= sumTotal.toString().match(/^-?\d+(?:\.\d{0,2})?/)[0];
                                    }else{
                                        $('.discountValue').html('');
                                    }

                                    if(data.resValue != '' || data.resValue != 0){
                                        $('.resValue').html(data.resValue);
                                        $('.promocode').show();
                                    }else{
                                        $('.resValue').html('');
                                        $('.promocode').hide();
                                    }

                                    $('#divLoading').css('display', 'none');
                                }
                            }
                        }
                    });
                    return false;
                }else{
                    $('#ModalAlertPromoCode').find('.modal-body').html("Can't Use Promotion Code for Empty Cart.");
                    $('#ModalAlertPromoCode').modal('show');
                    return false;
                }
            }
        }
    }

    function calculateSubTotal(){
        var deliveryMode = document.getElementById('mode-delivery').checked;
        var discountValue = document.getElementById('total_discount').value;
        var creditChargeValue = document.getElementById('total_credit_charge').value;
        var totalValue = $('#cartTotal').val();

        var sumTotal = 0;
        if(totalValue > 0){
            sumTotal = totalValue;
            if(totalValue < 35 && deliveryMode){
                document.getElementById('total_charge').value = 3;
                chargeValue = document.getElementById('total_charge').value;
            }else{
                document.getElementById('total_charge').value = 0;
                chargeValue = document.getElementById('total_charge').value;
            }
            if(discountValue > 0){
                sumTotal =  parseFloat(parseFloat(sumTotal) - parseFloat(discountValue));
                if(sumTotal < 35 && deliveryMode){
                    document.getElementById('total_charge').value = 3;
                    chargeValue = document.getElementById('total_charge').value;
                }else{
                    document.getElementById('total_charge').value = 0;
                    chargeValue = document.getElementById('total_charge').value;
                }
            }
            if (creditChargeValue > 0){
                sumTotal = parseFloat(parseFloat(sumTotal) + parseFloat(creditChargeValue));
            }
            if(chargeValue > 0){
                sumTotal = parseFloat(parseFloat(sumTotal) + parseFloat(chargeValue));
            }
            return sumTotal;
        }
    }

    function  showTotal() {
        var discountValue = document.getElementById('total_discount').value;
        var chargeValue = document.getElementById('total_charge').value;
        var creditChargeValue = document.getElementById('total_credit_charge').value;

        if (discountValue > 0) {
            $('.discountValue').html(discountValue);
        } else {
            $('.discountValue').html('');
        }

        if (chargeValue > 0) {
            $('.charge').show();
        } else {
            $('.charge').hide();
        }

        if (creditChargeValue > 0) {
            $('.credit-charge').show();
        } else {
            $('.credit-charge').hide();
        }

        if (discountValue > 0 || chargeValue > 0 || creditChargeValue > 0) {
            $('.total').show();
        } else {
            $('.total').hide();
        }
    }

    function clearPromoCode(flag){
        if($('#promo').val() == '' || flag){
            $('.promo_err').html('');
            $('.discountValue').html('');
            $('.resValue').html('');
            $('.promocode').hide();
            $('.total').hide();
            document.getElementById('total_discount').value = 0;
        }
    }

    function checkoutMode(){
        if($('#mode-delivery').is(':checked')){
            var total = $('#cartTotal').val();
            if (parseFloat(total) >= parseFloat(35)) {
                document.getElementById('total_charge').value = 0;
                $('#payment-detail')
                    .load('inc/payment-delivery.php')
                    .css({opacity: 0})
                    .animate({opacity: 1});
            } else {
                $('#ModalAlertCheckout').find('.modal-body').html("$3 Surcharge  apply if order less than $35 for Home Delivery");
                $('#ModalAlertCheckout').modal('show');
                $('#mode-pickup').trigger('click');
            }
        }
    }

    function addCreditCharge(){
        var total = $('#cartTotal').val();
        var creditChargeValue = total * 0.01;
        document.getElementById('total_credit_charge').value = creditChargeValue;
        var sumTotal = calculateSubTotal();
        $('#cartTotal').value = sumTotal;
        document.getElementById("total").textContent= sumTotal.toString().match(/^-?\d+(?:\.\d{0,2})?/)[0];
        document.getElementById('total_credit_charge_text').textContent = creditChargeValue.toString().match(/^-?\d+(?:\.\d{0,2})?/)[0];
        showTotal();
    }

    function clearCreditCharge(){
        var creditChargeValue = 0;
        var sumTotal = calculateSubTotal();
        document.getElementById('total_credit_charge').value = creditChargeValue.toString();
        $('#cartTotal').value = sumTotal;
        document.getElementById("total").textContent= sumTotal.toString().match(/^-?\d+(?:\.\d{0,2})?/)[0];
        document.getElementById('total_credit_charge_text').textContent = creditChargeValue.toString().match(/^-?\d+(?:\.\d{0,2})?/)[0];
        showTotal();
    }
</script>
