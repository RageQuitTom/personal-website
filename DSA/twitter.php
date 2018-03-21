
<!-- php page to pull in default tweets with the search "English Civil War" 
There will be a choice of further search choices such as searching with hashtags or certain text.

php code based on Prakash Chatterjee's workshop 5 from http://www.cems.uwe.ac.uk/~p-chatterjee/2014-15/modules/dsa/workshop5.html 

-->


<html>
<head>
<title> Search for tweets </title>
</head>
<body>
<H1>Twitter Search For English Civil War</H1>
<form action="Input_for_mutiple_words_with_hashtag.php"> <!-- Location to where the user will be directed if they wish to pull searches in with hashtags -->
<input type="submit" Value ="Search for words with hashtags"> <!-- Button to direct user -->
</form>
<form action="Input_for_mutiple_words.php"> <!-- Location to where the user will be directed if they wish to pull searches in without hashtags -->
<input type="submit" value ="Search for words without hashtags"> <!-- Button to direct user -->
</form>
</body>
</html>


<?php
        ini_set('display_errors', 1);  //Display potential errors 
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
        
        ?>