<?php  require('includes/core/init.php'); ?>

<?php 

    //Create Topic Object
   $topic = new Topic;

   if(isset($_POST['create'])){
     /*
      echo"<pre>";
      var_dump($_POST);
      echo"</pre>";
      die;
      */
      
      //Create Validator Object
      $validate = new Validator;
      
       //Create data array 
       $data = array();
       $data['title'] = $_POST['title'];
       $data['body' ] = $_POST['body'];
       $data['category_id']=$_POST['category'];
       $data['user_id'] = getUser()['user_id'];  

       //Required Fields
       $fields_array = array('title','body','category');

       if($validate->isRequierd($fields_array)){
            //Register user 
            if($topic->create($data)){
                redirect('index.php','Your Topic Has been added Sccessfully','success');
            }else{
                redirect('topic.php?id='.$topic_id,'Somthing Went Wrong with Your ','error');
            }
       }else{
                redirect('create.php','Please Fill All Requierd Fields','error');
       }

   }

    //Get Template & assign vars 

    $template = new Template('includes/template/create.php');
    
    echo $template;

?>