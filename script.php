<?php

function delt($af)
{
	$filelist = file_get_contents("formfile/data.txt");
	$filelist = explode("\n", $filelist);
	$i = 0;
	foreach ($af as $j) {
		foreach ($filelist as $key => $values) {
			$str = explode("|", $values);
			if ($str[6] == $j)
			{
				$str[8] = "y";
				$filelist[$key] = implode("|", $str);
				$i++;
				break;
			}
		}
	}
	$filelist = implode("\n", $filelist);
	file_put_contents("formfile/data.txt", $filelist);
	if ($i === count($af))
		return true;
	return false;
}
