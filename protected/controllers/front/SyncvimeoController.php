<?php
use Vimeo\Vimeo;
use Vimeo\Exceptions\VimeoUploadException;
class SyncvimeoController extends Controller
{
	public function actionIndex()
	{
		include 'vimeovideo/Vimeo/Vimeo.php';
		include 'vimeovideo/Vimeo/Exceptions/ExceptionInterface.php';
		include 'vimeovideo/Vimeo/Exceptions/VimeoUploadException.php';
		
		
	$config = require('vimeovideo/init.php');
	if (empty($config['access_token'])) {
    throw new Exception('You can not upload a file without an access token. You can find this token on your app page, or generate one using auth.php');
	}
	
	$lib = new Vimeo($config['client_id'], $config['client_secret'], $config['access_token']);
	exit;
	$uploaded = array();
	$file_name=Yii::app()->basePath.'/../upload/vimeovideo/test.mp4';
//  Send the files to the upload script.
//foreach ($files as $file_name) {
    //  Update progress.
    print 'Uploading ' . $file_name . "\n";
    try {
        //  Send this to the API library.
        $uri = $lib->upload($file_name);
        //  Now that we know where it is in the API, let's get the info about it so we can find the link.
        $video_data = $lib->request($uri);
		$lib->request($uri, array('name' => 'hep4all1'), 'PATCH');
		
		$uri = $lib->upload($file_name);
        //  Now that we know where it is in the API, let's get the info about it so we can find the link.
        $video_data = $lib->request($uri);
		$lib->request($uri, array('name' => 'hep4all2'), 'PATCH');
    

        //  Pull the link out of successful data responses.
        $link = '';
        if($video_data['status'] == 200) {
            $link = $video_data['body']['link'];
        }

        //  Store this in our array of complete videos.
        $uploaded[] = array('file' => $file_name, 'api_video_uri' => $uri, 'link' => $link);
    }
    catch (VimeoUploadException $e) {
        //  We may have had an error.  We can't resolve it here necessarily, so report it to the user.
        print 'Error uploading ' . $file_name . "\n";
        print 'Server reported: ' . $e->getMessage() . "\n";
    }
//}

//  Provide a summary on completion with links to the videos on the site.
print 'Uploaded ' . count($uploaded) . " files.\n\n";
foreach ($uploaded as $site_video) {
    extract($site_video);
    print "$file is at $link.\n";
}
	
	
	}
}