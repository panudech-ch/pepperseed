<?php

/**

 * Created by PhpStorm.

 * User: chawapon

 * Date: 5/20/2017

 * Time: 8:00 PM

 */

?>

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
    <title>Promotions Code Management</title>
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

    $chkPage = "promocode";

    $_SESSION['currentPage'] = $chkPage;

    $promocodeData = getAllPromotionCodeByBranchId($branch_id);

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

                <div class="row promocode-list-tb">
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

                                    <form id="form-promocode" name="form-promocode">

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for="date-search" class="col-sm-4 col-form-label" style="font-family: 'GothamBlack'">Promotions Code :</label>
                                                    <div class="col-sm-8">
                                                        <input type='text' class="form-control" id='promo_code' name="promo_code" placeholder="" onkeydown="searchData(event)" maxlength="6" required />

                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="date-search" class="col-sm-4 col-form-label" style="font-family: 'GothamBlack'"></label>
                                                    <div class="col-sm-8" style="text-align: right;">

                                                        <button type="button" class="btn btn-primary " onclick="loadInfo()">
                                                            Search
                                                        </button>
                                                        <button type="submit" class="btn btn-primary" style="background-color: #99816E;" onclick="createSubmit(event)">
                                                            Add
                                                        </button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </form>


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

                                                    Promotion Code

                                                </span>

                                            </td>

                                            <td>

                                                <span style="font-family: 'GothamBlack'">

                                                    Promotion Code Conditions

                                                </span>

                                            </td>

                                            <td>

                                                <span style="font-family: 'GothamBlack'">

                                                    Promotion Code Type

                                                </span>

                                            </td>



                                            <td>

                                                <span style="font-family: 'GothamBlack'">

                                                    Promotion Code Value

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

                                            while ($rs = mysql_fetch_assoc($promocodeData)) {

                                                ?>

                                            <tr>



                                                <td style="font-family: 'GothamLight';">

                                                    <?php echo $rs['promo_code']; ?>

                                                </td>

                                                <td style="font-family: 'GothamLight';">

                                                    <p> Order Subtotal: <?php echo $rs['resmin_label']; ?> <?php echo $rs['promo_resmin_value']; ?></p>

                                                    <p> Delivery Mode : <?php echo $rs['delivery_label']; ?></p>

                                                    <p> Payment Mode : <?php echo $rs['payment_label']; ?></p>

                                                </td>

                                                <td style="font-family: 'GothamLight';">

                                                    <?php echo $rs['type_label']; ?>

                                                </td>

                                                <td style="font-family: 'GothamLight';">

                                                    <?php echo $rs['promo_value']; ?>

                                                </td>

                                                <td style="font-family: 'GothamLight';">

                                                    <input type="checkbox" class="js-switch" id="js-check-<?php echo $rs['id']; ?>" onchange="changeStatus(<?php echo $rs['id']; ?>,this.id,<?php echo $branch_id; ?>)" <?php echo $rs['promo_stat'] == 1 ? 'checked' : '' ?> />

                                                </td>

                                                <td style="font-family: 'GothamLight';">

                                                    <a href="javascript:void(0)" style="color: black" onclick="showFrmEdit('<?php echo $rs['id'] ?>')">

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


                <div class="modal modal-c fade" id="modal-edit-promocode" role="dialog">

                    <div class="modal-dialog modal-dialog-c modal-lg" style="width: 60%;">

                        <div class="modal-content">

                            <form id="form-promocode-edit" name="form-promocode-edit">

                                <div class="modal-header" style="border-bottom-color: black">

                                    <button type="button" class="close" data-dismiss="modal" style="color: white" onclick="clearform()">

                                        &times;

                                    </button>

                                    <h5 class="modal-title" style="color: white; font-family: 'GothamLight'">Edit Promotions Code</h5>

                                    <div class="container-fluid">

                                        <div class="content-edit">

                                        </div>

                                        <div class="row">

                                            <div class="col-md-4 col-sm-12">

                                            </div>

                                            <div class="col-md-4 col-sm-12">

                                            </div>

                                            <div class="col-xs-12 col-md-12 col-sm-12" style="text-align: right;">

                                                <div class="form-inline">

                                                    <div class="btn btn-primary" style="background-color: red;" onclick="deletePromoCode()">

                                                        <span>Delete</span>

                                                    </div>

                                                    <button class="btn btn-primary" type="submit" style="background-color: #99816E;">

                                                        Save

                                                    </button>

                                                </div>

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
        .promocode-list-tb {

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
            $('#form-promocode-edit').submit(function(e) {

                $('#divLoading').css('display', 'block');

                $.ajax({

                    type: 'POST',

                    url: "edit_promocode-sys.php",

                    data: new FormData(this),

                    contentType: false,

                    processData: false,

                    cache: false,

                    success: function(msg) {

                        $('#divLoading').css('display', 'none');

                        if (msg.trim() == "ERROR") {

                            alert("Can not save data.");

                        } else {

                            document.getElementById('form-promocode-edit').reset();

                            $('#modal-edit-promocode').modal('hide');
                            //$(".promo_code_s").trigger("click")
                            $('#form-promocode').submit();

                            //                            $('#showData').html(msg);

                        }

                    }

                });

                return false;

            });

        });



        function createSubmit(e) {

            if ($('#promo_code') != '' && $('#promo_code').val().length === 6) {

                e.preventDefault();

                $('#divLoading').css('display', 'block');

                $.ajax({

                    type: 'POST',

                    url: "add_promocode-sys.php",

                    data: $('#form-promocode').serialize(),

                    cache: false,

                    success: function(msg) {

                        $('#divLoading').css('display', 'none');

                        if (msg.trim() == "ERROR") {

                            alert("Can not save data.");

                        } else {

                            document.getElementById('form-promocode').reset();

                            $('#showData').html(msg);

                        }

                    }

                });

                return true;

            } else {

                alert('Please Input Promotion Code [Fix 6 Digit].');

                return false;

            }

        }

        function loadInfo() {

            $('#divLoading').css('display', 'block');

            $.ajax({

                type: 'POST',

                url: "search_promocode-sys.php",

                data: $('#form-promocode').serialize(),

                cache: false,

                success: function(msg) {

                    $('#divLoading').css('display', 'none');

                    if (msg.trim() == "ERROR") {

                        alert("Can not search data.");

                    } else {

                        document.getElementById('form-promocode').reset();

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

                    url: "search_promocode-sys.php",

                    data: $('#form-promocode').serialize(),

                    cache: false,

                    success: function(msg) {

                        $('#divLoading').css('display', 'none');

                        if (msg.trim() == "ERROR") {

                            alert("Can not search data.");

                        } else {

                            document.getElementById('form-promocode').reset();

                            $('#showData').html(msg);

                        }

                    }

                });

            } else {

                return false;

            }

        }



        function clearform() {

            $('#form-promocode-edit')[0].reset();

        }



        function showFrmEdit(id) {

            $('#divLoading').css('display', 'block');

            $.ajax({

                type: 'GET',

                url: "edit_promocode.php",

                data: {
                    id: id
                },

                cache: false,

                success: function(msg) {

                    $('#divLoading').css('display', 'none');

                    if (msg.trim() == "nodata") {

                        alert("Not found data.");

                    } else {

                        $('#modal-edit-promocode').find('.content-edit').html(msg);

                        $('#modal-edit-promocode').modal('show');

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

                url: "edit_promocode-sys.php",

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



        function deletePromoCode() {

            $('#divLoading').css('display', 'block');

            $.ajax({

                type: 'POST',

                url: 'del_promocode-sys.php',

                data: $('#form-promocode-edit').serialize(),

                cache: false,

                success: function(msg) {

                    $('#divLoading').css('display', 'none');

                    if (msg.trim() == "ERROR") {

                        alert("Can not save data.");

                    } else {

                        document.getElementById('form-promocode-edit').reset();

                        $('#modal-edit-promocode').modal('hide');

                        $('#showData').html(msg);

                    }

                }

            })

        }



        $(document).ready(function() {

            $('#promo_code').keypress(function() {

                checkStr(this, null);

                if (this.value.length == this.maxLength) {

                    return false;

                }

            });

        });



        function checkStr(source, next) {

            if ($(source).val().length == $(source).attr('maxlength')) {

                //$('#'+next).val("");

                if (next != null)

                {

                    $('#' + next).focus();

                }

            }

            if ($(source).val().length > $(source).attr('maxlength'))

            {

                return false;

            }

        }
    </script>

</body>

</html>