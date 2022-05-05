<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"]!= true){
  header("location:login.php");
  exit();
}

 include 'includes/header.php';
 include 'includes/sidebar.php';
 
?> 

	<!-- Left side column. contains the logo and sidebar -->
 

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				WELCOME
				<small>Optional description</small>
			</h1>
			<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
				<li class="active">Here</li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content container-fluid">


			
				| <span>
                         <span>प्रदेश सरकार</span>
                        <span>मुख्यमन्त्री तथा मन्त्रिपरिषद्को कार्यालय  </span> <span class="font-popins">बागमती प्रदेश</span>
				--

		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
<!---footer-->
<?php include 'includes/footer.php'; ?>