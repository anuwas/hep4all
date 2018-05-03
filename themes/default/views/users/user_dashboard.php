	<div id="promo1">
		<div class="bg parallax-bg"></div>
		<div>
			<section class="container-fluid pad-top-main full-bg">
				<div class="row-fluid">
					<section class="container">

						<div class="row add-bottom-half">
							<article class="span12">
								
                               	 <article class="span4"><h1><span><a href="<?php echo Yii::app()->request->baseUrl; ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/HEP-01.png"/></a> </span> </h1></article>
                                  <article class="span8">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="right">
                                           <tr>
                                                <td colspan="6" align="right" class="ptop">Welcome: <a href="#"><?php echo Yii::app()->session['first_name']. " ".Yii::app()->session['last_name'];?></a> | <a href="<?php echo Yii::app()->request->baseUrl; ?>/users/logout">Log Out</a></td>
                                          </tr>
                                              <tr>
                                              <td class="md">&nbsp;</td>
                                                <td width="40%"><input name="search" type="text" placeholder="search"></td>
                                                <td width="2%">&nbsp;</td>
                                                <td width="25%"><select name="">
                                                    <option selected>All</option>
                                                    <option>Exercise</option>
                                                    <option>Members</option>
                                                </select></td>
                                                <td width="2%">&nbsp;</td>
                                                <td><a href="<?php echo Yii::app()->request->baseUrl; ?>" class="btn btn-reason">Go</a></td>
                                              </tr>
                                             
                                            </table>
                                      </article>                                  
                                  <div style="clear:both"></div>
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
                        
                        <article class="span2"> 
                            <div>
                               <div align="center"><strong><?php echo Yii::app()->session['first_name']. " ".Yii::app()->session['last_name'];?></strong></div>
                               <div align="center"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/member/blank-img-300x258.jpg" /></div>
                               <div class="odd selectedp">Profile</div>
                               <div class="odd">Exercises</div>
                               <div class="odd">Favorites</div>
                               <div class="odd">Routines</div>
                               <div class="odd">Following</div>
                               <div class="odd">HEP Status</div>
                               <div class="odd">New Exercise</div>
                            </div>
                        </article>
                        <article class="span10">
                        </article>
                        
						</div><!-- row : ends -->

					</section><!-- container : ends -->
				</div><!-- row-fuild : ends -->
			</section> <!-- container-fluid : ends-->	
		</div> <!-- page : ends -->
	</div>
