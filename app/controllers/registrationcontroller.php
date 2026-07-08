<?php 

require_once 'app/models/registormodel.php';

class RegistrationController extends Controller {
    
    #Show the registration page
    public function index() {
        $this->render('pages/register');
    }

    #@function to add new member && Redirect to login page.
    public function register() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
			$fullname = trim($_POST['fullname']);
            $email = trim($_POST['email']);
            $referencenumber = trim($_POST['referencenumber']);
            $UserType = trim($_POST['UserType']);
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);

            #Basic validation
            if ( empty($fullname) || empty($email) || empty($referencenumber) || empty($username) || 
                 empty($password) || empty($UserType)) {
                echo "All fields are required!";
                return;
            }//end if.

            #Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            #Save to database using UserModel
            $userModel = new RegistorModel();
            $result = $userModel->createUser($fullname,$email,$referencenumber,$UserType,$username,$hashed_password);

            if ($result) {
                echo "Registration successful!";
                header("Location: /jkbw/login/");
                exit;
            } else {
                echo "Registration failed. Please try again.";
            }//end result if.
        }//End if.
    }//closed func.
	
}//end class
?>