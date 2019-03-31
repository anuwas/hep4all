<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;
?>
	<div id="intro">
		<div class="links"><a href="#whyhep4ll"><img alt="" title=""  id="intro-globe" src="<?php echo Yii::app()->request->baseUrl; ?>/images/intro.png"/></a></div>
        
	</div> <!-- end intro -->
	
	<div id="promo1" class="promo-parallax">
		<div class="bg parallax-bg"></div>
		<div class="page">

			<h6 id="whyhep4ll" class="scroll-milestone"></h6>

			<section class="container-fluid pad-top-main full-bg">
				<div class="row-fluid">
					<section class="container">

						<div class="row add-bottom-half">
							<article class="span12">
								<h1><span><a href="<?php echo Yii::app()->request->baseUrl; ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/HEP-01.png"/></a> </span> </h1>
                                <h2 id="intro-heading2">It's fast and free to get started...<br>
                                    <span>Get building in minutes with your own HEP4all account sponsored by <a href="http://emr4all.com/">EMR4all</a>...<br>
                           			 A comprehensive practice management solution that is powering the next generation of healthcare providers.</span>
                            	</h2>  
                         <div class="blackline"></div> 
                      <div class="main-heading"></div>
							</article>
						</div><!-- row : ends -->

					</section>
				</div>
			</section>

			<section class="container-fluid full-bg">
				<div class="row-fluid">
					<section class="container">

						<div class="row">
							<article class="span12">
								
							<div>&nbsp;</div>
                            </article>
						</div><!-- row : ends -->

					</section>
				</div>
			</section>

			<section class="container-fluid pad-bottom-main full-bg">
				<div class="row-fluid">
					<section class="container">

						<div class="row add-top-half add-bottom-half">
							<article class="span4 blue-radius">
								<h3 class="inner-caps">Sign In To HEP4all</h3>
								<div style="color: red;font-weight: bold">
								 <?php  
                           			 echo Yii::app()->session['msg'];
                            		 Yii::app()->session->destroy(Yii::app()->session['msg']);
                            	?>	
								</div>
								
								<form name="loginForm" id="loginForm"  method="post" action="<?php echo Yii::app()->request->baseUrl; ?>/users/login">
                                <div id="memail"  class="alert alert-error error">
                                Email must not be empty
                                </div>
                                <div id="vpass" class="alert alert-error  error">
                                Please Enter a valid password
                                </div>
                                <p><input name="email" id="email" type="text" placeholder="Email" value="<?php echo $email;?>"></p>
                                <p><input name="pass" id="pass" type="password" placeholder="Password"></p>
                                <p><input name="rember" type="checkbox" value="1"> Remember Email</p>
                                <p> <button type="submit" name="submit" id="submit" class="btn btn-reason loginsubmitbutnclass">Sign In </button> 
                                <a href="<?php echo Yii::app()->request->baseUrl; ?>/users/forgotpassword">Change or Forgot Password? </a></p>
                                <p></p></form>
                                
							</article>

							<article class="span4" style="padding-left:30px;">
								<h3 class="inner-caps" style=" height:40px;"></h3>
                               
                                <div style="height:20px;"></div>
								<p>
								
                                    <a href="javascript:void(0)" title="Log in using your Facebook account" onclick="fbookloginfunction()"> <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/icon-facebook2.png"/></a> 
                                    <!--  
                                    <fb:login-button scope="public_profile,email" onlogin="checkLoginState();" data-size="xlarge">Facebook Log in &nbsp;&nbsp;
</fb:login-button>       
-->        
                                    <a href="javascript:void(0)" title="Log in using your Google account" onclick="login()"> <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/icon-google2.png" style="margin:8px 0"/></a>
                                    
                                    
                                  <!--    <a href="<?php echo Yii::app()->request->baseUrl; ?>/users/twetterlogin"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/icon-twitter2.png"/></a>-->   
                                   <div id="alluser" style=" background:#6789AF; color:#fff; margin-top:-8px; padding:12px; font-size:18px; width:79%; text-align:center; border-radius:3px; border-radius:3px;">Number of users: <?php echo $countuser;?></div>          
                                </p>
                                
   <!--                              
