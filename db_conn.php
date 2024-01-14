<?php
    // $sname = "fdb1032.awardspace.net";
    // $uname = "4409973_users";
    // $db_name = "4409973_users";
    $pass = "13P4R!c90dT1";
    $sname = "localhost:3306";
    $uname = "root";
    $db_name = "users";
    $conn = mysqli_connect($sname,$uname, $pass, $db_name);
    if(!$conn)
        echo "conn failed!";

?>