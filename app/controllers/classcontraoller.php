<?php
/*
* @AUTOR :WAJID ALI JAVID KHAN
- Created :22 July 2025
    -* The base controller is the foundation for all class lists. 
*/
require_once 'core/Controller.php';
require_once 'config/config.php';
require_once 'core/Database.php';
require_once __DIR__ . '/../../public/library/language.php';

class ClassController extends Controller {
       
    public function index(){
        $this->layout('layouts/classeslist');
    }//End if.
    
    /*
     *@function to add new class.
    **/
    public function addnewclass(){
        $data = [
            'classNameEnglish' => $_POST['ClassNameEnglish'] ?? '',
            'classNameUrdu' => $_POST['ClassNameUrdu'] ?? ''
        ];
        $this->layout('layouts/new-class', $data);
    }//closed Func.


    /*
     *@function to load class list
    **/
    public function display_class_list(){
        //Get DB connection
        $db = Database::getInstance()->getConnection();

        // Prepare and execute the query
        $stmt = $db->prepare("SELECT id, classname_EN, classname_UR FROM classes WHERE id > 0");
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $view = '<table class="table table-hover" id="TxtbooksTable">
            <thead>
                <tr>
                    <th width="10%">'.LANG::data('ClassCode').'</th>
                    <th width="40%">'.LANG::data('NameEnglish').'</th>
                    <th width="40%">'.LANG::data('NameUrdu').'</th>
                </tr>
            </thead><tbody>';
            foreach ($results as $row) {
                $view .= '<tr>
                    <td>'.htmlspecialchars($row['id']).'</td>
                    <td>'.htmlspecialchars($row['classname_EN']).'</td>
                    <td>'.htmlspecialchars($row['classname_UR']).'</td>
                </tr>';
            }//End for each.
        $view .= '</tbody></table>';
        return $view;
    }//Closed Func.

    /**
     * @function to get classes drop down list with selected class.
     */
    public function get_classes_dropdown($ClassID) {
        $ption = '';
        //Get DB connection
        $db = Database::getInstance()->getConnection();

        // Assuming $this->db is your PDO instance
        $stmt = $db->prepare("SELECT id, classname_EN, classname_UR FROM classes WHERE id > 0");
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Add default "Choose" option
        $ption .= '<option value="">'.LANG::data('Choose').'</option>';
        foreach ($results as $row) {
            $slt = ($row['id'] == $ClassID) ? 'selected' : '';
            // You can use classname_EN, classname_UR, or both
            $ption .= '<option value="'.$row['id'].'" '.$slt.'>'.$row['classname_'.$_COOKIE['_LANG_']].'</option>';
        }
        return $ption;
    }//Closed Func.
    
}//End Class
