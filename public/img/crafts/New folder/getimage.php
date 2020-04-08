<?php
	if($connect=mysqli_connect('localhost','root','root','salfny'))
	{
		$escape=mysqli_real_escape_string($connect,$content);
		$sql="select type,content from image";
		$query=mysqli_query($connect,$sql);
		$fetch=mysqli_fetch_array($query,MYSQLI_ASSOC);
		mysqli_free_result($query);
		mysqli_close($connect);
	}
	else
	{
		echo "There is no connection";
	}
	if(!empty($fetch))
	{
		header("Content-type:{$fetch['type']}");
		echo $fetch['content'];
	}
	
	
	
	
	
	
	/*						<?php
							include('../php/connect.php');
							$id = addslashes ($_REQUEST ['imageid']);
							$image = mysql_query ("select imagecont from item where imageid=5");
							$image = mysql_fetch_assoc ($image);
							$image = $image ['imagecont'];
							
							echo $image;
 						?>*/
?>
