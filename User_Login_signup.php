<?php
session_start();
$no=0;
$_SESSION['no']=$no;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Signup</title>
</head>
<style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    background: #ffe5ec;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    position: relative;
    width: 800px;
    height: 500px;
    background: white;
    border-radius: 10px;
    overflow: hidden;
    display: flex;
    box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
}

.form {
    position: absolute;
    width: 50%;
    height: 100%;
    padding: 50px;
    transition: transform 0.8s ease-in-out;
}

.form h2 {
    margin-bottom: 20px;
    color: #ff5252;
}

.form input {
    width: 100%;
    margin-bottom: 15px;
    padding: 10px;
    border: 1px solid #ff5252;
    border-radius: 5px;
    outline: none;
}

.form button {
    width: 100%;
    padding: 10px;
    background: #ff5252;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: background 0.3s ease;
}

.form button:hover {
    background: #ff5252;
}

.form.active {
    transform: translateX(0);
}

.form:not(.active) {
    transform: translateX(-100%);
}

#signup-form {
    transform: translateX(100%);
}

.slider-panel {
    position: absolute;
    top: 0;
    right: 0;
    width: 50%;
    height: 100%;
    background: #ff5252;
    color: white;
    overflow: hidden;
    transition: transform 0.8s ease-in-out;
    z-index: 1;
}

.slider-panel .overlay {
    position: relative;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 50px;
    text-align: center;
}

.slider-panel .overlay .content h2 {
    font-size: 24px;
    margin-bottom: 15px;
}

.slider-panel .overlay .content p {
    font-size: 16px;
    margin-bottom: 20px;
}

.slider-panel .overlay .content button {
    padding: 10px 20px;
    background: white;
    color: #ff5252;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    transition: background 0.3s ease, color 0.3s ease;
}

.slider-panel .overlay .content button:hover {
    background: #ff5252;
    color: white;
}
</style>
<body>
    <div class="container">
        <!-- Sliding Panel -->
        <div class="slider-panel">
            <div class="overlay">
                <div class="content">
                    <h2 id="slider-header">Welcome Back!</h2>
                    <p id="slider-text">To stay connected with us, please login with your personal info.</p>
                    <button id="slider-button" onclick="toggleForm()">Sign Up</button>
                </div>
            </div>
        </div>

        <!-- Login Form -->
        <form id="login-form" class="form active" method="POST" action="login.php">
            <h2>Login</h2>
            <input type="email" name="email" placeholder="email" required>
            <input type="password" name="pass" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>

        <!-- Signup Form -->
        <form id="signup-form" class="form" method="POST" action="signup.php">
            <h2>Sign Up</h2>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="pass" placeholder="Password" required>
            <button type="submit">Sign Up</button>
        </form>
    </div>
    <script>


        function toggleForm() {
    const loginForm = document.getElementById("login-form");
    const signupForm = document.getElementById("signup-form");
    const sliderPanel = document.querySelector(".slider-panel");
    const sliderHeader = document.getElementById("slider-header");
    const sliderText = document.getElementById("slider-text");
    const sliderButton = document.getElementById("slider-button");

    loginForm.classList.toggle("active");
    signupForm.classList.toggle("active");

    if (loginForm.classList.contains("active")) {
        sliderPanel.style.transform = "translateX(0)";
        sliderHeader.textContent = "Welcome Back!";
        sliderText.textContent = "To stay connected with us, please login with your personal info.";
        sliderButton.textContent = "Sign Up";
    } else {
        sliderPanel.style.transform = "translateX(-100%)";
        sliderHeader.textContent = "Hello, Friend!";
        sliderText.textContent = "Enter your details to create an account with us.";
        sliderButton.textContent = "Login";
    }
}

    </script>
</body>
</html>
