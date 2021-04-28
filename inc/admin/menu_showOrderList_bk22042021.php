<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-Equiv="Cache-Control" Content="no-cache">
    <meta http-Equiv="Pragma" Content="no-cache">
    <meta http-Equiv="Expires" Content="0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../css/custom.css" rel="stylesheet" type="text/css"/>
    <link href="../css/custom_respon.css" rel="stylesheet" type="text/css"/>
    <link href="../../colorbox/colorbox.css" rel="stylesheet" type="text/css" media="screen"/>
    <script src="../../js/swfobject_modified.js" type="text/javascript"></script>
    <title>Show Order List</title>

</head>
<body class="bg_staff">   <!--onload="JavaScript:timedRefresh(20000);"-->
<iframe id="print-show-all" style="display: none;"></iframe>
<iframe id="print-hide-pay" style="display: none;"></iframe>
<?php
/**
 * Created by Arnan(Kuber)
 */
include('../../connect.php');
include('../../constant.php');
$condition = $_GET['condition'];
$branch_id = $_GET['branch_id'];

session_start();
$isAdmin = $_SESSION['isAdmin'];

if ($isAdmin) {
    ?>
    <div id="divLoading">
    </div>
    <div class="row" style="margin-top: 20px">
        <div class="col-md-3 col-sm-4">
            <input type="hidden" id="branch_id_v" value="<?php echo $branch_id; ?>">
            <img class="img-responsive" src="../img/peper-logo-small.png" alt=""
                 style="width: 160px;!important;margin: 0 auto;">
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
    <div class="row order-list-tb" id="showData">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr style="background: #9A826E;padding: 20px;vertical-align: middle;">
                    <td class="tbTitle" align="center" style="vertical-align: middle;width: 20px;"><b>New!</b></td>
                    <td class="tbTitle" align="center" style="vertical-align: middle;width: 100px;"><b>Order ID</b></td>
                    <td class="tbTitle" align="center" style="vertical-align: middle;width: 200px;"><b>Customer Name</b>
                    </td>
                    <td class="tbTitle text-nowrap" align="center" style="vertical-align: middle;width: 50px;">
                        <b>Date</b>
                    </td>
                    <td class="tbTitle" align="center" style="vertical-align: middle;width: 200px;"><b>Pick up /
                            Delivery</b></td>
                    <td class="tbTitle" align="center" style="vertical-align: middle;width: 30px;"><b>Detail</b></td>
                    <td class="tbTitle" align="center" style="vertical-align: middle;width: 30px;"><b>Print</b></td>
                    <td class="tbTitle" align="center" style="vertical-align: middle;width: 50px"><b>Reply Time
                            Customer</b>
                    </td>
<!--                    <td class="tbTitle" align="center" style="vertical-align: middle;width: 30px;"><b>Manage</b></td>-->
                </tr>
                </thead>
                <tbody style="background-color: #E9E9E9;">
                <?php
                date_default_timezone_set('Australia/Sydney');
                $dateOrd = date(" j / n / Y");
                $i = 0;

                if ($condition == 'all') {
                    $sql = "SELECT * FROM orderno WHERE branch_id='$branch_id' ORDER BY id DESC LIMIT 0,50";
                } else {
                    $sql = "SELECT * FROM orderno WHERE branch_id='$branch_id' && ord_date='$dateOrd' ORDER BY id DESC ";
                }
                $rsl = mysql_query($sql);
                while ($data = mysql_fetch_array($rsl)) {
                    $i++;
                    $choicedelivery = $data['ord_choicedelivery'];

                    /* ---- Area Price ---*/
                    $sqlArea = "select * from deliveryarea WHERE id = '$choicedelivery' ";
                    $rslArea = mysql_query($sqlArea);
                    $dataArea = mysql_fetch_array($rslArea);
                    $area = $dataArea['area'];
                    $charge_price = $dataArea['charge_price'];
                    ?>
                    <tr style="text-align: center; <?php if ($data['is_printed'] != 1) { echo "color:red"; }?>">
                        <td align="center" class="tbDesc<?php if ($data['ord_chk'] != 'yes') {
                            echo "New";
                        } ?>">
                            <?php if ($data['ord_chk'] != 'yes') { ?>
                                <!--<object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="50"-->
                                <!--        height="20">-->
                                <!--    <param name="movie" value="../../status.swf"/>-->
                                <!--    <param name="quality" value="high"/>-->
                                <!--    <param name="wmode" value="opaque"/>-->
                                <!--    <param name="swfversion" value="6.0.65.0"/>-->
                                    <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don't want users to see the prompt. -->
                                <!--    <param name="expressinstall" value="Scripts/expressInstall.swf"/>-->
                                    <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
                                    <!--[if !IE]>-->
                                <!--    <object type="application/x-shockwave-flash" data="../../status.swf" width="50"-->
                                <!--            height="20">-->
                                        <!--<![endif]-->
                                <!--        <param name="quality" value="high"/>-->
                                <!--        <param name="wmode" value="opaque"/>-->
                                <!--        <param name="swfversion" value="6.0.65.0"/>-->
                                <!--        <param name="expressinstall" value="Scripts/expressInstall.swf"/>-->
                                        <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
                                <!--        <div>-->
                                <!--            <h4>Content on this page requires a newer version of Adobe Flash-->
                                <!--                Player.</h4>-->
                                <!--            <p><a href="http://www.adobe.com/go/getflashplayer"><img-->
                                <!--                        src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif"-->
                                <!--                        alt="Get Adobe Flash player" width="112" height="33"/></a></p>-->
                                <!--        </div>-->
                                        <!--[if !IE]-->
                                <!--    </object>-->
                                    <!--<![endif]-->
                                <!--</object>-->
                                
                                <audio autoplay loop>
                                    <source src="../../alarm.mp3" type="audio/mpeg">
                                </audio>
                            <?php } ?></td>
                        <td><?php echo $titleOrderID . str_pad($data['id'], 6, "0", STR_PAD_LEFT); ?></td>
                        <td><?php echo $data['ord_cname']; ?></td>
                        <td><?php echo str_replace(" ", "", $data['ord_date']); ?></td>
                        <td><?php if ($data['ord_choicedelivery'] != 1) {
                                echo $data['ord_addr'] . " (" . $area . ")";
                            } else {
                                echo $area;
                            } ?></td>
                        <td><a href="javascript:void(0)" onclick="showMoreDetail(<?php echo $data['id']; ?>)"
                               class="txtRed">Show</a></td>
                        <td><a href="javascript:void(0)" class="txtRed"
                               onclick="getContentToPrint(<?php echo $data['id']; ?>)"><span
                                    class="glyphicon glyphicon-print" style="font-size: 20px;"></span> </a></td>
                        <!--<td "><?php if ($data['ord_ordertime'] == '') {
                            echo "DINNER";
                        } else {
                            echo strtoupper($data['ord_ordertime']);
                        } ?></td>-->
                        <td>

                            <?php if ($data['timepickup'] == '') { ?>
                                <a href="javascript:void(0)"
                                   onclick="showFrmSelectReplyTime('<?php echo $data['id']; ?>', '<?php echo $condition; ?>', '<?php echo $branch_id; ?>')">Reply
                                    time customer</a>
                            <?php } else {
                                echo $data['timepickup'];
                            } ?>

                        </td>
                        <!--<td
                        <?php if ($data['timepickup'] == '') { ?>
                            <a href="#"
                               onClick="ConfirmChoice('<?php echo $data['id']; ?>', '<?php echo $condition; ?>', '<?php echo $branch_id; ?>'); return false;"><span
                                    class="glyphicon glyphicon-trash" style="color: firebrick;"></span> </a>
                       <?php } ?>
                        </td>-->
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="frmSelectReplyTime" role="dialog">
        <div class="modal-dialog" style="vertical-align: middle;">
            <div class="modal-content" style="background: transparent;">
                <div class="modal-header">
                    <a class="btn" data-dismiss="modal" style="color: white;"><i class="glyphicon glyphicon-remove"></i>
                    </a>
                    <input type="hidden" id="order-no-item" value=""/>
                    <input type="hidden" id="condition" value=""/>
                    <input type="hidden" id="branch_id" value=""/>
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
                            <button type="button" class="btn btn-warning btn-reply col-b" onclick="updateReplyTime(45)">
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
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body" style="color: #000;padding: 0 50px;">

                </div>
                <div class="modal-footer">
                    <div style="line-height: 40px;">
                        <a href="javascript:void(0)" style="text-decoration: none;" id="modal-btn-print">
                            <img src="../img/icon/ic-print-32.png" alt="" id="img-print"
                                 style="vertical-align: middle;"/>
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
        setTimeout(function () {
            window.location = "../../login.php";
        }, 3000);
    </script>
