<?php

// prepare our Consumer Key and Secret
$consumer_key = 'f1709e2b3b71f20c1b70fb0f4f88220d9bac3a45';
$consumer_secret = '58c810080e60fc2abe697e423a16e5868dbca9e7';

require_once('Vimeo.php');
require_once('VimeoUploadException.php');

session_start();

$sUploadResult = '';
$action='';
if(isset($_REQUEST['action']))
{
	$action=$_REQUEST['action'];
}
$oauth_access_token='';
if(isset($_SESSION['oauth_access_token']))
{
	$oauth_access_token=$_SESSION['oauth_access_token'];
}
$oauth_access_token_secret=null;
if(isset($_SESSION['oauth_access_token_secret']))
{
	$oauth_access_token_secret=$_SESSION['oauth_access_token_secret'];
}
switch ($action) {
    case 'clear': // Clear session
        session_destroy();
        session_start();
        break;

    case 'upload': // Upload video
        $vimeo = new Vimeo($consumer_key, $consumer_secret, $oauth_access_token,$oauth_access_token_secret);
        $video_id = $vimeo->upload($_FILES['file']['tmp_name']);

        if ($video_id) {
            $sUploadResult = 'Your video has been uploaded and available <a href="http://vimeo.com/'.$video_id.'">here</a> !';
            $vimeo->call('vimeo.videos.setPrivacy', array('privacy' => 'nobody', 'video_id' => $video_id));
            $vimeo->call('vimeo.videos.setTitle', array('title' => $_POST['title'], 'video_id' => $video_id));
            $vimeo->call('vimeo.videos.setDescription', array('description' => $_POST['description'], 'video_id' => $video_id));
        } else {
            $sUploadResult = 'Video Fails to Upload, try again later.';
        }
        break;
    default:
        // Create the object and enable caching
        $vimeo = new Vimeo($consumer_key, $consumer_secret);
       // $vimeo->enableCache(Vimeo::CACHE_FILE, './cache', 300);
        break;
}

// Setup initial variables
$state='';
if(isset($_SESSION['vimeo_state']))
{
	$state = $_SESSION['vimeo_state'];
}
$request_token='';
if(isset($_SESSION['oauth_request_token']))
{
	$request_token = $_SESSION['oauth_request_token'];
}
$access_token='';
if(isset($_SESSION['oauth_access_token']))
{
	$access_token = $_SESSION['oauth_access_token'];
}


// Coming back
$oauth_token='';
if(isset($_REQUEST['oauth_token']))
{
	$oauth_token=$_REQUEST['oauth_token'];
}
if ($oauth_token != NULL && $state === 'start') {
    $_SESSION['vimeo_state'] = $state = 'returned';
}

// If we have an access token, set it
if ($access_token != null) {
    $vimeo->setToken($access_token, $_SESSION['oauth_access_token_secret']);
}

$bUploadCase = false;
$token='';
switch ($state) {

    case 'returned':

        // Store it
        if ($_SESSION['oauth_access_token'] === NULL && $_SESSION['oauth_access_token_secret'] === NULL) {
            // Exchange for an access token
            $vimeo->setToken($_SESSION['oauth_request_token'], $_SESSION['oauth_request_token_secret']);
            $token = $vimeo->getAccessToken($_REQUEST['oauth_verifier']);

            // Store
            $_SESSION['oauth_access_token'] = $token['oauth_token'];
            $_SESSION['oauth_access_token_secret'] = $token['oauth_token_secret'];
            $_SESSION['vimeo_state'] = 'done';

            // Set the token
            $vimeo->setToken($_SESSION['oauth_access_token'], $_SESSION['oauth_access_token_secret']);
        }

        // display upload videofile form
        $bUploadCase = true;
        break;
}

?>
<!DOCTYPE html>
<html lang="en" >
    <head>
        <meta charset="utf-8" />
        <title>Vimeo API - OAuth and Upload Example | Script Tutorials</title>
        <link href="css/main.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
       <form enctype="multipart/form-data" action="index" method="post">
            <input type="hidden" name="action" value="upload" />
            <label for="file">Please choose a file:</label><input name="file" type="file" />
            <label for="title">Title:</label><input name="title" type="text" />
            <label for="description">Description:</label><input name="description" type="text" />
            <input type="submit" value="Upload" />
        </form> 
    </body>
</html>
