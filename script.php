<?php
function check($af)
{
	$filelist = glob("formfile/*.txt");
	$i = 0;
	foreach ($filelist as $filename) {
		if (is_file("formfile/".$af[$filename]))
		{
			$i++;
		}
	}

	if ($i == 0)
	{
		return true;
	}

	return false;
}
