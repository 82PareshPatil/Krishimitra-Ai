<?php
include 'session-file.php';
include 'handlers/register_handler.php';
include 'handlers/login_handler.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Krishimitra AI</title>

    <!-- CSS -->
    <link rel="stylesheet" href="assets/register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <style>
        /* General Styles */
        body {
            font-family: 'Roboto', sans-serif;
            font-size: 16px;
            font-weight: 300;
            color: #888;
            line-height: 30px;
            background-image: url('../img/bg2.webp');
            background-size: cover;
            margin: 0;
            padding: 0;
        }

        .wreper {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }

        .top-content {
            color: white;
            margin-top: 50px;
            text-align: center;
            animation: fadeIn 2s ease-in-out;
        }

        .signin-form, .signup-form {
            width: 100%;
            max-width: 600px;
            border-radius: 5px;
            margin: 10px;
            animation: slideIn 1s ease-in-out;
        }

        .form-top-left {
            background-color: rgba(0, 0, 0, 0.651);
            border-radius: 5px 5px 0px 0px;
            padding: 20px;
            color: white;
        }

        .form-bottom {
            background: rgba(0, 0, 0, 0.5);
            border-radius: 0 0 5px 5px;
            padding: 20px;
        }

        input {
            width: 100%;
            height: 40px;
            border-radius: 3px;
            padding-left: 10px;
            border: 0px;
            margin-bottom: 15px;
            transition: all 0.3s ease;
        }

        input:focus {
            transform: scale(1.02);
            box-shadow: 0 0 10px rgba(98, 235, 130, 0.5);
        }

        .form-bottom button {
    background-color: rgb(98, 235, 130);
    border: 0px;
    width: 100%; /* Full width */
    height: 40px;
    margin-top: 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: all 0.3s ease;
    display: block; /* Ensure it behaves as a block element */
    margin-left: auto; /* Center the button */
    margin-right: auto; /* Center the button */
}

