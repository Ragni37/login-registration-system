<?php
include 'connection.php';

$msg='';
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $user_type = $_POST['user_type'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $select = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $select_user = mysqli_query($connection, $select);
    if (mysqli_num_rows($select_user) > 0) {
        $msg = "User already exists!";
    } else {
        if ($password != $confirm_password) {
            $msg = "Passwords do not match!";
        } else {
            $insert = "INSERT INTO users (name, email, user_type, password) VALUES ('$name', '$email', '$user_type', '$password')";
            mysqli_query($connection, $insert);
            header('location:login.php');
        }
        
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
   
</head>
<body>
    <div class="form">
        <form action="" method="post">
            <h2>Registration</h2>
            <p class="msg"> <?php echo $msg; ?></p>
            <div class="form-group">
                <input type="text" name="name" class="form-control" placeholder="Enter your name" required>
            </div>
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
            </div>
            <div class="form-group">
                <select name="user_type" id="" class="form-control" placeholder=" User " required>
                    <option value=""> User Type</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
            </div>
            <div class="form-group">
                <input type="password" name="confirm_password" class="form-control" placeholder="Confirm your password" required>
            </div>

            
            <button type="submit" class="btn font-weight-bold" name="submit">Register Now</button>
            <p>Already have an account? <a href="login.php">Login Now</a></p>
        </form>
    </div>
</body>
</html>