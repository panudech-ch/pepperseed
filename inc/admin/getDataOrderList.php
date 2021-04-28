<?php
include('../../connect.php');
include('../../constant.php');
$branch_id = $_GET['branch_id'];
?>

<div class="table-responsive" style="background: white; border-radius: 15px 15px 15px 15px; ">
    <table class="table table-hover">
        <thead style="background: #C1C1C1; border-radius: 15px 15px 15px 15px;">
            <tr style="vertical-align: middle;border-radius: 15px 15px 15px 15px;">
                <td class="tbTitle" align="center" style="vertical-align: middle;width: 20px; padding: 3%;border-radius: 15px 0px  0px 15px ;"></td>
                <td class="tbTitle" align="center" style="vertical-align: middle;width: 100px;"><b>Order ID</b></td>
                <td class="tbTitle" align="center" style="vertical-align: middle;width: 200px;"><b>Customer Name</b>
                </td>
                <td class="tbTitle text-nowrap" align="center" style="vertical-align: middle;width: 50px;">
                    <b>Date</b>
                </td>
                <td class="tbTitle" align="center" style="vertical-align: middle;width: 200px;"><b>Pick up /
                        Delivery</b></td>
                <td class="tbTitle" align="center" style="vertical-align: middle;width: 30px;"><b>Detail</b></td>
                <td class="tbTitle" align="center" style="vertical-align: middle;width: 50px;"><b>Reply Time
                        Customer</b>
                </td>
                <td class="tbTitle" align="center" style="vertical-align: middle;width: 30px;border-radius: 0px 15px  15px 0px ;"><b>Print</b></td>

                <!--                    <td class="tbTitle" align="center" style="vertical-align: middle;width: 30px;"><b>Manage</b></td>-->
            </tr>
        </thead>
        <tbody style="background-color:white;margin: 500px;">
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
                <tr style="text-align: center; <?php if ($data['is_printed'] != 1) {
                                                        //echo "color:red";
                                                    } ?>">
                    <td style="text-align: center;" class="tbDesc<?php if ($data['ord_chk'] != 'yes') {
                                                                            echo "New";
                                                                        } ?>">
                        <?php if ($data['ord_chk'] != 'yes') { ?>

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
                    <td><a href="javascript:void(0)" onclick="showMoreDetail(<?php echo $data['id']; ?>)" class="txtRed" style="color: blue;">Show</a></td>
                    <td>

                        <?php if ($data['timepickup'] == '') { ?>
                            <a href="javascript:void(0)" onclick="showFrmSelectReplyTime('<?php echo $data['id']; ?>', '<?php echo $condition; ?>', '<?php echo $branch_id; ?>')">
                                <span style="color:red">Please reply</span>
                            </a>
                        <?php } else {
                                echo $data['timepickup'];
                            } ?>

                    </td>
                    <td>
                        <a href="javascript:void(0)" class="txtRed" onclick="getContentToPrint(<?php echo $data['id']; ?>)">
                            <?php if ($data['is_printed'] != 1) {
                                    ?>
                                <span class="glyphicon glyphicon-print" style="font-size: 20px;color: red;"></span>

                            <?php  } else {
                                    ?>
                                <span class="glyphicon glyphicon-print" style="font-size: 20px;color: #5cb85c"></span>

                            <?php } ?>

                        </a>



                    </td>

                    <!--<td "><?php if ($data['ord_ordertime'] == '') {
                                        echo "DINNER";
                                    } else {
                                        echo strtoupper($data['ord_ordertime']);
                                    } ?></td>-->

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