<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Grooming Requests</title>
        <style>
        	#adminTable, #adminTable tr, #adminTable td, #adminTable th{
				border:1px solid black;	
			}
			
			#adminTable{
				width:900px;
			}
        </style>
    </head>
    <body>
    	
    	<h1>The Admin Zone</h1>
         <form method="post" action="Includes/AddPet.php">
         	<input type="submit" name"Add Pet" value="Add New Pet"/>
         </form>
        <br/>
        <a href="http://localhost/PHPClassFiles/pet-shop/ppz.php">Go to PPZ</a>
        <br/>
        <br/>
		<?php
			@$db = new mysqli('localhost','root','pwdpwd','pet_shop');
			
			if (mysqli_connect_errno()){
				
				echo 'Cannot connect to database: ' . mysqli_connect_error();
			}else{
				
				$query = 'SELECT * FROM grooming';
				$result = $db->query($query);
				$numResults = $result->num_rows;
			
				echo "<strong>$numResults Grooming Request(s)</strong>";
        ?>
        <table id="adminTable">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>City</th>
            <th>State</th>
            <th>Phone Number</th>
            <th>Email Address</th>
            <th>Type of Pet</th>
            <th>Pet's Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    <?php
        while ($row = $result->fetch_assoc())
        {
            echo '<tr>';
            echo '<td>' . $row['FirstName'] . '</td>';
            echo '<td>' . $row['LastName'] . '</td>';
            echo '<td>' . $row['Address'] . '</td>';
            echo '<td>' . $row['City'] . '</td>';
            echo '<td>' . $row['State'] . '</td>';
            echo '<td>' . $row['PhoneNumber'] . '</td>';
            echo '<td>' . $row['Email'] . '</td>';
			if ($row['PetType'] == 1){
				$row['PetType'] = "Dog";
			}elseif($row['PetType'] == 2){
				$row['PetType'] = "Cat";
			}else{
				$row['PetType'] = "";
			}
            echo '<td>' . $row['PetType'] . '</td>';
            echo '<td>' . $row['PetName'] . '</td>';
            echo '<td><form method="post" action="Includes/EditPet.php">
                    <input type="hidden" name="GroomingID" id="GroomingID" value="' . $row['GroomingID'] . '">
                    <input type="submit" name="Editing" id="Editing" value="Edit">
                    </form></td>';
			echo '<td><form method="post" action="Includes/DeletePet.php">
					<input type="hidden" name="GroomingID" id="GroomingID" value="' . $row['GroomingID'] . '">
                    <input type="submit" name="DeleteApp" id="Deleting" value="Delete">
                    </form></td>';
            echo '</tr>';
        }
    ?>
        </table>
    
    <?php

        $result->free();
        $db->close();
    }
    ?>
    </body>
</html>