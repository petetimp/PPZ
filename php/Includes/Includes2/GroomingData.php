<?php
	$GroomingID = $_POST['GroomingID'];

	$query = "SELECT FirstName, LastName, Address, City, State, Zip, PhoneNumber, Email, 
			  PetType, Breed, PetName, NeuteredOrSpayed, MONTH(PetBirthday) AS BirthMonth,
			  DAYOFMONTH(PetBirthday) AS BirthDay, YEAR(PetBirthday) AS BirthYear FROM grooming
			  WHERE GroomingID = $GroomingID";
			
	$result = $db->query($query);
	$dbEntries = $result->fetch_assoc();
	$result->free();
?>
