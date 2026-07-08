<?php
/*
 *@AUTOR :WAJID ALI JAVID KHAN
 - Created : 28 Nov 2024
    -*The router will handle routing requests and direct them to the appropriate controller and method.
**/
require_once 'config/config.php';
require_once 'app/controllers/logincontroller.php';
require_once 'app/controllers/dashboardcontroller.php';
require_once 'app/controllers/registrationcontroller.php';
require_once 'app/controllers/bookcontroller.php';
require_once 'app/controllers/classcontraoller.php';
require_once 'app/controllers/resultcontraoller.php';
require_once 'app/controllers/studentcontroller.php';

class Router {

    /*
     *@Funtion to Match the URL to a controller and method
    **/
    public function route() {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = rtrim($uri, '/'); // Remove trailing slash
        $uri = '/' . ltrim($uri, '/'); // Ensure leading slash
        $method = $_SERVER['REQUEST_METHOD'];

        // --- Public Routes ---
        if ($uri === '/jkbw/login' && $method === 'GET') {
            (new LoginController())->index();
            return;
        }

        if ($uri === '/jkbw/login/authenticate' && $method === 'POST') {
            (new LoginController())->authenticate();
            return;
        }

        if ($uri === '/jkbw/register' && $method === 'GET') {
            (new RegistrationController())->index();
            return;
        }

        if ($uri === '/jkbw/registeration' && $method === 'POST') {
            (new RegistrationController())->register();
            return;
        }

        #Protected Routes (Require Login) ---
        $this->requireAuth(function() use ($uri, $method) {
            switch ($uri) {
                case '/jkbw/dashboard': (new DashboardController())->index(); break;
                case '/jkbw/bookslist':(new BookController())->index(); break;
                case '/jkbw/addnewbook': (new BookController())->addnewbook();break;
                case '/jkbw/classeslist': (new ClassController())->index(); break;
                case '/jkbw/addnewclass':(new ClassController())->addnewclass(); break;
                case '/jkbw/results': (new ResultController())->index(); break;
                case '/jkbw/addnewresult': (new ResultController())->addnewresult(); break;
				case '/jkbw/studentslist': (new StudentController())->index(); break;
				case '/jkbw/admission': (new StudentController())->Admission(); break;
				case '/jkbw/admissionlist': (new StudentController())->AdmissionList(); break;
                default: http_response_code(404); echo "404 - Page Not Found";
            }//End Switch.
        });
    }//closed Func.

    /*
     * Middleware to check authentication before executing protected routes
    **/
    protected function requireAuth($callback) {
        if ($this->is_authenticated()) {
            $callback();
        } else {
            echo 'Session expired. Redirecting to login...';
            header("Location: /jkbw/login/");
            exit;
        }//End if.
    }//Closed Func.

    /*
     *@Function to check if user is authenticated
    **/
    protected function is_authenticated() {
        if (!isset($_COOKIE['UserName']) || !isset($_COOKIE['Token'])) return false; 

        $username = $_COOKIE['UserName']; 
        $token = $_COOKIE['Token'];

        #Decrypt the token
        $dec_token = $this->decrypt_token($token);

        #Validate if decrypted username matches the cookie username
        return $username === $dec_token;
    }// Closed Func.

    #Function to Decrypt data.
    protected function decrypt_token($data) {
        $key = ENCRYPTION_KEY;
        $iv = substr(hash('sha256', $key), 0, 16); // Generate IV
        return openssl_decrypt($data, ENCRYPTION_METHOD, $key, 0, $iv);
    }// Closed Func.

}//End class
?>