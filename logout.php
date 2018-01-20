<?php include('includes/core/init.php'); ?>

<?php
    if(isset($_POST['logout'])){
        //Create User Object
        $user = new User;

        if($user->logout()){
            redirect('index.php','You Are logged Out Successfully','success');
        }else{
            redirect('index.php');
        }
    }
?>

