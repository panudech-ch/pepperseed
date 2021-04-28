<?php

/**

 * Created by PhpStorm.

 * User: chawapon

 * Date: 2/21/2017

 * Time: 9:52 PM

 */

include('../connect.php');

include('../inc/admin/query_statement.php');

?>

<?php

session_start();

$choiceName = $_POST['choice_name'];

$choicePrice = $_POST['price'];

$catId = $_POST['cat_id'];

$branch_id = $_SESSION['branch_id'];



if ($choiceName != '' || $choicePrice != '' || $catId != '') {

    $searchData = getChoiceByFilter($choiceName, $choicePrice, $catId, $branch_id);
} else {

    $searchData = getAllChoiceByBranchId($branch_id);
}

if ($searchData) { ?>

    <div class="table-responsive">
        <table class="table table-hover" style="margin: 15px;">
            <thead style="background-color: white ">
                <tr>
                    
                    <td>
                        <span style="font-family: 'GothamBlack'">
                            Choice Name
                        </span>
                    </td>
                    <td>
                        <span style="font-family: 'GothamBlack'">
                            Category
                        </span>
                    </td>
                    <td>
                        <span style="font-family: 'GothamBlack'">
                            Price
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
                    while ($rs = mysql_fetch_assoc($searchData)) { ?>
                    <tr>
                       
                        <td style="font-family: 'GothamLight'">
                            <?php echo $rs['choice_name']; ?>
                        </td>
                        <td style="font-family: 'GothamLight'">
                            <?php echo $rs['cat_name']; ?>
                        </td>
                        <td style="font-family: 'GothamLight'">
                            <?php echo $rs['choice_price']; ?>
                        </td>
                        <td>
                            <input type="checkbox" class="js-switch" id="js-check-<?php echo $rs['id']; ?>" onchange="changeStatus(<?php echo $rs['id']; ?>,this.id,<?php echo $branch_id; ?>)" <?php echo $rs['choice_stat'] == 1 ? 'checked' : '' ?> />
                        </td>
                        <td style="font-family: 'GothamLight'">
                            <a href="javascript:void(0)" style="color: black" onclick="showFrmEdit('<?php echo $rs['id'] ?>','<?php echo $rs['choice_name'] ?>' ,'<?php echo $rs['choice_price']; ?>','<?php echo $rs['cat_id'] ?>')">
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