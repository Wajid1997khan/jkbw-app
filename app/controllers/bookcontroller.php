<?php
/*
* @AUTOR :WAJID ALI JAVID KHAN
- Created :22 July 2025
    -* The base controller is the foundation for all book lists. 
*/
require_once 'core/Controller.php';
require_once 'config/config.php';
require_once 'core/Database.php';
require_once 'app/controllers/classcontraoller.php';
require_once __DIR__.'/../../public/library/language.php';

class BookController extends Controller {
    public function index(){
        $this->layout('layouts/bookslist');
    }//End if.

    /*
     *@function to add new book.
    **/
    public function addnewbook(){
		
		$ClassID = $_POST['ClassCode'] ?? '';
		$CLS = new ClassController;
        
		#pass Maping Data.
        $data = ['VALBookNameEnglish' => '',
				 'VALBookNameUrdu' => '',
				 'OPTClassList' => $CLS->get_classes_dropdown($ClassID)];
					  
        $this->layout('layouts/new-book', $data);
    }//closed Func.


    /*
    * @function to display all books
    */
    public function display_book_list(){
        // Get DB connection
        $db = Database::getInstance()->getConnection();

        // Prepare and execute the query
        $stmt = $db->prepare("SELECT A.id AS bookid, A.book_name_EN,  A.book_name_UR, 
                                     B.id AS classid, B.classname_EN, B.classname_UR 
                                FROM kbwu_books AS A 
                                INNER JOIN classes AS B ON B.id = A.class_id 
                                WHERE A.id > 0");
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $view = '<table class="table table-hover" id="TxtbooksTable">
            <thead>
                <tr>
                    <th width="10%">'.LANG::data('SerialNum').'</th>
                    <th width="10%">'.LANG::data('ClassCode').'</th>
                    <th width="20%">'.LANG::data('NameEnglish').'</th>
                    <th width="20%">'.LANG::data('NameUrdu').'</th>
                    <th width="20%">'.LANG::data('BookNameEnglish').'</th>
                    <th width="20%">'.LANG::data('BookNameUrdu').'</th>
                </tr>
            </thead><tbody>';

            $serial = 1;
            foreach ($results as $row) {
                $view .= '<tr>
                    <td>'.$serial++.'</td>
                    <td>'.htmlspecialchars($row['classid']).'</td>
                    <td>'.htmlspecialchars($row['classname_EN']).'</td>
                    <td>'.htmlspecialchars($row['classname_UR']).'</td>
                    <td>'.htmlspecialchars($row['book_name_EN']).'</td>
                    <td>'.htmlspecialchars($row['book_name_UR']).'</td>
                </tr>';
            }//End for each.
        $view .= '</tbody></table>';
        return $view;
    }//End Func.

}//End Class
