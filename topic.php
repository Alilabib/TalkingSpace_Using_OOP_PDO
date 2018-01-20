<?php require('includes/core/init.php'); ?>
<?php

    //Make Topic Object 
    $topic = new Topic;
   
    //Get ID From URL 
    $topic_id = $_GET['id'];

    //Process Replay 
    if(isset($_POST['Replay'])){
       //Create Data Array 
        /* 
         echo"<pre>";
      var_dump($_POST);
      echo"</pre>";
      die;
      */
       $data = array();
       $data['topic_id']= $_GET['id'  ];
       $data['body'    ]= $_POST['body'];
       $data['user_id' ]= getUser()['user_id'];

       //Create Validator Object
       $validate = new Validator;

       //Required Fields 
       $fields_array=array('body');

       if($validate->isRequierd($fields_array)){
           //Register User 
           if($topic->replay($data)){
               redirect('topic.php?id='.$topic_id,'Your Repaly has been Posted','success');
           }else{
               redirect('topic.php?id='.$topic_id,'Somthing Went Wrong in adding comment','error');
           }
       }else{

           redirect('topic.php?id='.$topic_id,"Please Fil Your replay input",'error');
       }
    }

    //Get Template & assign vars
    $template = new Template('includes/template/topic.php');
    
    $template->topic = $topic->getTopic($topic_id);
    $template->replies = $topic->getReplies($topic_id);
    $template->title = $topic->getTopic($topic_id)->title;

   //Display  Template 
    echo $template;

?>