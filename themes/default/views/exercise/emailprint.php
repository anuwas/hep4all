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
								
								<p><input name="toemailid" id="toemailid" type="text" placeholder="Enter destination email address"></p>
                                <p style=" height:1px;"></p>
                               <!--   <p><input name="confirm_toemailid" id="confirm_toemailid" type="text" placeholder="Repeat your email address"></p>-->
                                <p style=" height:1px;"></p>
                                <p><input name="selfemail" id="selfemail" type="hidden" placeholder="Repeat your email address" value="<?php echo $model->email;?>" ></p>
                                <p style=" height:1px;"></p>
                                <div><input name="sendcode" id="sendcode" type="button" value="Submit" class="btn btn-reason"> &nbsp; <a href="<?php echo Yii::app()->request->baseUrl;?>/printexercise/print" class="btn btn-reason2">Cancel</a></div>
                                
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
	$("#toemailid").focus();
	$("#sendcode").click(function(){
		var tomail=$("#toemailid").val();
		if(tomail=='')
			{
				$("#msg").show();
				$("#msg").html("Please enter email");
				$("#email").focus();
				return false;
			}

		var toemail=$("#toemailid").val();
		var refid=$("#refid").val();
		if(refid==0)
		{
			$.ajax
			({
				type: "POST",
				url: "<?php echo Yii::app()->request->baseUrl; ?>/exercise/sendemailtoprint",
				data: {toemail:toemail},
				success: function(msg)
				{
					 alert('Your routine has been sent.');
					 
					 window.setTimeout(function() {
						 window.location.href="<?php echo Yii::app()->request->baseUrl; ?>/printexercise/print";
	  				}, 3000);
				}
				});
			}
		else
		{
			$.ajax
			({
				type: "POST",
				url: "<?php echo Yii::app()->request->baseUrl; ?>/exercise/sendtemplateemailtoprint",
				data: {toemail:toemail,refid:refid},
				success: function(msg)
				{
					 alert('Your routine has been sent.');
					 if(msg=='hidden')
					 {
						
						 window.setTimeout(function() {
							 window.location.href="<?php echo Yii::app()->request->baseUrl; ?>/printexercise/print";
		  				}, 3000);
						
						 }
					 else
					 {
						 
						 window.setTimeout(function() {
							 window.location.href="<?php echo Yii::app()->request->baseUrl; ?>/printexercise/editprintexercise/"+refid;
		  				}, 3000);
			  				
						 }
					
				}
				});
			}
		
		})
})


//function using for the case of enter press rather click on send button
$(document).keypress(function(e) {
    if(e.which == 13) {
		var tomail=$("#toemailid").val();
		if(tomail=='')
			{
				$("#msg").show();
				$("#msg").html("Please enter email");
				$("#email").focus();
				return false;
			}

		var toemail=$("#toemailid").val();
		var refid=$("#refid").val();
		if(refid==0)
		{
			$.ajax
			({
				type: "POST",
				url: "<?php echo Yii::app()->request->baseUrl; ?>/exercise/sendemailtoprint",
				data: {toemail:toemail},
				success: function(msg)
				{
					 alert('Your routine has been sent.');
					 
					 window.setTimeout(function() {
						 window.location.href="<?php echo Yii::app()->request->baseUrl; ?>/printexercise/print";
	  				}, 3000);
				}
				});
			}
		else
		{
			$.ajax
			({
				type: "POST",
				url: "<?php echo Yii::app()->request->baseUrl; ?>/exercise/sendtemplateemailtoprint",
				data: {toemail:toemail,refid:refid},
				success: function(msg)
				{
					 alert('Your routine has been sent.');
					 if(msg=='hidden')
					 {
						
						 window.setTimeout(function() {
							 window.location.href="<?php echo Yii::app()->request->baseUrl; ?>/printexercise/print";
		  				}, 3000);
						
						 }
					 else
					 {
						 
						 window.setTimeout(function() {
							 window.location.href="<?php echo Yii::app()->request->baseUrl; ?>/printexercise/editprintexercise/"+refid;
		  				}, 3000);
			  				
						 }
					
				}
				});
			}
    }
});
</script>
	