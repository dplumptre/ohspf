<?php
namespace api;
use \PDO;  // have had to use 



class transfer extends portal {
     



public function __call($method_name , $parameter)
{
    
    if($method_name == "getvalue_all") //Function overloading logic for function name overlodedFunction
    {

        if(count($parameter) === 1){ 
        $query = PDO::prepare("SELECT * FROM $parameter[0]");
        $query->execute();
        $result = $query->fetchAll();
        return $result;
        }  


        if (count($parameter)=== 2) {
        $query = PDO::prepare("SELECT * FROM $parameter[0]  ORDER BY $parameter[1] DESC");
        $query->execute();
        $result = $query->fetchAll();
        return $result;
        }
        
        if(count($parameter) === 3){ 
        $query = PDO::prepare("SELECT * FROM $parameter[0] WHERE $parameter[1]  =:id ");
        $query->bindValue(':id',$parameter[2]);
        $query->execute();
        $result = $query->fetchAll();
        return $result;
        }
        
        if(count($parameter) === 4){ 
        $query = PDO::prepare("SELECT * FROM $parameter[0] WHERE $parameter[1]  =:id  ORDER BY $parameter[3] DESC");
        $query->bindValue(':id',$parameter[2]);
        $query->execute();
        $result = $query->fetchAll();
        return $result;
        }
        
         if(count($parameter) === 5){ 
        $query = PDO::prepare("SELECT * FROM $parameter[0] WHERE $parameter[1]  =:id  AND $parameter[3]  =:idx  ORDER BY $parameter[1] DESC");
        $query->bindValue(':id',$parameter[2]);
        $query->bindValue(':idx',$parameter[4]);
        $query->execute();
        $result = $query->fetchAll();
        return $result;
        }   
        
         if(count($parameter) === 6){ 
        $query = PDO::prepare("SELECT * FROM $parameter[0] WHERE $parameter[1]  =:id  AND $parameter[3]  =:idx  ORDER BY $parameter[5] DESC");
        $query->bindValue(':id',$parameter[2]);
        $query->bindValue(':idx',$parameter[4]);
        $query->execute();
        $result = $query->fetchAll();
        return $result;
        }        

    }
    
    
    
    
        
    if($method_name == "getvalue_opt") //Function overloading logic for function name overlodedFunction
    {


            if (count($parameter)=== 4) {

            $query = PDO::query("SELECT * FROM $parameter[0] ORDER BY $parameter[1] ASC");
            $query->execute();
            while ($rows = $query->fetch(PDO::FETCH_ASSOC)){
            echo "<option  value=".$rows[$parameter[2]].">".$rows[$parameter[3]]."</option>";              
            }
            }
    
    }    
    
    
    
        if($method_name == "getvalue_count") //Function overloading logic for function name overlodedFunction
    {

    

        
            if (count($parameter)=== 4) {

        $query = PDO::prepare("SELECT DISTINCT $parameter[0] FROM $parameter[1] WHERE $parameter[2]  =:id ");
        $query->bindValue(':id',$parameter[3]);
            $query->execute();
            while ($rows = $query->fetch(PDO::FETCH_ASSOC)){

            $counts =  $query->rowCount();

            return  $counts;              
            }
            }
    
    }  
    
    
    
    
    
    
    if($method_name == "getvalue_col") //Function overloading logic for function name overlodedFunction
    {



        if (count($parameter)=== 2) {
        return $parameter[0]." --".$parameter[1];
        }
        
        if(count($parameter) === 4){ 
        $query = PDO::prepare("SELECT $parameter[0] FROM $parameter[1] WHERE $parameter[2]  =:id ");
        $query->bindValue(':id',$parameter[3]);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_COLUMN, 0);
        return $result;
        }
        
        if(count($parameter) === 6){ 
        $query = PDO::prepare("SELECT $parameter[0] FROM $parameter[1] WHERE $parameter[2]  =:id  AND $parameter[4]  =:id1");
        $query->bindValue(':id',$parameter[3]);
        $query->bindValue(':id1',$parameter[5]);        
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_COLUMN, 0);
        return $result;
        }    
        
        

    }
    

    
    
    
         if($method_name == "update") //Function overloading logic for function name overlodedFunction
    {



        if (count($parameter)=== 5) {
        $q = "UPDATE $parameter[0] SET $parameter[1] =? WHERE $parameter[3] =? ";
        $query1 = parent::prepare($q);
        $query1->execute(array($parameter[2],$parameter[4])); 
        return $query1->rowCount();
        }
        
        if(count($parameter) === 7){ 
        $q = "UPDATE $parameter[0] SET $parameter[1] =? , $parameter[3] =? WHERE $parameter[5] =? "; 
        $query1 = parent::prepare($q);
        $query1->execute(array($parameter[2],$parameter[4],$parameter[6])); 
        return $query1->rowCount();
        }
        
        
        if(count($parameter) === 9){ 
        $q = "UPDATE $parameter[0] SET $parameter[1] =? , $parameter[3] =? , $parameter[5] =? WHERE $parameter[7] =? "; 
        $query1 = parent::prepare($q);
        $query1->execute(array($parameter[2],$parameter[4],$parameter[6],$parameter[8])); 
        return $query1->rowCount();
        }
        
        
     
        if(count($parameter) === 11){ 
        $q = "UPDATE $parameter[0] SET $parameter[1] =? , $parameter[3] =? , $parameter[5] =? , $parameter[7] =? WHERE $parameter[9] =? "; 
        $query1 = parent::prepare($q);
        $query1->execute(array($parameter[2],$parameter[4],$parameter[6],$parameter[8],$parameter[10])); 
        return $query1->rowCount();
        }      
        

         if(count($parameter) === 13){ 
        $q = "UPDATE $parameter[0] SET $parameter[1] =? , $parameter[3] =? , $parameter[5] =? , $parameter[7] =? , $parameter[9] =?  WHERE $parameter[11] =? "; 
        $query1 = parent::prepare($q);
        $query1->execute(array($parameter[2],$parameter[4],$parameter[6],$parameter[8],$parameter[10],$parameter[12])); 
        return $query1->rowCount();
        }        
        
         if(count($parameter) === 15){ 
        $q = "UPDATE $parameter[0] SET $parameter[1] =? , $parameter[3] =? , $parameter[5] =? , $parameter[7] =? , $parameter[9] =? ,$parameter[11] =?  WHERE $parameter[13] =? "; 
        $query1 = parent::prepare($q);
        $query1->execute(array($parameter[2],$parameter[4],$parameter[6],$parameter[8],$parameter[10],$parameter[12],$parameter[14])); 
        return $query1->rowCount();
        }        
        
          if(count($parameter) === 17){ 
        $q = "UPDATE $parameter[0] SET $parameter[1] =? , $parameter[3] =? , $parameter[5] =? , $parameter[7] =? , $parameter[9] =? ,$parameter[11] =? , $parameter[13] =? WHERE $parameter[15] =? "; 
        $query1 = parent::prepare($q);
        $query1->execute(array($parameter[2],$parameter[4],$parameter[6],$parameter[8],$parameter[10],$parameter[12],$parameter[14],$parameter[16])); 
        return $query1->rowCount();
        }  
        
        
          if(count($parameter) === 21){ 
        $q = "UPDATE $parameter[0] SET $parameter[1] =? , $parameter[3] =? , $parameter[5] =? , $parameter[7] =? , $parameter[9] =? ,$parameter[11] =? , $parameter[13] =?,$parameter[15] =? , $parameter[17] =? WHERE $parameter[19] =? "; 
        $query1 = parent::prepare($q);
        $query1->execute(array($parameter[2],$parameter[4],$parameter[6],$parameter[8],$parameter[10],$parameter[12],$parameter[14],$parameter[16],$parameter[18],$parameter[20])); 
        return $query1->rowCount();
        }         
               
        
    }   
    
    
    
    
    
    
    
    
    
    
    
    
        if($method_name == "delete") //Function overloading logic for function name overlodedFunction
        {



        if (count($parameter)=== 3) {
        $query1 = parent::prepare("DELETE FROM  $parameter[0]  WHERE $parameter[1] = '$parameter[2]' ");
        $query1->execute(); 
        return $query1->rowCount();
        }



        }
    
    if($method_name == "getvalue_row") //Function overloading logic for function name overlodedFunction
    {

        if(count($parameter) === 1){ 
        $query = PDO::prepare("SELECT * FROM $parameter[0]  LIMIT 1");
        $query->execute();
        if($rows = $query->fetch(PDO::FETCH_ASSOC)){
        return $rows;
        }else{
        return NULL;
        }
        }

        if (count($parameter)=== 2) {
        return $parameter[0]." --".$parameter[1];
        }
        
        if(count($parameter) === 3){ 
        $query = PDO::prepare("SELECT * FROM $parameter[0] WHERE $parameter[1] =:id LIMIT 1");
        $query->bindValue(':id',$parameter[2], PDO::PARAM_INT);
        $query->execute();
        if($rows = $query->fetch(PDO::FETCH_ASSOC)){
        return $rows;
        }else{
        return NULL;
        }
        }
        
        if(count($parameter) === 5){ 
        $query = PDO::prepare("SELECT * FROM $parameter[0] WHERE $parameter[1] =:id  AND $parameter[3] =:id1 LIMIT 1");
        $query->bindValue(':id',$parameter[2], PDO::PARAM_INT);
        $query->bindValue(':id1',$parameter[4], PDO::PARAM_INT);
        $query->execute();
        if($rows = $query->fetch(PDO::FETCH_ASSOC)){
        return $rows;
        }else{
        return NULL;
        }
        }

    }    
    
    
    
    
     
     if($method_name == "getvalue_one_or") //Function overloading logic for function name overlodedFunction
    {


        if (count($parameter)=== 6) {

        $query = PDO::prepare("SELECT $parameter[0] FROM $parameter[1] WHERE $parameter[2] =:id "
                . "OR $parameter[4] =:id1 ");
        $query->bindValue(':id',$parameter[3]);
        $query->bindValue(':id1',$parameter[5]);
        $query->execute();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)){    
        $value = $row[$parameter[0]] ;
        
    
        } 
        return $value;  
        }    
        
    }     
    
    
    
    
     if($method_name == "getvalue_all_limit") //Function overloading logic for function name overlodedFunction
    {


        if(count($parameter) === 2){ 
        $query = PDO::prepare("SELECT * FROM $parameter[0]  ORDER BY $parameter[1]");     
        $query->execute();
        $result = $query->fetchAll();
        return $result;
        }
     
        if(count($parameter) === 4){ 
        $query = PDO::prepare("SELECT * FROM $parameter[0] WHERE  $parameter[1]  =:id  ORDER BY $parameter[3]");
        $query->bindValue(':id',$parameter[2]);        
        $query->execute();
        $result = $query->fetchAll();
        return $result;
        }
        
         if(count($parameter) === 5){ 
        $query = PDO::prepare("SELECT * FROM $parameter[0] WHERE $parameter[1]  =:id  AND $parameter[3]  =:idx  ORDER BY $parameter[1] DESC");
        $query->bindValue(':id',$parameter[2]);
        $query->bindValue(':idx',$parameter[4]);
        $query->execute();
        $result = $query->fetchAll();
        return $result;
        }   
        
          if(count($parameter) === 6){ 
        $query = PDO::prepare("SELECT * FROM $parameter[0] WHERE $parameter[1]  =:id  AND $parameter[3]  =:idx  ORDER BY $parameter[5]");
        $query->bindValue(':id',$parameter[2]);
        $query->bindValue(':idx',$parameter[4]);
        $query->execute();
        $result = $query->fetchAll();
        return $result;
        }        
        

    }
    
        
    
    
    
    
    
    
    
    
     if($method_name == "getvalue_one") //Function overloading logic for function name overlodedFunction
    {

        if(count($parameter) === 1){ 
        return $parameter[0]." --".$parameter[1];
        }  


        if (count($parameter)=== 3) {

        $query = PDO::prepare("SELECT * FROM $parameter[0] WHERE $parameter[1] =:pid");
        $query->bindValue(':pid',$parameter[2], PDO::PARAM_INT);
        $query->execute();
        $counts ="";
        while($rows = $query->fetch(PDO::FETCH_ASSOC)){
            $counts =  $query->rowCount(); 

        }
        return  $counts;  
        }
        
        
        if (count($parameter)=== 4) {

        $query = PDO::prepare("SELECT $parameter[0] FROM $parameter[1] WHERE $parameter[2] =:id ");
        $query->bindValue(':id',$parameter[3]);
        $query->execute();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)){    
        $value = $row[$parameter[0]] ;
        
    
        } 
        return $value;  
        }
        
        
        if (count($parameter)=== 6) {

        $query = PDO::prepare("SELECT $parameter[0] FROM $parameter[1] WHERE $parameter[2] =:id "
                . "AND $parameter[4] =:id1 ");
        $query->bindValue(':id',$parameter[3]);
        $query->bindValue(':id1',$parameter[5]);
        $query->execute();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)){    
        $value = $row[$parameter[0]] ;
        
    
        } 
        return $value;  
        }        
        

        if (count($parameter)=== 8) {

        $query = PDO::prepare("SELECT $parameter[0] FROM $parameter[1] WHERE $parameter[2] =:id "
        . "AND $parameter[4] =:id1 AND $parameter[6] =:id2 ");
        $query->bindValue(':id',$parameter[3]);
        $query->bindValue(':id1',$parameter[5]);
        $query->bindValue(':id2',$parameter[7]);        

        $query->execute();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)){    
        $value = $row[$parameter[0]] ;


        } 
        return $value;  
        }        
        
        
        
    }
    
//    $db->getvalue_one("pic","details","details_id",1);
    
    
    
    
    
    
    
    
}
        

    





  
	}
    ?>