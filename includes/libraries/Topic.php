<?php 
    class Topic{
        //Init DB Variable 
        private $db;
        
        /*
         * Constructor
         */
        
        public function __construct(){
            $this->db = new Database;
            //var_dump($this->db);
        }
        
        /*
         *  Get All Toics 
         */
        
        public function getAllTopics(){
            $query = "SELECT topics.*, users.username, users.avatar,categories.catename FROM talkingspace.topics 
            INNER JOIN talkingspace.users 
            ON topics.user_id = users.id
            INNER JOIN talkingspace.categories 
            ON topics.category_id = categories.id
            " ;
            $this->db->query($query);
            
            //Assign Result Set
            $results = $this->db->resultset();
            
            return $results;
        }
        
        /*
         * Get Total # of Topics  
         */
        public function getTotalTopics(){
            $this->db->query('SELECT * FROM talkingspace.users');
            $rows = $this->db->resultset();
            return $this->db->rowCount();
        }
        
        /*
         * Get Total # of Categories 
         */
         public function getTotalCategories(){
            $this->db->query('SELECT * FROM talkingspace.categories');
            $rows = $this->db->resultset();
            return $this->db->rowCount();
        }
        
        /*
         * Get Category By ID 
         */
        public function getCategory($category_id){
            $this->db->query("SELECT * FROM talkingspace.categories WHERE id = :category_id");
            $this->db->bind(':category_id',$category_id);
            
            //Assign Rows
            $row = $this->db->single();
            
            return $row;
        }
        
        /*
         * Get Topics By Category 
         */
        public function getByCategory($category_id){
            $this->db->query("SELECT topics.*,categories.*,users.username,users.avatar,categories.catename FROM talkingspace.topics 
            INNER JOIN talkingspace.categories 
            ON topics.category_id = categories.id
            INNER JOIN talkingspace.users 
            ON topics.user_id = users.id
            WHERE topics.category_id = :category_id
            ");
            
            $this->db->bind(':category_id',$category_id);
            
            //Assign Result Set
            $results = $this->db->resultset();
            
            return $results;
        }
        
        
        /*
         * Get Total # of Replies  
         */
        public function getTotalReplies($topic_id){
            $this->db->query('SELECT * FROM talkingspace.replies WHERE topic_id ='.$topic_id);
            $rows = $this->db->resultset();
            return $this->db->rowCount();
        }
        
    }
?>