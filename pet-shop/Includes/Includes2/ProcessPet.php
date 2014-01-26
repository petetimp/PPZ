<?php
	$dbEntries = $_POST;

	if($dbEntries['PetType']==1){
				
			$breedEntries=$dogEntries;				
	
	}elseif($dbEntries['PetType']==2){
			
			$breedEntries=$catEntries;			
	}else{
			$breedEntries=$tempEntry;
	}
	
	foreach ($dbEntries as &$entry){
		
		$entry = dbString($entry);
	}

	if (!checkLength($_POST['FirstName'])){
		
		$errors['FirstName'] = 'First name omitted.';
	
	}else{
		
		$browserEntries['FirstName'] = browserString($_POST['FirstName']);
	}
	
	if (!checkLength($_POST['LastName'])){
		
		$errors['LastName'] = 'Last name omitted.';
	
	}else{
		
		$browserEntries['LastName'] = browserString($_POST['LastName']);
	}
	
	if (!checkLength($_POST['Address'],5,200)){
		
		$errors['Address'] = 'Address omitted.';
	
	}else{
		
		$browserEntries['Address'] = browserString($_POST['Address']);
	}
	
	if (!checkLength($_POST['City'],1,100)){
		
		$errors['City'] = 'City omitted.';
	
	}else{
		$browserEntries['City'] = browserString($_POST['City']);
	}
	
	if (!checkLength($_POST['State'],2,2) && !checkLength($_POST['State'],0,0)){
		
		$errors['State'] = 'State name must be two characters.';
	
	}else{
		$browserEntries['State'] = browserString($_POST['State']);
	}
	
	if (!checkLength($_POST['Zip'])){
		
		$errors['Zip'] = 'Zip Code omitted.';
	
	}else{
		$browserEntries['Zip'] = browserString($_POST['Zip']);
	}
	if (!checkLength($_POST['PhoneNumber'],10,15)){
		
		$errors['PhoneNumber'] = 'Home phone must be between <br/> 10 and 15 characters.';
	
	}else{
		$browserEntries['PhoneNumber'] = browserString($_POST['PhoneNumber']);
	}
	
	if ( !checkEmail($_POST['Email']) ){
		
		$errors['Email'] = 'Email is invalid.';
	
	}else{
		
		$browserEntries['Email'] = browserString($_POST['Email']);
	}
	
	if ($_POST['PetType'] == 0){
		$errors['PetType'] = 'Pet not selected.';
	}
	elseif ($_POST['Breed'] == 0){
		$errors['Breed'] = 'Breed not selected.';
	
	}else{
		$browserEntries['PetType'] = $_POST['PetType'];
		$browserEntries['Breed'] = $_POST['Breed'];
	}
	
	if (!checkLength($_POST['PetName'])){
		
		$errors['PetName'] = 'Pet Name omitted.';
	
	}else{
		$browserEntries['PetName'] = browserString($_POST['PetName']);
	}
	
	if(isset($dbEntries['NeuteredOrSpayed'])){
		$dbEntries['NeuteredOrSpayed']=1;
		$browserEntries['NeuteredOrSpayed']="Yes";	
	}else{
		$dbEntries['NeuteredOrSpayed']=0;
		$browserEntries['NeuteredOrSpayed']="No";	
	}
	
	if (!checkdate($_POST['BirthMonth'],$_POST['BirthDay'],$_POST['BirthYear'])){
		
		$errors['PetBirthday'] = 'Birth date is not a valid date.';
	
	}else{
		$browserEntries['PetBirthday']= browserString($_POST['BirthMonth'])."/" . browserString($_POST['BirthDay']) ."/". browserString($_POST['BirthYear']); 		
	}

	if (!count($errors) && array_key_exists('GroomingID',$_POST)){
		
		$GroomingID = $_POST['GroomingID'];
		$query= "UPDATE grooming SET 
				FirstName='" . $dbEntries['FirstName'] . "',
				LastName='" . $dbEntries['LastName'] . "',
				Address='" . $dbEntries['Address'] . "',
				City='" . $dbEntries['City'] . "',
				State='" . $dbEntries['State'] . "',
				Zip='" . $dbEntries['Zip'] . "',
				PhoneNumber='" . $dbEntries['PhoneNumber'] . "',
				Email='" . $dbEntries['Email'] . "',
				PetType='" . $dbEntries['PetType'] ."',
				Breed='" . $dbEntries['Breed'] ."',
				PetName='" . $dbEntries['PetName'] ."',
				PetBirthday='" . $dbEntries['BirthYear'] . '-' . $dbEntries['BirthMonth'] . '-' .$dbEntries['BirthDay'] . "'
				WHERE GroomingID = $GroomingID";									
		
		if ($db->query($query)){
			
			echo '<div style="text-align:center; font-size:36px;">Record Updated
			 	     <a href="http://localhost/PHPClassFiles/pet-shop/admin.php">Back to Admin</a>
				 </div>';
		
		}else{
			
			echo '<div style="text-align:center; font-size:36px;">Record Updated
			 	     <a href="http://localhost/PHPClassFiles/pet-shop/admin.php">Back to Admin</a>
				 </div>';
		}
	
	}elseif (!count($errors)){
		$showForm = false;
?>
	<form method="post" action="AddPet.php">
	<input type="hidden" name="Confirmed" value="true">
   
	<?php 
		echo '<h2>Confirm Entries</h2>';
		echo '<ol>';
		foreach ($browserEntries as $key=>$entry){
			
			if ($key=="PetType"){
				
				echo "<li><strong>Pet Type:</strong> $petEntries[$entry]</li>";
				
			}elseif($key=="Breed"){
				
				echo "<li><strong>Breed:</strong> $breedEntries[$entry] </li>";
				
			}else{
				
				echo "<li><strong>$key:</strong> $entry</li>";
			}
		}
		echo "</ol>";
		unset ($dbEntries['Submitted']);
		foreach ($dbEntries as $key=>$entry)
		{
	?>
		<input type="hidden" name="<?php echo $key ?>"
			value="<?php echo $entry ?>">
	<?php
		}
	?>
		<input type="submit" value="Confirm">
	</form>
<?php
	}else{
		
		$dbEntries = $_POST;
	}
?>
