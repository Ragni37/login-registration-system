<?php
include 'connection.php';
session_start();
if (!isset($_SESSION['user'])) {
    header('location:login.php');
}   
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <style>
        body {
    background-color: #f79fe6;
}
.user-profile {
    text-align: center;
    margin-top: 15rem;
    background-color: #f2dfe9;
    padding: 1rem;
}
.user-profile p {
    font-size: 18px;
    margin-top: 2rem;
    
}

.user-profile button {
    margin-top: 15px;
    background-color: #e37dcf;
    color: #fff;
    padding: 10px 25px;
    border: none;
   font-size: 16px;
    border-radius: 5px;
}
.user-profile a {
    margin-top: 15px;
    background-color: #e37dcf;
    color: #fff;
    padding: 10px 25px;
    border: none;
    font-size: 16px;
    border-radius: 5px;
    display: inline-block;
}
    </style>
</head>
<body>
    <div class="user-profile">
        <h2>Welcome to the User Page!</h2>
        <p>User : <span><?php echo $_SESSION['user']; ?></span></p>
        <a href="logout.php" class="btn custom-btn">Logout</a>
    </div>
</body>
</html>