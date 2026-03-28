<?php
include 'connection.php';
session_start();
$msg='';
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $select = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $select_user = mysqli_query($connection, $select);
    if (mysqli_num_rows($select_user) > 0) {
        $row = mysqli_fetch_assoc ($select_user);
        if ($row['user_type'] == 'user') {
            $_SESSION['user'] = $row['email'];
            $_SESSION['id'] = $row['id'];
             header('location:user.php');
        } 
        elseif ($row['user_type'] == 'admin') {
            $_SESSION['admin'] = $row['email'];
            $_SESSION['id'] = $row['id'];
            header('location:admin.php');
        }
    } 
    else {
        $msg = "Incorrect email or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>
    <div class="form">
        <form action="" method="post">
            <h2>Login</h2>
            <p class="msg"> <?php echo $msg; ?></p>
           
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
            </div>
           
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
            </div>

            
            <button type="submit" class="btn font-weight-bold" name="submit">Login Now</button>
            <p>Don't have an account? <a href="register.php">Register Now</a></p>
        </form>
    </div>
</body>
</html>