<html>
	<body>
		<form enctype='multipart/form-data' action="" method="post">
		  <input id="fileId1" type="file" accept="image/png,image/gif" name="file" />
		  <input type="submit" value="Submit" />
		</form>
	</body>

</html>





<?php
$allowedExts = array("gif", "jpeg", "jpg", "png", "zip", "rar");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

if (!in_array($extension, $allowedExts))
{
	echo "Extension is not allowed";
	return;
}


$allowedType = array("image/gif", "image/jpeg", "image/jpg", "image/pjpeg", "image/x-png", "image/png", "application/x-zip-compressed");
if (!in_array($_FILES["file"]["type"], $allowedType))
{
	echo "Type is not allowed";
	return;
}


if ($_FILES["file"]["error"] > 0)
{
	echo "error:" . $_FILES["file"]["error"] . "<br>";
}
else
{
	echo "file name : " . $_FILES["file"]["name"] . "<br>";
	
	if (file_exists("upload/" . $_FILES["file"]["name"]))
	{
		echo "The file already exists";
	}
	else
	{
		move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
		echo "store path : " . "upload/" . $_FILES["file"]["name"];
	}
}
?>
