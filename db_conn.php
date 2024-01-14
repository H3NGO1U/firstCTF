<?php
    $pass = "CENCURED";
    $sname = "CENCURED";
    $uname = "CENCURED";
    $db_name = "users";
    $conn = mysqli_connect($sname,$uname, $pass, $db_name);
    if(!$conn)
        echo "conn failed!";

?>