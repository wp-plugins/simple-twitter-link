<?php
/*
Plugin Name: Simple Twitter Link
Plugin URI: http://www.artiss.co.uk/simple-twitter-link
Description: Creates a link to Twitter for each post
Version: 1.6
Author: David Artiss
Author URI: http://www.artiss.co.uk
*/
function simple_twitter_link($twitter_text="",$url="",$paras_in="") {
    // Validate incoming Twitter text - use default if missing or an issue
    if (($twitter_text=="")or(strpos($twitter_text,"%url%")===false)) {$twitter_text="I'm currently reading %url%";}
    // Get the URL
    if ($url=="") {$url=get_permalink($post->ID);}
    // Use the Simple URL Shortener plugin to get a short URL
    if (function_exists('simple_url_shortener')) {
        $service=validate_url_shortener($twitter_text,"%{service}%");
        if ($service!="") {
            if ($paras_in!="") {
                $url=simple_url_shortener($url,"service=".$service."&".$paras_in);     
            } else {
                $url=simple_url_shortener($url,$service);
            }
            $twitter_text=str_replace('%'.$service.'%','',$twitter_text);
        }
    }
    // Replace the tags in the Twitter text
    if (strpos($twitter_text,"%url%")!==false) {$twitter_text = str_replace('%url%',$url,$twitter_text);}
    if (strpos($twitter_text,"%title%")!==false) {$twitter_text = str_replace('%title%',html_entity_decode(get_the_title($post->ID),ENT_QUOTES,'UTF-8'),$twitter_text);}
    // Output the resultant Twitter link
    echo "http://twitter.com/home?status=".urlencode($twitter_text);
    return;
}
?>