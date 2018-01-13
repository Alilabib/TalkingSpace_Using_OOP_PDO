<?php 
/*
 * Tempalte Class
 * Creates a template/view object
 */
class Template {
    //path to template
    protected $template;
    
    //Variable based in
    protected $vars =array();
    
    /*
     *  Class Constructor
     */
        
    public function __construct($template){
        $this->template = $template;
    }
    
    /*
     * Get Template Variables 
     */
    
    public function __get($key){
        return $this->vars[$key];
    }
    
    /*
     * Set Template Variables 
     */
    
    public function __set($key, $value){
        return $this->vars[$key]= $value;
    }
    
    /*
     * Convert Object To String   
     */
    
    public function __toString(){
        extract($this->vars);
        chdir(dirname($this->template));
        ob_start();
        
        include basename($this->template);
        
        return ob_get_clean();
        
    }
}
?>