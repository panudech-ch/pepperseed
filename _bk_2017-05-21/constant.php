<?		
	session_start();
	$sesID = session_id();	
	
	$sql = "SELECT * FROM maindetail ORDER BY id ASC";
	$rsl = mysql_query($sql);
	while($data = mysql_fetch_array($rsl)){
		$i++;
		$tmpName[$i] = $data['desc_d'];
	}
	$FB = $tmpName[6];
	$TW = $tmpName[7];
	$IS = $tmpName[8];
	$YT = $tmpName[9];
	
	
	//$deliveryFree = 3.0;
	$minimumPrice = 25;
	$canOrderUnderMinPrice = "no"; //      yes / no
	$OrderUnderMinPrice = 2; //                  0 or (value fee)
	$urlLink = "http://www.pepperseeds.com.au/";
	
	$shopName = $tmpName[1];
	$titleOrderID = "PEP";
	/*$addr=$tmpName[2];
	$tel=$tmpName[3];
	$opentime=$tmpName[4];*/
	$fax=$tmpName[12];
	$positionmap='';
	
	$discount = 10; // 20%
	$chkdiscount = 'no';  // yes  / no
	
	
	/*--  Condition --
	$overcon1 = 25; // $25 
	$overcon1Free = 'Spring Roll or Curry Puff'; 
	$overcon2 = 50; // $50 
	$overcon2Free = 'Soft Drink 1.25L';  */
	
	
	//$toOwner = "test@gmail.com"; // to Owner
	$toInfo = $tmpName[5]; // to Owner
	$mailforsend = $tmpName[11]; // Mail Info
	$chkOwner = 'no';
	/*$deliveryFreeOutside = 15;*/		
	$surchargePercent = 2;   // 2.2%
	
	
	
	$i = 0;
	$sqlBranch = "SELECT * FROM branch ORDER BY id ASC";
	$rslBranch  = mysql_query($sqlBranch);
	while($dataBranch = mysql_fetch_array($rslBranch)){
		$i++;
		$shopBranch[$i] = $dataBranch['branch_name'];
		$chkOpenOnline[$i] = $dataBranch['open_close'];
		$chkOpenOnlineLunch[$i] = $dataBranch['open_close_lunch'];
		$addr[$i] = $dataBranch['addr'];
		$tel[$i] = $dataBranch['tel'];
		$opentime[$i] = $dataBranch['opentime'];
		$email[$i] = $dataBranch['email'];
	}
	
	 $headHight = 190; 
	 //$passwordAdmin = $tmpName[10];
	 // $_SESSION['sessionLogin']="admin";    Can Delete
?>