<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/stylesheets/flexslider.css" type="text/css" media="screen" />
<link href="<?php echo Yii::app()->request->baseUrl; ?>/stylesheets/screenv2.css" media="screen, projection" rel="stylesheet" type="text/css" />
<!-- it works the same with all jquery version from 1.x to 2.x -->    
<script src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/modernizr.custom.31925.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/jquery.flexslider-min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/javascripts/init.js"></script>
<div id="promo1">
		<div class="bg parallax-bg"></div>
		<div>
			<?php include 'userheader.php';?>

			<section class="container-fluid pad-bottom-main full-bg">
				<div class="row-fluid">
					<section class="container">

						<div class="row add-top-half add-bottom-half">
                        
                        <?php include 'leftuserprofile.php';?>
                        <article class="span9">
                        <?php include 'menu.php';?>
                               <div>
                                 <table width="100%" border="0" cellspacing="4" cellpadding="4">
                                  <tr>
                                    <td width="55" align="left"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/u.png"/></td>
                                    <td valign="middle"><h3>FAVORITE EXERCISES</h3></td>
                                    <td align="right">&nbsp;</td>
                                  </tr>
                                </table>  
                                <table width="100%" border="0" cellspacing="4" cellpadding="4">
                                  <tr>
                                    <td><hr></td>
                                  </tr>
                                </table>     
                               </div>
                               
                               <?php if(count($exercises)=='0'){?>
                         <div>
                         <article class="span12"> 
                         <div class="space"></div>
                               <div align="center"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/fcreate.jpg"/></div>
                         <div class="space" style="height:40px;"></div>    
                           </article>
                         </div>
                         <?php } else {?>
                         <div>
                           <article class="span12">
                               <div class="grid-container clear">
                               <ul class="third-nav">
                                <?php foreach ($exercises as $value) { ?>
                                   <li class="ajax-anchor grid-item onebyone light-feature sec-huekit">
                                        <h3><?php echo $value->exercise->exercise_title;?></h3>
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/exercise/image/thumb/<?php echo $value->exercise->picture_1;?>" alt="" height="162px" width="182px"/>
                                        <span class="rollover">
                                        <a href="#" title="Click to Large" class="detail_link" id="<?php echo $value->exercise_id;?>">
                                        
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus.png"/></a> &nbsp; 
                                        <!-- <a href="#" title="See Video" class=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/video.png"/></a> &nbsp; -->   
                                        <!-- <a href="#" title="Print" class=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/print.png"/></a> --> 
                                        <!-- <a href="#" title="Print" class=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus2.png"/></a> 
                                        <a href="#" title="Edit" class="edit_link" id="<?php echo $value->exercise_id;?>">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/edit.png"/></a>&nbsp;-->
                                        <a href="#" title="Delete" class="delete_link" id="<?php echo $value->exercise_id;?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/delete.png"/></a>
                                        </span>
                                    </li>
                                    <?php } ?>
                                   
                                </ul>
                             <div style="clear:both;"></div>
                             <div class="pages"> 
                             <?php $this->widget('CLinkPager', array(
							    'pages' => $pages,
							)) ?>
							</div>
                             </div>
                           </article>
                            
                        
						</div><!-- row : ends -->
					<?php  } ?>
					
					</section><!-- container : ends -->
                            
				</div><!-- row-fuild : ends -->
			</section> <!-- container-fluid : ends-->	

			
		</div> <!-- page : ends -->
	</div>
	
	<script>
	$(document).ready(function(){
       //alert("aa");
      $(".edit_link").click(function(){
          var id=$(this).attr("id");
          window.location.href='<?php echo Yii::app()->request->baseUrl?>/user/editexercise/'+id;
          })
          
           $(".delete_link").click(function(){
           var r = confirm("Sure Want to delete this exercise!");
           if(r)
           {
        	   var id=$(this).attr("id");
               window.location.href='<?php echo Yii::app()->request->baseUrl?>/user/deletefavouriteexercise/'+id;
            }
           else
           {
return false;
               }
                    
          })
          
         
          $(".detail_link").click(function(){
        	  var id=$(this).attr("id");
        	   window.location.href='<?php echo Yii::app()->request->baseUrl?>/user/exercisedetail/'+id;
              })
          
          

          
    });
	</script>