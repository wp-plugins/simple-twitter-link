<?php
/*
Plugin Name: Simple Twitter Link
Plugin URI: http://www.artiss.co.uk/simple-twitter-link
Description: Creates a link to Twitter for each post
Version: 1.4
Author: David Artiss
Author URI: http://www.artiss.co.uk
*/

function simple_twitter_link($twitter_text) {

    // Validate incoming Twitter text to ensure it's not blank and contains the %url%
    // template tag. If either isn't the case, a default Twitter text is used

    if (($twitter_text=="")or(strpos($twitter_text,"%url%")===false)) {
        $twitter_text="I'm currently reading %url%";
    }

    // If another URL shortening service is requested, override the 
    // standard TinyURL

    $tinyurl = "http://tinyurl.com/api-create.php?url=";
    if (strpos($twitter_text,"%is.gd%")!==false) {
        $tinyurl="http://is.gd/api.php?longurl=";
        $twitter_text=str_replace('%is.gd%','',$twitter_text);
    }
    if (strpos($twitter_text,"%snipr%")!==false) {
        $tinyurl="http://snipr.com/site/snip?r=simple&link=";
        $twitter_text=str_replace('%snipr%','',$twitter_text);
    }
    if (strpos($twitter_text,"%su.pr%")!==false) {
        $tinyurl="http://su.pr/api?url=";
        $twitter_text=str_replace('%su.pr%','',$twitter_text);
    }
    if (strpos($twitter_text,"%tr.im%")!==false) {
        $tinyurl="http://api.tr.im/api/trim_simple?url=";
        $twitter_text=str_replace('%tr.im%','',$twitter_text);
    }
    if (strpos($twitter_text,"%bit.ly%")!==false) {
        $tinyurl="http://bit.ly/api?url=";
        $twitter_text=str_replace('%bit.ly%','',$twitter_text);
    }

    // Fetch the TinyURL of the current post

    $tinyurl = file_get_contents($tinyurl.get_permalink($post->ID));

    // Replace the %url% tag in the Twitter text with the TinyURL

    $twitter_text = str_replace('%url%',$tinyurl,$twitter_text);

    // Replace any occurances of %title% with the blog title  

    $twitter_text = str_replace('%title%',html_entity_decode(get_the_title($post->ID)),$twitter_text);

    // Now, output the resultant Twitter link, encoding the Twitter text at the same time

    echo "http://twitter.com/home?status=".urlencode($twitter_text);

}
?>