<?php

/**

 * Created by PhpStorm.

 * User: chawapon

 * Date: 5/23/2017

 * Time: 12:52 AM

 */

include('../connect.php');

include('../inc/admin/query_statement.php');

?>

<?php

session_start();

$id = $_POST['id'];

$branch_id = $_SESSION['branch_id'];



$sql = "DELETE FROM promocode WHERE id='$id' and promo_branch='$branch_id'";

$result = mysql_query($sql);



if ($result) {

    $promoData = getAllPromotionCodeByBranchId($branch_id);

    ?>

    <div class="table-responsive">

        <table class="table table-hover" style="margin: 15px;">
            <thead style="background-color: white">

                <tr>


                    <td>

                        <span style="font-family: 'GothamBlack'">

                            Promotion Code

                        </span>

                    </td>

                    <td>

                        <span style="font-family: 'GothamBlack'">

                            Promotion Code Conditions

                        </span>

                    </td>

                    <td>

                        <span style="font-family: 'GothamBlack'">

                            Promotion Code Type

                        </span>

                    </td>



                    <td>

                        <span style="font-family: 'GothamBlack'">

                            Promotion Code Value

                        </span>

                    </td>

                    <td>

                        <span style="font-family: 'GothamBlack'">

                            Status

                        </span>

                    </td>

                    <td>

                        <span style="font-family: 'GothamBlack'">

                            Edit

                        </span>

                    </td>

                </tr>
            </thead>
            <tbody style="background-color: white">



                <?php

                    while ($rs = mysql_fetch_assoc($promoData)) {

                        ?>

                    <tr>

                

                        <td style="font-family: 'GothamLight';">

                            <?php echo $rs['promo_code']; ?>

                        </td>

                        <td style="font-family: 'GothamLight';">

                            <p> Order Subtotal: <?php echo $rs['resmin_label']; ?> <?php echo $rs['promo_resmin_value']; ?></p>

                            <p> Delivery Mode : <?php echo $rs['delivery_label']; ?></p>

                            <p> Payment Mode : <?php echo $rs['payment_label']; ?></p>

                        </td>

                        <td style="font-family: 'GothamLight';">

                            <?php echo $rs['type_label']; ?>

                        </td>

                        <td style="font-family: 'GothamLight';">

                            <?php echo $rs['promo_value']; ?>

                        </td>

                        <td style="font-family: 'GothamLight';">

                            <input type="checkbox" class="js-switch" id="js-check-<?php echo $rs['id']; ?>" onchange="changeStatus(<?php echo $rs['id']; ?>,this.id,<?php echo $branch_id; ?>)" <?php echo $rs['promo_stat'] == 1 ? 'checked' : '' ?> />

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

    <script type="text/javascript">
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

        elems.forEach(function(html) {

            var switchery = new Switchery(html, {
                size: 'small'
            });

        });
    </script>

<?php

} else {

    echo "ERROR";
}

?>