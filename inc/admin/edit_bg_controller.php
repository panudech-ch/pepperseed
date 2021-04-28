<?php
/**
 * Created by PhpStorm.
 * User: chawapon
 * Date: 1/28/2017
 * Time: 4:43 PM
 */
    include('../../connect.php');
    include('query_statement.php');
?>
<?php
session_start();
$fullPath = "inc/fineuploader/php-traditional-server/uploads/";
$page = $_SESSION['currentPage'];

if($_GET['mode'] == 'add'){
    $jsonData = json_decode($_POST['json'],true);
    $subfolder = $jsonData['uuid'];
    $filename = $jsonData['uploadName'];
    $fullPath = $fullPath.$subfolder.'/'.$filename;

    $rs = createMediaByUpload($fullPath,$filename,null,"bg_".$page);
    if($rs){
        $arr = array('success' => true);
        echo json_encode($arr);
    }else{
        $arr = array('success' => false);
        echo json_encode($arr);
    }
}else if($_GET['mode']  == 'delete'){
    $id = $_GET['id'];
    $page = $_GET['page'];
    $rs_sel = getMediaById($id);
    $imgPath =$rs_sel['img_path'];
    $imgName =$rs_sel['img_name'];
    $dirImg = str_replace($fullPath,'',$imgPath);
    $uuid = substr($dirImg,0,strpos($dirImg,'/'));

    //rmdir file
    $target = join(DIRECTORY_SEPARATOR, array('../fineuploader/php-traditional-server/uploads',$uuid));
    if(is_dir($target)){
        removeDir($target);
        $flag = true;
    }

    if($flag){
        $rs = deleteMedia($id);
    }
    ?>
    <SCRIPT LANGUAGE="JavaScript">window.location="edit_bg.php?page=<?php echo str_replace('bg_','',$page) ?>";</script>
    <?php
}else if($_GET['mode'] == 'edit'){
    $id = $_GET['id'];
    $status = $_GET['status'];
    $page = $_GET['page'];

    if($page == 'bg_gallery_balmain' || $page == 'bg_gallery_broadway'){
        updateStatusMedia($id,$status);
    }else{
        $updateOff = updateStatusOffMedia($page);
        $updateOn = updateStatusOnMedia($id,$status);
    } ?>
    <SCRIPT LANGUAGE="JavaScript">window.location="edit_bg.php?page=<?php echo str_replace('bg_','',$page) ?>";</script>
<?php

}

function removeDir($dir){
    foreach (scandir($dir) as $item){
        if ($item == "." || $item == "..")
            continue;
        if (is_dir($item)){
            $this->removeDir($item);
        } else {
            unlink(join(DIRECTORY_SEPARATOR, array($dir, $item)));
        }
    }
    rmdir($dir);
}
?>

