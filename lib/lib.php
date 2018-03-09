<?php
	class db_connect {
	
		public $hostname = "localhost";
		public $username = "root";
		public $password = "";
		public $dbname = "grademonitoring";
		
		function connection_db(){
			//Precondition: System isn't accessed the database;
			//Postcondition: function accessed the database, and returns the variable for it.
			$var_db = new mysqli($this->hostname,$this->username,$this->password,$this->dbname);
			
			if (!$var_db){
				echo "Failed to connect to MySQL: " . mysqli_connect_error();
			}
			
			return $var_db;
		}

	}

	class auth{

		protected $username;
		protected $password;
		protected $con;
		protected $userType;
		
		public function setUsertype($type){ $this->userType = $type;}

		public function setUsername($user){ $this->username = $user;}
		
		public function setPassword($pass){ $this->password = $pass; }	

		public function setDbCon($cons){ $this->con = $cons; }		
		
		public function getUsertype(){ return $this->userType; }		
		
		public function getUsername(){ return $this->username; }		
		
		public function getPassword(){ return $this->password; }

		public function getDbCon(){ return $this->con; }
		
		
		public function login(){
			$query = new query();
			if (  auth::getUsername() !== null &&  auth::getPassword() !== null ){
				$user = auth::getDbCon()->real_escape_string (auth::getUsername());
				$pass =  auth::getDbCon()->real_escape_string (auth::getPassword());

				$select = '*';
				$from = auth::getUsertype();
				$where = "username = '$user'";
				$resu = $query->selectW(auth::getDbCon(), $select, $from, $where);
				
				while ($row = mysqli_fetch_array($resu)) {
					
					if( $pass == $row['password'] ) {
						if( auth::getUsertype() == "student" )
							$_SESSION['user_id'] = $row['student_ID'];
						elseif( auth::getUsertype() == "teacher" )
							$_SESSION['user_id'] = $row['teacher_ID'];
						elseif( auth::getUsertype() == "parent" )
							$_SESSION['user_id'] = $row['parent_ID'];
						$_SESSION['role'] = auth::getUsertype();
						return true.'!'.auth::getUsertype();   
						break;
					}	
				}
				return false;
				
			}
		}

		public function loginParent(){
			$query = new query();
			if (  auth::getUsername() !== null &&  auth::getPassword() !== null ){
				$user = auth::getDbCon()->real_escape_string (auth::getUsername());
				$pass =  auth::getDbCon()->real_escape_string (auth::getPassword());

				$select = '*';
				$from = 'parent';
				$where = "username = '$user'";
				$resu = $query->selectW(auth::getDbCon(), $select, $from, $where);
				
				while ($row = mysqli_fetch_array($resu)) {
					
					if( $pass == $row['password'] ) {
						$_SESSION['user_id'] = $row['parent_ID'];
						$_SESSION['role'] = 'parent';
						return true.'!parent';  
						break;
					}	
				}
				return false;
				
			}
		}

		public function loginTeacher(){
			$query = new query();
			if (  auth::getUsername() !== null &&  auth::getPassword() !== null ){
				$user = auth::getDbCon()->real_escape_string (auth::getUsername());
				$pass =  auth::getDbCon()->real_escape_string (auth::getPassword());

				$select = '*';
				$from = 'parent';
				$where = "username = '$user'";
				$resu = $query->selectW(auth::getDbCon(), $select, $from, $where);
				
				while ($row = mysqli_fetch_array($resu)) {
					
					if( $pass == $row['password'] ) {
						$_SESSION['user_id'] = $row['parent_ID'];
						$_SESSION['role'] = 'parent';
						return true.'!parent';  
						break;
					}	
				}
				return false;
				
			}
		}
	}

	class query {


		function select($dbcom, $select, $from){

			$query = "select $select from $from";
			$result = $dbcom->query($query);
			return mysqli_fetch_array($result);
		}

		function selectW($dbcom, $select, $from, $where){

			$query = "select $select from $from where $where";
			$result = $dbcom->query($query);
			return $result;
		}

		function update($table, $set, $where){
			$query = "UPDATE $table SET $set WHERE $where";
			$result = $dbcom->query($query);
			return $result;
		}

	}
	
	class personalInfo{

		function student($student_ID,$dbcon){
			$query = new query();

			$select = "s.name, sec.section, yl.year";
			$from = "student as s, student_section as ssec, section as sec, year_level as yl";
			$where = "s.student_ID = ssec.student_ID and ssec.section_ID = sec.section_ID and sec.year_level_ID = yl.year_level_ID and s.student_ID = $student_ID";

			$s = $query->selectW($dbcon, $select,$from,$where);
			return mysqli_fetch_array($s);
		}

		function studentListPerant($parent_ID, $dbcon){
			$query = new query();
			
			$select = "s.name, s.student_ID";
			$from = "parent as p, student as s";
			$where = "p.parent_ID = s.parent_ID and p.parent_ID = $parent_ID ORDER BY s.student_ID ASC";

			$s = $query->selectW($dbcon, $select, $from, $where);
			return $s;
		}
	}

	class grades {

		function report_card($studentID,$dbcon){
			$query = new query();

			$select = "yr.year, se.section, s.name, su.name, g.grade, g.grade_ID, gp.grading_period, su.subject_ID";
			$from = "student as s, student_subject as ss, grade as g, subject as su, grading_period as gp, section as se, year_level as yr, student_section as ssec";
			$where = "s.student_ID = ss.student_ID and su.subject_ID = ss.subject_ID and ss.student_subject_ID = g.student_subject_ID and g.grading_period_ID = gp.grading_period_ID and se.section_ID = ssec.section_ID and ssec.student_ID = s.student_ID and se.year_level_ID = yr.year_level_ID and s.student_ID = $studentID group by su.subject_ID";

			$s = $query->selectW($dbcon, $select,$from,$where);
			return $s;
		}

		function subject_grades($student_ID, $grading_period, $subject_ID, $dbcon){
			$query = new query(); 
			$select = "su.name, g.grade, g.grade_ID, gp.grading_period, su.subject_ID ";
			$from = "student as s, student_subject as ss, grade as g, subject as su, grading_period as gp, section as se, year_level as yr, student_section as ssec";
			$where = "s.student_ID = ss.student_ID and su.subject_ID = ss.subject_ID and ss.student_subject_ID = g.student_subject_ID and g.grading_period_ID = gp.grading_period_ID and se.section_ID = ssec.section_ID and ssec.student_ID = s.student_ID and se.year_level_ID = yr.year_level_ID and s.student_ID = $student_ID and gp.grading_period = '$grading_period' and su.subject_ID = $subject_ID";

			$s = $query->selectW($dbcon, $select,$from,$where);
			return mysqli_fetch_array($s);

		}

		function scores($from, $student_ID, $grade_ID, $dbcon){
			$query = new query();
			
			$select = "score, total";
			$from = "student_subject as ss, subject as s, grade as g, grading_period as gp, $from as f";
			$where = "ss.subject_ID = s.subject_ID and ss.student_subject_ID = g.student_subject_ID and g.grading_period_ID = gp.grading_period_ID and g.grade_ID = f.grade_ID and ss.student_ID = $student_ID and g.grade_ID = $grade_ID";

			$s = $query->selectW($dbcon, $select,$from,$where);
			return $s;
		}
	}
?>