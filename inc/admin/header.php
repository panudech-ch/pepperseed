<head>
    <style>
        .brancOn {

            border-radius: 0px;
            background: #80b73f;
            color: white;
            text-align: center;
            box-shadow: none;
            width: 100%;
            position: relative;
            height: 50px;
            border: none;


            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            background: #80b73f;
            /* For browsers that do not support gradients */
            background: -webkit-linear-gradient(#232323, #80b73f 30%);
            /* For Safari 5.1 to 6.0 */
            background: -o-linear-gradient(#232323, #80b73f 30%);
            /* For Opera 11.1 to 12.0 */
            90 background: -moz-linear-gradient(#232323, #80b73f 30%);
            /* For Firefox 3.6 to 15 */
            background: linear-gradient(#232323, #80b73f 30%);
        }

        .brancOFF {
            border-radius: 0px;
            background: #DFDFDF;
            color: white;
            text-align: center;
            box-shadow: none;
            width: 100%;
            position: relative;
            height: 50px;
            border: none;
        }

        .bg {
            height: 100%;

        }

        .dot {
            height: 14px;
            width: 14px;
            background-color: #5cb85c;
            border-radius: 50%;
            display: inline-block;
            margin-right: 5px;
            box-shadow: 0 0 10px #9ecaed;
        }

        .container_c {
            width: 100%;
            border: 1px solid black;
            margin: 0 auto;
            position: relative;
            /* Container should have relative position */
        }

        .sqrBall_c {

            position: absolute;

            bottom: 0;
            left: 0;

            background-color: blue;
        }
    </style>

</head>

<body>

    <?php
    $branch_id = $_SESSION['branch_id'];

    $branchInfo = getBranchById($branch_id);
   
    $chkOpenOnline = $branchInfo['open_close'];

    $chkOpenOnlineLunch = $branchInfo['open_close_lunch'];
    ?>





    <div class="row" style="margin-top: 30px;margin-bottom: 20px; margin-left: 0px;margin-right: 0px;">
        <div class="col-md-3 col-sm-4" hidden>
            <input type="hidden" id="branch_id_v" value="<?php echo $branch_id; ?>">

            <img class="img-responsive" src="../inc/img/peper-logo-small.png" alt="" style="width: 160px;!important;margin: 0 auto;">
        </div>
        <div class="col-md-9 col-sm-8" hidden>
            <div class="content-header-order-list">
                <div class="title_header">
                    Edit Category [<?php echo $shopBranch[$branch_id]; ?>]...
                </div>
                <div class="title_menu_bk">
                    <a href="../inc/admin/manage_order.php?branch=<?php echo $branch_id; ?>">Back</a> | <a href="../logout.php">Logout</a>
                </div>
                <hr class="line_title" style="margin-top: 20px;">
            </div>
            <div class="clearfixed"></div>
        </div>

        <div class="col-md-7" style="padding-left: 2%;padding-right: 2%;">
            <h1 style="font-size: 40px; "><span style=" text-transform: uppercase;" class="HEADER_MENU-Enrique"><?php echo $branchInfo["branch_name"]; ?></span> | waiting order..</h1>
        </div>
        <div class="col-md-5" style="padding-left: 2%;padding-right: 2%;">
            <div class="row" style="text-align: right;">


                <div class="col-md-4 " style="padding-left: 0px;padding-right: 0px;text-align: right;">

                    <div class="row">
                        <div class="col-md-12" style="color:black">
                            .
                        </div>
                        <div class="col-md-12">
                            <?php
                            $catData2 = getStatusBracne($branch_id);
                            $rs2 = mysql_fetch_assoc($catData2);
                            if ($rs2['branch_name']) {
                                ?>
                                <span class="dot"></span><span>Online now...</span>
                            <?php
                            } else {
                                echo "<span style='opacity: 0;color:red'>_</span>";
                            } ?>
                        </div>
                    </div>




                </div>

                <div class="col-md-4 " style="padding-left: 0px;padding-right: 0px;">
                    <button type="button" class="btn btn-primary <?php echo $chkOpenOnline == 1 ? 'brancOn' : 'brancOFF'; ?>" onclick="availableBrance('1','<?php echo $branch_id; ?>','dinner')">
                        <span style="font-family: 'GothamBold'; color: black;">Online</span>
                    </button>


                </div>
                <div class="col-md-4 " style="padding-left: 0px;padding-right: 0px;">
                    <button type="button" class="btn btn-primary <?php echo $chkOpenOnline != 1 ? 'brancOn' : 'brancOFF'; ?>" onclick="availableBrance('0','<?php echo $branch_id; ?>','dinner')">
                        <span style="font-family: 'GothamBold'; color: black;">Offline</span>
                    </button>

                </div>
            </div>
        </div>
    </div>



    </div>
    <script type="text/javascript">
        function availableBrance(value, branch_id, opentime) {

            var setData = "value=" + value +
                "&branch_id=" + branch_id +
                "&opentime=" + opentime;

            $.ajax({
                type: 'GET',
                url: "../../admin/available_brance.php?" + setData,
                contentType: false,
                processData: false,
                cache: false,
                success: function(msg) {
                    if ($.trim(msg) == "OK") {
                        location.reload();

                    } else {
                        alert("ไม่สำเร็จ : " + msg);
                    }

                }
            });

        }

        function UnAvailableBrance() {


        }
    </script>
</body>