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
			<?php $this->renderPartial('/header/userheader');?>
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
                                    <td valign="middle"><h3>MANAGE PRODUCT</h3></td>
                                    <td align="right" width="55%">
                                    <form action="<?php echo Yii::app()->request->baseUrl; ?>/product/manage" name="manage_exercise_form" id="manage_exercise_form" method="get">
                                    <?php 
                                    $src_category='';
                                    $src_exercise_title='';
                                    if(isset($_REQUEST['search_manage_exercise_category']))
                                    {
                                    	$src_category=$_REQUEST['search_manage_exercise_category'];
                                    	
                                    }
                                     if(isset($_REQUEST['search_manage_exercise']))
                                    {
                                    	
                                    	$src_exercise_title=$_REQUEST['search_manage_exercise'];
                                    }
                                    
                                    ?>
										<table width="100%" border="0" cellspacing="5" cellpadding="5">
 											 <tr>
											    <td><input name="search_manage_exercise" id="search_manage_exercise" type="text" placeholder="search" value="<?php echo $src_exercise_title;?>"> </td>
											    <td><select name="search_manage_exercise_category" id="search_manage_exercise_category">
					                    			<option value="">Category </option>
					                    			<?php foreach ($productcategory as $value) { ?>
					                    				<option value="<?php echo $value->product_category_id;?>" <?php if($src_category==$value->product_category_id){?> selected="selected"<?php } ?>><?php echo $value->product_category_name;?></option>
					                    			<?php }?>
					                               
					                				</select> 
                								</td>
    											<td><input type="submit" name="manage_exercise_search_submit" id="manage_exercise_search_submit" value="Go" class="btn btn-reason"></td>
										  </tr>
										</table>
										</form>
									</td>
                                  </tr>
                                </table>  
                                <table width="100%" border="0" cellspacing="4" cellpadding="4">
                                  <tr>
                                    <td><hr></td>
                                  </tr>
                                </table>     
                               </div>
                               
                         <?php if(count($products)=='0'){?>
                         <div>
                        
                           <article class="span12">
                              <div class="space"></div>
                               <div align="center"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/create.jpg"/></div>
                               <div class="space" style="height:40px;"></div>
                           </article>
                           
                           </div>
                           <?php } else {?>
                           <div>
                           <article class="span12">
                               <div class="grid-container clear">
                              
                               <ul class="third-nav">
                                <?php foreach ($products as $value) { ?>
                                <li class="ajax-anchor grid-item onebyone light-feature sec-huekit">
                                        
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/upload/product/thumb/<?php echo $value->product_image;?>" alt="" height="162px" width="182px"/>
                                        <span class="rollover">
                                        <h3 class="exercisetitle"><?php echo $value->product_name;?></h3>
                                        <a href="#" title="Click to Large" class="detail_link" id="<?php echo $value->product_id;?>">
                                        
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus.png"/></a> &nbsp; 
                                        <!-- <a href="#" title="See Video" class=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/video.png"/></a> &nbsp; -->   
                                        <!-- <a href="#" title="Print" class=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/print.png"/></a> --> 
                                        <!-- <a href="#" title="Print" class=""><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus2.png"/></a> -->
                                        <a href="#" title="Edit" class="edit_link" id="<?php echo $value->product_id;?>" target="_blank">
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/edit.png"/></a>&nbsp;
                                        <a href="#" title="Delete" class="delete_link" id="<?php echo $value->product_id;?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/delete.png"/></a>
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
                         </div>
                         <?php } ?>
                            <div class="space"></div> 
                        </article>
                        
						</div><!-- row : ends -->

					</section><!-- container : ends -->
                            
				</div><!-- row-fuild : ends -->
			</section> <!-- container-fluid : ends-->	

			
		</div> <!-- page : ends -->
	</div>
	<script>
	$(document).ready(function(){
		 $(".edit_link").click(function(){
	          var id=$(this).attr("id");
	          
	         // window.location.href=;
	         
	          window.open('<?php echo Yii::app()->request->baseUrl?>/product/edit/'+id,'_blank');
	          })
	          
	           $(".delete_link").click(function(){
	           var r = confirm("Confirm you want to delete this product?");
	           if(r)
	           {
	        	   var id=$(this).attr("id");
	               window.location.href='<?php echo Yii::app()->request->baseUrl?>/product/deleteproduct/'+id;
	                    
	            }
	           else
	           {
	return false;
	               }
	                    
	          })
	          
	          
	          $(".detail_link").click(function(){
	        	  var id=$(this).attr("id");
	        	   window.location.href='<?php echo Yii::app()->request->baseUrl?>/product/detail/'+id;
	              })

          
    });
	</script>