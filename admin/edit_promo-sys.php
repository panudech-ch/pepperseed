<?php
include('../connect.php');
include('../inc/admin/query_statement.php');
require_once('../inc/fineuploader/php-traditional-server/uploadfile.php');
session_start();
$branch_id = $_SESSION['branch_id'];
$id = $_POST['id'];
$promotion_name = $_POST['promotion_name'];
$pic_name = $_POST['pic-name-edit'];

if(empty($pic_name)){
    $targetPath = 'delete';
}else {
    if (isset($_FILES["up-pic-edit"]["type"]) && !empty($_FILES["up-pic-edit"]) && $_FILES["up-pic-edit"]["error"] == 0) {
        $upd = uploadfile($_FILES["up-pic-edit"], $pic_name, "menu");
        if ($upd['success']) {
            $targetPath = $upd['targetPath'];
        } else {
            return $upd['msg'];
        }
    }
}

$sql = "UPDATE promotions SET `name` = '{$promotion_name}' ";
if($targetPath == 'delete'){
    $sql.=", `pic_name` = '' , `pic_path` = '' ";
}else{
    if($pic_name != null && $targetPath != null){
        $sql.= ", `pic_name` = '{$pic_name}', `pic_path` = '{$targetPath}' ";
    }else if($pic_name != null && $targetPath == null) {
        $sql .="";
    }else {
        $sql.=", `pic_name` = '{$_FILES["up-pic-edit"]["name"]}', `pic_path` = '{$targetPath}'";
    }
}
$sql.=" WHERE `id` = {$id}";
$result = mysql_query($sql);

if ($result) {
    $promotionData = getPromotionByIdAndBranch($id,$branch_id);
    $result = mysql_fetch_array($promotionData);
    ?>
    <div class="col-md-12" style="font-family: 'GothamLight';line-height: 30px;padding: 0 20px 0 30px;">
        <div class="row">
            <input type="hidden" id="id" name="id" value="<?php echo $result['id']; ?>">
            <div class="col-md-4 col-xs-12">
                <div class="form-group">
                    <label for="promotion_name" style="font-family: 'GothamBlack'">Promotion Name :</label>
                    <input type='text' class="form-control" id='promotion_name' name="promotion_name" required
                           value="<?php echo $result['name']; ?>"/>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
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
                            <span> W:505px x H:301px</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-12">
                <img class="img-responsive" style="<?php echo !empty($result['pic_path'])?"":"display:none;"; ?>" id="pic_path" name="pic_path" src="<?php echo !empty($result['pic_path'])?$result['pic_path']:''; ?>"/>
            </div>
        </div>
    </div>
<?php }else{
    echo "ERROR";
}?>