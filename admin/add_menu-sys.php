<?php
include('../connect.php');
include('../inc/admin/query_statement.php');
require_once('../inc/fineuploader/php-traditional-server/uploadfile.php');
session_start();
$branch_id = $_SESSION['branch_id'];
$cat_id = $_POST['cat_id'];
$pic_name = $_POST['pic-name_2'];

$p_name = $_POST['p_name'];
$p_desc = $_POST['boxDetail'];
$p_price = $_POST['p_price'];
$p_price_dinner = $_POST['p_price_dinner'];
$ico_spicy = $_POST['ico_spicy'];
$show_eatin = $_POST['show_eatin'];
$show_takeaway = $_POST['show_takeaway'];


// Check Choice
$rowChoice1 = $_POST['choice'];
$rowChoice2 = $_POST['rowChoice2'];


$p_choice = '';
if (!empty($_POST['choice'])) {
    foreach ($_POST['choice'] as $choice) {
        if ($p_choice != '') {
            $p_choice .= ',' . $choice;
        } else {
            $p_choice .= $choice;
        }
    }
}

// allergy
//$allergy = $_POST['allergy'];
$p_allergy = '';
if (!empty($_POST['allergy'])) {
    foreach ($_POST['allergy'] as $allergy) {
        if ($p_allergy != '') {
            $p_allergy .= ',' . $allergy;
        } else {
            $p_allergy .= $allergy;
        }
    }
}


if (isset($_FILES["up-pic_2"]["type"]) && !empty($_FILES["up-pic_2"]) && $_FILES["up-pic_2"]["error"] == 0) {

    $upd = uploadfile($_FILES["up-pic_2"], $pic_name, "menu");

    if ($upd['success']) {

        $targetPath = $upd['targetPath'];
    } else {

        return $upd['msg'];
    }
}

$p_name = str_replace("'", "&#39;", $p_name);
$p_name = str_replace("\"", "&quot;", $p_name);
$p_desc = str_replace("'", "&#39;", $p_desc);
$p_desc = str_replace("\"", "&quot;", $p_desc);

$sql = "INSERT INTO products(
		p_name, 
		p_desc,
		p_price, 
		cat_id, 
		ico_spicy, 
		p_choice, 
		p_price_dinner, 
		show_takeaway,
		branch_id,
        pic_name,
        pic_path,
        p_choice2
	)VALUES(
		'$p_name', 
		'$p_desc', 
		'$p_price', 
		'$cat_id', 
		'$ico_spicy', 
		'$p_choice', 
		'$p_price_dinner', 
		'$show_takeaway',
		'$branch_id',
        '$pic_name',
		'$targetPath',
        '$p_allergy'
	)";

$result = mysql_query($sql);

if ($result) {
    $menuData = getAllMenuByBranchId($branch_id);
    ?>

    <div class="table-responsive">
        <table class="table table-hover">
            <tbody style="background-color: #E9E9E9;">
                <tr style="background-color: #DAD5D1; ">
                    <td style="width: 10%">
                    </td>
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
                <?php
                    while ($rs = mysql_fetch_assoc($menuData)) {
                        ?>
                    <tr>
                        <td style="width: 10%">
                        </td>
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
                            <a href="javascript:void(0)" style="color: black" onclick="showFrmEdit('<?php echo $rs['id']; ?>','<?php echo $rs['p_name']; ?>' ,'<?php echo $rs['p_desc']; ?>'
                               ,'<?php echo $rs['p_price']; ?>', '<?php echo $rs['cat_id']; ?>', '<?php echo $rs['ico_spicy']; ?>'
                               ,'<?php echo $rs['pic_name']; ?>','<?php echo $rs['$pic_path']; ?>')">
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
<?php } else {
    echo "ERROR";
} ?>