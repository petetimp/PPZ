<?php
	//NOTE: Required files paraphrased from PHPClassFiles in Webucator Folder
	require 'Includes/Includes2/fnFormValidation.php';
	require 'Includes/Includes2/fnFormPresentation.php';
	require 'Includes/Includes2/fnStrings.php';
	require 'Includes/Includes2/fnDates.php';
	require 'Includes/Includes2/init.php';
?>
<!DOCTYPE HTML>
<html>
    <head>
    	<meta charset="UTF-8">
        <script type="text/javascript" src="Includes/lib.js"></script>
    	<script type="text/javascript" src="//use.typekit.net/men1gwe.js"></script>
        <script type="text/javascript" src="typekit.js"></script>
        <script src="http://code.jquery.com/jquery-latest.js"></script>
      	<script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
        <title></title>
        <link type="text/css" href="reset-meyer.css" rel="stylesheet"/>
        <link type="text/css" id='ppzStyle' href="ppz.css" rel="stylesheet"/>
        <link type="text/css" href="header.css" rel="stylesheet"/>
        <link type="text/css" href="nav.css" rel="stylesheet"/>
        <link type="text/css" id='footerStyle' href="footer.css" rel="stylesheet"/>
        <link type="text/css" id='homeStyle' href="Includes/home.css" rel="stylesheet"/>
        <link type="text/css" href="Includes/about.css" rel="stylesheet"/>
        <link type="text/css" href="Includes/location.css" rel="stylesheet"/>
        <link type="text/css" href="Includes/grooming.css" rel="stylesheet"/>
        <link type="text/css" href="Includes/hours.css" rel="stylesheet"/>
        <link type="text/css" href="Includes/insert.css" rel="stylesheet"/>
        <link type="text/css" href="Includes/internships.css" rel="stylesheet"/>
        <link type="text/css" href="Includes/contact.css" rel="stylesheet"/>
		<script src="browserConfig.js"></script>
        <!--[if lt IE 9]>
        	<script>
            	alert("Please upgrade your browser.");
        		location.href="browserUpgrade.html";
       		</script>
      	<![endif]-->
      
    </head>
    <body>
    	<div id="pageContainer">
            <header>
              <img id="logo" src="pet-zoneLogo2.jpg" alt="Logo"/>
              <h1 id="slogan">Get in the Zone--Pete's Pet Zone<span id="registered">&reg;</span></h1>
                            
              <img id="hairDryer" src="purplesmoke.jpg" alt="dryer"/>     
                            
              <img id="garfield" src="Garfield-Black-Wallpaper.jpg" alt="garfield"/>
            </header>
            
              <div id="navWrapper"></div>
              <div id="tri1" class="triangle-l"></div><!-- Left triangle -->
              <div id="tri2" class="triangle-r"></div> <!-- Right triangle -->
              
                <nav id="mainMenu">
                    <li class="menuItem"><a class="menuLink" href="http://localhost/PHPClassFiles/pet-shop/ppz.php?page=home">Home</a></li>
                    <li class="menuItem"><a class="menuLink" href="http://localhost/PHPClassFiles/pet-shop/ppz.php?page=about#about">About Us</a></li>
                    <li class="menuItem"><a class="menuLink" href="http://localhost/PHPClassFiles/pet-shop/ppz.php?page=location#location">Store Location</a></li>
                    <li class="menuItem"><a class="menuLink" href="http://localhost/PHPClassFiles/pet-shop/ppz.php?page=grooming#grooming">Grooming</a></li>
                    <li class="menuItem"><a class="menuLink" href="http://localhost/PHPClassFiles/pet-shop/ppz.php?page=contact#contact">Contact Us</a></li>
                </nav>
            <div class="clearer" style="clear:both;"></div>
            <div id="boneContainer">
              <div class="barberBone" id="bb1"></div>
              <div class="barberBone" id="bb2"></div>
               	<div id="contentContainer">
					<?php
						@$page=$_GET['page'];
						
                    	if (array_key_exists('page',$_GET)){
							require "Includes/". $page .".php";
						}else{
							require "Includes/home.php";
						}
						
						if(@$page=='contact'){
					?>
							<script>	
								document.getElementById("bb2").style.right="45px";
                                
								observeEvent(window,"load",function() {
                                    var contactForm = document.getElementById("contactForm");
                                    observeEvent(contactForm,"submit",function() {
                                        validate(this);
                                    });					
                                });
                            </script>
                   <?php
						}
						
						if (@$page=='hours' || @$page=='Internships'){
					?>
                    		<script>document.getElementById("bb2").style.right="45px";</script>
					<?php
						}
						
						if (@$page=='form'){
					?>
                    		<script>
                            	if (location.hash == '#insert'){
									document.getElementById("bb2").style.right="45px";	
								}
                            </script>
                    <?php
						}
                    ?>
               </div>     
        	</div>
            <div id="footerBar">
              <div id="tri3" class="triangle-l"></div>     <!--Left triangle--> 
              <div id="tri4" class="triangle-r"></div>     <!--Right triangle--> 
              </div>
            <footer>
              
              	<div class="footLinks">
                	<a class="footLink" href="http://localhost/PHPClassFiles/pet-shop/ppz.php">Home</a> |
                    <a class="footLink" href="http://localhost/PHPClassFiles/pet-shop/ppz.php?page=hours#hours">Hours of Operation</a> |
                    <a class="footLink" href="http://localhost/PHPClassFiles/pet-shop/ppz.php?page=Internships#internships">Internships</a> |
                    <a class="footLink" href="http://www.vcahospitals.com/">VCA Animal Hospitals</a> |
                    <a class="footLink" href="http://www.rover.com/">Rover.com</a> |
                    <a class="footLink" href="http://www.akc.org/">American Kennel Club</a> |
                    <a class="footLink" href="http://www.petsuppliesplus.com/">Pet Supplies Plus</a>
               	</div>
                    <img id="mediaBar" alt="Social Media" src="Includes/social-icons-bar.jpg"/><!--Just for show!--> 
              </footer>  
        	<div id="blackBg">
            	<div id="copyright">
                	<p>
                		&copy; Pete's Pet Zone 20<?php echo date('y') ?>. 
                    	All rights reserved
    	        	</p>
    			</div>
            </div>
        </div>
    </body>
</html>
