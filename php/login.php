<?php
$username = $_POST['username'];
$password = $_POST['password'];

if ( isset($username) && isset($password) ) {
    $success = false;
    $db_fullname = $db_phone = $db_birthday = $db_age = "";

    include('database.php');

    if ( getDB() ) {
        $query = "SELECT * FROM account WHERE username = '$username'";
        $result = pg_query($query);
    
        if ($result) {
            $db_password = pg_result($result, 0, "password");
        
            // Decrypt the password and then compare.
            if (password_verify($password, $db_password)) {
                $success = true;
            }
        }
    }
}

echo json_encode(array('success' => $success));
?>