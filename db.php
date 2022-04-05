<?php
    $servername = 'localhost';
    $username = 'cs275';
    $password = 'cs275';
    $dbname = 'enghancer';
    $connection = mysqli_connect($servername, $username, $password, $dbname);

    if($connection == false){
        die('Database connection error:' .mysql_error());
    }
    ?>