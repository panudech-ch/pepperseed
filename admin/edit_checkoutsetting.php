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



$checkoutsettingData = getCheckoutSettingById($id);

if (mysql_num_rows($checkoutsettingData) > 0) {

    $result = mysql_fetch_array($checkoutsettingData);

    ?>

    <div class="col-md-12" style="font-family: 'GothamLight';line-height: 30px;padding: 0 20px 0 30px; color: white">

        <div class="row">

            <input type="hidden" id="id" name="id" value="<?php echo $result['id']; ?>">

            <div class="col-md-4 col-xs-12">

                <div class="form-group">

                    <label for="branch_name" style="font-family: 'GothamBlack'" class="label-b">Branch Name :</label>

                    <input type="text" class="form-control" id="branch_name" name="branch_name" value="<?php echo $result['branch_name']; ?>" disabled required>

                </div>

            </div>

            <div class="col-md-4 col-xs-12">

                <div class="form-group">

                    <div class="col-lg-12 col-xs-12">

                        <label for="mode_value" style="font-family: 'GothamBlack';" class="label-b">Checkout Mode :</label>

                    </div>



                    <?php

                    $sqlCheckoutSettingMode = getAllCheckputSettingMode();

                    while ($checkoutSetting = mysql_fetch_assoc($sqlCheckoutSettingMode)) {

                        ?>

                        <div class="col-md-12 col-xs-12">

                            <input type="radio" id="mode_value" name="mode_value" value="<?php echo $checkoutSetting['value']; ?>" required <?php echo $result['value'] == $checkoutSetting['value'] ? 'checked' : '' ?>>

                            <span style="color: black;"><?php echo $checkoutSetting['lable']; ?></span>

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

