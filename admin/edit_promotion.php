<?php
include('../connect.php');
include('../inc/admin/query_statement.php');
session_start();
$branch_id = $_SESSION['branch_id'];
$id = $_GET['id'];

// hard branch id = 0 for both branch.
$promotionData = getPromotionByIdAndBranch($id, 0);
if (mysql_num_rows($promotionData) > 0) {
    $result = mysql_fetch_array($promotionData); ?>




    <div class="form-group row">
        <input type="hidden" id="id" name="id" value="<?php echo $result['id']; ?>">
        <label for="date-search" class="col-sm-3 col-form-label label-b">Promotion Name :</label>
        <div class="col-sm-5">
            <input type='text' class="form-control" id='promotion_name' name="promotion_name" required value="<?php echo $result['name']; ?>" />
        </div>
    </div>
    <div class="form-group row">

        <label for="date-search" class="col-sm-3 col-form-label label-b">Picture :</label>
        <div class="col-sm-5">
            <input type='text' class="form-control" id='pic-name-edit' name="pic-name-edit" value="<?php echo $result['pic_name']; ?>" />
        </div>
    </div>
    <div class="form-group row">

        <label for="date-search" class="col-sm-3 col-form-label label-b">Picture preview :</label>
        <div class="col-sm-5">
            <div class="fileUpload btn" style="background-color: #99816E;color: white;margin: 10px 0">
                <span>Upload...</span>
                <input id="up-pic-edit" name="up-pic-edit" type="file" class="upload">
            </div>
            <span> W:505px x H:301px</span>
        </div>
    </div>
    <div class="form-group row">

        <label for="date-search" class="col-sm-3 col-form-label label-b"></label>
        <div class="col-sm-5">
            <img class="img-responsive" style="<?php echo !empty($result['pic_path']) ? "" : "display:none;"; ?>" id="pic_path" name="pic_path" src="<?php echo !empty($result['pic_path']) ? $result['pic_path'] : ''; ?>" />

        </div>
    </div>



    <script type="text/javascript">
        $(function() {
            $("#up-pic-edit").on("change", function() {
                document.getElementById("pic-name-edit").value = this.files[0].name;
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
<?php } else {
    echo "nodata";
} ?>