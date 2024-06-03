<?php
session_start();
require("db.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'];
    $password = md5($_POST['pass']);

    // Check if the user exists
    $check = "SELECT email FROM users WHERE email=?";
    $stmt = $db->prepare($check);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows != 0) {
        // Verify the psd
        $user_check = "SELECT * FROM users WHERE email=? AND password=?";
        $stmt = $db->prepare($user_check);
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $res = $stmt->get_result();

        if ($res->num_rows != 0) {
            // Check if the user is actvtd
            $check_status = "SELECT * FROM users WHERE email=? AND password=? AND status='activate'";
            $stmt = $db->prepare($check_status);
            $stmt->bind_param("ss", $email, $password);
            $stmt->execute();
            $status = $stmt->get_result();

            if ($status->num_rows != 0) {
                $_SESSION['user_id'] = $res->fetch_assoc()['id']; 
                echo "success";
            } else {
                echo "pending";
            }
        } else {
            echo "Wrong Password";
        }
    } else {
        echo "User not found";
    }
} else {
    echo "Unauthorized request";
}
?>
