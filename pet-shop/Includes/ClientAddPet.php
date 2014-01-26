
    <script src="Includes/lib.js"></script>
    	<?php
        	
            if (array_key_exists('Submitted',$_POST)){
				
			 	require 'Includes2/ClientProcessPet.php';
				
   	        }elseif (array_key_exists('Confirmed',$_POST)){
				
                require 'Includes2/ClientInsertPet.php';
            }
            
            if ($showForm){
            	require 'Includes2/ClientGroomingForm.php';
            }
    	?>
    <script src="Includes/pets.js"></script>
   	<script src="Includes/selectMenu.js"></script>
