<?php
function checkLength($text,$min=1,$max=10000,$trim=true)
{
	if ($trim)
	{
		$text = trim($text);
	}
	if (strlen($text) < $min || strlen($text) > $max)
	{
		return false;
	}
	return true;
}

function checkEmail($email)
{
	$email = trim($email);
	if (!checkLength($email,6))
	{
		return false;
	}
	elseif (!strpos($email,'@'))
	{
		return false;
	}
	elseif (!strpos($email,'.'))
	{
		return false;
	}
	elseif (strrpos($email,'.') < strrpos($email,'@'))
	{
		return false;
	}
	return true;
}
?>
