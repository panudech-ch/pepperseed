<?php
/**
 * Created by PhpStorm.
 * User: chawapon
 * Date: 2/26/2017
 * Time: 11:08 PM
 */
    include('connect.php');
    include('inc/admin/query_statement.php');
    session_start();
    $productId = $_POST['id'];
    $catid = $_POST['catid'];
    $productData = getProductById($productId);


    if($productData){
        while ($rsPrd = mysql_fetch_assoc($productData)){ ?>
            <p class="cart-title"><?php echo $rsPrd['p_name'];?>...</p>
            <input id="product_id" name="product_id" value="<?php echo $rsPrd['id'];?>" type="hidden" >
            <input id="product_price" name="product_price" value="<?php echo $rsPrd['p_price'];?>" type="hidden">
            <?php if($rsPrd['p_choice'] != ''){
                $choiceData = getChoiceByCateID($rsPrd['cat_id'],$rsPrd['branch_id']); ?>
                <div class="form-inline">
                    <p class="cart-body"><label for="choice_id">
                           <?php if($rsPrd['cat_id'] == 10){?>
                                Choose type of drink
                           <?php }else{ ?>
                                Choose type of meat
                           <?php }?>
                    </label>
                <select class="form-control" id="choice_id" name="choice_id" required>
                    <?php if($rsPrd['cat_id'] == 10){?>
                        <option value="">-- Choose type of drink --</option>
                    <?php }else{?>
                        <option value="">-- Choose type of meat --</option>
                    <?php }?>
                <?php while($rsChoice = mysql_fetch_assoc($choiceData)){ ?>
                    <option value="<?php echo $rsChoice['id'] ?>,<?php echo $rsChoice['choice_price'];?>"><?php echo $rsChoice['choice_name'] ?>($<?php echo $rsChoice['choice_price'];?>)</option>
                <?php } ?>
                </select>
                    <span style="color:red; vertical-align: top; font-size: 19px;">*</span></p>
                </div>
                <?php }
            if($rsPrd['show_extra'] == 1){?>
                    <p style="font-family: 'GothamLight';">Extra?</p>
                    <p>
                    <div class="col-lg-12 col-xs-12" style="font-family: 'GothamLight';">
                        <?php $extra = getAllExtra();
                        while($rsExtra = mysql_fetch_assoc($extra)){ ?>
                            <div class="col-md-3 col-xs-6">
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="extra[]"
                                           value="<?php echo $rsExtra['id']; ?>,<?php echo $rsExtra['ex_price'];?>">
                                    <?php echo $rsExtra['ex_name']; ?>
                                </label>
                            </div>
                        <?php }
                            if($rsPrd['ico_spicy'] == 1){?>
                                <div class="col-md-12 col-xs-12" style="padding-bottom: 5px">
                                    <input type="radio" name="ico_spicy" value="1" checked> <img src="inc/img/icon/icon_GF.png">
                                </div>
                         <?php }?>
                    </div>
                    </p>

            <?php }else{?>
                <?php if($rsPrd['ico_spicy'] == 1){?>
                    <div class="col-md-12 col-xs-12" style="padding-bottom: 5px">
                        <input type="radio" name="ico_spicy" value="1" checked> <img src="inc/img/icon/icon_GF.png">
                    </div>
            <?php }?>
                </div>
            <?php }
            }?>
            <p class="cart-body" style="font-family: 'GothamLight';"><span>Note : <span style=""><input id="note" name="note" type="text" class="form-control" style="display: inline-block; width:40%; margin-top: 15px;" value=""/></p>
            <p class="cart-body" style="font-family: 'GothamLight';"><span>Qty : </span><input id="product_qty" name="product_qty" type="number" class="form-control qty-field" style="display: inline-block; margin-top: 15px;" value="1" min="1"/></p>
    <?php } else {
        echo "nodata";
   }
?>