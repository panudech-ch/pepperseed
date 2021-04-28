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
    
    <div class="col-md-12" style="font-family: 'GothamLight';line-height: 30px;padding: 0 20px 0 30px;">
        <div class="row">
            <input type="hidden" id="id" name="id" value="<?php echo $result['id']; ?>">
            <div class="col-md-4 col-xs-12">
                <div class="form-group">
                    <label for="p_name" style="font-family: 'GothamBlack'">Name :</label>
                    <input type='text' class="form-control" id='p_name' name="p_name" required
                           value="<?php echo $result['p_name']; ?>"/>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 promo-right-menu">
                <div class="form-group">
                    <label for="cat_id_edit" style="font-family: 'GothamBlack'">Category :</label>
                    <select class="form-control" id="cat_id_edit" name="cat_id" required>
                        <option value=""></option>
                        <?php
                        $sqlCate = getAllCategoryByBranchId($branch_id);
                        while ($item = mysql_fetch_assoc($sqlCate)) {
                            ?>
                            <option value="<?php echo $item['id'] ?>"
                                <?php echo $item['id'] == $result['cat_id'] ? "selected" : "" ?>>
                                <?php echo $item['cat_name'] ?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <div class="form-group">
                    <label for="p_price" style="font-family: 'GothamBlack'">Price :</label>
                    <input type='text' class="form-control" id='p_price' name="p_price" required
                           value="<?php echo $result['p_price']; ?>"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            <label for="date-search" style="font-family: 'GothamBlack'">Descriptions :</label>
                            <textarea class="form-control" id='p_desc' name="p_desc" style="height: 150px;resize: vertical;">
                        <?php echo $result['p_desc']; ?>
                    </textarea>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="row">
                            <div class="form-group title-pic">
                                <div class="col-md-12">
                                    <label for="pic-name" style="font-family: 'GothamBlack'">Picture :</label>
                                    <input type='text' class="form-control" id='pic-name' name="pic-name"
                                           value="<?php echo $result['pic_name']; ?>"/>
                                </div>
                            </div>
                            </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="fileUpload btn" style="background-color: #99816E;color: white;margin: 10px 0">
                                        <span>Upload...</span>
                                        <input id="up-pic" name="up-pic" type="file" class="upload">
                                    </div>
                                    <span> W:235px x H:140px</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-inline">
                        <div class="col-md-12">
                            <span style="font-family: GothamBlack">Gluten-Free  :</span>&nbsp;
                            <input type="radio" value="0" id="icon_gf_0" name="icon_gf" <?php echo $result['ico_spicy'] == "0" ? "checked" : "" ?>>Off &nbsp;
                            <input type="radio" value="1" id="icon_gf_0" name="icon_gf" <?php echo $result['ico_spicy'] == "1" ? "checked" : "" ?>>On
                        </div>
                    </div>
                </div>
                <div class="row" id="choice-select-edit" style="color: white;">
                    <input type="hidden" name="f_choice" id="f_choice" value="<?php echo $result['p_choice']; ?>"/>
                    <div class="col-lg-2 col-xs-12">
                        <span style="font-family: GothamBlack">Choice :</span>
                    </div>
                    <div class="col-lg-11 col-xs-12" id="show-choice-edit">
                        <?php
                            $choicedata = getChoiceByCateID($result['cat_id'], $branch_id);
                            if (mysql_num_rows($choicedata) > 0) {
                                while ($rs = mysql_fetch_assoc($choicedata)) {
                                    $check = false;
                                    if(!empty($result['p_choice'])){
                                        $splChoice = split(',', $result['p_choice']);
                                        foreach ($splChoice as $value) {
                                            if ($value == $rs['id']) {
                                                $check = true;
                                                break;
                                            }
                                        }
                                    }?>
                                    <div class="col-md-3 col-xs-12">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="choice[]"
                                                   value="<?php echo $rs['id']; ?>" <?php echo $check ? "checked" : "" ?> >
                                            <?php echo $rs['choice_name']; ?>
                                        </label>
                                    </div>
                                    <?php
                                }
                            } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="form-inline">
                        <div class="col-md-12">
                            <span style="font-family: GothamBlack">Show Extra  :</span>&nbsp;
                            <input type="radio" value="0" id="showExtra" name="showExtra" <?php echo $result['show_extra'] == "0" ? "checked" : "" ?>>Off &nbsp;
                            <input type="radio" value="1" id="showExtra" name="showExtra" <?php echo $result['show_extra'] == "1" ? "checked" : "" ?>>On
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <img class="img-responsive" style="<?php echo !empty($result['pic_path'])?"":"display:none;"; ?>" id="pic_path" name="pic_path" src="<?php echo !empty($result['pic_path'])?$result['pic_path']:''; ?>"/>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(function () {
            $('#cat_id_edit').change(function (e) {
                var f_choice = $('#f_choice').val();
                $.ajax({
                    type: 'GET',
                    url: "get_choicebycat.php",
                    data: {cat_id: $(this).val(),choice:f_choice},
                    cache: false,
                    success: function (msg) {
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

            $("#up-pic").on("change",function () {
                document.getElementById("pic-name").value = this.files[0].name;
                var preview = document.querySelector('img[id=pic_path]');
                var file    = this.files[0];
                var reader  = new FileReader();

                reader.addEventListener("load", function () {
                    preview.src = reader.result;
                }, false);

                if (file) {
                    reader.readAsDataURL(file);
                    $('#pic_path').css('display','');
                }
            });
        });
    </script>
    <?php
} else {
    echo "nodata";
} ?>