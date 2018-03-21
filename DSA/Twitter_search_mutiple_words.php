<!-- php script that performs the users' requested search and display the results.

Two twiiter buttons created via help from https://dev.twitter.com/rest/public
php script based on php code from Prakash Chatterjee's workshop 5 from http://www.cems.uwe.ac.uk/~p-chatterjee/2014-15/modules/dsa/workshop5.html 
-->

<h1>Tweets about the English Civil war</h1>
<a href="https://twitter.com/intent/tweet?button_hashtag=englishcivilwar" class="twitter-hashtag-button">Tweet #englishcivilwar</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
<a href="https://twitter.com/share" class="twitter-share-button">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>


        <?php
		
		error_reporting(0); //Don't display errors or warnings to user. This is due to only warning is that occuring is when the user enters less than three words for the search hashtag (found during testing)
		
        //Based on code by James Mallison, see https://github.com/J7mbo/twitter-api-php
       
	   
        require_once('TwitterAPIExchange.php'); //Call this php script once 
        
        header('Content-Type: text/html; charset="UTF-8"');
        
        /** Set access tokens here - see: https://dev.twitter.com/apps/ **/
        $settings = array(
            'oauth_access_token' => "232370270-qJKBf5uYGzioQLFwhMXenYBteC0gtSiC2baZLMqt", //developer's api tokens and key to allow access to tweets 
            'oauth_access_token_secret' => "nhd7yQ7xYpah2Bk5qDIyBXwhDhOvNHP0azq8SUVVnRvun",
            'consumer_key' => "msxrQeWx6BeR0oBLycwigWOSj",
            'consumer_secret' => "UnDnFt81jXt28m0TJIOf4Rsxrau5JF7RY6KbTsxxw9pGcCc4M0"
        );
        
      
		$sname = $_POST['search']; //Gather search terms from input_for_mutiple_words_with_hashtag.php



		$words = explode(" ",$sname); //Split each search term
		$firstword = $words[0];  //set each word to a variable.
		$secondword = $words[1];
		$thirdword = $words[2];
		
		//NOTE TOSELF : Add more variables if required
		
		
		
		
		//$twitter_name = $_POST['search'];
		//echo $twitter_name;
		$twitter_final = '?q='.'%20'.$firstword.'%20'.$secondword.'%20'.$thirdword.'&src=tyah'; //Create search term from search variables, '%20' means text that does not include people or hashtags.
		//echo $twitter_final;
        $url = 'https://api.twitter.com/1.1/search/tweets.json';
        $getfield = $twitter_final;
        $requestMethod = 'GET';
        $twitter = new TwitterAPIExchange($settings);
        $data=$twitter->setGetfield($getfield)
                     ->buildOauth($url, $requestMethod)
                     ->performRequest();
        
        //Use this to look at the raw JSON
       // echo($data);
        
        // Read the JSON into a PHP object
        $phpdata = json_decode($data, true);
        
        // Debug - check the PHP object
        //var_dump($phpdata)
        
        //Loop through the status updates and print out the text of each
        foreach ($phpdata["statuses"] as $status){
        	echo("<p>" . $status["text"] . "</p>");
			echo ("Number of retweets " . $status["retweet_count"] . "</p>"); //display nummber of retweets 
			echo ("This tweet was created on: " . $status["created_at"] . "</p>"); //display when tweet was created 
			
        }
        
        ?>