<?php include('registration_submit.php');?>
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
    <form method="post">
        <div class="container">
            <h1>Sign up</h1>
            <p>Please fill in this form to create an account.</p>
            <label for="username"><b>Username : </b></label>
            <input type="text" name="username" placeholder="Enter Username">
            <?php if(!empty($uname_error)) echo $uname_error; ?>

            <label for="email"><b>Email :</b></label>
            <input type="email" name="email" placeholder=" Enter email">
            <?php if(!empty($email_error)) echo $email_error; ?>

            <label for="password"><b>Password :</b></label>
            <input type="password" name="password" placeholder=" Enter Password">
            <?php if(!empty($pass_error)) echo $pass_error; ?>

            <label for="phone"><b>Phone Number : </b></label> <br>

            <select name="phoneCode" id="">
                <option value="+88">+88</option>
                <option value="+99">+99</option>
                <option value="+90">+90</option>
                <option value="+66">+66</option>
            </select>
            <input type="phone" name="phone" placeholder="Enter Phone Number">
            <?php if(!empty($phone_error)) echo $phone_error; ?>

            <p>Already Registered? <a href="./login.php" style="color:blue">Login</a>.</p>
            <div>
                <button type="submit">Sign Up</button>
            </div>
        </div>
    </form>
</body>
</html>