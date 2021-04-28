<?php

/**

 * Created by PhpStorm.

 * User: chawapon

 * Date: 5/20/2017

 * Time: 10:40 PM

 */



include('../connect.php');

include('../inc/admin/query_statement.php');

require_once('../inc/fineuploader/php-traditional-server/uploadfile.php');

session_start();

$branch_id = $_SESSION['branch_id'];

$id = $_POST['id'];

$value = $_POST['mode_value'];



$sql = "UPDATE checkout_setting SET `value` = {$value}";

$sql .= " WHERE `id` = {$id}";



$result = mysql_query($sql);

if ($result) {

    $checkoutSettingData = getCheckoutSettingByBranch($branch_id);

    ?>

    <div class="table-responsive" style="margin-left: 10%;margin-right: 10%;">

        <table class="table table-hover">
            <thead style="background-color: white;">
                <tr>
                    <td> <span style="font-family: 'GothamBlack'">
                            Branch Name

                        </span>

                    </td>

                    <td>

                        <span style="font-family: 'GothamBlack'">

                            Edit

                        </span>

                    </td>

                </tr>
            </thead>
            <tbody style="background-color: white;">



                <?php

                    while ($rs = mysql_fetch_assoc($checkoutSettingData)) {

                        ?>

                    <tr>

                        
                        <td style="font-family: 'GothamLight';">

                            <?php echo $rs['branch_name']; ?>

                        </td>

                        <td style="font-family: 'GothamLight';">

                            <a href="javascript:void(0)" style="color: black" onclick="showFrmEdit('<?php echo $rs['id'] ?>')">

                                <span>

                                    Edit

                                </span>

                            </a>

                        </td>

                    </tr>

                <?php } ?>

            </tbody>

        </table>

    </div>

<?php } else {

    echo "ERROR";
} ?>