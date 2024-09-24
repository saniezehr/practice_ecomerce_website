<?php
include('dbcon.php');
session_start();
$username = $useremail = $userpass = $confirmpass = "";
$usernameErr = $useremailErr = $userpassErr = $confirmpassErr = "";

if(isset($_POST['user_register'])){
    $username=$_POST['UserName'];
    $useremail = $_POST['UserEmail'];
    $userpass = $_POST['userpass'];
    $confirmpass = $_POST ['confirmpass'];
     
    if(empty($username)){
        $usernameErr = "name is required";
    }
    if(empty($useremail)){
        $useremailErr = "email is required";
    }
    else{
        $query = $pdo -> prepare ("select * from user where email = :user_email");
        $query -> bindParam('user_email' , $useremail);
        $query->execute();
        $user = $query -> fetch (PDO :: FETCH_ASSOC);
        if($user){
            $useremailErr="email is already exist";
        }
    }
    if (empty($userpass)){
        $userpassErr ="password ia required";
    }
    if (empty($confirmpass)){
        $confirmpassErr ="password ia required";
    }
    else
    {
        if($userpass != $confirmpass){
        $confirmpassErr = "password is not matched";
    }}
    if(empty($usernameErr) && empty($useremailErr)  && empty($userpassErr) && empty($confirmpassErr)){
        $query = $pdo -> prepare("insert into user (name, email, password) values (:name ,:email , :pass)");
        $query -> bindparam('name' , $username);
        $query -> bindparam('email' , $useremail);
        $query -> bindparam('pass' , $userpass);

        $query -> execute ();
        echo"<script> alert('userr added successfully');location.assign('register.php')
</script>";
    }
}

//login
$u_email = $u_pass ="";
$u_emailErr = $u_passErr ="";
 
if (isset($_POST['userLogin'])){
    $u_email = $_POST['userEmail'];
    $u_pass = $_POST['userPass'];
    
     if(empty($u_email)){
        $u_emailErr = "email is required";
     }
     if(empty($u_pass)){
        $u_passErr = "email is required";
     }
     
     if(empty($u_emailErr) && empty($u_passErr)){
$query = $pdo->prepare("select * from user where email = :uEmail");
$query->bindparam('uEmail' , $u_email);
$query->execute();
$user = $query->fetch(PDO::FETCH_ASSOC);
// print_r($user);
if($user){

    //for admin

    if($u_pass == $user['password']){
        if($user ['role_id'] == 1){
            $_SESSION['adminEmail'] = $user ['email'];
            $_SESSION['adminName'] = $user ['name'];
echo "<script> alert ('login');location.assign('adminpanel/index.php')</script>";
        }

        //for user

        elseif($user ['role_id'] == 2){
            $_SESSION ['userId'] = $user ['id'];
            $_SESSION ['userEmail'] = $user ['email'];
            $_SESSION ['userName'] = $user ['name'];
echo "<script> alert ('login');location.assign('index.php')</script>";   
        }



        echo  "<script>location.assign('login.php?success = login')</script>";
    }


else{
    echo "<script> location.assign('login.php?error=invalid')</script>";
}
}

// end user
else{
    echo "<script> location.assign('login.php?error= notfound')</script>";
}
}
     }


?>