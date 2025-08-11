<?php
/*this file contains database configuration assuming u r running mysql using user 'root' and pass ''*/

define('DB_SERVER','192.168.224.20');
define('DB_USERNAME','admin');
define('DB_PASSWORD','admin');
define('DB_NAME','DITISS2025');

//try connecting to the database
$conn=mysqli_connect('192.168.224.20','admin','admin','DITISS2025');

//CHECK THE CONNNECTION
if($conn==false){
    dir('Error:can not connect');
}

?>
