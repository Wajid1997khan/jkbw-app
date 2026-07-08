<?php
/*
*   Create utility functions like base_url() to simplify URL generation and other tasks.
    Explanation:
    The base_url() function generates the full URL for a given path, considering the protocol (HTTP/HTTPS), host, and script directory.
*/
    function redirect($url) {
        header("Location: $url");
        exit();
    }
?>