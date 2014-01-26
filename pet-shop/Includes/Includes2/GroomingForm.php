<?php
	if (array_key_exists('GroomingID',$_POST)){
		$action = 'Edit';
		$formFlag = 'Updating';
	}else{
		$action = 'Add';
		$formFlag = 'Submitted';
	}
?>

<h1 style="text-align:center;"><?php echo $action ?> Appointment </h1>
<form method="post" action="<?php echo $action ?>Pet.php" >
<input type="hidden" name="<?php echo $formFlag ?>" value="true">
<?php
if (array_key_exists('GroomingID',$_POST)){
	echo "<input type='hidden' name='GroomingID' value='$GroomingID'>";
}
?>
<table align="center" border="1" width="500">
	<?php
		echo textEntry('First name','FirstName',$dbEntries,$errors,15);
		echo textEntry('Last name','LastName',$dbEntries,$errors,15);
		echo textEntry('Address','Address',$dbEntries,$errors,50);
		echo textEntry('City','City',$dbEntries,$errors,30);
		echo textEntry('State','State',$dbEntries,$errors,2);
		echo textEntry('Zip Code','Zip',$dbEntries,$errors,10);
		echo textEntry('Home phone','PhoneNumber',$dbEntries,$errors,15);
		echo textEntry('Email','Email',$dbEntries,$errors,25);
		echo selectEntry('Pet Type','PetType',$petEntries,$errors,$dbEntries['PetType']);
		if($dbEntries['PetType']==1){
				
			$breedEntries=$dogEntries;				
	
		}elseif($dbEntries['PetType']==2){
			
			$breedEntries=$catEntries;			
		}else{
			$breedEntries=$tempEntry;
		}
		echo selectEntry('Breed', 'Breed', $breedEntries ,$errors, $dbEntries['Breed']);
		echo textEntry('Pet Name','PetName',$dbEntries,$errors,15);
		echo checkBoxEntry('Neutered/Spayed','NeuteredOrSpayed', $dbEntries);
		echo selectDateEntry('Pet Birthday','PetBirthday',
							$dbEntries['BirthMonth'],
							$dbEntries['BirthDay'],
							$dbEntries['BirthYear'],
							$errors);
	?>
	<tr>
		<td><input type="submit" value="<?php echo $action ?> Customer"/></td>
        <td style="text-align:right;"><input type="button" value="Go Back to Admin" 
        onClick="location.href='http://localhost/PHPClassFiles/pet-shop/admin.php'"/>
    	</td>
	</tr>
</table>
</form>
