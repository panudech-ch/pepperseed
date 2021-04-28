<?php

include('../connect.php');

include('../inc/admin/query_statement.php');

?>

<?php

session_start();

$catId = $_GET['cat_id'];

$choice = $_GET['choice'];

$branch_id = $_SESSION['branch_id'];

$searchData = getChoiceByCateID($catId, $branch_id);

if ($searchData) {

    if (mysql_num_rows($searchData) > 0) {

        if (!empty($choice)) {

            $splChoice = split(',', $choice);

        }

        while ($rs = mysql_fetch_assoc($searchData)) {

            $check = false;

            if (!empty($splChoice)) {

                foreach ($splChoice as $value) {

                    if ($value == $rs['id']) {

                        $check = true;

                        break;

                    }

                }

            }

            ?>

            <div class="col-md-4 col-xs-12">

                <label class="checkbox-inline">

                    <input type="checkbox" name="choice[]"

                           value="<?php echo $rs['id']; ?>" <?php echo $check ? "checked" : "" ?> >

                    <?php echo $rs['choice_name']; ?>

                </label>

            </div>

        <?php }

    } else {

        echo "NoData";

    }

} else {

    echo "ERROR";

}

?>

