<?php
//database configuration
$config['mysql_host'] = "localhost";
$config['mysql_user'] = "root";
$config['mysql_pass'] = "Airbus0608";
$config['db_name']    = "tom";
$config['table_name'] = "Battles";
$config['table_name2'] = "idBattles";
 
//connect to host
mysql_connect($config['mysql_host'],$config['mysql_user'],$config['mysql_pass']);
//select database
@mysql_select_db($config['db_name']) or die( "Unable to select database");
$xml          = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>";
$root_element = $config['table_name']; //fruits
$xml         .= "<$root_element>";

//select all items in table
$sql = "SELECT * FROM ".$config['table_name'];
 
$result = mysql_query($sql);
if (!$result) {
    die('Invalid query: ' . mysql_error());
}
$xmlDom = new DOMDocument();
$xmlDom->appendChild($xmlDom->createElement('Battles'));
$xmlRoot = $xmlDom->documentElement;

while ( $row = mysql_fetch_row($result) ) 
    {
	      $i=0;

      $xmlRowElementNode = $xmlDom->createElement('Battle');
	  $xmlRowElementNode->appendChild($xmlRowElementNode->setAttribute('id', $row[$i]));

      for($i=1;$i<mysql_num_fields($result);$i++)
      {
          $xmlRowElement = $xmlDom->createElement(mysql_field_name($result,$i));
          $xmlText = $xmlDom->createTextNode($row[$i]);
            $xmlRowElement->appendChild($xmlText);

            $xmlRowElementNode->appendChild($xmlRowElement);
      }
      $xmlRoot->appendChild($xmlRowElementNode);
   }
    header('Content-type:  text/xml');
    echo $xmlDom->saveXML();
?>