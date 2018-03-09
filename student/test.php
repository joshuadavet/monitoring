<table border="1">
	<tr>
		<td colspan="12">Oral</td>
	</tr>
	<tr>
		<td>Score</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>Total</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
</table>
<!--<th>Oral</th>
	<th>assignment</th>
	<th>Attendance</th>
	<th>Seatwork</th>
	<th>Quiz</th>
	<th>Exam</th>-->

	<?php
		$a = array();
		$ass = array();
		$as = array();

		$a[1] = "2";
		$a[2] = 22;
		$ass[1] = "21";
		$ass[2] = 12;
		$i = 0;
		foreach($a as $key => $val){
			$as[$i] = $val; 
			$i++;
		}
		foreach($ass as $key => $val){
			$as[$i] = $val; 
			$i++;
		}
		print_r($as);
	?>