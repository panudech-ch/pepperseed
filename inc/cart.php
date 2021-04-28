<?php
/**
 * Created by PhpStorm.
 * User: indywib
 * Date: 1/26/2017
 * Time: 8:05 PM
 */
	include('../connect.php');
	include('../inc/admin/query_statement.php');
?>
<?php
	session_start();
	$isAdmin = $_SESSION['isAdmin'];
	$slocanData = getContentByPageSection('Slocan_aboutus');
?>
<div class="cart-data">
	<div class="cart-data-layout" style="padding:10px;">
		<h5 class="cart-data-title"><u>YOUR DETAILS</u>&nbsp;&nbsp;&nbsp;
		<span style="color:red; vertical-align: top; font-size: 12px; font-family: 'Gotham-Book';">*Must fill your name, contact number</span></h5> 
		<p>
	                <table width="20%" class="cart-the-mix">
	                    <tr>
	                        <td width="50%;"><input type="radio" name="" value=""> Pick up</td>
	                        <td width="50%;"><input type="radio" name="" value=""> Delivery<span style="color:red; vertical-align: top;">*</span></td>
	                    </tr>
	                </table>
	           </p>
	           <p>
	           	<table width="100%" class="cart-the-mix">
	           		<tr>
	           			<td width="15%">Name :</td>
	           			<td width="35%"><input id="" name="" type="text" class="form-control" style="display: inline-block; width:90%; height:30px;" value=""/></td>
	           			<td width="15%">Contact number :</td>
	           			<td width="35%"><input id="" name="" type="text" class="form-control" style="display: inline-block; width:90%; height:30px;" value=""/></td>
	           		</tr>
	           		<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
	           		<tr>
	           			<td>Email :</td>
	           			<td><input id="" name="" type="text" class="form-control" style="display: inline-block; width:90%; height:30px;" value=""/></td>
	           			<td>Promo Code :</td>
	           			<td><input id="" name="" type="text" class="form-control" style="display: inline-block; width:90%; height:30px;" value=""/></td>
	           		</tr>
	           	</table>
	           </p>
	           <p class="cart-the-mix-bold">Payment</p>
	           <p class="cart-the-mix"><input type="radio" name="" value=""> Cash only</td></p>
	           <hr class="line_cart">
	           <div class="clearfixed"></div>
	           <p>
	           	<span class="cart-left" style="font-family: 'TheMixBold'; font-size: 25.29px;">5 <b style="font-family: 'GothamLight'; font-size: 17.43px;">Serving</b></span>
	           	<span class="cart-right" style="font-family:'TheMixBold'; font-size: 24px;">Total $42.70</span>
	           </p>
	           <div class="clearfixed"></div>
	           <hr class="line_cart">
	           <div class="clearfixed"></div>
	           <p style="font-family: 'GothamBold'; font-size: 13px;">
	           	<button class="cart-left">BACK TO EDIT ORDERS</button>
	           	<button class="cart-right">CHECK OUT</button>
	           </p>
	           <div class="clearfixed"></div>
	</div>
	
</div>