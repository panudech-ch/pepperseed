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

        while ($rsPrd = mysql_fetch_assoc($productData)){ 
            
            $p_name = $rsPrd['p_name'];
            $product_id = $rsPrd['id'];
            $product_price = $rsPrd['p_price'];

            ?>
            <img class="card-img-top" src="<?php echo $rsPrd['pic_path'] != '' ? str_replace('../','',$rsPrd['pic_path']) : 'inc/img/icon/no-image-found.gif' ;?>" alt="Card image cap">
            <div class="card-body">
                <div class="row">
                    <div class="col-10 modal_product_item_name" id="modal_p_name"><?=$rsPrd['p_name']?></div>
                    <div class="col-2 text-right modal_product_item_price" id="modal_p_price">$ <?=$rsPrd['p_price']?></div>
                    <input id="product_id" name="product_id" value="<?php echo $rsPrd['id'];?>" type="hidden" >
                    <input id="product_price" name="product_price" value="<?php echo $rsPrd['p_price'];?>" type="hidden">
                </div>                     
                <div class="row">   
                    <div class="col-6 modal_product_item_desc " id="modal_p_desc"><?=$rsPrd['p_desc']?></div>      
                    <div class="col-6 card-text text-right">
                        <div class="input-group-quantity mb-2">
                            <input type="button" value="-" class="button-minus quantity_input" data-field="quantity">
                            <input type="number" step="1" max="" value="1" name="quantity" class="quantity-field quantity_input">
                            <input type="button" value="+" class="button-plus quantity_input" data-field="quantity">
                        </div>
                        <?php 
                        if($rsPrd['p_choice'] != ''){
                            $choiceData = getChoiceByCateID($rsPrd['cat_id'],$rsPrd['branch_id']); ?>
                            <div class="">
                                <p class="modal_product_item_desc_right">
                                    <!-- <label for="choice_id" class="pb-1">
                                        <?php if($rsPrd['cat_id'] == 10){?>
                                                Choose type of drink<span style="color:red; vertical-align: top; font-size: 19px;">*</span>
                                        <?php }else{ ?>
                                                Choose type of meat<span style="color:red; vertical-align: top; font-size: 19px;">*</span>
                                        <?php }?>
                                    </label> -->
                                    <select class="form-control" id="choice_id" name="choice_id" required style="width:100%">
                                        <?php if($rsPrd['cat_id'] == 10){?>
                                            <option value="">-- Choose type of drink --</option>
                                        <?php }else{?>
                                            <option value="">-- Choose type of meat --</option>
                                        <?php }?>
                                        <?php while($rsChoice = mysql_fetch_assoc($choiceData)){ ?>
                                            <option value="<?php echo $rsChoice['id'] ?>,<?php echo $rsChoice['choice_price'];?>"><?php echo $rsChoice['choice_name'] ?>($<?php echo $rsChoice['choice_price'];?>)</option>
                                        <?php } ?>
                                    </select>
                                    
                                </p>
                            </div>
                        <?php } // end if $rsPrd['p_choice'] ?>
                        <!-- <span class="modal_product_item_desc_right ">Request : </span><br> -->
                        <textarea id="note" name="note" class="modal_product_item_request mt-2 p-2" placeholder="Request" ></textarea>
                        <!-- <input id="note" name="note" type="text" class="form-control" style="display: inline-block; width:40%; margin-top: 15px;" value=""/> -->                       
                    </div>
                </div>
                    <?php if($rsPrd['show_extra'] == 1)   {?>
                        <p class="modal_product_item_desc_right"><b>Extra?</b></p>
                        <div class="row modal_product_item_desc_right">
                            <?php $extra = getAllExtra();
                            while($rsExtra = mysql_fetch_assoc($extra)){ ?>
                                <div class="col-md-3 col-xs-6">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" name="extra[]"
                                            value="<?php echo $rsExtra['id']; ?>,<?php echo $rsExtra['ex_price'];?>">
                                        <?php echo $rsExtra['ex_name']; ?>
                                    </label>
                                </div>
                            <?php } //end while rsExtra ?>                                    
                        </div>
                    <?php } // end if show_extra == 1 ?>
                <div class="row pt-3">
                    <div class="col-6 d-flex justify-content-start" style="mt-1">
                        <?php  if($rsPrd['ico_spicy'] == 1){?>
                            <img src="inc/img/icon/allergy/icon_1.png" style="width:30px;height:30px;">
                        <?php }?>
                        <?php  if($rsPrd['p_choice2'] != null || $rsPrd['p_choice2'] != ""){
                            $allergy = explode(",", $rsPrd['p_choice2']);
                            for($i=0;$i<sizeof($allergy);$i++){ ?>                                
                                <img src="inc/img/icon/allergy/icon_<?=$allergy[$i]?>.png" style="height:28px;margin-right:5px">
                            <?php } ?>
                        <?php }?>
                    </div>
                    <div class="col-6 d-flex justify-content-end" style="width: 100%"><button type="submit" class="btn-gold">ADD</button></div>  
                </div>
                <?php 
                
                }?>
            
<?php } else {

    echo "nodata";

} ?>