<?php } ?>

<script src="../js/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../colorbox/jquery.colorbox-min.js"></script>
<script type="text/JavaScript">
    //    var audio1 = document.getElementById('audio');
    //    audio1.setAttribute('src', '../sound/bikebell.wav');
    //    function play(){
    ////        audio1.play();
    //        swfobject.embedSWF("../../status.swf","flashcontent","50","20","6.0.65.0");
    //    }
    //    function stop(){
    //        audio1.stop();
    //    }

    $(document).ready(function () {
        setInterval(function () {
            var id = $('#branch_id_v').val();
            var getData = $.ajax({
                url: "getDataOrderList.php",
                data: "branch_id=" + id,
                async: false,
                success: function (getData) {
                    $("div#showData").html(getData);
                }
            }).responseText;
        }, 20000);

        setInterval(function () {
            var count = $('#showData').find('.tbDescNew').length;
//            if(count > 0)
//            {
//                play();
//            }
        }, 2000);

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
                } else if(msg.trim() == "mailfail") {
                    $('#divLoading').css('display', 'none');
                    alert("ไม่สามารถส่งอีเมลล์หาลูกค้าได้ โปรดลองอีกครั้ง");
                } else if(msg.trim() == "fail"){
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
                            }, 1500);
                        }
                    });
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