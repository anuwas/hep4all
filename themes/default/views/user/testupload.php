 <link href="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/tupload/css/uploadfilemulti.css" rel="stylesheet">
<script src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/tupload/js/jquery-1.8.0.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/tupload/js/jquery.fileuploadmulti.min.js"></script>
<div id="mulitplefileuploader">Upload</div>

<div id="status"></div>
<script>
$(document).ready(function()
{

var settings = {
	url: "<?php echo Yii::app()->request->baseUrl?>/user/testupload",
	method: "POST",
	allowedTypes:"jpg,png,gif,doc,pdf,zip,xlsx.doc,docx,mp4,mp3",
	fileName: "myfile",
	multiple: true,
	onSuccess:function(files,data,xhr)
	{
		
		//$("#status").html("<font color='green'>Upload is success</font>");
		alert(data);
	},
    afterUploadAll:function()
    {
        alert("all images uploaded!!");
    },
	onError: function(files,status,errMsg)
	{		
		$("#status").html("<font color='red'>Upload is Failed</font>");
	}
}
$("#mulitplefileuploader").uploadFile(settings);

});
</script>
