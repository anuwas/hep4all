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
                                    <td valign="middle"><h3>Email History</h3></td>
                                    <td align="right">&nbsp;</td>
                                  </tr>
                                </table>  
                                <table width="100%" border="0" cellspacing="4" cellpadding="4">
                                  <tr>
                                    <td><hr></td>
                                  </tr>
                                </table>     
                               </div>
                         <div class="mainpart">
                               <div>
                                 <article class="span4"><div><strong>To Email</strong></div></article>
                                 <article class="span4"><div><strong>Date</strong></div></article>
                                 <article class="span4"><div align="right" style="padding-top:10px;">&nbsp;</div></article>
                               </div>
                               <?php foreach ($templates as $value) { ?>
                               
                               <div>
                                 <article class="span4"> <div class="topadding"><?php echo $value->to_email;?></div></article>
                                 <article class="span4"><div class="topadding"><?php echo date('m-d-Y  h:m:s a',strtotime ($value->created_date));?></div></article>
                                 
                                  <div class="bspace"></div>
                               </div>
                               
                               <?php } ?>
                               
                           </div>
                           
                           
                            <div class="space"></div> 
                        </article>
                        
						</div><!-- row : ends -->

					</section><!-- container : ends -->
                            
				</div><!-- row-fuild : ends -->
			</section> <!-- container-fluid : ends-->	

			
		</div> <!-- page : ends -->
	</div>
	<script type="text/javascript">
$(document).ready(function(){
	
	$(".delete_template").click(function(){

		var r = confirm("Confirm you want to delete this template?");
		if(r)
		{
			var idarr=$(this).attr("id").split("_");
			var id=idarr[1];

			$.ajax
			({
				type: "POST",
				url: "<?php echo Yii::app()->request->baseUrl; ?>/exercisetemplate/deletetemplate",
				data: {id:id},
				success: function(msg)
				{
					//alert(msg);
					 alert('Template Removed');
					 location.reload();
				}
				});
			}

		})
})

//-->
</script>
}
	