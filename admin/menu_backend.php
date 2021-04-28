<?php

/**

 * Created by PhpStorm.

 * User: chawapon

 * Date: 2/19/2017

 * Time: 10:56 PM

 */

    session_start();

    $page = $_SESSION['currentPage'];

?>

<div class="menu-backend">

    <div class="row">

        <div class="col-md-3 col-xs-3">

            <div class="form-inline">

                <span style="font-family: 'GothamLight'">

                    <?php if($page == 'categories'){?>

                        <u>Categories</u>

                    <?php }else{ ?>

                        <a href="add_cat.php">Categories</a>

                    <?php } ?>

                </span>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-md-3 col-xs-3">

            <div class="form-inline">

                <span style="font-family: 'GothamLight'">

                    <?php if($page == 'menus'){?>

                        <u>Menus</u>

                    <?php }else{ ?>

                        <a href="add_menu.php">Menus</a>

                    <?php } ?>

                </span>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-md-3 col-xs-3">

            <div class="form-inline">

                <span style="font-family: 'GothamLight'">

                    <?php if($page == 'choice-meat'){?>

                        <u>Choices Meat</u>

                    <?php }else{ ?>

                        <a href="add_choice.php">Choices Meat</a>

                    <?php } ?>

                 </span>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-md-3 col-xs-3">

            <div class="form-inline">

                <span style="font-family: 'GothamLight'">

                    <?php if($page == 'promotions'){?>

                        <u>Promotions</u>

                    <?php }else{ ?>

                        <a href="add_promotions.php">Promotions</a>

                    <?php } ?>

                </span>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-md-3 col-xs-3">

            <div class="form-inline">

                <span style="font-family: 'GothamLight'">

                    <?php if($page == 'delivery-area'){?>

                        <u>Delivery Areas</u>

                    <?php }else{ ?>

                        <a href="add_delivery.php">Delivery Areas</a>

                    <?php } ?>

                </span>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-md-3 col-xs-3">

            <div class="form-inline">

                <span style="font-family: 'GothamLight'">

                    <?php if($page == 'promocode'){?>

                        <u>Promotions Code</u>

                    <?php }else{ ?>

                        <a href="add_promocode.php">Promotions Code</a>

                    <?php } ?>

                </span>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-md-3 col-xs-3">

            <div class="form-inline">

                <span style="font-family: 'GothamLight'">

                    <?php if($page == 'checkout-setting'){?>

                        <u>Checkout Setting</u>

                    <?php }else{ ?>

                        <a href="add_checkoutsetting.php">Checkout Setting</a>

                    <?php } ?>

                </span>

            </div>

        </div>

    </div>

</div>

