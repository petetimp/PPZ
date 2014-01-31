<?php
	//NOTE: All required files paraphrased from PHPClassFiles in Webucator Folder
	
	require 'Includes2/fnFormValidation.php';
	require 'Includes2/fnFormPresentation.php';
	require 'Includes2/fnStrings.php';
	require 'Includes2/fnDates.php';
	require 'Includes2/init.php';
	
	@$db = new mysqli('localhost','root','pwdpwd','pet_shop');
	
	if (mysqli_connect_errno()){
		echo 'Cannot connect to database: ' . mysqli_connect_error();
	}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Grooming Request</title>
        <style type="text/css">
            .Error {color:red; font-size:smaller;}
        </style>
    </head>
    <body>
    <?php
        
        if (array_key_exists('Updating',$_POST)){
			
            require 'Includes2/ProcessPet.php';
        }
      
        require 'Includes2/GroomingData.php';
        require 'Includes2/GroomingForm.php';
    
        $db->close();
    ?>
    </body>
</html>
