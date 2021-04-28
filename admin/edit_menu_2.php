<?php
include('../connect.php');
include('../inc/admin/query_statement.php');
session_start();
$branch_id = $_SESSION['branch_id'];
$id = $_GET['id'];
$cat_id = $_GET['cat_id'];

$menuData = getMenuByID($id);
if (mysql_num_rows($menuData) > 0) {
    $result = mysql_fetch_array($menuData);
    ?>


    <input type="hidden" id="id" name="id" value="<?php echo $result['id']; ?>">
    <div class="col-sm-7">
        <div class="form-group row">
            <label for="date-search" class="col-sm-4 col-form-label label-b" style="font-family: 'GothamBlack'">Product name :</label>
            <div class="col-sm-8">
                <input type='text' class="form-control" id='p_name' name="p_name" required value="<?php echo $result['p_name']; ?>" />
            </div>
        </div>
        <div class="form-group row">
            <label for="date-search" class="col-sm-4 col-form-label label-b" style="font-family: 'GothamBlack'">Category :</label>
            <div class="col-sm-8">
                <select class="form-control" id="cat_id_edit" name="cat_id" required>
                    <option value=""></option>
                    <?php
                        $sqlCate = getAllCategoryByBranchId($branch_id);
                        while ($item = mysql_fetch_assoc($sqlCate)) {
                            ?>
                        <option value="<?php echo $item['id'] ?>" <?php echo $item['id'] == $result['cat_id'] ? "selected" : "" ?>>
                            <?php echo $item['cat_name'] ?>
                        </option>
                    <?php
                        }
                        ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="" id="choice-select-edit">
                <label for="date-search" class="col-sm-12 col-form-label label-b" style="font-family: 'GothamBlack'">Choice :</label>
                <input type="hidden" class="col-sm-12 col-form-label label-b" name="f_choice" id="f_choice" value="<?php echo $result['p_choice']; ?>" />

                <div class="col-sm-12" id="show-choice-edit">
                    <?php
                        $choicedata = getChoiceByCateID($result['cat_id'], $branch_id);
                        if (mysql_num_rows($choicedata) > 0) {
                            while ($rs = mysql_fetch_assoc($choicedata)) {
                                $check = false;
                                if (!empty($result['p_choice'])) {
                                    $splChoice = split(',', $result['p_choice']);
                                    foreach ($splChoice as $value) {
                                        if ($value == $rs['id']) {
                                            $check = true;
                                            break;
                                        }
                                    }
                                } ?>
                            <div class="col-md-3 col-xs-12">
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="choice[]" value="<?php echo $rs['id']; ?>" <?php echo $check ? "checked" : "" ?>>
                                    <?php echo $rs['choice_name']; ?>
                                </label>
                            </div>
                    <?php
                            }
                        } ?>
                </div>
            </div>

        </div>
        <div class="form-group row">
            <label for="pic-name" class="col-sm-4 col-form-label label-b" style="font-family: 'GothamBlack'">Picture name:</label>
            <div class="col-sm-8">
                <input type='text' class="form-control" id='pic-name' name="pic-name" value="<?php echo $result['pic_name']; ?>" />
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-8" style="text-align: left;">
                <div class="fileUpload btn btn-primary" style="background-color: #99816E;margin:0px">
                    <span>Select picture</span>
                    <input id="up-pic" name="up-pic" type="file" class="upload">
                </div><span style="color: black;margin-left: 5px;">W:235px x H:460px[Max size 10mb]</span>

            </div>
        </div>
        <div class="form-group row">
            <label for="date-search" class="col-sm-4 col-form-label label-b" id="p_picture" style="font-family: 'GothamBlack'">Picture preview :</label>
            <div class="col-sm-8" style="text-align: left;">
                <img class="img-responsive" style="<?php echo !empty($result['pic_path']) ? "" : "display:none;"; ?>" id="pic_path" name="pic_path" src="<?php echo !empty($result['pic_path']) ? $result['pic_path'] : ''; ?>" />

            </div>
        </div>
        <div class="form-group row">
            <label for="pic-desc" class="col-sm-4 col-form-label label-b" style="font-family: 'GothamBlack'">Descriptions :</label>
            <div class="col-sm-8">
                <textarea class="form-control" id='p_desc' name="p_desc" style="height: 150px;resize: vertical;"><?php echo trim($result['p_desc']); ?></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label for="pic-desc" class="col-sm-4 col-form-label label-b" style="font-family: 'GothamBlack'">Gluten-Free :</label>
            <div class="col-sm-8">
                <input type="radio" value="0" id="icon_gf_0" name="icon_gf" <?php echo $result['ico_spicy'] == "0" ? "checked" : "" ?>><span style="color:black">Off</span> &nbsp;
                <input type="radio" value="1" id="icon_gf_0" name="icon_gf" <?php echo $result['ico_spicy'] == "1" ? "checked" : "" ?>><span style="color:black">On</span>
            </div>
        </div>
        <div class="form-group row">
            <label for="pic-desc" class="col-sm-4 col-form-label label-b" style="font-family: 'GothamBlack'">Show Extra :</label>
            <div class="col-sm-8">
                <input type="radio" value="0" id="showExtra" name="showExtra" <?php echo $result['show_extra'] == "0" ? "checked" : "" ?>><span style="color:black">Off</span> &nbsp;
                <input type="radio" value="1" id="showExtra" name="showExtra" <?php echo $result['show_extra'] == "1" ? "checked" : "" ?>><span style="color:black">On</span>
            </div>
        </div>
    </div>
    <div class="col-sm-5">
        <div class="form-group row">
            <label for="date-search" class="col-sm-4 col-form-label label-b" style="font-family: 'GothamBlack'">Price :</label>
            <div class="col-sm-8">
                <input type='text' class="form-control" id='p_price' name="p_price" required value="<?php echo $result['p_price']; ?>" />

            </div>
        </div>
        <div class="form-group row">
            <label for="date-search" class="col-sm-12 col-form-label label-b" style="font-family: 'GothamBlack'">Allergy icon :</label>
            <input type="hidden" class="col-sm-12 col-form-label label-b" name="f_choice2" id="f_choice2" value="<?php echo $result['p_choice2']; ?>" />

            <div class="col-sm-12 " id="show_allergy_edit">
                <?php
                    $choicedata2 = getAllergy();
                    if (mysql_num_rows($choicedata2) > 0) {
                        while ($rs = mysql_fetch_assoc($choicedata2)) {
                            $check = false;
                            if (!empty($result['p_choice2'])) {
                                $splChoice2 = split(',', $result['p_choice2']);
                                foreach ($splChoice2 as $value) {
                                    if ($value == $rs['info_value']) {
                                        $check = true;
                                        break;
                                    }
                                }
                            } ?>
                        <div class="col-sm-6" style=" padding: 10px;">
                            <label class="checkbox-inline">
                                <input type="checkbox" name="allergy[]" value="<?php echo $rs['info_value']; ?>" <?php echo $check ? "checked" : "" ?>>
                                <img style="margin-left: 10px;" src="   <?php echo $rs['info_path']; ?>" width="30px" alt="Italian Trulli">

                            </label>
                            </div>
                    <?php
                            }
                        } ?>
            </div>
        </div>

    </div>

    </div>


    <script type="text/javascript">
        $(function() {
            $('#cat_id_edit').change(function(e) {
                var f_choice = $('#f_choice').val();
                $.ajax({
                    type: 'GET',
                    url: "get_choicebycat.php",
                    data: {
                        cat_id: $(this).val(),
                        choice: f_choice
                    },
                    cache: false,
                    success: function(msg) {
                        $('#show-choice-edit').html("");
                        if (msg.trim() == "ERROR") {
                            alert("Can not get data.");
                        } else if (msg.trim() == "NoData") {
                            $('#choice-select-edit').hide();
                        } else {
                            $('#show-choice-edit').html(msg);
                            $('#choice-select-edit').show();
                            $('#divLoading').css('display', 'none');
                        }
                    }
                });
            });

            $("#up-pic").on("change", function() {
                document.getElementById("pic-name").value = this.files[0].name;
                var preview = document.querySelector('img[id=pic_path]');
                var file = this.files[0];
                var reader = new FileReader();

                reader.addEventListener("load", function() {
                    preview.src = reader.result;
                }, false);

                if (file) {
                    reader.readAsDataURL(file);
                    $('#pic_path').css('display', '');
                }
            });
        });
    </script>
<?php
} else {
    echo "nodata";
} ?>