<div id="promo1">
		<div class="bg parallax-bg"></div>
		<div>
			<section class="container-fluid pad-top-main full-bg">
				<div class="row-fluid">
					<section class="container">

						<div class="row add-bottom-half">
							<article class="span12">
								
                               	 <article class="span4"><h1><span><a href="<?php echo Yii::app()->request->baseUrl;?>/users/index"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/HEP-01.png"/></a> </span> </h1></article>
                                  <article class="span8">
                                        <table width="100%" border="0" cellspacing="0" cellpadding="0" align="right">
                                           
                                              <tr>
                                               <td align="right"><h3>EXERCISE LOG</h3>
                                               <h3 style="font-size:16px; line-height:14px;">&nbsp;<br><span style="font-size:13px;">Provided By <?php echo $model->first_name.' '.$model->last_name;?></span> <br><span style="font-size:13px;">Email Id: <?php echo $model->email;?></span></h3></td>
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

			<section class="container-fluid full-bg">
				<div class="row-fluid">
                <div style="height:20px;"></div>
                <section class="container topm">
						<div class="row add-top-half add-bottom-half">
                         <article class="span12"> 
                         <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td align="center" style="background:#CCC;"><h3 style="line-height:25px; margin:5px 0;">Exercise </h3></td>
                            <td width="5">&nbsp;</td>
                            <td width="70%" align="center" style="background:#CCC;"><h3 style="line-height:25px; margin:5px 0;">Days of The Week to this</h3></td>
                          </tr>
                          <tr>
                            <td align="center" colspan="2">&nbsp;</td>
                            <td align="center">
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                               <tr><td colspan="28">&nbsp;</td></tr>
                                  <tr style="border:1px solid #000;">
                                    <td class="tabtext">M</td>
                                    <td class="tabtext">T</td>
                                    <td class="tabtext">W</td>
                                    <td class="tabtext">T</td>
                                    <td class="tabtext">F</td>
                                    <td class="tabtext">S</td>
                                    <td class="tabtext">S</td>
                                    <td class="tabtext">M</td>
                                    <td class="tabtext">T</td>
                                    <td class="tabtext">W</td>
                                    <td class="tabtext">T</td>
                                    <td class="tabtext">F</td>
                                    <td class="tabtext">S</td>
                                    <td class="tabtext">S</td>
                                    <td class="tabtext">M</td>
                                    <td class="tabtext">T</td>
                                    <td class="tabtext">W</td>
                                    <td class="tabtext">T</td>
                                    <td class="tabtext">F</td>
                                    <td class="tabtext">S</td>
                                    <td class="tabtext">S</td>
                                    <td class="tabtext">M</td>
                                    <td class="tabtext">T</td>
                                    <td class="tabtext">W</td>
                                    <td class="tabtext">T</td>
                                    <td class="tabtext">F</td>
                                    <td class="tabtext">S</td>
                                    <td class="tabtext">S</td>
                                  </tr>
                                </table>
                                </td>
                          </tr>
                         
                          	<?php foreach ($printexercise as $value) { ?>
                          		
                          <tr>
                            <td align="left" colspan="2" style="border:1px solid #000; padding-left:10px;"> <strong style=" text-align:center;"> <?php echo $value->exercise->exercise_title; ?></strong></td>
                            <td align="center">
                              <table width="100%" border="0" cellspacing="0" cellpadding="0">
                               
                                  <tr style="border:1px solid #000;">
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                  </tr>
                                  
                                  <tr style="border:1px solid #000;">
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                    <td class="tabtext">&nbsp;</td>
                                  </tr>
                                </table>
                                </td>
                          </tr>
                          <?php } ?>
                          <tr>
                          <td colspan="3">&nbsp;</td>
                          </tr>
                          <tr>
                          <td colspan="3" align="right"><input type="button" name="print_button" id="print_button" value="Print"> &nbsp; <input action="action" type="button" value="Back" onclick="history.go(-1);" /> </td>
                          </tr>
                         </table>
                         </article>  
                        </div>
                </section>
					<!-- container : ends -->
                         
				</div><!-- row-fuild : ends -->
			</section> <!-- container-fluid : ends-->	

			
		</div> <!-- page : ends -->
	</div>
    <style type="text/css">
    .tabtext{ text-align:center; font-size:12px; border:1px solid #000; width:12px;}
    </style>
<script type="text/javascript">
$(document).ready(function(){
	$("#print_button").click(function(){
		window.open('printexercisediary/<?php echo $model->user_id;?>','_blank');
	})
	
});
</script>
