<?php

class SpecialGoogleCSE extends SpecialPage {
    function __construct() {
        parent::__construct( 'GoogleCSE' );
    }

    function execute( $par ) {
        global $wgRequest, $wgOut, $wgJsMimeType;

        // $request = $this->getRequest(); # XXX: For newer MW version?
        // $output = $this->getOutput();

        $this->setHeaders();

        # Get request data from, e.g.
        $param = $wgRequest->getText('param');

        # Output the required js script in <head>
        $wgOut->addScript( "<script type=\"$wgJsMimeType\" src=\"{$this->baseRelDir}/GoogleCSE.js\"></script>\n" );

        # Display CSE HTML tag
        $csetag = '<gcse:search></gcse:search>';
        $wgOut->addHTML( $csetag );
    }
}

?>
