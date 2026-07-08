<?php
require_once 'core/Database.php';

class RegistorModel {

    /*
     *@Function to Register New Member.
     **/
    public function createUser($fullname,$email,$referencenumber,$usertype,$username,$password) {
        try {
            $status='Active'; 
			$createdby = $_COOKIE['UserName'] ?: 'WAJID';
			$date = date('Y-m-d');

            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare("INSERT INTO kbwu_users
                                (full_name,email,reference_id,user_type,username,status,password_hash,created_at) 
                         VALUES (:full_name,:email,:reference_id,:user_type,:username,:status,:password_hash,:created_at)");
            $stmt->bindParam(':full_name', $fullname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':reference_id', $referencenumber);
            $stmt->bindParam(':user_type', $usertype);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':password_hash', $password); // Store hashed password
            $stmt->bindParam(':created_at', $date);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage(); return false;
        }// end try catch
    }//Closed Func.

}// End Class
?>
