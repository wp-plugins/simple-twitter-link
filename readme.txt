=== Simple Twitter Link ===
Contributors: dartiss
Donate link: http://tinyurl.com/bdc4uu
Tags: Twitter
Requires at least: 2.0.0
Tested up to: 2.7.1
Stable tag: 1.1

Simple Twitter Link displays a link allowing Twitter users to update their status with a link back to your post or page.

== Description ==

The code for Simple Twitter Link should be added to the bottom of appropriate post/page templates within your theme (and in the case of posts, within the loop).

Simple Twitter Link simply returns a URL - this URL is a link to Twitter with your post/page URL within it. It even uses TinyURL to make the link passed to Twitter even more convenient.

Ok, this may not be making sense yet, so here's an example.

`<a href="<?php simple_twitter_link(''); ?>">Send to Twitter</a>`

This will display the text "Send to Twitter" on your page/post. However, when clicked on it will take you to your Twitter account and pre-fill in the status with "I'm currently reading xxx", where xxx will be a TinyURL address of the page/post that you just came from.

I hope that makes more sense.

In the case of this example, no parameters were passed and, hence, a default sentence was passed to Twitter. If, however, you'd like to define your own Twitter text, then you simply pass this as the only parameter. `%url%` must be specified within the sentence, as this tells Simple Twitter Link where you want the TinyURL address to go.

So, another example...

`<a href="<?php simple_twitter_link('%url% is an excellent read'); ?>">Send to Twitter</a>`

In this case the line "xxx is an excellent read" (again, where xxx is the TinyURL address of your page/post) will be passed to Twitter.

If you don't pass a parameter or miss out the %url% tag the default text will be used.

The following is an example of how it could be used, with a `function_exists` check so that it doesn't cause problems if the plugin is not active...

`<?php if (function_exists('simple_twitter_link')) : ?>`
`<a href="<?php simple_twitter_link(''); ?>">Send to Twitter</a>`
`<?php endif; ?>`

From version 1.1 you can also use an addition tag, `%title%`, which will show the post/page title in the Twitter text.

== Installation ==

1. Upload the entire simple-twitter-link folder to your wp-content/plugins/ directory.
2. Activate the plugin through the ‘Plugins’ menu in WordPress.
3. There is no options screen - configuration is done in your code.

== Frequently Asked Questions ==

= What has changed in version 1.1? =

There is an additional template tag, `%title%`, which will show the post/page title in the Twitter text.

= How can I get help or request possible changes =

Feel free to report any problems, or suggestions for enhancements, to me either via my contact form or by the plugins homepage at http://www.artiss.co.uk/simple-twitter-link