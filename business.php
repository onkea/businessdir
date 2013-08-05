<?php
	
	include("setup.php");

include("companies/area1.php");
if(isset($_GET['id']))
{$salon = $_GET['id'];}
else
{echo "no salon selected";}



	$name = $company[$salon]['name'];
	$phone_1 = $company[$salon]['phone1'];
	$phone_2 = $company[$salon]['phone2'];
	$mail_address = $company[$salon]['mailaddress'];
	$website = $company[$salon]['website'];
	$tags = $company[$salon]['tags'];

    $title = $name . " - " . $mail_address; // For this page set the title to the name of the salon
	include ("header.php");
	//include ("navigation.php");
    	if (file_exists("adsense.php")){
			echo "<div id=\"adsense\">";
			include("adsense.php");
			echo "</div>";
		}

	echo "<div id=\"content\">";    

    echo "<div class=\"phone\">";
	if(strlen($name) > 1){echo "<h1 style=\"padding-left:0px\">$name</h1>\n";}
	if(strlen($phone_1) > 1){echo "$phone_1<br />\n";}
	if(strlen($phone_2) > 1){echo "$phone_2<br />\n";}
	echo "<br />\n";
	if(strlen($website) > 1){echo "<h3><a href=\"http://$website\" target=\"_blank\">$website</a></h3>\n";}
	if(strlen($mail_address) > 1){echo "<br />$mail_address<br /><br />\n";}
	echo "</div>\n";
	echo "<br />";
	echo '<img src="http://maps.google.com/maps/api/staticmap?center=' . str_replace(" ", "+", $mail_address) . '&zoom=14&size=350x350&maptype=roadmap&markers=color:blue%7C' . str_replace(" ", "+", $mail_address) . '&sensor=false" />';
    echo "<br /><br /><br /><br />\n";
	echo "<div class=\"clear\"></div>";
	echo "</div>";

?>
