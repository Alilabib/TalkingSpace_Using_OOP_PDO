<?php require('includes/core/init.php');?>

<?php
    //Create Topic Object 
    $topic = new Topic;
    
//Get Template  & assign vars 

$template = new Template('includes/template/frontpage.php');

//assign Vars
$template->topics = $topic->getAllTopics();
$template->totalTopics = $topic->getTotalTopics();
$template->totalCategories = $topic->getTotalCategories();
echo $template;