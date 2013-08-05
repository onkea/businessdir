<?php
// This multisort function keeps the sponsors at the top of the page

function array_alternate_multisort()
{
    $arguments = func_get_args();
    $arrays    = $arguments[0]; 
    for ($c = (count($arguments)-1); $c > 0; $c--)
    {
        if (in_array($arguments[$c], array(SORT_ASC , SORT_DESC)))
        {
            continue;
        }
        $compare = create_function('$a,$b','return strcasecmp($a["'.$arguments[$c].'"], $b["'.$arguments[$c].'"]);');
        usort($arrays, $compare);
        if ($arguments[$c+1] == SORT_DESC)
        {
            $arrays = array_reverse($arrays);
        }
    }
    return $arrays ;
}

?> 





<?php
	
	include("setup.php");
	
	    if(isset($_GET['area'])){$area = $_GET['area'];}else{$area = "";};
	    if(isset($_GET['article'])){$articleName = $_GET['article'];}else{$articleName = "";}
	    if(isset($_GET['tag'])){$tag = $_GET['tag'];}else{$tag = "";}
//	    echo "AREA: $area<br />";

	$area = "MyCity";
   // set default area to salons
   if ($area==""){$area="Salons";}
   // set default tag to printing
   if ($tag ==""){$tag="salons";}



// What does this do?
function read_my_dir($dir)
    {
    global $tfile,$tdir;$i=0;$j=0;$myfiles;
    $areaNavigation ="<ul>";
    $myfiles[][] = array();
    if (is_dir($dir))
    {
    if ($dh = opendir($dir))
    {
    while (($file=readdir($dh)) !== false)
    {
    if (!is_dir($dir."/".$file))
    {
    $tfile[$i]=$file;
    $i++;
    $areaNameRaw = strtok($file, ".");
    $areaName = str_replace("_", " ", $areaNameRaw);
    $areaNavigation .= "<li><a href=\"?area=$areaNameRaw\">$areaName</a> </b></li>";
//    $outputText .= "<h1 id=\"$areaName\">$areaName</h1><br />\n";

    }
    }
    closedir($dh);
	$areaNavigation .= "</ul>";
    echo "" . $areaNavigation;
    }
    }
    }
    

 // What does this do??
function get_region($area, $city_name)
	{
		global $tag;
		$regionFile = "companies/" . $area . ".php";
//		echo "$regionFile<br />";
		$cleanArea = str_replace("_"," ",$area);
		$outputText = "<h1>$cleanArea flower shops:</h1>";
		include("$regionFile");

$company = array_alternate_multisort($company, "sponsor", SORT_DESC);

    	foreach($company as $key => $value){

    		$tagList = $company[$key][tags];
	    	$tagPresent = strpos($tagList, "$tag");
	//    	echo "tag:$tag</br>";
	//		echo $tagPresent;
    		if (($company[$key][name] != "") && ($tagPresent >= 0)){
				
					if($company[$key][sponsor]==1)
						{
						$outputText .=  "<div id=\"sponsor_company\">";
						$outputText .=  "<div id=\"name\">";
						$outputText .= "<a href=\"http://www.foxglovesflowers.com\" class=name>" . $company[$key][name] . "</a></div>\n";
						}
						else
						{
				        $outputText .=  "<div id=\"company\">";
				        $outputText .=  "<div id=\"name\">";
				        $outputText .= "<a href=\"business.php?id=$key\" class=name>" . $company[$key][name] . "</a></div>\n";
						}
				


						
						


					if($company[$key][sponsor]==1)
					{
					
					
					$outputText .= "<div class=\"side_by_side\"><div class=\"company_logo\"><a href=\"http://www.foxglovesflowers.com/\"><img src=\"images/foxglove.png\"></a></div>";
					$outputText .= "<div class=\"description\">" . $company[$key][description] . "</div>";
					$outputText .= "</div>";
					}
					


					$outputText .= "<table class=\"companyDetails\" border=0 cellspacing=0 cellpadding=0 ><tr>\n";
					
					
					
					if ($company[$key][tags] !=""){
						// clear last set of tags
						$tags = "";
						// turn the tags into links .. first split apart
						$tagsArray = explode(",", $company[$key][tags]);
						foreach($tagsArray as $value){
							$tags .= "<a href=\"?tag=$value\">$value</a> ";
						}
						$outputText .= "<tr><td valign=top><span class=\"details\">tags:" . $tags . "</span></td>\n";
		
					}else{$outputText .= "<tr><td></td>";}
					

					
					
					if ($company[$key][phone1] !=""){
						$outputText .=  "<td class=\"phone\" valign=top>Ph: " . $company[$key][phone1] . "</span></td></tr>";
					}else{$outputText .= "<td></td></tr>";}
					if ($company[$key][mailaddress] !=""){
						$outputText .=  "<tr><td class=\"address\" valign=top>" . $company[$key][mailaddress] . "</td>\n";
					}else{$outputText .= "<tr><td></td>";}
					if ($company[$key][website] !=""){
						if($company[$key][sponsor]==1)
						{
						$outputText .=  "<td class=\"website\" valign=top><a href=\"http://" . $company[$key][website] . "\" target=\"blank\" class=\"websitelink\">View Website</a></td></tr>\n";
						}
					}else{$outputText .= "<td></td></tr>";}
					$outputText .= "</table>\n";			
				$outputText .=  "</div>";
			}
    	}
			echo $outputText;
			$company = "";
	}

// Gets the articles, this I can understand
function get_articles($dir)
    {
    global $tfile,$tdir;$i=0;$j=0;$myfiles;
    $articlesMenuText ="<ul>";
    $myfiles[][] = array();
    if (is_dir($dir))
    {
	    if ($dh = opendir($dir))
   			 {
			    while (($file=readdir($dh)) !== false)
			    {
 				   if (!is_dir($dir."/".$file))
 				   {
					$tfile[$i]=$file;
					$i++;
					$articleNameRaw = strtok($file, ".");
					$articleName = str_replace("_", " ", $articleNameRaw);
					$articlesMenuText .= "<li><a href=\"?article=$articleNameRaw\">$articleName</a> </b></li>";
   					 }
			    }
    		closedir($dh);
    		$articlesMenuText .= "</ul>";
		    echo $articlesMenuText;
		    }
	    }
    }

?>

	<?php 
	include ("header.php");
	include ("navigation.php");
    	if (file_exists("adsense.php")){
			echo "<div id=\"adsense\">";
			include("adsense.php");
			echo "</div>";
		}
    	
	echo "<div id=\"content\">";

    // USAGE
    if ($articleName == ""){get_region("$area", $city_name);}
    else{
			$articleNameClean = str_replace("_", " ",$articleName);
			echo "<h1>$articleNameClean</h1>";
    		echo "<div id=\"article\">";
    		include("articles/$articleName");
    		echo "</div>";
    	}

?>    
    <div class="clear"></div>
<?php
    

    include("footer.php");
?>
