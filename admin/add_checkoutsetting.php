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

    <link href="../timepicker/css/jquery.timepicker.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="../inc/css/switchery.min.css" />
    <link rel="stylesheet" href="css_spc_01/css_custom_01.css" />
    <link rel="stylesheet" href="css_spc_01/w3.css" />
    <title>Checkout Setting Management</title>

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
        #main{
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

    $chkPage = "checkout-setting";

    $_SESSION['currentPage'] = $chkPage;

    $checkoutSetting = getCheckoutSettingByBranch($branch_id);



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

                                <div class="col-md-9 col-xs-9" style="font-family: 'GothamLight';line-height: 30px;padding: 0 20px 0 30px;}">

                                    <form style="display: none;">

                                        <div class="row">

                                            <div class="col-md-6 col-xs-6">



                                            </div>

                                            <div class="col-md-3 col-xs-12">

                                            </div>

                                    </form>

                                    <div class="col-md-3 col-xs-12" style="text-align: right;">



                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                    <div id="showData">

                        <div class="table-responsive" style="margin-left: 10%;margin-right: 10%;">

                            <table class="table table-hover">
                                <thead style="background-color: white;">
                                    <tr>
                                        <td> <span style="font-family: 'GothamBlack'">
                                                Branch Name

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

                                        while ($rs = mysql_fetch_assoc($checkoutSetting)) {

                                            ?>

                                        <tr>


                                            <td style="font-family: 'GothamLight';">

                                                <?php echo $rs['branch_name']; ?>

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



            <div class="modal modal-c fade" id="modal-edit-checkout-setting" role="dialog">

                <div class="modal-dialog  modal-dialog-c modal-lg" style="width: 60%;">

                    <div class="modal-content" >

                        <form id="form-checkout-edit" name="form-checkout-edit">

                            <div class="modal-header" style="border-bottom-color: black">

                                <button type="button" class="close" data-dismiss="modal" style="color: white" onclick="clearform()">

                                    &times;

                                </button>

                                <h5 class="modal-title" style="color: white; font-family: 'GothamLight'" hidden>Edit Checkout Setting</h5>

                                <div class="container-fluid">

                                    <div class="content-edit">

                                    </div>

                                    <div class="row">

                                        <div class="col-md-4 col-sm-12">

                                        </div>

                                        <div class="col-md-4 col-sm-12">

                                        </div>

                                        <div class="col-xs-12 col-md-4 col-sm-12">

                                            <div class="form-inline">

                                                <button class="btn btn-primary" style="background-color: #99816E;">

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
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

        elems.forEach(function(html) {

            var switchery = new Switchery(html, {
                size: 'small'
            });

        });

        $(function() {
            w3_open();
            $('#form-checkout-edit').submit(function(e) {

                $('#divLoading').css('display', 'block');

                $.ajax({

                    type: 'POST',

                    url: "edit_checkoutsetting-sys.php",

                    data: new FormData(this),

                    contentType: false,

                    processData: false,

                    cache: false,

                    success: function(msg) {

                        $('#divLoading').css('display', 'none');

                        if (msg.trim() == "ERROR") {

                            alert("Can not save data.");

                        } else {

                            document.getElementById('form-checkout-edit').reset();

                            $('#modal-edit-checkout-setting').modal('hide');

                            $('#showData').html(msg);

                        }

                    }

                });

                return false;

            });

        });



        function clearform() {

            $('#form-checkout-edit')[0].reset();

        }



        function showFrmEdit(id) {

            $('#divLoading').css('display', 'block');

            $.ajax({

                type: 'GET',

                url: "edit_checkoutsetting.php",

                data: {
                    id: id
                },

                cache: false,

                success: function(msg) {

                    $('#divLoading').css('display', 'none');

                    if (msg.trim() == "nodata") {

                        alert("Not found data.");

                    } else {

                        $('#modal-edit-checkout-setting').find('.content-edit').html(msg);

                        $('#modal-edit-checkout-setting').modal('show');

                    }

                }

            });

            return false;

        }
    </script>

</body>

</html>