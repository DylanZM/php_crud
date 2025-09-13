<?php

session_start();

//your database connection

$conn = mysqli_connect(
    'localhost', // server name it is localhost by default
    'root', // username it is root by default
    '', // password database it is left blank by default

    'crud_php'// name of database
);

// test connection

// if (isset($conn)) {
//     echo "Database connected";
// } else {
//     echo "Database not connected";
// }
