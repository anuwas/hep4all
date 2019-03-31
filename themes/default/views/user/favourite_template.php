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
                                    <td><span class="selected_tab btn btn-reason"> Private Routines</span> &nbsp; <span class="notselected_tab btn btn-reason selectednot"> <a href="<?php echo Yii::app()->request->baseUrl; ?>/user/sharedbyother">Shared By Others</a> </span> </td>
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
                                 <article class="span3"><div><strong>Last Modified Date</strong></div></article>
                                 <article class="span6"><div align="right" style="padding-top:10px;">&nbsp;</div></article>
                               </div>
                               <?php foreach ($templates as $value) { ?>
                               
                               <div <?php if($value->print_master_id==$id){?> style="background-color:#A2BEDD; color:#fff; padding:5px;border: 1px solid #eeeeee;border-radius:3px;"<?php } ?>>
                                 <article class="span3"> <div class="topadding"><?php echo $value->print_master_name;?></div></article>
                                 <article class="span3"><div class="topadding"><?php echo date('m-d-Y  h:m:s a',strtotime ($value->print_date));?></div></article>
                                 <article class="span6">
                                 <div align="right" style="padding-top:10px;">
                                 <a href="<?php echo Yii::app()->request->baseUrl.'/user/viewemailtemplatehostory/'.$value->print_master_id;?>" class="btn btn-reason">Detail</a> &nbsp;
                                 <a href="<?php echo Yii::app()->request->baseUrl.'/exercise/sharetemplate/'.$value->print_master_id;?>" class="btn btn-reason">Share</a> &nbsp;
                                 <a href="#" class="btn btn-reason reuse" id="reuse_<?php echo $value->print_master_id;?>" >Reuse</a> &nbsp; 
                                 <a href="javascript:void(0)" class="btn btn-reason delete_template" id="delete_<?php echo $value->print_master_id;?>">Delete</a></div></article>
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
				url: "<?php echo Yii::app()->request->baseUrl; ?>/exercisetemplate/deletefavouritetemplate",
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

		$(".reuse").click(function(){
			<?php //echo Yii::app()->request->baseUrl.'/printexercise/editprintexercise/'.$value->print_master_id;?>
					var id=$(this).attr("id").substring(6);
			$.ajax
			({
				type: "POST",
				url: "<?php echo Yii::app()->request->baseUrl; ?>/user/Setprintexercisefromtemplate",
				data: {printmasterid:id},
				success: function(msg)
				{
					console.log('print exercise saved');
					window.location.href='<?php echo Yii::app()->request->baseUrl.'/printexercise/editprintexercise/';?>'+id;
				}
				});
			})
		
})

//-->
</script>
}
	<style type="text/css">
    .selectednot{ background:#A2BEDD;}
    </style>