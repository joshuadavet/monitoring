<?php
  require "../lib/lib.php";
  session_start();

  if(empty($_SESSION['user_id']))
  {
    header('Location: ../');
  }
  elseif( !empty($_SESSION['role']) ){
    if( $_SESSION['role'] == 'parent')
      header('Location: ../parent');
    elseif( $_SESSION['role'] == 'teacher')
      eader('Location: ../teacher');
  }
  $student_ID = $_SESSION['user_id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- BEGIN GLOBAL MANDATORY STYLES -->
   <link href="../lib/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
  <link rel="stylesheet" href="../lib/css/bootstrap.min.css">
  <!-- END GLOBAL MANDATORY STYLES -->
  <!-- BEGIN PAGE LEVEL STYLES -->
  <link rel="stylesheet" type="text/css" href="../lib/css/select2/select2_conquer.css"/>
  <link rel="stylesheet" href="../lib/css/DT_bootstrap.css"/>
  <!-- END PAGE LEVEL STYLES -->
  <!-- BEGIN THEME STYLES -->
  <link href="../lib/css/style-conquer.css" rel="stylesheet" type="text/css"/>
  <link href="../lib/css/style.css" rel="stylesheet" type="text/css"/>
  <link href="../lib/css/style-responsive.css" rel="stylesheet" type="text/css"/>
  <link href="../lib/css/plugins.css" rel="stylesheet" type="text/css"/>


  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }

    #name{
      cursor: pointer;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#"> <img src="../lib/img/logo.png" alt="logo" id="imgLogo" class="img-responsive" wi="" style="width: 26px;"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="?logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
        <?php  
          if( isset($_GET['logout']) ){
            session_destroy();
            header('Location: ../');

          }
        ?>
      </ul>
    </div>
  </div>
</nav>

<?php
  
  $db = new db_connect();
  $con = $db->connection_db();
  $studentInfo = new personalInfo();
?>

<div class="jumbotron">
  <div class="container text-center">
    <div class="tab-pane  active" id="tab_3">
        <div class="portlet">
          <div class="portlet-title">
            <div class="caption">
              <i class="fa fa-reorder"></i>Person Info
            </div>
          </div>
          <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <div class="form-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label col-md-3">Name:</label>
                    <div class="col-md-9">
                      <p class="form-control-static">
                         <?=$studentInfo->student($student_ID,$con)['name']; ?>
                      </p>
                    </div>
                  </div>
                </div>
                <!--/span-->
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label col-md-3">Section:</label>
                    <div class="col-md-9">
                      <p class="form-control-static">
                         <?=$studentInfo->student($student_ID,$con)['section']; ?>
                      </p>
                    </div>
                  </div>
                </div>
                <!--/span-->
              </div>
              <!--/row-->
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label col-md-3">Year:</label>
                    <div class="col-md-9">
                      <p class="form-control-static">
                         <?=$studentInfo->student($student_ID,$con)['year']; ?>
                      </p>
                    </div>
                  </div>
                </div>
                <!--/span-->
              </div>
              <!--/row-->
          </div>
        </div>
      </div>



    <div class="portlet">
        <div class="portlet-title">
          <div class="caption">
            <i class="fa fa-globe"></i>Report Card
          </div>
        </div>
        <div class="portlet-body">
          <table class="table table-striped table-bordered table-hover" id="report_card">
            <thead>
              <tr>
                <th>
                   Subject Name
                </th>
                <th>
                   First Grading
                </th>
                <th>
                   Second Grading
                </th>
                <th>
                   Third Grading
                </th>
                <th>
                   Fourth Grading
                </th>
                <th>
                   Final Grade
                </th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
  </div>
</div>
 

<footer class="container-fluid text-center">
  <p>2018</p>
</footer>

</body>
</html>
  <!--<script src="../lib/js/jquery.min.js"></script>-->
  

  <!-- END FOOTER -->
  <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
  <!-- BEGIN CORE PLUGINS -->
  <!--[if lt IE 9]>
  <script src="assets/plugins/respond.min.js"></script>
  <script src="assets/plugins/excanvas.min.js"></script> 
  <![endif]-->
  <script src="../lib/js/jquery-1.10.2.min.js" type="text/javascript"></script>
  <script src="../lib/js/bootstrap.min.js"></script>

  <script src="../lib/js/jquery.cokie.min.js" type="text/javascript"></script>
  <!-- END CORE PLUGINS -->
  <!-- BEGIN PAGE LEVEL PLUGINS -->
  <script type="text/javascript" src="../lib/js/select2.min.js"></script>
  <script type="text/javascript" src="../lib/js/data-tables/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="../lib/js/data-tables/DT_bootstrap.js"></script>
  <!-- END PAGE LEVEL PLUGINS -->
  <!-- BEGIN PAGE LEVEL SCRIPTS -->





<script src="../lib/js/table-advanced.js"></script>

<script>
jQuery(document).ready(function() {  
   TableAdvanced.init(<?=$student_ID ?>);
});
</script>
