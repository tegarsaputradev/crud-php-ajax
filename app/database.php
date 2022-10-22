<?php

$db_con = mysqli_connect('localhost', 'root', '', 'nutech');
if($db_con->connect_errno) {
    echo "failed" . $db_con->connect_error;
    exit();
}