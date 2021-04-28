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
    <div class="col-lg-5 col-xs-12  form-group">
        <div class="col-lg-3 col-xs-12">
            <span>Address:</span>
        </div>
        <div class="col-lg-9 col-xs-12">
            <input id="address" name="address" type="text" class="form-control" required value=""/>
        </div>
    </div>
    <div class="col-lg-7 col-xs-12 form-group">
        <div class="col-lg-4 col-xs-12">
            <span>Suburb :</span>
        </div>
        <div class="col-lg-7 col-xs-12">
            <select name="area" id="area"  class="form-control">
                <option value="">--- Must select your suburb ---</option>
                <?php
                $dataDeli = getDeliveryForCheckout($_SESSION['customer_branch']);
                $areas = [];
                while($item = mysql_fetch_array($dataDeli)){
                    ?>
                    <option value="<?php echo $item['id'];?>" <?php if($_SESSION['area']==$item['id']){echo "selected='selected'";}?>><?php echo $item['area'];?>
                        <?php if($item['charge_price']>0){ echo "($".number_format($item['charge_price'],2).")"; } ?>
                    </option>
                <?php $areas[] = [
                    'id' => $item['id'],
                    'charage_price' => $item['charge_price'],
                ]; } ?>
            </select>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-5 col-xs-12  form-group">
        <div class="col-lg-3 col-xs-12">
            <span>Email :</span>
        </div>
        <div class="col-lg-9 col-xs-12">
            <input id="email" name="email" type="email" class="form-control" required  value=""/>
        </div>
    </div>
    <div class="col-lg-7 col-xs-12 form-group">
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
<div class="row credit-detail" style="display: none;">
    <div class="col-lg-12 col-xs-12 form-group">
        <div class="col-lg-2 col-xs-12 text-right">
        </div>
        <div class="col-lg-10 credit">
            <div class="form-inline credit-lb-no">
                <span>No.</span>
            </div>
            <div class="form-inline credit-no" style="">
                <input style="width:100%;" id="card_no1" name="card_no1"  maxlength="4" type="number" class="form-control number card_no" value="" />
            </div>
            <div class="form-inline credit-dash">
                <span>-</span>
            </div>
            <div class="form-inline credit-no">
                <input style="width:100%;" id="card_no2" name="card_no2"  maxlength="4" type="number" class="form-control number card_no" value="" />
            </div>
            <div class="form-inline credit-dash">
                <span>-</span>
            </div>
            <div class="form-inline credit-no">
                <input style="width:100%;" id="card_no3" name="card_no3"  maxlength="4"  type="number" class="form-control number card_no" value="" />
            </div>
            <div class="form-inline credit-dash">
                <span>-</span>
            </div>
            <div class="form-inline credit-no">
                <input style="width:100%;" id="card_no4" name="card_no4"  maxlength="4"  type="number" class="form-control number card_no" value="" />
            </div>
        </div>
    </div>
</div>
<div class="row credit-detail" style="display: none;">
    <div class="col-lg-12 col-xs-12 form-group">
        <div class="col-lg-2 col-xs-12 text-right">
        </div>
        <div class="col-lg-10">
            <div class="form-inline date-lb-exp">
                <span>Expire.</span>
            </div>
            <div class="form-inline date-my">
                <input type="number" class="form-control number" id="exp_month" style="width: 100%" name="exp_month" maxlength="2" placeholder="MM">
            </div>
            <div class="form-inline date-slash">
               <span>/</span>
            </div>
            <div class="form-inline date-my">
                <input type="number" class="form-control number" style="width: 100%" id="exp_year" name="exp_year"  maxlength="2" placeholder="YY">
            </div>
            <div class="form-inline cvv">
                <span>CVV.</span>
            </div>
            <div class="form-inline cvv-box">
                <input type="number" class="form-control number" style="width: 100%" id="cvv" name="cvv"  maxlength="3" placeholder="CVV">
            </div>
            <div class="col-lg-6 col-xs-1 form-group"></div>
        </div>
    </div>
</div>

<div class="row credit-detail" style="display: none;">
    <div class="col-lg-12 col-xs-12 form-group">
        <div class="col-lg-2 col-xs-12 text-right">
        </div>
        <div class="col-lg-10">
            <span style="color:red; vertical-align: middle; font-size: 12px; font-family: 'Gotham-Book';">* Credit card charge 1%</span>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#card_no1').keypress(function(){
            if(this.value == "3")
                return false;
            checkStr(this,'card_no2');
            if(this.value.length == this.maxLength){
                return false;
            }
        });
        $('#card_no1').keyup(function(){
            if(this.value == "3")
                return false;
            checkStr(this,'card_no2');
            if(this.value.length == this.maxLength){
                return false;
            }
        });
        $('#card_no2').keypress(function(){
            checkStr(this,'card_no3');
            if(this.value.length == this.maxLength){
                return false;
            }
        });
        $('#card_no2').keyup(function(){
            checkStr(this,'card_no3');
            if(this.value.length == this.maxLength){
                return false;
            }
        });
        $('#card_no3').keypress(function(){
            checkStr(this,'card_no4');
            if(this.value.length == this.maxLength){
                return false;
            }
        });
        $('#card_no3').keyup(function(){
            checkStr(this,'card_no4');
            if(this.value.length == this.maxLength){
                return false;
            }
        });
        $('#card_no4').keypress(function(){
            checkStr(this,'exp_month');
            if(this.value.length == this.maxLength){
                return false;
            }
        });
        $('#card_no4').keyup(function(){
            checkStr(this,'exp_month');
            if(this.value.length == this.maxLength){
                return false;
            }
        });
        $('#exp_month').keypress(function(){
            checkStr(this,'exp_year');
            if(this.value.length == this.maxLength){
                return false;
            }
        });
        $('#exp_month').keyup(function(){
            checkStr(this,'exp_year');
            if(this.value.length == this.maxLength){
                return false;
            }
        });
        $('#exp_year').keypress(function(){
            checkStr(this,'cvv');
            if(this.value.length == this.maxLength){
                return false;
            }
        });
        $('#exp_year').keyup(function(){
            checkStr(this,'cvv');
            if(this.value.length == this.maxLength){
                return false;
            }
        });
        $('#cvv').keypress(function () {
            checkStr(this,null);
            if(this.value.length == this.maxLength){
                return false;
            }
        });
        $('#cvv').keyup(function () {
            checkStr(this,null);
            if(this.value.length == this.maxLength){
                return false;
            }
        });
        $('#promo').keyup(function () {
            checkStr(this,null);
            if(this.value.length == this.maxLength){
                return false;
            }
        });


        $('#cash-action').change(function () {
            $('.credit-detail').slideUp();
            clearCreditCharge();
        });

        $('.credit-action').change(function () {
            $('.credit-detail').slideDown();
            addCreditCharge();
        });
        
        // var myArray = "<?php echo json_encode($areas); ?>";
        // console.log(myArray)
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