<?php

/**

 * Created by PhpStorm.

 * User: chawapon

 * Date: 2/21/2017

 * Time: 5:38 PM

 */

include('../connect.php');

include('../inc/admin/query_statement.php');

?>

<?php

session_start();

$branch_id = $_SESSION['branch_id'];

$promo_name = $_POST['promo_name'];


if ($promo_name == '') {

    $searchData = getAllPromotions($branch_id);
} else {

    $searchData = getPromotionsByBranchIdAndName($branch_id, $promo_name);
}

if ($searchData) { ?>

    <div class="table-responsive">

        <table class="table table-hover" style="margin: 15px;">
            <thead style="background-color: white ">
                <tr>

                    <td>
                        <span style="font-family: 'GothamBlack'">
                            Promotion Name
                        </span>
                    </td>
                    <td>
                        <span style="font-family: 'GothamBlack'">
                            Show
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
            <tbody style="background-color: white;">



                <?php if (mysql_num_rows($searchData) == 0) { ?>

                    <tr>



                        <td>

                            <span style="font-family:'GothamLight'">Promotions name is '<span style="color: red"><?php echo $promo_name; ?></span>' not found.</span>

                        </td>

                        <td></td>

                        <td></td>

                        <td></td>

                    </tr>

                    <?php } else {

                            while ($rs = mysql_fetch_assoc($searchData)) {

                                ?>

                        <tr>



                            <td style="font-family: 'GothamLight';">

                                <?php echo $rs['name']; ?>

                            </td>

                            <td style="font-family: 'GothamLight';">

                                <a href="javascript:void(0)" onclick="showDetail(<?php echo $rs['id'] ?>,'<?php echo $rs['name'] ?>' ,'<?php echo $rs['pic_name']; ?>',<?php echo $rs['status'] ?>)">

                                    <span style="font-family: 'GothamLight'">Show</span>

                                </a>

                            </td>

                            <td style="font-family: 'GothamLight';">

                                <input type="checkbox" class="js-switch" id="js-check-<?php echo $rs['id']; ?>" onchange="changeStatus(<?php echo $rs['id']; ?>,this.id,<?php echo $branch_id; ?>)" <?php echo $rs['status'] == 1 ? 'checked' : '' ?> />

                            </td>

                            <td style="font-family: 'GothamLight';">

                                <a href="javascript:void(0)" title="Delete" onclick="showFrmEdit(<?php echo $rs['id'] ?>,<?php echo $branch_id; ?>)" style="color: black">
                                    <span>
                                        Edit
                                    </span>
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