<?php 
$array = $_POST['option'];
$n=count($array);
for ($i=0; $i < $n; $i++) {
$file = fopen('/var/www/'.$array[$i].'.txt', 'a+');
fwrite($file, '1');
fclose($file);
}
/*if(empty($array)) { echo("You did not submit any options <br />"); }
else { $n=count($array);
echo ("You selected $n options(s):<br /> "); for ($i=0; $i < $n; $i++)
{ echo($array[$i]. "<br />"); } }
if (in_array("Word", $array)) {
    echo "You Use WORD?";
}*/


echo "<html>";
echo "<head>";
echo "<title>My Page</title>";
echo "<link rel='stylesheet' type='text/css' href='script.css'>";
echo "<script>";
echo "submitForms = function(){";
echo "    document.forms['sendoptions'].submit();";
echo "}";
echo "</script>";
echo "</head>";
echo "<body>";
echo "<form name='sendoptions' class='leftform' action='script2.php' method='post'>";
echo "<div><br>";
echo "<label><input type='checkbox' name='option[]' value='Akonadi Console'>Akonadi Console</label><br>";
echo "<label><input type='checkbox' name='option[]' value='Cervisia'>Cervisia</label><br>";
echo "<label><input type='checkbox' name='option[]' value='Chainsaw'>Chainsaw</label><br>";
echo "<label><input type='checkbox' name='option[]' value='Data Display Debugger'>Data Display Debugger</label><br>";
echo "<label><input type='checkbox' name='option[]' value='Git GUI'>Git GUI</label><br>";
echo "<label><input type='checkbox' name='option[]' value='Groovy Console'>Groovy Console</label><br>";
echo "<label><input type='checkbox' name='option[]' value='KAppTemplate'>KAppTemplate</label><br>";
echo "<label><input type='checkbox' name='option[]' value='KBugBuster'>KBugBuster</label><br>";
echo "<label><input type='checkbox' name='option[]' value='KCachegrind'>KCachegrind</label><br>";
echo "<label><input type='checkbox' name='option[]' value='KUIViewer'>KUIViewer</label><br>";
echo "<label><input type='checkbox' name='option[]' value='Kompare'>Kompare</label><br>";
echo "<label><input type='checkbox' name='option[]' value='LogFactor5'>LogFactor5</label><br>";
echo "<label><input type='checkbox' name='option[]' value='Lokalize'>Lokalize</label><br>";
echo "<label><input type='checkbox' name='option[]' value='Nedit'>Nedit</label><br>";
echo "<label><input type='checkbox' name='option[]' value='Qt4Designer'>Qt4Designer</label><br>";
echo "<label><input type='checkbox' name='option[]' value='Qt4Linguist'>Qt4Linguist</label><br>";
echo "<label><input type='checkbox' name='option[]' value='RStudio'>RStudio</label><br>";
echo "<label><input type='checkbox' name='option[]' value='Umbrello'>Umbrello</label><br>";
echo "</div>";
echo "</form>";

echo "<div class='infobar'>";
echo "<h9>RHEL Software Survey</h9>";
echo "</div>";
echo "<div class='textbar'>";
echo "<headingsmall>Please select all programming software you use as part of your day to day work</headingsmall>";
echo "<br/><br/><br/>";
echo "<para> This is a study being performed by ...... in order to identify any redundant software packages installed on the linux estate before we move operating systems from RHEL6 to RHEL7</para>";
echo "</div>";
echo "<a href='#' class='button' onclick='submitForms()'>Submit Data</a>";

echo "</body>";
echo "</html>";




?>
