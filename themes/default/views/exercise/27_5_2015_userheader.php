			<section class="container-fluid pad-top-main full-bg">
				<div class="row-fluid">
					<section class="container">

						<div class="row add-bottom-half">
							<article class="span12">
								
                               	 <article class="span4"><h1><span><a href="<?php echo Yii::app()->request->baseUrl;?>/users/index"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/HEP-01.png"/></a> </span> </h1></article>
                                  <article class="span8">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="right">
                                           <tr>
                                                <td colspan="6" class="ptop">
                                                <div>
                                                <article class="span6 link2"> &nbsp;</article>
                                                <article class="span6 link"> User: <a href="<?php echo Yii::app()->request->baseUrl; ?>/user"><?php echo Yii::app()->session['first_name']. " ".Yii::app()->session['last_name'];?></a> | <a href="<?php echo Yii::app()->request->baseUrl; ?>/users/logout">Log Out</a></article>
                                                </div>
                                               </td>
                                          </tr>
                                          <?php 
                                          $srctext='';
                                          if(isset($_REQUEST['search_text']))
                                          {
                                          	$srctext=$_REQUEST['search_text'];
                                          }
                                          $search_option='All';
                                          if(isset($_REQUEST['search_option']))
                                          {
                                          	$search_option=$_REQUEST['search_option'];
                                          }
                                          ?>
                                              <tr>
                                              <form name="search_form" id="search_form" method="post" action="<?php echo Yii::app()->request->baseUrl; ?>/exercise/search">
                                              <td class="md">&nbsp;</td>
                                                <td width="40%"><input name="search_text" id="search_text" type="text" placeholder="search" value="<?php echo $srctext;?>"></td>
                                                <td width="2%">&nbsp;</td>
                                                <td width="25%"><select name="search_option" id="search_option">
                                               
                                                    <option value="All" <?php if($search_option=='All'){?> selected="selected"<?php } ?>>All</option>
                                                    <option value="Exercise" <?php if($search_option=='Exercise'){?> selected="selected"<?php } ?>>Exercise</option>
                                                    <option value="Members" <?php if($search_option=='Members'){?> selected="selected"<?php } ?>>Members</option>
                                                    
                                                    
                                                </select></td>
                                                <td width="2%">&nbsp;</td>
                                                <td>
                                                <input type="submit" name="search_submit" id="search_submit" value="Go" class="btn btn-reason">
                                                </td>
                                                </form>
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
