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
                                    <td valign="middle"><h3>FAVORITE TEMPLATES</h3></td>
                                    <td align="right">&nbsp;</td>
                                  </tr>
                                </table>  
                                
                                <table width="100%" border="0" cellspacing="4" cellpadding="4">
                                <tr>
                                    <td><span class="notselected_tab btn btn-reason selectednot"><a href="<?php echo Yii::app()->request->baseUrl; ?>/user/favouritetemplate">Private Routines</a></span> &nbsp; <span class="selected_tab btn btn-reason">Shared By Others</span></td>
                                  </tr>
                                  <tr>
                                    <td><hr></td>
                                  </tr>
                                </table>     
                               </div>
                         <div class="mainpart">
                         <?php 
                        $id=0;
                        if(isset($_REQUEST['id']))
                        {
                        	 $id=$_REQUEST['id'];
                        }
                         ?>
                               <div>
                                 <article class="span3"><div><strong>Routine Name</strong></div></article>
                                 <article class="span3"><div><strong>Shared By</strong></div></article>
                                 <article class="span3"><div><strong>Shared Date</strong></div></article>
                                 <article class="span3"><div><strong>&nbsp;</strong></div></article>
                               </div>
                               <?php foreach ($templates as $value) {
								$routinename=$value->printMaster->print_master_name;
								if($value->printMaster->print_master_name=='hidden')
								{
									$routinename='Home Exercise Program';
								}
                               	?>
                               
                               <div <?php if($value->print_master_id==$id){?> style="background-color: rgb(202, 202, 202);border: 1px solid;border-radius:3px;"<?php } ?>>
                                 <article class="span3"> <div class="topadding"><?php echo $routinename;?></div></article>
                                 <article class="span3"> <div class="topadding"><?php echo $value->user->email;?> (<?php echo $value->user->first_name;?> <?php echo $value->user->last_name;?>)</div></article>
                                 <article class="span3"><div class="topadding"><?php echo date('m-d-Y  h:m:s a',strtotime ($value->printMaster->print_date));?></div></article>
                                <article class="span3"><div><a href="<?php echo Yii::app()->request->baseUrl;?>/exercise/showsharedbyothers/<?php echo $value->printMaster->print_master_id;?>" class="btn btn-reason" target="_blank" >Reuse</a> &nbsp; 
                                 <a href="#" class="btn btn-reason delete_template " id="<?php echo $value->tehid;?>_id" >Delete</a></div></article>
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
			var id=idarr[0];
			

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
	<style type="text/css">
    .selectednot{ background:#A2BEDD;}
    </style>