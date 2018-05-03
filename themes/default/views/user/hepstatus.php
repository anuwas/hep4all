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
                                    <td valign="middle"><h3>HEP Emails Delivery Status</h3></td>
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
                                 <article class="span1" style="width:6.0% !important;"><div><strong>Status</strong></div></article>
                                 <article class="span3"><div><strong>Title </strong></div></article>
                                 <article class="span4"><div><strong>To </strong></div></article>                                 
                                 <article class="span1"><div><strong>Date </strong></div></article>
                                 <article class="span2"><div><strong>Action </strong></div></article>
                               </div>
                               <?php foreach ($emailhistory as $value) { 
                               	if($value->printMaster->print_master_name=='hidden')
                               	{
                               		$exercisename='Home Exercise Program';
                               	}
                               	else {
                               		$exercisename=$value->printMaster->print_master_name;
                               	}
                               
                               	$datestr=explode(" ", $value->created_date);
                               	$time =$datestr[1];
                               	$datearr=explode("-", $datestr[0]);
                               	$newdatestr=$datearr[1].'/'.$datearr[0].'/'.$datearr[2];
                               	
                               	?>
                            
                               
                               <div>
                                 <article class="span1" style="width:6.0% !important;"> <div class="topadding"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/deliverd.png" title="Delivered!"/> </div></article>
                                 <article class="span3"><div class="topadding"><?php echo $exercisename;?></div></article>
                                 <article class="span4"><div class="topadding"><?php echo $value->to_email;?></div></article>                                
                                 <article class="span1"><div class="topadding"><?php echo $newdatestr.' '.$time;?></div></article>
                                 <article class="span2"><div class="topadding">
                                 <a href="javascript:void(0)" class="delete_email_history" id="<?php echo $value->tehid?>_id"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/delete.png" title="Delete"/></a> &nbsp; 
                                 <a href="javascript:void(0)" class="reasend_email_class" id="<?php echo $value->tehid?>_resend"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/resend.png" title="Resend"/></a> &nbsp; <a href="<?php echo Yii::app()->request->baseUrl.'/printexercise/editprintexercise/'.$value->print_master_id; ?>"><?php //echo $value->code;?> <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/plus.png" title="View in Details"/></a></div></article>
                                  <div class="bspace"></div>
                               </div>
                             <?php } ?>
                               
                               
                           </div>
                              
                        </article>
                        
						</div><!-- row : ends -->

					</section><!-- container : ends -->
                            
				</div><!-- row-fuild : ends -->
			</section> <!-- container-fluid : ends-->	

			
		</div> <!-- page : ends -->
	</div>
<script type="text/javascript">
$(document).ready(function(){
	$(".delete_email_history").click(function(){
	var idarr=$(this).attr("id").split("_");
	var id=idarr[0];
	var r = confirm("Confirm you want to delete ?");
	if(r)
	{
		$.ajax
		({
			type: "POST",
			url: "<?php echo Yii::app()->request->baseUrl; ?>/exercise/deleteemailhistory",
			data: {id:id},
			success: function(msg)
			{
				location.reload();
			}
			});
		}
	
	})

	$(".reasend_email_class").click(function(){
		var idarr=$(this).attr("id").split("_");
		var id=idarr[0];
		$.ajax
		({
			type: "POST",
			url: "<?php echo Yii::app()->request->baseUrl; ?>/exercise/resendcode",
			data: {tehid:id},
			success: function(msg)
			{
				alert("Seccessfully Sent!");
			}
			});
		})
})
</script>