<?php

require_once 'core/Controller.php';
require_once 'config/config.php';
require_once 'app/models/loginmodel.php';

class LoginController extends Controller{
    // Show the login page
    public function index() {
        $this->render('pages/login'); // Render the login view
    }

    #Handle the login form submission
    public function authenticate() {
        $remember = (!empty($_POST['remember'])) ? $_POST['remember'] : false;

        # get Instance of login model
        $login = new LoginModel();
        $isValid = $login->validate_user( $_POST['username'],$_POST['password'],$remember);

        if ($isValid) {
            // Redirect to the dashboard on success
            redirect(base_url('dashboard/'));
        } else {
            echo "Invalid username or password.";
        }//end else if.
    }//End if.
    
}//End Class.
?>