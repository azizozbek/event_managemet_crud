<?php require "inc/sessionHeader.php";
include_once ("inc/autoloader.php");
if (empty($_SESSION["userId"])) {
	header("Location: dashboard.php");
	exit();
}
include("inc/captcha.php");
$_SESSION['captcha'] = captcha();
$kuenstler = new \klassen\Kuenstler();
$getKuenstler = $kuenstler->getMemberById($_SESSION["userId"])
?>
<html>
<?php require "inc/header.php" ?>
    <div>
        <form action="userEdit-action.php" method="post" id="frmLogin" onSubmit="return validate();">
            <div class="login-form">
                <div class="form-head">Profil</div>
                <div class="field-column">
                    <div>
                        <label for="fullname">Full Name</label><span id="fullname_info" class="error-info"></span>
                    </div>
                    <div>
                        <input name="fullname" id="fullname" type="text" class="input-box" pattern="^(\w\w+)\s(\w+)$" value="<?php echo $getKuenstler["fullname"]; ?>" required>
                    </div>
                </div>
                <div class="field-column">
                    <div>
                        <label for="email">E-Mail</label><span id="email_info" class="error-info"></span>
                    </div>
                    <div>
                        <input name="email" id="email" type="email" class="input-box" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value="<?php echo $getKuenstler["email"]; ?>" required>
                    </div>
                </div>
                <div class="field-column">
                    <div>
                        <label for="password">Password</label><span id="password_info" class="error-info"></span>
                    </div>
                    <div>
                        <input name="password" id="password" type="password" class="input-box" placeholder="Altes Password">
                    </div>
                </div>
                <div class="field-column">
                    <div>
                        <label for="password">Password Erneut</label><span id="password2_info" class="error-info"></span>
                    </div>
                    <div>
                        <input name="password2" id="password2" type="password" placeholder="Altes Password" class="input-box">
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
                        <input type="submit" name="update" value="Aktualisieren" class="btnLogin">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
    function validate() {
        var $valid = true;

        document.getElementById("user_info").innerHTML = "";
        document.getElementById("fullname_info").innerHTML = "";
        document.getElementById("email_info").innerHTML = "";
        document.getElementById("captcha_info").innerHTML = "";

        var userName = document.getElementById("username").value;
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