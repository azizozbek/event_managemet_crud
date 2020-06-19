<?php require "inc/sessionHeader.php";
if (!empty($_SESSION["userId"])) {
	header("Location: dashboard.php");
	exit();
}
include("inc/captcha.php");
$_SESSION['captcha'] = captcha();
?>
<html>
<?php require "inc/header.php" ?>
    <div>
        <form action="register-action.php" method="post" id="frmLogin" onSubmit="return validate();">
            <div class="login-form">
                <div class="form-head">Künstler Registration</div>
                <div class="field-column">
                    <div>
                        <label for="username">Username</label><span id="user_info" class="error-info"></span>
                    </div>
                    <div>
                        <input name="username" id="username" type="text" class="input-box" pattern="[A-Za-z0-9]{3,}" required>
                    </div>
                </div>
                <div class="field-column">
                    <div>
                        <label for="fullname">Full Name</label><span id="fullname_info" class="error-info"></span>
                    </div>
                    <div>
                        <input name="fullname" id="fullname" type="text" class="input-box" pattern="^(\w\w+)\s(\w+)$" required>
                    </div>
                </div>
                <div class="field-column">
                    <div>
                        <label for="email">E-Mail</label><span id="email_info" class="error-info"></span>
                    </div>
                    <div>
                        <input name="email" id="email" type="email" class="input-box" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                    </div>
                </div>
                <div class="field-column">
                    <div>
                        <label for="password">Password</label><span id="password_info" class="error-info"></span>
                    </div>
                    <div>
                        <input name="password" id="password" type="password"  pattern=".{6,}" class="input-box" required>
                    </div>
                </div>
                <div class="field-column">
                    <div>
                        <label for="password">Password Erneut</label><span id="password2_info" class="error-info"></span>
                    </div>
                    <div>
                        <input name="password2" id="password2" type="password"  pattern=".{6,}" class="input-box" required>
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
                        <input type="submit" name="register" value="Register" class="btnLogin"></span>
                    </div>
                </div>
	            <div class=field-column>
                    <div>
	                    <a href="login-form.php" >Schon registriert? Anmelden</a>
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
        document.getElementById("password2_info").innerHTML = "";
        document.getElementById("fullname_info").innerHTML = "";
        document.getElementById("email_info").innerHTML = "";
        document.getElementById("captcha_info").innerHTML = "";

        var userName = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        var password2 = document.getElementById("password2").value;
        var fullname = document.getElementById("fullname").value;
        var email = document.getElementById("email").value;
        var captcha = document.getElementById("captcha").value;

        if(userName == "")
        {
            document.getElementById("user_info").innerHTML = "Pflicht";
        	$valid = false;
        }
        if(password == "") 
        {
        	document.getElementById("password_info").innerHTML = "Pflicht";
            $valid = false;
        }
        if(password2 == "")
        {
        	document.getElementById("password2_info").innerHTML = "Pflicht";
            $valid = false;
        }
        if(fullname == "")
        {
        	document.getElementById("fullname_info").innerHTML = "Pflicht";
            $valid = false;
        }
        if(email == "")
        {
        	document.getElementById("email_info").innerHTML = "Pflicht";
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