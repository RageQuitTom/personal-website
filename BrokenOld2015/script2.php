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
echo "<form name='sendoptions' class='leftform' action='script3.php' method='post'>";
echo "<div><br>";
echo "<label><input type='checkbox' name='option[]' value='Akregator'>Akregator</label><br>";
echo "<label><input type='checkbox' name='option[]' value='BlueGriffon'>BlueGriffon</label><br>";
echo "<label><input type='checkbox' name='option[]' value='Knode'>Knode</label><br>";
echo "<label><input type='checkbox' name='option[]' value='Dolphin'>Dolphin</label><br>";
echo "<label><input type='checkbox' name='option[]' value='FirstAidKit'>FirstAidKit</label><br>";
echo "<label><input type='checkbox' name='option[]' value='KDiskFree'>KDiskFree</label><br>";
echo "<label><input type='checkbox' name='option[]' value='KWalletManager'>KWalletManager</label><br>";
echo "<label><input type='checkbox' name='option[]' value='KwikDisk'>KwikDisk</label><br>";
echo "<label><input type='checkbox' name='option[]' value='System Monitor (KDE)'>System Monitor (KDE)</label><br>";
echo "<label><input type='checkbox' name='option[]' value='jDiskReport'>jDiskReport</label><br>";
echo "<label><input type='checkbox' name='option[]' value='LyX'>LyX</label><br>";
echo "<label><input type='checkbox' name='option[]' value='Project Management (GNOME)'>Project Management</label><br>";
echo "<label><input type='checkbox' name='option[]' value='TaskJuggler'>TaskJuggler</label><br>";
echo "<label><input type='checkbox' name='option[]' value='freemind'>freemind</label><br>";
echo "<label><input type='checkbox' name='option[]' value='K3b'>K3b</label><br>";
echo "<label><input type='checkbox' name='option[]' value='VLC Media Player'>VLC Media Player</label><br>";
echo "</div>";
echo "</form>";

echo "<div class='infobar'>";
echo "<h9>RHEL Software Survey</h9>";
echo "</div>";
echo "<div class='textbar'>";
echo "<headingsmall>Please select all internet/media/system tool/office software you use as part of your day to day work</headingsmall>";
echo "<br/><br/><br/>";
echo "<para> This is a study being performed by ...... in order to identify any redundant software packages installed on the linux estate before we move operating systems from RHEL6 to RHEL7</para>";
echo "</div>";
echo "<a href='#' class='button' onclick='submitForms()'>Submit Data</a>";

echo "</body>";
echo "</html>";




?>
