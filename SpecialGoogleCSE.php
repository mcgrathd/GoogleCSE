<?php

class SpecialGoogleCSE extends SpecialPage {
    function __construct() {
        parent::__construct( 'GoogleCSE' );
    }

    function execute( $par ) {
        global $wgRequest, $wgOut, $wgJsMimeType, $wgScriptPath;

        // $request = $this->getRequest(); # XXX: For newer MW version?
        // $output = $this->getOutput();

        $this->setHeaders();

        # Get request data from, e.g.
        $param = $wgRequest->getText('param');

        # Output the required js script in <head>
        # XXX: Hardcode the path for now since 1.17 and up use ResourceLoader
        $wgGoogleCSEJS = $wgScriptPath . "/extensions/GoogleCSE/GoogleCSE.js";
        $wgOut->addScript( "<script type=\"$wgJsMimeType\" src=\"{$wgGoogleCSEJS}\"></script>\n" );

        # Display CSE HTML tag
        $csetag = '<gcse:search></gcse:search>';
        $wgOut->addHTML( $csetag );
    }
}

?>
