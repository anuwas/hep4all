<div id="promo1">
		<div class="bg parallax-bg"></div>
		<div>
			<section class="container-fluid pad-top-main full-bg">
				<div class="row-fluid">
					<section class="container">

						<div class="row add-bottom-half">
							<article class="span12">
								<h1><span><a href="http://www.hep4all.com/"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/HEP-01.png"/></a> </span> </h1>
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
                        <article class="span12">
							<p class="promo-text"><span>It's fast and free to get started.</span><br>
 
                        
                            Get building in minutes with your own HEP4all account.
                            </p>	
                            			
                            </article>
                            <div style="float: right;margin-right:462px;font-weight: bold;color: red">
                            <?php  
                            if(isset(Yii::app()->session['msg']))
                            {
	                            echo Yii::app()->session['msg'];
	                            Yii::app()->session->destroy(Yii::app()->session['msg']);
	                            if(Yii::app()->session['status']==1){
	                            	Yii::app()->session->destroy(Yii::app()->session['status']);
	                            	header( "refresh:5;url=".Yii::app()->request->baseUrl."/#whyhep4ll");
	                            }
                            }
                            ?>		
                            </div>	
                        <article class="span2"></article>
                            
                        <article class="span7">
                        <form name="regForm" id="regForm" method="post">
                       
                        <div id="fname"  class="alert alert-error error">
                        First Name must not be empty
                        </div>
                        <div id="lname"  class="alert alert-error error">
                        Last Name must not be empty
                        </div>
                        <div id="nemail" class="alert alert-error  error">
                        Please Enter a valid Email
                        </div>
                        <div id="npass" class="alert alert-error  error">
                        Please Enter password
                        </div>
                        <div id="nrepass" class="alert alert-error  error">
                        Please Enter Confrim password
                        </div>
                        
                        <div id="nnotmatch" class="alert alert-error  error">
                        Password and  Confrim password not matching
                        </div>
                        <div id="termsv" class="alert alert-error  error">
                        Please check Terms Of Use
                        </div>
                        
                        <table width="100%" align="left" border="0" cellspacing="0" cellpadding="5">
                              <tr>
                                <td width="50%"><input name="first-name" id="first-name" type="text" placeholder="First Name"> </td>
                                <td width="1%">&nbsp;</td>
                                <td width="50%"><input name="last-name" id="last-name" type="text" placeholder="Last Name"></td>
                              </tr>                             
                             
                              <tr>
                                <td colspan="3"><input name="email" id="email" type="text" placeholder="Email Address" style="width:96%;"></td>
                              </tr>
                              <tr>
                                <td><input name="pass" id="pass" type="password" placeholder="Create Password"></td>
                                <td>&nbsp;</td>
                                <td><input name="repass" id="repass" type="password" placeholder="Repeat Password"> </td>
                              </tr>
                              <tr>
                              <td colspan="3"><div>&nbsp;<input type="checkbox" name="termscheck" id="termscheck"> I agree to the <a href="<?php echo Yii::app()->request->baseUrl; ?>/users/terms" target="_blank">Terms Of Use </a></div></td>
                              </tr>
                              <tr><td style="height:5px;"></td></tr>
                             <tr>
                                <td colspan="3"><p align="center"><button type="submit" name="submit" id="submit" class="btn btn-reason">Submit </button> &nbsp; <a href="http://www.hep4all.com/" class="btn btn-reason2">Cancel</a></p></td>
                                
                              </tr>
                        </table>
                        <div style="height:8px;"></div>
                        
                        </form>
                        </article>
						</div><!-- row : ends -->

					</section><!-- container : ends -->
				</div><!-- row-fuild : ends -->
			</section> <!-- container-fluid : ends-->	

			
		</div> <!-- page : ends -->
	</div>