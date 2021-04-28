<?php

/**

 * Created by PhpStorm.

 * User: chawapon

 * Date: 2/21/2017

 * Time: 8:50 AM

 */

include('../connect.php');

include('../inc/admin/query_statement.php');

?>

<?php

session_start();

$cat_name = $_POST['cat_name'];

$branch_id = $_SESSION['branch_id'];

$cat_name = str_replace("'", "&#39;", $cat_name);

$cat_name = str_replace("\"", "&quot;", $cat_name);



if ($cat_name == '') {

    $searchData = getAllCategoryByBranchId($branch_id);
} else {

    $searchData = getCategoryByBranchIdAndName($branch_id, $cat_name);
}



if ($searchData) { ?>

    <div class="table-responsive">
        <table class="table table-hover" style="margin: 15px;">
            <thead style="background-color: white ">
                <tr>
                    <td>
                        <span style="font-family: 'GothamBlack'">
                            Category Name
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

                <?php
                    while ($rs = mysql_fetch_assoc($searchData)) {
                        ?>
                    <tr>

                        <td style="font-family: 'GothamLight';">
                            <?php echo $rs['cat_name']; ?>
                        </td>
                        <td style="font-family: 'GothamLight';">
                            <input type="checkbox" class="js-switch" id="js-check-<?php echo $rs['id']; ?>" onchange="changeStatus(<?php echo $rs['id']; ?>,this.id,<?php echo $branch_id; ?>)" <?php echo $rs['cat_status'] == 1 ? 'checked' : '' ?> />
                        </td>
                        <td style="font-family: 'GothamLight';">
                            <a href="javascript:void(0)" style="color: black" onclick="showFrmEdit('<?php echo $rs['id'] ?>','<?php echo $rs['cat_name'] ?>' ,'<?php echo $rs['cat_img']; ?>','<?php echo $rs['cat_img_name'] ?>')">
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