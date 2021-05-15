<?php
require('db_connect.php');
$errors = [];
$data = [];

# for email name
if (empty($_POST['email'])) {
    $errors['email'] = 'Email is required.';
}
# for password name
if (empty($_POST['password'])) {
    $errors['password'] = 'password is required.';
}

# if there is any error
if (!empty($errors)) {
    $data['success'] = false;
    $data['message'] = $errors;
} else {

    // save user data in database
    $email = $_POST['email'];
    $password = $_POST['password'];

    # check if user is already existed or not 
    $select_sql = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = md5('$password') ";
    $result = $conn->query($select_sql);

    if ($result->num_rows > 0) {
        # if user is authenticated 
        # Starting session
        session_start();
        while($row = $result->fetch_assoc()) {
            $user_type = $row['user_type'];

            # password field hide for security
            $row['password'] = '';
            // Storing session data
            $_SESSION["user_info"] = $row;
        }
        $data['success'] = true;
        $data['message'] = 'Login successfully!';
        $data['user_type'] = $user_type;
    }else{
       
        $data['success'] = false;
        $data['message'] = 'Invalid email or password!';
    }
 
}
# return response
echo json_encode($data);