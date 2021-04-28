<?php

include('../connect.php');
include('../inc/admin/query_statement.php');

session_start();
$isAdmin = $_SESSION['isAdmin'];
$slocanData = getContentByPageSection('Slocan_aboutus');
?>
<div class="row">
    <div class="col-lg-5 col-xs-12  form-group">
        <div class="col-lg-3 col-xs-12">
            <span>Name :</span>
        </div>
        <div class="col-lg-9 col-xs-12">
            <input id="name" name="name" type="text" required class="form-control" value=""/>
            <input type="hidden" name="area" value="1">
        </div>
    </div>
    <div class="col-lg-7 col-xs-12 form-group">
        <div class="col-lg-4 col-xs-12">
            <span>Contact number :</span>
        </div>
        <div class="col-lg-7 col-xs-12">
            <input id="phone" name="phone" type="number" required class="form-control" value=""/>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-5 col-xs-12 form-group">
        <div class="col-lg-3 col-xs-12">
            <span>Email :</span>
        </div>
        <div class="col-lg-9 col-xs-12">
            <input id="email" name="email" type="email" required class="form-control" style="width: 100%" value=""/>
        </div>
    </div>
    <div class="col-lg-7 col-xs-12  form-group">
        <div class="col-lg-4 col-xs-12">
            <span>Promo Code :</span>
        </div>
        <div class="col-lg-5 col-xs-8">
            <input id="promo" name="promo" type="text" class="form-control" value="" maxlength="6" onchange="clearPromoCode()"/>
            <span style="color: red;" class="promo_err"></span>
        </div>
        <div class="col-lg-3 col-xs-4">
            <span><button type="button" class="btn btn-default" onclick="checkPromoCode()">Use</button></span>
            <input type="hidden" id="total_discount" name="total_discount" value="0"/>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-5 col-xs-12 form-group">
        <div class="col-lg-3 col-xs-12">
            <span>Comment:</span>
        </div>
        <div class="col-lg-9 col-xs-12">
            <textarea id="comment" name="comment" class="form-control" style="min-height: 80px"></textarea>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-7 col-xs-12  form-group">
        <div class="col-lg-12 col-xs-12">
            <p class="cart-the-mix-bold">Payment</p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-xs-12  form-group">
        <div class="col-lg-2 col-xs-12">
            <span><input type="radio" name="payment_mode" id="cash-action" value="Cash" onchange="checkPromoCode()" required checked> Cash</span>
        </div>
        <div class="col-lg-10" style="left: -15px;">
            <div class="col-lg-3 col-xs-12 form-inline">
                <span><input type="radio" name="payment_mode" class="credit-action" id="credit-action"  value="Visa" onchange="checkPromoCode()" required> Visa</span>&nbsp;
                <img src="inc/img/icon/ic_visa.png">
            </div>
            <div class="col-lg-4 col-xs-12">
                <span><input type="radio" name="payment_mode" class="credit-action" id="credit-action" value="Master Card" onchange="checkPromoCode()" required> Master Card</span>&nbsp;
                <img src="inc/img/icon/ic_master.png">
            </div>
            <div class="col-lg-4 col-xs-12">
                <span style="color:red; vertical-align: middle; font-size: 12px; font-family: 'Gotham-Book';">*American Express not excepted</span>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#promo').keyup(function () {
            checkStr(this,null);
            if(this.value.length == this.maxLength){
                return false;
            }
        });

        $('#cash-action').change(function () {
            clearCreditCharge();
        });

        $('.credit-action').change(function () {
            addCreditCharge();
        });
    });

    function checkStr(source,next) {
        if($(source).val().length == $(source).attr('maxlength')){
            //$('#'+next).val("");
            if(next != null)
            {
                $('#'+next).focus();
            }
        }
        if($(source).val().length > $(source).attr('maxlength'))
        {
            return false;
        }
    }
</script>