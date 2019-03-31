<section class="container-fluid full-bg">
				<div class="row-fluid">
                <section class="container">
						<div class="row add-top-half add-bottom-half" >
                           <article class="span6"> <div> 
<table width="100%" cellpadding="0" cellspacing="0" border="0">
  <tr>
    <td align="center"><img src="<?php echo Yii::app()->request->baseUrl.'/upload/exercise/image/537x480/'.$exercise->picture_1; ?>"/></td>
  </tr>
  <tr>
  <td><p> Picture one url is below </p></td>
  </tr>
  <tr>
    <td align="center"><input type="text" name="photo1" id="phpto1" value="http://hep4all.com/photovideoview/photo/1/<?php echo $exercise->exercise_id;?> "></td>
  </tr>
</table>
</div></article>
                           <article class="span6"> <div>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
  <tr>
    <td align="center"><iframe src="//player.vimeo.com/video/<?php echo $exercise->video_1;?>?portrait=0&color=333" width="480" height="420" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></td>
  </tr>
  <tr>
  <td><p> Video one url is below </p></td>
  </tr>
  <tr>
    <td align="center">
    <input type="text" name="video1" id="video1" value='<iframe src="//player.vimeo.com/video/<?php echo  $exercise->video_1;?>?portrait=0&color=333" width="1200" height="600" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>'>
    </td>
  </tr>
</table>
</div></article>
<div style="clear:both"/></td>
                           <article class="span6"> <div>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
  <tr>
    <td align="center"><img src="<?php echo Yii::app()->request->baseUrl.'/upload/exercise/image/537x480/'.$exercise->picture_2; ?>"/></td>
  </tr>
  <tr>
  <td><p> Picture two url is below </p></td>
  </tr>
  
  <tr>
    <td align="center"><input type="text" name="photo1" id="phpto1" value="http://hep4all.com/photovideoview/photo/2/<?php echo $exercise->exercise_id;?> "></td>
  </tr>
</table>
</div></article>
                           <article class="span6"> <div>
<table width="100%" cellpadding="0" cellspacing="0" border="0">
  <tr>
    <td align="center"><iframe src="//player.vimeo.com/video/<?php echo $exercise->video_2;?>?portrait=0&color=333" width="480" height="420" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe></td>
  </tr>
  <tr>
  <td><p> Video two url is below </p></td>
  </tr>
  <tr>
    <td align="center">
    <input type="text" name="video1" id="video1" value='<iframe src="//player.vimeo.com/video/<?php echo  $exercise->video_1;?>?portrait=0&color=333" width="1200" height="600" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>'>
    </td>
  </tr>
</table>
</div></article>
                         </div>
                 </section>         

              </div>
 </section>                  






