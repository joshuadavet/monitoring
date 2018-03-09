<?php
	require "../lib/lib.php";
	$student_id = $_GET['student_ID']; //temp
	$db = new db_connect();
	$con = $db->connection_db();
	$grades = new grades();

	if( isset( $_GET['view'] ) ){
		$result = $grades->report_card($student_id, $con); // 1 is the student ID
		$fGpa = 0;
		$sGpa = 0;
		$tGpa = 0;
		$fuGpa = 0;
		$fstfPGA = 0;
		$count = 1;
		$i = 0;
		echo'{"data":';
		echo'[';

		while ($results = mysqli_fetch_array($result)) {

			$firstgrding = $grades->subject_grades($student_id, "First Grading", $results['subject_ID'] , $con );
			$secondgrding = $grades->subject_grades($student_id, "Second Grading", $results['subject_ID'] , $con );
			$thirdgrding = $grades->subject_grades($student_id, "Third Grading", $results['subject_ID'] , $con );
			$fourthgrding = $grades->subject_grades($student_id, "Fourth Grading", $results['subject_ID'] , $con );
			$fGpa += $firstgrding['grade'];
			$sGpa += $secondgrding['grade'];
			$tGpa += $thirdgrding['grade'];
			$fuGpa += $fourthgrding['grade'];
			$fstfPGA = $firstgrding['grade'] + $secondgrding['grade'] + $thirdgrding['grade'] + $fourthgrding['grade'];
			if($i>=1){
				echo',';
			}
			echo "[";
			echo '"'.$results['name'].'",';
			echo '"'.$firstgrding['grade'] != "" ? '"<span id=name id-grading='.$firstgrding['grade_ID'].'>'.$firstgrding['grade'].'</span>"' : ',';
			echo '"'.$secondgrding['grade'] != "" ? ',"<span id=name id-grading='.$secondgrding['grade_ID'].'>'.$secondgrding['grade'].'</span>"' : ',';
			echo '"'.$thirdgrding['grade'] != "" ? ',"<span id=name id-grading='.$thirdgrding['grade_ID'].'>'.$thirdgrding['grade'].'</span>"' : ',';
			echo '"'.$fourthgrding['grade'] != "" ? ',"<span id=name id-grading='.$fourthgrding['grade_ID'].'>'.$fourthgrding['grade'].'</span>",' : ',';
			echo '"'.($fstfPGA/4).'"';
			
			echo "]";
			if( $count == 10 ){
				$gpa1 = $fGpa/$count;
				$gpa2 = $sGpa/$count;
				$gpa3 = $tGpa/$count;
				$gpa4 = $fuGpa/$count;
				$totalGPA = $gpa1+$gpa2+$gpa3+$gpa4;
				echo ",[";
				echo '"<b>GPA</b>",';
				echo '"'.($fGpa/$count).'",';
				echo '"'.($sGpa/$count).'",';
				echo '"'.($tGpa/$count).'",';
				echo '"'.($fuGpa/$count).'",';
				echo '"<b>'.($totalGPA/4).'</b>"';
				
				echo "]";
			}
			$i++;
			$count++;
		
		}
		
		echo "]";
		echo '}';
		
	}
	elseif( isset($_GET['scores']) ){	
?>
	<style type="text/css">
		table{

		    float: left;
		    margin-left: 13px;
		}
		.th{
			text-transform: uppercase;
	   		font-weight: bold;
		}
	</style>
<?php
		$grade_ID = $_POST['grade_ID'];
		//$grade_ID = 3;
		$data = array();
		$score = array();
		$total = array();
		$b = 0;
		$i = 0;
		$big = 0;
		$inc = 0;
		$oral = $grades->scores("oral", $student_id, $grade_ID, $con ) ; //($from, $student_ID, $grade_ID, $dbcon)
		$data[$b] = "oral";
		$b = 1;
		$oralTotal = 0; //count the result
		while ($return = mysqli_fetch_array($oral)) {
			$score[$i] = $return['score'];
			$total[$i] = $return['total'];
			$i++;
			$inc++;
			$oralTotal++;
		}
		$big = $inc;
		$inc = 0;
		foreach ($score as $key => $value) {
			$data[$b] = $value;
			unset($score[$key]);
			$b++;
		}
		foreach ($total as $key => $value) {
			$data[$b] = $value;
			unset($total[$key]);
			$b++;
		}

		$assignment = $grades->scores("assignment", $student_id, $grade_ID, $con ) ; //($from, $student_ID, $grade_ID, $dbcon)
		$data[$b] = "assignment";
		$b +=1;
		$assignmentTotal = 0;
		while ($return = mysqli_fetch_array($assignment)) {
			$score[$i] = $return['score'];
			$total[$i] = $return['total'];
			$i ++;
			$inc++;
			$assignmentTotal++;
		}
		if( $big < $inc ){
			$big = $inc;
		}
		$inc = 0;

		foreach ($score as $key => $value) {
			$data[$b] = $value;
			unset($score[$key]);
			$b++;
		}
		foreach ($total as $key => $value) {
			$data[$b] = $value;
			unset($total[$key]);
			$b++;
		}


		$seatwork = $grades->scores("seatwork", $student_id, $grade_ID, $con ) ; //($from, $student_ID, $grade_ID, $dbcon)
		$data[$b] = "seatwork";
		$b +=1;
		$seatworkTotal = 0;
		while ($return = mysqli_fetch_array($seatwork)) {
			$score[$i] = $return['score'];
			$total[$i] = $return['total'];
			$i++;
			$inc++;
			$seatworkTotal++;
		}
		if( $big < $inc ){
			$big = $inc;
		}
		$inc = 0;


		foreach ($score as $key => $value) {
			$data[$b] = $value;
			unset($score[$key]);
			$b++;
		}
		foreach ($total as $key => $value) {
			$data[$b] = $value;
			unset($total[$key]);
			$b++;
		}

		
		$quiz = $grades->scores("quiz", $student_id, $grade_ID, $con ) ; //($from, $student_ID, $grade_ID, $dbcon)
		$data[$b] = "quiz";
		$b +=1;
		$quizTotal = 0;
		while ($return = mysqli_fetch_array($quiz)) {
			$score[$i] = $return['score'];
			$total[$i] = $return['total'];
			$i++;
			$inc++;
			$quizTotal++;
		}
		if( $big < $inc ){
			$big = $inc;
		}
		$inc = 0;
		foreach ($score as $key => $value) {
			$data[$b] = $value;
			unset($score[$key]);
			$b++;
		}
		foreach ($total as $key => $value) {
			$data[$b] = $value;
			unset($total[$key]);
			$b++;
		}
		
		$exam = $grades->scores("exam", $student_id, $grade_ID, $con ) ; //($from, $student_ID, $grade_ID, $dbcon)
		$data[$b] = "exam";
		$b +=1;
		$examTotal = 0;
		while ($return = mysqli_fetch_array($exam)) {
			$score[$i] = $return['score'];
			$total[$i] = $return['total'];
			$i++;
			$inc++;
			$exam++;
		}
		if( $big < $inc ){
			$big = $inc;
		}
		$inc = 0;

		
		$a = 0;
		$head = "";
		$scor = 0;
		$totals = 0;
		for($s = 0; $s < count($data); $s++){
			if( $data[$s] == 'oral' || $data[$s] == 'assignment' || $data[$s] == 'attendance' || $data[$s] == 'seatwork' || $data[$s] == 'quiz' || $data[$s] == 'exam' ){
				$head = $data[$s];
				echo '<table border="0">';
				echo '<tr>';
				echo '<td class="th" colspan="'.($big+1).'">'.$data[$s].'</td>';
				echo '</tr>';	
				

				if( $head == "oral" ){
					$scor = $oralTotal;
					$totals = $oralTotal;
				}
				elseif( $head == "assignment" ){
					$scor = $assignmentTotal;
					$totals = $assignmentTotal;
				}
				elseif( $head == "seatwork" ){
					$scor = $seatworkTotal;
					$totals = $seatworkTotal;
				}
				elseif( $head == "quiz" ){
					$scor = $quizTotal;
					$totals = $quizTotal;
				}
				elseif( $head == "exam" ){
					$scor = $examTotal;
					$totals = $examTotal;
				}

				if( $totals != 0 ){
					echo '<tr><td>Score</td>';
				}else{
				
					echo '<tr><td>No Score</td>';
					
					echo '</tr>';
					echo "</table>";
				
				}
			}else{


				if( $scor > 0 ){
					
					echo '<td>'.$data[$s].'</td>';
					
					if($scor == 1){
						echo '</tr>';
						echo '<tr><td>Total</td>';
					}
					$scor--;
				}
				elseif( $totals > 0 ){
					
					echo '<td>'.$data[$s].'</td>';
					
					if($totals == 1){
						echo '</tr>';
						echo "</table>";
					}
					$totals--;
				}
			}

			
		}

		
			
			
		
	}
?>