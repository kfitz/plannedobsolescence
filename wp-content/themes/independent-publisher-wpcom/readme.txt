=== Independent Publisher ===

Author: Raam Dev
Tags: green, white, light, responsive-layout, one-column, two-columns, left-sidebar, accessibility-ready, custom-background, custom-colors, custom-header, custom-menu, editor-style, featured-image-header, featured-images, flexible-header, post-formats, sticky-post, theme-options, threaded-comments, translation-ready

Requires at least: 4.1
Tested up to: 4.3
License: GNU General Public License v3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html

== Description ==

Independent Publisher is a beautiful reader-focused theme with a clean and responsive layout, ideal for personal bloggers. It has great readability with a large font, and also provides full width post cover images, which are perfect to showcase your content.

* Responsive layout
* Custom Background
* Custom Header
* Custom Menu
* Editor Style
* Featured Images
* Flexible Header
* RTL language support
* Sticky Posts
* Accessibility Ready
* Translation Ready
* Social Links
* Jetpack compatibility for Infinite Scroll and Responsive Videos.
* The GPL v3.0 or later license. :) Use it to make something cool.

== Installation ==

1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.

== Changelog ==

= 1 August 2016 =
* Update theme version and readme file.
* Update author credit URL.

= 14 June 2016 =
* Give lists a bit of left margin so they're indented.

= 12 May 2016 =
* Add check for is_front_page when using header-cover-image before outputting home icon - it's not needed if you're already on the front page.

= 5 May 2016 =
* Move annotations into the `inc` directory.

= 4 May 2016 =
* Move existing annotations into their respective theme directories.

= 4 April 2016 =
* Add some context for the Gravatar theme option;
* Explain what a "Post Cover Image" is.

= 4 February 2016 =
* Adding author-bio tag, to keep things in sync with the Showcase.

= 18 November 2015 =
* Add option to disable gravatar. Closes #3521

= 2 November 2015 =
* Remove second title & featured image if 'cover image' is present.

= 29 October 2015 =
* proper escaping for attribute text.

= 27 August 2015 =
* Remove unnecessary #wpstats code from main stylesheet
* Add wpcom-specific styles; Hide #wpstats smiley from footer

= 21 August 2015 =
* Remove shims marked for removal on 4.3 release
* Update requirement version information on readme.txt
* Remove 4.1 legacy code
* Update readme.txt to add original theme author and correct license info
* Use original theme's site as theme URI on style.css

= 13 August 2015 =
* Improve compatibility with .org installs using php < 5.5.
* Update release date and license info on readme.txt

= 12 August 2015 =
* Fix horizontal overflow issue with slideout menu
* Do not add .has-sidebar class on 404 page
* Update author information on style.css
* Minor gallery styles fix for IE

= 11 August 2015 =
* Fix slideout menu styles in Customizer
* Remove left margin from blockquotes
* Prevent text on calendar days from wrapping when using large fonts
* Add social icons widget styles, matching social menu icons

= 7 August 2015 =
* Prevent click event from slide menu from propagating
* Add active menu styles to page menu items

= 6 August 2015 =
* Update comment and permissions for inc/script-wpcom.js
* Changed javascript comment
* Add JavaScript code specifically for WordPress.com
* Add opacity easing into social links hover style

= 5 August 2015 =
* Refactor menu toggle styles

= 4 August 2015 =
* Make widget titles bold
* Remove duplicate font-size declaration
* Add font fallbacks for recent entries widget

= 31 July 2015 =
* Remove .`screen-reader-text:hover` and `.screen-reader-text:active` style rules.

= 16 July 2015 =
* Always use https when loading Google Fonts. See #3221;

= 6 July 2015 =
* Update screenshot.png to match live demo

= 5 July 2015 =
* Refactor site logo link avatar images to disable gravatar hovercards
* Prevent Gravatar from being disabled globally
* Ensure gravatar is disabled for site logo link on hero header

= 3 July 2015 =
* Increase bottom margin of widget titles
* Add styles for authors, recent posts and recent comment widgets
* Improve readability of image captions
* Add image caption styles on editor
* Remove background from code,var,kbd, and tt elements when inside pre elements
* Readability improvements
* Adjust vertical alignment of link and video format icons
* Show post title on link post formats
* Clear sticky label float when post has no featured image
* Adjust post cover meta styles to remove unnecessary padding
* Ensure footer is properly centered when header/cover image is set and there are no widgets to render
* Adjustments for cite elements inside blockquotes, and quote post format
* Remove extra margins from sharedaddy container
* Ensure content is properly displayed when header image set and sidebar is empty
* Update gallery styles and fix columns in editor
* Increase specificity of margin resets
* Adjust margin of tiled galleries
* Ensure content is properly displayed when no sidebar widgets present
* Increase bottom margin of post image link when post has no content
* Remove .entry-content margin when post has no content
* Do not show word count if post has no content
* Increase separation of featured image in posts
* Decrease post title's separation from content
* Add missing left border to dropdown menus
* Fix focus/active border color in comments, remove border radius from #respond on WP.com

