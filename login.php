<!doctype html>
<html lang="en">
  <head>
    <title>Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
    <style>
      .custom-checkbox {
        display: flex;
        align-items: center;
      }
      .custom-checkbox input[type="checkbox"] {
        display: none;
      }
      .custom-checkbox label {
        position: relative;
        padding-left: 25px;
        cursor: pointer;
        user-select: none;
      }
      .custom-checkbox label::before {
        content: "";
        position: absolute;
        left: 0;
        top: 0;
        width: 20px;
        height: 20px;
        border: 2px solid #007bff;
        border-radius: 4px;
        background: white;
      }
      .custom-checkbox input[type="checkbox"]:checked + label::after {
        content: "";
        position: absolute;
        left: 5px;
        top: 5px;
        width: 10px;
        height: 10px;
        background: #007bff;
        border-radius:100px;
      }
    </style>
  </head>
  <body class="text-center">
    <form id="myform" class="form-signin" action="test.php" method="post">
      <h1 class="h3 mb-3 font-weight-normal">LogIn</h1>
      <label for="inputEmail" class="sr-only">User Name</label>
      <input type="text" name="username" class="form-control" placeholder="User Name" required autofocus>
      <br>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
      <div class="custom-checkbox">
        <input type="checkbox" id="showPassword">
        <label for="showPassword">Show Password</label>
      </div>
      <br>

      <br><br>
      <button id="saveForm" class="btn btn-lg btn-primary btn-block" type="button">LogIn</button>
      <br>
      <p>Create Account <a href="register.php">Sign up!</a></p>
      <a href="forgetpass.php">Forgot Password?</a>
      <br>
      <a href="index.php" class="btn btn-secondary btn-block">Go Back Home</a>
    </form>
    <center><span id="result"></span></center>
    
    <script src="js/jquery-2.2.3.min.js"></script>
    <script>
      $("#saveForm").click(function(){
        $.post($("#myform").attr("action"), $("#myform :input").serializeArray(), function(info){ 
          $("#result").html(info); 
        });
        clearInput();
      });

      $("#myform").submit(function(){
        return false;
      });

      function clearInput(){
        $("#myform :input").each(function() {
          $(this).val('');
        });
      }

      document.getElementById('showPassword').addEventListener('change', function() {
        var passwordInput = document.getElementById('inputPassword');
        if (this.checked) {
          passwordInput.type = 'text';
        } else {
          passwordInput.type = 'password';
        }
      });
    </script>
  </body>
</html>
