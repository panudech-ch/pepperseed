<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-Equiv="Cache-Control" Content="no-cache">
    <meta http-Equiv="Pragma" Content="no-cache">
    <meta http-Equiv="Expires" Content="0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../inc/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../inc/css/custom.css" rel="stylesheet" type="text/css" />
    <link href="../inc/css/custom_respon.css" rel="stylesheet" type="text/css" />
    <link href="../colorbox/colorbox.css" rel="stylesheet" type="text/css" media="screen" />
    <link rel="stylesheet" href="../inc/css/switchery.min.css" />
    <link rel="stylesheet" href="css_spc_01/css_custom_01.css" />
    <link rel="stylesheet" href="css_spc_01/w3.css" />
    <title>Menu Management</title>
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
    </style>
</head>

<body class="bg">
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
    $chkPage = "menus";
    $_SESSION['currentPage'] = $chkPage;
    $menuData = getAllMenuByBranchId($branch_id);
    $branchInfo = getBranchById($branch_id);
    if ($isAdmin) {
        ?>
        <div class="w3-sidebar w3-bar-block w3-card bg" style="display:none;background-color: black;padding-top: 30px;" id="mySidebar">

            <?php include('left_menu.php'); ?>
        </div>
        <div id="main" style="margin-left: 15%;">
            <div class="w3-black" style="opacity: 0;">
                <button id="openNav" class="w3-button w3-black w3-xlarge" onclick="w3_open()">&#9776;</button>
                <div class="w3-container">

                </div>
            </div>

            <div class="w3-container">
                <div id="divLoading">
                </div>
                <?php include('header.php'); ?>
                <div class="row menu-list-tb">
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
                                    <form method="post" id="form-search-menu" name="form-search-menu" enctype="multipart/form-data" action="add_menu-sys.php">
                                        <input type="hidden" id="branch_id" name="branch_id" value="<?php echo $branch_id; ?>">
                                        <div class="col-sm-6">
                                            <div class="form-group row">
                                                <label for="date-search" class="col-sm-4 col-form-label" style="font-family: 'GothamBlack'">Product name :</label>
                                                <div class="col-sm-8">
                                                    <input type='text' class="form-control" id='p_name' name="p_name" onkeydown="searchData(event)" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="date-search" class="col-sm-4 col-form-label" style="font-family: 'GothamBlack'">Category :</label>
                                                <div class="col-sm-8">
                                                    <select class="form-control" id="cat_id_sel" name="cat_id" onkeydown="searchData(event)">
                                                        <option value=""></option>
                                                        <?php
                                                            $sqlCate = getAllCategoryByBranchId($branch_id);
                                                            while ($item = mysql_fetch_assoc($sqlCate)) {
                                                                ?>
                                                            <option value="<?php echo $item['id'] ?>"><?php echo $item['cat_name'] ?></option>
                                                        <?php
                                                            }
                                                            ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="date-search" class="col-sm-4 col-form-label" style="font-family: 'GothamBlack'">Price :</label>
                                                <div class="col-sm-8">
                                                    <input type='text' class="form-control" id='p_price' name="p_price" onkeydown="searchData(event)" />
                                                </div>
                                            </div>
                                            <div class="row-search" style="text-align: right;">
                                                <button type="button" class="btn btn-primary " onclick="loadInfo()">
                                                    Search
                                                </button>
                                                <button type="button" class="btn btn-primary" style="background-color: #99816E;" onclick="intMdAddData()">
                                                    Add
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="showData">

                        </div>
                    </div>

                </div>
                <div class="modal modal-c fade" id="modal-menu-add" role="dialog">
                    <div class="modal-dialog modal-dialog-c modal-lg" style="width: 60%;">
                        <div class="modal-content" style="background-color: white">
                            <form id="fm-menu-add" name="fm-menu-add" enctype="multipart/form-data" method="post">

                                <div class="modal-body" style="padding:30px">
                                    <div class="container-fluid">
                                        <div class="content-add">

                                            <input type="hidden" id="branch_id" name="branch_id" value="<?php echo $branch_id; ?>">
                                            <div class="col-sm-7">
                                                <div class="form-group row">
                                                    <label for="date-search" class="col-sm-4 col-form-label label-b" style="font-family: 'GothamBlack'">Product name :</label>
                                                    <div class="col-sm-8">
                                                        <input type='text' class="form-control" id='p_name' name="p_name" required />
                                                    </div>

                                                </div>
                                                <div class="form-group row">
                                                    <label for="date-search" class="col-sm-4 col-form-label label-b" style="font-family: 'GothamBlack'">Category :</label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control" id="cat_id_sel_add" name="cat_id" required>
                                                            <option value=""></option>
                                                            <?php
                                                                $sqlCate = getAllCategoryByBranchId($branch_id);
                                                                while ($item = mysql_fetch_assoc($sqlCate)) {
                                                                    ?>
                                                                <option value="<?php echo $item['id'] ?>"><?php echo $item['cat_name'] ?></option>
                                                            <?php
                                                                }
                                                                ?>
                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="form-group row">
                                                    <div class="" id="choice-select" style="display: none;">
                                                        <label for="date-search" class="col-sm-12 col-form-label label-b" style="font-family: 'GothamBlack'">Choice :</label>

                                                        <div class="col-sm-12" id="show-choice">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="pic-name" class="col-sm-4 col-form-label label-b" style="font-family: 'GothamBlack'">Picture name:</label>
                                                    <div class="col-sm-8">
                                                        <input type='text' class="form-control" id='pic-name_2' name="pic-name_2" value="<?php echo $result['pic_name']; ?>" />
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-4">
                                                    </div>
                                                    <div class="col-sm-8" style="text-align: left;">
                                                        <div class="fileUpload btn btn-primary" style="background-color: #99816E;margin:0px">
                                                            <span>Select picture</span>
                                                            <input id="up-pic_2" name="up-pic_2" type="file" class="upload">
                                                        </div><span style="color: black;margin-left: 5px;">W:235px x H:460px[Max size 10mb]</span>

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="date-search" class="col-sm-4 col-form-label label-b" id="p_picture2" style="font-family: 'GothamBlack'">Picture preview :</label>
                                                    <div class="col-sm-8" style="text-align: left;">
                                                        <img id="preview_2" width="200" height="auto">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="pic-desc" class="col-sm-4 col-form-label label-b" style="font-family: 'GothamBlack'">Descriptions :</label>
                                                    <div class="col-sm-8">
                                                        <textarea class="form-control" id='boxDetail' name="boxDetail" style="height: 150px;resize: vertical;"><?php echo trim($result['p_desc']); ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-5">
                                                <div class="form-group row">
                                                    <label for="date-search" class="col-sm-4 col-form-label label-b" style="font-family: 'GothamBlack'">Price :</label>
                                                    <div class="col-sm-8">
                                                        <input type='text' class="form-control" id='p_price' name="p_price" required />
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="date-search" class="col-sm-12 col-form-label label-b" style="font-family: 'GothamBlack'">Allergy icon :</label>
                                                    <div class="col-sm-12 " id="show_allergy_2">

                                                        <div class="col-sm-6 " style="padding: 10px;">
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" name="allergy[]" value="1">
                                                                <img style="margin-left: 10px;" src="../inc/img/icon/allergy/icon_1.png" width="30px" alt="Italian Trulli">
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-6 " style="padding: 10px;">
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" name="allergy[]" value="2">
                                                                <img style="margin-left: 10px;" src="../inc/img/icon/allergy/icon_2.png" width="30px" alt="Italian Trulli">
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-6 " style="padding: 10px;">
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" name="allergy[]" value="3">
                                                                <img style="margin-left: 10px;" src="../inc/img/icon/allergy/icon_3.png" width="30px" alt="Italian Trulli">
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-6 " style="padding: 10px;">
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" name="allergy[]" value="4">
                                                                <img style="margin-left: 10px;" src="../inc/img/icon/allergy/icon_4.png" width="30px" alt="Italian Trulli">
                                                            </label>
                                                        </div>
                                                        <div class="col-sm-6 " style="padding: 10px;">
                                                            <label class="checkbox-inline">
                                                                <input type="checkbox" name="allergy[]" value="5">
                                                                <img style="margin-left: 10px;" src="../inc/img/icon/allergy/icon_5.png" width="30px" alt="Italian Trulli">
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer" style="border-color: white;">
                                    <div class="row">

                                        <div class="col-xs-12 col-md-12 col-sm-12">
                                            <div class="form-inline">

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
                <div class="modal modal-c fade" id="modal-edit-menu" role="dialog">
                    <div class="modal-dialog  modal-dialog-c modal-lg" style="width: 60%;">
                        <div class="modal-content" style="background-color: white">
                            <form id="form-menu-edit" name="form-menu-edit" enctype="multipart/form-data" method="post">
                                <div class="modal-body" style="padding: 30px;">
                                    <div class="container-fluid">
                                        <div class="content-edit">
                                        </div>

                                    </div>
                                </div>
                                <div class="modal-footer" style="border-color: white;">
                                    <div class="row">

                                        <div class="col-xs-12 col-md-12 col-sm-12">
                                            <div class="form-inline">
                                                <div class="btn btn-primary" style="background-color: red;" onclick="deleteCategory()">
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

                <div class="modal fade" tabindex="-1" role="dialog" id="modal-alert" style="font-family: GothamLight;color: black!important;">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Alert</h4>
                            </div>
                            <div class="modal-body">

                            </div>
                        </div>
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
        .menu-list-tb {
            padding: 0 2% 0 2%;
            color: #231F24;
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
            margin: 10px;
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
            loadInfo();
            w3_open();
            $("#cat_id_sel_add").change(function() {
                $.ajax({
                    type: 'GET',
                    url: "get_choicebycat.php",
                    data: {
                        cat_id: $(this).val()
                    },
                    cache: false,
                    success: function(msg) {
                        $('#show-choice').html("");
                        $('#divLoading').css('display', 'none');
                        if (msg.trim() == "ERROR") {
                            alert("Can not get data.");
                        } else if (msg.trim() == "NoData") {
                            $('#choice-select').hide();
                        } else {
                            console.log(msg);
                            $('#show-choice').html(msg);
                            $('#choice-select').show();
                        }
                    }
                });
            });

            $('#form-menu-edit').submit(function(e) {

                console.log(new FormData($('#form-menu-edit')[0]));

                $('#divLoading').css('display', 'block');
                $.ajax({
                    type: 'POST',
                    url: "edit_menu-sys.php",
                    data: new FormData($('#form-menu-edit')[0]),
                    contentType: false,
                    processData: false,
                    cache: false,
                    success: function(msg) {
                        $('#divLoading').css('display', 'none');
                        if (msg.trim() == "ERROR") {
                            $('#modal-edit-menu').modal('hide');
                            alert("Not found data.");
                        } else {

                            $('#modal-edit-menu').find('.content-edit').html(msg);
                            $('#modal-edit-menu').modal('hide');
                            loadInfo();
                        }
                    }
                });
                return false;
            });
        });

        function createSubmit(self, e) {

            if ($('#p_name').val() == '') {
                $('#modal-alert').find('.modal-body').html("Please Input Menu Name.");
                $('#modal-alert').modal('show');
                return false;
            } else if ($('#cat_id_sel').val() == '') {
                $('#modal-alert').find('.modal-body').html("Please select Category Name.");
                $('#modal-alert').modal('show');
                return false;
            } else if ($('#p_price').val() == '') {
                $('#modal-alert').find('.modal-body').html("Please input price.");
                $('#modal-alert').modal('show');
                return false;
            } else {
                e.preventDefault();
                $('#divLoading').css('display', 'block');
                $.ajax({
                    type: 'POST',
                    url: "add_menu-sys.php",
                    data: new FormData(self),
                    contentType: false,
                    processData: false,
                    cache: false,
                    success: function(msg) {
                        $('#divLoading').css('display', 'none');
                        if (msg.trim() == "ERROR") {
                            alert("Can not save data.");
                        } else {
                            self.reset();
                            loadInfo();
                            //$('#showData').html(msg);
                        }
                    }
                });
                return true;
            }
        }

        function searchData(e) {
            if (e.keyCode === 13) {
                e.preventDefault();
                loadInfo();
            } else {
                return false;
            }
        }

        function clearform() {
            $('#form-menu-edit')[0].reset();
        }

        function showFrmEdit(id, cat_id) {
            $('#divLoading').css('display', 'block');
            $.ajax({
                type: 'GET',
                url: "edit_menu_2.php",
                data: {
                    id: id,
                    cat_id: cat_id
                },
                cache: false,
                success: function(msg) {


                    $('#divLoading').css('display', 'none');
                    if (msg.trim() == "nodata") {
                        alert("Not found data.");
                    } else {
                        $('#modal-edit-menu').find('.content-edit').html(msg);
                        $('#modal-edit-menu').modal('show');
                    }
                }
            });
            return false;
        }

        function changeStatus(id, item, branch_id) {
            $('#divLoading').css('display', 'block');
            var status = document.getElementById(item).checked ? '1' : '0';
            $.ajax({
                type: 'POST',
                url: "edit_menu_status-sys.php",
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
                    } else {
                        loadInfo();
                        //$('#showData').html(msg);
                    }
                }
            });
        }

        function deleteCategory() {
            $('#divLoading').css('display', 'block');
            $.ajax({
                type: 'POST',
                url: 'del_menu-sys.php',
                data: $('#form-menu-edit').serialize(),
                cache: false,
                success: function(msg) {
                    $('#divLoading').css('display', 'none');
                    if (msg.trim() == "ERROR") {
                        alert("Can not save data.");
                    } else {
                        $('#modal-edit-menu').modal('hide');
                        loadInfo();
                        //$('#showData').html(msg);
                    }
                }
            })
        }
    </script>
    <script src="add_menu.js"></script>
</body>

</html>