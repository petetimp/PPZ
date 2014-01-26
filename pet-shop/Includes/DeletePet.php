<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Delete Record</title>
        <style>
			.record{border:1px solid red;
				font-size:24px;
				margin: 0 auto;
				width:300px;
				text-align:center;
			}
        </style>
    </head>   
    <body>
        <?php
        @$db = new mysqli('localhost','root','pwdpwd','pet_shop');
            
        if (mysqli_connect_errno()){
                        
            echo 'Cannot connect to database: ' . mysqli_connect_error();
        
        }elseif(array_key_exists("GroomingID",$_POST)){
                    
            $query=	"DELETE FROM grooming WHERE GroomingID ='" . $_POST['GroomingID'] . "'";
                        
            if ($db->query($query)){
                unset($_POST["GroomingID"]);	
				echo '<div class="record">';				
               		echo '<h1>Record Deleted</h1>';
                	echo '<a href="http://localhost/PHPClassFiles/pet-shop/admin.php">Admin Page</a>';
				echo '</div>';
            }else{
                echo '<div class="record">';                    
                	echo '<h1>Delete Failed</h1>';
                	echo '<a href="http://localhost/PHPClassFiles/pet-shop/admin.php">Admin Page</a>';
				echo '</div>';
            }
        }else{
			echo '<div class="record">';
				echo '<h1>You\'re not supposed to be here...</h1>';
				echo '<a href="http://localhost/PHPClassFiles/pet-shop/admin.php">Admin Page</a>';
			echo '</div>';
		}
        ?>
    </body>
</html>