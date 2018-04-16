<!DOCTYPE html>
<html lang="en">
<head>
	<?php
	$system_name	=	$this->db->get_where('settings' , array('type'=>'system_name'))->row()->description;
	$system_title	=	$this->db->get_where('settings' , array('type'=>'system_title'))->row()->description;
	?>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Neon Admin Panel" />
	<meta name="author" content="" />
	
	<title><?php echo get_phrase('login');?> | <?php echo $system_title;?></title>
	

	<link rel="stylesheet" href="assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css">
	<link rel="stylesheet" href="assets/css/font-icons/entypo/css/entypo.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/neon-core.css">
	<link rel="stylesheet" href="assets/css/neon-theme.css">
	<link rel="stylesheet" href="assets/css/neon-forms.css">
	<link rel="stylesheet" href="assets/css/custom.css">

	<script src="assets/js/jquery-1.11.0.min.js"></script>

	<!--[if lt IE 9]><script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
	<link rel="shortcut icon" href="assets/images/favicon.png">
	
	<style>
		/*
		    Note: It is best to use a less version of this file ( see http://css2less.cc
		    For the media queries use @screen-sm-min instead of 768px.
		    For .omb_spanOr use @body-bg instead of white.
		*/
		
		@media (min-width: 768px) {
		    .omb_row-sm-offset-3 div:first-child[class*="col-"] {
		        margin-left: 25%;
		    }
		}
		
		.omb_login .omb_authTitle {
		    text-align: center;
			line-height: 300%;
		}
			
		.omb_login .omb_socialButtons a {
			color: white; // In yourUse @body-bg 
			opacity:0.9;
		}
		.omb_login .omb_socialButtons a:hover {
		    color: white;
			opacity:1;    	
		}
		.omb_login .omb_socialButtons .omb_btn-facebook {background: #3b5998;}
		.omb_login .omb_socialButtons .omb_btn-twitter {background: #00aced;}
		.omb_login .omb_socialButtons .omb_btn-google {background: #c32f10;}
		
		
		.omb_login .omb_loginOr {
			position: relative;
			font-size: 1.5em;
			color: #aaa;
			margin-top: 1em;
			margin-bottom: 1em;
			padding-top: 0.5em;
			padding-bottom: 0.5em;
		}
		.omb_login .omb_loginOr .omb_hrOr {
			background-color: #cdcdcd;
			height: 1px;
			margin-top: 0px !important;
			margin-bottom: 0px !important;
		}
		.omb_login .omb_loginOr .omb_spanOr {
			display: block;
			position: absolute;
			left: 50%;
			top: -0.6em;
			margin-left: -1.5em;
			background-color: white;
			width: 3em;
			text-align: center;
		}			
		
		.omb_login .omb_loginForm .input-group.i {
			width: 2em;
		}
		.omb_login .omb_loginForm  .help-block {
		    color: red;
		}
		
			
		@media (min-width: 768px) {
		    .omb_login .omb_forgotPwd {
		        text-align: right;
				margin-top:10px;
		 	}		
		}
	</style>
	
</head>
<body class="page-body login-page login-form-fall" data-url="http://neon.dev">


<!-- This is needed when you send requests via Ajax -->
<script type="text/javascript">
var baseurl = '<?php echo base_url();?>';
</script>

<div class="login-container">
	
	<div class="login-header login-caret">
		
		<div class="login-content" style="width:100%;">
			
			<a href="<?php echo base_url();?>" class="logo">
				<img src="uploads/logo.png" height="60" alt="" />
			</a>
			
			<p class="description">
            	<h2 style="color:#cacaca; font-weight:100;">
					<?php echo $system_name;?>
              </h2>
           </p>
			
			<!-- progress bar indicator -->
			<div class="login-progressbar-indicator">
				<h3>43%</h3>
				<span>logging in...</span>
			</div>
		</div>
		
	</div>
	
	<div class="login-progressbar">
		<div></div>
	</div>
	
	<div class="login-form">
		
		<div class="login-content" style="min-width:860px; ">
			
			<div class="form-login-error">
				<h3>Invalid login</h3>
				<p>Please enter correct email and password!</p>
			</div>
			
			
				
				
			    <div class="omb_login">
			    	<h3 class="omb_authTitle">Login or <a href="#">Sign up</a></h3>
					<div class="row omb_row-sm-offset-3 omb_socialButtons">
			    	    <div class="col-xs-4 col-sm-2">
					        <a href="#" class="btn btn-lg btn-block omb_btn-facebook">
						        <i class="fa fa-facebook visible-xs"></i>
						        <span class="hidden-xs">Facebook</span>
					        </a>
				        </div>
			        	<div class="col-xs-4 col-sm-2">
					        <a href="#" class="btn btn-lg btn-block omb_btn-twitter">
						        <i class="fa fa-twitter visible-xs"></i>
						        <span class="hidden-xs">Twitter</span>
					        </a>
				        </div>	
			        	<div class="col-xs-4 col-sm-2">
					        <a href="#" class="btn btn-lg btn-block omb_btn-google">
						        <i class="fa fa-google-plus visible-xs"></i>
						        <span class="hidden-xs">Google+</span>
					        </a>
				        </div>	
					</div>
			
					<div class="row omb_row-sm-offset-3 omb_loginOr">
						<div class="col-xs-12 col-sm-6">
							<hr class="omb_hrOr">
							<span class="omb_spanOr">or</span>
						</div>
					</div>
			
					<div class="row omb_row-sm-offset-3">
						<div class="col-xs-12 col-sm-6">	
							
							
						    <form method="post" role="form" id="form_login">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input type="text" class="form-control" name="email" placeholder="email address">
								</div>
								<span class="help-block"></span>
													
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock"></i></span>
									<input  type="password" class="form-control" name="password" placeholder="Password">
								</div>
			                    <span class="help-block">Password error</span>
			
								<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
							</form>
						</div>
			    	</div>
					<div class="row omb_row-sm-offset-3">
						<div class="col-xs-12 col-sm-3">
							<label class="checkbox">
								<input type="checkbox" value="remember-me">Remember Me
							</label>
						</div>
						<div class="col-xs-12 col-sm-3">
							<p class="omb_forgotPwd">
								<a href="#">Forgot password?</a>
							</p>
						</div>
					</div>	    	
				</div>
						
		
			
			
			<div class="login-bottom-links">
				<a href="<?php echo base_url();?>index.php?login/forgot_password" class="link">
					<?php echo get_phrase('forgot_your_password');?> ?
				</a>
			</div>
			
		</div>
		
	</div>
	
</div>


	<!-- Bottom Scripts -->
	<script src="assets/js/gsap/main-gsap.js"></script>
	<script src="assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js"></script>
	<script src="assets/js/bootstrap.js"></script>
	<script src="assets/js/joinable.js"></script>
	<script src="assets/js/resizeable.js"></script>
	<script src="assets/js/neon-api.js"></script>
	<script src="assets/js/jquery.validate.min.js"></script>
	<script src="assets/js/neon-login.js"></script>
	<script src="assets/js/neon-custom.js"></script>
	<script src="assets/js/neon-demo.js"></script>

</body>
</html>