<span id="signinButton">
  <span
    class="g-signin"
    data-callback="signinCallback"
    data-clientid="178308215411-mde9mjf5mknl2coamm0mmbj3ucj5l22l.apps.googleusercontent.com"
    data-cookiepolicy="single_host_origin"
    data-requestvisibleactions="http://schema.org/AddAction"
    data-scope="https://www.googleapis.com/auth/plus.login">
  </span>
</span>
-->
<!--  <input type="button"  value="Login" onclick="login()" />
<input type="button"  value="Logout" onclick="logout()" />-->
 
<div id="profile"></div>
<script type="text/javascript">
 
function logout()
{
    gapi.auth.signOut();
    location.reload();
}
function login() 
{
  var myParams = {
    'clientid' : '178308215411-pu2duqq870cevp8k29uhgumli93ao21k.apps.googleusercontent.com',
    'cookiepolicy' : 'single_host_origin',
    'callback' : 'loginCallback',
    'approvalprompt':'force',
    'scope' : 'https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/plus.profile.emails.read'
  };
  gapi.auth.signIn(myParams);
}
 
function loginCallback(result)
{
    if(result['status']['signed_in'])
    {
        var request = gapi.client.plus.people.get(
        {
            'userId': 'me'
        });
        request.execute(function (resp)
        {
            var email = '';
            if(resp['emails'])
            {
                for(i = 0; i < resp['emails'].length; i++)
                {
                    if(resp['emails'][i]['type'] == 'account')
                    {
                        email = resp['emails'][i]['value'];
                    }
                }
            }
 
            var str = "Name:" + resp['displayName'] + "<br>";
            str += "Image:" + resp['image']['url'] + "<br>";
            str += "<img src='" + resp['image']['url'] + "' /><br>";
 
            str += "URL:" + resp['url'] + "<br>";
            str += "Email:" + email + "<br>";
            //document.getElementById("profile").innerHTML = str;

            var namearr=resp['displayName'].split(" ");
            var first_name=namearr[0];
            var last_name=namearr[1];
            var semail=email;
            $.ajax
            ({
                type: "POST",
                url: "<?php echo Yii::app()->request->baseUrl; ?>/users/gpluslogin",
                data: {first_name:first_name,last_name:last_name,semail:email},
               //cache: false,
                success: function(msg)
                {
                	switch(msg)
		              {
		              case 'register':
		            	  alert("Please check email to activate your account!");
			              break;

		              case 'notactivated':
		            	  alert("Already registered !Please check email to activate your account!");
			              break;

		              case 'login':
		            	  window.location.href='<?php echo Yii::app()->request->baseUrl; ?>/users/index';
		            	  break;
			            }
                }
				 
            });
        });
 
    }
 
}
function onLoadCallback()
{
    gapi.client.setApiKey('AIzaSyBZihKWJuR0ZdRqm6baSrRvwtcDAbyvtP0');
    gapi.client.load('plus', 'v1',function(){});
}
 
    </script>
    <div id="fb-root"></div>
<script type="text/javascript">
function fbookloginfunction()
{
	FB.login(function(response) {
		   if (response.authResponse) {
		     //console.log('Welcome!  Fetching your information.... ');
		     FB.api('/me', function(response) {
		       //console.log('Good to see you, ' + response.name + '.');
		    	 var first_name=response.first_name;
		          var last_name=response.last_name;
		          var semail=response.email;

		          $.ajax
		          ({
		              type: "POST",
		              url: "<?php echo Yii::app()->request->baseUrl; ?>/users/gpluslogin",
		              data: {first_name:first_name,last_name:last_name,semail:semail},
		             //cache: false,
		              success: function(msg)
		              {
			              switch(msg)
			              {
			              case 'register':
			            	  alert("Please check email to activate your account!");
				              break;

			              case 'notactivated':
			            	  alert("Already registered !Please check email to activate your account!");
				              break;

			              case 'login':
			            	  window.location.href='<?php echo Yii::app()->request->baseUrl; ?>/users/index';
			            	  break;
				            }
		              }
						 
		          });
		     });
		   } else {
		     console.log('User cancelled login or did not fully authorize.');
		   }
		 });
	}
