<?php
initialiseSettings();

///// Connect to DB///////
$link = mysqli_connect("localhost", "root", "Airbus0608", "tom") or die ("Not connected");


///// Run Query /////////
$query = "SELECT Outcome FROM Battles";
$result = mysqli_query($link, $query);
$outcomes = array();
while($row = mysqli_fetch_assoc($result))
{
    $outcomes[] = $row['Outcome'];  //store results into array
}




///// Run Query /////////
$query = "SELECT Place FROM Battles";
$result = mysqli_query($link, $query);
$location = array();
while($row = mysqli_fetch_assoc($result))
{
    $location[] = $row['Place'];  //store results into array
}




///// Run Query /////////
$query = "SELECT BattleName FROM Battles";
$result = mysqli_query($link, $query);
$battle_name = array();
while($row = mysqli_fetch_assoc($result))
{
    $battle_name[] = $row['BattleName']; //store results into array
}

?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="//tom-horseman.uk/DSA/style.css">
<script type="text/javascript">
	var outcomes = <?php echo json_encode($outcomes); ?>;
	var battlenames = <?php echo json_encode($battle_name); ?>;
	var locations = <?php echo json_encode($location); ?>;
</script >
<script src="//maps.googleapis.com/maps/api/js"></script>
<script src="//tom-horseman.uk/DSA/map.js"></script>
<script type="text/javascript">
	initialize(array);
	startdbinfo(DOM);
</script>
<title> English Civil War Google Map </title>
</head>


<body id="nomargin">
	<div id="googleMap"></div>
	<a href="xml.php"><div id="button">
		<h3 id="navheading">RSS FEED</h3>
	</div></a>
	<div id="overlay">
		<h1 id="heading"> Battles of the English Civil War</h1>
		<img src="civilwarbanner.jpeg" alt="civil war banner" height="125" width="300">
	<div id = "ebayapi">
		<br />
		<a href="http://adf.ly/19XGnP"><h2> Related Ebay Products:</h2></a>
		<table>
			<tr>
				<td>
					<?php ebayQuery();?>
		</table>
	</div>
	</div>
	<div id="twitterfeed">
		<h3 id="navheading"> Twitter Feed </h3>
		<form action="Input_for_mutiple_words_with_hashtag.php"> <!-- Location to where the user will be directed if they wish to pull searches in with hashtags -->
			<input type="submit" Value ="Search for words with hashtags"> <!-- Button to direct user -->
		</form>
		<form action="Input_for_mutiple_words.php"> <!-- Location to where the user will be directed if they wish to pull searches in without hashtags -->
			<input type="submit" value ="Search for words without hashtags"> <!-- Button to direct user -->
		</form>
		<?php twitterapi(); ?>
	</div>
	<div id="navoverlay">
		<p>Hover over icons to see battle info</p>
		<p>Double click icons to show more</p>	
	</div>
</body>
</html>




<!------ PHP FUNCTION SECTION BELOW ------------>




<?php
function initialiseSettings() {
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set("error_log", "php-error.log");
error_log( "Hello, errors!" );
error_reporting(E_ALL & ~E_NOTICE);  // Turn on all errors, warnings, and notices for easier debugging
set_error_handler('ErrorHandler',E_ALL & ~E_NOTICE);

}
?>

<?php
function eBayQuery() {
$endpoint = 'http://svcs.ebay.com/services/search/FindingService/v1';  // URL to call
$query = 'english civil war';                  // Supply your own query keywords as needed
// Construct the findItemsByKeywords POST call
// Load the call and capture the response returned by the eBay API
// The constructCallAndGetResponse function is defined below
$resp = simplexml_load_string(constructXMLCalleBay($endpoint, $query));
// Check to see if the call was successful, else print an error
if ($resp->ack == "Success") {
  $results = '';  // Initialize the $results variable

  // Parse the desired information from the response
  foreach($resp->searchResult->item as $item) {
    $pic   = $item->galleryURL;
    $link  = $item->viewItemURL;
    $title = $item->title;

    // Build the desired HTML code for each searchResult.item node and append it to $results
    $results .= "<tr><td><img src=\"$pic\" alt='ebaypicture'></td><td><a href=\"$link\">$title</a></td></tr>";
  }
}
else {  // If the response does not indicate 'Success,' print an error
  $results  = "<h3>Oops! The request was not successful. Make sure you are using a valid ";
  $results .= "AppID for the Production environment.</h3>";
}
echo $results;
}
?>

