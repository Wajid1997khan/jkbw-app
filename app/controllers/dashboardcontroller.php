<?php
/*
* @AUTOR :WAJID ALI JAVID KHAN
- Created :28 nov 2025
    -* The base controller is the foundation for all other dashboard. 
*/

require_once 'core/Controller.php';
require_once 'config/config.php';

class DashboardController extends Controller {

    public function index() {
       // $this->render('layouts/dashboard');
       $this->layout('layouts/dashboard');
    }

}//end Class
