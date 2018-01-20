<?php require('includes/core/init.php');?>

<?php
//Create User Object
$user = new User;

//Create Topic Object 
$topic = new Topic;
    
//Get Template  & assign vars 

$template = new Template('includes/template/frontpage.php');

//assign Vars
$template->topics = $topic->getAllTopics();
$template->totalTopics = $topic->getTotalTopics();
$template->totalCategories = $topic->getTotalCategories();
$template->totalUsers = $user->getTotalUsers();
echo $template;