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
    <title>Delivery Areas Management</title>
    <link rel="stylesheet" href="../inc/css/switchery.min.css" />
    <link rel="stylesheet" href="css_spc_01/w3.css" />
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
    $chkPage = "delivery-area";
    $_SESSION['currentPage'] = $chkPage;
    $deliveryData = getAllDeliveryAreaByBranchId($branch_id);
 

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
                                    <form method="post" id="form-delivery-areas" name="form-cat" enctype="multipart/form-data">
                                        <div class="row">
                                            <input type="hidden" id="branch_id" name="branch_id" value="<?php echo $branch_id; ?>">

                                            <div class="col-md-6 col-xs-12">
                                                <div class="form-group row">
                                                    <label for="date-search" class="col-sm-4 col-form-label" style="font-family: 'GothamBlack'">Choice Name :</label>
                                                    <div class="col-sm-8">
                                                        <input type='text' class="form-control" id='delivery_name' name="delivery_name" placeholder="" onkeydown="searchData(event)" />
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="date-search" class="col-sm-4 col-form-label" style="font-family: 'GothamBlack'"></label>
                                                    <div class="col-sm-8" style="text-align: right;">
                                                        <button type="button" class="btn btn-primary " onclick="loadInfo()">
                                                            Search
                                                        </button>
                                                        <button type="submit" class="btn btn-primary" style="background-color: #99816E;" onclick="createSubmit(event)">Add</button>
                                                    </div>
                                                </div>

                                            </div>
                                    </form>


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
                                                Choice Name
                                            </span>
                                        </td>
                                        <td>
                                            <span style="font-family: 'GothamBlack'">
                                                Status
                                            </span>
                                        </td>
                                        <td style="text-align: center;">
                                            <span style="font-family: 'GothamBlack'">
                                                Delete
                                            </span>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody style="background-color: white;">

                                    <?php
                                        while ($rs = mysql_fetch_assoc($deliveryData)) {
                                            ?>
                                        <tr>

                                            <td style="font-family: 'GothamLight';">
                                                <?php echo $rs['area']; ?>
                                            </td>
                                            <td style="font-family: 'GothamLight';">
                                                <input type="checkbox" class="js-switch" id="js-check-<?php echo $rs['id']; ?>" onchange="changeStatus(<?php echo $rs['id']; ?>,this.id,<?php echo $branch_id; ?>)" <?php echo $rs['deli_status'] == 1 ? 'checked' : '' ?> />
                                            </td>
                                            <td style="text-align: center;">
                                                <a href="javascript:void(0)" title="Delete" onclick="showDeleteDeliveryConfirm(<?php echo $rs['id']; ?>,<?php echo $branch_id; ?>)">
                                                    <span style="color: red;" class="glyphicon glyphicon-trash"></span>
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
            <div class="modal fade" id="DeleteDeliveryConfirm">
                <div class="modal-dialog  modal-sm">
                    <div class="modal-content" style="color: black;">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Alert</h4>
                        </div>
                        <div class="modal-body">
                            Are you want delete ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                            <button type="button" class="btn btn-primary" id="deleteDelivery">ตกลง</button>
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
            w3_open();
        });

        function loadInfo() {
            $('#divLoading').css('display', 'block');
            $.ajax({
                type: 'POST',
                url: "search_delivery-sys.php",
                data: $('#form-delivery-areas').serialize(),
                cache: false,
                success: function(msg) {
                    $('#divLoading').css('display', 'none');
                    if (msg.trim() == "ERROR") {
                        alert("Can not search data.");
                    } else {
                        document.getElementById('form-delivery-areas').reset();
                        $('#showData').html(msg);
                    }
                }
            });

        }

        function searchData(e) {
            if (e.keyCode === 13) {
                e.preventDefault();
                $('#divLoading').css('display', 'block');
                $.ajax({
                    type: 'POST',
                    url: "search_delivery-sys.php",
                    data: $('#form-delivery-areas').serialize(),
                    cache: false,
                    success: function(msg) {
                        $('#divLoading').css('display', 'none');
                        if (msg.trim() == "ERROR") {
                            alert("Can not search data.");
                        } else {
                            document.getElementById('form-delivery-areas').reset();
                            $('#showData').html(msg);
                        }
                    }
                });
                return true;
            } else {
                return false;
            }
        }

        function createSubmit(e) {
            if ($('#delivery_name').val() != '') {
                e.preventDefault();
                $('#divLoading').css('display', 'block');
                $.ajax({
                    type: 'POST',
                    url: "add_delivery-sys.php",
                    data: $('#form-delivery-areas').serialize(),
                    cache: false,
                    success: function(msg) {
                        $('#divLoading').css('display', 'none');
                        if (msg.trim() == "ERROR") {
                            alert("Can not save data.");
                        } else {
                            document.getElementById('form-delivery-areas').reset();
                            $('#showData').html(msg);
                        }
                    }
                });
                return true;
            } else {
                alert('Please Input Delivery Area.');
                return false;
            }
        }

        function showDeleteDeliveryConfirm(id, branch_id) {
            var d = document.getElementById('deleteDelivery');
            d.setAttribute("onclick", "deleteDeliveryAreas(" + id + "," + branch_id + ")");
            $('#DeleteDeliveryConfirm').modal('show');
            return false;
        }

        function deleteDeliveryAreas(id, branch_id) {
            $('#DeleteDeliveryConfirm').modal('hide');
            $('#divLoading').css('display', 'block');
            $.ajax({
                type: 'GET',
                url: "del_delivery-sys.php",
                data: {
                    id: id,
                    branch_id: branch_id
                },
                cache: false,
                success: function(msg) {
                    $('#divLoading').css('display', 'none');
                    if (msg.trim() == "ERROR") {
                        alert("Can not save data.");
                    } else {
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
                url: "edit_delivery-sys.php",
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
    </script>
</body>

</html>