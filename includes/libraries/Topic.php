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
         * Get Topics By Username
         */
        public function getByUser($user_id){
            $this->db->query("SELECT topics.*,categories.*,users.username,users.avatar FROM talkingspace.topics
            INNER JOIN talkingspace.categories
            ON topics.category_id = categories.id
            INNER JOIN talkingspace.users
            ON topics.user_id = users.id
            WHERE topics.user_id = :user_id
            ");
            
            $this->db->bind(':user_id',$user_id);
            
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
        
        
        /*
         * Get Topic By Id 
         */
        public function getTopic($id){
            $this->db->query('SELECT topics.*,users.username,users.fullname,users.avatar FROM talkingspace.topics
            INNER JOIN talkingspace.users
            ON topics.user_id = users.id
            WHERE topics.id = :id');
            
            $this->db->bind(':id',$id);
            
            $row = $this->db->single();
            
            return $row;
        }
        
        
        /*
         * Get Topic Replies By ID 
         */
        public function getReplies($id){
            $this->db->query("SELECT replies.*,users.* FROM talkingspace.replies
            INNER JOIN talkingspace.users
            ON replies.user_id = users.id
            WHERE replies.topic_id = :topic_id
            ORDER BY create_date ASC
            ");
            $this->db->bind(':topic_id',$id);
            $results = $this->db->resultset();
            return $results;
        }

        /*
         * Create a topic 
         */
        public function create($data){
            //Insert Data 
            $this->db->query("INSERT INTO talkingspace.topics (category_id,user_id,title,body)
            VALUES (:category,:user,:title,:body)");
            $this->db->bind(':category',$data['category_id']);
            $this->db->bind(':user'    ,$data['user_id'    ]);
            $this->db->bind(':title'   ,$data['title'      ]);
            $this->db->bind(':body'    ,$data['body'       ]);

            //Execute 
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        /*
         * Create A replay 
         */
        public function replay($data){
            //Insert Data 
            $this->db->query("INSERT INTO talkingspace.replies (topic_id,user_id,body)
            VALUES (:topic,:user,:body)");
            $this->db->bind(':topic',$data['topic_id']);
            $this->db->bind(':user' ,$data['user_id' ]);
            $this->db->bind(':body' ,$data['body'    ]);

            //Execute 
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }
        }

        
    }
?>