.form-bottom button:hover {
    background-color: rgb(103, 247, 151);
    transform: scale(1.05);
}

        .footer {
            color: white;
            margin-top: 20px;
            text-align: center;
            animation: fadeIn 2s ease-in-out;
        }

        hr {
            opacity: 0.6;
        }

        .alert {
            color: red;
            margin: auto;
        }

        .pswd_icon_bg {
            background: white;
            height: 32px;
            width: 30px;
            position: absolute;
            display: flex;
            align-content: center;
            overflow: hidden;
            margin: 0 0 0 525px;
            cursor: pointer;
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideIn {
            from { transform: translateY(-50px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .wreper {
                flex-direction: column;
                align-items: center;
            }

            .signin-form, .signup-form {
                margin: 10px 0;
            }

            .pswd_icon_bg {
                margin: 0 0 0 90%;
            }

            .top-content h1 {
                font-size: 24px;
            }

            .top-content p {
                font-size: 14px;
            }
        }

        @media (max-width: 480px) {
            .form-top-left, .form-bottom {
                padding: 10px;
            }

            input, .form-bottom button {
                height: 35px;
            }

            .top-content h1 {
                font-size: 20px;
            }

            .top-content p {
                font-size: 12px;
            }
        }
    </style>

    <!-- Favicon -->
    <link rel="shortcut icon" href="../img/logo (1).jpg" type="image/x-icon">
    <link rel="stylesheet" href="assets/fontawesome-free-5.15.1-web/css/all.css">
</head>

<body>
    <div class="top-content">
        <h1>KrishiMitra Community, Where Farmers Connect, Share, and Grow Together!</h1>
        <p>Sign up and start sharing your problems and updates with your friends.</p>
        <hr style="width: 50%; color: white; margin-bottom:25px; margin-top:25px;">
    </div>

    <div class="wreper">
        <div class="signin-form">
            <div class="form-top-left">
                <h3>Login to our site</h3>
                <p>Enter Email and password to log on:</p>
            </div>
            <div class="form-bottom">
                <form action="register.php" method="POST" class="login-form">
                    <label for="form-email">Email Address</label>
                    <input type="email" name="log_email" placeholder="Email Address" value="<?php if(isset($SESSION['log_email'])) { echo $_SESSION['log_email']; } ?>" required> <br>
                    
                    <label for="form-password">Password</label>
                    <span class="pswd_icon_bg" onclick="log_pswd_toggale()"><i class="fa-regular fa-eye" id="pswd_show" style="margin: auto;"></i></span>
                    <input type="password" id="login_pswd" name="log_password" placeholder="Password" required> <Br>
                    
                    <?php if(in_array("Email or Password was incorrect", $error_array_login)) echo "<p class='alert'>Email or Password was incorrect</p>"; ?>
                    <button type="submit" name="login_button">Sign in!</button>
                </form>     
            </div>
        </div>

        <hr style="height:300px; color:white; margin-top:110px;">

        <div class="signup-form">
            <div class="form-top-left">
                <h3>Sign up now</h3>
                <p>Fill in the form below to get instant access:</p>
            </div>
            <div class="form-bottom">
                <form action="register.php" method="POST">
                    <label>First name</label>
                    <input type="text" name="reg_fname" placeholder="First Name" value="<?php if (isset($_SESSION['reg_fname'])) { echo $_SESSION['reg_fname']; } ?>" required>
                    <?php if (in_array("Your first name must be between 2 and 25 characters" , $error_array)) { echo "<p class='alert'>Your first name must be between 2 and 25 characters</p>"; } ?>

                    <label>Last name</label>
                    <input type="text" name="reg_lname" placeholder="Last Name" value="<?php if (isset($_SESSION['reg_lname'])) { echo $_SESSION['reg_lname']; } ?>" required>
                    <?php if (in_array("Your last name must be between 2 and 25 characters" , $error_array)) echo "<p class='alert'>Your last name must be between 2 and 25 characters</p>"; ?>

                    <label>Username</label>
                    <input type="text" name="username" placeholder="Username (Cannot be changed)" value="<?php if (isset($_SESSION['username'])) { echo $_SESSION['username']; } ?>" required>
                    <?php
                        if(in_array("Username already exists", $error_array)) echo "<p class='alert'>Username already exists</p>";
                        else if(in_array("Username must be between 2 and 20", $error_array)) echo "<p class='alert'>Username must be between 2 and 20</p>";
                        else if(in_array("You username can only contain english characters or numbers", $error_array)) echo "<p class='alert'>You username can only contain english characters or numbers</p>";
                    ?>

                    <label>Email</label>
                    <input type="email" name="reg_email" placeholder="Email" value="<?php if (isset($_SESSION['reg_email'])) { echo $_SESSION['reg_email']; } ?>" required>

                    <label>Confirm Email</label>
                    <input type="email" name="reg_email2" placeholder="Confirm Email" value="<?php if (isset($_SESSION['reg_email2'])) { echo $_SESSION['reg_email2']; } ?>" required>
                    <?php
                        if (in_array("Email already in use", $error_array)) echo "<p class='alert'>Email already in use</p>";
                        else if (in_array("Email is invalid format", $error_array)) echo "<p class='alert'>Email is invalid format</p>";
                        else if (in_array("Email doesn't match", $error_array)) echo "<p class='alert'>Email doesn't match</p>";
                    ?>

                    <label>Password</label>
                    <span class="pswd_icon_bg" onclick="reg_pswd_toggale()"><i class="fa-regular fa-eye" id="reg_pswd_show" style="margin: auto;"></i></span>
                    <input type="password" id="register_pswd" name="reg_password" placeholder="Password" required>

                    <label>Confirm password</label>
                    <span class="pswd_icon_bg" onclick="reg_conf_pswd_toggale()"><i class="fa-regular fa-eye" id="reg_conf_pswd_show" style="margin: auto;"></i></span>
                    <input type="password" id="register_conferm_pswd" name="reg_password2" placeholder="Confirm Password" required>
                    <?php 
                        if(in_array("Your passwords doesn't match", $error_array)) echo "<p class='alert'>You passwords doesn't match</p>";
                        else if(in_array("Your password can only contain english characters or numbers", $error_array)) echo "<p class='alert'>Your password can only contain english characters or numbers</p>";
                        else if(in_array("Your password must be between 5 and 30 characters or numbers", $error_array)) echo "<p class='alert'>Your password must be between 5 and 30 characters or numbers</p>";
                    ?>

                    <label>Gender</label>
                    <tr>
                        <td>
                            <input style="width:10px; height:10px;" type="radio" name="gender" value="Male" <?php if (isset($_POST['gender']) && $_POST['gender'] == "Male"){ ?> checked <?php } ?> required> Male
                            <input style="width:10px; height:10px;" type="radio" name="gender" value="Female" <?php if (isset($_POST['gender']) && $_POST['gender'] == "Female"){ ?> checked <?php } ?> required> Female
                        </td>
                    </tr>

                    <br>      
                    <tr>
                        <td>Birthday
                        &nbsp;&nbsp;
                        <input type="date" name="dob" value="<?php if (isset($_SESSION['dob'])) { echo $_SESSION['dob']; } ?>" required>
                        </td>
                    </tr>

                    <button type="submit" name="reg_user">Sign me up!</button>         
                </form>
            </div>
        </div>
    </div>

    <hr style="color:white; margin-top:265px; width:40%;">

    <!-- Footer -->
    <footer>			
    	<div class="footer"> 
            <a style="text-decoration-line: none; color:rgb(122, 255, 153);" href="admin.php"><i class="fas fa-user-shield"></i> Admin? click here <i class="fas fa-arrow-right"></i></a>
    		<p> ©Krishimitra ai All Rights Reserved <BR> Website designed and developed by <strong><U>Paresh Patil</u></strong></p>
    	</div>
    </footer>

    <script>
        function log_pswd_toggale() {
            var x = document.getElementById("login_pswd");
            var img = document.getElementById("pswd_show");
            if (x.type === "password") {
                img.className = "fa-regular fa-eye-slash"
                x.type = "text";
            } else {
                img.className = "fa-regular fa-eye"
                x.type = "password";
            }
        }
        function reg_pswd_toggale() {
            var y = document.getElementById("register_pswd");
            var img = document.getElementById("reg_pswd_show");
            if (y.type === "password") {
                img.className = "fa-regular fa-eye-slash"
                y.type = "text";
            } else {
                img.className = "fa-regular fa-eye"
                y.type = "password";
            }
        }
        function reg_conf_pswd_toggale() {
            var z = document.getElementById("register_conferm_pswd");
            var img = document.getElementById("reg_conf_pswd_show");
            if (z.type === "password") {
                img.className = "fa-regular fa-eye-slash"
                z.type = "text";
            } else {
                img.className = "fa-regular fa-eye"
                z.type = "password";
            }
        }
    </script>
</body>
</html>