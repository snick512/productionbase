<?php  


/**

Monday 8-18-24. 8.40pm.

Draft

*/


require_once('../cfip.php'); ?>
<!doctype html>
<html lang="en">
<head>

	<meta charset="utf-8">
    <meta name="description" content="Live at TyClifford.com/Live" />
    <meta name="author" content="Ty Clifford">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title>LIve TyClifford.com - Hobbies are my hobby.</title>
    




    <script type="text/javascript"  src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script>
            $(document).ready(function() { /// Wait till page is loaded
            setInterval(timingLoad, 3000);
            function timingLoad() {
            $('#status').load('content.php', function() {
            /// can add another function here
            });
            }
            }); //// End of Wait till page is loaded
    </script>



</head>

<body style="
    background-color: black;
    color: white;
    font-size: 100px;

">
	
    
    
	    
    <!-- CONTENT-WRAP -->

            
       <div id="status">Please standby for content.</div>

    <!-- CONTENT-WRAP -->

    <!-- SCRIPTS -->
	<script src="../js/main.js"></script>    
</body>
</html>