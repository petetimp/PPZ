<?php
	$dbEntries = $_POST;
	foreach ($dbEntries as &$entry)
	{
		$entry = dbString($entry);
	}
	
	@$db = new mysqli('127.9.234.130','adminY5VEmSp','eiF2JJMgWXP9','paulspetzone');
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
		echo '<h1 id="iH1" style="color:green;">Appointment Added!</h1> <br/>
			<div id="iAcenter"><a id="iA" href="?page=grooming#grooming">Back to Grooming Main Page</a></div>';
		$showForm = false;
	}
	else
	{
		echo '<h1 class="insert">Insert failed</h1>';
	}
?>
<img src="Includes/party.gif" id="garfPar"/>
