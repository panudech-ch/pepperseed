<?php
include('../../connect.php');
include('../../constant.php');
$branch_id = $_GET['branch_id'];
$dateS = $_GET['date'];
$nameS = $_GET['name'];
$phone = $_GET['phone'];
?>

<div class="table-responsive" >
    <table class="table table-hover" style="background: white; border-radius: 15px 15px 15px 15px;">
       

        <!--                <thead>-->
        <!--                <tr style="background: #9A826E;padding: 20px;vertical-align: middle;">-->
        <!--                    <td class="tbTitle" align="center" style="vertical-align: middle;width: 100px;"><b>Order ID</b></td>-->
        <!--                    <td class="tbTitle" align="center" style="vertical-align: middle;width: 200px;"><b>Customer Name</b>-->
        <!--                    </td>-->
        <!--                    <td class="tbTitle text-nowrap" align="center" style="vertical-align: middle;width: 50px;">-->
        <!--                        <b>Date</b>-->
        <!--                    </td>-->
        <!--                    <td class="tbTitle" align="center" style="vertical-align: middle;width: 200px;"><b>Pick up /-->
        <!--                            Delivery</b></td>-->
        <!--                    <td class="tbTitle" align="center" style="vertical-align: middle;width: 30px;"><b>Detail</b></td>-->
        <!--                    <td class="tbTitle" align="center" style="vertical-align: middle;width: 30px;"><b>Print</b></td>-->
        <!--                    <td class="tbTitle" align="center" style="vertical-align: middle;width: 50px"><b>Reply Time-->
        <!--                            Customer</b>-->
        <!--                    </td>-->
        <!--                </tr>-->
        <!--                </thead>-->
        <tbody style="background-color: white">
            <?php
            date_default_timezone_set('Australia/Sydney');
            $dateOrd = date(" j / n / Y");
            $i = 0;

            $sql = "SELECT * FROM orderno WHERE branch_id='$branch_id' && timepickup != '' && ord_cname like '%$nameS%' && ord_phone like '%$phone%'  ";
            if ($dateS != "") {
                if (substr($dateS, 0, 2) == 0) {
                    $dateS = ' ' . substr($dateS, 2, strlen($dateS));
                }
                $sql .= " && ord_date='$dateS' ";
            }
            $sql .= " ORDER BY id DESC ";
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
                <tr style="text-align: center;">
                    <td style="vertical-align: middle;width: 100px;"><?php echo $titleOrderID . str_pad($data['id'], 6, "0", STR_PAD_LEFT); ?></td>
                    <td style="vertical-align: middle;width: 200px;"><?php echo $data['ord_cname']; ?></td>
                    <td style="vertical-align: middle;width: 50px;"><?php echo str_replace(" ", "", $data['ord_date']); ?></td>
                    <td style="vertical-align: middle;width: 200px;"><?php if ($data['ord_choicedelivery'] != 1) {
                                                                                echo $data['ord_addr'] . " (" . $area . ")";
                                                                            } else {
                                                                                echo $area;
                                                                            } ?></td>
                    <td style="vertical-align: middle;width: 30px;"><a href="javascript:void(0)" onclick="showMoreDetail(<?php echo $data['id']; ?>)" class="txtRed">Show</a></td>
                    <td style="vertical-align: middle;width: 30px;"><a href="javascript:void(0)" class="txtRed" onclick="getContentToPrint(<?php echo $data['id']; ?>)"><span class="glyphicon glyphicon-print" style="font-size: 20px;"></span> </a></td>
                    <!--<td "><?php if ($data['ord_ordertime'] == '') {
                                        echo "DINNER";
                                    } else {
                                        echo strtoupper($data['ord_ordertime']);
                                    } ?></td>-->
                    <td style="vertical-align: middle;width: 30px;">
                        <?php
                            echo $data['timepickup'];
                            ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>