//This is called with the results from from FB.getLoginStatus().
function statusChangeCallback(response) {
  console.log('statusChangeCallback');
  console.log(response);
  // The response object is returned with a status field that lets the
  // app know the current login status of the person.
  // Full docs on the response object can be found in the documentation
  // for FB.getLoginStatus().
  if (response.status === 'connected') {
    // Logged into your app and Facebook.
    testAPI();
  } else if (response.status === 'not_authorized') {
    // The person is logged into Facebook, but not your app.
   // document.getElementById('status').innerHTML = 'Please log ' +'into this app.';
      
  } else {
    // The person is not logged into Facebook, so we're not sure if
    // they are logged into this app or not.
   // document.getElementById('status').innerHTML = 'Please log ' + 'into Facebook.';
     
  }
}

// This function is called when someone finishes with the Login
// Button.  See the onlogin handler attached to it in the sample
// code below.
function checkLoginState() {
  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });
}

window.fbAsyncInit = function() {
FB.init({
  appId      : '653936461381889',
  cookie     : true,  // enable cookies to allow the server to access 
                      // the session
  xfbml      : false,  // parse social plugins on this page
  version    : 'v2.1' // use version 2.1
});

// Now that we've initialized the JavaScript SDK, we call 
// FB.getLoginStatus().  This function gets the state of the
// person visiting this page and can return one of three states to
// the callback you provide.  They can be:
//
// 1. Logged into your app ('connected')
// 2. Logged into Facebook, but not your app ('not_authorized')
// 3. Not logged into Facebook and can't tell if they are logged into
//    your app or not.
//
// These three cases are handled in the callback function.

FB.getLoginStatus(function(response) {
  statusChangeCallback(response);
});

};

// Load the SDK asynchronously
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

// Here we run a very simple test of the Graph API after login is
// successful.  See statusChangeCallback() for when this call is made.
function testAPI() {
  console.log('Welcome!  Fetching your information.... ');
  FB.api('/me', function(response) {
   // console.log('Successful login for: ' + response.name);
    //document.getElementById('status').innerHTML ='Thanks for logging in, ' + response.name + '!';
      
    	 
  });
}
</script>

<!--
  Below we include the Login Button social plugin. This button uses
  the JavaScript SDK to present a graphical Login button that triggers
  the FB.login() function when clicked.
-->

<div id="status">
</div>
							</article>

							<article class="span4">
								<h3 class="inner-caps">Features:</h3>
									<ul>
                                        <li>No Software Required</li>
                                        <li>Over 1,000 Videos Available</li>
                                        <li>Add Your Own Photos and Videos</li>
                                        <li>Customize Exercise Text Instructions</li>
                                        <li>Create and Save Programs</li>
                                        <li>Print or Email Unlimited Programs Customized With Your Companies Information</li>
                                    </ul>
                                    <div><a href="<?php echo Yii::app()->request->baseUrl; ?>/users/register" class="btn btn-reason">Sign Up</a>
										<a href="<?php echo Yii::app()->request->baseUrl; ?>/help" class="btn btn-reason">Help</a>
                                    </div>
							</article>
                            <div style="height:90px; clear:both;"></div>
						</div><!-- row : ends -->

					</section><!-- container : ends -->
				</div><!-- row-fuild : ends -->
			</section> <!-- container-fluid : ends-->	

			
		</div> <!-- page : ends -->
	</div>
	<!-- enter code area -->
    <div class="page">
	<section class="container-fluid pad-bottom-main full-bg">
				<div class="row-fluid">
					<section class="container">
						<div class="row add-bottom-half">
							<article class="span12">
								<h1><span><a href="<?php echo Yii::app()->request->baseUrl; ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/HEP-01.png"/></a> </span> </h1>
                                  
                         <div class="blackline"></div> 
                      <div class="main-heading"></div>
							</article>
						</div>
                        
						<div class="row add-top-half add-bottom-half">
                        <article class="span4"></article>
							<article class="span4 blue-radius">
								<h3 class="inner-caps">Please Enter Your Code</h3>
								
								<div id="msg" style="display: none;color: red;font-weight: bold;">
								
								</div>
								<form action="<?php echo Yii::app()->request->baseUrl; ?>/exercise/checkprintexercisetemplate" name="code_form" id="code_form" method="post">
								<p><input name="emailcode" id="emailcode" type="text" placeholder="Please Enter Your Code"></p>
                                <p style=" height:1px;"></p>
                                <div><input name="login" id="login" type="submit" value="GO" class="btn btn-reason"> </div>
                                </form>
							</article>

							
						</div><!-- row : ends -->
					
					</section><!-- container : ends -->
				</div><!-- row-fuild : ends -->
			</section> <!-- container-fluid : ends-->	
			<script type="text/javascript">
