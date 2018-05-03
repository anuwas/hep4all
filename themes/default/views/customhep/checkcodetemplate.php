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
								<h3 class="inner-caps">Please Enter Your Code</h3>
								<?php if($msg!=''){ ?><div  style="color: red;font-weight: bold;">
								Please Provide valid code
								</div>
								<?php } ?>
								<div id="msg" style="display: none;color: red;font-weight: bold;">
								
								</div>
								<form action="<?php echo Yii::app()->request->baseUrl; ?>/exercise/checkprintexercisetemplate" name="f1" id="f1" method="post">
								<p><input name="emailcode" id="emailcode" type="text" placeholder="Please Enter Your Code"></p>
                                <p style=" height:1px;"></p>
                                <div><input name="login" id="login" type="submit" value="GO" class="btn btn-reason"> </div>
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
	$("#emailcode").focus();
	$("#f1").submit(function(){
	var code=$("#emailcode").val();
	if(code=='')
	{
		$("#msg").show();
		$("#msg").html("Please enter code");
		$("#emailcode").focus();
		return false;
		}
		})
})
</script>
	