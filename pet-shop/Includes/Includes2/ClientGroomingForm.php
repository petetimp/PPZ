<form id="gForm" method="post" action="ppz.php?page=form#confirm" >
<input type="hidden" name="Submitted" value="true">

<table id="groomTable">

	<?php
		if ($errors){
					
			echo "<h1 style='color:red;'>There were some problems...</h1><br/>";
		}
	
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
		<td><input id='subForm' class="formButton" type="submit" value="Make appointment"/></td>
	</tr>
</table>
</form>