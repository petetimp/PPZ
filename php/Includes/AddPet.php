<?php
	//NOTE: All required files paraphrased from PHPClassFiles in Webucator Folder

	require 'Includes2/fnFormValidation.php';
	require 'Includes2/fnFormPresentation.php';
	require 'Includes2/fnStrings.php';
	require 'Includes2/fnDates.php';
	require 'Includes2/init.php';
?>
<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Add Grooming Appointment</title>
        <style type="text/css">
            .Error {color:red; font-size:smaller;}
			 
			.record{border:1px solid red;
				font-size:24px;
				margin: 0 auto;
				width:300px;
				text-align:center;
			}
        </style>
        <script src="lib.js"></script>
    </head>
    <body>
    	<?php
        	
            if (array_key_exists('Submitted',$_POST)){
					
    	        require 'Includes2/ProcessPet.php';
				
   	        }elseif (array_key_exists('Confirmed',$_POST)){
				
                require 'Includes2/InsertPet.php';
            }
            
            if ($showForm){
				
            	require 'Includes2/GroomingForm.php';
            }
    	?>
    <script src="pets.js"></script>
   	<script src="selectMenu.js"></script>
    </body>
</html>
