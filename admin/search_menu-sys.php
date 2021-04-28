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

$menu_name = $_POST['p_name'];

$menu_cat = $_POST['cat_id'];

$menu_price = $_POST['p_price'];

$branch_id = $_SESSION['branch_id'];



$menuData = getAllMenuByFilter($branch_id, $menu_name, $menu_cat, $menu_price);

if ($menuData) {

    ?>
    <div class="table-responsive">
        <table class="table table-hover" style="margin: 15px;">
            <thead style="background-color: white ">
                <tr>

                    <td>
                        <span style="font-family: 'GothamBlack'">
                            Name
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
                    while ($rs = mysql_fetch_assoc($menuData)) {

                        ?>
                    <tr>

                        <td style="font-family: 'GothamLight'">
                            <?php echo $rs['p_name']; ?>
                        </td>
                        <td style="font-family: 'GothamLight'">
                            <?php echo $rs['cat_name']; ?>
                        </td>
                        <td style="font-family: 'GothamLight'">
                            <?php echo $rs['p_price']; ?>
                        </td>
                        <td style="font-family: 'GothamLight'">
                            <input type="checkbox" class="js-switch" id="js-check-<?php echo $rs['id']; ?>" onchange="changeStatus(<?php echo $rs['id']; ?>,this.id,<?php echo $branch_id; ?>)" <?php echo $rs['status'] == 1 ? 'checked' : '' ?> />
                        </td>
                        <td style="font-family: 'GothamLight'">
                            <a href="javascript:void(0)" style="color: black" onclick="showFrmEdit('<?php echo $rs['id']; ?>','<?php echo $rs['cat_id']; ?>')">
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