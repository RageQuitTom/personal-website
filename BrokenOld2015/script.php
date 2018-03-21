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
echo "<form name='sendoptions' class='leftform' action='script1.php' method='post'>";
echo "<div><br>";
echo "<label><input type='checkbox' name='option[]' value='GNU Octave'>GNU Octave</label><br>";
echo "<label><input type='checkbox' name='option[]' value='GV PostScript/PDF Viewer'>GV PDF Viewer</label><br>";
echo "<label><input type='checkbox' name='option[]' value='Grace'>Grace</label><br>";
echo "<label><input type='checkbox' name='option[]' value='Gwenview'>Gwenview</label><br>";
echo "<label><input type='checkbox' name='option[]' value='KColorChooser'>KColorChooser</label><br>";
echo "<label><input type='checkbox' name='option[]' value='KColorEdit'>KColorEdit</label><br>";
echo "<label><input type='checkbox' name='option[]' value='KIconEdit'>KIconEdit</label><br>";
echo "<label><input type='checkbox' name='option[]' value='KRuler'>KRuler</label><br>";
echo "<label><input type='checkbox' name='option[]' value='KSnapshot'>KSnapshot</label><br>";
echo "<label><input type='checkbox' name='option[]' value='KolourPaint'>KolourPaint</label><br>";
echo "<label><input type='checkbox' name='option[]' value='OpenDX'>OpenDX</label><br>";
echo "<label><input type='checkbox' name='option[]' value='Xfig'>Xfig</label><br>";
echo "<label><input type='checkbox' name='option[]' value='gThumb Image Viewer'>gThumb Image Viewer</label><br>";
echo "<label><input type='checkbox' name='option[]' value='XV'>XV</label><br>";
echo "</div>";
echo "</form>";

echo "<div class='infobar'>";
echo "<h9>RHEL Software Survey</h9>";
echo "</div>";
echo "<div class='textbar'>";
echo "<headingsmall>Please select all education/graphics software you use as part of your day to day work</headingsmall>";
echo "<br/><br/><br/>";
echo "<para> This is a study being performed by ...... in order to identify any redundant software packages installed on the linux estate before we move operating systems from RHEL6 to RHEL7</para>";
echo "</div>";
echo "<a href='#' class='button' onclick='submitForms()'>Submit Data</a>";

echo "</body>";
echo "</html>";




?>
