<?php 

function clean_data($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD']=="POST"){
    $username = clean_data($_POST['username']);
    $pass = clean_data($_POST['password']);
    

if(empty($username)){
    $uname_error = "Username is required";

}
else{
    if(!preg_match('/^[A-Za-z][A-Za-z0-9]{5,31}$/', $username)){
        $uname_error = "Must start with a letter, 6-32 Characters, Letter or Numbers Only <br>";
    }
    else{
        $uname_error ="";
    }
}

if(empty($pass)){
    $pass_error = "Please Provide a Valid Password";
}
else{
    $pass_error = "";
    $md5_pass = md5($pass);
}

if(empty($uname_error) && empty($pass_error)){
    try{
        include('./dbconnect.php');

        $query = "SELECT * FROM `user` WHERE username=:username AND password=:pass";
        
         $stmnt = $con->prepare($query);

         $stmnt->bindValue(':username',$username);
         $stmnt->bindValue(':pass',$md5_pass);
         
         $stmnt->execute();

         $res = $stmnt->fetchAll();

         if(count($res)){
            header('location: dashboard.php');
         }
         else{
            header('location: login.php');
         }
         echo ' data inserted successfully .';
    }

    catch (PDOException $e) {
        echo'<span style="color:red; font-weight:bold">Warning: </span>' . $e->getMessage();
    }
  }
}


?>