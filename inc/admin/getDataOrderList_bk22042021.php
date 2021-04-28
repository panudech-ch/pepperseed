<?php
include('../../connect.php');
include('../../constant.php');
$branch_id = $_GET['branch_id'];
?>

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
            <td class="tbTitle" align="center" style="vertical-align: middle;width: 30px;"><b>Manage</b></td>
        </tr>
        </thead>
        <tbody style="background-color: #E9E9E9;">
        <?php
        date_default_timezone_set('Australia/Sydney');
        $dateOrd = date(" j / n / Y");
        $i = 0;

            $sql = "SELECT * FROM orderno WHERE branch_id='$branch_id' && ord_date='$dateOrd' ORDER BY id DESC ";


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
                        <!--<object id="FlashID" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="50" height="20">-->
                        <!--    <param name="movie" value="../../status.swf" />-->
                        <!--    <param name="quality" value="high" />-->
                        <!--    <param name="wmode" value="opaque" />-->
                        <!--    <param name="swfversion" value="6.0.65.0" />-->
                            <!-- This param tag prompts users with Flash Player 6.0 r65 and higher to download the latest version of Flash Player. Delete it if you don't want users to see the prompt. -->
                        <!--    <param name="expressinstall" value="Scripts/expressInstall.swf" />-->
                            <!-- Next object tag is for non-IE browsers. So hide it from IE using IECC. -->
                            <!--[if !IE]>-->
                        <!--    <object type="application/x-shockwave-flash" data="../../status.swf" width="50" height="20">-->
                                <!--<![endif]-->
                        <!--        <param name="quality" value="high" />-->
                        <!--        <param name="wmode" value="opaque" />-->
                        <!--        <param name="swfversion" value="6.0.65.0" />-->
                        <!--        <param name="expressinstall" value="Scripts/expressInstall.swf" />-->
                                <!-- The browser displays the following alternative content for users with Flash Player 6.0 and older. -->
                        <!--        <div>-->
                        <!--            <h4>Content on this page requires a newer version of Adobe Flash Player.</h4>-->
                        <!--            <p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" width="112" height="33" /></a></p>-->
                        <!--        </div>-->
                                <!--[if !IE]-->
                        <!--    </object>-->
                            <!--<![endif]-->
                        <!--</object>-->
                        <audio autoplay loop>
                          <source src="../../alarm.mp3" type="audio/mpeg">
                        </audio>
                    <?php } ?>
                </td>
                <td><?php echo $titleOrderID . str_pad($data['id'], 6, "0", STR_PAD_LEFT); ?></td>
                <td><?php echo $data['ord_cname']; ?></td>
                <td><?php echo str_replace(" ", "", $data['ord_date']); ?></td>
                <td><?php if ($data['ord_choicedelivery'] != 1) {
                        echo $data['ord_addr'] . " (" . $area . ")";
                    } else {
                        echo $area;
                    } ?></td>
                <td><a href="javascript:void(0)"
                       class="txtRed" onclick="showMoreDetail(<?php echo $data['id']; ?>)">Show</a></td>
                <td><a href="javascript:void(0)" class="txtRed" onclick="getContentToPrint(<?php echo $data['id']; ?>)"><span
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
                <td
                <?php if ($data['timepickup'] == '') { ?>
                    <a href="#"
                       onClick="ConfirmChoice('<?php echo $data['id']; ?>', '<?php echo $condition; ?>', '<?php echo $branch_id; ?>'); return false;"><span
                            class="glyphicon glyphicon-trash" style="color: firebrick;"></span> </a>
                <?php } ?>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>