




<?php
//include config file

require "connection_db.php";

$Name=$_GET ['name'];
$add=$_GET ['address'];
$sal=$_GET ['salary'];

// print $Name;
// print $add;
// print $sal;

$sql="insert into employees(name, address, salary) values ('$Name','$add','$sal')";

$send_to_db=$connect->query($sql);

?>

