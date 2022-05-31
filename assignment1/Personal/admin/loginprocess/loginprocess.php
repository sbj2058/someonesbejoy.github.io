<?php
include("../connection/config.php");
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    if($email != "" && $password != "" ){
        $query = "SELECT * FROM users WHERE email='$email' and password = '$password'";
        $result = mysqli_query($conn,$query);
        $count = mysqli_num_rows($result);
        if($count== 1){
            $row = $result->fetch_assoc(); // result ko yauta matra data 
            session_start();//connection establish
            $_SESSION['id']= $row['id'];
            $_SESSION['name']= $row['name'];
            $_SESSION['email']= $row['email'];

            echo header ("Location: ../home.php?msg=login_success");
        }
        else{

            echo header ("Location: ../index.php?msg=login_error");
        }
    }
    else{
        echo "all field are necessary";
    }

}


?>