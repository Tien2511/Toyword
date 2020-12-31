<?php
$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encrypt the password.
$fullname = $_POST['fullname'];
$phone = $_POST['phone'];
$birthday = $_POST['birthday'];
$age = intval($_POST['age']);
$success = false;

include('database.php');

if ( getDB() ) {
    if ( !isset($phone) ) {
        $phone = "";
    }

    if ( !isset($birthday) ) {
        $birthday = "";
    }

    if ( !isset($age) ) {
        $age = -1;
    }
    
    if ( isset($username) && isset($password) && isset($fullname) ) {
        $query = "INSERT INTO account VALUES ('$username', '$password', '$fullname',
                                              '$phone', '$birthday', $age)";
        if ( pg_query($query) ) {
            $success = true;
        }
    }
}

echo json_encode(array('success' => $success));
?>