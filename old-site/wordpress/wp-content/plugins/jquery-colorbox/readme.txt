=== Plugin Name ===
Contributors: techotronic  
Donate link: http://www.techotronic.de/donate/  
Tags: jquery, colorbox, lightbox, images, pictures, photos, gallery, javascript, overlay, nextgen gallery, nextgen-gallery, image, picture, photo, media, slideshow, ngg, mu  
Requires at least: 2.8  
Tested up to: 3.4
Stable tag: 4.6

Adds Colorbox/Lightbox functionality to images, grouped by post or page. Works for WordPress and NextGEN galleries. Comes with different themes.

== Description ==

A Colorbox/Lightbox plugin for Wordpress.

jQuery Colorbox features 11 themes from which you can choose. See [my website](http://www.techotronic.de/plugins/jquery-colorbox/theme-screenshots/).  
Works out-of-the-box with WordPress Galleries and [NextGEN Gallery](http://wordpress.org/extend/plugins/nextgen-gallery/)! (choose no effect in NextGEN settings)

When adding an image to a post or page, usually a thumbnail is inserted and linked to the image in original size.  
All images in posts and pages can be displayed in a Lightbox/colorbox when the thumbnail is clicked.  
Images are grouped as galleries when linked in the same post or page. Groups can be displayed in a slideshow within the Lightbox/colorbox.

Individual images can be excluded by adding a special CSS class.

jQuery Colorbox can also open linked content (external as well as inline) in a Lightbox/Colorbox.

Go to the [plugin page](http://www.techotronic.de/plugins/jquery-colorbox/) for demo pages.

For more information visit the [FAQ](http://wordpress.org/extend/plugins/jquery-colorbox/faq/).  
If you have questions or problems, feel free to write an entry at [the jQuery Colorbox WordPress.org forum](http://wordpress.org/tags/jquery-colorbox?forum_id=10)

**Localization**

* Arabic (`ar`) by [Modar Soos](http://www.photokeens.com)
* Belorussian (`be_BY`) Marcis G.
* Bosnian (`bs_BA`) by Vedran Jurincic
* Bulgarian (`bg_BG`) by [Nikolay Zaynelov](http://nikolay.zaynelov.com)
* Czech (`cs_CZ`) by David Weis
* Simplified Chinese (`zh_CN`) by [Lucas Ho](http://tech.yiandya.com/)
* Danish (`da_DK`) by Michael Bering Petersen
* Dutch (`nl_NL`) by [Richard van Laak](http://nl.linkedin.com/pub/richard-laak/b/b21/672)
* English (`en_EN`) by [Arne Franken](http://www.techotronic.de/)
* Finnish (`fi`) by [Lauri Merisaari](http://www.merisaari.com/)
* French (`fr_FR`) by [Pierre Sudarovich](http://www.monblogamoua.fr/)
* German (`de_DE`) by [Arne Franken](http://www.techotronic.de/)
* Hebrew (`he_IL`) by [Tommy Gordon](http://www.TommyGordon.co.il)
* Italian (`it_IT`) by Marco Chiesi
* Latvian (`lv`) by Uldis Jansons
* Malay (`ms_MY`) by [Saha-ini Ahmad Safian](http://www.inisahaini.com)
* Polish (`pl_PL`) by Kornel Łysikowski
* Portuguese (`pt_BR`) by [Gervásio Antônio](http://twitter.com/gervasioantonio)
* Romanian (`ro_RO`) by Luke Tyler
* Russian (`ru_RU`) by Arkadiy Florinskiy
* Slovak (`sk_SK`) by B. Radenovich
* Spanish (`es_ES`) by Inma P.-Zubizarreta
* Swedish (`sv_SE`) by [Christian](http://www.theindiaexperience.se/)
* Turkish (`tr_TR`) by [Serhat Yolaçan](http://www.serhatyolacan.com/)
* Ukrainian (`uk`) by Jurko Chervony
* Vietnamese (`vn_VN`) by Techfacts

Is your native language missing?  
Translating the plugin is easy if you understand english and are fluent in another language.  
I described in the [FAQ](http://wordpress.org/extend/plugins/jquery-colorbox/faq/) how the translation works.

**Credits**  
Includes [ColorBox](http://jacklmoore.com/colorbox/) 1.3.20.1 jQuery plugin from Jack Moore.
The picture I used for the screenshots was designed by [Davide Vicariotto](http://wallpapers.vintage.it/)

== Installation ==

###Upgrading From A Previous Version###

To upgrade from a previous version of this plugin, use the built in update feature of WordPress or copy the files on top of the current installation.

###Installing The Plugin###

Either use the built in plugin installation feature of WordPress, or extract all files from the ZIP file, making sure to keep the file structure intact, and then upload it to `/wp-content/plugins/`.  
Then just visit your admin area and activate the plugin.  
That's it!

###Configuring The Plugin###

Go to the settings page and choose one of the themes bundled with the plugin and other settings.  
Do not forget to activate auto Colorbox if you want the Lightbox/Colorbox to work for all images.

**See Also:** ["Installing Plugins" article on the WP Codex](http://codex.wordpress.org/Managing_Plugins#Installing_Plugins)

== Screenshots ==

[Please visit my site for screenshots](http://www.techotronic.de/plugins/jquery-colorbox/theme-screenshots/).

== Frequently Asked Questions ==
* I installed your plugin, but when I click on a thumbnail, the original picture is loaded directly instead of in the Colorbox. What could be the problem?  
  Make sure that your theme uses the `wp_head();` function in the HTML head-tag.  
  I have seen problems where other plugins include their own versions of the jQuery library my plugin uses.  
  Chances are that the other jQuery library is loaded after the one that I load. If that happens, the colorbox features are overwritten.

* How does jQuery Colorbox work?  
  When inserting a picture, the field "Link URL" needs to contain the link to the full-sized image. (press the button "Link to Image" below the field)  
  When rendering the blog, a special CSS class (`colorbox-postId`, e.g. `colorbox-123`) is added to linked images.  
  This CSS class is then passed to the colorbox JavaScript.

* How do I exclude an image from Colorbox in a page or post?  
  Add the CSS class `colorbox-off` to the image or to the link to the big sized image you want to exclude.  
  jQuery Colorbox does not add the colorbox effect to images that have the CSS class `colorbox-off`.

* How does jQuery Colorbox group images?  
  For all images in a post or page, the same CSS class is added. All images with the same CSS class are grouped.

* I have Flash (e.g. Youtube videos) embedded on my website. Why do they show up over the layer when I click on an image?  
  This is a Flash issue, but relatively easy to solve. Just activate the automatic hiding of embedded flash objects on the settings page.  
  Adobe described on these sites what the problem is and how to fix it manually:  
  [Adobe Knowledgebase 1](http://kb2.adobe.com/cps/155/tn_15523.html)  
  [Adobe Knowledgebase 2](http://kb2.adobe.com/cps/142/tn_14201.html)

* I have a problem with the Colorbox or want to style it my own way. Can you help?  
  Of course I want to help everyone, but I have a full time job and I don't have the time. You can ask your questions at the [Colorbox Google group](http://groups.google.com/group/colorbox/topics").

* Why is jQuery Colorbox not available in my language?  
  I speak German and English fluently, but unfortunately no other language well enough to do a translation.  
  Would you like to help? Translating the plugin is easy if you understand English and are fluent in another language.

* How do I translate jQuery Colorbox?  
  Take a look at the WordPress site and identify [your language code](http://codex.wordpress.org/WordPress_in_Your_Language):  
  e.g. the language code for German is `de_DE`.

  1. download [POEdit](http://www.poedit.net/)
  2. download jQuery Colorbox (from your FTP server or from [WordPress.org](http://wordpress.org/extend/plugins/jquery-colorbox/))
  3. copy the file `localization/jquery-colorbox-en_EN.po` and rename it. (in this case `jquery-colorbox-de_DE.po`)
  4. open the file with POEdit.
  5. translate all strings. Things like `{total}` or `%1$s` mean that a value will be inserted later.
  6. The string that says "English translation by Arne ...", this is where you put your name, website (or email) and your language in. ;-)
  7. (optional) Go to POEdit -> Catalog -> Settings and enter your name, email, language code etc
  8. Save the file. Now you will see two files, `jquery-colorbox-de_DE.po` and `jquery-colorbox-de_DE.mo`.
  9. Upload your files to your FTP server into the jQuery Colorbox directory (usually `/wp-content/plugins/jquery-colorbox/`)
  10. When you are sure that all translations are working correctly, send the po-file to me and I will put it into the next jQuery Colorbox version.


* My question isn't answered here. What do I do now?  
  Feel free to open a thread at [the jQuery Colorbox WordPress.org forum](http://wordpress.org/tags/jquery-colorbox?forum_id=10).  
  I'll include new FAQs in newer versions.

== Changelog ==
### 4.6 (2012-01-21) ###
* NEW: Czech translation by David Weis
* CHANGE: Update of the Slovak translation by B. Radenovich
* CHANGE: update Colorbox version to 1.3.21
* CHANGE: update jQuery version to 1.9.0 (if selected on settings page)

### 4.5 (2012-11-03) ###
* NEW: Bulgarian translation by Nikolay Zaynelov
* BUGFIX: Zoom overlay does not break floating images any more
* BUGFIX: add CSS class to WP galleries if "add to all" is selected and the gallery is outside of the text area of a post and page
* CHANGE: update Colorbox version to 1.3.20.1
* CHANGE: update jQuery version to 1.8.2 (if selected on settings page)

### 4.4.1 (2012-07-19) ###
* BUGFIX: using colorbox-link works again

### 4.4 (2012-07-16) ###
* NEW: A Zoom overlay can be added to images automatically
* NEW: Added option to load all JavaScript in the footer
* NEW: Added option to use jQuery library from Google instead of the one that comes with WordPress
* CHANGE: successfully tested with WordPress 3.4
* CHANGE: links can now be grouped by adding CSS class "colorbox-link-NUMBER"
* CHANGE: Marco Chiesi updated the italian translation
* CHANGE: switch declaration of 'NAME' and 'TEXTDOMAIN'

### 4.3 (2012-03-12) ###
* NEW: Romanian translation by Luke Tyler
* CHANGE: Ukrainian translation updated by Jurko Chervony
* CHANGE: update to Colorbox 1.3.19
* CHANGE: gracefully add CSS style `colorbox-link` to TinyMCE style dropdown
* CHANGE: use `plugins_url` to make links HTTPS aware
* CHANGE: increase z-index of Colorbox and overlay to 99999 since Twentyeleven has a Header z-index of 9999
* CHANGE: removing meta tag from header since it's not HTML5 compatible
* CHANGE: pulled all links to company sites of translators on request by WordPress staff
* CHANGE: successfully tested with WordPress 3.3
* CHANGE: Plugin name now translatable
* CHANGE: Defaults are now used if JavaScript options can't be set because of JavaScript minimizers

### 4.2 (2011-10-16) ###
* NEW: Danish translation by Michael Bering Petersen
* NEW: Vietnamese translation by Techfacts
* NEW: added option to remove the link to the developers site from the WordPress meta-box.
* BUGFIX: "Automate Colorbox for all other images" now again works as intended. (functionality broke in 4.1)
* BUGFIX: fixes "Undefined index: colorboxAddClassToLinks" error
* BUGFIX: got rid of PHP's XML-RPC methods, also plugin checks now before calling XML-related methods.
* CHANGE: Updated Colorbox version to 1.3.18

### 4.1 (2011-06-25) ###
* NEW: Plugin is compatible to WordPress 3.2
* NEW: Polish translation by Kornel Łysikowski
* NEW: Finnish translation by Lauri Merisaari
* NEW: Simplified Chinese translation by Lucas Ho
* BUGFIX: Plugin will only select links with class `colorbox-link`, no other HTML tags.
* BUGFIX: JavaScript will work with jQuery 1.6 now
* BUGFIX: loading inline content does not trigger loading an iframe any more.
* BUGFIX: regex for IMG tag works correctly now.
* CHANGE: Update of Colorbox library to version 1.3.17.1
* CHANGE: JavaScript now ignores links that do not have the optional "href" attribute.
* CHANGE: Links from images to non-images are now opened in a Colorbox.
* CHANGE: Moved bulk of JavaScript from inline to file, consolidated files
* CHANGE: Additional option for adding colorbox class to images outside of posts and pages.
* CHANGE: Major refactoring, hopefully speeds up frontend and backend rendering
* CHANGE: Render Meta-Tag with plugin version into blog header instead of comments
* CHANGE: French translation updated by Pierre Sudarovich

### 4.0 (2011-04-16) ###
* CHANGE: Restructured settings page
* CHANGE: Plugin again compatible to PHP4.
* CHANGE: Update of Colorbox library to version 1.3.16
* CHANGE: jQuery calls won't break other JavaScript libraries like Prototype or Scriptaculous any more
* NEW: Set width and height for Colorbox links once separate from the Colorbox setting for images
* NEW: Inline HTML content can now be loaded in the Colorbox.
* NEW: Latvian translation by Uldis Jansons
* CHANGE: Modar Soos updated the Arabic translation
* CHANGE: Joao Netto updated the Portuguese translation
* CHANGE: Arkadiy Florinskiy updated the Russian translation
* CHANGE: Made plugin compatible to the "smugmug" plugin.
* CHANGE: Moved Colorbox CSS class add to style dropdown of TinyMCE

### 3.8.3 (2010-12-24) ###
* NEW: Spanish translation by Inma P.-Zubizarreta
* BUGFIX: re-added the option to hide flash objects behind the colorbox overlay.

### 3.8.2 (2010-12-21) ###
* BUGFIX: Last bugfix broke minor functionality.

### 3.8.1 (2010-12-21) ###
* BUGFIX: Last bugfix broke the plugin, settings are now correctly read again.

### 3.8 (2010-12-21) ###
* BUGFIX: Theme change is now saved again.

### 3.7 (2010-12-21) ###
* NEW: Experimental feature: jQuery Colorbox can now open external websites/pictures if the link has the class "colorbox-link" and a width/height for the colorbox is set.
* BUGFIX: Plugin now works if `WP_DEBUG` is set to "true". Thx to Roy Iversen for the bug report!
* CHANGE: rewrote auto-add JavaScript. Thx to jrevillini for the help!
* NEW: Slovak translation by Stefan Stieranka
* NEW: Swedish translation by Christian
* CHANGE: Update of Colorbox library to version 1.3.15
* CHANGE: performance improvement: colorbox-class is only automatically added only to images that do not already have a colorbox-class.

### 3.6 (2010-09-12) ###
* CHANGE: Update of Colorbox library to version 1.3.9 which fixes lots of bugs. Most notably the "0 by 0" bug in Chrome.

### 3.5 (2010-06-16) ###
* NEW: Ukrainian translation by Yuri Kryzhanivskyi
* NEW: Italian translation by Erkinson
* NEW: Hebrew translation by Tommy Gordon
* BUGFIX: URLs are now generated correctly for WP-MU installations
* NEW: Added latest donations and top donations to settings page

### 3.4 (2010-05-24) ###
* NEW: Colorbox is not applied to image links that have the class `colorbox-off` any more. Useful for NextGEN users.
* NEW: Dutch translation by Richard van Laak
* NEW: Malay translation by Saha-ini Ahmad Safian
* CHANGE: Added CSS id "colorboxLink" to link in Meta container.
* CHANGE: Modar Soos updated the Arabic translation

### 3.3 (2010-05-05) ###
* NEW: Belorussian translation by Marcis G.
* NEW: Russian translation by Arkadiy Florinskiy
* BUGFIX: Screenshot for Theme#10 is now displayed correctly.
* NEW: Added Theme#11, a modified version of Theme#1.
* BUGFIX: Theme#7,9 and 11 will work in Internet Explorer 6 now.
* CHANGE: Minified CSS and JavaScript
* NEW: registered link to plugin page in WordPress Meta widget

### 3.2 (2010-04-20) ###
* NEW: Added theme#10, thx to Serhat Yolaçan for all the hard work! (CSS3 rounded edges, IE does not support that)
* CHANGE: jQuery Colorbox plugin now adds necessary CSS class to all embedded images.
* CHANGE: jQuery Colorbox plugin is now compatible to NextGEN Gallery
* CHANGE: Vedran Jurincic updated the bosnian translation
* NEW: Arabic translation by Modar Soos

### 3.1 (2010-04-10) ###
* BUGFIX: Automatic hiding of embedded flash objects under Colorbox layer now works in Internet Explorer.
* NEW: Added theme#9, a modified version of theme#4.
* NEW: French translation by Tolingo Translations
* NEW: If auto colorbox is switched on, plugin now adds Colorbox functionality to every image regardless of position
* CHANGE: Serhat Yolaçan updated the turkish translation.

### 3.0.1 (2010-03-31) ###
* BUGFIX: Settings are NOW REALLY not overridden any more every time the plugin gets activated.

### 3.0 (2010-03-31) ###
* NEW: Decided to move from 2.0.1 to 3.0 because I implemented many new features
* BUGFIX: Slideshow speed setting works now.
* BUGFIX: Settings are not overridden any more every time the plugin gets activated.
* BUGFIX: jQuery Colorbox now works again for links with uppercase suffixes (IMG,JPG etc) thx to Jason Stapels for the bug report and fix!
* NEW: Added theme#6, a modified version of theme#1. (not compatible with IE6) thx to Gervásio Antônio for all the hard work!
* NEW: Added theme#7, a modified version of theme#1. thx to Vedran Jurincic for the feature request!
* NEW: Added theme#8, a modified version of theme#6.
* NEW: Added screenshots of all themes, screenshot of selected theme is shown in admin menu
* NEW: Added warning if the plugin is activated but not set to work for all images on the blog. Warning can be turned off on the settings page.
* NEW: Added setting for automatic hiding of embedded flash objects under Colorbox layer. Default: false
* NEW: Added switch for preloading of "previous" and "next" images. Default: false
* NEW: Added switch for closing of Colorbox on click on opacity layer. Default: false
* NEW: Added setting for transition type. Default: elastic
* NEW: Added setting for transition speed. Default: 250 milliseconds
* NEW: Added setting for overlay opacity. Default: 0.85
* CHANGE: Fixed fonts in Colorbox to Arial 12px
* NEW: Turkish translation by Serhat Yolaçan
* NEW: Portuguese translation by Gervásio Antônio
* NEW: Bosnian translation by Vedran Jurincic
* NEW: Plugin should be WPMU compatible now. Haven't tested myself, though. Would appreciate any feedback.
* NEW: Successfully tested jQuery Colorbox with jQuery 1.4.2
* CHANGE: Fixed "slideshow" offset from right hand side in the Colorbox of theme#4

### 2.0.1 (2010-02-11) ###
* BUGFIX: slideshow does not start automatically any more if the setting is not checked on the settings page.

### 2.0 (2010-02-11) ###
* NEW: Decided to move from 1.3.3 to 2.0 because I implemented many new features.
* BUGFIX: fixed relative paths for theme1 and theme4 by adding the CSS for the Internet Explorer workaround directly into the page. Thx to Andrew Radke for the suggestion!
* NEW: switch adding of `colorbox-postId` classes to images in posts and pages on and off through setting. Default: off.
* NEW: now works for images outside of posts (e.g. sidebar or header) if CSS class `colorbox-manual` is added manually
* NEW: jQuery Colorbox now working for WordPress attachment pages
* NEW: Added switch that adds slideshow functionality to all Colorbox groups. (no way to add slideshows individually yet)
* NEW: Added switch that adds automatic start to slideshows (no way to add slideshows individually yet)
* NEW: Added configuration of slideshow speed
* NEW: Added switch that allows the user to decide whether Colorbox scales images
* NEW: Added demos of the plugin on the [plugin page](http://www.techotronic.de/plugins/jquery-colorbox/)
* NEW: Added configuration for adding colorbox class only to WordPress galleries
* NEW: Automatically resets settings if settings of a version prior to 1.4 are found upon activation
* NEW: width and height can now be configured as percent relative to browser window size or in pixels (default is percent)
* CHANGE: jQuery Colorbox is now only working on Image links (of type jpeg, jpg, gif, png, bmp)
* CHANGE: Improved translation. Thx to Fabian Wolf for the help!
* CHANGE: updated the FAQ
* CHANGE: Updated readme.
* CHANGE: Updated descriptions and translations

### 1.3.3 (2010-01-21) ###
* BUGFIX: fixed settings page, options can be saved now
* NEW: added settings deletion on uninstall and "delete settings from database" functionality to settings page
* CHANGE: moved adding of CSS class priority lower, hopefully now the CSS class is added to pictures after other plugins update the HTML
* CHANGE: updated the FAQ

### 1.3.2 (2010-01-19) ###
* CHANGE: moved back to regexp replacement and implemented a workaround in the JavaScript to still allow images to be excluded by adding the class `colorbox-off`

### 1.3.1 (2010-01-18) ###
* CHANGE: changed include calls for Colorbox JavaScript and CSS to version 1.3.6
* CHANGE: optimized modification of `the_content`

### 1.3 ###
* NEW: jQuery-Colorbox won't add Colorbox functionality to images that have the CSS class `colorbox-off`
* CHANGE: Updated Colorbox version to 1.3.6
* CHANGE: should be compatible to jQuery 1.4, still using 1.3.2 at the moment because it is bundled in WordPress 2.9.1
* CHANGE: changed the way that the Colorbox CSS class is added to images to be more reliable
* CHANGE: changed layout of settings page
* CHANGE: updated the FAQ

### 1.2 ###
* BUGFIX: fixes bug where colorbox was not working if linked images were used (by the theme) outside of blog posts and pages.
* NEW: adds configuration for Colorbox and picture resizing

### 1.1 ###
* BUGFIX: fixes critical bug which would break rendering the blog. Sorry, was not aware that the plugin would be listed before I tagged the files as 1.0 in subversion...

### 1.0 ###
* NEW: Initial release.
* NEW: Added Colorbox version 1.3.5
