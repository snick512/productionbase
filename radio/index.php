<?php require_once('../cfip.php'); ?>
<!doctype html>
<html lang="en">
<head>

	<meta charset="utf-8">
    <meta name="description" content="New, old, remixes, covers & a little talk. Ty's List!" />
    <meta name="author" content="Ty Clifford">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <meta name="keywords" content="Ty Clifford, Podcast, Spotify podcast, Keyser, West Virginia, United States, Nerd, Ty on TikTok, Ty's web space, Freedom of Expression">
    <meta property="og:url" content="https://tyclifford.com/radio/" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Ty Clifford - Radio - Hobbies are my hobby." />
    <meta property="og:title" content="Stream Ty's List on TyClifford.com/Radio" />
    <meta property="og:image" content="<?php echo $mainURL; ?>/images/radio-tl2.png" />
    <meta property="og:image:alt" content="Ty's List Promotion banner. Streamn at 6 PM Eastern" />
    <meta name="twitter:site" content="@_tyclifford" />
    <meta name="twitter:title" content="Stream Ty's List Friday at 6 pm!" />
    <meta name="twitter:description" content="Ty's List. New, old, remixes and covers!" />

    <title>Stream Ty's List radio show - Hobbies are my hobby.</title>
    
    <!-- FAV and TOUCH ICONS -->
    <link rel="shortcut icon" href="<?php echo $mainURL; ?>/images/ico/fa-bl.ico">
    <link rel="apple-touch-icon" href="<?php echo $mainURL; ?>/images/ico/fa-bl.jpg"/>
    
    <!-- FONTS -->
    <link rel="stylesheet" type="text/css" href="<?php echo $mainURL; ?>/css/fonts/hk-grotesk/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $mainURL; ?>/css/fonts/fontello/css/fontello.css">
    
    <!-- STYLES -->
    <link rel="stylesheet" type="text/css" href="<?php echo $mainURL; ?>/css/main.css">

    <!-- VIDEOJS --> 
    <link href="<?php echo $mainURL; ?>/css/video-js.css" rel="stylesheet" />




</head>

<body class="is-text-align-center is-masked-dark is-text-light" style="background-color: black;">
	

	    
    <!-- CONTENT-WRAP -->
    <div class="content-wrap">
    	
               <!-- CONTENT -->
        <div class="content">
            <h1>Ty's List</h1>
            
                <img src="<?php echo $mainURL; ?>/images/radio-tl2.png" alt="Ty's List Promotion banner. Streamn at 6 PM Eastern">
                <br />
                <p>!</p>
                <video 
                id="my-video"
                class="video-js"
                controls preload="auto"
                 width="640"
                 height="264" 
                 poster="<?php echo $mainURL; ?>/disney/disney.png"
                  data-setup="{}">
                    <source src="<?php echo $mainURL; ?>/disney/disney.mp4" type="video/mp4" />
                    <p class="vjs-no-js">JavaScript be required here! </p>
  </video>

                <BR />
                
                <span class="pink text">Drop a message</span>, <span class="tango text">1-304-512-0659</span><br />
                Line open during show! Call in! (6p-10p)
                <br />

                <iframe width="450" height="316" frameborder="0" src="https://live365.com/embed/player.html?station=a75958&amp;s=md&amp;m=dark"></iframe><br />
                    
                    <p>Listen to other on-air personalites on Rizz <a href="../images/rizz_schedule.jpg">🔎</a></p>
                    
                       <hr />
    
    <h2>Wanna spread the word?</h2>
                    <p>Sharing this page not only helps create links, but let's others know about the nerdiness. If you enjoy my content, consider telling the Internet!</p>
                                       
        
                    <span class="highlight tango">Share via</span><p><a class="link-2 purple" target="blank" href="https://www.facebook.com/sharer.php?u=https%3A%2F%2Ftyclifford.com%2Fradio%2F">Facebook</a>, <a class="link-2 tango" target="_blank" href="https://twitter.com/intent/tweet?url=https://tyclifford.com/radio/">Twitter</a></p>

                        <h2>Wanna be on air?</h2>
                        <p>Click <i>be a guest</i> to schedule a time to be on one of Ty's shows. Everyday people and more. <br />Create an experience.<br />🤙304-512-0659</p>
                <p><a class="button comment soft-rounded" href="" onclick="Calendly.initPopupWidget({url: 'https://calendly.com/tyclifford/list'});return false;">📅 Be a Guest</a></p>
                <p>Calendar: <a href="https://go.tyclifford.com/schedule" target="_blank">https://go.tyclifford.com/schedule</a></p>
                <br />
        
                <span class="highlight aqua">Tip Jar</span><br /><p>Become a supporter or tip via PayPal</p><a class="button tango soft-rounded" target="_blank" href="https://go.tyclifford.com/coffee">Become a supporter</a> <a class="button aqua soft-rounded" target="_blank" href="https://go.tyclifford.com/gfCk1">Donate via PayPal</a>
                    <br /><br />
        
                    <span class="highlight blue">Surveys</span><br />
                
                    <p>Mineral/Hampshire county cellular service not good? <a class="link-1 yellow" target="_blank" href="https://zos7xv7ngeq.typeform.com/to/Oz953OjT">Click here</a>,
                <br />Quality control, <a class="link-1 yellow" target="_blank" href="https://forms.office.com/r/JA5uaFaduA">Submit report</a>.</p>
                
        
            <hr />
            <p class="is-social-minimal-light"><a class="social-link github" href="https://github.com/snick512/tyclifforddotcomland"></a> <a class="social-link email" href="mailto:ty@tyclifford.com"></a> <a class="social-link twitter" href="https://twitter.com/_tyclifford"></a></p>

        </div>
    </div>
    <!-- CONTENT-WRAP -->

    <!-- SCRIPTS -->
	<script src="../js/main.js"></script>
    <script src="<?php echo $mainURL; ?>/js/video.min.js"></script>
    <link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">
    <script src="https://assets.calendly.com/assets/external/widget.js" type="text/javascript" async></script>
    <script>
function copyText(){
    var text = document.getElementById("URLCOPY");
    text.select();
    document.execCommand("copy");
    alert("Copied: " + text.value);
}
</script>
    
</body>
</html>