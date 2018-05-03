<div id="promo1">
		<div class="bg parallax-bg"></div>
		<div>
			<section class="container-fluid pad-top-main full-bg">
				<div class="row-fluid">
					<section class="container">

						<div class="row add-bottom-half">
							<article class="span12">
								<h1><a href="<?php echo Yii::app()->request->baseUrl; ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/HEP-01.png"/></a> </span> </h1>
                                <div class="blackline"></div> 
                                <div class="main-heading"></div>
							</article>
						</div><!-- row : ends -->

					</section>
				</div>
			</section>

			

			<section class="container-fluid pad-bottom-main full-bg">
				<div class="row-fluid">
					<section class="container">

						<div class="row add-top-half add-bottom-half">
                        <article class="span4"></article>
							<article class="span4 blue-radius">
								<h3 class="inner-caps">Reset your password</h3>
								<div id="msg" style="display: none;color: red;font-weight: bold;"></div>
								<form name="forpass" id="forpass" method="post">
								<p><input name="email" id="email" type="text" placeholder="Enter your email address"></p>
                                <p style=" height:1px;"></p>
                                <div><input name="login" id="login" type="submit" value="Submit" class="btn btn-reason"> &nbsp; <a href="<?php echo Yii::app()->request->baseUrl;?>/#whyhep4ll" class="btn btn-reason2">Cancel</a></div>
                                </form>
							</article>

							
						</div><!-- row : ends -->

					</section><!-- container : ends -->
				</div><!-- row-fuild : ends -->
			</section> <!-- container-fluid : ends-->	
		
		</div> <!-- page : ends -->
	</div>
	
	<script type="text/javascript">
$(document).ready(function(){
	$("#forpass").submit(function(){
		var email=$("#email").val();
		if(email=='')
			{
				$("#msg").show();
				$("#msg").html("Please Insert password");
				$("#email").focus();
			}
		else
			{
			 $.ajax
	            ({
	                type: "POST",
	                url: "<?php echo Yii::app()->request->baseUrl; ?>/users/forgotpassword",
	                data: {email:email},
	               //cache: false,
	                success: function(msg)
	                {
	                	 if(msg=='no_user')
	                	 {
	                		 $("#msg").show();
	         				 $("#msg").html("Email  Doesnot Exist!");
	                    }
	                	 if(msg=='send')
	                	 {
	                		 $("#msg").show();
	         				 $("#msg").html("Your new password has been sent to your email! please check email!");
	         				window.setTimeout(function() {
	         				    window.location.href = '<?php echo Yii::app()->request->baseUrl; ?>/#whyhep4ll';
	         				}, 3000);
	                    }
	                }
					 
	            });
			}
		return false;
	})
})
</script>	
