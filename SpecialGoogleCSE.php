<?php

class SpecialGoogleCSE extends SpecialPage {
    function __construct() {
        parent::__construct( 'GoogleCSE' );
    }

    function execute( $par ) {
        global $wgRequest, $wgOut, $wgJsMimeType, $wgGoogleCSEcx;

        // $request = $this->getRequest(); # XXX: For newer MW version?
        // $output = $this->getOutput();

        $this->setHeaders();

        # Get request data from, e.g.
        $param = $wgRequest->getText('param');

        # Output the required js script in <head>
        $wgGoogleCSEJS = <<<EOT
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

        $wgOut->addScript( $wgGoogleCSEJS );

        # Set title
        $wgOut->setPageTitle("Google Custom Search Engine");

        # Display CSE HTML tag
        $csetag = '<gcse:search></gcse:search>';
        $wgOut->addHTML( $csetag );
    }
}

?>
