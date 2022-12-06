<?php 
 
function clean_data($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $username = clean_data($_POST['username']);
    $email = clean_data($_POST['email']);
    $password = clean_data($_POST['password']);
    $phoneCode = clean_data($_POST['phoneCode']);
    $phone = clean_data($_POST['phone']);


if(empty($username)){
    $uname_error = "Username is required. <br>";

}
else{
    if(!preg_match('/^[A-Za-z][A-Za-z0-9]{5,31}$/', $username)){
        $uname_error = "Must start with a letter, 6-32 Characters, Letter or Numbers Only <br>";
    }
    else{
        $uname_error ="";
    }
}

if(empty($email)){
    $email_error = "Email is required <br>";

}
else{
     if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $email_error = "Please Provide a Valid Email Address.<br>";
    }
    else{
        $email_error ="";
    }
}

if(empty($password)){
    $pass_error = "Please Provide a Valid Password";
}
else{
    $pass_error = "";
    $md5_pass = md5($password);
}

if(empty($phoneCode)|| empty($phone) ){
    $phone_error = "Phone code and Phone Number must required";
}
else{
    $phone_error = "";
    $phone_str = $phoneCode . $phone;
}

if(empty($uname_error) && empty($email_error) && empty($pass_error) && empty($phone_error)){
    
    try{
        include('./dbconnect.php');

        $query = "INSERT INTO `anything`(`username`,`email`, `password`, `phone`) VALUES(:uname, :email, :pass, :phone)";

         $stmnt = $con->prepare($query);

         $stmnt->bindValue(':uname',$username);
         $stmnt->bindValue(':email',$email);
         $stmnt->bindValue(':pass',$md5_pass);
         $stmnt->bindValue(':phone',$phone_str);

         $stmnt->execute();
         echo ' data inserted successfully.';

         header('location: login.php');
    }
    

    catch (PDOException $e) {
        echo'<span style="color:red; font-weight:bold">Warning: </span>' . $e->getMessage();
    }
  }
}

















?>