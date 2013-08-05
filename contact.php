<?php
	
	include("setup.php");



	$name = $company[$salon]['name'];
	$phone_1 = $company[$salon]['phone1'];
	$phone_2 = $company[$salon]['phone2'];
	$mail_address = $company[$salon]['mailaddress'];
	$website = $company[$salon]['website'];
	$tags = $company[$salon]['tags'];

	$title = "Contact us / Submit a salon";
	include ("header.php");
	include ("navigation.php");
    	if (file_exists("adsense.php")){
			echo "<div id=\"adsense\">";
			
			echo "</div>";
		}

	echo "<div id=\"content\">";    
	
	        
        $from_site = $_SERVER['HTTP_HOST'];
	
?>






</div>