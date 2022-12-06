<?php include('login_submit.php')?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Registration Form</title>
    <link rel="stylesheet" href="../style/index.css" />

</head>
<body>
    <form action="" method="post">
        <div class="container">
            <h1>Log In</h1>
            <p>Please fill in this form to create an account.</p>

            <label for="uname"><b>Username : </b></label>
            <input type="text" name="username" placeholder="Enter Username">
            <!-- <?php if(!empty($uname_error)) echo $uname_error; ?> -->


            

            <label for="psw"><b>Password :</b></label>
            <input type="password" name="password" placeholder=" Enter Password">
          <!-- <?php if(!empty($pass_error)) echo $pass_error; ?> -->


           

            <p>Create an <a href="./registration.php" style="color:dodgerblue">account</a>.</p>
            <div class="clearfix">
                <button type="submit">Login</button>
            </div>
        </div>
    </form>
</body>
</html>