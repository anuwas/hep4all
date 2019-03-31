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
                                                <article class="span6 link"><?php echo Yii::app()->session['first_name']. " ".Yii::app()->session['last_name'];?> | <a href="<?php echo Yii::app()->request->baseUrl; ?>/user/profile">Manage Account</a> | <a href="<?php echo Yii::app()->request->baseUrl; ?>/users/logout">Log Out</a></article>
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
                                              <form name="search_form" id="search_form" method="get" action="">
                                              <td class="md">&nbsp;</td>
                                                <td width="25%">&nbsp;</td>
                                                <td width="2%">&nbsp;</td>
                                                <td width="40%"><input name="search_text" id="search_text" type="text" placeholder="Search" value="<?php echo $srctext;?>" autocomplete="off">
                                                <div id="suggesstion-box"></div>
                                                </td>
                                                <td width="2%">&nbsp;</td>
                                                <td>
                                                <input type="submit" name="search_submit" id="search_submit" value="Go" class="btn btn-reason">
                                                <div id="suggesstion-box"></div>
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
<style>
#country-list{float:left;list-style:none;margin:0;padding:0;width:190px;}
#country-list li{padding: 10px; background:#FAFAFA;border-bottom:#F0F0F0 1px solid;}
#country-list li:hover{background:#F0F0F0;}
</style>
			<script>
$(document).ready(function(){
	var srctext=$("#search_text").val();
	if(srctext!=''){
		$("#search_text").focus();
		}
	$("#search_text").keyup(function(){
		$.ajax({
		type: "POST",
		url: "<?php echo Yii::app()->request->baseUrl; ?>/ajax/exerciseserach",
		data:'keyword='+$(this).val(),
		/*
		beforeSend: function(){
			$("#search_text").css("background","#FFF url(LoaderIcon.gif) no-repeat 165px");
		},
		*/
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			//$("#search_text").css("background","#FFF");
		}
		});
	});
});

function selectCountry(val) {
$("#search_text").val(val);
$("#suggesstion-box").hide();
$("#search_form").submit();
}
</script>
			
			
