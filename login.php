<?php include('includes/core/init.php'); ?>

<?php
    if(isset($_POST['login'])){
        //Get User vars 
        $username = $_POST['username'];
        $password =md5($_POST['password']);

        //Create User Object 

        $user = new User; 

        if($user->login($username,$password)){
            redirect('index.php','You Are Logged in ','success');
        }else{
            redirect('index.php','User Name Or password is not Valid','error');
        } 

    }else{
        redirect('index.php');
    }

?>