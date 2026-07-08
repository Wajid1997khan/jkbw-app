<?php
/*
* @AUTOR :WAJID ALI JAVID KHAN
- Created :06 Aug 2025
    -* The base controller is the foundation for all new and lists students. 
*/
require_once 'core/Controller.php';
require_once 'config/config.php';
require_once 'core/Database.php';
require_once __DIR__ . '/../../public/library/language.php';
require_once __DIR__ . '/../../public/library/text.php';

class StudentController extends Controller {
    protected $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }
	
	public function index(){
	   $this->layout('layouts/studentslist');
    }//End if.
	
	public function Admission(){
		//Back ground event.
		if(isset($_POST["iEvent"])){
			if( $_POST["iEvent"] == "GetStudentDetails" && isset($_POST['StdCode'])){
				$student = $this->get_student_exists($_POST['StdCode'],'');

				if ($student) echo json_encode($student);
				else echo json_encode(null);
				
				return;	
			}//end if. 'Admission', 'Rejected', 'Accepted'
		}//end if
		
		
		//Form Submitted
		if (Text::CheckIsset($_POST, array('StudentCode','Muqeem','FirstNameEN','LastNameEN','FirstNameUR',
				'LastNameUR','FatherNameEN','FatherNameUR','DOB','CNICNumber','MobileNumber','PermanentAddress',
				'TemporaryAddress','ClassCode','PreviousMadrasa','Guardian','GuardianCNICNumber')) === true){
			
			$student = $this->get_student_exists($_POST['StudentCode'],$_POST['ClassCode']);
			if ($student) {
				// Student already admitted in this class with Admission status
				return json_encode(['status' => 'exists', 'message' => 'Student already admitted in this class.']);
			}//end if.

			$loggedInUser =  $_COOKIE['UserName'];
			
			// Step 2: Insert new admission
			$insertQuery = "INSERT INTO kbwu_admissions (FirstName_EN,LastName_EN,FirstName_UR,LastName_UR,FatherName_EN,
				FatherName_UR, DateOfBirth,CNICNumber,MobileNumber,PermanentAddress, TemporaryAddress, Class,
				PreviousMadrasa, Guardian, GuardianMobileNumber, GuardianCNICNumber, ResidencyStatus, created_at,
				created_by,Status,StdCode,StdType)
			VALUES (:FirstName_EN, :LastName_EN,:FirstName_UR,:LastName_UR,:FatherName_EN,:FatherName_UR,
					:DateOfBirth,:CNICNumber,:MobileNumber, :PermanentAddress, :TemporaryAddress, :Class,
					:PreviousMadrasa,:Guardian,:GuardianMobileNumber,:GuardianCNICNumber,:ResidencyStatus,NOW(),
					:created_by,'Admission',:StdCode,:StdType)"; //AdmissionID
			$insert = $this->db->prepare($insertQuery);
			$insert->bindParam(':FirstName_EN', $_POST['FirstNameEN']);
			$insert->bindParam(':LastName_EN', $_POST['LastNameEN']);
			$insert->bindParam(':FirstName_UR', $_POST['FirstNameUR']);
			$insert->bindParam(':LastName_UR', $_POST['LastNameUR']);
			$insert->bindParam(':FatherName_EN', $_POST['FatherNameEN']);
			$insert->bindParam(':FatherName_UR', $_POST['FatherNameUR']);
			$insert->bindParam(':DateOfBirth', $_POST['DOB']);
			$insert->bindParam(':CNICNumber', $_POST['CNICNumber']);
			$insert->bindParam(':MobileNumber', $_POST['MobileNumber']);
			$insert->bindParam(':PermanentAddress', $_POST['PermanentAddress']);
			$insert->bindParam(':TemporaryAddress', $_POST['TemporaryAddress']);
			$insert->bindParam(':Class', $_POST['ClassCode']);
			$insert->bindParam(':PreviousMadrasa', $_POST['PreviousMadrasa']);
			$insert->bindParam(':Guardian', $_POST['Guardian']);
			$insert->bindParam(':GuardianMobileNumber', $_POST['MobileNumber']); // Guardian mobile number
			$insert->bindParam(':GuardianCNICNumber', $_POST['GuardianCNICNumber']);
			$insert->bindParam(':ResidencyStatus', $_POST['Muqeem']);
			$insert->bindParam(':created_by', $loggedInUser); // Set this from session or logic
			$insert->bindParam(':StdCode', $_POST['StudentCode']);
			$insert->bindParam(':StdType', $_POST['StudentType']);
			//$insert->bindParam(':AdmissionID', $generatedAdmissionID); // You need to generate this
			$insert->execute();
			$insert = null;

			return json_encode(['status' => 'success', 'message' => 'Student admitted successfully.']);
		} // end submit
		
		#Read Form.
		$this->layout('layouts/admission');
	}//End if.

	public function AdmissionList(){
		#Read Form.
		$this->layout('layouts/admissionlist');
	}

	/*
     *@function to display all books.
	**/
    public function display_student_list(){
        // Get DB connection
        $db = Database::getInstance()->getConnection();

        // Prepare and execute the query
		$Query="SELECT A.*, B.id AS classid, B.classname_EN, B.classname_UR FROM kbwu_students AS A 
			    INNER JOIN classes AS B ON B.id = A.class_id 
			    WHERE A.Status = 'Active' ";
        $stmt = $db->prepare($Query);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$bg_clr ="bg-light text-dark";
        $view = '<div class="table-responsive">
			<table class="table table-hover" id="TxtbooksTable"><thead>
                <tr>
                    <th class="'.$bg_clr.'" width="3%">'.LANG::data('No').'</th>
					<th class="'.$bg_clr.'" width="10%">'.LANG::data('StudentCode').'</th>
                    <th class="'.$bg_clr.'" width="10%">'.LANG::data('Name').'</th>
                    <th class="'.$bg_clr.'" width="10%">'.LANG::data('FatherName').'</th>
					<th class="'.$bg_clr.'" width="8%">'.LANG::data('ClassCode').'</th>
					<th class="'.$bg_clr.'" width="20%">'.LANG::data('Class').'</th>
					<th class="'.$bg_clr.'" width="10%">'.LANG::data('BrithDate').'</th>
					<th class="'.$bg_clr.'" width="7%">'.LANG::data('Gender').'</th>
					<th class="'.$bg_clr.'" width="8%">'.LANG::data('Mobile').'</th>
					<th class="'.$bg_clr.'" width="10%">'.LANG::data('Status').'</th>
					<th class="'.$bg_clr.'" width="15%">'.LANG::data('Address').'</th>
                </tr>
            </thead><tbody>';

            $serial = 1;
            foreach ($results as $row){
				$td_cls = $spn_cls = '';
				if($row['status'] == 'Active'){
					$td_cls = 'green'; $spn_cls = 'bg-success';
				}//End if.
				
                $view .= '<tr>
                    <td>'.$serial++.'</td>
					<td>'.$row['student_code'].'</td>
					<td>'.$row['first_name_'.$_COOKIE['_LANG_']].' '.$row['last_name_'.$_COOKIE['_LANG_']].' </td>
                    <td>'.$row['father_name_'.$_COOKIE['_LANG_']].'</td>
					<td>'.$row['classid'].'</td>
                    <td>'.$row['classname_'.$_COOKIE['_LANG_']].'</td>
					<td>'.$row['date_of_birth'].'</td>
					<td>'.LANG::data($row['gender']).'</td>
					<td>'.$row['mobile'].'</td>
					<td class="'.$td_cls.'">
						<span class="badge '.$spn_cls.'"> '.LANG::data($row['status']).'</span>
					</td>
					<td>'.$row['address_'.$_COOKIE['_LANG_']].'</td>
                </tr>';
            }//End for each.
        $view .= '</tbody></table></div>';
        return $view;
    }//End Func. */

    /*
     *@function to display all books.
	**/
    public function display_admission_list(){
        // Get DB connection
        $db = Database::getInstance()->getConnection();

        // Prepare and execute the query
		$Query="SELECT A.*, B.id AS classid, B.classname_EN, B.classname_UR
				  FROM kbwu_admissions AS A 
			INNER JOIN classes AS B ON B.id = A.Class 
			     WHERE A.Status IN ('Admission','Rejected') ";
        $stmt = $db->prepare($Query);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$bg_clr ="bg-light text-dark";
        $view = '<div class="table-responsive">
			<table class="table table-hover" id="TxtAdmissionListTable"><thead>
                <tr>
                    <th class="'.$bg_clr.'" width="3%">'.LANG::data('No').'</th>
					<th class="'.$bg_clr.'" width="10%">'.LANG::data('AdmissionNo').'</th>
                    <th class="'.$bg_clr.'" width="10%">'.LANG::data('Name').'</th>
                    <th class="'.$bg_clr.'" width="10%">'.LANG::data('FatherName').'</th>
					<th class="'.$bg_clr.'" width="10%">'.LANG::data('StudentType').'</th>
					<th class="'.$bg_clr.'" width="10%">'.LANG::data('Class').'</th>
					<th class="'.$bg_clr.'" width="20%">'.LANG::data('Address').'</th>
					<th class="'.$bg_clr.'" width="10%">'.LANG::data('Mobile').'</th>
					<th class="'.$bg_clr.'" width="10%">'.LANG::data('Status').'</th>
					<th class="'.$bg_clr.'" width="7%">'.LANG::data('Action').'</th>
                </tr>
            </thead><tbody>';

            $serial = 1;
            foreach ($results as $row){
				$td_cls = $spn_cls = '';
				if($row['Status'] == 'Admission'){
					$td_cls = 'green'; $spn_cls = 'bg-success';
				}//End if.
				
                $view .= '<tr>
                    <td>'.$serial++.'</td>
					<td>'.$row['ID'].'</td>
					<td class="d-none">'.$row['Class'].'</td>
					<td>'.$row['FirstName_'.$_COOKIE['_LANG_']].' '.$row['LastName_'.$_COOKIE['_LANG_']].' </td>
                    <td>'.$row['FatherName_'.$_COOKIE['_LANG_']].'</td>
					<td>'.LANG::data('StudentType'.$row['StdType']).'</td>
                    <td>'.$row['classname_'.$_COOKIE['_LANG_']].'</td>
					<td>'.$row['PermanentAddress'].'</td>
					<td>'.$row['MobileNumber'].'</td>
					<td class="'.$td_cls.'">
						<span class="badge '.$spn_cls.'"> '.LANG::data($row['Status']).'</span>
					</td>
					<td></td>
                </tr>';
            }//End for each.
        $view .= '</tbody></table></div>';
        return $view;
    }//End Func. */
	
	
	/*
	 *@Function to check if student exists for given StdCode and ClassCode with Admission status
	**/
    protected function get_student_exists($stdCode, $classCode='') {
		if(!empty($ClassCode)) $whereAS =" AND Class='$classCode' "; else $whereAS ="";
			$query = "SELECT * FROM kbwu_admissions 
					   WHERE StdCode='$stdCode' AND Status IN ('Admission','Accepted') $whereAS LIMIT 1";
			$sql = $this->db->prepare($query);
			$sql->execute();
        return $sql->fetch(PDO::FETCH_ASSOC);
    }//closed Func.

}//End Class
