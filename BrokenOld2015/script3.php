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
echo "<div class='infobar'>";
echo "<h9>RHEL Software Survey</h9>";
echo "</div>";
echo "<div class='textbar'>";
echo "<headingsmall>Thank you for taking the survey!<headingsmall>";
echo "<br/><br/><br/>"; 
echo "<para> For any queries, please email thomas.horseman</para>";
echo "</div>";
echo "</body>";
echo "</html>";




?>
