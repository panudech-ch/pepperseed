<?php

/**

 * Created by PhpStorm.

 * User: chawapon

 * Date: 2/21/2017

 * Time: 4:04 PM

 */

include('../connect.php');

include('../inc/admin/query_statement.php');

?>

<?php

session_start();

$delivery_name = $_POST['delivery_name'];

$branch_id = $_SESSION['branch_id'];



if ($delivery_name == '') {

    $searchData = getAllDeliveryAreaByBranchId($branch_id);
} else {

    $searchData = getDeliveryAreaByBranchIdAndName($branch_id, $delivery_name);
}

if ($searchData) { ?>

    <div class="table-responsive">
        <table class="table table-hover" style="margin: 15px;">
            <thead style="background-color: white">
                <tr>


                    <td>

                        <span style="font-family: 'GothamBlack'">

                            Choice Name

                        </span>

                    </td>

                    <td>

                        <span style="font-family: 'GothamBlack'">

                            Status

                        </span>

                    </td>

                    <td style="text-align: center;">

                        <span style="font-family: 'GothamBlack'">

                            Delete

                        </span>

                    </td>

                </tr>
            </thead>

            <tbody style="background-color: white">



                <?php if (mysql_num_rows($searchData) == 0) { ?>

                    <tr>

                     
                        <td>

                            <span style="font-family:'GothamLight'">Delivery area is '<span style="color: red"><?php echo $delivery_name; ?></span>' not found.</span>

                        </td>

                        <td></td>

                        <td></td>

                    </tr>

                    <?php } else {

                            while ($rs = mysql_fetch_assoc($searchData)) {

                                ?>

                        <tr>

                          
                            <td style="font-family: 'GothamLight';">

                                <?php echo $rs['area']; ?>

                            </td>

                            <td style="font-family: 'GothamLight';">

                                <input type="checkbox" class="js-switch" id="js-check-<?php echo $rs['id']; ?>" onchange="changeStatus(<?php echo $rs['id']; ?>,this.id,<?php echo $branch_id; ?>)" <?php echo $rs['deli_status'] == 1 ? 'checked' : '' ?> />

                            </td>

                            <td style="text-align: center;">

                                <a href="javascript:void(0)" title="Delete" onclick="showDeleteDeliveryConfirm(<?php echo $rs['id']; ?>,<?php echo $branch_id; ?>)">

                                    <span style="color: red;" class="glyphicon glyphicon-trash"></span>

                                </a>

                            </td>

                        </tr>

                <?php }
                    } ?>

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