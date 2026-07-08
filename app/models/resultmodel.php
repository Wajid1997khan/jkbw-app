<?php
require_once 'core/Database.php';
class ResultModel{

    /*
     *@Function to Create Book Result.
     **/
    public function create_book_result($data) {
        try{
			$status    = 'Active'; 
			$createdby = $_COOKIE['UserName'];
			$date      = date('Y-m-d');
			$year      = date('Y', strtotime($_POST['MonthYear']));

			$db = Database::getInstance()->getConnection();
			// Prepare statement with placeholders
			$stmt = $db->prepare("INSERT INTO kbwu_results(student_id, class_id, book_id, year, total_marks, obtained_marks, Status, created_at, created_by) 
						  VALUES(:student_id, :class_id, :book_id, :year, :total_marks, :obtained_marks, :Status, :created_at, :created_by)");
			// Loop through each student item
			foreach ($data['Items'] as $item) {
				$stmt->bindParam(':student_id',   $item['stdcode']);
				$stmt->bindParam(':class_id',     $data['ClassCode']);
				$stmt->bindParam(':book_id',      $data['BookCode']);
				$stmt->bindParam(':year',         $year);
				$stmt->bindParam(':total_marks',  $item['bkmrks']);
				$stmt->bindParam(':obtained_marks', $item['obtmarks']);
				$stmt->bindParam(':Status', $status);
				$stmt->bindParam(':created_at',   $date);
				$stmt->bindParam(':created_by',   $createdby);

				$stmt->execute();
			}//end foreach.
			return true;
		}catch(PDOException $e){
			echo "Error: " . $e->getMessage(); return false;
		}//end trycatch.
    }//Closed Func.

}// End Class
?>
