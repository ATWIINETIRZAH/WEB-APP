

<?php
$server='localhost'; // localhost
$user='root'; // mysql user name
$password=''; // my sql user code
$db_name='bookstore';

// object oriented version
$connect= new mysqli($server, $user, $password, $db_name);

if ($connect -> error){
    print('Failed to connect');
}
else {
    // echo('connected Successfully!');
    //returns to the login page when submit is created
}

// to use java, we use import ... just like in python
// but in php we use 'include' or 'require_once'
// require_once

 ?>