= 25 June 2015 =
* Remove unnecessary selector from rtl.css
* Remove unwanted margin from post thumbnail image
* Fix slide menu visual hierarchy, first submenus did not have separation
* Replace spaces with tabs in rtl.css
* PHP code cleanup

= 24 June 2015 =
* Wrap long lines inside the post cover image title
* Refactor to remove duplicate function
* Update readme.txt
* Refactor post thumbnail styles to allow resizing on Internet Explorer
* Checkbox and radio input style adjustments
* Use sans-serif font for Jetpack Related Posts title
* Remove top padding of #respond when highlander enabled
* RTL style
* Remove non essential !important declarations from styles
* Remove unused code from js/customizer.js
* Update theme description in style.css
* Increase sidebar size, adjust responsive breakpoints.
* Improvements to .site-branding customizer bindings
* Font size improvements for small resolutions and devices
* Remove unnecessary margin from mobile navigation
* Add better styles for sticky posts
* Remove additional padding of #respond when no comments are present
* Properly align next link on calendar widget
* Add hierarchy styles to pages widget
* Reduce size and enhance style of .page-header
* Fix avatar alignment on post author card
* Hide site footer and posts navigation when infinite scroll enabled
* Remove unnecessary properties from rtl.css
* Add styles to infinite scroller load posts button

= 23 June 2015 =
* Add active styles to slide menu
* Remove invalid background properties from rtl.css
* Add active styles to dropdown menus
* Hide site branding when custom header background is set
* Use admin email as default when getting gravatar email theme mod.
* Remove extra margin added by empty geo post elements
* Minor typography adjustments.
* Add support for dropdown menus
* Display post format archive links in posts
* Fix avatar size in status format posts
* Better hover/focus/active contrast for post navigation and submit buttons
* Update footer to use original author's name/credit
* Remove the template-parts/footer-slide-menu.php template.

= 22 June 2015 =
* Remove independent_publisher_link_pages() function in inc/template-tags.php
* Escape translation functions
* Fix default value of post cover image theme option
* Replace Jetpack Site Logo in favor of Gravatar
* Remove unnecessary functions in inc/template-tags.php
* Theme Options Refactor.
* Remove template-parts/header-site-branding.php template.
* Move site branding display logic into its own function.
* Use underscores for @package declarations

= 18 June 2015 =
* Add comment reply form styles specific to WordPress.com

= 17 June 2015 =
* Center menu toggle close icon when slide menu is visible
* Prevent social navigation from hiding when hiding header text in customizer
* Fix closing comment on template-parts/footer-slide-menu.php
* Update screenshot to reflect changes in typography
* Increase size of .site-title
* Coding style and white space cleanup
* Use PT Sans for headings and titles.
* Cleanup RTL styles
* Remove hover underline from social icons on IE9
* Fix text input line height on IE9
* Remove native input styling from mobile webkit browsers
* Add outline to primary navigation links on active and focus states
* Remove background and border form aside posts.
* Remove separator from cancel comment reply link
* Flickr widget and recent comments widget style improvements

= 16 June 2015 =
* Increase comment reply heading top margin
* Fix post title wrapping issue in post cover image
* Disable Gravatar Hovercards on the site logo.
* Restructure Content and Layout sections in style.css
* Do not use .site-logo-link inside post author card
* Remove unused CSS code
* Fix display of author card on single posts
* JavaScript formatting
* Fix RSS icon not being properly assigned for WordPress.com sites
* Add features list to readme.txt
* Add translations to POT file
* Move from dev/ to pub/

== Credits ==

* [Genericons](http://genericons.com) Font by Automattic (http://automattic.com/), licensed under [GPL2](https://www.gnu.org/licenses/gpl-2.0.html).
* [normalize.css](http://necolas.github.io/normalize.css), (C) 2012-2015 Nicolas Gallagher and Jonathan Neal, [MIT](http://opensource.org/licenses/MIT)
* Based on [Underscores](http://underscores.me), (C) 2012-2015 Automattic, Inc., [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html)
