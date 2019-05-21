<?php

class redirecting  {
     
public $name ="bobo";

protected $value;


public function get_id(){
    return $this->value;
}


public function redirect($location){

header("location:$location");
exit;
} 
 

 public function redirect2($location){

 echo"<script type='text/javascript'>
                          window.location='".$location."';
                          </script>";
} 

                   





public function logged_in($sess){
return isset($sess);
}
	
	
public function confirmed_logged_in($sess,$url){

 if(!$this->logged_in($sess)){

$this->redirect($url);	
}
}  


public function confirmed_access($db_access,$access,$extra,$url){

 if($db_access != $access && $db_access != $extra  ){

$this->redirect($url);	
}


} 
  
    
 public function confirmed_logged_in_admin($sess,$sess1,$url){
        
        
    if(!$this->logged_in($sess)){
	
    $this->redirect($url);
    	
	}elseif($sess != $sess1){
	   
     $this->redirect($url);  
       
	}
	}
        
        
        
        
    
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
   

    





  
	}
    ?>