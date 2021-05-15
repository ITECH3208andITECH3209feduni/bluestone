<?php
require('db_connect.php');
$errors = [];
$data = [];

# for first name
if (empty($_POST['first_name'])) {
    $errors['first_name'] = 'First name is required.';
}
# for middle name
// if (empty($_POST['middle_name'])) {
//     $errors['middle_name'] = 'Middle name is required.';
// }

# for last name
if (empty($_POST['last_name'])) {
    $errors['last_name'] = 'Last name is required.';
}
# for phone number name
if (empty($_POST['phone'])) {
    $errors['phone'] = 'Phone number is required.';
}

# for email
if (empty($_POST['email'])) {
    $errors['email'] = 'Email is required.';
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

    # save user data in database
    $date           =  date('Y-m-d H:i:s');
    $first_name     = $_POST['first_name'];
    $middle_name    = $_POST['middle_name'] ? $_POST['middle_name'] : '';
    $last_name      = $_POST['last_name'];
    $phone          = $_POST['phone'];
    $email          = $_POST['email'];
    $password       = md5($_POST['password']);
    $created_at     =  $date;
    $updated_at     =  $date;

    # check if user is already existed or not 
    $select_sql = "SELECT * FROM `users` WHERE `email` = '$email'";
    $result = $conn->query($select_sql);

    # user already exist
    if ($result->num_rows > 0) {
        $data['success'] = false;
        $data['message'] = 'User already exist with this email!';
    } else {

        # create insert query
        $sql = "INSERT INTO `users`(`id`, `first_name`, `middle_name`, `last_name`, `phone`, `email`, `password`,`created_at`, `updated_at`) VALUES ('','$first_name','$middle_name','$last_name','$phone','$email','$password','$created_at','$updated_at')";

        # execute insert query
        if (mysqli_query($conn, $sql)) {
            $data['success'] = true;
            $data['message'] = 'Register successfuly!';
        } else {
            # if there is any error in query
            $data['success'] = false;
            $data['message'] = "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        }
    }
}

# return response
echo json_encode($data);
