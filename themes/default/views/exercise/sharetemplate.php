	<div id="promo1">
		<div class="bg parallax-bg"></div>
		<div>
			<?php $this->renderPartial('/header/userheader');?>
			<section class="container-fluid pad-bottom-main full-bg">
				<div class="row-fluid">
					<section class="container">

						<div class="row add-top-half add-bottom-half">
                        <article class="span4"></article>
							<article class="span4 blue-radius">
								<h3 class="inner-caps">Email your program to the recipient below</h3>
								<div id="msg" style="display: none;color: red;font-weight: bold;"></div>
								<form name="forpass" id="forpass" method="post">
								
								<p>
								<!--  <input type="radio" name="select1" id="select1" value="1" checked="checked">-->
								<input name="toemailidtxt" id="toemailidtxt" type="text" placeholder="Enter destination email address">
								</p>
								
								<p>
								<!--  <input type="radio" name="select1" id="select1" value="2">
								<select name="toemailid" id="toemailid">
								<option value=""> -Select User- </option>
								<?php foreach ($allusers as $value) { ?>
								<option value="<?php echo $value->email;?>"><?php echo $value->email;?> - <?php echo $value->first_name;?> <?php echo $value->last_name;?> </option>
								<?php }?>
								</select>
								</p>
								-->
                                <p style=" height:1px;"></p>
                               <!--   <p><input name="confirm_toemailid" id="confirm_toemailid" type="text" placeholder="Repeat your email address"></p>-->
                                <p style=" height:1px;"></p>
                                <p><input name="selfemail" id="selfemail" type="hidden" placeholder="Repeat your email address" value="<?php echo $model->email;?>" ></p>
                                <p style=" height:1px;"></p>
                                <div><input name="sendcode" id="sendcode" type="button" value="Submit" class="btn btn-reason"> &nbsp; <a href="<?php echo Yii::app()->request->baseUrl;?>/user/manageexercise" class="btn btn-reason2">Cancel</a></div>
                                </form>
							</article>
							
						</div><!-- row : ends -->

					</section><!-- container : ends -->
				</div><!-- row-fuild : ends -->
			</section> <!-- container-fluid : ends-->	
		
		</div> <!-- page : ends -->
	</div>
	<?php 
	$id=0;
	if(isset($_REQUEST['id']))
	{
		$id=$_REQUEST['id'];
	}
	?>
	<input type="hidden" name="refid" id="refid" value="<?php echo $id;?>">
<script type="text/javascript">
$(document).ready(function(){
	$("#sendcode").click(function(){
		//var radioval=$("#forpass input[type='radio']:checked").val();
		var refid=$("#refid").val();
		var radioval=1;
		switch(radioval)
		{
		case 1:
			var tomail=$("#toemailidtxt").val();
			//alert(tomail);
			if(tomail=='')
			{
				$("#msg").show();
				$("#msg").html("Please enter email");
				$("#email").focus();
				return false;
			}
			$.ajax
			({
				type: "POST",
				url: "<?php echo Yii::app()->request->baseUrl; ?>/exercise/sendtemplateemailtoprint",
				data: {toemail:tomail,refid:refid},
				success: function(msg)
				{
					 alert('Your routine has been shared.');
					 if(msg=='hidden')
					 {
						
						 window.setTimeout(function() {
							 window.location.href="<?php echo Yii::app()->request->baseUrl; ?>/user/favouritetemplate";
		  				}, 3000);
						
						 }
					 else
					 {
						 
						 window.setTimeout(function() {
							 window.location.href="<?php echo Yii::app()->request->baseUrl; ?>/user/favouritetemplate/"+refid;
		  				}, 3000);
			  				
						 }
					
				}
				});
			break;

		case 2:
			
			var tomail=$("#toemailid").val();
			
			if(tomail=='')
			{
				$("#msg").show();
				$("#msg").html("Please select user");
				$("#email").focus();
				return false;
			}
			$.ajax
			({
				type: "POST",
				url: "<?php echo Yii::app()->request->baseUrl; ?>/exercise/sendtemplateemailtoprint",
				data: {toemail:tomail,refid:refid},
				success: function(msg)
				{
					 alert('Your routine has been shared.');
					 if(msg=='hidden')
					 {
						
						 window.setTimeout(function() {
							 window.location.href="<?php echo Yii::app()->request->baseUrl; ?>/user/favouritetemplate";
		  				}, 3000);
						
						 }
					 else
					 {
						 
						 window.setTimeout(function() {
							 window.location.href="<?php echo Yii::app()->request->baseUrl; ?>/user/favouritetemplate";
		  				}, 3000);
			  				
						 }
					
				}
				});
			break;
			
		}
		
			
		
		})
})
</script>
	