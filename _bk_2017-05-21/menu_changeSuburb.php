<? include('connect.php'); ?>
<? include('constant.php'); ?>
<?
	 $_SESSION['area'] = $_GET["Choice"];
	 $_SESSION['address']=$_GET['address'];
	 $_SESSION['cname']=$_GET['cname'];
	 $_SESSION['email']=$_GET['email'];
	 $_SESSION['phone']=$_GET['phone'];
	 $_SESSION['comment']=$_GET['comment'];
?>
<SCRIPT LANGUAGE="JavaScript">window.location="menu3.php?show=yes&branch_id=<? echo $_GET['branch_id']; ?>";</script>