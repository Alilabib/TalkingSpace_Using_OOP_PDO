<?php require('includes/core/init.php'); ?>

<?php 
        //Create Topic Object 
    $topic = new Topic;

    //Get Category From URL 
    $category = isset($_GET['category']) ? $_GET['category']: null; 
    

    //Get Category From URL 
    $user_id = isset($_GET['user']) ? $_GET['user']: null; 
    

    //Get Template & assign vars
    $template = new Template('includes/template/topics.php');
    
    //Assign Template Variables
    if(isset($category)){
        $template->topics = $topic->getByCategory($category);
        $template->title  = 'Post In "'.$topic->getCategory($category)->catename.'"'; 
    }
    
    //Check For User Filter 
    if(isset($user_id)){
        $template->topics = $topic->getByUser($user_id);
        //$template->title  = 'Post In "'.$topic->getUser($category)->catename.'"'; 
    }

    if(!isset($category) && !isset($user_id)){
    $template->topics = $topic->getAllTopics();
    }

    $template->totalTopics = $topic->getTotalTopics();
    $template->totalCategories = $topic->getTotalCategories();
      // Displaying template
    echo $template;

?>