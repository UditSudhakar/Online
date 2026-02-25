<?php
session_start();
include("db.php");

$message = "";

if(isset($_POST['login'])){
    $email = trim($_POST['email']);
    $pass = md5($_POST['password']);

    $res = $conn->query("SELECT * FROM users WHERE email='$email' AND password='$pass'");

    if($res->num_rows > 0){
        $user = $res->fetch_assoc();
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        header("Location: exam.php");
        exit();
    } else {
        $message = "Invalid Email or Password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Online Examination - Login</title>
<link rel="stylesheet" href="style.css">

<style>
.header{
    color:white;
    font-size:32px;
    margin-top:30px;
    font-weight:bold;
}
.sub{
    color:white;
    margin-bottom:20px;
}
</style>

</head>

<body>

<div class="header">Online Examination System</div>
<div class="sub">Student Login Portal</div>

<div class="container">

<h2>Login</h2>

<?php if($message != ""){ ?>
    <p style="color:red;"><?php echo $message; ?></p>
<?php } ?>

<form method="post">

<label>Email</label><br>
<input type="email" name="email" placeholder="Enter your email" required><br><br>

<label>Password</label><br>
<input type="password" name="password" placeholder="Enter your password" required><br><br>

<button type="submit" name="login">Login</button>

</form>

<br>
Don't have an account? 
<a href="register.php">Register Here</a>

</div>

</body>
</html>