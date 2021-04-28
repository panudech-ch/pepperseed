<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-Equiv="Cache-Control" Content="no-cache">
    <meta http-Equiv="Pragma" Content="no-cache">
    <meta http-Equiv="Expires" Content="0">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
    <link href="../inc/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../inc/css/custom.css" rel="stylesheet" type="text/css" />
    <link href="../inc/css/custom_respon.css" rel="stylesheet" type="text/css" />
    <link href="../colorbox/colorbox.css" rel="stylesheet" type="text/css" media="screen" />
    <link href="../timepicker/css/jquery.timepicker.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../inc/css/switchery.min.css" />
    <link rel="stylesheet" href="css_spc_01/css_custom_01.css" />
    <link rel="stylesheet" href="css_spc_01/w3.css" />
    <title>Choice Management</title>
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
    session_start();
    $id = $_POST['id'];
    $cat_id = $_POST['cat_id'];
    $branch_id = $_SESSION['branch_id'];
    $ordertime = 'dinner';
    $isAdmin = $_SESSION['isAdmin'];
    $chkPage = "choice-meat";
    $_SESSION['currentPage'] = $chkPage;

    $choiceData = getAllChoiceByBranchId($branch_id);
    $catData = getAllCategoryByBranchId($branch_id);
    $branchInfo = getBranchById($branch_id);
    ?>
    <?php if ($isAdmin) {
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
                <div class="row order-list-tb">
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
                                    <form id="form-search-menu">
                                        <div class="col-sm-6">
                                            <div class="form-group row">
                                                <label for="choice_name" class="col-sm-4 col-form-label" style="font-family: 'GothamBlack'">Choice Name :</label>
                                                <div class="col-sm-8">
                                                    <input type='text' class="form-control" id='choice_name' name="choice_name" onkeydown="searchData(event)" />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="cat_id" class="col-sm-4 col-form-label" style="font-family: 'GothamBlack'">Category :</label>
                                                <div class="col-sm-8">
                                                    <select id="cat_id" name="cat_id" class="form-control" onkeydown="searchData(event)">
                                                        <option value=""></option>
                                                        <?php $cat = getAllCategoryByBranchId($branch_id);
                                                            while ($rscat = mysql_fetch_assoc($cat)) { ?>
                                                            <option value="<?php echo $rscat['id']; ?>"><?php echo $rscat['cat_name']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="price" class="col-sm-4 col-form-label" style="font-family: 'GothamBlack'">Price :</label>
                                                <div class="col-sm-8">
                                                    <input type='text' class="form-control" id='price' name="price" style="width:100%;" onkeydown="searchData(event)" />
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
                                    <!--
                        <div class="col-md-1 col-xs-12" style="text-align: right;">
                            <button type="submit" class="btn btn-submit"><span class="glyphicon glyphicon-plus-sign btn-submit" onclick="createSubmit(event)"></span></button>
                        </div>
                        -->
                                </div>
                            </div>

                        </div>
                        <div id="showData">

                        </div>
                    </div>


                </div>

                <div class="modal modal-c fade" id="modal_add" role="dialog">
                    <div class="modal-dialog modal-dialog-c modal-lg " style="width: 60%;">
                        <div class="modal-content ">
                            <form id="fm_add_data" name="fm_add_data">
                                <div class="modal-body" style="padding:30px">
                                    <div class="container-fluid">
                                        <div class="content-add">
                                            <div class="form-group row">
                                                <label for="choice_name" class="col-sm-4 col-form-label label-b" style="font-family: 'GothamBlack'">Choice Name :</label>
                                                <div class="col-sm-8">
                                                    <input type='text' class="form-control" id='choice_name' name="choice_name" required />
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="cat_id" class="col-sm-4 col-form-label label-b" style="font-family: 'GothamBlack'">Category :</label>
                                                <div class="col-sm-8">
                                                    <select id="cat_id" name="cat_id" class="form-control" required>
                                                        <option value=""></option>
                                                        <?php $cat = getAllCategoryByBranchId($branch_id);
                                                            while ($rscat = mysql_fetch_assoc($cat)) { ?>
                                                            <option value="<?php echo $rscat['id']; ?>"><?php echo $rscat['cat_name']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="price" class="col-sm-4 col-form-label label-b" style="font-family: 'GothamBlack'">Price :</label>
                                                <div class="col-sm-8">
                                                    <input type='text' class="form-control" id='price' name="price" style="width:50%;" required />
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

                <div class="modal modal-c  fade" id="modal-edit-choice" role="dialog">
                    <div class="modal-dialog modal-dialog-c modal-lg" style="width: 60%;">
                        <div class="modal-content" style="background-color: white">
                            <form id="form-choice-edit" name="form-choice-edit">


                                <div class="modal-body" style="padding:30px">
                                    <div class="container-fluid">
                                        <div class="content-add"> <input id="id" name="id" type="hidden" value="" />
                                            <div class="form-group row">
                                                <label for="choice_name" class="col-sm-2 col-form-label label-b" style="font-family: 'GothamBlack'">Choice Name :</label>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" id="choice_name" name="choice_name" required>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="cat_id" class="col-sm-2 col-form-label label-b" style="font-family: 'GothamBlack'">Category :</label>
                                                <div class="col-sm-5">
                                                    <select id="cat_id" name="cat_id" class="form-control" onkeydown="searchData(event)" required>
                                                        <?php while ($rc = mysql_fetch_assoc($catData)) { ?>
                                                            <option value="<?php echo $rc['id']; ?>"><?php echo $rc['cat_name']; ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="price" class="col-sm-2 col-form-label label-b" style="font-family: 'GothamBlack'">Price :</label>
                                                <div class="col-sm-5">
                                                    <input type="text" class="form-control" id="price" name="price" style="width:50%;" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer" style="border-color: white;">

                                    <div class="row">

                                        <div class="col-xs-12 col-md-12 col-sm-12">
                                            <div class="form-inline">
                                                <div class="btn btn-primary" style="background-color: red;" onclick="deleteChoice()">
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
        $.fn.serializeObject = function() {
            var o = {};
            var a = this.serializeArray();
            $.each(a, function() {
                if (o[this.name]) {
                    if (!o[this.name].push) {
                        o[this.name] = [o[this.name]];
                    }
                    o[this.name].push(this.value || '');
                } else {
                    o[this.name] = this.value || '';
                }
            });
            return o;
        };
        $(function() {
            loadInfo();
            w3_open();
            $('#fm_add_data').submit(function(e) {
                var dataJson = $('#fm_add_data').serializeObject();


                e.preventDefault();

                $('#divLoading').css('display', 'block');
                $.ajax({
                    type: 'POST',
                    url: "add_choice-sys.php",
                    data: $('#fm_add_data').serialize(),
                    cache: false,
                    success: function(msg) {
                        $('#divLoading').css('display', 'none');
                        if (msg.trim() == "ERROR") {

                            alert("Can not save data.");
                        } else {
                            intMdAddData();
                            document.getElementById('fm_add_data').reset();
                            loadInfo();
                        }
                    }
                });

            });

            $('#form-choice-edit').submit(function(e) {
                $('#divLoading').css('display', 'block');
                $.ajax({
                    type: 'POST',
                    url: "edit_choice-sys.php",
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    cache: false,
                    success: function(msg) {
                        $('#divLoading').css('display', 'none');
                        if (msg.trim() == "ERROR") {
                            alert("Can not save data.");
                        } else {
                            document.getElementById('form-choice-edit').reset();
                            $('#modal-edit-choice').modal('hide');
                            loadInfo()

                        }
                    }
                });
                return false;
            });
        });

        function clrCatFm() {
            $('#fm_add_data')[0].reset();
        }

        function intMdAddData() {
            clrCatFm();
            $('#modal_add').modal('toggle');
            return false;
        }

        function searchData(e) {
            if (e.keyCode === 13) {
                e.preventDefault();
                loadInfo();
            } else {
                return false;
            }
        }

        function loadInfo() {

            $('#divLoading').css('display', 'block');
            $.ajax({
                type: 'POST',
                url: "search_choice-sys.php",
                data: $('#form-search-menu').serialize(),
                cache: false,
                success: function(msg) {
                    $('#divLoading').css('display', 'none');
                    if (msg.trim() == "ERROR") {
                        alert("Can not search data.");
                    } else {
                        document.getElementById('form-search-menu').reset();
                        $('#showData').html(msg);
                    }
                }
            });
        }

        // function searchData(e) {
        //     if (e.keyCode == 13) {
        //         e.preventDefault();
        //         $('#divLoading').css('display', 'block');
        //         $.ajax({
        //             type: 'POST',
        //             url: "search_choice-sys.php",
        //             data: $('#form-choice').serialize(),
        //             cache: false,
        //             success: function(msg) {
        //                 $('#divLoading').css('display', 'none');
        //                 if (msg.trim() == "ERROR") {
        //                     alert("Can not search data.");
        //                 } else {
        //                     document.getElementById('form-choice').reset();
        //                     $('#showData').html(msg);
        //                 }
        //             }
        //         });
        //         return true;
        //     } else {
        //         return false;
        //     }
        // }

        function createSubmit(e) {
            if ($('#choice_name').val() != '' && $('#price').val() != '' && $('#cat_id').val() != '') {
                e.preventDefault();
                $('#divLoading').css('display', 'block');
                $.ajax({
                    type: 'POST',
                    url: "add_choice-sys.php",
                    data: $('#form-choice').serialize(),
                    cache: false,
                    success: function(msg) {
                        $('#divLoading').css('display', 'none');
                        if (msg.trim() == "ERROR") {
                            alert("Can not save data.");
                        } else {
                            document.getElementById('form-choice').reset();
                            loadInfo();
                        }
                    }
                });
            } else {
                if ($('#choice_name').val() == '') {
                    alert('Please Input Choice Name.');
                } else if ($('#choice_price').val() == '') {
                    alert('Please Input Choice Price.');
                } else if ($('#cat_id').val() == '') {
                    alert('Please Select Category.');
                }
                return false;
            }
        }

        function changeStatus(id, item, branch_id) {
            $('#divLoading').css('display', 'block');
            var status = document.getElementById(item).checked ? '1' : '0';
            $.ajax({
                type: 'POST',
                url: "edit_choice-sys.php",
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

        function deleteChoice() {
            $('#divLoading').css('display', 'block');
            $.ajax({
                type: 'POST',
                url: 'del_choice-sys.php',
                data: $('#form-choice-edit').serialize(),
                cache: false,
                success: function(msg) {
                    $('#divLoading').css('display', 'none');
                    if (msg.trim() == "ERROR") {
                        alert("Can not save data.");
                    } else {
                        document.getElementById('form-choice-edit').reset();
                        $('#modal-edit-choice').modal('hide');
                        loadInfo();
                    }
                }
            })
        }

        function clearform() {
            $('#form-choice-edit')[0].reset();
        }

        function showFrmEdit(id, name, price, catid) {
            $('#modal-edit-choice').find('#id').val("");
            $('#modal-edit-choice').find('#id').val(id);
            $('#modal-edit-choice').find('#choice_name').val("");
            $('#modal-edit-choice').find('#choice_name').val(name);
            $('#modal-edit-choice').find('#price').val("");
            $('#modal-edit-choice').find('#price').val(price);
            $('#modal-edit-choice').find('#cat_id').val("");
            $('#modal-edit-choice').find('#cat_id').val(catid);
            $('#modal-edit-choice').modal('show');
            return false;
        }
    </script>
</body>

</html>