<?php
	

if(empty($_SESSION['user_id']))
{
	header('Location: auth/');
}
include 'header/header.php'
?>
<style>
#nsc{
	text-transform: uppercase;
}
</style>

<body class="page-header-fixed">
<!-- BEGIN HEADER -->
<div class="header navbar navbar-inverse navbar-fixed-top">
	<!-- BEGIN TOP NAVIGATION BAR -->
	<div class="header-inner">
		<!-- BEGIN LOGO -->
		<a class="navbar-brand" href="../index.html">
			<img src="../assets/logo/logo1.png" alt="logo" class="img-responsive">
		</a>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="../javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		<img src="../assets/img/menu-toggler.png" alt=""/>
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->
		<!-- BEGIN TOP NAVIGATION MENU -->
		<ul class="nav navbar-nav pull-right">
			<!-- BEGIN NOTIFICATION DROPDOWN -->
			<!-- END NOTIFICATION DROPDOWN -->
			<!-- BEGIN INBOX DROPDOWN -->
			<!-- END INBOX DROPDOWN -->
			<!-- BEGIN TODO DROPDOWN -->
			<!-- END TODO DROPDOWN -->
			<li class="devider">
				 &nbsp;
			</li>
			<!-- BEGIN USER LOGIN DROPDOWN -->
			<li class="dropdown user">
				<a href="../#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
				<img alt="" src="../assets/logo/icilogoMin.png"/>
				<span class="username">
					 ICI
				</span>
				<i class="fa fa-angle-down"></i>
				</a>
				<ul class="dropdown-menu">
				<li>
					<a href="../logout.php"><i class="fa fa-key"></i> Log Out</a>
				</li>
				</ul>
			</li>
		<!-- END USER LOGIN DROPDOWN -->
	</ul>
	<!-- END TOP NAVIGATION MENU -->
</div>
<!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
	<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<ul class="page-sidebar-menu">
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<div class="clearfix">
					</div>
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
				</li>
				<li class="active ">
					<a href="../#">
					<i class="fa fa-home"></i>
					<span class="title">
						Home
					</span>
					</a>
				</li>
				<li class="">
					<a href="../javascript:;">
					<i class="fa fa-th"></i>
					<span class="title">
						Subject Info
					</span>
					<span class="selected">
					</span>
					<span class="arrow open">
					</span>
					</a>
					<ul class="sub-menu">
						<li>
							<a href="../subjectInfo">
							Manage Subject Info</a>
						</li>
					</ul>
				</li>
				<li class="">
					<a href="../javascript:;">
					<i class="fa fa-eye"></i>
					<span class="title">
						Room Info
					</span>
					<span class="selected">
					</span>
					<span class="arrow open">
					</span>
					</a>
					<ul class="sub-menu">
						<li class="active">
							<a href="../room">
							Manage Room Info</a>
						</li>
					</ul>
				</li>
				
				<li class="">
					<a href="../javascript:;">
					<i class="fa fa-star-half"></i>
					<span class="title">
						Course Info
					</span>
					<span class="selected">
					</span>
					<span class="arrow open">
					</span>
					</a>
					<ul class="sub-menu">
						<li class="">
							<a href="../course%20info">
							Manage Course Info</a>
						</li>
					</ul>
				</li>
				<li class="">
					<a href="../javascript:;">
						<i class="fa fa-group"></i>
						<span class="title">
							Student Info
						</span>
						<span class="selected">
						</span>
						<span class="arrow open">
						</span>
					</a>
					<ul class="sub-menu">
						<li><a href='../student/?'>View</a></li>
						<li><a href="../student/?addStudent">Add Student</a></li>
						<li><a href="../student/?updateStudent">Update Student Info</a></li>
					</ul>
				</li>
				<li class="">
					<a href="../javascript:;">
						<i class="fa fa-list"></i>
						<span class="title">
							Subject Blocking
						</span>
						<span class="selected">
						</span>
						<span class="arrow open">
						</span>
					</a>
					<ul class="sub-menu">
						<li><a href='../block/?'>View</a></li>
						<li><a href="../block/?addsched">Add Schedule</a></li>
						<li><a href="../block/?modsched">Modify Schedule</a></li>
						<li><a href="../block/?delsched">Delete Schedule</a></li>
					</ul>
				</li>
				<li class="">
					<a href="../javascript:;">
						<i class="fa fa-gear"></i>
						<span class="title">
							Advising & Controlling
						</span>
						<span class="selected">
						</span>
						<span class="arrow open">
						</span>
					</a>
					<ul class="sub-menu">
						<li><a href="../advise/?adviseStudent">Advise Student</a></li>
						<li><a href="../advise/?unenroll">Unenroll Student</a></li>
					</ul>
				</li>
				<li class="last ">
					<a href="../javascript:;">
						<i class="fa fa-print"></i>
						<span class="title">
							COR Printing
						</span>
						<span class="selected">
						</span>
						<span class="arrow open">
						</span>
					</a>
					<ul class="sub-menu">
						<li><a href="../printCOR/?adviseStudent">Print COR</a></li>
					</ul>
				</li>
			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
</div>
<!-- END SIDEBAR -->
<!-- BEGIN CONTENT -->
<div class="page-content-wrapper">
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-success">Save changes</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN STYLE CUSTOMIZER -->
			<!-- END BEGIN STYLE CUSTOMIZER -->
			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
					ICI <small>Senior High School Enrollment System</small>
					</h3>
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<i class="fa fa-home"></i>
							<a href="../index.html">Home</a>
							<i class="fa fa-angle-right"></i>
						</li>
					</ul>
					<!-- END PAGE TITLE & BREADCRUMB-->
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN EXAMPLE TABLE PORTLET-->
					
					<!-- END EXAMPLE TABLE PORTLET-->
				</div>
			</div>
			<!-- END PAGE CONTENT -->
		</div>
	</div>
</div>
<!-- END CONTENT -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="footer">
<div class="footer-inner">
	 2016 &copy; Iligan City, Lanao Del Norte.
</div>
<div class="footer-tools">
	<span class="go-top">
		<i class="fa fa-angle-up"></i>
	</span>
</div>
</div>
