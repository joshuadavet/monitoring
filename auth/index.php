<?php
	session_start();
	if(!empty($_SESSION['user_id']))
	{
		header('Location: ../');
	}
	if(empty($_GET['login_type'])){
		header('Location: ../');
	}
	else{
		if( $_GET['login_type'] != "student" and  $_GET['login_type'] != "parent" and $_GET['login_type'] != "teacher" ){
			header('Location: ../');
		}
		
	}
?>

<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
<meta charset="utf-8"/>
<title>ICNHS | Login</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<meta name="MobileOptimized" content="320">
<!-- BEGIN GLOBAL MANDATORY STYLES -->
 <link href="../lib/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="../lib/css/bootstrap.min.css">
<link href="../lib/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="../lib/css/select2/select2_conquer.css"/>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="../lib/css/style-conquer.css" rel="stylesheet" type="text/css"/>
<link href="../lib/css/style.css" rel="stylesheet" type="text/css"/>
<link href="../lib/css/style-responsive.css" rel="stylesheet" type="text/css"/>
<link href="../lib/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="../lib/css/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="../lib/css/login.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="../favicon.html"/>
</head>
<!-- BEGIN BODY -->
<body class="login">
<div class="logo">
		
	</div>
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGO -->
	<div id="logos">
		<center> 
			<img src="../lib/img/logo.png" alt="logo" id="imgLogo" class="img-responsive" wi="" style="width: 164px;">
		</center>
	</div>
<!-- END LOGO -->
	<!-- BEGIN LOGIN FORM -->
	
		<h3 class="page-title">
					GRADE MONITORING SYSTEM <BR><small>Iligan City National High School</small>
					</h3>
		<div class="alert alert-error display-hide">
			<button class="close" data-close="alert"></button>
			<span>
				 Enter any username and password.
			</span>
		</div>
		<div id="erro">
			
			
		</div>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Username</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" id="username"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" id="password"/>
			</div>
		</div>
		<div class="form-actions">
			<button type="button" onclick="login(<?=isset($_GET['login_type']) ? "'".$_GET['login_type']."'" : ""?>)" class="btn btn-info pull-right">
			Login </button>
		</div>
		
	
	<!-- END LOGIN FORM -->
	
	
</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div class="copyright">
	 2018 &copy; Iligan City, Lanao Del Norte. <BR>
	<small> DEVELOPED BY <a href="http://facebook.com/jeepny.ako">JOSHUA DAVE F. TONIDO</BR></small>
</div>
<!-- END COPYRIGHT -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../assets/plugins/respond.min.js"></script>
<script src="../assets/plugins/excanvas.min.js"></script> 
<![endif]-->

<script src="../lib/js/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="../lib/js/bootstrap.min.js"></script>
<script src="../lib/js/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="../lib/js/jquery.cokie.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->

<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="js/jquery.ui.shake.js"></script>
<script src="script/Datapass.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {     
  //App.init();
});
</script>
<!-- END JAVASCRIPTS -->
