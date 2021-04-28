<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-Equiv="Cache-Control" Content="no-cache">
    <meta http-Equiv="Pragma" Content="no-cache">
    <meta http-Equiv="Expires" Content="0">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
    <link href="../inc/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../inc/css/custom.css" rel="stylesheet" type="text/css" />
    <link href="../inc/css/custom_respon.css" rel="stylesheet" type="text/css" />
    <link href="../colorbox/colorbox.css" rel="stylesheet" type="text/css" media="screen" />
    <title>Promotions Management</title>
    <link rel="stylesheet" href="../inc/css/switchery.min.css" />
    <link rel="stylesheet" href="css_spc_01/w3.css" />
    <link rel="stylesheet" href="css_spc_01/css_custom_01.css" />
    <style>
        .bg {
            /* The image used */

            /* Full height */
            height: 100%;

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background: #000000;
            /* For browsers that do not support gradients */
            background: -webkit-linear-gradient(left, #222923, #000000);
            /* For Safari 5.1 to 6.0 */
            background: -o-linear-gradient(right, #222923, #000000);
            /* For Opera 11.1 to 12.0 */
            background: -moz-linear-gradient(right, #222923, #000000);
            /* For Firefox 3.6 to 15 */
            background: linear-gradient(to right, #222923, #000000);
            /* Standard syntax */

        }

        body {
            margin: 0;
            padding: 0;
            background-color: #17a2b8;
            height: 100vh;
        }

        ul.demo {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        #main {
            margin-left: 15%;
        }
    </style>
</head>

<body class="bg">
    <script type="text/javascript">
        <!--//
        function ConfirmDelivery(urlLink, branch) {
            answer = confirm("Are you want delete?")
            if (answer != "0") {
                location = "del_delivery-sys.php?id=" + urlLink + "&branch_id=" + branch
            }
        }
        //
        -->
    </script>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php
    include('../connect.php');
    include('../constant.php');
    include('../inc/admin/query_statement.php');
    ?>
    <?php
    session_start();
    $id = $_GET['id'];
    $branch_id = $_SESSION['branch_id'];
    $isAdmin = $_SESSION['isAdmin'];
    $chkPage = "promotions";
    $_SESSION['currentPage'] = $chkPage;
    // hard branch id = 0 for both branch.
    $promoData = getAllPromotions(0);
    $branchInfo = getBranchById($branch_id);

    if ($isAdmin) {
        ?>

        <div class="w3-sidebar w3-bar-block w3-card  bg" style="display:none;background-color: black;padding-top: 30px;" id="mySidebar">

            <?php include('left_menu.php'); ?>
        </div>
        <div id="main">

            <div class="w3-black" style="opacity: 0;">
                <button id="openNav" class="w3-button w3-black w3-xlarge" onclick="w3_open()">&#9776;</button>
                <div class="w3-container">

                </div>
            </div>


            <div class="w3-container">
                <div id="divLoading">
                </div>
                <?php include('header.php'); ?>
                <div class="row promo-list-tb">
                    <div class="col-md-12" style="background-color: white ;padding:0px;border-radius: 15px 15px 15px 15px;">
                        <div style="background-color: #C1C1C1;border-bottom: 4px solid #99816E;padding: 15px 20px; border-radius: 15px 15px 15px 15px;border:0px ">
                            <div class="text-left h4" style="font-family: GothamBlack;">Search or Add :</div>
                            <div class="row">
                                <div class="col-md-3 col-xs-3">
                                    <div class="left_menu_backend">
                                        <?php include('menu_backend.php'); ?>
                                    </div>
                                </div>
                                <div class="col-md-9 col-xs-9" style="font-family: 'GothamLight';line-height: 30px;padding: 0 20px 0 30px;">
                                    <form method="post" id="form-promotion" name="form-cat" enctype="multipart/form-data">
                                        <input type="hidden" id="branch_id" name="branch_id" value="<?php echo $branch_id; ?>">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for="date-search" class="col-sm-4 col-form-label" style="font-family: 'GothamBlack'">Promotion Name :</label>
                                                    <div class="col-sm-8">
                                                        <input type='text' class="form-control" id='promo_name' name="promo_name" onkeydown="searchData($('#form-promotion')[0],event)" />
                                                    </div>
                                                </div>
                                                <!--
                                                <div class="form-group row">
                                                    <label for="date-search" class="col-sm-4 col-form-label" style="font-family: 'GothamBlack'">Picture :</label>
                                                    <div class="col-sm-8">
                                                        <input type='text' class="form-control" id='pic-name' name="pic-name" placeholder="" />
                                                    </div>
                                                </div>
    -->
                                                <!--
                                                <div class="form-group row">
                                                    <label for="date-search" class="col-sm-4 col-form-label" style="font-family: 'GothamBlack'"></label>
                                                    <div class="col-sm-8">
                                                        <div class="fileUpload btn" style="background-color: #99816E;color: white;">
                                                            <span>Upload...</span>
                                                            <input id="up-pic" name="up-pic" type="file" class="upload">
                                                        </div>
                                                        <span> Width 700px</span>
                                                    </div>
                                                </div>
    -->
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for="date-search" class="col-sm-2 col-form-label" style="font-family: 'GothamBlack'">Start :</label>
                                                    <div class="col-sm-6">
                                                        <input type='text' class="form-control" id='end_date' name="end_date" readonly />

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="date-search" class="col-sm-2 col-form-label" style="font-family: 'GothamBlack'">End :</label>
                                                    <div class="col-sm-6">
                                                        <input type='text' class="form-control" id='end_date' name="end_date" readonly />
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="date-search" class="col-sm-2 col-form-label" style="font-family: 'GothamBlack'"></label>
                                                    <div class="col-sm-6" style="text-align: right;">
                                                        <button type="button" class="btn btn-primary " onclick="loadInfo()">
                                                            Search
                                                        </button>
                                                        <!--
                                                        <button type="submit" class="btn btn-primary" style="background-color: #99816E;" onclick="createSubmit($('#form-promotion')[0],event)">
                                                            Add
                                                        </button>
    -->
                                                        <button type="button" class="btn btn-primary" style="background-color: #99816E;" onclick="opMdAddData()">
                                                            Add
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>


                                    </form>
                                    <div class="col-md-1 col-xs-12" style="text-align: right;">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div id="showData">
                        <div class="table-responsive">
                            <table class="table table-hover" style="margin: 15px;">
                                <thead style="background-color: white ">
                                    <tr>

                                        <td>
                                            <span style="font-family: 'GothamBlack'">
                                                Promotion Name
                                            </span>
                                        </td>
                                        <td>
                                            <span style="font-family: 'GothamBlack'">
                                                Show
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
                                        while ($rs = mysql_fetch_assoc($promoData)) {
                                            ?>
                                        <tr>

                                            <td style="font-family: 'GothamLight';">
                                                <?php echo $rs['name']; ?>
                                            </td>
                                            <td style="font-family: 'GothamLight';">
                                                <a href="javascript:void(0)" onclick="showDetail(<?php echo $rs['id'] ?>,'<?php echo $rs['name'] ?>' ,'<?php echo $rs['pic_name']; ?>',<?php echo $rs['status'] ?>)" style="color: black">
                                                    <span style="font-family: 'GothamLight';color:blue">Show</span>
                                                </a>
                                            </td>
                                            <td style="font-family: 'GothamLight';">
                                                <input type="checkbox" class="js-switch" id="js-check-<?php echo $rs['id']; ?>" onchange="changeStatus(<?php echo $rs['id']; ?>,this.id,<?php echo $branch_id; ?>)" <?php echo $rs['status'] == 1 ? 'checked' : '' ?> />
                                            </td>
                                            <td style="font-family: 'GothamLight';">
                                                <a href="javascript:void(0)" title="Delete" onclick="showFrmEdit(<?php echo $rs['id'] ?>,0)" style="color: black">
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
                    </div>
                </div>

            </div>
            <div class="modal modal-c fade" id="modal_add" role="dialog">
                <div class="modal-dialog modal-dialog-c modal-lg " style="width: 60%;">
                    <div class="modal-content ">
                        <form id="fm_add" name="fm_add">
                            <div class="modal-body" style="padding:30px">
                                <div class="container-fluid">
                                    <div class="content-add">
                                        <div class="form-group row">
                                            <label for="date-search" class="col-sm-3 col-form-label label-b" style="font-family: 'GothamBlack'">Promotion Name :</label>
                                            <div class="col-sm-5">
                                                <input type='text' class="form-control" id='promo_name_add' name="promo_name" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="date-search" class="col-sm-3 col-form-label label-b" style="font-family: 'GothamBlack'">Picture :</label>
                                            <div class="col-sm-5">
                                                <input type='text' class="form-control" id='pic-name' name="pic-name" placeholder="" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="date-search" class="col-sm-3 col-form-label label-b" style="font-family: 'GothamBlack'"></label>
                                            <div class="col-sm-5">
                                                <div class="fileUpload btn" style="background-color: #99816E;color: white;">
                                                    <span>Upload...</span>
                                                    <input id="up-pic" name="up-pic" type="file" class="upload">
                                                </div>
                                                <span> W:505px x H:301px</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="date-search" class="col-sm-3 col-form-label label-b">Picture preview :</label>
                                            <div class="col-sm-4" style="text-align: left;">
                                                <img id="preview">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer" style="border-color: white;">
                                <div class="row">
                                    <div class="col-xs-12 col-md-12 col-sm-12" style="text-align: right;">
                                        <div class="form-inline">
                                            <button type="submit" class="btn btn-primary" style="background-color: #99816E;" onclick="createSubmit($('#fm_add')[0],event)">
                                                Save
                                            </button>
                                            <!--
                                            <button class="btn btn-primary" type="submit" style="background-color: #99816E;">
                                                Save
                                            </button>
                                        -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="modal fade" id="promoConfirm">
                <div class="modal-dialog  modal-sm">
                    <div class="modal-content" style="background-color: black;">
                        <div class="modal-header" style="border-bottom-color: black;">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Alert</h4>
                        </div>
                        <div class="modal-body">
                            Are you want delete ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal" onclick="noDelete()">No</button>
                            <button type="button" class="btn btn-primary" id="deletePromo">Yes</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal modal-c fade" id="showDetailPromo">
                <div class="modal-dialog modal-dialog-c modal-lg" style="width: 60%;">
                    <div class="modal-content">
                        <div class="modal-header" style="border-color: white;">
                            <button type="button" hidden class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title label-b">Promotion Detail</h4>
                        </div>
                        <div class="modal-body" style="border-color: white;">
                            <div class="row">
                                <div class="col-md-3">
                                    <p style="color: black;">Promotion name :<p>
                                </div>
                                <div class="col-md-9 promo_name label-b">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3  label-b">
                                    Picture :
                                </div>
                                <div class="col-md-9 label-b">
                                    <img src="" id="promo_pic_detail" class="img-responsive">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer" style="border-color: white;">
                            <button type="button" class="btn btn-default" data-dismiss="modal" hidden>Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal modal-c fade" id="modal-edit-promo" role="dialog">
                <div class="modal-dialog modal-dialog-c modal-lg" style="width: 60%;">
                    <div class="modal-content">
                        <form id="form-promo-edit" name="form-promo-edit" enctype="multipart/form-data" method="post">
                            <div class="modal-header" style="border-color: white;" hidden>
                                <button type="button" class="close" data-dismiss="modal" style="color: white" onclick="clearform()">
                                    &times;
                                </button>
                                <h5 class="modal-title" style="color: white; font-family: 'GothamLight'" hidden>Edit Promotion</h5>

                            </div>
                            <div class="modal-body" style="border-color: white;padding:30px">

                                <div class="container-fluid">

                                    <div class="content-edit">

                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer" style="border-color: white;">
                                <div class="row">
                                    <div class="col-xs-12 col-md-12 col-sm-12" style="text-align: right;">
                                        <div class="form-inline">
                                            <div class="btn btn-primary" style="background-color: red;" onclick="deletePromo()">
                                                <span>Delete</span>
                                            </div>
                                            <button class="btn btn-primary" type="submit" style="background-color: #99816E;">
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>

    <?php } else { ?>
        <div class="container">
            Please retry to login. wait 3 second... or click <a href="../login.php" style="color: red">HERE!!</a>
        </div>
        <script type="text/javascript">
            setTimeout(function() {
                window.location = "../login.php";
            }, 3000);
        </script>
    <?php } ?>
    <style type="text/css">
        .promo-list-tb {
            padding: 0 2% 0 2%;
            color: #231F24;
        }

        .btn-reply {
            width: 100%;
            padding: 10px;
        }

        .col-b {
            color: black;
            font-weight: 700;
        }

        .reply-time {
            margin: 20px 0 0 20px;
        }

        #divLoading {
            display: none;
            position: fixed;
            z-index: 1500;
            background-image: url('../inc/img/icon/processing.gif');
            background-color: #666;
            opacity: 0.4;
            background-repeat: no-repeat;
            background-position: center;
            left: 0;
            bottom: 0;
            right: 0;
            top: 0;
        }

        #loadinggif.show {
            left: 50%;
            top: 50%;
            position: absolute;
            z-index: 101;
            width: 32px;
            height: 32px;
            margin-left: -16px;
            margin-top: -16px;
        }

        .btn-submit span {
            vertical-align: middle;
            color: #9c4835;
            font-size: 18px;
        }

        .btn-submit {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            outline: none;
            border: 0;
            background: transparent;
        }

        .fileUpload {
            position: relative;
            overflow: hidden;
        }

        .fileUpload input.upload {
            position: absolute;
            top: 0;
            right: 0;
            margin: 0;
            padding: 0;
            font-size: 20px;
            cursor: pointer;
            opacity: 0;
            filter: alpha(opacity=0);
        }
    </style>
    <script src="../inc/js/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="../inc/bootstrap/js/bootstrap.min.js"></script>
    <script src="../inc/js/switchery.min.js"></script>
    <script type="text/javascript">
        function opMdAddData() {
            $('#modal_add').modal('show');
        }

        function w3_open() {
            document.getElementById("main").style.marginLeft = "15%";
            document.getElementById("mySidebar").style.width = "15%";
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("openNav").style.display = 'none';
        }

        function w3_close() {
            document.getElementById("main").style.marginLeft = "0%";
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("openNav").style.display = "inline-block";
        }
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        elems.forEach(function(html) {
            var switchery = new Switchery(html, {
                size: 'small'
            });
        });

        $(function() {
            w3_open();
            document.getElementById("up-pic").onchange = function() {
                //document.getElementById("pic-name").value = this.files[0].name;
                document.getElementById("pic-name").value = this.files[0].name;
                var preview = document.querySelector('img[id=preview]');
                var file = this.files[0];
                var reader = new FileReader();

                reader.addEventListener("load", function() {
                    preview.src = reader.result;
                }, false);

                if (file) {
                    reader.readAsDataURL(file);
                    $('#preview').css('display', '');
                }
            };

            $('#form-promo-edit').submit(function(e) {
                $('#divLoading').css('display', 'block');
                $.ajax({
                    type: 'POST',
                    url: "edit_promo-sys.php",
                    data: new FormData($('#form-promo-edit')[0]),
                    contentType: false,
                    processData: false,
                    cache: false,
                    success: function(msg) {
                        $('#divLoading').css('display', 'none');
                        if (msg.trim() == "ERROR") {
                            $('#modal-edit-promo').modal('hide');
                            alert("Not found data.");
                        } else {
                            $('#modal-edit-promo').find('.content-edit').html(msg);
                            $('#modal-edit-promo').modal('hide');
                            loadInfo();
                        }
                    }
                });
                return false;
            });
        });

        function createSubmit(self, e) {
            if ($('#promo_name_add').val() != '') {
                e.preventDefault();
                if (document.getElementById("up-pic").files.length == 0) {
                    alert("Not found image file, check upload again!");
                    return false;
                } else {
                    $('#divLoading').css('display', 'block');
                    $.ajax({
                        type: 'POST',
                        url: "add_promotions-sys.php",
                        data: new FormData(self),
                        contentType: false,
                        processData: false,
                        cache: false,
                        success: function(msg) {
                            $('#divLoading').css('display', 'none');
                            if (msg.trim() == "ERROR") {
                                alert("Can not save data.");
                            } else {
                                document.getElementById('fm_add').reset();
                                $('#showData').html(msg);
                                $('#modal_add').modal('hide');
                            }
                        }
                    });
                    return true;
                }
            } else {
                alert('Please Input Promotion Name.');
                return false;
            }
        }

        function loadInfo() {
            let data = $('#form-promotion')[0];
            $('#divLoading').css('display', 'block');
            $.ajax({
                type: 'POST',
                url: "search_promotions-sys.php",
                data: new FormData(data),
                contentType: false,
                processData: false,
                cache: false,
                success: function(msg) {
                    $('#divLoading').css('display', 'none');
                    if (msg.trim() == "ERROR") {
                        alert("Can not search data.");
                    } else {
                        console.log(msg);
                        document.getElementById('form-promotion').reset();
                        $('#showData').html(msg);
                    }
                }
            });
        }

        function searchData(self, e) {

            if (e.keyCode === 13) {


                e.preventDefault();
                $('#divLoading').css('display', 'block');
                $.ajax({
                    type: 'POST',
                    url: "search_promotions-sys.php",
                    data: new FormData(self),
                    contentType: false,
                    processData: false,
                    cache: false,
                    success: function(msg) {
                        $('#divLoading').css('display', 'none');
                        if (msg.trim() == "ERROR") {
                            alert("Can not search data.");
                        } else {
                            console.log(msg);
                            document.getElementById('form-promotion').reset();
                            $('#showData').html(msg);
                        }
                    }
                });
                return true;
            } else {
                return false;
            }
        }

        function showDetail(id, name, pic_name, status) {
            var d = document.getElementById('promo_pic_detail');
            d.setAttribute("src", "../inc/fineuploader/php-traditional-server/uploads/promotions/" + pic_name);
            $('#showDetailPromo').find(".promo_name").html(name);
            $('#showDetailPromo').modal('show');
            return false;
        }

        function showConfirmDel(id, branch_id) {
            $('#modal-edit-promo').modal('hide');
            var d = document.getElementById('deletePromo');
            d.setAttribute("onclick", "deletePromo(" + id + "," + branch_id + ")");
            $('#promoConfirm').modal('show');
            return false;
        }

        function noDelete() {
            $('#modal-edit-promo').modal('show');
            return false;
        }

        function deletePromo() {
            //        $('#promoConfirm').modal('hide');
            $('#divLoading').css('display', 'block');
            $.ajax({
                type: 'POST',
                url: "del_promotions-sys.php",
                data: $('#form-promo-edit').serialize(),
                cache: false,
                success: function(msg) {
                    $('#divLoading').css('display', 'none');
                    if (msg.trim() == "ERROR") {
                        alert("Can not save data.");
                    } else {
                        $('#modal-edit-promo').modal('hide');
                        $('#showData').html(msg);

                    }
                }
            });
        }

        function changeStatus(id, item, branch_id) {
            $('#divLoading').css('display', 'block');
            var status = document.getElementById(item).checked ? '1' : '0';
            $.ajax({
                type: 'GET',
                url: "edit_promotions-sys.php",
                data: {
                    id: id,
                    status: status,
                    branch_id: branch_id
                },
                cache: false,
                success: function(msg) {
                    $('#divLoading').css('display', 'none');
                    if (msg.trim() == "ERROR") {
                        alert("Can not save data.");
                    }
                }
            });
        }

        function showFrmEdit(id, branch_id) {
            $('#divLoading').css('display', 'block');
            $.ajax({
                type: 'GET',
                url: "edit_promotion.php",
                data: {
                    id: id,
                    branch_id: branch_id
                },
                cache: false,
                success: function(msg) {
                    $('#divLoading').css('display', 'none');
                    if (msg.trim() == "nodata") {
                        alert("Not found data.");
                    } else {
                        $('#modal-edit-promo').find('.content-edit').html(msg);
                        $('#modal-edit-promo').modal('show');
                    }
                }
            });
            return false;
        }
    </script>
</body>

</html>