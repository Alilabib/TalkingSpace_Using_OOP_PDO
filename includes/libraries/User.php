<?php

class User{
     
     private $db;

     /*
      * Constructor Function 
      */

     public function __construct(){
         $this->db = new Database;
     }
     
     /*
      * Upload User Avatar 
      */  
    public function uploadAvatar(){
       // echo BASE_URI;
        //die();

        $allowedExts = array("gif", "jpeg", "jpg", "png");
        $temp = explode(".",$_FILES["avatar"]["name"]);
        $extension = end($temp);
        
        if(($_FILES['avatar']['type']== "image/gif")
            || ($_FILES['avatar']['type']=="image/png")
            || ($_FILES['avatar']['type']=='image/jpeg')
            || ($_FILES['avatar']['type']=='image/jpg')
            || ($_FILES['avatar']['type']=='image/pjpg')
            || ($_FILES['avatar']['type']=='image/x-png')
            && ($_FILES['avatar']['size']<40000)
            && in_array($extension, $allowedExts)) {
                if($_FILES['avatar']['error'] > 0){
                    redirect('register.php',$_FILES['avatar']['error'],'error');
                }else{
                  if(file_exists('includes\uploads\images\avatars\\'.$_FILES['avatar']['name'])){
                    redirect("register.php", 'File already exists', 'error');  
                  }else{
                      move_uploaded_file($_FILES['avatar']['tmp_name'],
                      "includes\uploads\images\avatars\\" . $_FILES['avatar']['name']);          
                    return true;
                  }    
                }    
            }else{
                redirect('register.php','Invalid File Type!','error');
            }
        }

        //Create Login Function 
        public function login($username,$password){
                $this->db->query("SELECT * FROM talkingspace.users WHERE username=:username AND userpassword=:userpassword");

                //Bind Values 
                $this->db->bind(':username'    ,$username);
                $this->db->bind(':userpassword',$password);

                $row = $this->db->single();
                //Check Rows
                if($this->db->rowCount()>0){
                    $this->setUserData($row);
                    return true;
                }else{
                    return false;
                }

        }

        public function setUserData($row){
            $_SESSION['is_logged_in'] = true;
            $_SESSION['user_id'     ] = $row->id;
            $_SESSION['username'    ] = $row->username;
            $_SESSION['name'        ] = $row->fullname;
            $_SESSION['img'         ] = $row->avatar;
            
        }


        //Create Regitration Function 

        Public function register($data){
            //Insert Query
            $this->db->query("INSERT INTO talkingspace.users (fullname,email,avatar,username,userpassword,about)
            VALUES(:fullname,:email,:avatar,:username,:userpassword,:about)");
            $this->db->bind(':fullname'    ,$data['fullname'    ]);
            $this->db->bind(':email'       ,$data['email'       ]);
            $this->db->bind(':avatar'      ,$data['avatar'      ]);
            $this->db->bind(':username'    ,$data['username'    ]);
            $this->db->bind(':userpassword',$data['userpassword']);
            $this->db->bind(':about'       ,$data['about'       ]);
            
            //execute registeration query 

            if($this->db->execute()){
                return  true;
             }else{
                 return false;
             }

        }

        //Create Log Out Function

        public function logout(){
            
            unset( $_SESSION['is_logged_in']);
            unset($_SESSION['user_id'      ]);
            unset($_SESSION['username'     ]);
            unset($_SESSION['name'         ]); 
            unset($_SESSION['img'         ]);
            return true;
        }
        /*
         * Get Total Users
         */
        public function getTotalUsers(){
            $this->db->query("SELECT * FROM talkingspace.users");
            $rows = $this->db->resultset();
            return $this->db->rowCount();
        }

    }