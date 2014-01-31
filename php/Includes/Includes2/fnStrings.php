<?php
function browserString($string)
{
	return nl2br(trim(htmlentities($string)));
}

function dbString($string)
{
	$string=trim($string);
	if (get_magic_quotes_gpc())
	{
		return $string;
	}
	else
	{
		return addslashes($string);
	}
}
?>
