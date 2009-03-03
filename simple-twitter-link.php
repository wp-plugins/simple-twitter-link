<?php
/*
Plugin Name: Simple Twitter Link
Plugin URI: http://www.artiss.co.uk/simple-twitter-link
Description: Creates a link to Twitter for each post
Version: 1.0
Author: David Artiss
Author URI: http://www.artiss.co.uk
*/

function simple_twitter_link($twitter_text) {
    
    // Validate incoming Twitter text to ensure it's not blank and contains the %url%
    // template tag. If either isn't the case, a default Twitter text is used
    
    if (($twitter_text=="")or(strpos($twitter_text,"%url%")===false)) {
        $twitter_text="I'm currently reading %url%";
    }  
    
    // Fetch the TinyURL of the current post
    
	$tinyurl = file_get_contents("http://tinyurl.com/api-create.php?url=".get_permalink($post->ID));
    
    // Replace the %url% tag in the Twitter text with the TinyURL
    
    $twitter_text = str_replace('%url%',$tinyurl,$twitter_text);
    
    // Now, output the resultant Twitter link, encoding the Twitter text at the same time
	
	echo "http://twitter.com/home?status=".urlencode($twitter_text);
	
}
?>