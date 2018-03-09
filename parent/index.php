<?php
  require "../lib/lib.php";

  session_start();


  if(empty($_SESSION['user_id']))
  {
    header('Location: ../');
  }
  elseif( !empty($_SESSION['role']) ){
    if( $_SESSION['role'] == 'student')
      header('Location: ../student');
    elseif( $_SESSION['role'] == 'teacher')
      eader('Location: ../teacher');
    
  }

  $db = new db_connect();
  $con = $db->connection_db();
  $grades = new grades();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Parents</title>
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
      <a class="navbar-brand" href="#">
        <img src="../lib/img/logo.png" alt="logo" id="imgLogo" class="img-responsive" wi="" style="width: 26px;">
      </a>
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



<div class="jumbotron">
  <div class="container text-center">
    <div class="tab-pane  active" id="tab_3">

      <div class="tabbable tabbable-custom" id="listStudent">
<?php
        $studentNames = new personalInfo();
        $parent_ID = $_SESSION['user_id'];
    
?>
        <div class="tabbable tabbable-custom" id="listStudent">
        

          <ul class="nav nav-tabs">
<?php
            $listData = $studentNames->studentListPerant($parent_ID,$con);
            $i = 0;
            $student_id = array();
            while ($res = mysqli_fetch_array($listData)) {
              $student_id[] = $res['student_ID'];
              if( $i == 0 ){
                echo '<li class="active">
                  <a href="#tab_'.$i.'" data-toggle="tab">'.$res['name'].'</a>
                </li>';
              }
              else{
                echo '<li class="">
                  <a href="#tab_'.$i.'" data-toggle="tab">'.$res['name'].'</a>
                </li>';
              }
              
              $i++;
            }
    //print_r($student_id);
?>

          </ul>
          <div class="tab-content">
<?php
        for( $r = 0; $r < $i;$r++ ){
          if( $r == 0 ){
            echo '<div class="tab-pane active" id="tab_'.$r.'">';
          }else{
            echo '<div class="tab-pane" id="tab_'.$r.'">';
          }
          
          echo '<div class="portlet">
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
                    <tbody role="alert" aria-live="polite" aria-relevant="all">';

          $result = $grades->report_card($student_id[$r], $con); // 1 is the student ID
          $fGpa = 0;
          $sGpa = 0;
          $tGpa = 0;
          $fuGpa = 0;
          $fstfPGA = 0;
          $count = 1;
          $e = 0;

          while ($results = mysqli_fetch_array($result)) {
            if( $e%2 == 0 ){
              echo'<tr class="even">';
            }else{
              echo'<tr class="odd">';
            }
            
            $firstgrding = $grades->subject_grades($student_id[$r], "First Grading", $results['subject_ID'] , $con );
            $secondgrding = $grades->subject_grades($student_id[$r], "Second Grading", $results['subject_ID'] , $con );
            $thirdgrding = $grades->subject_grades($student_id[$r], "Third Grading", $results['subject_ID'] , $con );
            $fourthgrding = $grades->subject_grades($student_id[$r], "Fourth Grading", $results['subject_ID'] , $con );
            $fGpa += $firstgrding['grade'];
            $sGpa += $secondgrding['grade'];
            $tGpa += $thirdgrding['grade'];
            $fuGpa += $fourthgrding['grade'];
            $fstfPGA = $firstgrding['grade'] + $secondgrding['grade'] + $thirdgrding['grade'] + $fourthgrding['grade'];

            echo '<td>'.$results['name'].'</td>';
            echo $firstgrding['grade'] != "" ? '<td><span id=name id-grading='.$firstgrding['grade_ID'].'>'.$firstgrding['grade'].'</span></td>' : '<td></td>';
            echo $secondgrding['grade'] != "" ? '<td><span id=name id-grading='.$secondgrding['grade_ID'].'>'.$secondgrding['grade'].'</span></td>' : '<td></td>';
            echo $thirdgrding['grade'] != "" ? '<td><span id=name id-grading='.$thirdgrding['grade_ID'].'>'.$thirdgrding['grade'].'</span></td>' : '<td></td>';
            echo $fourthgrding['grade'] != "" ? '<td><span id=name id-grading='.$fourthgrding['grade_ID'].'>'.$fourthgrding['grade'].'</span></td>' : '<td></td>';
            echo '<td>'.($fstfPGA/4).'</td>';
            

            echo '</tr>';
            if( $count == 10 ){
              $gpa1 = $fGpa/$count;
              $gpa2 = $sGpa/$count;
              $gpa3 = $tGpa/$count;
              $gpa4 = $fuGpa/$count;
              $totalGPA = $gpa1+$gpa2+$gpa3+$gpa4;
              echo "<tr>";
              echo '<td><b>GPA</b></td>';
              echo '<td>'.($fGpa/$count).'</td>';
              echo '<td>'.($sGpa/$count).'</td>';
              echo '<td>'.($tGpa/$count).'</td>';
              echo '<td>'.($fuGpa/$count).'</td>';
              echo '<td><b>'.($totalGPA/4).'</b></td>';
              
              echo "</tr>";
            }
            $e++;
            $count++;

          }
        
              
                 
              echo '</table>
                </div>
              </div></div>';
            }
 ?>
          </div>
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





<script src="../lib/js/parents.js"></script>

<script>
jQuery(document).ready(function() {  
   displayReportCard.init();
});
</script>
