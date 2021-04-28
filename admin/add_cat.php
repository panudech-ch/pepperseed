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
    <link href="../datePicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
    <link href="../timepicker/css/jquery.timepicker.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../inc/css/switchery.min.css" />
    <link rel="stylesheet" href="css_spc_01/css_custom_01.css" />
    <link rel="stylesheet" href="css_spc_01/w3.css" />


    <title>Category Management</title>
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
    $chkPage = "categories";
    $_SESSION['currentPage'] = $chkPage;
    $catData = getAllCategoryByBranchId($branch_id);
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
                <div class="row order-list-tb ">
                    <div class="col-md-12" style="background-color: white ;padding:0px;border-radius: 15px 15px 15px 15px;">
                        <div style="background-color: #C1C1C1;border-bottom: 4px solid #99816E;padding: 15px 20px; border-radius: 15px 15px 15px 15px;border:0px ">
                            <div class="text-left h4" style="font-family: GothamBlack;">Search or Add :</div>
                            <div class="row">
                                <div class="col-md-3 col-xs-3">
                                    <div class="left_menu_backend">
                                        <?php include('menu_backend.php'); ?>
                                    </div>
                                </div>
                                <div class="col-md-9 col-xs-9" style="font-family: 'GothamLight';line-height: 30px;padding: 0 20px 0 30px;}">
                                    <form id="form-cat" name="form-cat">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group row">

                                                    <label for="date-search" class="col-sm-4 col-form-label " style="font-family: 'GothamBlack'">Category Name :</label>
                                                    <div class="col-sm-8">
                                                        <input type='text' class="form-control" id='cat_name' name="cat_name" placeholder="" onkeydown="searchData(event)" />
                                                    </div>


                                                </div>
                                                <div class="row-search" style="text-align: right;">

                                                    <button type="button" class="btn btn-primary " onclick="loadInfo()">
                                                        Search
                                                    </button>
                                                    <button type="button" class="btn btn-primary " style="background-color: #99816E;" onclick="intMdAddData()">
                                                        Add
                                                    </button>

                                                </div>
                                            </div>
                                            <div class="col-sm-6">

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
                <div class="modal modal-c fade" id="modal-edit-cat" role="dialog">
                    <div class="modal-dialog  modal-dialog-c modal-lg" style="width: 60%;">
                        <div class="modal-content">
                            <form id="form-cat-edit" name="form-cat-edit">

                                <div class="modal-body" style="padding:30px">
                                    <div class="container-fluid">
                                        <div class="content-add">
                                            <div class="form-group row">
                                                <input id="id" name="id" type="hidden" value="" />
                                                <label for="date-search" class="col-sm-2 col-form-label label-b">Category Name :</label>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" id="cat_name" name="cat_name" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">

                                                <label for="date-search" class="col-sm-2 col-form-label label-b">Picture name :</label>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" id='pic-name' name="pic-name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-2">
                                                </div>
                                                <div class="col-sm-5" style="text-align: left;">
                                                    <div class="fileUpload btn btn-primary" style="background-color: #99816E;margin:0px">
                                                        <span>Change picture</span>
                                                        <input id="up-pic" name="up-pic" type="file" class="upload">
                                                    </div><span style="color: black;margin-left: 5px;">W:235px x H:460px[Max size 10mb]</span>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="date-search" class="col-sm-2 col-form-label label-b">Picture preview :</label>
                                                <div class="col-sm-5" style="text-align: left;">
                                                    <img id="preview" width="200" height="auto">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer" style="border-color: white;">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12 col-sm-12" style="text-align: right;">
                                            <div class="form-inline">
                                                <div class="btn btn-primary" style="background-color: red;" onclick="deleteCategory()">
                                                    <span>Delete</span>
                                                </div>
                                                <button class="btn btn-primary" style="background-color: #99816E;">
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
                <div class="modal modal-c fade" id="modal-cat-add" role="dialog">
                    <div class="modal-dialog modal-dialog-c modal-lg " style="width: 60%;">
                        <div class="modal-content ">
                            <form id="fm-cat-add" name="fm-cat-add">
                                <div class="modal-body" style="padding:30px">
                                    <div class="container-fluid">
                                        <div class="content-add">
                                            <div class="form-group row">
                                                <input id="id_2" name="id_2" type="hidden" value="" />
                                                <label for="date-search" class="col-sm-2 col-form-label label-b">Category Name :</label>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" id="cat_name_2" name="cat_name_2" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">

                                                <label for="date-search" class="col-sm-2 col-form-label label-b">Picture name :</label>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" id='pic-name_2' name="pic-name_2">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-2">
                                                </div>
                                                <div class="col-sm-5" style="text-align: left;">
                                                    <div class="fileUpload btn btn-primary" style="background-color: #99816E;margin:0px">
                                                        <span>Select picture</span>
                                                        <input id="up-pic_2" name="up-pic_2" type="file" class="upload">
                                                    </div><span style="color: black;margin-left: 5px;">W:235px x H:460px[Max size 10mb]</span>

                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="date-search" class="col-sm-2 col-form-label label-b">Picture preview :</label>
                                                <div class="col-sm-5" style="text-align: left;">
                                                    <img id="preview_2" width="200" height="auto">
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer" style="border-color: white;">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-12 col-sm-12" style="text-align: right;">
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
        .order-list-tb {
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
        // controler lfet menu
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
        // controler lfet menu

        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        elems.forEach(function(html) {
            var switchery = new Switchery(html, {
                size: 'small'
            });
        });

        $(function() {
            loadInfo();
            w3_open();
            $('#form-cat-edit').submit(function(e) {
                $('#divLoading').css('display', 'block');

                //console.log(new FormData(this));
                //return false;
                // var datahead = {
                //     name : "panudech",
                //     lastname : "changthong"
                // }
                // var dataObj = {
                //     data : datahead
                // }
                $.ajax({
                    type: 'POST',
                    url: "edit_cat-sys.php",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    cache: false,
                    success: function(msg) {
                        $('#divLoading').css('display', 'none');
                        if (msg.trim() == "ERROR") {
                            alert("Can not save data.");
                        } else {
                            document.getElementById('form-cat-edit').reset();
                            $('#modal-edit-cat').modal('hide');
                            loadInfo();
                            //$('#showData').html(msg);
                        }
                    }
                });
                return false;
            });

            document.getElementById("up-pic").onchange = function() {
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


        });


        function createSubmit(e) {

            if ($('#cat_name') != '') {
                e.preventDefault();
                $('#divLoading').css('display', 'block');
                $.ajax({
                    type: 'POST',
                    url: "add_cat-sys.php",
                    data: $('#form-cat').serialize(),
                    cache: false,
                    success: function(msg) {
                        $('#divLoading').css('display', 'none');
                        if (msg.trim() == "ERROR") {
                            alert("Can not save data.");
                        } else {
                            document.getElementById('form-cat').reset();
                            $('#showData').html(msg);
                        }
                    }
                });
                return true;
            } else {
                alert('Please Input Category Name.');
                return false;
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
            $('#form-cat-edit')[0].reset();
        }

        function showFrmEdit(id, name, img, imgname) {
            $('#modal-edit-cat').find('#id').val("");
            $('#modal-edit-cat').find('#id').val(id);
            $('#modal-edit-cat').find('#cat_name').val("");
            $('#modal-edit-cat').find('#cat_name').val(name);
            $('#modal-edit-cat').find('#preview').attr('src', img);
            $('#modal-edit-cat').find('#pic-name').val("");
            $('#modal-edit-cat').find('#pic-name').val(imgname);
            $('#modal-edit-cat').modal('show');
            return false;
        }

        function changeStatus(id, item, branch_id) {
            $('#divLoading').css('display', 'block');
            var status = document.getElementById(item).checked ? '1' : '0';
            $.ajax({
                type: 'POST',
                url: "edit_cat-sys.php",
                data: {
                    id: id,
                    status: status,
                    branch_id: branch_id
                },
                cache: false,
                success: function(msg) {
                    $('#divLoading').css('display', 'none');
                    loadInfo();
                    if (msg.trim() == "ERROR") {
                        alert("Can not save data.");
                    }
                }
            });
        }

        function deleteCategory() {
            $('#divLoading').css('display', 'block');
            $.ajax({
                type: 'POST',
                url: 'del_cat-sys.php',
                data: $('#form-cat-edit').serialize(),
                cache: false,
                success: function(msg) {
                    $('#divLoading').css('display', 'none');
                    if (msg.trim() == "ERROR") {
                        alert("Can not save data.");
                    } else {
                        document.getElementById('form-cat-edit').reset();
                        $('#modal-edit-cat').modal('hide');
                        loadInfo();
                        //$('#showData').html(msg);

                    }
                }
            })
        }
       
    </script>
    <script src="add_cat.js"></script>
</body>

</html>