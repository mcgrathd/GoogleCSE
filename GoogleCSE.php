<?php
/**
 * GoogleCSE Extension
 *
 * Extension to integrate Google Custom Search Engine (CSE) into searches
 *
 * @file
 * @ingroup Extensions
 *
 * @link https://github.com/mcgrathd/GoogleCSE.git
 *
 * @author Dan McGrath <danmcgrath.ca@gmail.com>
 * @copyright © 2012 Dan McGrath
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

# Alert the user that this is not a valid entry point to MediaWiki if they try to access the special pages file directly.
if (!defined('MEDIAWIKI')) {
    echo <<<EOT
To install the GoogleCSE extension, put the following line in LocalSettings.php:
require_once( "$IP/extensions/GoogleCSE/GoogleCSE.php" );
EOT;
    exit( 1 );
}

$wgExtensionCredits['specialpage'][] = array(
    'path' => __FILE__,
    'name' => 'Google CSE',
    'author' => 'Dan McGrath',
    'email' => 'danmcgrath.ca at gmail.com',
    'url' => 'https://github.com/mcgrathd/GoogleCSE.git',
    'description' => 'Add [https://www.google.com/cse/ Google CSE] special page to replace the built in MW search',
    'version' => '0.9.0',
);

$dir = dirname(__FILE__) . '/';

# Location of the SpecialMyExtension class (Tell MediaWiki to load this file)
$wgAutoloadClasses['SpecialGoogleCSE'] = $dir . 'SpecialGoogleCSE.php';

# Location of a messages file (Tell MediaWiki to load this file)
$wgExtensionMessagesFiles['GoogleCSE'] = $dir . 'GoogleCSE.i18n.php';

# Location of an aliases file (Tell MediaWiki to load this file)
$wgExtensionMessagesFiles['GoogleCSEAlias'] = $dir . 'GoogleCSE.alias.php';

# Tell MediaWiki about the new special page and its class name
$wgSpecialPages['GoogleCSE'] = 'SpecialGoogleCSE';

?>
