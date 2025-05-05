<!DOCTYPE html>
<html>
<head>
<title>Register as a Volunteer</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> 
    addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); 
    function hideURLbar(){ window.scrollTo(0,1); } 
</script>
<link href="css/signup.css" rel="stylesheet" type="text/css" media="all" />
<link href="css.css" rel="stylesheet">
</head>
<body>

    <div class="main-w3layouts wrapper">
        <h1>User Registration</h1>
        <div class="main-agileinfo">
            <div class="agileits-top">
                <form id="myform" action="add/add_green_task.php" method="post" enctype="multipart/form-data">
                    <input class="text" type="text" name="F_Name" placeholder="First Name" required="">
                    <br>
                    <input class="text" type="text" name="L_Name" placeholder="Last Name" required="">
                    <br>
                    <input class="text" type="text" name="Username" placeholder="Username" required="">
                    <br>
                    <input class="text w3lpass" type="password" name="cpassword" placeholder="Confirm Password" required="">
                    <input type="submit" id="saveForm" value="SIGNUP">
                </form>
                <p>Already have an Account? <a href="login.php"> Login Now!</a></p>
            </div>
        </div>
        <span id="result"></span>
        <script src="js/jquery-2.2.3.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#myform").submit(function(event){
                    event.preventDefault(); 

                    $.post($("#myform").attr("action"), $("#myform").serialize(), function(info){
                        $("#result").html(info);
                        clearInput(); 
                    });
                });

                function clearInput(){
                    $("#myform :input").each(function(){
                        $(this).val('');
                    });
                }
            });
        </script>
    </div>

</body>
</html>
