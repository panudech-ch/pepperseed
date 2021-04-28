<?php
/**
 * Created by PhpStorm.
 * User: chawapon
 * Date: 1/26/2017
 * Time: 11:33 PM
 */
    include('../../connect.php');
    include('query_statement.php');
?>

<?php
    session_start();
    $isAdmin = $_SESSION['isAdmin'];
    $page = "bg_".$_GET['page'];

    if($page != $_SESSION['currentPage'])
    {
        $page = "bg_".$_GET['page'];
        $_SESSION['currentPage'] = $_GET['page'];
    }

    $rs_img = getMediaByPage($page);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../fineuploader/css/fine-uploader-new.css" rel="stylesheet" type="text/css"/>
    <link href="../css/custom.css" rel="stylesheet" type="text/css"/>
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <title>Add/Edit/Delete background page</title>
</head>
<body class="bg_staff">
<?php
    if($isAdmin) {
?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <label for="fine-uploader"><span style="color: #0c0d0d">Upload Image for Background..</span></label>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div id="fine-uploader">
                </div>
            </div>
        </div>
    </div>


    <script src="../fineuploader/js/fine-uploader.js" type="text/javascript"></script>
    <script src="../js/jquery-1.12.4.min.js" type="text/javascript"></script>
    <script type="text/template" id="qq-template">
        <div class="qq-uploader-selector qq-uploader" qq-drop-area-text="Drop files here">
            <div class="qq-total-progress-bar-container-selector qq-total-progress-bar-container">
                <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                     class="qq-total-progress-bar-selector qq-progress-bar qq-total-progress-bar"></div>
            </div>
            <div class="qq-upload-drop-area-selector qq-upload-drop-area" qq-hide-dropzone>
                <span class="qq-upload-drop-area-text-selector"></span>
            </div>
            <div class="qq-upload-button-selector qq-upload-button">
                <div>Upload a file</div>
            </div>
            <span class="qq-drop-processing-selector qq-drop-processing">
                <span>Processing dropped files...</span>
                <span class="qq-drop-processing-spinner-selector qq-drop-processing-spinner"></span>
            </span>
            <ul class="qq-upload-list-selector qq-upload-list" aria-live="polite" aria-relevant="additions removals">
                <li>
                    <div class="qq-progress-bar-container-selector">
                        <div role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                             class="qq-progress-bar-selector qq-progress-bar"></div>
                    </div>
                    <span class="qq-upload-spinner-selector qq-upload-spinner"></span>
                    <img class="qq-thumbnail-selector" qq-max-size="100" qq-server-scale>
                    <span class="qq-upload-file-selector qq-upload-file"></span>
                    <span class="qq-edit-filename-icon-selector qq-edit-filename-icon"
                          aria-label="Edit filename"></span>
                    <input class="qq-edit-filename-selector qq-edit-filename" tabindex="0" type="text">
                    <span class="qq-upload-size-selector qq-upload-size"></span>
                    <button type="button" class="qq-btn qq-upload-cancel-selector qq-upload-cancel">Cancel</button>
                    <button type="button" class="qq-btn qq-upload-retry-selector qq-upload-retry">Retry</button>
                    <!--<button type="button" class="qq-btn qq-upload-delete-selector qq-upload-delete">Delete</button>-->
                    <span role="status" class="qq-upload-status-text-selector qq-upload-status-text"></span>
                </li>
            </ul>

            <dialog class="qq-alert-dialog-selector">
                <div class="qq-dialog-message-selector"></div>
                <div class="qq-dialog-buttons">
                    <button type="button" class="qq-cancel-button-selector">Close</button>
                </div>
            </dialog>

            <dialog class="qq-confirm-dialog-selector">
                <div class="qq-dialog-message-selector"></div>
                <div class="qq-dialog-buttons">
                    <button type="button" class="qq-cancel-button-selector">No</button>
                    <button type="button" class="qq-ok-button-selector">Yes</button>
                </div>
            </dialog>

            <dialog class="qq-prompt-dialog-selector">
                <div class="qq-dialog-message-selector"></div>
                <input type="text">
                <div class="qq-dialog-buttons">
                    <button type="button" class="qq-cancel-button-selector">Cancel</button>
                    <button type="button" class="qq-ok-button-selector">Ok</button>
                </div>
            </dialog>
        </div>
    </script>

    <script>
        var uploader = new qq.FineUploader({
            debug: true,
            element: document.getElementById('fine-uploader'),
            request: {
                endpoint: '../fineuploader/php-traditional-server/endpoint.php'
            },
            deleteFile: {
                enabled: true,
                forceConfirm: true,
                endpoint: '../fineuploader/php-traditional-server/endpoint.php'
            },
            retry: {
                enableAuto: true
            },
            callbacks: {
                onComplete: function (id, fileName, responseJSON) {
                    $.ajax({
                        type: 'POST',
                        url: '../admin/edit_bg_controller.php?mode=add',
                        data: {json: JSON.stringify(responseJSON)},
                        dataType: 'json',
                        success: function (data) {
                            window.location='edit_bg.php?mode=edit&page=<?php echo $_GET['page'];?>';
                        },
                        error: function (e) {
                            console.log(e.message);
                        }
                    });
                },
                onDelete: function (id) {
                    $.ajax({
                        type: 'POST',
                        url: '../admin/edit_bg_controller.php?mode=delete',
                        data: {json: JSON.stringify({"uuid": this.getUuid(id), "filename": this.getName(id)})},
                        dataType: 'json',
                        success: function (data) {
                            window.location='edit_bg.php?mode=edit&page=<?php echo $_GET['page'];?>';
                        },
                        error: function (e) {
                            console.log(e.message);
                        }
                    });
                }
            }
        });
    </script>
        <br/>
        <br/>
            <div class="container">
                <div style="background-color: white">
                    <div class="row" align="center">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                           No.
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                            Image
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                            Status
                        </div>
                    </div>
                        <?php
                            while ($rs = mysql_fetch_array($rs_img)){
                                $i++;
                        ?>
                     <div class="row" align="center" style="padding: 10px 10px 0px 0px">
                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                             <?php echo $i;?>
                         </div>
                         <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                             <img src="../../<?php echo $rs['img_path']; ?>" width="50" class="borImgProduct" />
                             <a href="edit_bg_controller.php?mode=delete&id=<?php echo $rs['id'] ?>&page=<?php echo $page; ?>" ><span class="glyphicon glyphicon-remove-circle"></span></a>
                         </div>
                         <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                             <a href="edit_bg_controller.php?mode=edit&id=<?php echo $rs['id']?>&status=<?php echo $rs['img_status'] == 0 ? 1 : 0;?>&page=<?php echo $page;?>" <?php echo $rs['img_status'] == 1 ? disabled : '';?>>
                                 <?php if($rs['lable'] == 'On')
                                 { ?> <span class="glyphicon glyphicon-ok-sign"></span>
                                 <?php  }
                                 else{ ?>
                                     <span class="glyphicon glyphicon-remove-sign"></span>
                                 <?php }?>
                             </a>
                         </div>
                     </div>
                        <?php
                            }
                         ?>
                </div>
            </div>
    <?php } else { ?>
    <div class="container">
        Please retry to login. wait 3 second... or click <a href="../../login.php" style="color: red">HERE!!</a>
    </div>
    <script type="text/javascript">
        setTimeout(function() {
                window.location="../../login.php";
        },3000);
    </script>
<?php
    }
?>
</body>
</html>