<?php
/*
 * Redirect To Page
 */
function redirect($page = FALSE , $message = NULL , $message_type = NULL){
    if(is_string($page)){
        $location = $page;
    }else{
        $location = $_SERVER['SCRIPT_NAME'];
    }
    
    //Check For Message
    if($message != NULL){
        //SET Message
        $_SESSION['message'] = $message;
    }
    //Check For Type
    if($message_type != NULL){
        //SET Message Type
        $_SESSION['message_type'] = $message_type; 
        
    }
    
    //Redirect 
    
    header('Location:'.$location);
    
    exit;
}

/*
 * Display Message 
 */

function displayMessage(){
       if(!empty($_SESSION['message'])){

            //assign Message in variable 
            $message = $_SESSION['message'];

            if(!empty($_SESSION['message_type'])){
                //Assign message type
                $message_type = $_SESSION['message_type'];

                if($message_type =='error'){
                    echo"<div class='alert alert-danger'>".$message."</div>";
                }else{
                    echo"<div class='alert alert-success'>".$message."</div>";
                } 
            }

            //unset Message 
            unset($_SESSION['message']);
            unset($_SESSION['message_type']);
       }else{
           echo'';
       }
}

//Check If User Is Logged IN
function isLoggedIn(){
    if(isset($_SESSION['is_logged_in'])){
        return true;
    }else{
        return false;
    }
}

/*
 * GEt User Data From Session
 */
function getUser(){
    $userArray = array();
    $userArray['user_id' ] =$_SESSION['user_id' ];
    $userArray['username'] =$_SESSION['username'];
    $userArray['name'    ] =$_SESSION['name'    ];
    $userArray['avatar'  ] =$_SESSION['img'     ];
    
    return $userArray;
}