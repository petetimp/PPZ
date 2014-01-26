<?php
	$dbEntries = $_POST;
	foreach ($dbEntries as &$entry)
	{
		$entry = dbString($entry);
	}

	@$db = new mysqli('localhost','root','pwdpwd','pet_shop');
	if (mysqli_connect_errno())
	{
		echo 'Cannot connect to database: ' . mysqli_connect_error();
	}
	$query = "INSERT INTO grooming (FirstName, LastName, Address, City, State, Zip, PhoneNumber, Email, PetType, Breed, PetName, NeuteredOrSpayed, PetBirthday)
	VALUES ('" .	$dbEntries['FirstName'] . "','" .
					$dbEntries['LastName']  . "','" .
					$dbEntries['Address'] . "','" .
					$dbEntries['City'] . "','" .
					$dbEntries['State'] . "','" .
					$dbEntries['Zip'] . "','" .
					$dbEntries['PhoneNumber'] . "','" .
					$dbEntries['Email'] . "','" .
					$dbEntries['PetType'] . "','" . 
					$dbEntries['Breed'] . "','" .
					$dbEntries['PetName'] . "','" .
					$dbEntries['NeuteredOrSpayed'] . "','" .
					$dbEntries['BirthYear'] . "-" .
				 	$dbEntries['BirthMonth'] . "-" .
				 	$dbEntries['BirthDay']
   			   . "')";

	if ($db->query($query))
	{
		echo '<div class="record"><h1>Appointment Added</h1> <br/>
			<a href="../admin.php">Back to admin</a></div>';
		$showForm = false;
	}
	else
	{
		echo '<div class="record"><h1>Insert failed</h1></div>';
	}
?>
