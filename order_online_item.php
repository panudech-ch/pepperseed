<?php
/**
 * Created by PhpStorm.
 * User: chawapon
 * Date: 2/3/2017
 * Time: 11:15 AM
 */
    include('header.php');
    include('connect.php');
    include('inc/admin/query_statement.php');
?>
<?php
    session_start();
    $chkPage='order_online_item';   
    $_SESSION['currentPage'] = $chkPage;

    $isAdmin = $_SESSION['isAdmin'];
    if($_SESSION['customer_branch'] != '' && $_SESSION['customer_branch'] != $_GET['branch_id']){
        session_regenerate_id(true);
        $branch_id = $_GET['branch_id'];
        $_SESSION['customer_branch'] = $branch_id;
    }else{
        $branch_id = $_GET['branch_id'];
        $_SESSION['customer_branch'] = $branch_id;
    }
    //$_SESSION['cat'] = $_GET['cat'];

    $bgData = getBgByPage('bg_'.$chkPage);
    $TitleDataBalmain = getContentByPageSection('Title_orderonline_item_balmain');
    $SubTitleDataBalmain = getContentByPageSection('SubTitle_orderonline_item_balmain');
    $TitleDataBroadway = getContentByPageSection('Title_orderonline_item_broadway');
    $SubTitleDataBroadway = getContentByPageSection('SubTitle_orderonline_item_broadway');
    $closeDataBalmain = getContentByPageSection('Close_orderonline_item_balmain');
    $closeDataBroadway = getContentByPageSection('Close_orderonline_item_broadway');
    $status = getStatusOrderOnline($branch_id);

    $cat = $_SESSION['cat'];
    $catData = getAllActiveCategoryByBranchId($_SESSION['customer_branch']);
    $catData2 = getAllActiveCategoryByBranchId($_SESSION['customer_branch']);
	$catDataMobile = getAllActiveCategoryByBranchId($_SESSION['customer_branch']);

?>

<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">		
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="newdesign/css/style.css">

<body class="bg-order-item">
    <div class="wrapper d-flex align-items-stretch sidenav">        
        <?php include('newdesign/sidebar.php'); ?>   
    </div>

    <nav class="navbar navbar-expand-lg navbar-light d-flex justify-content-end">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link navbar-gold" href="painpage.php#select_area">Order Online</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navbar-gold" href="painpage.php#booking">Book a table!</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link navbar-gold mt-2" href="#"><i class="fa fa-shopping-bag"></i></a>
                </li>
            </ul>
            </div>
        </div>
    </nav>  
     

    <div style="margin-left: 170px;padding-top: 25px;padding-bottom: 25px;">
        <div >         
            <span style="font-family: 'Bebas Neue Pro Bold';font-size: 3rem;color: #183029;">
            <?php 
            if( $branch_id == 1 ? $TitleDataBalmain['firstpage'] != null : $TitleDataBroadway['firstpage'] != null) {
                echo $branch_id == 1 ? $TitleDataBalmain['firstpage'] : $TitleDataBroadway['firstpage']; 
            } else {
            ?> <p>Love by you,</br>Delivery by us</p> 
            <?php } ?>
                <?php if($isAdmin){ ?> <a href="admin/edit_firstpage.php?id=<?php echo $branch_id == 1 ? $TitleDataBalmain['id'] : $TitleDataBroadway['id']; ?>" class="bg"><img src="images/bt-edit.png" border="0" align="absmiddle" /></a> <?php }?>
            </span>
        </div>  
        <?php while ($rs = mysql_fetch_assoc($status)){
            if($rs['open_close'] == 0){
                $_SESSION['order_on'] = 'no';?>
                <div class="title_icon col-md-1" style="width:5%; padding-left: 0;"><img class="icon_pep" src="inc/img/icon/sory.png" alt=""></div>
                <div class="little_title col-md-11" style="width: 95%; font-size: 24.36px; padding-left: 0;">
                    <?php if ( $branch_id == 1 && $closeDataBalmain['firstpage'] != null ) { echo $closeDataBalmain['firstpage']; } elseif ($branch_id == 2 && $closeDataBroadway['firstpage'] != null) { echo $closeDataBroadway['firstpage']; } else {?>
                        <p>Store is currently closed! Please come back later.</p>
                        <p>Open Mon - Sun 5:30pm -10pm</p>
                        <?php } ?>
                </div>
        <?php }else{
                $_SESSION['order_on'] = 'yes';
            }
        } ?>

        
        <?php 
        //// for testing ////
        $_SESSION['order_on'] = 'yes';
        if($_SESSION['order_on'] == 'yes'){?>
            <div id="menu_list" class="row pl-3" style="width:800px;">
                <span style="font-family: 'Bebas Neue Pro Bold';font-size: 1.5rem;color: #183029;">CATEGORY:&nbsp;</span>                
                <?php 
                $countcat = 1;
                while ($rsM = mysql_fetch_assoc($catData)) { ?>
                    <a href="javascript:showCat(<?=$rsM['id']?>)" id="menulist_<?=$rsM['id']?>" class="menu_list  <?php echo $countcat == 1? 'menu_active':'' ?> "><?=$rsM['cat_name']?></a><span href="#" class="menu_list">/</span>            
                <?php 
                    $countcat = $countcat + 1 ;
                } ?>
            </div>
            <?php
        } ?>   
                    
        <div id="menu_item" style="padding-right: 50px;">
        <?php  
        //section category
        if($_SESSION['order_on'] == 'yes'){
            while ($rs_cat = mysql_fetch_assoc($catData2)) { ?> 
                <section id="section_<?=$rs_cat['id']?>">
                    <div class="row"> 
                    <?php 
                        $productData = getProductByCatId($rs_cat['id']);
                        while ($rs = mysql_fetch_assoc($productData)){
                            // all product by category ?>
                        <div class="col-md-4 col-sm-12 col-xs-12 mt-5" >
                            <div class="card border-round" style="cursor:pointer;" onclick="showFrmEdit('<?php echo $rs['id']; ?>',<?php echo $rs['cat_id']?>)">
                                <div class="card-horizontal" data-toggle="modal" data-target="#exampleModalCenter">
                                    <div class="img-square-wrapper">
                                        <img class="product_pic" src="<?php echo $rs['pic_path'] != '' ? str_replace('../','',$rs['pic_path']) : 'inc/img/icon/no-image-found.gif' ;?>">
                                    </div>
                                    <div class="card-body p-2">
                                        <div class="row product_item_header">
                                            <div class="col-8"><?=$rs['p_name']?></div>
                                            <div class="col-4 text-right">$<?=$rs['p_price']?></div>
                                        </div>
                                        <p class="card-text product_item_detail"><?=$rs['p_desc']?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } //end all product by category?>
                    </div>
                </section>   
                <?php } //end section category ?>    
            <?php } //end if $_SESSION['order_on'] == 'yes' ?>        
        </div>
    </div>  

    <!-- Modal -->

    <div class="spin modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">        
        <div class="spin modal-dialog" role="document">
            <div class="spin modal-content ">                    
                <form id="form-product-process" name="form-product-process" enctype="multipart/form-data" method="post">              
                    <div class="card bg-order-item" style="width: 100%">
                        <!-- <img class="card-img-top" src="inc/img/icon/no-image-found.gif" alt="Card image cap">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-10 modal_product_item_name" id="modal_p_name">Khantoke Lanna</div>
                                <div class="col-2 text-right modal_product_item_price" id="modal_p_price">$ 12.9</div>
                            </div>                     
                            <div class="row">   
                                <div class="col-8 product_item_detail " id="modal_p_desc">
                                Northern Style chilli paste dip. Nam Prik Ong, made with dried chilli, 
                                    ground pork and tomatoes. Dip it with sticky rice or scoop up the dip 
                                    with a piece of cucumber or pork crackers to get
                                </div>      
                                <div class="col-4 card-text text-right">
                                    <div class="input-group-quantity">
                                        <input type="button" value="-" class="button-minus quantity_input" data-field="quantity">
                                        <input type="number" step="1" max="" value="1" name="quantity" class="quantity-field quantity_input">
                                        <input type="button" value="+" class="button-plus quantity_input" data-field="quantity">
                                    </div>
                                </div>                            
                            </div>                        
                        </div> -->
                        <div class="content"></div>   
                                           
                    </div>
                    <!-- <div class="spin modal-footer bg-order-item">
                        <button type="button" class="spin modal-title btn btn-secondary" data-dismiss="modal" style="float: left;">CANCEL</button>
                        <button type="submit" class="spin modal-title btn ">ADD</button>
                    </div> -->
                </form>
            </div>
        </div>

    </div>

