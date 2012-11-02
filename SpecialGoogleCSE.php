<?php

class SpecialGoogleCSE extends SpecialPage {
    function __construct() {
        parent::__construct( 'GoogleCSE' );
    }

    function execute( $par ) {
        global $wgRequest, $wgOut, $wgGoogleCSEcx;


        // $request = $this->getRequest(); # XXX: For newer MW version?
        // $output = $this->getOutput();

        $this->setHeaders();

        # Get request data from, e.g.
        $param = $wgRequest->getText('param');

        # Check to make sure wgGoogleCSEcx is set, otherwise display error and return
        if ( !isset($wgGoogleCSEcx) ) {
            $wgOut->addWikiText( 'Error: $wgGoogleCSEcx is not set!' );
            $wgOut->addWikiText( 'Please set this variable to your Google CSE cx ID in your LocalSettings.php' );

            return;
        }    

        # Output the required js script in <head>
        $wgGoogleCSEjs = <<<EOT
        <!-- GoogleCSE -->
        <script>
        (function() {
          var cx = '$wgGoogleCSEcx';
          var gcse = document.createElement('script'); gcse.type = 'text/javascript'; gcse.async = true;
          gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
              '//www.google.com/cse/cse.js?cx=' + cx;
          var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(gcse, s);
        })();
        </script>

EOT;

        $wgOut->addScript( $wgGoogleCSEjs );

        # Set title
        $wgOut->setPageTitle("Google Custom Search Engine");

        # Display CSE HTML tag
        $csetag = '<gcse:search></gcse:search>';
        $wgOut->addHTML( $csetag );
    }
}

?>
