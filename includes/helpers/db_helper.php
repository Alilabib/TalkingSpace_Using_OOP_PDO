<?php

    //Get # of replies per topics
  function replayCount($topic_id){
    $db = new Database;
    $db->query('SELECT * FROM talkingspace.replies WHERE topic_id = :topic_id');
    $db->bind(':topic_id',$topic_id);
    //Assign Rows
    $rows = $db->resultset();
    //Get Count
    return $db->rowCount();
    }


    //Get Categories 
   function getCategories(){
       $db = new Database;
       $db->query('SELECT * FROM talkingspace.categories');
       
       //Assign Result Set 
       $results= $db->resultset();
       
       return $results;
   }
    
    /*
     * Users Posts
     */
     function userPostCount($user_id){
            $db = new Database;
            
            $db->query("SELECT * FROM talkingspace.topics WHERE user_id = :user_id");
            
            $db->bind(':user_id', $user_id);
             //Assign Rows 
            $rows = $db->resultset();
             //Get topics Count 
            $topic_count = $db->rowCount();
            
            $db->query("SELECT * FROM talkingspace.replies WHERE user_id= :user_id");
            
            $db->bind(':user_id', $user_id);
            //Assign Rows 
            $rows = $db->resultset();
            //Get Count
            $replies_count = $db->rowCount();
            return $topic_count + $replies_count;
        }    
?>