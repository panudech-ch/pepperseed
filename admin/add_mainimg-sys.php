<?php include('../connect.php');?>
<?php include('function.php');?>
<?php include('SimpleImage.php');?>
<?php 
$mainIMG = $_POST['boxMainImg'];

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
		uploadpic($picname,$ptmp,$lpicurl,$spicurl,100,50,$pext[1]);
	
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

list($width, $height, $type, $attr) = getimagesize($lpicurl.$pathImg);
if($width >=960){
		// Resize Images to width 250
		  $image = new SimpleImage();
		  $image->load($lpicurl.$pathImg);
		  $image->resizeToWidth(960);
		  $image->save($lpicurl.$pathImg);		  
	chmod($lpicurl.$pathImg, 0644);	  
}


$sql="INSERT INTO mainimg(
		img_path
	)VALUES(
		'$pathImg'
	)";
$result = mysql_query($sql);

if($result){ ?>
	<SCRIPT LANGUAGE="JavaScript">window.location="add_mainimg.php";</script>
<?php } else {
echo "ERROR";
} ?>