<?php 

/**

Bland configuration/functions n such 

- Configuration for URLs to be directed locally or CDN. 4.26 pm, 8-19-24

*/


// CDN on or off
$setURL = "1";
  
    if ($setURL == 1) {
      // CDN URL
      $mainURL = "https://clifford.nyc3.cdn.digitaloceanspaces.com/public/tyclifford.com";
        //echo $mainURL;
      
    } else {
      // local/server URL
      $mainURL = "https://tyclifford.com";
        //echo $mainURL;
    }


?>