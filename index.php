<?php 
/*
 #@uthor:  WAJID ALI JAVID KHAN
* -*Front Controller (index.php)
    This is the entry point for my application. It includes all necessary files and starts the router.
    Explanation:
        The index.php file initializes the router and routes the request to the appropriate controller and method.
*/

// Include core files
require_once 'core/Router.php';
require_once 'core/Controller.php';
require_once 'core/Helpers.php';

#Check if '_LANG_' parameter is passed via GET, e.g. index.php?_LANG_=EN or ?_LANG_=UR
if (isset($_GET['_LANG_'])) {
    $lang = strtoupper(trim($_GET['_LANG_'])); // sanitize and normalize to uppercase
    $allowedLangs = ['EN', 'UR', 'AR']; // Add your supported languages here

    if (in_array($lang, $allowedLangs)) {
        setcookie('_LANG_', $lang, time() + (86400 * 30), "/"); // Set cookie for 30 days
        $_COOKIE['_LANG_'] = $lang; // Update current request cookie variable as well (optional)
    }
} else {
    // Optional: if no cookie is set, you can set a default language here
    if (!isset($_COOKIE['_LANG_'])) {
        setcookie('_LANG_', 'EN', time() + (86400 * 30), "/");
        $_COOKIE['_LANG_'] = 'EN';
    }
}//End if.

#Initialize the router and process the request
$router = new Router();
$router->route();
?>