<?php
require_once('Parsedown.php');
require_once('../cfip.php');

// Default config is now found in 'config-default.php', but it's best not to edit that directly.
// Instead, duplicate it and rename the new version 'config-custom.php' (no quotes).
// If you're using Git for version control, add config-custom.php to your .gitignore.
// Then you can do pull/fetch/rebase in Git and it won't overwrite your config.
if (file_exists('config-custom.php')) {
	require_once('config-custom.php');
} else {
	require_once('config-default.php');
}

$content = '';
$is_post = !empty($_GET['post']);		// Whether we're viewing the main list or a single post

function sortPosts($a, $b) {
	$a_value = $a->getFilename();
	$b_value = $b->getFilename();
	return strcmp($b_value, $a_value); // Reversed to get descending
}

if ( $is_post ) {
	// Single post page
	$post_name = filter_var($_GET['post'], FILTER_SANITIZE_NUMBER_INT);
	$file_path = __DIR__.'/content/'.$post_name.'.'.FILE_EXT;
	if ( file_exists($file_path) ) {
		$file = fopen($file_path, 'r');
		$post_title = trim(fgets($file),'#');
		fclose($file);
		// Process the Markdown
		$parsedown = new Parsedown();
		$content = $parsedown->text(file_get_contents($file_path));
	} else {
		$content = '
			<h2>Not Found</h2>
			<p>Sorry, couldn\'t find a post with that name. Please try again, or go to the 
			<a href="'.BASE_URL.'">home page</a> to select a different post.</p>';
	}
} else {
	// Blog main page - list all posts
	$files = new DirectoryIterator(__DIR__.'/content/');
	$files_array = [];
	foreach ($files as $file) {
		if ( $file->isFile() && $file->getExtension() == FILE_EXT ) {
			array_push($files_array, $file->getFileInfo());
		}
	}
	usort($files_array, 'sortPosts'); // See sortPosts() function above
	foreach ($files_array as $file) {
		$filename_no_ext = $file->getBasename('.'.FILE_EXT);
		$file_pointer = $file->openFile();
		$post_title = trim($file_pointer->fgets(),'#');
		$content .= '<p class="is-social-minimal-light"><a class="link-1 aqua" href="'.BASE_URL.'?post='.$filename_no_ext.'">'.$post_title.'</a> '.$filename_no_ext.'</p>';
	}
}

// Appending file hashes to the <link> hrefs allows us to cache the files indefinitely, 
// but immediately serve a new version once the file changes.
$style_hash = hash('md5', file_get_contents(__DIR__.'/src/css/style-'.APPEARANCE.'.css'));
$fonts_hash = hash('md5', file_get_contents(__DIR__.'/src/css/fonts.css'));
$icon_hash  = hash('md5', file_get_contents(__DIR__.'/img/favicon.png'));

?>
<!DOCTYPE html>
<html>
<head>
	<title><?php if ( !empty($_GET['post']) ) { echo $post_title.' - '; } ?><?php echo BLOG_TITLE; ?></title>

	<meta charset="utf-8">
    <meta name="description" content="The web space of Ty Clifford" />
    <meta name="author" content="Ty Clifford">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="keywords" content="Ty Clifford, Keyser, West Virginia, United States, Nerd, Ty on TikTok, Ty's web space, Freedom of Expression">
    <meta property="og:url" content="https://tyclifford.com/?mtm_campaign=homepage" />
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Ty Clifford - Hobbies are my hobby." />
    <meta property="og:title" content="Ty Clifford - Hobbies are my hobby." />
    <meta property="og:image" content="https://tyclifford.com/images/fa2.jpg" />
    <meta property="og:image:alt" content="Profile image of Ty Clifford. Making a funny face squinting, Eye everything." />
    <meta name="twitter:site" content="@_tyclifford" />
    <meta name="twitter:title" content="Ty Clifford" />
    <meta name="twitter:description" content="Ty's space" />

    <!-- FAV and TOUCH ICONS -->
    <link rel="shortcut icon" href="<?php echo $mainURL; ?>/images/ico/fa-bl.ico">
    <link rel="apple-touch-icon" href="<?php echo $mainURL; ?>/images/ico/fa-bl.jpg"/>
    
    <!-- FONTS -->
    <link rel="stylesheet" type="text/css" href="<?php echo $mainURL; ?>/css/fonts/hk-grotesk/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $mainURL; ?>/css/fonts/fontello/css/fontello.css">
    
    <!-- STYLES -->
    <link rel="stylesheet" type="text/css" href="<?php echo $mainURL; ?>/css/main.css">

	<!-- Video -->

</head>

<body class="is-text-align-left is-masked-dark is-text-light" style="background-color:black;">


    <!-- CONTENT-WRAP -->
    <div class="content-wrap">
	
               <!-- CONTENT -->
        <div class="content">
		<h4><a href="index.php"><span class="highlight purple">Blurbs</span></a></h4>            

	<?php 
	$tag = $is_post ? 'article' : 'main';
	echo '<'.$tag.'>'.$content.'</'.$tag.'>';
	?>


<hr />
<p class="is-social-minimal-light"><a class="social-link github" href="https://github.com/snick512/"></a> <a class="social-link email" href="mailto:ty@tyclifford.com"></a> <a class="social-link twitter" href="https://twitter.com/_tyclifford"></a></p>


	</div>
        <!-- CONTENT -->
    
    </div>
    <!-- CONTENT-WRAP -->

    <!-- SCRIPTS -->
	<script src="../js/main.js"></script>




</body>
</html>
