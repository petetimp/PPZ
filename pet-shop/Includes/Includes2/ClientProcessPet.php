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

	if (!count($errors)){
		$showForm = false;
?>
	<form id="gForm" method="post" action="ppz.php?page=form#insert">
	<input type="hidden" name="Confirmed" value="true">
   
	<?php 
		echo '<h2 style="color:green;">Confirm Entries</h2>';
		echo '<br/>';
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
		<input id="conForm"  class="formButton" type="submit" value="Confirm">
	</form>
<?php
	}else{
		
		$dbEntries = $_POST;
	}
?>
