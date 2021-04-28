<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta http-Equiv="Cache-Control" Content="no-cache">

    <meta http-Equiv="Pragma" Content="no-cache">

    <meta http-Equiv="Expires" Content="0">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

    <link href="../css/custom.css" rel="stylesheet" type="text/css" />

    <link href="../css/custom_respon.css" rel="stylesheet" type="text/css" />

    <link href="../../colorbox/colorbox.css" rel="stylesheet" type="text/css" media="screen" />

    <link href="../../datePicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />

    <link href="../../timepicker/css/jquery.timepicker.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../../admin/css_spc_01/w3.css" />
    <title>Show Order List</title>
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

        .header th {
            height: 60px;
            line-height: 2px;
        }

        .container-c {
            height: 100%;
            position: relative;

        }

        .vertical-center-c {
            width: 100%;
            margin: 0;
            position: absolute;
            top: 50%;
            -ms-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        #main {
            margin-left: 15%;
        }
    </style>


</head>

<body class="bg">
    <!--onload="JavaScript:timedRefresh(20000);"-->

    <iframe id="print-show-all" style="display: none;"></iframe>

    <iframe id="print-hide-pay" style="display: none;"></iframe>

    <?php

    /**

     * Created by Arnan(Kuber)

     */

    include('../../connect.php');

    include('../../constant.php');
    include('query_statement.php');

    $condition = $_GET['condition'];

    $branch_id = $_GET['branch_id'];



    session_start();

    $isAdmin = $_SESSION['isAdmin'];

    $_SESSION['branch_id'] = $branch_id;

    $branchInfo = getBranchById($branch_id);

    $chkOpenOnline = $branchInfo['open_close'];

    $chkOpenOnlineLunch = $branchInfo['open_close_lunch'];
    if ($isAdmin) {

        ?>
        <div class="w3-sidebar w3-bar-block w3-card bg" style="display:none;background-color: black;padding-top: 30px;" id="mySidebar">
            <!--
            <button class="w3-bar-item w3-button w3-large" onclick="w3_close()" hidden>Close &times;</button>
    -->
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
                <div class="row" style="margin-top: 20px" hidden>

                    <div class="col-md-3 col-sm-4">

                        <input type="hidden" id="branch_id_v" value="<?php echo $branch_id; ?>">

                        <img class="img-responsive" src="../img/peper-logo-small.png" alt="" style="width: 160px;!important;margin: 0 auto;">

                    </div>

                    <div class="col-md-9 col-sm-8">

                        <div class="content-header-order-list">

                            <div class="title_header">

                                <?php echo $shopBranch[$branch_id]; ?> order...

                            </div>

                            <div class="title_menu_bk">

                                <a href="manage_order.php?branch=<?php echo $branch_id; ?>">Back</a> | <a href="../../logout.php">Logout</a>

                            </div>

                            <hr class="line_title" style="margin-top: 20px;">

                        </div>

                        <div class="clearfixed"></div>

                    </div>

                </div>

                <div class="row order-list-tb">
                    <div class="container-fluid" style="background: white;padding :  0px;border-radius: 15px 15px 15px 15px; ">
                        <div style="background: #C1C1C1; border-radius: 15px 15px 15px 15px;padding :  20px ">
                            <div class="container-fluid">
                                <div class="text-left h4" style="font-family: GothamBlack;">Search by :</div>

                                <div class="row">

                                    <form method="post" id="frm-search-data">

                                        <div class="col-md-3 col-xs-12">

                                            <div class="form-inline">

                                                <label for="date-search">Date :</label>

                                                <input type='text' class="date-picker form-control" data-date-format=" dd / m / yyyy" data-provide="datepicker" id='dateSearch' name="dateSearch" placeholder="Ex. 01/01/2017" />

                                            </div>

                                        </div>

                                        <div class="col-md-4 col-xs-12">

                                            <div class="form-inline">

                                                <label for="date-search">Name :</label>

                                                <input type='text' class="form-control" id='nameSearch' name="nameSearch" placeholder="" />

                                            </div>

                                        </div>

                                        <div class="col-md-3 col-xs-12">

                                            <div class="form-inline">

                                                <label for="date-search">Phone :</label>

                                                <input type='text' class="form-control" id='phoneSearch' name="phoneSearch" placeholder="" />

                                            </div>

                                        </div>

                                        <div class="col-md-2 col-xs-12">

                                            <button class="btn btn-default" type="submit">Search</button>

                                        </div>

                                    </form>

                                </div>

                            </div>


                        </div>

                        <div id="showData">



                        </div>


                    </div>


                </div>



                <div class="modal fade" id="frmSelectReplyTime" role="dialog">

                    <div class="modal-dialog" style="vertical-align: middle;">

                        <div class="modal-content>">

                            <div class="modal-header">

                                <a class="btn" data-dismiss="modal" style="color: white;"><i class="glyphicon glyphicon-remove"></i>

                                </a>

                                <input type="hidden" id="order-no-item" value="" />

                                <input type="hidden" id="condition" value="" />

                                <input type="hidden" id="branch_id" value="" />

                                <div class="row reply-time">

                                    <div class="col-sm-3 col-xs-6 reply-time-xs">

                                        <button type="button" class="btn btn-success btn-reply col-b" onclick="updateReplyTime(15)">

                                            15 MINS

                                        </button>

                                    </div>

                                    <div class="col-sm-3 col-xs-6 reply-time-xs">

                                        <button type="button" class="btn btn-success btn-reply col-b" onclick="updateReplyTime(20)">

                                            20 MINS

                                        </button>

                                    </div>

                                    <div class="col-sm-3 col-xs-6 reply-time-xs">

                                        <button type="button" class="btn btn-success btn-reply col-b" onclick="updateReplyTime(25)">

                                            25 MINS

                                        </button>

                                    </div>

                                    <div class="col-sm-3 col-xs-6 reply-time-xs">

                                        <button type="button" class="btn btn-success btn-reply col-b" onclick="updateReplyTime(30)">

                                            30 MINS

                                        </button>

                                    </div>

                                </div>

                                <div class="row reply-time">

                                    <div class="col-sm-3 col-xs-6 reply-time-xs">

                                        <button type="button" class="btn btn-warning btn-reply col-b" onclick="updateReplyTime(35)">

                                            35 MINS

                                        </button>

                                    </div>

                                    <div class="col-sm-3 col-xs-6 reply-time-xs">

                                        <button type="button" class="btn btn-warning btn-reply col-b" onclick="updateReplyTime(40)">

                                            40 MINS

                                        </button>

                                    </div>

                                    <div class="col-sm-3 col-xs-6 reply-time-xs">

                                        <button type="button" class="btn btn-warning btn-reply col-b" onclick="updateReplyTime(55)">

                                            45 MINS

                                        </button>

                                    </div>

                                    <div class="col-sm-3 col-xs-6 reply-time-xs">

                                        <button type="button" class="btn btn-warning btn-reply col-b" onclick="updateReplyTime(50)">

                                            50 MINS

                                        </button>

                                    </div>

                                </div>

                                <div class="row reply-time">

                                    <div class="col-sm-3 col-xs-6 reply-time-xs">

                                        <button type="button" class="btn btn-danger btn-reply" onclick="updateReplyTime(55)">55

                                            MINS

                                        </button>

                                    </div>

                                    <div class="col-sm-3 col-xs-6 reply-time-xs">

                                        <button type="button" class="btn btn-danger btn-reply" onclick="updateReplyTime(60)">60

                                            MINS

                                        </button>

                                    </div>

                                    <div class="col-sm-3 col-xs-6 reply-time-xs">

                                        <button type="button" class="btn btn-danger btn-reply" onclick="updateReplyTime(65)">65

                                            MINS

                                        </button>

                                    </div>

                                    <div class="col-sm-3 col-xs-6 reply-time-xs">

                                        <button type="button" class="btn btn-danger btn-reply" onclick="updateReplyTime(70)">70

                                            MINS

                                        </button>

                                    </div>

                                </div>

                            </div>



                        </div>

                    </div>

                </div>

            </div>
        </div>



        <style type="text/css">
            .order-list-tb {

                padding: 0 5% 0 5%;

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



            .modal-header {

                border-bottom: none;

            }



            .modal {

                text-align: center;

                padding: 0 !important;

            }



            .modal-backdrop.fade.in {

                opacity: 0.9;

            }



            .modal:before {

                content: '';

                display: inline-block;

                height: 100%;

                vertical-align: middle;

                margin-right: -4px;

            }



            .modal-dialog {

                display: inline-block;

                text-align: left;

                vertical-align: middle;

            }



            #divLoading {

                display: none;

                position: fixed;

                z-index: 1500;

                background-image: url('../img/icon/processing.gif');

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
        </style>



        <div class="modal fade" tabindex="-1" role="dialog" id="modal-show-detail">

            <div class="modal-dialog" role="document" style="width: auto !important;">

                <div class="modal-content">

                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    </div>

                    <div class="modal-body" style="color: #000;padding: 0 50px;">



                    </div>

                    <div class="modal-footer">

                        <div style="line-height: 40px;">

                            <a href="javascript:void(0)" style="text-decoration: none;" id="modal-btn-print">

                                <img src="../img/icon/ic-print-32.png" alt="" id="img-print" style="vertical-align: middle;" />

                                <label for="img-print" style="vertical-align: middle;cursor: pointer;"> Print</label>

                            </a>

                        </div>

                    </div>

                </div><!-- /.modal-content -->

            </div><!-- /.modal-dialog -->

        </div><!-- /.modal -->



        <div id="print1" style="display:none;"></div>

        <div id="print2" style="display:none;"></div>



    <?php } else { ?>

        <div class="container">

            Please retry to login. wait 3 second... or click <a href="../../login.php" style="color: red">HERE!!</a>

        </div>

        <script type="text/javascript">
            setTimeout(function() {

                window.location = "../../login.php";

            }, 3000);
        </script>

    <?php } ?>



    <script src="../js/jquery-1.12.4.min.js"></script>

    <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="../../colorbox/jquery.colorbox-min.js"></script>

    <script src="../../datePicker/bootstrap-datepicker.min.js" type="text/javascript"></script>

    <script src="../../timepicker/js/jquery.timepicker.min.js" type="text/javascript"></script>



    <script type="text/JavaScript">

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

        $(document).ready(function () {
            w3_open();

//        setInterval(function(){

//            var id = $('#branch_id_v').val();

//            var getData=$.ajax({

//                url:"getDataOrderList.php",

//                data:"branch_id="+id,

//                async:false,

//                success:function(getData){

//                    $("div#showData").html(getData);

//                }

//            }).responseText;

//        },20000);



        $('#dateSearch').datepicker({

            todayHighlight: true,

            autoclose: true

        });



        $('#frm-search-data').submit(function (e) {

            $('#divLoading').css('display', 'block');

            var date = $('#dateSearch').val();

            var name = $('#nameSearch').val();

            var phone = $('#phoneSearch').val();

            var id = $('#branch_id_v').val();

            e.preventDefault();

            $.ajax({

                url: "getDataOrderListForSearch.php",

                data: {date: date, name: name, phone: phone, branch_id: id},

                async: false,

                success: function (getData) {

                    $('#divLoading').css('display', 'none');

                    $("div#showData").html(getData);

                }

            });

        });





    });



    function timedRefresh(timeoutPeriod) {

        setTimeout("location.reload(true);", timeoutPeriod);

    }



    function ConfirmChoice(urlLink, condi, branch) {

        answer = confirm("Are you want delete?")

        if (answer != "0") {

            location = "admin/del_order-sys.php?id=" + urlLink + "&condition=" + condi + "&branch_id=" + branch

        }

    }



    function showFrmSelectReplyTime(id, condition, branch) {

        $('#frmSelectReplyTime').find('#order-no-item').val("");

        $('#frmSelectReplyTime').find('#order-no-item').val(id);

        $('#frmSelectReplyTime').find('#condition').val("");

        $('#frmSelectReplyTime').find('#condition').val(condition);

        $('#frmSelectReplyTime').find('#branch_id').val("");

        $('#frmSelectReplyTime').find('#branch_id').val(branch);

        $('#frmSelectReplyTime').modal('show');

        return false;

    }



    function updateReplyTime(t) {

        $('#divLoading').css('display', 'block');

        var ordNo = $('#frmSelectReplyTime').find('#order-no-item').val();

        var condition = $('#frmSelectReplyTime').find('#condition').val();

        var branchID = $('#frmSelectReplyTime').find('#branch_id').val();

        var time = t + " mins";

        $.ajax({

            type: 'POST',

            url: "../../admin/sendmailtime-sys.php?id=" + ordNo + "&condition=" + condition + "&branch_id=" + branchID,

            data: {time: time},

            cache: false,

            success: function (msg) {

                if (msg.trim() == "success") {

                    location.reload();

                    $('#divLoading').css('display', 'none');

                } else {

                    $('#divLoading').css('display', 'none');

                    alert("ไม่สามารถบันทึกข้อมูลได้");

                }

            }

        });

    }



    function ConfirmChoice(urlLink, condi, branch) {

        answer = confirm("Are you want delete?");

        if (answer != "0") {

            $('#divLoading').css('display', 'block');

            $.ajax({

                type: 'POST',

                url: "../../admin/del_order-sys.php?id=" + urlLink + "&condition=" + condi + "&branch_id=" + branch,

                cache: false,

                success: function (msg) {

                    if (msg.trim() == "success") {

                        location.reload();

                        $('#divLoading').css('display', 'none');

                    } else {

                        $('#divLoading').css('display', 'none');

                        alert("ไม่สามารถลบข้อมูลได้");

                    }

                }

            });

        }

    }



    function getContentToPrint(id) {

        $.ajax({

            url: 'print_slip.php?mode=print',

            data: {id: id},

            type: 'GET',

            success: function (data) {

//                var contents = data;

//                var frame1 = document.getElementById("print-show-all");

//                frame1.name = "frame1";

//                frame1.style.position = "absolute";

//                frame1.style.top = "-1000000px";

//                document.body.appendChild(frame1);

//                var frameDoc = frame1.contentWindow ? frame1.contentWindow : frame1.contentDocument.document ? frame1.contentDocument.document : frame1.contentDocument;

//                frameDoc.document.open();

//                frameDoc.document.write(contents);

//                frameDoc.document.close();

//                window.frames["frame1"].focus();

//                window.frames["frame1"].print();

//                document.getElementById("print1").innerHTML = data;

                var print1 = window.open('', 'print1', 'width=800,height=600');

                print1.document.write(data);

                print1.document.close();

                print1.focus();

                setTimeout(function () {

                    print1.print();

                    print1.close();



                    $.ajax({

                        url: 'print_slip_hide.php',

                        data: {id: id},

                        type: 'GET',

                        success: function (data) {

//                var contents = data;

//                var frame2 = document.getElementById("print-hide-pay");

//                frame2.name = "frame2";

//                frame2.style.position = "absolute";

//                frame2.style.top = "-1000000px";

//                document.body.appendChild(frame2);

//                var frameDoc = frame2.contentWindow ? frame2.contentWindow : frame2.contentDocument.document ? frame2.contentDocument.document : frame2.contentDocument;

//                frameDoc.document.open();

//                frameDoc.document.write(contents);

//                frameDoc.document.close();

//                window.frames["frame2"].focus();

//                window.frames["frame2"].print();

                            var print2 = window.open('', 'print2', 'width=800,height=600');

                            print2.document.write(data);

                            print2.document.close();

                            print2.focus();

                            setTimeout(function () {

                                print2.print();

                                print2.close();

                                var print2_copy = window.open('', 'print2_copy', 'width=800,height=600');

                                print2_copy.document.write(data);

                                print2_copy.document.close();

                                print2_copy.focus();

                                setTimeout(function () {

                                    print2_copy.print();

                                    print2_copy.close();

                                }, 1500);

                            });

                        }

                    }, 1500);

                }, 1500);

            }

        });





        return false;

    }



    function Popup(data) {

        var mywindow = window.open('', 'to_print', 'width=800,height=600');

        var html = '<html><head><title></title>' +

            '<link rel="stylesheet" href="css/mycss.css" type="text/css" />' +

            '</head><body onload="window.focus(); window.print(); window.close()">' +

            data +

            '</body></html>';

        mywindow.document.write(html);

        mywindow.document.close();

        return true;

    }



    function showMoreDetail(id) {

        $.ajax({

            url: 'print_slip.php',

            data: {id: id},

            type: 'GET',

            success: function (data) {

                var d = document.getElementById('modal-btn-print');

                d.setAttribute("onclick", "getContentToPrint(" + id + ")");

                $('#modal-show-detail').find('.modal-body').html(data);

                $('#modal-show-detail').modal('show');

                return false;

            }

        });

    }



</script>



</body>

</html>