<?php require('includes/core/init.php');?>

<?php
//Create Validator Object

$validate = new Validator;

//Create Topic Object
$topic = new Topic;

//Create User Object
$user = new User;

if(isset($_POST['register'])){
    // Create Data Array 
    $data = array();
    $data['fullname' ]= $_POST['fullname'];
    $data['email'    ]= $_POST['email'   ];
    $data['username' ]= $_POST['username'];
    $data['userpassword' ]= md5($_POST['userpassword']);
    $data['userpassword2']= md5($_POST['userpassword2']);
    $data['about'    ]=$_POST['about'    ];
    $data['last_activity']=date("Y-m-d H-i-s");
 
//Requiered Fields 

$field_array = array('name','email','fullname','username','userpassword','userpassword2');

if($validate->isRequierd($field_array)){
    if($validate->isValidEmail($data['email'])){
        if($validate->passwordMatch($data['userpassword'],$data['userpassword2'])){

                //Upload Avatar Image
                if($user->uploadAvatar()){
                    $data['avatar'] = $_FILES['avatar']['name'];
                }else{
                    $data['avatar'] = 'noimage.png';
                }

                if($user->register($data)){
                    redirect('index.php','You Are registered successfully','success');
                }else{
                    redirect('index.php','Something Went Wrong with your register','error');
                }


        }else{
            redirect('register.php','Your Password Dose not match','error');
        }

        }else{
            redirect('register.php','Your Email is not valid','error');
        }

       }else{
           redirect('register.php','All Fields Are Requiered','error');
       }
    }
    
    //Get Template  & assign vars 

$template = new Template('includes/template/register.php');

echo $template;