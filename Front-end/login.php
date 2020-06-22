<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>TC ISTANBUL MEDIPOL UNIVERSITY</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'><link rel="stylesheet" href="LoginCSS/login.css">
  <script type="text/javascript" src="LoginJS/login.js"></script>

</head>
<body>
<p class="tip"></p>
<div class="cont">
    <div class="form sign-in">
      <h2>User Login</h2>
      <form method="post" action="login.php" id="sign_in_form">
        
        <label id="email">
          <span>Email</span>
          <input type="email" name="email" id="signin_email" placeholder="johnsmith@medipol.edu.tr" required pattern="(.+@medipol.edu.tr)|(.+@st.medipol.edu.tr)|(.+@std.medipol.edu.tr)" title="Please enter an email with Medipol extension" /><br>
        </label>
        <label>
          <span>Password</span>
          <input type="password" name="password" id="signin_password" pattern=".{5,15}" required title="5 to 15 characters" placeholder="**********" />
        </label>
        <a href="forgot.html"><p class="forgot-pass">Forgot password?</p></a>
        <button class="submit" id="sign_in" name="login_student">Sign In</button>
        <a href = "lecturer_login.php"><button type="button" class="fb-btn"><span>Continue as lecturer</span></button></a>
      </form>
    </div>
      

  <div class="sub-cont">
    <div class="img">
      <div class="img__text m--up">
        <h2>New here?</h2>
        <h2>Register Now!</h2>
      </div>
      <div class="img__text m--in">
        <h3>If you already have an account, Sign in!</h3>
      </div>
      <div class="img__btn">
        <span class="m--up">Sign Up</span>
        <span class="m--in">Sign In</span>
      </div>
    </div>
    <div class="form sign-up">
      <!--<h2 id="regtext">Register</h2>-->
      <form method="post" action="login.php" id="register_form">
          <label>
          <span>Name</span>
            <input type="text" name="name" id="fullname"  pattern=".{3,}" required title="min character is 3" placeholder="John Smith" required><br>
        </label>     
        <label>
          <span>Email</span>
            <input type="email" name="email" id="signup_email" placeholder="johnsmith@medipol.edu.tr" required pattern="(.+@medipol.edu.tr)|(.+@st.medipol.edu.tr)|(.+@std.medipol.edu.tr)"
            title="Please enter an email with Medipol extension"><br>
        </label>
        <label>
          <span>Password</span>
          <input type="password" name="password_1" id="signup_password" pattern=".{5,15}" required title="5 to 15 characters" placeholder="**********" > <br>
        </label>
    
        <label>
          <span>Confirm Password</span>
          <input type="password" name="password_2" id="confirm_password" pattern=".{5,15}" required title="5 to 15 characters" placeholder="**********" > <br>
        </label>

        <label>
          <span>Phone Number</span>
          <input type="tel" id="phone" name="phone" placeholder="5351234567" required><br><br>
        </label>

         <label id="account">
          <span>Account type</span>
          <select name="acc_type">
            <option value="student" >Student</option>
            <option value="lecturer">Lecturer</option>
          </select>
        </label>


        <button class="submit" name="register_user" onclick="Validate()" >Sign Up</button>

        
      </form>
    </div>
  </div>
</div>

<a class="icon-link">
  <img src="https://www.medipol.edu.tr/medium/GalleryImage-Image-41.vsf">
</a>
 <script type="text/javascript" src="LoginJS/script.js"></script>
</body>
</html>
