<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
	error_reporting(0);
	include "script.php";
	if(empty($_POST['f'])){ 
		echo ("вы ничего не выбрали"); 
	} 
	else{ 
		$af=$_POST['f']; 
		$j=count($af); 
		echo "<p>Файлы: </p>";
		for ($i=0;$i<$j;$i++){ 
			if(!empty($af[$i])) 
			{
				if (substr($af[$i], -3) == "txt")
				{
					echo ($af[$i]."-удаление...\n"); 
					unlink("formfile/".$af[$i]);
				}
				else
				{
					echo ($af[$i]."-этот файл не может быть удалён\n");
				}
			}
		} 
		if (check($af))
		{
	 		echo "<p><b>Файлы успешно удалены!</b></p>";
	 	}
	 }
?>

<form action="admin.php">
	<p><input type="submit" value="Вернуться к файлам"></p>
</form>
</body>
</html>
