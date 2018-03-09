

<?php
	require 'lib/lib.php';
	$student_id = 1;
	$db = new db_connect();
	$con = $db->connection_db();
	$grades = new grades();

	$result = $grades->report_card($student_id, $con); // 1 is the student ID
	
	echo "<table border='1'>";
	echo "<th>Subject Name</th>";
	echo "<th>First Grading</th>";
	echo "<th>Second Grading</th>";
	echo "<th>Third Grading</th>";
	echo "<th>Fourth Grading</th>";
	while ($results = mysqli_fetch_array($result)) {
		echo "<tr>";
		echo "<td>".$results['name']."</td>";

		$firstgrding = $grades->subject_grades($student_id, "First Grading", $results['subject_ID'] , $con )['grade'];
		$secondgrding = $grades->subject_grades($student_id, "Second Grading", $results['subject_ID'] , $con )['grade'];
		$thirdgrding = $grades->subject_grades($student_id, "Third Grading", $results['subject_ID'] , $con )['grade'];
		$fourthgrding = $grades->subject_grades($student_id, "Fourth Grading", $results['subject_ID'] , $con )['grade'];

		echo $firstgrding != "" ? "<td>".$firstgrding."</td>" : "<td></td>";
		echo $secondgrding != "" ? "<td>".$secondgrding."</td>" : "<td></td>";
		echo $thirdgrding != "" ? "<td>".$thirdgrding."</td>" : "<td></td>";
		echo $fourthgrding != "" ? "<td>".$fourthgrding."</td>" : "<td></td>";
		echo "<tr>";
	}
	echo "</table>";

	?>
	<h1>Oral</h1>
	<?php
	$results = $grades->report_card($student_id, $con); // 1 is the student ID
	
	while ($resultss = mysqli_fetch_array($results)) {
		$Score = $grades->scores("oral", $student_id, $resultss['grade_ID'], $con ) ; //($from, $student_ID, $grade_ID, $dbcon)

		echo $resultss['name']."/".$resultss['grade_ID'];
		echo "<table border='1'>";
		echo "<th>Score</th>";
		echo "<th>Total</th>";
		
		while ($return = mysqli_fetch_array($Score)) {
			echo "<tr>";
			echo "<td>".$return['score']."</td>";
			echo "<td>".$return['total']."</td>";

		echo "</tr>";
		}
		echo "</table>";

	}