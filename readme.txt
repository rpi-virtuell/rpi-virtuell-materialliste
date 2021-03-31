=== rpi virtuell Materialliste ===
Contributors:f.staude, johappel
Tags: page, list, subpages, siblings, pagelist
Requires at least: 4.0
Tested up to: 4.5.2
Stable tag: 1.0.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Adds a shortcode to list https://material.rpi-virtuell.de entrys. To create a shortcode, login on the materialpool, create a search and click on the [] icon to copy the shortcode.

== Description ==

Displays entries form the rpi-virtuell Materialpool via shortcode by using the materialpool api

Example: [materialliste  vorauswahl='handverlesen' per_page='3' maxwords='55' template='list']

You can modify the shortcode with this params:
 * maxwords="numberOfWords"   #limits the Outpud of the Materail Description to the max number of words
 * per_page="numberOfEntriesPerPage" #limits the display material entries
 * tempate="layout"  possible layouts atm: default (unformatted), list (gutenberg compatible newest posts)

== Installation ==

1. Install the plugin from within the Dashboard or upload the directory `extended-pagelist` and all its contents to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Use the plugin. Now you have some new shortcodes to use.


== Frequently Asked Questions ==

= Can i use my own templates? =

Yes

= Can i use a other named directory for my templates? =

Yes, use the filter hook 'extended_pagelist_template_folder' to change the directory

== Changelog ==
= 1.0.4
[add] params per_page, maxwords,  tempate="list"
[add] template "list"
[fix] limits per_page to 10 (default)

= 1.0.3 =
[add] Material Schlagworte

= 1.0.2 =
[add] template language

= 1.0.1 =
First public version.
