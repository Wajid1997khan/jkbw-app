<?php
/*
* @AUTOR :WAJID ALI JAVID KHAN
- Created :22 July 2025
    -* The base controller is the foundation for all class lists. 
*/
require_once 'core/Controller.php';
require_once 'config/config.php';
require_once 'core/Database.php';
require_once 'app/models/resultmodel.php';
require_once __DIR__ . '/../../public/library/language.php';

class ResultController extends Controller {
       
    public function index(){
        $this->layout('layouts/results');
    }//End if.
    
	
	/*
	 *@Function to load add new result.
	**/
    public function addnewresult(){
		#Create Book result
		if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Items'])){			
			#Save to database using resultModel
            $RM = new ResultModel();
            $result = $RM->create_book_result($_POST);

            if ($result){
                echo "Registration successful!";
                //header("Location: /jkbw/login/");
                exit;
            } else {
                echo "Creating Reult failed. Please try again.";
            }//end result if.
			
		}//End if
		
        #Check if request is AJAX
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['classCode'])) {
            $classId = intval($_POST['classCode']);
            $db = Database::getInstance()->getConnection();

            //TODO: fetch students/books from DB for this class
            $stmt = $db->query("SELECT id as book_id, book_name_EN, book_name_UR, BookMarks 
                                FROM kbwu_books WHERE class_id ='$classId'");
            $results = $stmt->fetchAll();

            $bk_ptn ='<option value="">'.LANG::data('Choose').'</option>';
            foreach ($results as $row){
                $bk_ptn .= '<option value="'.$row['book_id'].'">'.$row['book_name_'.$_COOKIE['_LANG_']].'</option>';
            }//End foreach.
            echo $bk_ptn;exit;
        }//End if.

        //Check if request is AJAX
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['BookCode']) && isset($_POST['ExamType']) ) {
            $bookId = intval($_POST['BookCode']);
            $examtype = $_POST['ExamType'];
            $db = Database::getInstance()->getConnection();

            #TODO: fetch students/books from DB for this class exclude students already having result
            $Query="SELECT A.id, A.book_name_EN, A.book_name_UR, A.BookMarks,
								C.id AS class_id, C.classname_EN, C.classname_UR,
								S.id AS student_id,S.student_code, S.first_name_EN, S.last_name_EN, S.first_name_UR, S.last_name_UR,
                                S.father_name_EN, S.father_name_UR
                        FROM kbwu_books A
                        INNER JOIN classes C ON C.id = A.class_id
                        INNER JOIN kbwu_students S ON S.class_id = C.id
                        LEFT JOIN kbwu_results R ON R.student_id = S.student_code AND R.class_id = C.id 
                              AND R.book_id = A.id AND R.Status = 'Active' AND R.ExamType !='$examtype'
                        WHERE A.id = '$bookId' AND (R.id IS NULL OR R.Status != 'Active') 
                        ORDER BY S.student_code";
            $stmt = $db->query($Query);
            $rows = $stmt->fetchAll();
			if(empty($rows))
				echo '<tr>
						<td colspan="6">
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
								'.LANG::data('ResultGeneratedbook').'
								<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
							</div>
						</td>
				   </tr>';

            #Return as HTML snippet
            foreach ($rows as $row){
                echo '<tr data-stdid="'.$row['student_code'].'">
                    <td>'.$row['student_code'].'</td>
                    <td>'.$row['first_name_'.$_COOKIE['_LANG_']].' '.$row['last_name_'.$_COOKIE['_LANG_']].' </td>
                    <td>'.$row['father_name_'.$_COOKIE['_LANG_']].'</td>
                    <td> <input type="number" class="obtained-marks" value="" required="" /> </td>
                </tr>';
            }exit;
        }//End if.

        // If not AJAX, render normal page
        $data = ['classid' => $_POST['classCode'] ?? ''];
        $this->layout('layouts/new-results', $data);
    }//Close Func.
    
}//End Class
