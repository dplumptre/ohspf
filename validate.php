<?php

class validate{


 
                                 
    public function  common_words(){
    
   $cw = array("and","am", "or", "not", "if", "it", "he", "she", "when", "at", "of", "in",
                     "is", "an", "job", "vacancy", "career", "work", "as", "the", "be", "to", "a", "that", "have",
                     "i", "for", "on", "with", "you", "do", "this", "but", "by", "from", "say",
                      "will", "my", "one", "all", "would", "there", "what", "so", "up", "out",
                       "about", "who", "get", "which", "go", "me", "make", "can", "like", "time",
                        "no", "yes", "just", "know", "take", "people", "into", "year", "your",
                         "good", "some", "could", "then", "them", "see", "other", "than", "now",
                          "look", "only", "come", "its", "over", "think", "also", "back", "after",
                           "use", "two", "one", "how", "our", "first", "well", "way", "even", "new",
                            "want", "because", "any", "these", "give", "day", "most", "us", "place",
                             "pay", "company", "number", "industry", "specialization", "experience",
                              "case", "it's", "find", "employ", "employment", "employing", "resume",
                               "ask", "seem", "feel", "try", "leave", "call", "last", "long", "great",
                                "own", "little", "old", "big", "high", "different", "small", "large", 
                                "next", "early", "important", "few", "public", "bad", "same", "able",
                                 "above", "under", "above", "more", "many", "every");   
                                 
                   return $cw;              
                                 
                                 }                               
                                 
 
 public function array_has_dupes($array){
 return  count($array) !== count(array_unique($array));
	} 
       
    
public function checkvalues($value){
if(!preg_match("/^[a-zA-Z0-9\_\.\-\s]{2,15}$/",$value)){
return true;     
}
}

public function checkvalues_long($value){
if(!preg_match("/^[a-zA-Z0-9\_\.\-\'\s]{2,30}$/",$value)){
return true;     
}
}


public function checkvalues_user($value){
if(!preg_match("/^[a-zA-Z0-9\_\.\-]{2,90}$/",$value)){
return true;     
}
}


public function checktopic($value){
if(!preg_match("/^[a-zA-Z0-9\_\.\/\-\s]{3,90}$/",$value)){
      
  return true; 
    
}}


public function checkvalues_very_long($value){
if(!preg_match("/^[a-zA-Z0-9\_\.\-\s]{2,70}$/",$value)){
return true;     
}
}

public function clean($value){
 $w = preg_replace("/[^A-Za-z0-9.\s*]/","",$value) ;  
 $w =  $this->trim_strip($w);
  return $w;  
}

public function lilclean($value){
 $w = preg_replace("/[^A-Za-z0-9\s\_\-\.]/","",$value) ;  
 $w =  $this->trim_strip($w);
  return $w;  
}

public function lessclean($value){
 $w = preg_replace("/[^A-Za-z0-9\s\'\_\-\.]/","",$value) ;  
 $w =  $this->trim_strip($w);
  return $w;  
}


public function checknumbers($value){
if(!preg_match("/^[0-9\+\.\,]{1,20}$/",$value)){
      
  return true; 
    
}

}

public function trim_strip($value){

$data  = trim(strip_tags($value));
return $data;

} 


public function coursecode($value){
if(!preg_match("/^[a-zA-Z0-9\_\.\-]{3,15}$/",$value)){
      
  return true; 
    
}}



public function date(){

$date = date('Y-m-d');
return $date; 
    
 
}





public function checkemail($value){
    $email_pattern  = '/^[^@\s]+@([-a-z0-9]+\.)+[a-z]{2,}$/i';
if(!preg_match($email_pattern,$value)){
      
  return true; 
    
} 
}

public function createRandomPassword() {

  $chars = "023456789023456789023456789";

    srand((double)microtime()*1000000);

    $i = 0;

    $pass = '' ;

    while ($i <= 11) {

        $num = rand() % 33;

        $tmp = substr($chars, $num, 1);

        $pass = $pass . $tmp;

        $i++;

    }

    return $pass;

}



##############################################################################
   public function salt() {
     $salt = "";
     $salt_chars = array_merge(range('A','Z'), range('a','z'), range(0,9));
     
     for($i=0; $i < 22; $i++) {
     $salt .= $salt_chars[array_rand($salt_chars)]; 
     }
     //condition for salt using bow fish
     //has to start $2a$
     //numbers after the sec $ shgd be  btw 2 to 22
     //echo $salt."<br />";//send this into database
     return $salt;
     }


     public function better_crypt($input, $rounds = 7,$salt) {
     return crypt($input, sprintf('$2a$%02d$', $rounds) .$salt );
     } 
##############################################################################  














  
	}
    ?>