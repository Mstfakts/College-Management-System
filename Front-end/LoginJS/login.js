 

 function Validate() {
      var password = document.getElementById("signup_password").value;
      var confirmPassword = document.getElementById("confirm_password").value;

      if (password != confirmPassword) {
        confirm_password.setCustomValidity("Passwords Don't Match");
      }
       else if (confirmPassword == "" || password == "") {

      }
      else{
        confirm_password.setCustomValidity("");
      }
    }
    