<?php
	if($_POST['submit'] && !empty($_FILES))
	{
		$formok=TRUE;	
		//file vars
		$path=$_FILES['upload']['tmp_name'];
		$name=$_FILES['upload']['name'];
		$size=$_FILES['upload']['size'];
		$type=$_FILES['upload']['type'];
		$error=$_FILES['upload']['error'];
		if(!is_uploaded_file($path))
		{
			$formok=false;
			echo"لا يوجد ملف مرفوع,أعد المحاولة";
		}
		//check file extension
		if(!in_array($type,array('image/png', 'image/x-png', 'image/jpeg', 'image/pjpeg', 'image/gif')))
		{
			$formok=false;
			echo "الملف المرفوع ليس بصوره,أعد المحاولة";
		}
		if($formok)
		{
			if($connect=mysqli_connect('localhost','root','root','salfny'))
				{
					$content=file_get_contents($path);
					$safeimage=mysqli_real_escape_string($connect,$content);
					$sqlimage="insert into image(name,size,type,content) values ('$name','$size','$type','$safeimage')";

					$queryimage=mysqli_query($connect,$sqlimage);
						
					if($queryimage)
					{	
						$imageid=mysqli_insert_id($connect);		
					}
					mysqli_close($connect);
				}
				else
				{	
					echo "يوجد خطأ فى الاتصال بقاعدة البيانات";
				}
				echo "تم ادخال البيانات بشكل سليم ";
		}			
	}
?>
<form action="<?php echo $PHP_SELF; ?>" method="post" enctype="multipart/form-data">
	<input type="file" name="upload"/>
	<input type="submit" name="submit" value="process"/>
</form>