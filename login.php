<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
    <style>
      /* Optional: retain custom checkbox if necessary */
      .custom-checkbox {
        display: flex;
        align-items: center;
        margin-top: 0.5rem;
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
        border-radius: 100px;
      }
    </style>
  </head>
  <body class="bg-dark">
    <div class="container min-vh-100 d-flex flex-column justify-content-center align-items-center">
      <div class="w-100" style="max-width: 400px;">
        <form id="myform" class="border rounded p-4 shadow-sm bg-gray" action="test.php" method="post">
          <h2 class="mb-4 text-center ">Log In</h2>

          <input type="text" name="username" class="form-control mb-3" placeholder="User Name" required autofocus>

          <input type="password" name="password" id="inputPassword" class="form-control mb-2" placeholder="Password" required>

          <div class="custom-checkbox mb-3">
            <input type="checkbox" id="showPassword">
            <label for="showPassword">Show Password</label>
          </div>

          <button id="saveForm" class="btn btn-primary btn-block w-100 mb-3" type="button">Log In</button>

          <p class="text-center mb-3"><a href="register.php">Sign up!</a></p>
          <p class="text-center mb-3"><a href="forgetpass.php">Forgot Password?</a></p>

          <a href="index.php" class="btn btn-secondary btn-block w-100">Go Back Home</a>
        </form>

        <div class="text-center mt-3">
          <span id="result"></span>
        </div>
      </div>
    </div>

    <script src="js/jquery-2.2.3.min.js"></script>
    <script>
      $("#saveForm").click(function () {
        $.post($("#myform").attr("action"), $("#myform :input").serializeArray(), function (info) {
          $("#result").html(info);
        });
        clearInput();
      });

      $("#myform").submit(function () {
        return false;
      });

      function clearInput() {
        $("#myform :input").each(function () {
          if (this.type !== "button" && this.type !== "submit" && this.type !== "reset") {
            $(this).val('');
          }
        });
      }

      document.getElementById('showPassword').addEventListener('change', function () {
        var passwordInput = document.getElementById('inputPassword');
        passwordInput.type = this.checked ? 'text' : 'password';
      });
    </script>
  </body>
</html>
