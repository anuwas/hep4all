<div id="promo1">
		<div class="bg parallax-bg"></div>
		<div>
			<?php $this->renderPartial('/header/userheader');?>
			<section class="container-fluid pad-bottom-main full-bg">
				<div class="row-fluid">
					<section class="container">

						<div class="row add-top-half add-bottom-half">
                        
                        <?php include 'leftuserprofile.php';?>
                        <article class="span9">
                       <?php include 'menu.php';?>
                               <div>
                                 <table width="100%" border="0" cellspacing="4" cellpadding="4">
                                  <tr>
                                    <td width="55" align="left"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/u.png"/></td>
                                    <td valign="middle"><h3>EDIT PRODUCT</h3></td>
                                    <td align="right">&nbsp;</td>
                                  </tr>
                                </table>
                                <table width="100%" border="0" cellspacing="4" cellpadding="4">
                                  <tr>
                                    <td><hr></td>
                                  </tr>
                                </table>       
                               </div>
                         <div>
                         <article class="span1"></article>
                           <article class="span9">
                           <form name="exerForm" id="exerForm" action="<?php echo Yii::app()->request->baseUrl; ?>/product/edit/<?php echo $product->product_id;?>" enctype="multipart/form-data" method="post">
                           <input name="Exercises[user_id]" id="Exercises_user_id" type="hidden" value="<?php echo $model->user_id;?>">
                        <div id="product_name_error_masg" class="alert alert-error error">
                        Please insert product name
                        </div>
                        <div id="product_link_erroe_msg"  class="alert alert-error error">
                        Please insert link
                        </div>
                        <div id="product_price_erroe_msg" class="alert alert-error  error">
                        Please insert price
                        </div>
                        <div id="product_category_error_msg" class="alert alert-error  error">
                        Please Select Category
                        </div>
                        
                        <table width="100%" align="left" border="0" cellspacing="0" cellpadding="5">
                              
                            
                              <tr>
                                <td colspan="3"><input name="Product[product_name]" id="Product_product_name" type="text" placeholder="Product Name" value="<?php echo $product->product_name;?>"></td>
                              </tr>
                              <tr>
                                <td colspan="3"><textarea id="Product_product_desc" name="Product[product_desc]" cols="50" style="width: 492px;" rows="7" placeholder="Product Description"><?php echo $product->product_desc;?></textarea></td>
                              </tr>
                              <tr>
                               <td colspan="3">
                               <select id="Product_category_id" name="Product[category_id]" onchange="" >
                                <option value="-1">--- Category ---</option>
                                <?php foreach ($productcategory as $value) { ?>
                                
                                <option value="<?php echo $value->product_category_id;?>" <?php if($value->product_category_id==$product->category_id){?> selected="selected"<?php } ?>><?php echo $value->product_category_name;?></option>
                               
                                <?php } ?>
                                </select>
                               </td>
                              </tr>
                                <tr>
                               <td colspan="3"><input name="Product[product_link]" id="Product_product_link" type="text" placeholder="Product Link" value="<?php echo $product->product_link;?>"></td>
                              </tr>
                              <tr>
                               <td colspan="3"><input name="Product[price]" id="Product_price" type="text" placeholder="Price" value="<?php echo $product->price;?>"></td>
                              </tr>
                                                        
                             
                              
                              <tr>
                                  <td colspan="3">
                                  <div style="padding: 2px;">
                                  <img alt="" src="<?php echo Yii::app()->request->baseUrl; ?>/upload/product/thumb/<?php echo $product->product_image;?>" width="100px" height="100px"><br>
                                  </div>
                                  <input id="uploadFile1" placeholder="Picture 1" disabled="disabled" />
                                <div class="fileUpload btn btn-primary">
                                    <span>Upload File</span>
                                    <input id="uploadBtn1" type="file" class="upload" name="Product[product_image]" />
                                    <input id="ytExercises_picture_1" type="hidden" value="<?php echo $product->product_image;?>" name="Product[product_image]">
                                    
                                </div>
                                <br>
                                <br>
                                <span style="position: absolute;margin-left: 4px;margin-top: -15px;">Standard Image Size (820 X 720)px</span>
                                </td>
                                  </tr> 
                                
                               <tr>
                                <td colspan="3"><hr></td>
                               </tr> 
                              
                             <tr>
                                <td colspan="3"><p align="center"><button type="submit" name="submit" id="submit" class="btn btn-reason">Save </button> &nbsp; <input name="reset_button" id="reset_button" type="reset" value="Cancel" class="btn btn-reason2"></p></td>
                                
                              </tr>
                        </table>
                        </form></article>
                         </div>
                            <div class="space"></div> 
                        </article>
                        
						</div><!-- row : ends -->

					</section><!-- container : ends -->
                            
				</div><!-- row-fuild : ends -->
			</section> <!-- container-fluid : ends-->	

			
		</div> <!-- page : ends -->
	</div>
<script>
	document.getElementById("uploadBtn1").onchange = function () {
    document.getElementById("uploadFile1").value = this.value;
};
	
$(document).ready(function(){

	$("#Product_price").keyup(function(){
		var price=$(this).val();
		if(!$.isNumeric(price))
		{
			alert("Please Insert number only");
			$(this).val('');	
		}	
	})
			

	$("#exerForm").submit(function(){
		
	var mcategory=$("#Product_product_name").val();
	if(mcategory=="")
	{
		$("#product_name_error_masg").show();
		$('html, body').animate({scrollTop : 0},800);
		return false;
		}
	else
	{$("#product_name_error_masg").hide();
		}
	var postion=$("#Product_product_link").val();
	if(postion=="")
	{
		$("#product_link_erroe_msg").show();
		$('html, body').animate({scrollTop : 0},800);
		return false;
		}
	else
	{$("#product_link_erroe_msg").hide();
		}

	var extype=$("#Product_price").val();
	if(extype=="")
	{
		$("#product_price_erroe_msg").show();
		$('html, body').animate({scrollTop : 0},800);
		return false;
		}
	else
	{
		$("#product_price_erroe_msg").hide();
		}
	var category_id=$("#Product_category_id").val();
	
	if(category_id=="-1")
	{
		$("#product_category_error_msg").show();
		$('html, body').animate({scrollTop : 0},800);
		return false;
		}
	else
	{
		$("#product_category_error_msg").hide();
		}
		})

		$("#reset_button").click(function(){
			window.location.href='<?php echo Yii::app()->request->baseUrl?>/product/add';
			})
})
</script>