$(document).ready(function(){
	//login validation
	
	
	//email code validation
	$("#code_form").submit(function(){
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
	<!-- end enter code area -->
  </div>  
    
            
<div id="promo5">
		
		<div class="page">

			<h6 id="contact" class="scroll-milestone"></h6>

			<section class="container-fluid pad-top-main full-bg">
				<div class="row-fluid">
					<section class="container">

						<div class="row add-bottom-half">
							<article class="span12">
								<h1><span>Contact </span>Us</h1>
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
							<div class="span8 contact"><!--Begin page content column-->


                    <div class="alert success">
                        Well done! You successfully read this important alert message. 
                    </div>
                    
                      
					<h2 class="inner-caps ">Send a message</h2>
					
                    <form name="myform" id="contactForm" action="<?php echo Yii::app()->request->baseUrl; ?>/home/contact" enctype="multipart/form-data" method="post">  

                        <div id="fname"  class="alert alert-error error">
                        Name must not be empty
                        </div>
                        <div id="fmail" class="alert alert-error  error">
                        Please provide a valid email
                        </div>
                        <div id="fmsg" class="alert alert-error  error">
                        Message should not be empty
                        </div>

                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-user"></i></span>
                            <input class="span3 offset1" required   size="16" type="text" name="name" id="name" placeholder="Name">
                        </div>
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-envelope"></i></span>
                            <input class="span4" required  size="16" type="email" name="email" id="email" placeholder="Email Address">
                        </div>
                        <textarea name="message" id="message" required  id="msg" class="span10" placeholder="Message"></textarea>
                        <div style="height:5px;"></div>
                        <button type="submit" name="submit" id="submit" class="btn btn-reason">Send Message</button>
                    </form>
           
            </div> <!--span8 End-->

        <!-- Sidebar
        ================================================== --> 
        <div class="span4 sidebar page-sidebar"><!-- Begin sidebar column -->
            <h2 class="inner-caps ">Get in touch with</h2>
            <address class="remove-bottom pad-bottom-half">
            <strong>HEP4all</strong><br/> 
            4205 San Felipe Road #100 San Jose, CA 95135
            </address>
            <ul class="social-icons">
            	<li><span><img alt="" title=""  src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/s01.png"/></span><a href="#">855-367-4932</a></li>
            	<li><span><img alt="" title=""  src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/s02.png"/></span><a href="mailto:info@hep4all.com">info@hep4all.com</a></li>
            	<li><span><img alt="" title=""  src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/s03.png"/></span><a href="#">find us on facebok</a></li>
            	<li><span><img alt="" title=""  src="<?php echo Yii::app()->request->baseUrl; ?>/images/icons/s04.png"/></span><a href="#">@username</a></li>
            </ul>

        </div><!-- span4 / End sidebar column -->
						</div><!-- row : ends -->

					</section><!-- container : ends -->
				</div><!-- row-fuild : ends -->
			</section> <!-- container-fluid : ends-->	

			
		</div> <!-- page : ends -->
	</div>
	
	
 <script type="text/javascript">
      (function() {
       var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
       po.src = 'https://apis.google.com/js/client.js?onload=onLoadCallback';
       var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
     })();
</script>