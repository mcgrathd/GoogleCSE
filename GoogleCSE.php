<?php
# Alert the user that this is not a valid entry point to MediaWiki if they try to access the special pages file directly.
if (!defined('MEDIAWIKI')) {
    echo <<<EOT
To install the GoogleCSE extension, put the following line in LocalSettings.php:
require_once( "$IP/extensions/GoogleCSE/GoogleCSE.php" );
EOT;
    exit( 1 );
}
?>
