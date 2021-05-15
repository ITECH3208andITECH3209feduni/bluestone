<?php
require('db_connect.php');
$errors = [];
$data = [];

# for email name
if (empty($_POST['email'])) {
    $errors['email'] = 'Email is required.';
}
# for phone
if (empty($_POST['phone'])) {
    $errors['phone'] = 'Phone is required.';
}

# for password
if (empty($_POST['password'])) {
    $errors['password'] = 'Password is required.';
}

# for confirm password
if (empty($_POST['confirm_password'])) {
    $errors['confirm_password'] = 'Confirm is required.';
} else{
    # check password is matching or not
    if ($_POST['password'] !== $_POST['confirm_password']) {
        $errors['confirm_password'] = 'Confirm should match password field.';
    }else{
        # to check password strength
        $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';
        
        if (!preg_match($pattern, $_POST['password'] )){
            # if password is not strong
            $data['success'] = false;
            $data['message'] = 'Password must contain minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character.';
            echo json_encode($data);
            die;
        }
    }
}

# if there is any error
if (!empty($errors)) {
    $data['success'] = false;
    $data['message'] = $errors;
} else {

    // save user data in database
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = md5($_POST['password']);
    $date =  date('Y-m-d H:i:s');

    # check if user is already existed or not 
    $select_sql = "SELECT * FROM `users` WHERE `email` = '$email' AND `phone`= '$phone'";
    $result = $conn->query($select_sql);
    if ($result->num_rows > 0) {

        # Update password
        $updateSql = "UPDATE `users` SET `password`='$password',`updated_at`='$date' WHERE  `email` = '$email' AND `phone`= '$phone'";
        if (mysqli_query($conn, $updateSql)) {
            $data['success'] = true;
            $data['message'] = 'Update successfully!';
        } else {
            $data['success'] = false;
            $data['message'] = "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    } else {

        $data['success'] = false;
        $data['message'] = 'Invalid email or phone!';
    }
}
# return response
echo json_encode($data);
