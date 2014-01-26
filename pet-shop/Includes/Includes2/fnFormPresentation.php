<?php
function textEntry($display,$name,$entries,$errors,$size=15){
	$returnVal = "
	<tr>
		<td>$display:</td>
		<td>
			<input type='text' name='$name' size='$size'
			value='" . browserString($entries[$name]) . "'>";

	if (array_key_exists($name,$errors)){
		
		$returnVal .= '<span class="Error" style="white-space:nowrap">* ' .
				$errors[$name] .
			'</span>';
	}

	$returnVal .= "</td>
	</tr>";

	return $returnVal;
}

function checkBoxEntry($display,$name,$entries,$selected=0){
	
	$returnVal= "<tr>
		<td>$display:</td>
		<td>
			<input type='checkbox' name='$name'";
			
			
			if (@$entries[$name]=='1'){
				$returnVal.= " checked='checked' value='1'";
			}else{
				$returnVal.= " value='0'";	
			}
	$returnVal.= "/>";
	$returnVal.= "</td>";
	$returnVal.= "</tr>";

	return $returnVal;	
}

function selectEntry($display,$name,$options,$errors,$selected=0){
    $returnVal = "<tr>
        <td>$display:</td>
        <td>
            <select class='petSelect' name='$name'>";
			   
            foreach ($options as $key=>$option){
					
                if ($key == $selected){
					
                    $returnVal .= "<option value='$key' selected='selected'>
                                $option</option>";
								
                }else{
					
                    $returnVal .= "<option value='$key'>
                                $option</option>";
                }
            }
            $returnVal .= "</select>
        </td>
        </tr>";
 		
        if (array_key_exists($name,$errors)){
			
            $returnVal .= addErrorRow($name,$errors);
        }
    return $returnVal;
}

function selectDateEntry($display,$namePre,$month,$day,$year,$errors){
	$returnVal = "<tr>
		<td>$display:</td>
		<td>		  
			<select name='BirthMonth'>";
			for ($i=1; $i<=12; $i++){
				if ($i == $month){
					
					$returnVal .= "<option value='$i' selected='selected'>";
					
				}else{
					
					$returnVal .= "<option value='$i'>";
				}
				$returnVal .= monthAsString($i) . '</option>';
			}
			$returnVal .= "</select>
				      
			<select name='BirthDay'>";
			for ($i=1; $i<=31; $i++){	
				if ($i == $day){
					
					$returnVal .= "<option value='$i' selected='selected'>";
					
				}else{
					
					$returnVal .= "<option value='$i'>";
				}
				$returnVal .= "$i</option>";
			}
			$returnVal .= "</select>
					 
			<select name='BirthYear'>";
			  
			for ($i=date('Y'); $i>=1900; $i=$i-1){	
				if ($i == $year){
					$returnVal .= "<option value='$i' selected='selected'>";
				}else{
					$returnVal .= "<option value='$i'>$i</option>";
				}
				$returnVal .= "$i</option>";
			}
			$returnVal .= '</select>
		</td>
	</tr>';
	
	if (array_key_exists('BirthDate',$errors)){
									
		$returnVal .= addErrorRow('BirthDate',$errors);
	}
	return $returnVal;
}

function addErrorRow($name,$errors){
	
	$errorRow = '<tr><td colspan="2" class="Error">* ' .
					$errors[$name] .
				'</td></tr>';
	return $errorRow;
}
?>
