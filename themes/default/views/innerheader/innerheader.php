<article class="span12">
								
                               	 <article class="span4"><h1><span><a href="<?php echo Yii::app()->request->baseUrl; ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/HEP-01.png"/></a> </span> </h1></article>
                                  <article class="span8">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="right">
                                           <tr>
                                                <td colspan="6" class="ptop">
                                                <div>
                                                <article class="span6 link2"></article>
                                                <article class="span6 link"> User: <a href="#"><?php echo Yii::app()->session['first_name']. " ".Yii::app()->session['last_name'];?></a> | <a href="<?php echo Yii::app()->request->baseUrl; ?>/users/logout">Log Out</a></article>
                                                </div>
                                               </td>
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