<script src="newdesign/js/jquery.min.js"></script>    
<script src="newdesign/js/popper.js"></script>
<script src="newdesign/js/bootstrap.min.js"></script>
<script src="newdesign/js/main.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
       //updateQtyAndTotal();
    });
    $(window).scroll(function() {
        if ($(this).scrollTop() > 50) {
            $('.btn-nav').removeClass('animated');
            $('.nav-container').removeClass('showNav');
            $('.nav-container').addClass('hideNav');
        }
    });

    function showCat(id){
        $('section[id^="section_"]').each(function () {
            console.log(this.id);
            if(this.id != id){
                $(this).hide();                
            }
        });
        $('#section_'+id).show();
        
        $('a[id^="menulist_"]').each(function () {
            $(this).removeClass( "menu_active" )
        });

        $('#menulist_'+id).addClass( "menu_active" )
    }
    function showFrmEdit(id,catid) {

        //$('#myModal').modal('show');        

        $.ajax({

            type: 'POST',
            url: "product_process_new.php",
            data: {id: id,catid: catid},
            cache: false,
            success: function (msg) {
                if (msg.trim() == "nodata") {
                    alert("No Product data.");
                } else {
                    $('#myModal').find('.content').html(msg);
                    $('#myModal').modal('show');

                }
            }

        });       
        return false;        
    }

    function incrementValue(e) {
        e.preventDefault();
        var fieldName = $(e.target).data('field');
        var parent = $(e.target).closest('div');
        var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

        if (!isNaN(currentVal)) {
            parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
        } else {
            parent.find('input[name=' + fieldName + ']').val(0);
        }
    }

    function decrementValue(e) {
        e.preventDefault();
        var fieldName = $(e.target).data('field');
        var parent = $(e.target).closest('div');
        var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

        if (!isNaN(currentVal) && currentVal > 0) {
            parent.find('input[name=' + fieldName + ']').val(currentVal - 1);
        } else {
            parent.find('input[name=' + fieldName + ']').val(0);
        }
    }

    $('.input-group-quantity').on('click', '.button-plus', function(e) {
        incrementValue(e);
    });

    $('.input-group-quantity').on('click', '.button-minus', function(e) {
        decrementValue(e);
    });

</script>