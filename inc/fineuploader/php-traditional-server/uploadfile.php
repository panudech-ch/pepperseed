<?php
/**
 * Created by PhpStorm.
 * User: chawapon
 * Date: 2/19/2017
 * Time: 10:47 AM
 */

    function uploadfile($file,$filename,$folder){
        if(isset($file["type"]) && !empty($file)){
            $validextensions = array("jpeg", "jpg", "png");
            $temporary = explode(".", $file["name"]);
            $file_extension = end($temporary);
            if ((($file["type"] == "image/png") || ($file["type"] == "image/jpg") || ($file["type"] == "image/jpeg")
                ) && ($file["size"] < 5000000) && in_array($file_extension, $validextensions)){
                if ($file["error"] > 0)
                {
                    $arr = array('success'=>false,'msg'=>'Return Code:'.$file["error"],'targetPath' =>'');
                    return $arr;
                }
                else
                {
                    $sourcePath = $file['tmp_name']; // Storing source path of the file in a variable
                    $targetPath = "../inc/fineuploader/php-traditional-server/uploads/".$folder.'/'.$filename; // Target path where file is to be stored
                    move_uploaded_file($sourcePath,$targetPath);

                    $arr = array('success'=>true,'msg'=>'','targetPath' =>$targetPath);
                    return $arr;
                }
            }
            else
            {
                $arr = array('success'=>false,'msg'=>'Invalid file Size or Type','targetPath' =>'');
                return $arr;
            }
        }
    }
?>