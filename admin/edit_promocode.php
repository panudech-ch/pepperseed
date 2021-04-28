<?php

/**

 * Created by PhpStorm.

 * User: chawapon

 * Date: 5/20/2017

 * Time: 9:46 PM

 */

include('../connect.php');

include('../inc/admin/query_statement.php');

session_start();

$branch_id = $_SESSION['branch_id'];

$id = $_GET['id'];



$promocodeData = getPromotionCodeByID($id);

if (mysql_num_rows($promocodeData) > 0) {

    $result = mysql_fetch_array($promocodeData);

    ?>

    <div class="col-md-12" style="font-family: 'GothamLight';line-height: 30px;padding: 0 20px 0 30px; color: white">

        <div class="row">

            <input type="hidden" id="id" name="id" value="<?php echo $result['id']; ?>">

            <div class="col-md-4 col-xs-12">

                <div class="form-group">

                    <label for="promo_code" style="font-family: 'GothamBlack'" class="label-b">Promotion Code :</label>

                    <input type='text' class="form-control" id='promo_code' name="promo_code" required value="<?php echo $result['promo_code']; ?>" />

                </div>

            </div>

            <div class="col-md-4 col-xs-12">

                <div class="form-group">

                    <div class="col-lg-12 col-xs-12">

                        <label for="promo_type" style="font-family: 'GothamBlack';" class="label-b">Promotion Type :</label>

                    </div>



                    <?php

                        $sqlPromotionType = getAllPromotionCodeType();

                        while ($promoType = mysql_fetch_assoc($sqlPromotionType)) {

                            ?>

                        <div class="col-md-12 col-xs-12">

                            <input type="radio" id="promo_type" name="promo_type" value="<?php echo $promoType['value']; ?>" required <?php echo $result['promo_type'] == $promoType['value'] ? 'checked' : '' ?>>

                            <span style="color:black"><?php echo $promoType['lable']; ?></span>

                        </div>

                    <?php } ?>

                </div>

            </div>

            <div class="col-md-4 col-xs-12">

                <div class="form-group">

                    <label for="promo_value" style="font-family: 'GothamBlack'" class="label-b">Promotion Value :</label>

                    <input type='number' step="0.01" class="form-control" id='promo_value' name="promo_value" required value="<?php echo $result['promo_value']; ?>" />

                </div>

            </div>

        </div>

        <div class="row">

            <div class="col-md-4 col-xs-12">

                <div class="form-group">

                    <div class="col-lg-12 col-xs-12" style="padding: 0px;">

                        <label for="promo_resmin_type" style="font-family: 'GothamBlack';" class="label-b">Promotion Conditions :</label>

                    </div>

                    <span style="color:black"> SubTotal Order</span>

                    <?php

                        $sqlResType = getAllRestricionPromotion();

                        while ($resType = mysql_fetch_assoc($sqlResType)) {

                            ?>

                        <div class="col-md-12 col-xs-12">

                            <input type="radio" id="promo_resmin_type" name="promo_resmin_type" value="<?php echo $resType['value']; ?>" required <?php echo $result['promo_resmin_type'] == $resType['value'] ? 'checked' : '' ?>>

                            <span style="color:black"><?php echo $resType['lable']; ?></span>

                        </div>

                    <?php } ?>



                    <div class="col-md-12 col-xs-12">

                        <label for="promo_resmin_value" style="font-family: 'GothamBlack'" class="label-b">Value :</label>

                        <input style="color:black" type='number' step="0.01" class="form-control" id="promo_resmin_value" name="promo_resmin_value" value="<?php echo $result['promo_resmin_value']; ?>" required>

                    </div>

                </div>

            </div>

            <div class="col-md-4 col-xs-12">

                <div class="form-group">

                    <div class="col-lg-12 col-xs-12" style="padding: 0px;">

                        <label for="promo_deliverymode" style="font-family: 'GothamBlack';" class="label-b"></label>

                    </div>

                    <span style="color:black"> Available For Delivery Mode</span>

                    <?php

                        $sqlDeliverMode = getAllAvaliableDeliveryMode();

                        while ($deliveryMode = mysql_fetch_assoc($sqlDeliverMode)) {

                            ?>

                        <div class="col-md-12 col-xs-12">

                            <input style="color:black" type="radio" id="promo_deliverymode" name="promo_deliverymode" value="<?php echo $deliveryMode['value']; ?>" required <?php echo $result['promo_deliverymode'] == $deliveryMode['value'] ? 'checked' : '' ?>>

                            <span style="color:black"><?php echo $deliveryMode['lable']; ?></span>

                        </div>

                    <?php } ?>

                </div>

            </div>

            <div class="col-md-4 col-xs-12">

                <div class="form-group">

                    <div class="col-lg-12 col-xs-12" style="padding: 0px;">

                        <label for="promo_payment_type" style="font-family: 'GothamBlack';" class="label-b"></label>

                    </div>

                    <span style="color:black"> Available For Payment Mode</span>

                    <?php

                        $sqlPaymentMode = getAllAvialablePaymentMode();

                        while ($paymentMode = mysql_fetch_assoc($sqlPaymentMode)) {

                            ?>

                        <div class="col-md-12 col-xs-12">

                            <input style="color:black" type="radio" id="promo_payment_type" name="promo_payment_type" value="<?php echo $paymentMode['value']; ?>" required <?php echo $result['promo_payment_type'] == $paymentMode['value'] ? 'checked' : '' ?>>

                            <span style="color:black"><?php echo $paymentMode['lable']; ?></span>

                        </div>

                    <?php } ?>

                </div>

            </div>

        </div>

    </div>

<?php

} else {

    echo "nodata";
} ?>