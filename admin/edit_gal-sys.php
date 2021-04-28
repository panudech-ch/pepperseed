<?php include('../connect.php');?>
<?php include('function.php');?>
<?php include('SimpleImage.php');?>
<?php 
$id=$_GET['id'];
$branch_id = $_GET['branch_id'];

$mainIMG = $_POST['boxMainImg'];
$mainIMGOld = $_POST['boxMainImgOld'];
$titlename = $_POST['titlename'];

$lpicurl='../images/imgupload/';
$spicurl='../images/imguploadtmp/';

// copy Img
if ((($_FILES["boxMainImg"]["type"] == "image/gif")
|| ($_FILES["boxMainImg"]["type"] == "image/jpg")
|| ($_FILES["boxMainImg"]["type"] == "image/jpeg")
|| ($_FILES["boxMainImg"]["type"] == "image/png")
|| ($_FILES["boxMainImg"]["type"] == "image/pjpeg"))
//&& ($_FILES["file"]["size"] < 100000)
)
  {
  if ($_FILES["boxMainImg"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
{    
		$backnormalname = date(DATE_RFC822);	
		$backnormalname = str_replace(" ","_",$backnormalname );
		$backnormalname = str_replace(",","_",$backnormalname );
		$backnormalname = str_replace(":","_",$backnormalname );
		$backnormalname = str_replace("+","_",$backnormalname );
				
		$pname=$_FILES['boxMainImg']['name'];
		$ptmp=$_FILES['boxMainImg']['tmp_name'];
		$pext=explode(".",$pname);
		$picname=$backnormalname.".".$pext[1];
		uploadpic($picname,$ptmp,$lpicurl,$spicurl,100,65,$pext[1]);
	
	  	$pathImg = $picname;
	chmod($lpicurl.$pathImg, 0644);
    }
  }
else
  {
  $pathImg = $mainIMGOld;
	chmod($lpicurl.$pathImg, 0644);
}
// end copy Img

		// Resize Images to width 250
		  $image = new SimpleImage();
		  $image->load($lpicurl.$pathImg);
		  $image->resizeToWidth(600);
		  $image->save($lpicurl.$pathImg);		  


$sql="UPDATE gallery SET 
		img_path='$pathImg', 
		titlename='$titlename', 
		branch_id='$branch_id'
	WHERE id='$id'";
$result=mysql_query($sql);

if($result){ ?>
	<SCRIPT LANGUAGE="JavaScript">window.location="add_gal.php?branch_id=<?php echo $branch_id; ?>";</script>
<?php } else {
echo "ERROR";
} ?>