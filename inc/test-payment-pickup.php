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
        <div class="col-lg-2 col-xs-12" style="margin-top:12px;">
            <span><input type="radio" name="payment_mode" id="cash-action" value="Cash" onchange="checkPromoCode()" required checked> Cash</span>
        </div>
        <div class="col-lg-10" style="left: -15px;">
            <div class="col-lg-8 col-xs-12 form-inline">
                <span><input type="radio" name="payment_mode" class="credit-action" id="credit-action"  value="Stripe" onchange="checkPromoCode()" required> Credit Card</span>&nbsp;
                <img src="inc/img/icon/ic_visa.png">
                <img src="inc/img/icon/ic_master.png">
                <img src="inc/img/icon/amex.png" style="width:50px">
            </div>
        </div>
    </div>
</div>

<div class="row" id="stripe-form" style="display:none;">
    <div class="col-lg-8 col-xs-12">
        <form id="payment-form" class="element">
            <div id="card-element"><!--Stripe.js injects the Card Element--></div>
            <button id="submit">
                <div class="spinner hidden" id="spinner"></div>
                <span id="button-text">Pay</span>
            </button>
            <p id="card-error" role="alert"></p>
        </form>
    </div>
    <div class="col-lg-4 col-xs-12 div-logo">
        <img src="/stripe/payments.png" class="logo" />
    </div>
</div>

<div class="row credit-detail" style="display: none;">
    <div class="col-lg-12 col-xs-12 form-group">
        <div class="col-lg-2 col-xs-12 text-right">
        </div>
        <div class="col-lg-10">
            <span style="color:red; vertical-align: middle; font-size: 12px; font-family: 'Gotham-Book';">* Credit card charge 1.5%</span>
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
            $('#stripe-form').slideUp();
            $('#checkout-button').css('display', '');
            clearCreditCharge();
        });

        $('.credit-action').change(function () {
            $('#stripe-form').slideDown();
            $('#checkout-button').css('display', 'none');
            addCreditCharge();
            addStripe();
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
    
    function addStripe() {
        var script=document.createElement('script');
        script.src='/stripe/client.js';
        script.defer = true;

        $('head').append(`<link rel='stylesheet' href='/stripe/style.css' />`);
        $('head').append(script)
    }
</script>