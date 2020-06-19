<?php
require "inc/sessionHeader.php";
include_once 'inc/autoloader.php';
include("inc/captcha.php");
$_SESSION['captcha'] = captcha();
if (!empty($_SESSION["userId"])) {
	header("Location: dashboard.php");
	exit();
}
?>
<html>
<?php require "inc/header.php" ?>
    <div>
        <form action="login-action.php" method="post" id="frmLogin" onSubmit="return validate();">
            <div class="login-form">
                <div class="form-head">Künstler Login</div>
                <div class="field-column">
                    <div>
                        <label for="username">Username</label><span id="user_info" class="error-info"></span>
                    </div>
                    <div>
                        <input name="username" id="username" type="text" class="input-box">
                    </div>
                </div>
                <div class="field-column">
                    <div>
                        <label for="password">Password</label><span id="password_info" class="error-info"></span>
                    </div>
                    <div>
                        <input name="password" id="password" type="password" class="input-box">
                    </div>
                </div>
	            <div class="field-column">
                    <div>
                        <label for="captcha">Captcha</label><span id="captcha_info" class="error-info"></span>
                    </div>
                    <div>
	                    <input name="captcha" id="captcha" type="text" class="input-box">
	                    <?php echo '<img src="' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA code">'; ?>
                    </div>
                </div>
                <div class=field-column>
                    <div>
                        <input type="submit" name="login" value="Login"
                        class="btnLogin"></span>
                    </div>
                </div>
                <div class=field-column>
                    <div>
	                    <a href="register-form.php" class="register">Register</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
    function validate() {
        var $valid = true;
        document.getElementById("user_info").innerHTML = "";
        document.getElementById("password_info").innerHTML = "";
        document.getElementById("captcha_info").innerHTML = "";

        var userName = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        var captcha = document.getElementById("captcha").value;
        if(userName == "")
        {
            document.getElementById("user_info").innerHTML = "required";
        	$valid = false;
        }
        if(password == "") 
        {
        	document.getElementById("password_info").innerHTML = "required";
            $valid = false;
        }
        if(captcha == "")
        {
        	document.getElementById("captcha_info").innerHTML = "required";
            $valid = false;
        }
        return $valid;
    }
    </script>
</body>
</html>