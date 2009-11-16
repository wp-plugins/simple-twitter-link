=== Simple Twitter Link ===
Contributors: dartiss
Donate link: http://tinyurl.com/bdc4uu
Tags: Twitter
Requires at least: 2.0.0
Tested up to: 2.8.6
Stable tag: 1.5

Simple Twitter Link displays a link allowing Twitter users to update their status with a link back to your post or page.

== Description ==

**From version 1.5 you must now install the [Simple URL Shortener](http://wordpress.org/extend/plugins/simple-url-shortener/ "Simple URL Shortener") plugin for the URL shortening to work in this plugin**

The code for Simple Twitter Link should be added to the bottom of appropriate post/page templates within your theme (and in the case of posts, within the loop).

Simple Twitter Link simply returns a URL - this URL is a link to Twitter with your post/page URL within it. Here's an example...

`<a href="<?php simple_twitter_link(''); ?>">Send to Twitter</a>`

This will display the text "Send to Twitter" on your page/post. However, when clicked on it will take you to your Twitter account and pre-fill in the status with "I'm currently reading xxx", where xxx will be the URL of the page/post that you just came from.

In the case of this example, no parameters were passed and, hence, a default sentence was passed to Twitter. If, however, you'd like to define your own Twitter text, then you simply pass this as a parameter. `%url%` must be specified within the sentence, as this tells Simple Twitter Link where you want the URL to go.

So, another example...

`<a href="<?php simple_twitter_link('%url% is an excellent read'); ?>">Send to Twitter</a>`

In this case the line "xxx is an excellent read" (again, where xxx is the URL of your page/post) will be passed to Twitter.

If you don't pass a parameter or miss out the %url% tag the default text will be used.

The following is an example of how it could be used, with a `function_exists` check so that it doesn't cause problems if the plugin is not active...

`<?php if (function_exists('simple_twitter_link')) : ?>`
`<a href="<?php simple_twitter_link(''); ?>">Send to Twitter</a>`
`<?php endif; ?>`

You can also use an addition tag, `%title%`, which will show the post/page title in the Twitter text.

If you have the Simple URL Shortener plugin installed, you can also use a number of additional tags which will allow the URL to be shortened. Simple specify the name of the shortening service withing percentage signs within the Twitter text (this text will then be removed from the resultant output to Twitter). So, here is a further example...

`<a href="<?php simple_twitter_link('%tr.im%Currently reading a blog post called "%title%" - %url%'); ?>">Send to Twitter</a>`

This uses both the new %title% tag and also uses the tr.im shortening service to shorten the URL.

By default, the URL of the current post/page is used. If, however, you specify a URL as a second parameter then this will be used instead (useful if you wish to add a generic Twitter link to your sidebar, for instance). An example would be...

`<a href="<?php simple_twitter_link('%tr.im%Currently reading a blog post called "%title%" - %url%','http://www.artiss.co.uk'); ?>">Send to Twitter</a>`

== Installation ==

1. Upload the entire simple-twitter-link folder to your wp-content/plugins/ directory.
2. Activate the plugin through the ‘Plugins’ menu in WordPress.
3. There is no options screen - configuration is done in your code.

== Frequently Asked Questions ==

= How can I get help or request possible changes =

Feel free to report any problems, or suggestions for enhancements, to me either via my contact form or by the plugins homepage at http://www.artiss.co.uk/simple-twitter-link

== Changelog ==  
  
= 1.0 =
* Initial release

= 1.1 =
* There is an additional template tag, `%title%`, which will show the post/page title in the Twitter text

= 1.2 =
* Additional tags added to override the URL shortening service (defaults to TinyURL) - `%is.gd%`, `%snipr%`, `%tr.im%`

= 1.3 =
* Added bit.ly to list of URL shortening services

= 1.4 =
* Fixed issue with ampersands (and probably other characters) in the blog title causing linking issues
* Added su.pr as another URL shortening service

= 1.5 =
* Now using [Simple URL Shortener](http://wordpress.org/extend/plugins/simple-url-shortener/ "Simple URL Shortener") plugin to provide URL shortening
* Added new parameter that allows overriding of passed URL
* Blog title corrected, using code from Simple Social Bookmarks plugin
* Code tidied