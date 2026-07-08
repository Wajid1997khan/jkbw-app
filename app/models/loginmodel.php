<?php
#Define encryption method and secret key
define('ENCRYPTION_KEY', 'WAJ-DEV-1997-15-2');
define('ENCRYPTION_METHOD', 'AES-256-CBC');

require_once 'core/Database.php';

class LoginModel {

    public function validate_user($username, $password, $remember = false) {
        #get Datebase connection.
        $db = Database::getInstance()->getConnection();
    
        #Fetch user by username (case-insensitive)
        $stmt = $db->prepare("SELECT id, username, password_hash FROM kbwu_users WHERE LOWER(UserName) = LOWER(:username)");
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if(!$user){
            echo "User not found.<br>";
            return false;
        }
    
        #Verify password if yes login to system make set user name as cookie.
        if (password_verify($password, $user['password_hash'])) {
            $token = $this->encrypt_token($user['username']);
            #Set cookies for username and token
            //if($remember){
            setcookie('UserName',  $user['username'], time() + (86400 * 30), "/");
            setcookie('Token', $token, time() + (86400 * 30), "/");
            //}// End remmber user if 
            return true;
        } else {
            return false;
        }//end if.
    }//closed func.

    #Function to Encrypt data.
    function encrypt_token($data) {
        $key = ENCRYPTION_KEY;
        $iv = substr(hash('sha256', $key), 0, 16); // Generate IV
        return openssl_encrypt($data, ENCRYPTION_METHOD, $key, 0, $iv);
    }//closed func.
    
}//End Class
?>
