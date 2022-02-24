<?php
define('DB_SYS','mysql');
define('DB_HOST','localhost');
define('DB_NAME','users');
define('DB_USER','root');
define('DB_PASS','');
function redirect($lc){
    $location = 'Location: '.$lc;
    header($location, true, 302);
}
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
?>