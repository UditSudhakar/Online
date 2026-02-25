<?php
include("db.php");

$message = "";

if(isset($_POST['register'])){
    
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $pass = md5($_POST['password']);

    $check = $conn->query("SELECT * FROM users WHERE email='$email'");
    
    if($check->num_rows > 0){
        $message = "Email already registered!";
    } else {
        $conn->query("INSERT INTO users(name,email,password) VALUES('$name','$email','$pass')");
        header("Location: login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Online Examination - Register</title>
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
<div class="sub">Student Registration Portal</div>

<div class="container">

<h2>Register</h2>

<?php if($message != ""){ ?>
    <p style="color:red;"><?php echo $message; ?></p>
<?php } ?>

<form method="post">

<label>Name</label><br>
<input type="text" name="name" placeholder="Enter your name" required><br><br>

<label>Email</label><br>
<input type="email" name="email" placeholder="Enter your email" required><br><br>

<label>Password</label><br>
<input type="password" name="password" placeholder="Enter your password" required><br><br>

<button type="submit" name="register">Register</button>

</form>

<br>
Already have an account? 
<a href="login.php">Login Here</a>

</div>

</body>
</html>