<?php
function constructXMLCalleBay($endpoint, $query) {
global $xmlrequest;

  // Create the XML request to be POSTed
  $xmlrequest  = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
  $xmlrequest .= "<findItemsByKeywordsRequest xmlns=\"http://www.ebay.com/marketplace/search/v1/services\">\n";
  $xmlrequest .= "<keywords>";
  $xmlrequest .= $query;
  $xmlrequest .= "</keywords>\n";
  $xmlrequest .= "<paginationInput>\n  <entriesPerPage>3</entriesPerPage>\n</paginationInput>\n";
  $xmlrequest .= "</findItemsByKeywordsRequest>";
  // Set up the HTTP headers
  $headers = array(
    'X-EBAY-SOA-OPERATION-NAME: findItemsByKeywords',
    'X-EBAY-SOA-SERVICE-VERSION: 1.3.0',
    'X-EBAY-SOA-REQUEST-DATA-FORMAT: XML',
    'X-EBAY-SOA-GLOBAL-ID: EBAY-GB',
    'X-EBAY-SOA-SECURITY-APPNAME: ThomasHo-84de-4f98-9045-5abdb1a0dcfd',
    'Content-Type: text/xml;charset=utf-8',
  );
  $session  = curl_init($endpoint);                       // create a curl session
  curl_setopt($session, CURLOPT_POST, true);              // POST request type
  curl_setopt($session, CURLOPT_HTTPHEADER, $headers);    // set headers using $headers array
  curl_setopt($session, CURLOPT_POSTFIELDS, $xmlrequest); // set the body of the POST
  curl_setopt($session, CURLOPT_RETURNTRANSFER, true);    // return values as a string, not to std out
  $responsexml = curl_exec($session);                     // send the request
  curl_close($session);                                   // close the session
  return $responsexml;                                    // returns a string
}  // End of constructPostCallAndGetResponse function
?>









<?php
function ErrorHandler($errno, $errstr, $errfile, $errline)
{
    if (!(error_reporting() & $errno)) {
        // This error code is not included in error_reporting
        return;
    }

    switch ($errno) {
    case E_USER_ERROR:
        echo "<b>My ERROR</b> [$errno] $errstr<br />\n";
        echo "  Fatal error on line $errline in file $errfile";
        echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
        echo "Aborting...<br />\n";
        exit(1);
        break;

    case E_USER_WARNING:
        echo "<b>My WARNING</b> [$errno] $errstr<br />\n";
        break;

    case E_USER_NOTICE:
        echo "<b>My NOTICE</b> [$errno] $errstr<br />\n";
        break;

    default:
        echo "Unknown error type: [$errno] $errstr<br />\n";
        break;
    }

    /* Don't execute PHP internal error handler */
    return true;
}
?>

<?php
function twitterapi(){
        require_once('TwitterAPIExchange.php'); //Call this php script once 
        
        header('Content-Type: text/html; charset="UTF-8"');
        
        
        $settings = array(
            'oauth_access_token' => "232370270-qJKBf5uYGzioQLFwhMXenYBteC0gtSiC2baZLMqt",  //developer's api tokens and key to allow access to tweets 
            'oauth_access_token_secret' => "nhd7yQ7xYpah2Bk5qDIyBXwhDhOvNHP0azq8SUVVnRvun",
            'consumer_key' => "msxrQeWx6BeR0oBLycwigWOSj",
            'consumer_secret' => "UnDnFt81jXt28m0TJIOf4Rsxrau5JF7RY6KbTsxxw9pGcCc4M0"
        );		
		
		$twitter_final = '?q=english.civil.war&src=typd'; //hard coded tweet search value  for default search  
		//echo $twitter_final;
        $url = 'https://api.twitter.com/1.1/search/tweets.json';
        $getfield = $twitter_final; 
        $requestMethod = 'GET';
        $twitter = new TwitterAPIExchange($settings);
        $data=$twitter->setGetfield($getfield)
                     ->buildOauth($url, $requestMethod)
                     ->performRequest();
        
        
        // Read the JSON into a PHP object
        $phpdata = json_decode($data, true);
        
        // Debug - check the PHP object
        //var_dump($phpdata)
        
        //Loop through the status updates and print out the text of each
        foreach ($phpdata["statuses"] as $status){
        	echo("<p>" . $status["text"] . "</p>");
			echo ("Number of retweets " . $status["retweet_count"] . "</p>"); //Print out the total number of retweets of each text
			echo ("This tweet was created on: " . $status["created_at"] . "</p>"); //Print out data of tweet.
			
        }



}
?>
